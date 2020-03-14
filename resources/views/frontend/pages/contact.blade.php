@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
    
</style>
@endsection
@section('content')
<div class="mian-content-wthree">
    {{-- google ads --}}
    @include('frontend.layouts.partials.google-ads-2')
    {{-- end google ads --}}
    <!-- contact-->
    <div class="row pt-5 " id="" style="margin-right: 0px; margin-left: 0px">
         @include('frontend.layouts.partials.google-ads-1')
        <section class=" py-5 col-md-8" id="contact">
            <div class="container py-xl-5 py-lg-3 ">
                <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">Liên Hệ <span>Chúng Tôi</span></h3>
                <p class="text-center text-li title-w3 mb-md-5">Đóng góp của quý khách sẽ giúp website phát triển hơn</p>
                <div class="contact_grid_right pt-4">
                    <form action="#" method="post">
                        <div class="row contact_left_grid">
                            <div class="col-lg-6 con-left">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="Email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="Subject" placeholder="Subject"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6 con-right">
                                <div class="form-group">
                                    <textarea id="textarea" placeholder="Message" required=""></textarea>
                                </div>
                                <button class="form-control btn btn-info btn-gui" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @include('frontend.layouts.partials.google-ads-1')
        <!-- //Contact -->
    </div>
       
</div>
    
@endsection