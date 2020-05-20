var pos = 0;
$(".report-info").click(function(event) {
	$("#custom-modal").modal({backdrop: "static"});
});
$("#custom-modal-body input").on("blur",function(){
	let str = $(this).val();
	if(str.length <= 0){
		$(this).addClass('is-invalid');
	}else{
		$(this).removeClass('is-invalid').addClass('is-valid');
	}
});
$(".btn-submit").click(function(){
	let required_form = $(this).closest('form').find('.required-form');
	$.each(required_form, function(index, val) {
		if(val.val().length <= 0){
			val.addClass('is-invalid');
		}
	});
});
$(".more-image").click(function(){
	let src = $(this).attr('src');
	pos = $(this).attr('pos');
	$("#image-gallery-image").attr("src",src);
	$("#image-modal").modal({backdrop: "static"});

});
$(".image-next").click(function(){
	pos++;
	if(pos == count) pos = 0;
	let src = $("#img-"+pos).attr('src');
	$("#image-gallery-image").attr("src",src);
});
$(".image-prev").click(function(){
	pos--;
	if(pos == -1) pos = count;
	let src = $("#img-"+pos).attr('src');
	$("#image-gallery-image").attr("src",src);
});