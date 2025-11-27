<?php

namespace App\Http\Controllers;

use App\Models\ApprovalWorkflowModel;
use App\Models\AuditLogModel;
use App\Models\PettyCashEntriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalWorkflowController extends Controller
{
    public function index()
    {
        $model = new ApprovalWorkflowModel();
        $pending = $model->getPendingEntries();

        return view('/pcms-appwork/list', ['pending' => $pending]);
    }

    public function show($entry_id)
    {
        $model = new ApprovalWorkflowModel();
        $entry = $model->getEntryDetails($entry_id);

        return view('/pcms-appwork/approve', ['entry' => $entry[0]]);
    }
    public function submit(Request $request){
        $request->validate([
            'entry_id' => 'required|exists:petty_cash_entries,entry_id',
            'remarks'  => 'required|string|max:500',
            'status'   => 'required|in:Approved,Rejected',
        ]);

        $entry_id = $request->entry_id;
        $remarks  = $request->remarks;
        $status   = $request->status;
        $approver = Auth::user()->user_id;

        DB::beginTransaction();

        try {
            // 1️⃣ Insert approval workflow (stores remarks)
            $workflowModel = new ApprovalWorkflowModel();
            $workflowModel->insertWorkflow($entry_id, $approver, $remarks, $status);

            // 2️⃣ Update entry status in PettyCashEntries
            $entryModel = new PettyCashEntriesModel();
            $entryModel->setUpdateStatus($entry_id, $status); // you need this method

            // 3️⃣ Log in AuditLog
            $auditLog = new AuditLogModel();
            $auditLog->insertLog(
                $approver,
                $entry_id,
                "APPROVAL SUBMITTED",
                "Entry status changed to '{$status}' by Finance. Remarks: '{$remarks}'"
            );

            DB::commit();
            return redirect('/approval')->with('success', 'Entry has been ' . $status);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/approval')->with('error', 'Error submitting approval: ' . $e->getMessage());
        }
    }


    // public function submit(Request $request){
    //     $entry_id = $request->entry_id;
    //     $remarks  = $request->remarks;
    //     $status   = $request->status;          
    //     $approver = Auth::user()->user_id;

    //     DB::beginTransaction();

    //     try {
    //         // 1️⃣ Insert approval workflow
    //         $workflowModel = new ApprovalWorkflowModel();
    //         $workflowModel->insertWorkflow($entry_id, $approver, $remarks);

    //         // 2️⃣ Update entry status in PettyCashEntries
    //         $entryModel = new PettyCashEntriesModel();
    //         $entryModel->setUpdateStatus($entry_id, $status); // You need a method to update status

    //         // 3️⃣ Log the audit
    //         $auditLog = new AuditLogModel();
    //         $auditLog->insertLog(
    //             $approver,
    //             $entry_id,
    //             "APPROVAL SUBMITTED",
    //             "Entry status changed to '{$status}' by user {$approver}. Remarks: '{$remarks}'"
    //         );

    //         DB::commit();
    //         return redirect('/approval')->with('success', 'Entry has been ' . $status);

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect('/approval')->with('error', 'Error submitting approval.');
    //     }
    // }

    // public function submit(Request $request)
    // {
    //     $model = new ApprovalWorkflowModel();

    //     $entry_id = $request->entry_id;
    //     $remarks  = $request->remarks;
    //     $status   = $request->status;          
    //     $approver = Auth::user()->user_id;

        
    //     $model->insertWorkflow($entry_id, $approver, $remarks);

        
    //     $model->updateEntryStatus($entry_id, $status);

    //     return redirect('/approval')->with('success', 'Entry has been ' . $status);
    // }
}
