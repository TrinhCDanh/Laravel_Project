@extends('admin.master')
@section('controller', 'Product')
@section('action', 'Edit')
@section('content')
<!-- /.col-lg-12 -->
<form action="" method="POST" enctype="multipart/form-data" name="frmEditProduct">
<div class="col-lg-7" style="padding-bottom:120px">
    
        @include('admin.blocks.error')
    
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"--",$product["cate_id"]); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContento', isset($product) ? $product['content'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Images Current</label>
            <img class="img_current" src="{!! asset('resources/uploads/'.$product['image']) !!}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : null) !!}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    
</div>
<div class="col-md-1"></div>
<div class="col-md-4">
    @foreach($product_img as $key=>$item)
        <div class="form-group img_box" id="{!! $key !!}">
            <img src="{!! asset('resources/uploads/detail/'.$item['image']) !!}" class="img_current" idHinh="{!! $item['id'] !!}" id="{!! $key !!}">
            <a type="button" id="del-img_demo" class="btn-danger icon-del" href="javascript:void(0)">Delete</i></a>
        </div>
    @endforeach
    <button type="button" class="btn btn-primary" id="addImages">Add Images</button> 
    <div id="insert_image"></div> 
</div> 
<form>
@endsection()