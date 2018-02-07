<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getList() {
    	$user = User::select('id', 'username', 'level')->orderBy('id', 'DESC')->get()->toArray();
    	return view('admin.user.list', compact('user'));
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
    	$user_current_login = Auth::user()->id;
    	$user = User::find($id);
    	if (($id == 2) || ($user_current_login != 2 && $user["level"] == 1))
    		return redirect()->route('admin.user.list')->with(['level_message'=>'danger' ,'flash_message'=>'You cant not delete']);
    	else {
    		$user->delete();
    		return redirect()->route('admin.user.list')->with(['level_message'=>'success' ,'flash_message'=>'Success Delete User']);
    	}
    }

    public function getEdit($id) {
    	return view('admin.user.edit');
    }

    public function postEdit($id, UserRequest $request) {
    	
    }
}
