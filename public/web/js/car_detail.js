var pos = 0;
var _token = $('input[name=_token]').val();
$(".report-info").click(function(event) {
	var customer_name = $(".customer_name").text();
	if(customer_name == "")
	{
		$(".err-cmt").html('<span class="text-danger">Vui lòng tạo tài khoản trước khi bình luận</span>');
		$("#registryModal").modal({backdrop: 'static'});
	}else{
		$("#custom-modal").modal({backdrop: "static"});
	}
	
});
$("#custom-modal-body input").on("blur",function(){
	let str = $(this).val();
	if(str.length <= 0){
		$(this).addClass('is-invalid');
	}else{
		$(this).removeClass('is-invalid').addClass('is-valid');
	}
});
$(".more-image").click(function(){
	let src = $(this).attr('src');
	pos = $(this).attr('pos');
	$("#image-gallery-image").attr("src",src);
	$("#image-modal").modal({backdrop: "static"});

});
$(".image-next").click(function(){
	pos++;
	if(pos == ci) pos = 0;
	let src = $("#img-"+pos).attr('src');
	$("#image-gallery-image").attr("src",src);
});
$(".image-prev").click(function(){
	pos--;
	if(pos == -1) pos = ci;
	let src = $("#img-"+pos).attr('src');
	$("#image-gallery-image").attr("src",src);
});

$(".btn-y-cmt").click(function(event) {

	var customer_name = $(".customer_name").text();
	if(customer_name == "")
	{
		$(".err-cmt").html('<span class="text-danger">Vui lòng tạo tài khoản trước khi bình luận</span>');
		$("#registryModal").modal({backdrop: 'static'});
	}else{

		$(".box-y-cmt").slideToggle(500);
		$([document.documentElement, document.body]).animate({
	        scrollTop: $(".box-y-cmt").offset().top - 50
	    }, 2000);
	}
});
$("input[name=ques]").focus(function(){
	var customer_name = $(".customer_name").text();
	if(customer_name == ""){
		$(".err-cmt").html('<span class="text-danger">Vui lòng tạo tài khoản trước khi bình luận</span>');
		$("#registryModal").modal({backdrop: 'static'});
	}
});
var index = 0;
$(".vote-star").click(function(){
	index = $(this).index();
	for(var i = 0;i<5;i++){
		if( i < index){
			$(".vote-star").eq(i).addClass('fa-star star').removeClass('fa-star-o');
		}else{
			$(".vote-star").eq(i).addClass('fa-star-o').removeClass('fa-star star');
		}
	}
});
$(".ex-cmt").click(function(){
	var text = $(this).text();
	var u_cmt = $("#u-cmt");
	u_cmt.val(u_cmt.val()+ " "+ text);
});
$(".sub-cmt").click(function(){
	if(index == 0){
		$.notify('Chọn số sao',{type:'danger'});
		return;
	}else{
		var u_cmt = $("#u-cmt").val();

		$.ajax({
			url:route('frontend.customer.rating'),
			type: 'POST',
			dataType: 'html',
			data: {
				star: index,
				comment: u_cmt,
				_token: _token,
				car_id: $("#c-id").text()
			},
		})
		.done(function(data) {
			data = JSON.parse(data);
			$.notify(data.message,{type:data.status});
			if(data.status == 'success'){
				$("#u-cmt").val("");
				location.reload();
			}
			console.log(data);
		});
	}
});
$(".sub-que").click(function(){
	var question = $("input[name=ques]").val();
	if(question == "")
	{
		$.notify('Hãy nhập câu hỏi của bạn',{type:'danger'});
		return;
	}else{
		$.ajax({
			url:route('frontend.customer.send_question'),
			type: 'POST',
			dataType: 'html',
			data: {
				car_id: $("#c-id").text(),
				question: question,
				_token: _token
			},
		})
		.done(function(data) {
			data = JSON.parse(data);
			$.notify(data.message,{type:data.status});
			if(data.status == 'success'){
				$("input[name=ques]").val("");
			}
			console.log(data);
		})
		.fail(function() {
			$.notify('Lỗi. Vui lòng thử lại sau!',{type:'danger'});
		});
	}
});
$('.btn-report').click(function(){
	var formData = new FormData($(this).parents('form')[0]);
	formData.append('car_id',$("#c-id").text());
	$.ajax({
		url:route('frontend.customer.report-info'),
		type: 'POST',
		dataType: 'html',
		processData: false,
        contentType: false,
		data: formData,
	})
	.done(function(data) {
		data = JSON.parse(data);
		$.notify(data.message,{type:data.status});
		if(data.status == 'success'){
			$("#report-form")[0].reset();
			$("#custom-modal").modal('hide');
		}
	})
	.fail(function() {
		$.notify('Lỗi. Vui lòng thử lại sau!',{type:'danger'});
	});
});