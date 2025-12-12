<?php

namespace App\Http\Controllers;

use App\Models\AuditLogModel;
use App\Models\PettyCashCategoriesModel;
use App\Models\PettyCashEntriesModel;
use App\Models\PettyCashFundModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PettyCashEntriesController extends Controller
{
public function index()
{
    $entriesmodel = new PettyCashEntriesModel();
    $categoriesmodel = new PettyCashCategoriesModel();
    $user = Auth::user();

    // Get entries based on role
    if ($user->role === 'Requester') {
        $entriesResults = $entriesmodel->getEntriesByRequester($user->user_id);
    } elseif ($user->role === 'Finance' || $user->role === 'Admin') {
        $entriesResults = $entriesmodel->getAllEntries();
    } else {
        abort(403, 'Unauthorized access');
    }

    // Attach categories to each entry
    foreach ($entriesResults as $entry) {
        $entry->categories = $categoriesmodel->getCategoriesByEntry($entry->entry_id);
    }

    // Get all categories (for display in the category table)
    $categoryList = $categoriesmodel->getAllCategories();

    // Pass data to view, including the user role
    return view('/pcms-entry/index', [
        'entryList'    => $entriesResults,
        'categoryList' => $categoryList,
        'userRole'     => $user->role, // pass role for Blade conditionals
    ]);
}


    public function add(){
        $categories = (new PettyCashCategoriesModel())->getAllCategories();
        return view('/pcms-entry/add', compact('categories'));
    }

    public function create(Request $request){
        $request->validate([
            'amount' => 'required|numeric',
            'purpose' => 'required|string|max:255',
            'date' => 'required|date',
            'entry_type' => 'required|string|max:50',
            'category_id' => 'required|exists:petty_cash_categories,category_id',
        ]);

        $amount = $request->input('amount');
        $purpose = $request->input('purpose');
        $date = $request->input('date');
        $entry_type = $request->input('entry_type');
        $category_id = $request->input('category_id');

        DB::beginTransaction(); 

        try {

            $model = new PettyCashEntriesModel();
            $model->setnewEntries($amount, $purpose, $date, $entry_type, $category_id, Auth::user()->user_id);

            $entry_id = DB::getPdo()->lastInsertId();

            $log = new AuditLogModel();
            $userId = Auth::user()->user_id;

            $log->insertLog(
                $userId,
                $entry_id,
                "CREATE ENTRY",
                "Created entry : {$entry_id}
                Purpose = {$purpose},
                Amount = {$amount},
                Date = {$date},
                Type = {$entry_type}"
            );


            DB::commit();
            return redirect('/entries');

        } catch (\Exception $e){
            DB::rollBack();
            return redirect('/entries')->with('error', 'Error creating entry.');
        }
    }

    public function edit($entry_id){
        $entry = (new PettyCashEntriesModel())->getSpecificEntries($entry_id);

        if(!$entry) return redirect('/entries')->with('error', 'Entry not found.');

        if(Auth::user()->role === 'Requester' && $entry->status !== 'Pending'){
            return redirect('/entries')->with('error', 'You cannot edit approved or rejected entries.');
    }
        $categories = (new PettyCashCategoriesModel())->getAllCategories();
        return view('/pcms-entry/edit', compact('entry','categories'));
    }

    public function update($entry_id, Request $request){
        $entry = PettyCashEntriesModel::find($entry_id);
        
        if (!$entry) return redirect('/entries')->with('error', 'Entry not found.');
        
        if (Auth::user()->role === 'Requester' && $entry->status !== 'Pending') {
            return redirect('/entries')->with('error', 'You cannot update approved or rejected entries.');
        }

        DB::beginTransaction();
        
        try {

            $oldStatus = $entry->status;
            $oldAmount = $entry->amount;

            $newStatus = $request->input('status');
            $newAmount = $request->input('amount');

            $fundmodel = new PettyCashFundModel();

            if ($oldStatus === 'Pending' && $newStatus === 'Approved') {

                $fundmodel->reduceBalance($newAmount);

            } elseif ($oldStatus === 'Approved' && $newStatus === 'Approved') {

                if ($newAmount > $oldAmount) {
                    $difference = $newAmount - $oldAmount;
                    $fundmodel->reduceBalance($difference);

                } elseif ($newAmount < $oldAmount) {
                    $difference = $oldAmount - $newAmount;
                    $fundmodel->increaseBalance($difference);
                }
            }

            $model = new PettyCashEntriesModel();
            $purpose = $request->input('purpose');
            $amount = $request->input('amount');
            $date = $request->input('date');
            $entry_type = $request->input('entry_type');
            $status = $request->input('status');

            $model->setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status);

            $log = new AuditLogModel();
            $userId = Auth::user()->user_id;

            $log->insertLog(
                $userId,
                $entry_id,
                "UPDATE ENTRY",
                "Updated entry id = {$entry_id}"
            );

            DB::commit();
            return redirect('entries');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('entries')->with('error', 'Error updating entry.');
        }
    }


    public function delete($entry_id){
        $model = new PettyCashEntriesModel();
        $dbResults = $model -> getSpecificEntries($entry_id);
        $data = [
            'entry' => $dbResults
        ];
        return view('/pcms-entry/delete', $data);
    }

    public function destroy($entry_id){
        $entry = PettyCashEntriesModel::find($entry_id);
        
        if (!$entry) {
            return redirect('/entries')->with('error', 'Entry not found.');
        }
        if (strcasecmp(trim($entry->status), 'Approved') === 0) {
            return redirect('/entries')->with('error', 'Cannot delete approved or rejected transactions.');
        }

        DB::beginTransaction();
            try{

            $entry->delete();

            $log = new AuditLogModel();
            $userId = Auth::user()->user_id;

            $log->insertLog(
                $userId,
                $entry_id,
                "DELETE ENTRY",
                "Deleted entry id = {$entry_id}"
            );

            DB::commit();
            return redirect('/entries')->with('success', 'Entry deleted.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/entries')->with('error', 'Error deleting entry.');
        }
    }
}
