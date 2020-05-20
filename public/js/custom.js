function changeImage(that,input_file,image_preview,btn_remove=""){
	$("#"+input_file).click();
	$("#"+input_file).change(function() {
	    if(this.files && this.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#'+image_preview).attr('src', e.target.result).addClass('border border-info rounded');
		    }
		    reader.readAsDataURL( this.files[0]); // convert to base64 string
		    if(btn_remove != "")
		    	$('.'+btn_remove).css('display', '');
		  }
	});
}
function removeImage(that,image_preview){
	$("#"+image_preview).attr('src','').removeClass('border border-info rounded');
	$(that).siblings('input[type="file"]').val("");
	$(that).css('display', 'none');
}
function goBack() {
   window.history.back();
}
$(".menu-mobile").click(function(){
	$(this).children('i').toggleClass('fa-align-right fa-bars');
})
$(".btn-y-cmt").click(function(event) {
	$(".box-y-cmt").slideToggle(500);
	$([document.documentElement, document.body]).animate({
        scrollTop: $(".box-y-cmt").offset().top - 50
    }, 2000);
});
$(".view-cmt").click(function(event) {
	$([document.documentElement, document.body]).animate({
        scrollTop: $(".btn-y-cmt").offset().top - 50
    }, 2000);
});
$(".read-more").click(function(){
	$(this).siblings('.cmt-more').css('display','');
	$(this).css('display', 'none');
});
$(".cmt-hidden").click(function(){
	$(this).siblings('.cmt-more').css('display', 'none');
	$(this).css('display', 'none');
	$(this).siblings(".read-more").css('display', '');
});

//load more content comment
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
    	enabledLoader();
            let comment_html = `
            	<div class="my-2 px-2 box-cmt">
					<div class="row">
						<div class="col-2 p-0 m-0">
							<figure class="text-center">
								<img src="http://localhost:8000/web/images/ava.jpg" class="ava-cmt"  alt="">
								<figcaption><span>thieusumo</span><p>1 giờ trước</p></figcaption>
							</figure>
						</div>
						<div class="col-10">
									<i class="fa fa-star star" aria-hidden="true"></i>
									<i class="fa fa-star star" aria-hidden="true"></i>
									<i class="fa fa-star star" aria-hidden="true"></i>
									<i class="fa fa-star star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
							<p>
								Đây là loại bình mà tôi dùng để ở bàn ăn của gia đình. Bình thiết kế đơn giản, hài hòa với căn bếp của gia đình tôi. Dung tích khá lớn, chứa được 1,3 lít nước, khi đổ nước nóng hay nước lạnh vào không gây nứt bình như những loại bình khác.
							</p>
						</div>
					</div>
					
				</div>
            `;
            $(".box-cmt:last").after(comment_html);
            disabledLoader();
    }
});
$(window).scroll(function() {
    if($(window).scrollTop() > $(window).height()) 
        $(".move-top").show();
    else
    	$('.move-top').hide();
});
$(".move-top").click(function(){
	$(window).scrollTop(0);
});
function enabledLoader(){
	$('.content-body').css('opacity', '.3');
	$(".loader").show();
}
function disabledLoader(){
	$('.content-body').css('opacity', '1');
	$(".loader").hide();
}