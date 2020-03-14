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
@include('frontend.layouts.partials.google-ads-2')
{{-- end google ads --}}
</section>
{{--include search bar --}}
@include('frontend.layouts.partials.search-bar')
{{--end include search bar --}}
<div class="row mt-5">
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-1')
	{{-- end google ads --}}
	<div class="col-md-8">

		<table class="table table-hover table-striped table-reponse">
			<thead class="thead-dark">
				<tr>
					<th>Nhà Xe</th>
					<th>Bến Xe</th>
					<th>Tuyến</th>
					<th>Liên Hệ</th>
					<th class="text-center">Chi Tiết</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cars as $car)
				<tr>
					<td class="text-capitalize"><b>{{ $car->name }}</b></td>
					<td class="text-capitalize">{{ $car->station_go.'-'.$car->station_back }}</td>
					<td>{{ $car->getRoute->name }}</td>
					<td>
						@php
							$car_phones = explode(';',$car->phone);	
						@endphp
						@foreach($car_phones as $phone)
							{{ $phone }}<br>
						@endforeach
					</td>
					<td class="text-center">
						<a href="{{ route('chi-tiet.show',[$car->getTypeCar->slug,$car->slug]) }}" title="">
							<button class="btn btn-sm btn-info" type="button">Xem</button>
						</a>
					</td>
				</tr>
				@endforeach
		</table>
		<div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $cars->links() }}
                    </nav>
                </div>
	</div>
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-1')
	{{-- end google ads --}}
</div>
	
@endsection