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
<div class="row mt-1" style="margin-right: 0px; margin-left: 0px">
		@include('frontend.layouts.partials.google-ads-left')
	<div class="col-md-8 content-detail">
		<div class="row detail-content">
			<div class="col-md-6 col-sm-12 text-center">
				<img src="{{ asset($car->ava ?? 'web/images/ava-default.jpg') }}" class="w-100 mb-1" alt="">
				@php
					// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$actual_link = 'https://www.facebook.com/thieu.100/';
				@endphp
				<div class="fb-share-button float-left" data-href="{{ $actual_link }}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ str_replace(':','%3A',str_replace('/','%2F',$actual_link)) }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
			</div>
			<div class="col-md-6 col-sm-12">
				<h4>Nhà xe {{ $car->name }}</h4><span hidden id="c-id">{{ $car->id }}</span>
				<p>
					@for($i=1;$i<6;$i++)
					    @if($i > intval($car->stars) )
					    	<span style="position: relative;">
								<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star star" style="position: absolute;width: {{ (($car->stars)-intval($car->stars))*100 }}%;top: 0px;left: 0px;overflow: hidden" aria-hidden="true"></i></span>
						@else
							<i class="fa fa-star star" aria-hidden="true"></i>
						@endif
					@endfor
					<span class="view-cmt text-info">
						(
						@if($comment_list['total'] > 0)
							Xem
						@endif
							{{ $comment_list['total'] }} đánh giá )
					</span>
				</p>
				<p>Tuyến: <b>{{ $name }}</b></p>
				@if($car->car_type == 1)
					<p>Lộ Trình: <b>{{ $car->line }}</b></p>
					<p>Xuất Bến: <b>{{ $car->station_go }}: {{ $car->time_go }} - {{ $car->station_back }}: {{ $car->time_back }}</b></p>
					<fieldset class="rounded">
						<legend>Thời gian đi:</legend>
						<p>Giờ đi: <b>{{ \Carbon\Carbon::parse($times->first()->go)->format('H:i') }}</b></p>
						<p>Ngày Đi:
							@if($times->count() == 31)
								<b>Tất cả các ngày</b>
							@else
								@foreach($times as $time)
								<b>{{ \Carbon\Carbon::parse($time->go)->format('d') }}</b> - 
								@endforeach
							@endif
						</p>
					</fieldset>
					<fieldset class="rounded">
						<legend>Thời gian về:</legend>
						<p>Giờ về: <b>{{ \Carbon\Carbon::parse($times->first()->back)->format('H:i') }}</b></p>
						<p>Ngày Về:
							@if($times->count() == 31)
								<b>Tất cả các ngày</b>
							@else
								@foreach($times as $time)
								<b>{{ \Carbon\Carbon::parse($time->back)->format('d') }}</b> - 
								@endforeach
							@endif
						</p>
							
					</fieldset>
					@if($car->description != "")
					<p>Thông tin thêm: <b>{{ $car->description }}</b></p>
					@endif
				@else
					<p>Địa chỉ: <b>{{ $car->address }}</b></p>
					<p>Dịch vụ: <b>{{ $car->description }}</b></p>
				@endif
				<p>Liên Hệ:
					<div>
						@foreach(explode(';',$car->phone) as $phone)
							@if($phone != "")
								<p style="text-indent: 10px"><b>{{ $phone }}</b></p>
							@endif
						@endforeach
					</div>
				</p>
				<p class="report-info">
					<i class="fa fa-comment" aria-hidden="true"></i>
						Phản ánh thông tin nhà xe không chính xác
				</p>
				<button type="button" class="btn btn-sm btn-info"><a href="{{ route('frontend.chating',$car->customer->id) }}" class="text-white" title=""><i class="fa fa-envelope"></i> Nhắn tin</a></button>
			</div>
		</div>
		<h5 class="title-content">Một số hình ảnh nhà xe<sup class="text-danger">({{ $car_file->count() }})</sup></h5>
		<div class="detail-content">
			<div id="car_files" class="carousel slide" data-ride="carousel">
		  
		  @php
		  	$count = $car_file->count();
		  	$stt = 0;
		  @endphp
		  <!-- The slideshow -->
		  <div class="carousel-inner box-more-image">
		  	@foreach($car_file->chunk(3) as $key => $files)
		  	@if($key == 0)
		    	<div class="carousel-item col-md-12 active">
		    @else
		    	<div class="carousel-item col-md-12">
		    @endif
		    	<div class="row">
		    		@foreach($files as $file)
		    		<div class="col-4 px-1 contain-image">
			    		<img src="{{ asset($file->image_src) }}" id="img-{{ $stt }}" pos="{{ $stt }}" alt="Los Angeles" class="more-image">
			    	</div>
			    	@php
			    		$stt++;
			    	@endphp
			    	@endforeach
		    	</div>
		    </div>
		    @endforeach
		  </div>
		  
		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#car_files" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#car_files" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>
		</div>

		</div>
		<h5 class="title-content">Hỏi, đáp về nhà xe<sup class="text-danger">({{ $question['total'] }})</sup></h5>
		<div class="detail-content">
			@foreach($question['questions'] as $q)
				<div class="ans-box">
					<span class="fa fa-question-circle-o text-danger"></span><span class=""> {!! shorterString($q->question,30) !!}</span>
					@if($q->answer != null)
						<p class="ans-content">
							<span class="fa fa-hand-o-right text-primary"></span>
							{!! shorterString($q->answer->answer,30) !!}
						</p>
						<i class="ans-content">Trả lời ngày {{ $q->answer->updated_at->format('m/d/Y') }}</i>
					@endif
				</div>
			@endforeach
			@if($question['total'] > 0 && $question['total'] > 5)
				<span class="text-primary"><a href="{{ route('frontend.customer.all_question',$car->id) }}" title="">Xem tất cả câu hỏi đã được trả lời <i class="fa fa-motorcycle" aria-hidden="true"></i></a></span>
			@endif
			<div class="input-group my-2">
			    <input type="text" name="ques" class="form-control form-control-sm" placeholder="Hãy đặt câu hỏi liên quan đến nhà xe">
				<div class="input-group-append">
					<button class="btn btn-sm btn-warning sub-que" type="submit">Gửi câu hỏi</button>
				</div>
			</div>
		</div>
		<div class="detail-content box-y-cmt" >
			<h5 class="text-uppercase">Đánh Giá Của bạn</h5>
			<h6 class="rating-star my-2">
				<span class="mr-2">Số sao: </span>
				@for($i=1;$i<6;$i++)
					@if($i == 1)
						<i class="fa fa-star-o vote-star" aria-hidden="true"></i>
					@else
						<i class="fa fa-star-o vote-star" aria-hidden="true"></i>
					@endif
				@endfor
			</h6>
				
			<textarea id="u-cmt" class="form-control form-control-sm" name="comment" rows="5" placeholder="Nhận xét của bạn"></textarea>
			Mẫu nhận xét: 
			<span class="badge badge-danger ml-2 ex-cmt">Phục vụ kém</span>
			<span class="badge badge-danger ml-2 ex-cmt">Chất lượng xe kém</span>
			<span class="badge badge-info ml-2 ex-cmt">Chất lượng tốt</span>
			<span class="badge badge-info ml-2 ex-cmt">Nhà xe nhiệt tình</span>
			<span class="badge badge-info ml-2 ex-cmt">Nhân viên thân thiện</span>
			<br>
			<input type="button" class="btn btn-warning btn-sm my-1 sub-cmt" value="Gửi nhận xét" name="">
		</div>

		<h5 class="title-content">khách hàng nhận xét<sup class="text-danger">({{ $comment_list['total'] }})</sup></h5>
		<div class="detail-content" >
			<div class="row text-center pb-2 ans-box">
				<div class="col-md-4">
					<span>Đánh giá trung bình</span>
					<h4 class="text-danger">{{ $car->stars==intval($car->stars)?intval($car->stars):$car->stars }}/5</h4>
					@for($i=1;$i<6;$i++)
					    @if($i > intval($car->stars) )
					    	<span style="position: relative;">
								<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star star" style="position: absolute;width: {{ (($car->stars)-intval($car->stars))*100 }}%;top: 0px;left: 0px;overflow: hidden" aria-hidden="true"></i></span>
						@else
							<i class="fa fa-star star" aria-hidden="true"></i>
						@endif
					@endfor
				</div>
				<div class="col-md-4">
					@for($i=5;$i>0;$i--)
					<div class="row my-1 star-line" style="line-height: 10px">
						<div class="col-1 px-0">
							{{ $i }}<i class="fa fa-star star" aria-hidden="true"></i>
						</div>
						
						<div class="progress col-11 px-0">
						    <div class="progress-bar bg-success" style="width:{{ $rating_percent['percent_'.$i.''] }}%">{{ $rating_percent['percent_'.$i.''] }}%</div>
						</div>
					</div>
					@endfor
				</div>
				<div class="col-md-4">
					<p>Chia sẻ nhận xét về nhà xe</p>
					<button class="btn btn-sm btn-warning btn-y-cmt">Viết nhận xét của bạn</button>
				</div>
			</div>
			@foreach($comment_list['result'] as $cmt)
				<div class="my-2 px-2">
				<div class="row">
					<div class="col-2 p-0 m-0">
						<figure class="text-center">
							<img src="{{ asset('web/images/ava.jpg') }}" class="ava-cmt"  alt="">
							<figcaption><span>{{ $cmt->customers->name }}</span>
								{{-- <p>{{ $cmt->updated_at->diffForHumans() }}</p> --}}
							</figcaption>
						</figure>
					</div>
					<div class="col-10">
						@for($i=1;$i<6;$i++)
							@if($i<=$cmt->star)
								<i class="fa fa-star star" aria-hidden="true"></i>
							@else
								<i class="fa fa-star-o" aria-hidden="true"></i>
							@endif
						@endfor
						<span style="font-size: 12px;" class="text-secondary ml-2">{{ $cmt->updated_at->diffForHumans() }}</span>
						<p>
							{!! shorterString($cmt->comment,50) !!}
						</p>
					</div>
				</div>
			</div>
			@endforeach
			@if($comment_list['total'] > 0 && $comment_list['total'] > 10)
				<span class="text-primary"><a href="{{ route('frontend.customer.all_rating',$car->id) }}" title="">Xem tất cả nhận xét <i class="fa fa-motorcycle" aria-hidden="true"></i></a></span>
			@endif
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
	var ci = {{ $count }};
	$(document).ready(function() {

	});
</script>

<script src="{{ asset('web/js/car_detail.js') }}" type="text/javascript"></script>

@endsection