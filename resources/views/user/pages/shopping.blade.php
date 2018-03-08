@extends('user.master')
@section('description', 'Shopping')
@section('content')
  <section id="product">
    <div class="container">
     <!--  breadcrumb --> 
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active"> Shopping Cart</li>
      </ul>       
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="quantity">Qty</th>
            <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
            
          <form method="POST" action="">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
              @foreach($content as $item)
              <tr>
                <td class="image"><a href="#"><img title="product" alt="product" src="{!! asset('resources/uploads/'.$item['options']['img']) !!}" height="50" width="50"></a></td>
                <td  class="name"><a href="#">{!! $item["name"] !!}</a></td>
                <td class="quantity"><input class="col-lg-1 qty" type="text" size="1" value="{!! $item['qty'] !!}" name="quantity[40]">
                 
                 </td>
                 <td class="total"> 
                    <a href="#" class="updatecart" id="{!! $item['rowId'] !!}">
                        <img class="tooltip-test" data-original-title="Update" src="{!! asset('public/user/img/update.png')!!}" alt="">
                    </a>
                    <a href="{!! url('xoa-san-pham', $item['rowId']) !!}">
                        <img class="tooltip-test" data-original-title="Remove"  src="{!! asset('public/user/img/remove.png')!!}" alt="">
                    </a>
                </td>
               
                 
                <td class="price">{!! number_format($item["price"],0,",",".") !!}</td>
                <td class="total">{!! number_format($item["price"]*$item["qty"],0,",",".") !!}</td>
                 
              </tr>
              @endforeach
          </form>
          
          
        </table>
      </div>
      <div class="cartoptionbox">
        <h4 class="heading4"> Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost. </h4>
        <input type="radio" class="radio">
        Use Coupon Code <br>
        <input type="radio" class="radio">
        Use Gift Voucher <br>
        <input type="radio" class="radio" checked="checked">
        Estimate Shipping & Taxes <br><br>
        <form class="form-vertical form-inline">
          <h4 class="heading4"> Enter your destination to get a shipping estimate.</h4>
          <fieldset>
            <div class="control-group">
              <label  class="control-label">Select list</label>
              <div class="controls">
                <select  class="col-lg-3 cartcountry">
                  <option>Country:</option>
                  <option>United Kindom</option>
                  <option>United States</option>
                </select>
                <select class="col-lg-3 cartstate">
                  <option>Region / State:</option>
                  <option>Angus</option>
                  <option>highlands</option>
                </select>
                <input type="submit" value="Get Quotes" class="btn btn-orange">
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="container">
      <div>
          <div class="col-lg-4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">{!! $total !!}</span></td>
              </tr>
            </table>
            <a type="submit" href="{{ URL::route('giohang') }}" class="btn btn-orange pull-right">Checkout</a>
            <a href="{!! url('/') !!}" type="submit" class="btn btn-orange pull-right mr10">Continue Shopping</a>
          </div>
        </div>
        </div>
    </div>
  </section>
@endsection