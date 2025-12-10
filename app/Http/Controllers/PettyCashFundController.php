<?php

namespace App\Http\Controllers;

use App\Models\AuditLogModel;
use App\Models\PettyCashFundModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PettyCashFundController extends Controller
{
    public function index()
    {
        $model = new PettyCashFundModel();
        $fund = $model->getFund();

        return view('/pcms-fund/index', ['fund' => $fund]);
    }

    public function replenishForm()
    {
        return view('/pcms-fund/replenish');
    }

    public function replenish(Request $request)
    {
        $amount = $request->input('amount');
        $model = new PettyCashFundModel();
        $fund = $model->getFund();

        $model->replenishFund($fund->fund_id, $amount);

        return redirect('/funds')->with('success', 'Fund replenished successfully!');
    }

    // public function replenish(Request $request){
    //     $amount = $request->input('amount');

    //     DB::beginTransaction(); 

    //     try {

    //         $model = new PettyCashFundModel();
    //         $fund = $model->getFund();

    //         $model->replenishFund($fund->fund_id, $amount);

    //         $log = new AuditLogModel();
    //         $user_id = Auth::user()->user_id;

    //         $log->insertLog(
    //             $user_id, 0, "REPLENISH FUND","Replenished fund by PHP {$amount}"
    //         );

    //         DB::commit();

    //         return redirect('/funds')->with('success', 'Fund replenished successfully!');

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect('/funds')->with('error', 'Something went wrong replenishing fund.');
    //     }
    // }

    // public function edit($fund_id)
    // {
    //     $model = new PettyCashFundModel();
    //     $fund = $model->getFund();

    //     return view('/pcms-fund/edit', ['fund' => $fund]);
    // }

    // public function update(Request $request, $fund_id)
    // {
    //     $new_balance = $request->input('current_balance');
    //     $model = new PettyCashFundModel();

    //     $model->updateBalance($fund_id, $new_balance);

    //     return redirect('/funds')->with('success', 'Fund updated!');
    // }
}
