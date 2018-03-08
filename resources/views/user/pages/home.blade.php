@extends('user.master')
@section('description', 'Homa Page')
@section('content')
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="col-lg-3  col-sm-6">
        <a class="prdocutname" href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}">{{ $item->name }}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}"><img alt="" src="{!! asset('resources/uploads/'.$item->image) !!}"></a>
          <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang', [$item->id, $item->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{{ number_format($item->price,0,",",".") }}</div>
              <div class="priceold">$00.00</div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
  
<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Random Products</span><span class="subtext"> See Our Random Products</span></h1>
    <ul class="thumbnails">
      @foreach($product_rd as $item)
      <li class="col-lg-3  col-sm-6">
        <a class="prdocutname" href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}">{{ $item->name }}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}"><img alt="" src="{!! asset('resources/uploads/'.$item->image) !!}"></a>
          <div class="shortlinks">
            <a class="details" href="#">DETAILS</a>
            <a class="wishlist" href="#">WISHLIST</a>
            <a class="compare" href="#">COMPARE</a>
          </div>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang', [$item->id, $item->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{{ number_format($item->price,0,",",".") }}</div>
              <div class="priceold">$00.00</div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection()