<div class="headerstrip">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"> <a href="{{ url('/') }}" class="logo pull-left"><img style="width: 50px" src="https://confluence.jetbrains.com/download/attachments/57288110/laravel.png?version=2&modificationDate=1419345883000&api=v2" alt="SimpleOne" title="SimpleOne"></a> 
                <!-- Top Nav Start -->
                <div class="pull-left">
                    <div class="navbar" id="topnav">
                        <div class="navbar-inner">
                            <ul class="nav" >
                                <li><a class="home active" href="{{ url('/') }}">Home</a> </li>
                                <li><a class="shoppingcart" href="{{ URL::route('giohang') }}">Shopping Cart</a> </li>
                                <li><a class="checkout" href="{{ URL::route('checkout') }}">CheckOut</a> </li>
                                <li><a class="myaccount" href="#">About us</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Top Nav End -->
                <div class="pull-right">
                <form class="form-search top-search" method="POST" action="{{ URL::route('timkiem') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                        <input type="text" name="txtSearch" class="input-medium search-query" placeholder="Search Here…">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>