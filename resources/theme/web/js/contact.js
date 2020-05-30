 $(".btn-gui").click(function(){
    var content = $('#textarea').val();

    if(content.trim().length < 50){
        $.notify('Lỗi. Nội dung ít nhất 50 kí tự!',{type:'danger'});
        return;
    }else{
        $(this).parents('form').submit();
    }
})