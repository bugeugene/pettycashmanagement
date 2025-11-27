<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PettyCashFundModel extends Model
{
    public function getFund()
    {
        $rows = DB::select("SELECT * FROM petty_cash_funds LIMIT 1");
        return count($rows) > 0 ? $rows[0] : null;
    }

    // public function updateBalance($fund_id, $new_balance)
    // {
    //     DB::update("UPDATE petty_cash_funds SET current_balance = ?, last_update = NOW() 
    //     WHERE fund_id = ?", [$new_balance, $fund_id]);
    // }

    public function replenishFund($fund_id, $amount)
    {
        DB::update("UPDATE petty_cash_funds 
        SET current_balance = current_balance + ?, last_replenished_at = NOW(), last_update = NOW()
        WHERE fund_id = ?", [$amount, $fund_id]);
    }

    public function reduceBalance($amount)
    {
        DB::update("UPDATE petty_cash_funds
        SET current_balance = current_balance - ?, last_update = NOW() LIMIT 1", [$amount]);
    }
}
