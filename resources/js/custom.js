function goBack() {
   window.history.back();
}
$(document).on("click",".submit-comment",function(){
	alert('ok');
});

$(".menu-mobile").click(function(){
	$(this).children('i').toggleClass('fa-align-right fa-bars');
})