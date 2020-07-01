@extends('layouts.app',['page' => __('Image Management'), 'pageSlug' => 'image_management'])
@section('style')
<style>
    .more-image-upload{
        object-fit: cover;
        border-radius: 10px;
        margin: 3px;
        width: 100px;
        height: 100px;
    }
    #more-image-box, #more-image-old{
        padding: 2px;
        background-color: #e9ebee;
    }
    .remove-more-image,.remove-more-old{
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
</style>
@endsection
@section('content')
<h4 class="text-capitalize">Nhà Xe: {{ $car_files->name }}</h4>
<form>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Avatar') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button class="btn btn-sm btn-primary" onclick="changeImage(this,'file','ava','btn-remove')" type="button">{{ $car_files->ava!=""?'Change':'Upload' }}</button>
                            <button style="display: none" class="btn btn-sm btn-danger btn-remove">Cancel</button>
                            <input type="file" hidden id="file" accept="image/*" name="ava" value="" placeholder="">
                            @if($car_files->ava != "")
                                <input type="hidden" name="old-ava" id="old-ava" value="{{ asset($car_files->ava) }}" placeholder="">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <img id="ava" style="max-height: 200px" src="{{ $car_files->ava!=""?asset($car_files->ava):"" }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('More Image') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="more-image-old">
                            @foreach($car_files->files as $file)
                                <span class="b-img-upload">
                                    <img src="{{ asset($file->image_src) }}"  class="more-image-upload"/>
                                    <span class="glyphicon glyphicon-remove text-center text-white remove-more-old" id-image="{{ $file->id }}" p="">x</span>
                                </span>
                            @endforeach
                        </div>
                        <button class="btn btn-sm btn-primary" onclick="changeMultiImage('more-image')" type="button">{{ $car_files->files->count() > 0?'Upload More':'Upload' }}</button>
                        <input type="file" hidden id="more-image" name="more-image[]" accept="image/*" name="ava" multiple value="" placeholder="">
                        <div id="more-image-box" class="rounded"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body text-right">
                    <button type="button" class="btn btn-sm btn-success btn-submit">Submit</button>
                    <a href="{{ route('car.index') }}" title=""><button type="button" class="btn btn-sm btn-danger btn-cancel">Cancel</button></a>
                </div>
                    
            </div>
        </div>
    </div>
</form>
@endsection
@push('js')
@routes
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
        $(".btn-submit").click(function(){
            var formData = new FormData($(this).parents('form')[0]);
            $.each(image_files, function(index, val) {
                formData.append('more_image[]',val);
            });
            formData.append('_token','{{ csrf_token() }}');
            $.ajax({
                url:route('images.store'),
                type: 'POST',
                dataType: 'json',
                data: formData, 
                processData: false,
                contentType: false,
            })
            .done(function(data) {
                console.log(data);

                // if(typeof(data.message)  == 'string')
                //     $.notify(data.message,{type:data.status});

                // else{
                //     $([document.documentElement, document.body]).animate({
                //         scrollTop: $(".content-detail").offset().top-10
                //     }, 1000);
                //     var error = '';
                //     $.each(data.message, function(index, val) {
                //         error += "<li> - "+val+"</li>";
                //     });
                //     $(".message-errors").css('display', '');
                //     $(".error-box").html(error);
                // }
                $.notify(data.message, {type: data.status});
                if(data.status == 'success')
                    window.location.href = window.location.href;
            })
            .fail(function() {
                $.notify('Lỗi',{type:'danger'});
            });
        });
    });
	$(document).ready(function(){
        $(".btn-remove").click(function(){
            var old_ava = $('#old-ava').val();
            $("#file").val("");

            if(old_ava == undefined)
                $("#ava").attr('src','');
            else
                $("#ava").attr('src',old_ava);
            $(this).css('display', 'none');
        });
        $(".remove-more-old").click(function(){
            if(confirm('Do you want to delete this image?')){
                var img = $(this);
                var id = img.attr('id-image');
                $.ajax({
                    url:route('images.destroy',id),
                    type: 'DELETE',
                    dataType: 'json',
                    data: {_token: $("meta[name=csrf-token]").attr('content')},
                })
                .done(function(data) {
                    $.notify(data.message, {type: data.status});
                    if(data.status == 'success')
                        img.parent('span').remove();
                    console.log(data);
                })
                .fail(function() {
                    $.notify('Error',{type:'danger'});
                });
            }else{
                return;
            }
        });

	});
</script>
@endpush
