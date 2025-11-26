<?php

namespace App\Http\Controllers;

use App\Models\PettyCashFundModel;
use Illuminate\Http\Request;

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

    public function edit($fund_id)
    {
        $model = new PettyCashFundModel();
        $fund = $model->getFund();

        return view('/pcms-fund/edit', ['fund' => $fund]);
    }

    public function update(Request $request, $fund_id)
    {
        $new_balance = $request->input('current_balance');
        $model = new PettyCashFundModel();

        $model->updateBalance($fund_id, $new_balance);

        return redirect('/funds')->with('success', 'Fund updated!');
    }
}
