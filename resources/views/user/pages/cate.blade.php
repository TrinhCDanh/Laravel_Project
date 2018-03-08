@extends('user.master')
@section('description', 'Cate Page')
@section('content')

  <section id="product" style="margin-top: 20px">
    <div class="container">
     <!--  breadcrumb -->  
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Category</li>
      </ul>
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="col-lg-3">
         <!-- Category-->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              @foreach($menu_cate as $item_menu)
                <li>
                  <a href="{{ URL('loai-san-pham', [$item_menu->id, $item_menu->alias]) }}">{{$item_menu->name}}</a>
                </li>
              @endforeach
              
            </ul>
          </div>
         
          <!-- Latest Product -->  
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
              @foreach($lasted_product as $item_lasted)
              <li>
                <img width="50" height="50" src="{!! asset('resources/uploads/'.$item_lasted->image) !!}" alt="product" title="product">
                <a class="productname" href="product.html">{!! $item_lasted->name !!}</a>
                <span class="procategory">{{ $name_cate->name }}</span>
                <span class="price">{!! $item_lasted->price !!}</span>
              </li>
              @endforeach
            </ul>
          </div> 
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="col-lg-9">          
          <!-- Category Products-->
          <section id="category">
               <!-- Sorting-->
                <div class="sorting well">
                  <form class=" form-inline pull-left">
                    Sort By :
                    <select>
                      <option>Default</option>
                      <option>Name</option>
                      <option>Pirce</option>
                      <option>Rating </option>
                      <option>Color</option>
                    </select>
                    &nbsp;&nbsp;
                    Show:
                    <select>
                      <option>10</option>
                      <option>15</option>
                      <option>20</option>
                      <option>25</option>
                      <option>30</option>
                    </select>
                  </form>
                  <div class="btn-group pull-right">
                    <button class="btn" id="list"><i class="icon-th-list"></i>
                    </button>
                    <button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
                  </div>
                </div>
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach($product_cate as $item)
                    <li class="col-lg-4 col-sm-6">
                      <a class="prdocutname" href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}">{!! $item->name !!}</a>
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
                  <ul class="thumbnails list row">
                    @foreach($product_cate as $item)
                    <li>
                      <div class="thumbnail">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4">
                            <span class="offer tooltip-test" >Offer</span>
                            <a href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}"><img alt="" src="{!! asset('resources/uploads/'.$item->image) !!}"></a>
                          </div>
                          <div class="col-lg-8 col-sm-8">
                            <a class="prdocutname" href="{{ URL('chi-tiet-san-pham', [$item->id, $item->alias]) }}">{!! $item->name !!}</a>
                          <div class="productdiscrption">{{ $item->description }}</div>
                            <div class="pricetag">
                              <span class="spiral"></span><a href="{!! url('mua-hang', [$item->id, $item->alias]) !!}" class="productcart">ADD TO CART</a>
                              <div class="price">
                                <div class="pricenew">{{ number_format($item->price,0,",",".") }}</div>
                                <div class="priceold">$00.00</div>
                              </div>
                            </div>
                            <div class="shortlinks">
                              <a class="details" href="#">DETAILS</a>
                              <a class="wishlist" href="#">WISHLIST</a>
                              <a class="compare" href="#">COMPARE</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <div>
                    <ul class="pagination pull-right">
                      @if($product_cate->currentPage() != 1)
                        <li>
                          <a href="{!! str_replace('/?', '?', ($product_cate->currentPage() - 1 )) !!}">Prev</a>
                        </li>
                      @endif
                      @for ($i = 1; $i <= $product_cate->lastPage(); $i++)
                        <li class="{!! ($product_cate->currentPage() == $i) ? 'active' : ''  !!}">
                          <a href="{!! str_replace('/?', '?', ($product_cate->url($i))) !!}">{!! $i !!}</a>
                        </li>
                      @endfor
                      @if($product_cate->currentPage() != $product_cate->lastPage())
                        <li>
                          <a href="{!! str_replace('/?', '?', ($product_cate->currentPage() + 1 )) !!}">Next</a>
                        </li>
                      @endif
                    </ul>
                  </div>
                </section>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection


