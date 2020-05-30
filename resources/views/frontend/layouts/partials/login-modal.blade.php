<div class="modal fade" id="loginModal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="custom-modal-title">Đăng Nhập</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        @include('frontend.layouts.partials.message')
        <form action="{{ route('frontend.login') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="">Email</label>
                    <input type="email" value="{{ session('customer_email') ?? old('customer[email]') }}" class="form-control" placeholder="Địa chỉ Email" name="customer[email]" required >
                </div>
                <div class="form-group">
                    <label class="">Mật Khẩu</label>
                    <input type="password" class="form-control" name="customer[password]" required>
                </div>
                <div class="row sub-w3l mt-3 mb-2">
                    <div class="col-sm-6 sub-w3layouts_hub">
                        <input type="checkbox" id="remember_me" name="remember_me" value="">
                        <label for="remember_me" class="text-style-w3ls">
                            <span></span>Ghi nhớ đăng nhập?</label>
                    </div>
                    <div class="col-sm-6 forgot-w3l text-sm-right">
                        {{-- <a href="#" class="text-style-w3ls">Quên mật khẩu?</a> --}}
                    </div>
                </div>
                <button type="submit" class="btn button-style-w3">ĐĂNG NHẬP</button>
               
                <div class="text-center">
                    ---Hoặc đăng nhập bằng---
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('customer.socialite','facebook') }}" title="">
                            <button type="button" class="btn button-style-w3" style="background-color: blue;color: white">Facebook</button>
                        </a>
                        
                    </div>
                    <div class="col-6">
                        <a href="{{ route('customer.socialite','google') }}" _blank='top' title="">
                            <button type="button" class="btn button-style-w3" style="background-color: red;color: white">Google<sup>+</sup></button>
                        </a>
                    </div>
                </div>
                <p class="text-center dont-do text-style-w3ls">Bạn chưa có tài khoản?
                    <a href="javascript:void(0)" onclick="showModal('registryModal','loginModal')"  class="font-weight-bold">
                        Đăng kí ngay</a>
                </p>
            </div>
        </form>
        
      </div>
    </div>
  </div>