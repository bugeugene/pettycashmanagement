<?php

namespace App\Http\Controllers;

use App\Models\PettyCashCategoriesModel;
use Illuminate\Http\Request;

class PettyCashCategoriesController extends Controller
{
    public function index(){
        $model = new PettyCashCategoriesModel();
        $dbResults = $model -> getAllCategories();
        $data = [
            'categoryList' => $dbResults
        ];
        return view('pcms-cat/index', $data);
    }

    // public function add(){
    //     return view('pcms-cat/add');
    // }

    // public function create(Request $request){
    //     $name = $request -> input('name');
    //     $description = $request -> input('description');

    //     $model = new PettyCashCategoriesModel();
    //     $model -> setnewCategories($name, $description);
    //     return redirect('/category');
    // }

    // public function edit($category_id){
    //     $model = new PettyCashCategoriesModel();
    //     $dbResults = $model -> getSpecificCategories($category_id);
    //     $data = [
    //         'categoryList' => $dbResults
    //     ];
    //     return view('/pcms-cat/edit', $data);
    // }

    // public function update($category_id, Request $request){
    //     $model = new PettyCashCategoriesModel();
    //     $name = $request -> input('name');
    //     $description = $request -> input('description');
    //     $model -> setUpdateCategories($category_id, $name, $description);
    //     return redirect('/category');
    // }

    // public function delete($category_id){
    //     $model = new PettyCashCategoriesModel();
    //     $dbResults = $model -> getSpecificCategories($category_id);
    //     $data = [
    //         'categoryList' => $dbResults
    //     ];
    //     return view('/pcms-cat/delete', $data);
    // }

    // public function destroy($category_id){
    //     $model = new PettyCashCategoriesModel();
    //     $model -> setDestroyCategories($category_id);
    //     return redirect('/category');
    // }
}