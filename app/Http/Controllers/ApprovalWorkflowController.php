<?php

namespace App\Http\Controllers;

use App\Models\ApprovalWorkflowModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalWorkflowController extends Controller
{
    public function index()
    {
        $model = new ApprovalWorkflowModel();
        $pending = $model->getPendingEntries();

        return view('pcms-appwork.list', ['pending' => $pending]);
    }

    public function show($entry_id)
    {
        $model = new ApprovalWorkflowModel();
        $entry = $model->getEntryDetails($entry_id);

        return view('pcms-appwork.approve', ['entry' => $entry[0]]);
    }

    public function submit(Request $request)
    {
        $model = new ApprovalWorkflowModel();

        $entry_id = $request->entry_id;
        $remarks  = $request->remarks;
        $status   = $request->status;          // 'approved' or 'rejected'
        $approver = Auth::user()->user_id;

        // Insert workflow
        $model->insertWorkflow($entry_id, $approver, $remarks);

        // Update entry status
        $model->updateEntryStatus($entry_id, $status);

        return redirect('/approval')->with('success', 'Entry has been ' . $status);
    }
}
