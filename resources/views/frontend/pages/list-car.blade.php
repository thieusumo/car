@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.search-sec{
        position: initial!important;
    }
</style>
@endsection
@section('content')

@include('frontend.layouts.partials.google-ads-top')
</section>
@include('frontend.layouts.partials.search-bar')
<div class="row mt-1" style="margin-right: 0px;margin-left: 0px">
	@include('frontend.layouts.partials.google-ads-left')
	<div class="col-md-8 mx-0 px-0 content-detail">
		@if(isset($cars) && $cars->count() > 0)
		<h4 class="text-center">Tuyến - <span class="text-uppercase">{{ $name }}</span></h4>
			<p class="text-danger text-center">(*Nhấn vào tên Nhà xe để xem chi tiết)</p>
			@if(isset($search_chieu) || isset($search_date) || isset($search_clock) )
				<p>TÌM KIẾM THEO:
				@if(isset($search_chieu))
					 Chiều: <span class="text-primary">
					 	@if($search_chieu == 'di')
					 		Từ Nam Định
					 	@else
					 		Về Nam Định
					 	@endif
					 </span>
				@endif
				@if(isset($search_clock))
					Lúc: <span class="text-primary">{{ $search_clock }}</span>
				@endif
				@if(isset($search_date))
					Ngày: <span class="text-primary">{{ $search_date }}</span>
				@endif
				</p>
			@endif 
			<table class="table table-sm table-hover table-striped table-reponse" id="car-type-table">
				<thead class="bg-info" >
					<tr>
						<th>Nhà Xe</th>
						<th>Bến Xe</th>
						<th class="text-center">Xếp Hạng</th>
						<th>Liên Hệ</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cars as $car)
					<tr>
						<td class="text-capitalize">
							<a href="{{ route('route',[$slug,$car->slug]) }}" title=""><b>{{ $car->name }}</b></a>
						</td>
						<td class="text-capitalize">{{ $car->station_go.'-'.$car->station_back }}</td>
						<td class="text-center star-box">
								@for($i=1;$i<6;$i++)
	                                @if($i > intval($car->stars) )
	                                    <span style="position: relative;">
	                                        <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star star" style="position: absolute;width: {{ (($car->stars)-intval($car->stars))*100 }}%;top: 0px;left: 0px;overflow: hidden" aria-hidden="true"></i></span>
	                                @else
	                                    <i class="fa fa-star star" aria-hidden="true"></i>
	                                @endif
	                            @endfor
						</td>
						<td>
							@php
								$car_phones = explode(';',$car->phone);	
							@endphp
							@foreach($car_phones as $phone)
								{{ $phone }}<br>
							@endforeach
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="card-footer py-2">
	            <nav class="d-flex justify-content-end" aria-label="...">
	                {{ $cars->links() }}
	            </nav>
	        </div>

		@else
			<p class="text-center" style="font-size: 20px">Danh sách xe trống<span class="text-uppercase text-info">{{ $name }}</span>.</p>
			<p class="text-center" style="font-size: 20px">Nếu bạn sở hữu xe thì có thể tự thêm theo hướng dẫn <span class="text-info">tại đây</span></p>
		@endif
	</div>
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-right')
	{{-- end google ads --}}
</div>
@include('frontend.layouts.partials.google-ads-bottom')
	
@endsection
@routes
@section('script')
<script>
	{{-- var slug = '{{ $slug }}'; --}}
</script>
{{-- <script src="{{ asset('web/js/car_type.js') }}" type="text/javascript"></script> --}}
@endsection