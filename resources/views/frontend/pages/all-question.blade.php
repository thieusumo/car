@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.vote-star{
		font-size: 30px;
	}
</style>
@endsection
@section('content')
@include('frontend.layouts.partials.image-modal')
@include('frontend.layouts.partials.modal')
@include('frontend.layouts.partials.google-ads-top')
<div class="row mt-2" style="margin-right: 0px; margin-left: 0px">
		@include('frontend.layouts.partials.google-ads-left')
	<div class="col-md-8 content-detail">
		<div class="detail-content">
			<h4>{{ $car->name }}</h4><span hidden id="c-id">{{ $car->id }}</span>
			<p>
				@for($i=1;$i<6;$i++)
				    @if($i > intval($car->stars) )
				    	<span style="position: relative;">
							<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star star" style="position: absolute;width: {{ (($car->stars)-intval($car->stars))*100 }}%;top: 0px;left: 0px;overflow: hidden" aria-hidden="true"></i></span>
					@else
						<i class="fa fa-star star" aria-hidden="true"></i>
					@endif
				@endfor
			<p>Tuyến: <b>{{ $car->getRoute->name }}</b></p>
			<p>Lộ Trình: <b>{{ $car->line }}</b></p>
			<p>Xuất Bến: <b>{{ $car->station_go }}: {{ $car->time_go }} - {{ $car->station_back }}: {{ $car->time_back }}</b></p>
			<p>Ngày Đi: <b>Tất Cả Các Ngày</b></p>
			<p>Liên Hệ:
				<div>
					@foreach(explode(';',$car->phone) as $phone)
						{{ $phone }}<br>
					@endforeach
				</div>
			</p>
		</div>
		<h5 class="title-content">Tất cả câu hỏi đã được trả lời<sup class="text-danger">({{ $question['questions']->count() }})</sup></h5>
		<div class="detail-content">
			<div class="input-group my-2">
			    <input type="text" name="ques" class="form-control form-control-sm" placeholder="Hãy đặt câu hỏi liên quan đến nhà xe">
				<div class="input-group-append">
					<button class="btn btn-sm btn-warning sub-que" type="submit">Gửi câu hỏi</button>
				</div>
			</div>
			<hr>
			@foreach($question['questions'] as $q)
				<div class="ans-box mb-2">
					<span class="fa fa-question-circle-o text-danger"></span><span class=""> {!! shorterString($q->question,30) !!}</span>
					@if($q->answer != null)
						<p class="ans-content">
							<span class="fa fa-hand-o-right text-primary"></span>
							{!! shorterString($q->answer->answer,30) !!}
						</p>
						<i class="ans-content">Trả lời ngày {{ $q->answer->updated_at }}</i>
					@endif
				</div>
			@endforeach
		</div>
	</div>
	{{-- google ads --}}
		@include('frontend.layouts.partials.google-ads-right')
	{{-- end google ads --}}
</div>
@include('frontend.layouts.partials.google-ads-bottom')
</section>
	
@endsection
@section('script')
<script>
	
</script>
<script src="{{ asset('web/js/car_detail.js') }}" type="text/javascript"></script>

@endsection