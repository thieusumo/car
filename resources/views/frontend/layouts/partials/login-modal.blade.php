<div class="modal fade" id="login-modal">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="custom-modal-title">Đăng Nhập</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form>
        <div class="modal-body">
            {{-- <h3 class="title-w3 mb-2 text-center text-yel font-weight-bold">Đăng Nhập</h3> --}}
                <form action="#" method="post">
                    <div class="form-group">
                        <label class="">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" placeholder="Username" name="Name" required="">
                    </div>
                    <div class="form-group">
                        <label class="">Mật Khẩu</label>
                        <input type="password" class="form-control" placeholder="*****" name="Password" required="">
                    </div>
                    <button type="submit" class="btn button-style-w3">ĐĂNG NHẬP</button>
                    <div class="row sub-w3l mt-3 mb-2">
                        <div class="col-sm-6 sub-w3layouts_hub">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-style-w3ls">
                                <span></span>Ghi nhớ đăng nhập?</label>
                        </div>
                        <div class="col-sm-6 forgot-w3l text-sm-right">
                            <a href="#" class="text-style-w3ls">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <p class="text-center dont-do text-style-w3ls">Bạn chưa có tài khoản?
                        <a href="javascript:void(0)" onclick="showModal('register-modal','login-modal')"  class="font-weight-bold">
                            Đăng kí ngay</a>
                    </p>
                </form>
        </div>
        </form>
        
      </div>
    </div>
  </div>