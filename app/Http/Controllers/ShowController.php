<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShowController extends Controller
{
    function loaisanpham($id) {
    	$product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'alias', 'cate_id')->where('cate_id', $id)->get();
    	$cate = DB::table('cates')->select('parent_id')->where('id', $product_cate[0]->cate_id)->first();
    	$menu_cate = DB::table('cates')->select('id', 'name', 'alias')->where('parent_id', $cate->parent_id)->get();
    	$name_cate = DB::table('cates')->select('name')->where('id', $id)->first();
    	$lasted_product = DB::table('products')->select('id', 'name', 'image', 'price', 'alias')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
    	return view('user.pages.cate', compact('product_cate', 'menu_cate', 'lasted_product', 'name_cate'));
    }
}
