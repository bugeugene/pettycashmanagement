<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PettyCashModel extends Model
{
    /*
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable =['name', 'username', 'password', 'email', 'role'];
    public $timestamps = false;*/

    public function getAllUser(){
        return DB::select('SELECT * FROM users');
        // return self::all();
    }
    
    // public function get_user_by_username($username){
    //     $result = DB::select('SELECT * FROM users WHERE username = ?', [$username]);
    //     return count($result) ? $result[0] : null;
    // }

    public function setnewUser($name, $username, $password, $email, $role){
        $hashPassword = Hash::make($password);
        
        DB::insert('INSERT INTO users (name, username, password, email, role) VALUES (?, ?, ?, ?, ?)',
        [$name, $username, $password, $email, $role]);
        /*self::create([
            'name' => $name,
            'username' => $username,
            'password' => $hashPassword,
            'email' => $email,
            'role' => $role,
        ]);*/
    }

    public function getSpecificUser($user_id){
        return DB::select('SELECT * FROM users WHERE user_id = ?', [$user_id]);
        // return self::where('user_id', $user_id) -> get();
    }

    public function setUpdateUser($user_id, $name, $username, $password, $email, $role){
        DB::update('UPDATE users SET name = ?, username = ?, password = ?, email = ?, role = ? WHERE user_id = ?', [$name, $username, $password, $email, $role, $user_id]);
        /*self::where('user_id', $user_id) -> update([
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role,
        ]);*/
    }

    public function setDestroyUser($user_id){
        DB::delete('DELETE FROM users WHERE user_id = ?', [$user_id]);
        // self::destroy($user_id);
    }
}
