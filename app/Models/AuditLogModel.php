<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuditLogModel extends Model
{
    public function getAllLogs(){
        return DB::select(
            "SELECT a.*, u.name AS user_name
             FROM audit_logs a
             LEFT JOIN users u ON u.user_id = a.user_id
             ORDER BY a.time_stamp DESC"
        );
    }

    public function insertLog($user_id, $entry_id, $action_type, $details = null){
        DB::insert(
            "INSERT INTO audit_logs (user_id, entry_id, action_type, details)
             VALUES (?, ?, ?, ?)",
            [$user_id, $entry_id, $action_type, $details]
        );
    }
}
