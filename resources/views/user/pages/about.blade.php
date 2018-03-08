@extends('user.master')
@section('description', 'About us')
@section('content')
  <section id="about-us" style="margin-top: 20px">
      <style> 
        .task-todo p {
            font-size: 20px;
            color: black;
        }
      </style>
      <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-4">
                <div class="content">
                    <img src="{!! url('public/user/img/DCH.jpg') !!}" >
                    <div class="task-todo">
                        <p><strong>Tên: </strong>Diệp Cẩm Hòa</p>
                        <p><strong>MSSV: </strong>DH51400453</p>
                        <p><strong>Lớp: </strong>D14_TH01</p>
                        <p><strong>Công việc thực hiện: </strong></p>
                        <p>
                            <ul>
                                <li>Tạo chức năng thêm, xóa, sửa user</li>
                                <li>Nhập dữ liệu</li>
                                <li>Đổ dữ liệu ra trang chi tiết sản phẩm</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="content">
                    <img src="{!! url('public/user/img/NVH.jpg') !!}" >
                    <div class="task-todo">
                        <p><strong>Tên: </strong>Nguyễn Văn Hiếu</p>
                        <p><strong>MSSV: </strong>DH51400400</p>
                        <p><strong>Lớp: </strong>D14_TH01</p>
                        <p><strong>Công việc thực hiện: </strong></p>
                        <p>
                            <ul>
                                <li>Tạo chức năng thêm, xóa, sửa loại sản phẩm</li>
                                <li>Nhập dữ liệu</li>
                                <li>Đổ dữ liệu ra trang chủ</li>
                            </ul>
                        </p>
                    </div>
                </div> 
            </div>
            <div class="col-xs-12 col-lg-4">
                <div class="content">
                    <img src="{!! url('public/user/img/TCD.jpg') !!}" >
                    <div class="task-todo">
                        <p><strong>Tên: </strong>Trịnh Công Danh</p>
                        <p><strong>MSSV: </strong>DH51400153</p>
                        <p><strong>Lớp: </strong>D14_TH01</p>
                        <p><strong>Công việc thực hiện: </strong></p>
                        <p>
                            <ul>
                                <li>Tạo CSDL</li>
                                <li>Tạo chức năng thêm, xóa, sửa sản phẩm</li>
                                <li>Phân chia trang và đổ dữ liệu ra trang loại sản phẩm</li>
                                <li>Tạo trang giỏ hàng</li>
                            </ul>
                        </p>
                    </div>
                </div>   
            </div>
        </div>
        
        <p style="font-size: 20px"><strong> Link báo cáo: </strong>đang cập nhật...</p> 
        
      </div>
  </section>
@endsection