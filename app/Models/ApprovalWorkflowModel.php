<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalWorkflowModel extends Model
{
    public function getPendingEntries()
    {
        // return DB::select("
        //     SELECT * FROM petty_cash_entries 
        //     WHERE status = 'pending'
        // ");
        return DB::table('petty_cash_entries')
            ->whereRaw('LOWER(status) = ?', ['pending'])
            ->get();
    }

    public function getEntryDetails($entry_id)
    {
        // return DB::select("
        //     SELECT p.*, u.name AS requester
        //     FROM petty_cash_entries p
        //     JOIN users u ON u.user_id = p.requester_id
        //     WHERE p.entry_id = ?
        // ", [$entry_id]);
        return DB::table('petty_cash_entries as p')
            ->join('users as u', 'u.user_id', '=', 'p.requester_id')
            ->leftJoin('approval_workflow as w', function($join) {
                $join->on('w.entry_id', '=', 'p.entry_id')
                     ->where('w.approver', '=', Auth::user()->user_id);
            })
            ->where('p.entry_id', $entry_id)
            ->select('p.*', 'u.name as requester', 'w.remarks', 'w.status as workflow_status')
            ->first();
    }

    // public function insertWorkflow($entry_id, $approver_id, $remarks)
    // {
    //     DB::insert("
    //         INSERT INTO approval_workflows (entry_id, approver_id, remarks)
    //         VALUES (?, ?, ?)
    //     ", [$entry_id, $approver_id, $remarks]);
    // }

    public function updateEntryStatus($entry_id, $status)
    {
        // DB::update("
        //     UPDATE petty_cash_entries
        //     SET status = ?
        //     WHERE entry_id = ?
        // ", [$status, $entry_id]);
        DB::table('petty_cash_entries')
            ->where('entry_id', $entry_id)
            ->update(['status' => $status, 'updated_at' => now()]);
    }

    public function insertWorkflow($entry_id, $approver, $remarks, $status){
        DB::table('approval_workflow')->insert([
            'entry_id'   => $entry_id,
            'approver'   => $approver,
            'remarks'    => $remarks,
            'status'     => $status, // THIS IS THE CRUCIAL PART
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
