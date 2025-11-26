<?php

namespace App\Http\Controllers;

use App\Models\PettyCashCategoriesModel;
use App\Models\PettyCashEntriesModel;
use Illuminate\Http\Request;

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

    public function add (){
        return view('/pcms-entry/add');
    }

    public function create(Request $request){
        $amount = $request -> input('amount');
        $purpose = $request -> input('purpose');
        $date = $request -> input('date');
        $entry_type = $request -> input('entry_type');

        $model = new PettyCashEntriesModel();
        $model -> setnewEntries($amount, $purpose, $date, $entry_type);
        return redirect('/entries');
    }

    public function edit($entry_id){
        $model = new PettyCashEntriesModel();
        $entry = $model->getSpecificEntries($entry_id);
        return view('/pcms-entry/edit', ['entry'=>$entry]);
    }

    public function update($entry_id, Request $request){
        $model = new PettyCashEntriesModel();
        $purpose = $request -> input('purpose');
        $amount = $request -> input('amount');
        $date = $request -> input('date');
        $entry_type = $request -> input('entry_type');
        $status = $request -> input('status');
        $model -> setUpdateEntries($entry_id, $purpose, $amount, $date, $entry_type, $status);

        return redirect('entries');
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
        $model = new PettyCashEntriesModel();
        $entry = $model->getSpecificEntries($entry_id);

        if (!$entry) {
            return redirect('/entries')->with('error', 'Entry not found.');
        }

        if (strcasecmp(trim($entry->status), 'Approved') === 0) {
            return redirect('/entries')->with('error', 'Cannot delete approved transactions.');
        }

        $model->setDestroyEntries($entry_id);

        return redirect('/entries')->with('success', 'Entry deleted.');
    }
}
