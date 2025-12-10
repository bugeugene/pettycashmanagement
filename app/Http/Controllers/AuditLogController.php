<?php

namespace App\Http\Controllers;

use App\Models\AuditLogModel;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(){
        $model = new AuditLogModel();
        $logs = $model -> getAllLogs();

        return view('pcms-audit.index', ['logs' => $logs]);
    }
}
