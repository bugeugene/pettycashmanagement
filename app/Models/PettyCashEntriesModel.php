<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class PettyCashEntriesModel extends Model
{
    use SoftDeletes;

    // public function getAllEntries(){
    //     return DB::select('SELECT * FROM petty_cash_entries');
    // }

    // public function setnewEntries($amount, $purpose, $date, $entry_type, $category_id, $user_id){
    //     DB::insert('INSERT INTO petty_cash_entries
    //     (requester_id, category_id, purpose, amount, date, entry_type, created_by)
    //     VALUES (?, ?, ?, ?, ?, ?, ?)', [$user_id, $category_id, $purpose, $amount, $date, $entry_type, $user_id]);
    // }

    // public function getSpecificEntries($entry_id){
    //     $rows = DB::select('SELECT * FROM petty_cash_entries WHERE entry_id = ?', [$entry_id]);
    //     return count($rows) > 0 ? $rows[0] : null;
    // }

    // public function setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status){
    //     DB::update('UPDATE petty_cash_entries SET purpose = ?, amount =?, date = ?, entry_type = ?, status = ? 
    //     WHERE entry_id = ?', [$purpose, $amount, $date, $entry_type, $status,$entry_id]);
    // }

    // // public function setDestroyEntries($entry_id){
    // //     DB::delete('DELETE FROM petty_cash_entries WHERE entry_id = ?', [$entry_id]);
    // // }

    // public function setDestroyEntries($entry_id){
    //     $entry = $this->find($entry_id);
    //     if ($entry) {
    //         $entry->delete();
    //     }
    // }

    protected $primaryKey = 'entry_id';
    protected $table = 'petty_cash_entries';
    protected $fillable = [
        'requester_id', 'category_id', 'purpose', 'amount', 'date',
        'entry_type', 'created_by', 'status', 'finance_id'
    ];

    public function getAllEntries(){
        return self::all(); // returns Eloquent Collection
    }

    public function getSpecificEntries($entry_id){
        return $this->find($entry_id); // returns Eloquent model
    }

    public function setnewEntries($amount, $purpose, $date, $entry_type, $category_id, $user_id){
        self::create([
            'requester_id' => $user_id,
            'category_id'  => $category_id,
            'purpose'      => $purpose,
            'amount'       => $amount,
            'date'         => $date,
            'entry_type'   => $entry_type,
            'created_by'   => $user_id,
            'created_at'     => now()
        ]);
    }

    public function setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status){
        $entry = $this->find($entry_id);
        if ($entry) {
            $entry->update([
                'purpose'     => $purpose,
                'amount'      => $amount,
                'date'        => $date,
                'entry_type'  => $entry_type,
                'status'      => $status
            ]);
        }
    }

    public function setDestroyEntries($entry_id){
        $entry = $this->find($entry_id);
        if ($entry) {
            $entry->delete();
        }
    }

    public function getSummaryByPeriod($start_date, $end_date){
        return PettyCashEntriesModel::select(
                'category_id',
                DB::raw('SUM(amount) as total_amount'),
                DB::raw('COUNT(*) as total_transactions'),
                'entry_type',
                'status'
            )
            ->whereBetween('date', [$start_date, $end_date])
            ->groupBy('category_id', 'entry_type', 'status')
            ->orderBy('category_id')
            ->get();
    }

}
