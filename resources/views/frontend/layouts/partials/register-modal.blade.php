<div class="modal fade" id="registryModal">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="custom-modal-title">Đăng Kí</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        @include('frontend.layouts.partials.message')
        <p class="err-cmt text-center"></p>
        
        <!-- Modal body -->
        <form action="{{ route('frontend.registry') }}" method="POST">
            @csrf
        <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="">Tên Người Dùng</label>
                        <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="customer[name]" value="{{ session('customer_name') ?? old('customer[name]') }}" required="">
                    </div>
                    <div class="form-group">
                        <label class="">Email</label>
                        <input type="email" class="form-control" placeholder="nguyenvana@gmail.com" name="customer[email]" value="{{ session('email')??old('customer[email]') }}" 
                            required="">
                    </div>
                    <div class="form-group">
                        <label class="">Mật Khẩu</label>
                        <input type="password" class="form-control" name="customer[password]" required="">
                    </div>
                    <div class="form-group">
                        <label class="">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" name="customer[password_confirm]" required="">
                    </div>
                    <button type="submit" class="btn button-style-w3">ĐĂNG KÍ</button>
                    <div class="text-center">
                        ---Hoặc đăng kí bằng---
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
                    <p class="text-center dont-do text-style-w3ls">Đã có tài khoản?
                        <a href="javascript:void(0)" onclick="showModal('loginModal','registryModal')"  class="font-weight-bold">
                            Đăng nhập</a>
                    </p>
                </form>
        </div>
        </form>
        
      </div>
    </div>
  </div>