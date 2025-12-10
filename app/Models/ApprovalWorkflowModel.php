<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApprovalWorkflowModel extends Model
{
    public function getAllEntries(){
        return DB::select(" SELECT * FROM petty_cash_entries WHERE status IN ('Pending', 'Rejected', 'Approved') ");
    }

    public function getEntryDetails($entry_id){
        return DB::select(" SELECT p.*, u.name AS requester FROM petty_cash_entries p 
        JOIN users u ON u.user_id = p.requester_id WHERE p.entry_id = ?", [$entry_id]);
    }

    public function insertRemark($entry_id, $approver_id, $remarks){
        DB::insert(" INSERT INTO approval_workflows (entry_id, approver_id, remarks)
        VALUES (?, ?, ?) ", [$entry_id, $approver_id, $remarks]);
    }

    public function getRemarksByEntry($entry_id) {
        return DB::select("SELECT aw.*, u.name AS approver_name 
                        FROM approval_workflows aw
                        JOIN users u ON u.user_id = aw.approver_id
                        WHERE aw.entry_id = ?
                        ORDER BY aw.created_at ASC", [$entry_id]);
    }
}
