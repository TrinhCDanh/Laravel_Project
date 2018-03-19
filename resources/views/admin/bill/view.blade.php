@extends('admin.master')
@section('controller', 'Bill')
@section('action', 'View')
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-12" style="padding-bottom:20px">
    <h3>Product order</h3>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($bill_detail as $item)
            <tr class="odd gradeX" align="center">
                <td>{!! $i !!}</td>
                <td>
                    <?php
                        $product = DB::table('products')->where('id', $item["product_id"])->first();
                        echo $product->name;  
                    ?>
                </td>
                <td>{!! $item["quantity"] !!}</td>
                <td>{!! number_format($item["unit_price"],0,",",".") .' VND' !!}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
<div class="customer_info col-lg-6" style="padding-bottom:20px">
    <h3>Customer Infomation</h3>
    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $customer['name'] }}</td>
        </tr>
        <tr>
            <th>Gender:</th>
            <td>{{ $customer['gender']==0  ? 'Famale' : 'Male' }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $customer['email'] }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $customer['address'] }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $customer['phone'] }}</td>
        </tr>
    </table>
    @if($bill['check_order']==0)
        <a style='color: black; background-color: aquamarine; padding: 8px 16px' type="button" href="{{ URL::route('admin.bill.checkorder', ['id'=>$bill['id'] ]) }}">Check</a>
    @endif
</div>
@endsection()