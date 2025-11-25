<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PettyCashEntriesModel extends Model
{
    public function getAllEntries(){
        return DB::select('SELECT * FROM petty_cash_entries');
    }

    public function setnewEntries($amount, $purpose, $date, $entry_type){
        DB::insert('INSERT INTO petty_cash_entries
        (requester_id, category_id, purpose, amount, date, entry_type, created_by)
        VALUES (1, 1, ?, ?, ?, ?, 1)', [$purpose, $amount, $date, $entry_type]);
    }

    public function getSpecificEntries($entry_id){
        $rows = DB::select('SELECT * FROM petty_cash_entries WHERE entry_id = ?', [$entry_id]);
        return count($rows) > 0 ? $rows[0] : null;
    }

    public function setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status){
        DB::update('UPDATE petty_cash_entries SET purpose = ?, amount =?, date = ?, entry_type = ?, status = ? 
        WHERE entry_id = ?', [$purpose, $amount, $date, $entry_type, $status,$entry_id]);
    }

    public function setDestroyEntries($entry_id){
        DB::update('UPDATE petty_cash_entries SET deleted_at = NOW() WHERE entry_id = ?', [$entry_id]);
    }
}
