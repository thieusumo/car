@extends('frontend.layouts.master')
@section('content')
<!-- inner banner -->
    <div class="inner-banner-w3ls" id="home">
    <div class="row " id="" style="margin-right: 0px; margin-left: 0px">
         @include('frontend.layouts.partials.google-ads-1')
        <div class="col-md-8 py-xl-5 py-lg-3">
            <!-- login  -->
            <div class="modal-body my-2">
                <h3 class="title-w3 mb-2 text-center text-yel font-weight-bold">Đăng Nhập</h3>
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" placeholder="Username" name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>
                    <button type="submit" class="btn button-style-w3">ĐĂNG NHẬP</button>
                    <div class="text-center text-wh">
                        ---Hoặc---
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn button-style-w3" style="background-color: blue;color: white">Facebook</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn button-style-w3" style="background-color: red;color: white">Google<sup>+</sup></button>
                        </div>
                        
                    </div>
                    <div class="row sub-w3l mt-3 mb-5">
                        <div class="col-sm-6 sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-li text-style-w3ls">
                                <span></span>Ghi nhớ đăng nhập?</label>
                        </div>
                        <div class="col-sm-6 forgot-w3l text-sm-right">
                            <a href="#" class="text-li text-style-w3ls">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <p class="text-center dont-do text-style-w3ls text-li">Bạn chưa có tài khoản?
                        <a href="register.html" class="font-weight-bold text-li">
                            Đăng kí ngay</a>
                    </p>
                </form>
            </div>
            <!-- //login -->
        </div>
        @include('frontend.layouts.partials.google-ads-1')
    </div>
    </div>
    <!-- //inner banner -->
@endsection