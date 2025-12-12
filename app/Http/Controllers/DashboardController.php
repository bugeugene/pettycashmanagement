<?php

namespace App\Http\Controllers;

use App\Models\PettyCashEntriesModel;
use App\Models\PettyCashFundModel;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function landingpage(){
    $role = Auth::user()->role;

    return match ($role) {
        'Requester' => redirect('/dashboard/requester'),
        'Finance'   => redirect('/dashboard/finance'),
        'Admin'     => redirect('/dashboard/admin'),
        default     => abort(403, 'Unknown role'),
        };
    }
    
    public function finance(){
        $fundModel = new PettyCashFundModel();
        $fund = $fundModel->getFund();
        $currentBalance = $fund && property_exists($fund, 'current_balance') ? $fund->current_balance : 0;

        return view('pcms-role.finance', [
            'total'   => PettyCashEntriesModel::totalTransactions(),
            'pending' => PettyCashEntriesModel::pendingCount(),
            'approvedAmount' => PettyCashEntriesModel::approvedTotalAmount(),
            'rejectedAmount' => PettyCashEntriesModel::rejectedTotalAmount(),
            'recentEntries'  => PettyCashEntriesModel::recentEntries(),
            'topCategory'    => PettyCashEntriesModel::getTopCategory(),
            'currentBalance' => $currentBalance
        ]);
    }

}
