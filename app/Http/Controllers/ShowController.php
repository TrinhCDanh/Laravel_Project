<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShowController extends Controller
{
    function loaisanpham($id) {
    	$product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'alias', 'cate_id')->where('cate_id', $id)->paginate(1);
    	$cate = DB::table('cates')->select('parent_id')->where('id', $product_cate[0]->cate_id)->first();
    	$menu_cate = DB::table('cates')->select('id', 'name', 'alias')->where('parent_id', $cate->parent_id)->get();
    	$name_cate = DB::table('cates')->select('name')->where('id', $id)->first();
    	$lasted_product = DB::table('products')->select('id', 'name', 'image', 'price', 'alias')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
    	return view('user.pages.cate', compact('product_cate', 'menu_cate', 'lasted_product', 'name_cate'));
    }
    public function chitietsanpham($id) {
    	$product_detail = DB::table('products')->where('id', $id)->first();
    	$image = DB::table('product_images')->select('id', 'image')->where('product_id', $id)->get();
    	// san pham cung loai
    	$product_cate = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id', '<>', $id)->take(4)->get();
    	return view('user.pages.product', compact('product_detail', 'image', 'product_cate'));
    }
}
