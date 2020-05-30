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
		<h5 class="title-content">Tất cả đánh giá</h5>
		<div class="detail-content">
			<ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Tất cả<sup class="text-danger">({{ $comment_list['all']->count() }})</sup></a>
              </li>
              @for($i=5;$i>0;$i--)
	              <li class="nav-item">
	                <a class="nav-link" data-toggle="tab" href="#star_{{ $i }}">{{ $i }}<i class="fa fa-star star" aria-hidden="true"></i><sup class="text-danger">({{ $comment_list['star_'.$i]->count() }})</sup></a>
	              </li>
              @endfor
            </ul>
            <div class="tab-content" style="max-height: 33em;overflow-y: auto" id="cs-box">
	            <div id="home" class="container tab-pane active"><br>
	                @foreach($comment_list['all'] as $cmt)
						<div class="my-2 px-2 box-cmt">
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
	            </div>
	            @for($j=5;$j>0;$j--)
		            <div id="star_{{ $j }}" class="container tab-pane fade"><br>
		                @foreach($comment_list['star_'.$j] as $cmt)
							<div class="my-2 px-2 box-cmt">
								<div class="row">
									<div class="col-2 p-0 m-0">
										<figure class="text-center">
											<img src="{{ asset('web/images/ava.jpg') }}" class="ava-cmt"  alt="">
											<figcaption><span>{{ $cmt->customers->name }}</span>
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
		            </div>
	            @endfor
	        </div>
		</div>
	</div>
		@include('frontend.layouts.partials.google-ads-right')
</div>
</section>
	@include('frontend.layouts.partials.google-ads-bottom')
@endsection
@section('script')
<script>
	
</script>
<script src="{{ asset('web/js/car_detail.js') }}" type="text/javascript"></script>

@endsection