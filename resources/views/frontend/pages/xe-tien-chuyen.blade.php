@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.search-sec{
        position: initial!important;
    }
</style>
@endsection
@section('content')

{{-- google ads --}}
@include('frontend.layouts.partials.google-ads-top')
{{-- end google ads --}}
</section>
{{--include search bar --}}
@include('frontend.layouts.partials.search-bar')
{{--end include search bar --}}
<div class="row mt-5" style="margin-right: 0px;margin-left: 0px">
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-left')
	{{-- end google ads --}}
	<div class="col-md-8 mx-0 px-0">

		<table class="table table-hover table-striped table-reponse" id="car-type-table">
			<thead class="bg-info" >
				<tr>
					<th>Nhà Xe</th>
					<th>Khu Vực</th>
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
		<div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $cars->links() }}
                    </nav>
                </div>
	</div>
	@include('frontend.layouts.partials.google-ads-right')
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