<?php

namespace App\Http\Controllers;

use App\Models\ApprovalWorkflowModel;
use App\Models\PettyCashCategoriesModel;
use App\Models\PettyCashEntriesModel;
use App\Models\PettyCashFundModel;
use App\Models\PettyCashModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

    public function admin(){
        $user = new PettyCashModel();
        $users = $user->getAllUser();
        $totalUsers = is_array($users) ? count($users) : 0;
        
        $totalCategories = DB::table('petty_cash_categories')->count();

        $fundModel = new PettyCashFundModel();
        $fund = $fundModel->getFund();

        $pendingApprovals = PettyCashEntriesModel::pendingCount();

        $recentTransactions = PettyCashEntriesModel::orderBy('date', 'desc')
            ->limit(5)
            ->get();

        return view('pcms-role.admin', [
            'topCategory'    => PettyCashEntriesModel::getTopCategory(),
            'totalUsers' => $totalUsers,
            'totalCategories' => $totalCategories,
            'fund' => $fund,
            'pendingApprovals' => $pendingApprovals,
            'recentTransactions' => $recentTransactions,
        ]);
    }

}
