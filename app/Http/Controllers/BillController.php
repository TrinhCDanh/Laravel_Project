<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart, Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Product;

class BillController extends Controller
{
    public function saveBill(Request $request) {
        if(Session('cart')) {
            echo 'Ton tai gio hang';
            $customer = new Customer;
            $customer->name = $request->txtName;
            $customer->gender = $request->rdoGender;
            $customer->email = $request->txtEmail;
            $customer->address = $request->txtAddress; 
            $customer->phone = $request->txtPhone;
            $customer->save();

            $bill = new Bill;
            $bill->date_order = date('Y-m-d');
            $bill->total = Cart::total();
            $bill->note = $request->txtNote != '' ? $request->txtNote : ' ' ;
            $bill->check_order = 0;
            $bill->customer_id = $customer->id;
            $bill->save();

            $content = Cart::content()->toArray();
            foreach($content as $value) {
                $billDetail = new BillDetail;
                $billDetail->product_id = $value['id'];
                $billDetail->bill_id = $bill->id;
                $billDetail->quantity = $value['qty'];
                $billDetail->unit_price = $value['subtotal'];//
                $billDetail->save();
            }

            Session::forget('cart');
            return redirect()->back()->with(['level_message'=>'success' ,'flash_message'=>'Success']);
        }
            
    }

    public function getList() {
        $data = Bill::select('id','date_order','total','check_order','customer_id')->get()->toArray();
        return view('admin.bill.list', compact('data'));
    }

    public function getView($id) {
        $bill = Bill::findOrFail($id)->toArray();
        $customer = Customer::select('name','gender','email','address','phone')->where('id', $bill['id'])->first()->toArray();
        $bill_detail = BillDetail::select('product_id', 'bill_id', 'quantity', 'unit_price')->where('bill_id', $bill['id'])->get()->toArray();
        return view('admin.bill.view', compact('bill', 'customer', 'bill_detail'));
    }
    public function checkOrder($id) {
        $bill = Bill::find($id);
        $bill->check_order = 1;
        $bill->save();
        return redirect()->route('admin.bill.list');
    }
}
