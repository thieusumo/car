<div class="modal fade" id="custom-modal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="custom-modal-title">Phản ánh thông tin nhà xe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form id="report-form">
          @csrf
          <div class="modal-body" id="custom-modal-body">
              <div class="form-group">
                <label for="title-report" class="required">Số điện thoại của bạn:</label>
                <input type="number" id="title-report" name="contact" class="form-control form-control-sm required-form" onkeypress="return isNumberKey(event)" placeholder="Số điện thoại của bạn" name="title" required>
              </div>
              <div class="form-group">
                <label for="title-report" class="required">Tiêu đề</label>
                <input type="text" id="title-report" class="form-control form-control-sm required-form" placeholder="Tiêu đề" name="title" required>
              </div>
              <div class="form-group">
                <label for="content-report" class="required">Nội dung</label>
                <textarea name="content" id="content-report" class="form-control form-control-sm required-form" placeholder="Nội dung" rows="3" required></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm btn-submit btn-report" >Gửi</button>
          </div>
        </form>
      </div>
    </div>
  </div>