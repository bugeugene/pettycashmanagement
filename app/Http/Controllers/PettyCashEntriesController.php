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
    public function index(){
        $entriesmodel = new PettyCashEntriesModel();
        $entriesResults = $entriesmodel -> getAllEntries();
        $categoriesmodel = new PettyCashCategoriesModel();
        
        foreach($entriesResults as $entry){
            $entry->categories = $categoriesmodel->getCategoriesByEntry($entry->entry_id);
    }
        $data = [
            'entryList' => $entriesResults
        ];
        return view('/pcms-entry/index', $data);
    }

    // public function add (){
    //     return view('/pcms-entry/add');
    // }

    public function add(){
        $categories = (new PettyCashCategoriesModel())->getAllCategories();
        return view('/pcms-entry/add', compact('categories'));
    }

    // public function create(Request $request){
    //     $amount = $request -> input('amount');
    //     $purpose = $request -> input('purpose');
    //     $date = $request -> input('date');
    //     $entry_type = $request -> input('entry_type');

    //     $model = new PettyCashEntriesModel();
    //     $model -> setnewEntries($amount, $purpose, $date, $entry_type);
    //     return redirect('/entries');
    // }

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

            $fundmodel = new PettyCashFundModel();
            $fundmodel->reduceBalance($amount);

            $log = new AuditLogModel();
            $userId = Auth::user()->user_id;

            $log->insertLog(
                $userId,
                $entry_id,
                "CREATE ENTRY",
                "Created entry:{$entry_id}
                purpose={$purpose},
                amount={$amount},
                date={$date},
                type={$entry_type}"
            );


            DB::commit();
            return redirect('/entries');

        } catch (\Exception $e){
            DB::rollBack();
            return redirect('/entries')->with('error', 'Error creating entry.');
        }
    }

    // public function edit($entry_id){
    //     $model = new PettyCashEntriesModel();
    //     $entry = $model->getSpecificEntries($entry_id);
    //     return view('/pcms-entry/edit', ['entry'=>$entry]);
    // }

    public function edit($entry_id){
        $entry = (new PettyCashEntriesModel())->getSpecificEntries($entry_id);
        $categories = (new PettyCashCategoriesModel())->getAllCategories();
        return view('/pcms-entry/edit', compact('entry','categories'));
    }

    // public function update($entry_id, Request $request){
    //     $model = new PettyCashEntriesModel();
    //     $purpose = $request -> input('purpose');
    //     $amount = $request -> input('amount');
    //     $date = $request -> input('date');
    //     $entry_type = $request -> input('entry_type');
    //     $status = $request -> input('status');
    //     $model -> setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status);

    //     return redirect('entries');
    // }

    public function update($entry_id, Request $request){
        DB::beginTransaction(); 

        try {

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
                "Updated entry id={$entry_id}"
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

    // public function destroy($entry_id){
    //     $model = new PettyCashEntriesModel();
    //     $entry = $model->getSpecificEntries($entry_id);

    //     if (!$entry) {
    //         return redirect('/entries')->with('error', 'Entry not found.');
    //     }

    //     if (strcasecmp(trim($entry->status), 'Approved') === 0) {
    //         return redirect('/entries')->with('error', 'Cannot delete approved transactions.');
    //     }

    //     $model->setDestroyEntries($entry_id);

    //     return redirect('/entries')->with('success', 'Entry deleted.');
    // }

    public function destroy($entry_id){
        // DB::beginTransaction();
        // try {

            // $model = new PettyCashEntriesModel();
            // $entry = $model->getSpecificEntries($entry_id);
             $entry = PettyCashEntriesModel::find($entry_id);

            if (!$entry) {
                return redirect('/entries')->with('error', 'Entry not found.');
            }

            if (strcasecmp(trim($entry->status), 'Approved') === 0) {
                return redirect('/entries')->with('error', 'Cannot delete approved transactions.');
            }

            DB::beginTransaction();
            try{

            // $model->setDestroyEntries($entry_id);
            $entry->delete();

            $log = new AuditLogModel();
            $userId = Auth::user()->user_id;

            $log->insertLog(
                $userId,
                $entry_id,
                "DELETE ENTRY",
                "Deleted entry id={$entry_id}"
            );

            DB::commit();
            return redirect('/entries')->with('success', 'Entry deleted.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/entries')->with('error', 'Error deleting entry.');
        }
    }

}
