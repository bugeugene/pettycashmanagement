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
    public function index(){
        $model = new ApprovalWorkflowModel();
        $status = $model->getAllEntries();

        $data = [
            'statuslist' => $status
        ];

        return view('/pcms-appwork/list', $data);
    }

    public function show($entry_id){
        $model = new ApprovalWorkflowModel();
        $entry = $model->getEntryDetails($entry_id);

        $data =[
            'showdetails' => $entry[0] ?? null
        ];

        // return view('/pcms-appwork/remarks', ['entry' => $entry[0]]);
        return view('/pcms-appwork/remarks', $data);
    }

    public function submit(Request $request){
        $model = new ApprovalWorkflowModel();

        $entry_id = $request->entry_id;
        $remarks  = $request->remarks;
        $approver = Auth::user()->user_id;

        $model->insertRemark($entry_id, $approver, $remarks);

        $log = new AuditLogModel();
        $userId = Auth::user()->user_id;

        $log->insertLog(
            $userId,
            $entry_id,
            "ADD REMARK",
            "Added remark for entry {$entry_id}: {$remarks}");

        return redirect('/approval')->with('success', 'Remark added.');
    }
}
