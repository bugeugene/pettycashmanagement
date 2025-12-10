<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PettyCashCategoriesModel extends Model
{
    public function getAllCategories(){
        return DB::select('SELECT * FROM petty_cash_categories');
    }

    public function getCategoriesByEntry($entry_id){
        return DB::select('SELECT c.* FROM petty_cash_categories as c
        JOIN petty_cash_entries as e ON c.category_id = e.category_id 
        WHERE e.entry_id = ?', [$entry_id]);
    }

    // public function setnewCategories($name, $description){
    //     DB::insert('INSERT INTO petty_cash_categories (name, description) VALUES (?,?)', [$name, $description]);      
    // }

    // public function getSpecificCategories($category_id){
    //     return DB::select('SELECT * FROM petty_cash_categories WHERE category_id = ?', [$category_id]);
    // }

    // public function setUpdateCategories($category_id, $name, $description){
    //     DB::update('UPDATE petty_cash_categories SET name = ?, description =? WHERE category_id = ?', [$name, $description, $category_id]);
    // }

    // public function setDestroyCategories($category_id){
    //     DB::delete('DELETE FROM petty_cash_categories WHERE category_id = ?', [$category_id]);
    // }
}
