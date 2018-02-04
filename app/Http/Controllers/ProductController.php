<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use App\ProductImages;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
		public function getList() {
			return view('admin.product.list');
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
    	$product->user_id = 1;
    	$product->cate_id = $request->sltParent;

    	$request->file('fImages')->move('resources/uploads/', $file_name);
    	$product->save();
    	$product_id = $product->id;
    	if ($request->hasFile('fProductDetail')) {
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

    }
}
