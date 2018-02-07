<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
class UserController extends Controller
{
    public function getList() {
    	return view('admin.user.list');
    }

    public function getAdd() {
    	return view('admin.user.add');
    }

    public function postAdd(UserRequest $request) {
    	$user = new User;
    	$user->username = $request->txtUser; 
    	$user->password = Hash::make($request->txtPass);
    	$user->email = $request->txtEmail;
    	$user->level = $request->rdoLevel;
    	$user->remember_token = $request->_token;
    	$user->save();
    	return redirect()->route('admin.user.list')->with(['level_message'=>'success' ,'flash_message'=>'Success Add User']);
    }

    public function getDelete($id) {
    	
    }

    public function getEdit($id) {
    	return view('admin.user.edit');
    }

    public function postEdit($id, UserRequest $request) {
    	
    }
}
