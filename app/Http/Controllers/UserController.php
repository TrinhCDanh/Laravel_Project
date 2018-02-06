<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use User;

class UserController extends Controller
{
    public function getList() {

    }

    public function getAdd() {
    	return view('admin.user.add');
    }

    public function postAdd(UserRequest $request) {
    	
    }

    public function getDelete() {
    	
    }

    public function getEdit() {
    	
    }

    public function postEdit() {
    	
    }
}
