<?php

namespace App\Http\Controllers;

use App\Models\PettyCashModel;
use Illuminate\Http\Request;

class PettyCashController extends Controller
{
    public function index(){
        $model = new PettyCashModel();
        $dbResults = $model -> getAllUser();
        $data = [
            'userList' => $dbResults
        ];
        return view('pcms-user/index', $data);
    }

    public function add(){
        return view('pcms-user/add');
    }

    public function create(Request $request){
        $name = $request -> input('name');
        $username = $request -> input('username');
        $password = $request -> input('password');
        $email = $request -> input('email');
        $role = $request -> input("role");

        $model = new PettyCashModel();
        $model -> setnewUser($name, $username, $password, $email, $role);
        return redirect('/users');
    }

    public function edit($user_id){
        $model = new PettyCashModel();
        $dbResults = $model -> getSpecificUser($user_id);
        $data = [
            'userList' => $dbResults
        ];
        return view('/pcms-user/edit', $data);
    }

    public function update($user_id, Request $request){
        $model = new PettyCashModel();
        $name = $request -> input('name');
        $username = $request -> input('username');
        $password = $request -> input('password');
        $email = $request -> input('email');
        $role = $request -> input("role");

        $model -> setUpdateUser($user_id, $name, $username, $password, $email, $role);
        return redirect('/users')->with('success', 'User Updated!!');
    }

    public function delete ($user_id){
        $model = new PettyCashModel();
        $dbResults = $model -> getSpecificUser($user_id);
        $data = [
            'userList' => $dbResults
        ];
        return view('/pcms-user/delete', $data);
    }

    public function destroy($user_id){
        $model = new PettyCashModel();
        $model -> setDestroyUser($user_id);
        return redirect('/users')->with('success', 'User Deleted!!');
    }
}
