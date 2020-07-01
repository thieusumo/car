@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.vote-star{
		font-size: 30px;
	}
	.card-body span{
		text-indent: 10px;
	}
	.card-body{
		padding: 0;
	}
</style>
@endsection
@section('content')
@include('frontend.layouts.partials.image-modal')
@include('frontend.layouts.partials.modal')
@include('frontend.layouts.partials.google-ads-top')
<div class="row mt-1" style="margin-right: 0px; margin-left: 0px">
		@include('frontend.layouts.partials.google-ads-left')
	<div class="col-md-8 content-detail">
		<div class="detail-content">
			Số câu hỏi chưa trả lời <span class="text-danger">{{ $not_active_question->count() }}</span>
			<div id="accordion">
				@foreach($questions as $key => $question)
			    <div class="">
			    	@if( isset($question->answer->answer) )
			       		<div class="card-header" style="background-color: rgba(0, 0, 0, 0.03);">
			       			<a class="card-link" data-toggle="collapse" href="#question_{{ $key }}">
			        		<span class="fa fa-check text-success"></span>
			       	@else
			       		<div class="card-header bg-secondary text-white">
			       			<a class="card-link" data-toggle="collapse" href="#question_{{ $key }}">
			        		<span class="fa fa-close text-danger"></span>
			       	@endif
			          	{{ $question->questioner->name}} - <span class="text-grey">{{ $question->created_at }}</span>
			        	</a>
			     	 </div>
			     	<div id="question_{{ $key }}" class="collapse" data-parent="#accordion">
			       		<div class="card-body">
			          		<div class="border-bottom">
			          			<span class="fa fa-question-circle-o text-danger"></span> {{ $question->question }}
			          		</div>
			          		@if(isset($question->answer->answer))
			          			<span class="fa fa-hand-o-right text-primary"></span> {{ $question->answer->answer }}<br>
			          			<i>Trả lời vào ngày: {{ $question->answer->created_at->format('H:i:s, d/m/Y') }}</i>
			          		@else
			          			<form  method="" accept-charset="utf-8">
			          				@csrf
			          				<fieldset class="rounded">
		          						<legend>Trả lời</legend>
		          						<div class="form-group">
				          					<textarea name="answer" class="form-control answer"></textarea>
				          				</div>
				          				<input type="hidden" name="question_id" value="{{ $question->id }}">
				          				<input type="hidden" name="car_id" value="{{ $id }}">
				          				<div class="form-group">
				          					<button type="button" class="btn btn-primary btn-sm float-right submit-answer">Gửi</button>
				          				</div>
		          					</fieldset>
			          			</form>
			          		@endif
			        	</div>
			      	</div>
			    </div>
			    @endforeach
			    {{-- <div class="">
			      <div class="card-header">
			        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
			        Collapsible Group Item #2
			      </a>
			      </div>
			      <div id="collapseTwo" class="collapse" data-parent="#accordion">
			        <div class="card-body">
			          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			        </div>
			      </div>
			    </div>
			    <div class="">
			      <div class="card-header">
			        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
			          Collapsible Group Item #3
			        </a>
			      </div>
			      <div id="collapseThree" class="collapse" data-parent="#accordion">
			        <div class="card-body">
			          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			        </div>
			      </div>
			    </div> --}}
			</div>
		</div>
	</div>
	{{-- google ads --}}
		@include('frontend.layouts.partials.google-ads-right')
	{{-- end google ads --}}
</div>
</section>
	@include('frontend.layouts.partials.google-ads-bottom')
@endsection
@routes
@section('script')
<script>
	var ci;
	$(document).ready(function() {
		$(".submit-answer").click(function(){
			var formData = new FormData($(this).parents('form')[0]);
			console.log(formData);
			var answer = $(this).parents('form').find('.answer').val();
			if(answer == ""){
				$.notify('Viết câu trả lời!',{type:'danger'});
				return;
			}else{
				$.ajax({
					url: '{{ route('fronted.message.save') }}',
					type: 'POST',
					dataType: 'html',
					data: formData,
					processData: false,
                    contentType: false,
				})
				.done(function(data) {
					data = JSON.parse(data);
					$.notify(data.message,{type: data.status});
					if(data.status == 'success')
						// location.reload();
						window.location.href = window.location.href;
					console.log(data);
				})
				.fail(function() {
					console.log("error");
				});
				
			}
		});
	});
</script>

<script src="{{ asset('web/js/car_detail.js') }}" type="text/javascript"></script>

@endsection