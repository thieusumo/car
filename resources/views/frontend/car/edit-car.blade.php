@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.more-image-upload{
		object-fit: cover;
		border-radius: 10px;
		margin: 3px;
	}
	#more-image-box{
		padding: 2px;
		background-color: #e9ebee;
	}
	.remove-more-image{
		position: absolute;
		top: 5px;
		right: 5px;
		font-size: 20px;
		width: 20px;
		line-height: 20px;
		border-radius: 50%;
		background-color: #807979a3;
	}
	.b-img-upload{
		position: relative;
		display: inline-block;
	}
	fieldset{
		border-radius: 5px;
	}
	.detail-content>div{
		padding: 1px;
	}
	label, legend{
		font-weight: 500;
	}
</style>
@endsection
@section('content')
@include('frontend.layouts.partials.google-ads-top')
<div class="row mt-2" style="margin-right: 0px; margin-left: 0px">
		@include('frontend.layouts.partials.google-ads-left')
	
	<div class="col-md-8 content-detail">
		<ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#xe-khach">Xe Khách</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tien-chuyen">Xe Tiện chuyến</a>
            </li>
        </ul>
        <div class="alert alert-danger message-errors my-0" style="display: none">
        	<ul style="padding-left: 0; list-style: none;" class="error-box">
        	</ul>
        </div>
        <div class="tab-content" style="overflow-y: auto">
            <div id="xe-khach" class="tab-pane active"><br>
                <form accept-charset="utf-8" enctype="multipart/form-data">
					<div class="row detail-content">
						<div class="col-md-12">
							<fieldset>
								<legend>Thêm ảnh đại diện</legend>
								<div class="form-group row">
									<div class="col-md-6 mt-1">
										<input type="file" name="ava" accept="image/*"  id="ava" hidden>
										<button type="button" onclick="changeImage(this,'ava','preview-image','btn-remove-image')" class="btn btn-sm btn-warning">Tải lên</button>
										<button type="button" onclick="removeImage(this,'preview-image')" style="display: none" class="btn btn-sm btn-danger btn-remove-image ml-2">Xóa</button>
									</div>
									<div class="col-md-6 mt-1">
										<img src="" id="preview-image" class="w-50" alt="">
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="required" for="name">Tên Nhà Xe</label>
								<input type="text" class="form-control form-control-sm" name="name" id="name" value="" placeholder="Nhập tên nhà xe">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="required" for="license_plate">Biển số</label>
								<input type="text" class="form-control form-control-sm" name="license_plate" id="license_plate" value="" placeholder="Nhập biển số">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="route_id">Tuyến</label>
								<select name="route_id" class="form-control form-control-sm">
									@foreach($routes as $route)
										<option value="{{ $route->id }}">{{ $route->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="line">Lộ Trình</label>
								<input type="text" class="form-control form-control-sm" name="line" id="line" value="" placeholder="Ví dụ: Nghĩa Hải-Cầu Ông Kiểm-Nghĩa Hưng-Nam Định-Giáp Bát">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="address">Địa Chỉ Nhà Xe</label>
								<input type="text" class="form-control form-control-sm" name="address" id="address" value="" placeholder="Nhập địa chỉ nhà xe">
							</div>
						</div>
						<input type="hidden" name="car_type" value="1">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="station_go">Bến Đi</label>
								<input type="text" class="form-control form-control-sm" name="station_go" id="station_go" value="" placeholder="Nhập bến đi">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="station_back">Bến Tới</label>
								<input type="text" class="form-control form-control-sm" name="station_back" id="station_back" value="" placeholder="Nhập bến tới">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="phone_1">Liên Hệ 1</label>
								<input type="number" class="form-control form-control-sm" onkeypress="return isNumberKey(event)" name="phone[]" id="phone_1" value="" placeholder="Nhập số điện thoại chính">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="phone_2">Liên Hệ 2</label>
								<input type="number" class="form-control form-control-sm" name="phone[]" id="phone_2" value="" placeholder="Nhập số điện thoại 2">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="phone_3">Liên Hệ 3</label>
								<input type="number" class="form-control form-control-sm" name="phone[]" id="phone_3" value="" placeholder="Nhập số điện thoại 3">
							</div>
						</div>
						<div class="col-md-12">
							<fieldset>
								<legend>Thời Gian Đi</legend>
								<div class="form-group">
									<label class="float-left required">Giờ đi: </label>
									<input type="text" name="clock_go" class="form-control form-control-sm col-md-3 float-left clock_go">
									<i>AM: sáng PM: chiều</i><br><br>
									<div style="">
										<label class="required">Ngày đi: </label><span class="rounded bg-primary text-center px-1 text-white time_go">Tất cả các ngày</span><br>
										@for($i=1;$i<32;$i++)
										<label for="date-go-{{ $i }}" class="bg-primary rounded text-center text-white date_go">
											{{ $i }}
										</label>
										<input type="checkbox" hidden name="date_go[]" id="date-go-{{ $i }}" value="{{ $i }}">
											
										@endfor
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset>
								<legend>Thời Gian Về</legend>
								<div class="form-group">
									<label class="float-left required">Giờ về: </label>
									<input type="text" name="clock_back" class="form-control form-control-sm col-md-3 float-left clock_back">
									<i>AM: sáng PM: chiều</i><br><br>
									<div style="">
										<label class="required">Ngày về: </label><span class="rounded bg-primary text-center px-1 text-white time_back">Tất cả các ngày</span><br>
										@for($i=1;$i<32;$i++)
										<label for="date-back-{{ $i }}" class="bg-primary rounded text-center text-white date_back">
											{{ $i }}
										</label>
											<input type="checkbox" hidden name="date_back[]" id="date-back-{{ $i }}" value="{{ $i }}">
										@endfor
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset>
  								<legend>Tải lên ảnh chụp xe</legend>
								<div class="form-group">
									<button type="button" onclick="changeMultiImage('more-image')" class="btn btn-sm btn-warning">Tải lên</button>
									<input type="file" accept="image/*" hidden id="more-image" name="more-image[]" multiple>
									<div id="more-image-box" class="rounded">
										
									</div>
								</div>
						</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset>
								<legend>Thông Tin Thêm</legend>
								<div class="form-group">
									<textarea name="description" class="form-control form-control-sm" rows="3" placeholder="Ví dụ: Có nhà vệ sinh. khăn lạnh, nước uống,..."></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<button type="button" class="btn btn-sm btn-primary btn-submit">Xong</button>
								<a href="{{ route('home') }}" title="">
									<button type="button" class="btn btn-sm btn-danger float-right">Hủy</button>
								</a>
							</div>
						</div>
					</div>
				</form>
            </div>
            <div id="tien-chuyen" class="tab-pane fade"><br>
                <form accept-charset="utf-8" enctype="multipart/form-data">
					<div class="row detail-content">
						<div class="col-md-12">
							<fieldset>
								<legend>Thêm ảnh đại diện</legend>
								<div class="form-group row">
									<div class="col-md-6 mt-1">
										<input type="file" accept="image/*" name="ava" id="tc-ava" hidden>
										<button type="button" onclick="changeImage(this,'tc-ava','tc-preview-image','tc-btn-remove-image')" class="btn btn-sm btn-warning">Tải lên</button>
										<button onclick="removeImage(this,'tc-preview-image')" type="button" style="display: none" class="btn btn-sm btn-danger tc-btn-remove-image ml-2">Xóa</button>
									</div>
									<div class="col-md-6 mt-1">
										<img src="" id="tc-preview-image" class="w-50" alt="">
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="required" for="name">Tên Nhà Xe</label>
								<input type="text" class="form-control form-control-sm" name="name" id="name" value="" placeholder="Nhập tên nhà xe">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="required" for="license_plate">Biển số</label>
								<input type="text" class="form-control form-control-sm" name="license_plate" id="license_plate" value="" placeholder="Nhập biển số">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="address">Địa Chỉ Nhà Xe</label>
								<input type="text" class="form-control form-control-sm" name="address" id="address" value="" placeholder="Nhập địa chỉ nhà xe">
							</div>
						</div>
						<input type="hidden" name="car_type" value="2">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label class="required" for="phone_1">Liên Hệ 1</label>
								<input type="number" class="form-control form-control-sm" onkeypress="return isNumberKey(event)" name="phone[]" id="phone_1" value="" placeholder="Nhập số điện thoại chính">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="phone_2">Liên Hệ 2</label>
								<input type="number" class="form-control form-control-sm" name="phone[]" onkeypress="return isNumberKey(event)" id="phone_2" value="" placeholder="Nhập số điện thoại 2">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="phone_3">Liên Hệ 3</label>
								<input type="number" class="form-control form-control-sm" name="phone[]" onkeypress="return isNumberKey(event)" id="phone_3" value="" placeholder="Nhập số điện thoại 3">
							</div>
						</div>
						<div class="col-md-12">
							<fieldset>
								<legend>Tải lên ảnh chụp xe</legend>
								<div class="form-group">
									<button type="button" onclick="changeMultiImage('tc-more-image')" class="btn btn-sm btn-warning">Tải lên</button>
									<input type="file" accept="image/*" hidden id="tc-more-image" name="more-image[]" multiple>
									<div id="tc-more-image-box" class="rounded">
										
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset>
								<legend>Mô tả dịch vụ xe</legend>
								<div class="form-group">
									<textarea name="description" class="form-control form-control-sm" rows="3" placeholder="Dịch vụ xe đưa đón sân bay, đón dâu, du lịch..."></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<button type="button" class="btn btn-sm btn-primary btn-submit">Xong</button>
								<a href="{{ route('home') }}" title="">
									<button type="button" class="btn btn-sm btn-danger float-right">Hủy</button>
								</a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
	</div>
		@include('frontend.layouts.partials.google-ads-right')
</div>
	@include('frontend.layouts.partials.google-ads-bottom')
</section>
	
@endsection
@section('script')
<script> 
	function changeMultiImage(id_input){
		$("#"+id_input).click();
	};
	$(document).ready(function() {
		var image_files = '';
		$(document).on('change','#more-image',function(e){
			$("#more-image-box").html("");
			if (this.files) {
				image_files = Array.from(this.files);
				// console.log(image_files_arr);
				// image_files_arr.splice(2,1);
				// console.log(image_files_arr);
	            readUrl(this,image_files,'more-image-box');
	            console.log(image_files);
	        }
        });
        $(document).on('change','#tc-more-image',function(e){
			$("#tc-more-image-box").html("");
			if (this.files) {
				image_files = Array.from(this.files);
				// console.log(image_files_arr);
				// image_files_arr.splice(2,1);
				// console.log(image_files_arr);
	            readUrl(this,image_files,'tc-more-image-box');
	            console.log(image_files);
	        }
        });
        function readUrl(input,filess,more_image_box){
       		var j = 0;$("#"+more_image_box).html("");
	            var filesAmount = filess.length;
        	for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
            		$("#"+more_image_box).append(`
	                	<span class="b-img-upload">
	                    	<img src="`+event.target.result+`" class="more-image-upload"/>
	                    	<span class="glyphicon glyphicon-remove text-center text-white remove-more-image" p="`+j+`">x</span>
	                	</span>
	                `);
	                j++;
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
         $(document).on('click','.remove-more-image',function(){
        	let p = $(this).attr('p');
        	image_files.splice(p,1);
        	$(this).parent('span').remove();
        	console.log(image_files);
        	var input = document.getElementById("more-image");
        	readUrl(input,image_files);
        });
        $(".date_go , .date_back").click(function(){
        	$(this).toggleClass('bg-primary bg-danger');
        });
        $(".time_go, .time_back").click(function(){
        	$(this).siblings('label').click();
        	$(this).toggleClass('bg-primary bg-danger');
        });
        $(".btn-submit").click(function(){
        	var formData = new FormData($(this).parents('form')[0]);
        	$.each(image_files, function(index, val) {
        		formData.append('more_image[]',val);
        	});
        	formData.append('_token','{{ csrf_token() }}');
        	$.ajax({
        		url: '{{ route('fronted.car.save') }}',
        		type: 'POST',
        		dataType: 'html',
        		data: formData, 
        		processData: false,
            	contentType: false,
        	})
        	.done(function(data) {
        		// console.log(data);return;
        		data = JSON.parse(data);

        		if(typeof(data.message)  == 'string')
        			$.notify(data.message,{type:data.status});

        		else{
        			$([document.documentElement, document.body]).animate({
				        scrollTop: $(".content-detail").offset().top-10
				    }, 1000);
				    var error = '';
        			$.each(data.message, function(index, val) {
        				error += "<li> - "+val+"</li>";
        			});
        			$(".message-errors").css('display', '');
        			$(".error-box").html(error);
        		}
        		if(data.status == 'success')
        		    window.location.href = window.location.href;
        	})
        	.fail(function() {
        		$.notify('Lỗi',{type:'danger'});
        	});
        });
	});
</script>
<script src="{{ asset('web/js/car_detail.js') }}" type="text/javascript"></script>

@endsection