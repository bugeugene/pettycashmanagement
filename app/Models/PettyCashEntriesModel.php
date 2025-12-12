<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class PettyCashEntriesModel extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'entry_id';
    protected $table = 'petty_cash_entries';
    protected $fillable = [
        'requester_id', 'category_id', 'purpose', 'amount', 'date',
        'entry_type', 'created_by', 'status', 'finance_id'
    ];

    // public function getAllEntries(){
    //     return self::all();
    // }
    public function getAllEntries(){
        return DB::table('petty_cash_entries as p')
            ->join('users as u', 'p.created_by', '=', 'u.user_id')
            ->select('p.*', 'u.name as created_by_name')
            ->get();
    }

    // public function getEntriesByRequester($requester_id){
    //     return self::where('requester_id', $requester_id)->get();
    // }
    public function getEntriesByRequester($requester_id){
        return DB::table('petty_cash_entries as p')
            ->join('users as u', 'p.created_by', '=', 'u.user_id')
            ->where('p.requester_id', $requester_id)
            ->select('p.*', 'u.name as created_by_name')
            ->get();
    }

    public function getSpecificEntries($entry_id){
        return $this->find($entry_id);
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
            'created_at'   => now()
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

    public function setUpdateStatus($entry_id, $status){
        DB::table('petty_cash_entries')
            ->where('entry_id', $entry_id)
            ->update(['status' => $status, 'updated_at' => now()]);
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

    public static function totalTransactions(){
        return self::count();
    }

    public static function pendingCount(){
        return self::where('status', 'Pending')->count();
    }

    public static function approvedTotalAmount(){
        return self::where('status', 'Approved')->sum('amount');
    }

    public static function rejectedTotalAmount(){
        return self::where('status', 'Rejected')->sum('amount');
    }

    public static function totalByType($userId, $entryType){
        return self::where('requester_id', $userId)
                    ->where('entry_type', $entryType)
                    ->sum('amount');
    }

    public static function totalRequestAmount($userId){
        return self::totalByType($userId, 'Request');
    }

    public static function totalReplenishments($userId){
        return self::totalByType($userId, 'Replenishment');
    }

    public static function totalAdjustments($userId){
        return self::totalByType($userId, 'Adjust');
    }

    public static function recentEntries(){
        return self::orderBy('created_at', 'desc')->take(5)->get();
    }

    public static function getTopCategory(){
        return DB::table('petty_cash_entries as e')
            ->join('petty_cash_categories as cat', 'e.category_id', '=', 'cat.category_id')
            ->select(
                'cat.name',
                DB::raw('COUNT(e.category_id) as usage_count'),
                DB::raw('SUM(e.amount) as total_amount')
            )
            ->groupBy('cat.name')
            ->orderByDesc('usage_count')
            ->first();
    }
    
    public static function getTopCategoryByUser($userId){
        return DB::table('petty_cash_entries as e')
            ->join('petty_cash_categories as cat', 'e.category_id', '=', 'cat.category_id')
            ->select(
                'cat.name',
                DB::raw('COUNT(e.category_id) as usage_count'),
                DB::raw('SUM(e.amount) as total_amount')
            )
            ->where('e.requester_id', $userId)
            ->groupBy('cat.name')
            ->orderByDesc('usage_count')
            ->first();
    }
    
    public static function recentEntriesByUser($userId, $limit = 5){
        return self::where('requester_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

}
/*
    public function getAllEntries(){
        return DB::select('SELECT * FROM petty_cash_entries');
    }

    public function setnewEntries($amount, $purpose, $date, $entry_type, $category_id, $user_id){
        DB::insert('INSERT INTO petty_cash_entries
        (requester_id, category_id, purpose, amount, date, entry_type, created_by)
        VALUES (?, ?, ?, ?, ?, ?, ?)', [$user_id, $category_id, $purpose, $amount, $date, $entry_type, $user_id]);
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
         DB::delete('DELETE FROM petty_cash_entries WHERE entry_id = ?', [$entry_id]);
    }

    public function setDestroyEntries($entry_id){
        $entry = $this->find($entry_id);
        if ($entry) {
            $entry->delete();
        }
    }

        public static function totalByType($userId, $entryType){
        return self::where('requester_id', $userId)
                    ->where('entry_type', $entryType)
                    ->sum('amount');
    }
    
    public static function totalRequests($userId){
        return self::totalByType($userId, 'Request');
    }*/