<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller
{
    public function getAdd() {
    	return view('admin.cate.add');
    }

    public function postAdd(CateRequest $request) {
    		$cate = new Cate;
    		$cate->name 				= $request->txtCateName;
    		$cate->alias 				= $request->txtCateName;
    		$cate->order 				= $request->txtOrder;
    		$cate->parent_id 		= 1;
    		$cate->keywords 		= $request->txtKeywords;
    		$cate->description 	= $request->txtDescription;
    		$cate->save();
    		return redirect()->route('admin.cate.list')->with(['level_message'=>'success' ,'flash_message'=>'Success']);
    }

    public function getList() {
    	return view('admin.cate.list');
    }
}
