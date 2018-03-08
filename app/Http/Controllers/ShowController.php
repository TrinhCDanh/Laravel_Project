<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB, Mail, Cart, Request;
use App\Product;


class ShowController extends Controller
{
    function loaisanpham($id) {
    	$product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'alias', 'description', 'cate_id')->where('cate_id', $id)->paginate(1);
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

    public function getLienhe() {
        return view('user.pages.contact');
    }

    public function postLienhe() {
        $data = ['hoten'=>'Trinh Danh'];
        Mail::send('email.blanks', $data, function($msg) {
            $msg->from('whatthemail2@gmail.com', 'Trinh Danh');
            $msg->to('whatthemail2@gmail.com', 'What The')->subject('Hello World!');
        });
    }

    public function muahang($id) {
        $product_buy = DB::table('products')->where('id', $id)->first();
        Cart::add(['id'=>$id, 'name'=>$product_buy->name, 'qty'=>1, 'price'=>$product_buy->price, 'options'=> ['img'=>$product_buy->image]]);
        return redirect()->route('giohang');
    }

    public function giohang() {
        $content = Cart::content()->toArray();
        $total = Cart::total();
        return view('user.pages.shopping', compact('content', 'total'));
    }

    public function xoasanpham($id) {
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function capnhat() {
        if (Request::ajax()) {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id, $qty);
            echo "oke";
        }
    }

    public function timkiem(Request $request) {
        $key = Request::input('txtSearch');
        $product_cate = Product::where('name', 'LIKE', '%'.$key.'%')->get();
        // $cate = DB::table('cates')->select('parent_id')->where('id', $product_cate[0]->cate_id)->first();
        // $menu_cate = DB::table('cates')->select('id', 'name', 'alias')->where('parent_id', $cate->parent_id)->get();
        //$name_cate = DB::table('cates')->select('name')->where('id', $id)->first();
        $lasted_product = DB::table('products')->select('id', 'name', 'image', 'price', 'alias')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
        return view('user.pages.search', compact('product_cate', 'lasted_product', 'menu_cate', 'name_cate'));
    }

    public function checkout() {
        $content = Cart::content()->toArray();
        $total = Cart::total();
        $tax = Cart::tax();
        return view('user.pages.checkout', compact('content', 'total', 'tax'));
    }
}
