@extends('admin.master')
@section('controller', 'Bill')
@section('action', 'List')
@section('content')
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Customer email</th>
            <th>Date order</th>
            <th>Total</th>
            <th>Delete</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($data as $item)
    <tr class="odd gradeX {{ $item['check_order']==0 ? 'danger' : ''}}" align="center">
            <td>{!! $i !!}</td>
            <td>
                <?php
                    $email = DB::table('customers')->where('id', $item["customer_id"])->first();
                    echo $email->email;  
                ?>
            </td>
            <td>{!! $item["date_order"] !!}</td>
            <td>{!! $item["total"] !!}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('are you sure')" href="#"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.bill.getView', $item['id']) !!}">View</a></td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </tbody>
</table>

@endsection()
    