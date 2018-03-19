<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use App\ProductImages;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;
use File;
use Request;
use Auth;

class ProductController extends Controller
{
	public function getList() {
		$data = Product::select('id', 'name', 'price', 'cate_id', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.product.list', compact('data'));
	}

    public function getAdd() {
    	$cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.product.add', compact('cate'));
    }

    public function postAdd(ProductRequest $request) {
    	$file_name = $request->file('fImages')->getClientOriginalName();

    	$product = new Product;
    	$product->name = $request->txtName;
    	$product->alias = changeTitle($request->txtName);
    	$product->price = $request->txtPrice;
    	$product->intro = $request->txtIntro;
    	$product->content = $request->txtContent;
    	$product->image = $file_name;
    	$product->keywords = $request->txtKeywords;
    	$product->description = $request->txtDescription;
    	$product->user_id = Auth::user()->id;
    	$product->cate_id = $request->sltParent;

    	$request->file('fImages')->move('resources/uploads/', $file_name);
    	$product->save();
    	$product_id = $product->id;
    	if ($request->hasFile('fProductDetail')) {//Kiem tra file ton tai 
    		foreach ($request->file('fProductDetail') as $file) {
    			$product_img = new ProductImages;
    			if(isset($file)) {
    				$product_img->image = $file->getClientOriginalName();
    				$product_img->product_id = $product->id;
    				$file->move('resources/uploads/detail', $file->getClientOriginalName());
    				$product_img->save();
    			}
    		}
    	}
    	return redirect()->route('admin.product.list')->with(['level_message'=>'success' ,'flash_message'=>'Success Add Product']);  
    }

    public function getDelete($id) {
    	//echo $id;
    	$product_detail = Product::find($id)->pimages->toArray();
    	//print_r($product_detail);
    	foreach ($product_detail as $value) {
    		File::delete('resources/uploads/detail/'.$value["image"]);
    	}
    	$product = Product::find($id);
    	File::delete('resources/uploads/'.$product->image);
    	$product->delete($id);
    	return redirect()->route('admin.product.list')->with(['level_message'=>'success' ,'flash_message'=>'Success Delete Product']); 
    }

    public function getEdit($id) {
    	$cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
   		$product = Product::find($id);
   		$product_img = Product::find($id)->pimages;
   		return view('admin.product.edit', compact('cate', 'product', 'product_img'));
    }

    public function postEdit($id, Request $request) {
    	$product = Product::find($id);

    	$product->name 			= Request::input('txtName');
    	$product->alias 		= changeTitle(Request::input('txtName'));
    	$product->price 		= Request::input('txtPrice');
    	$product->intro 		= Request::input('txtIntro');
    	$product->content 		= Request::input('txtContent');
    	$product->keywords 		= Request::input('txtKeywords');
    	$product->description 	= Request::input('txtDescription');
    	$product->user_id 		= 1;
    	$product->cate_id 		= Request::input('sltParent');
    	//Cap nhat file hinh
    	$img_current = "resources/uploads/".$product->image;
    	if (!empty(Request::file('fImages'))) {
    		$file_name = Request::file('fImages')->getClientOriginalName();
    		$product->image = $file_name;
    		Request::file('fImages')->move('resources/uploads/', $file_name);
    		if (File::exists($img_current))
    			File::delete($img_current);
    	} else {
    		echo "Khong co hinh";
    	}
    	$product->save();

    	//Cap nhat lai detail cua san pham
    	if(!empty(Request::file('fEditDetail'))) {
    		foreach(Request::file('fEditDetail') as $file) {
    			$product_img = new ProductImages;
    			if(isset($file)) {
    				$product_img->image = $file->getClientOriginalName();
    				$product_img->product_id = $product->id;
    				$file->move('resources/uploads/detail/',$file->getClientOriginalName());
    				$product_img->save();
    			}
    		}
    	}
    	
    	return redirect()->route('admin.product.list')->with(['level_message'=>'success' ,'flash_message'=>'Success Edit Product']);  
    }

    //Xoa detail cua san pham
    public function getDelImg($id) {
    	if(Request::ajax()) {
    		$idHinh       = (int)Request::get('idHinh'); //dung ajax de lay id hinh
    		$image_detail = ProductImages::find($idHinh);
    		if(!empty($image_detail)) {
    			$img = 'resources/uploads/detail/'.$image_detail->image;
    			if(File::exists($img)) {
    				File::delete($img);
    			}
    			$image_detail->delete();
    		}
    		return "Oke";
    	}
    }
}
