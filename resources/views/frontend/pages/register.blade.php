@extends('frontend.layouts.master')
@section('content')
<!-- inner banner -->
<div class="inner-banner-w3ls" id="home">
    <div class="row " id="" style="margin-right: 0px; margin-left: 0px">
        @include('frontend.layouts.partials.google-ads-1')
        <div class="col-md-8 py-xl-5 py-lg-3">
            <!-- register  -->
            <div class="modal-body my-2">
                <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold text-yel">Đăng Ký</h3>
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" placeholder="Username" name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" class="form-control" placeholder="loremipsum@email.com" name="Email"
                            required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nhập Lại Mật Khẩu</label>
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
                </form>
            </div>
            <!-- //register -->
        </div>
        @include('frontend.layouts.partials.google-ads-1')
    </div>
</div>
    <!-- //inner banner -->
@endsection