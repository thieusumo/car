@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
    
</style>
@endsection
@section('content')
<div class="mian-content-wthree">
    @include('frontend.layouts.partials.google-ads-top')
    <div class="row " id="" style="margin-right: 0px; margin-left: 0px">
        @include('frontend.layouts.partials.google-ads-left')
        <section class="col-md-8 mx-0 my-0 px-0 py-0" id="contact">
            @include('frontend.layouts.partials.message')
            <div class="container py-xl-5 py-lg-1 py-md-2">
                <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">Liên Hệ <span>Chúng Tôi</span></h3>
                <div class="contact_grid_right pt-4">
                    <form id="c_form" action="{{ route('frontend.customer.contact') }}" method="post">
                        @csrf
                        <div class="row contact_left_grid">
                            <div class="col-lg-6 con-left">
                                <div class="form-group">
                                    <input class="form-control c_name" type="text" name="name" placeholder="Họ tên" value="{{ old('name') ?? "" }}" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 con-right">
                                <div class="form-group">
                                    <input class="form-control c_phone" type="number" onkeypress="return isNumberKey(event)" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control c_title" type="text" value="{{ old('title') }}" name="title" placeholder="Tiêu đề" >
                        </div>
                        <div class="form-group">
                            <textarea id="textarea" onkeyup="countCharacter(this)" placeholder="Nội dung" name="content" required="">{{ old('content') }}</textarea>
                            <span class="count text-danger">0</span><span class="text-danger">/50</span>
                            <i class="text-danger">* Nội dung ít nhất 50 kí tự</i>
                        </div>
                        <div class="row contact_left_grid">
                            <div class="col-lg-6 con-left mt-2">
                                <button class="form-control btn btn-primary btn-gui" type="button">Capcha</button>
                            </div>
                            <div class="col-lg-6 con-right my-2">
                                <button class="form-control btn btn-info btn-gui" type="button">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @include('frontend.layouts.partials.google-ads-right')
    </div>
    @include('frontend.layouts.partials.google-ads-bottom')
</div>

@endsection
@routes
@section('script')

<script src="{{ asset('web/js/contact.js') }}" type="text/javascript"></script>

@endsection


