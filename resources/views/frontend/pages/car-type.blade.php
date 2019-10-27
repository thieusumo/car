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
			<thead class="thead-light">
				<tr>
					<th>Nhà Xe</th>
					<th>Bến Xe</th>
					<th>Tuyến</th>
					<th>Liên Hệ</th>
					<th>Chi Tiết</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td class="text-center">
						<a href="{{ route('chi-tiet.show',1) }}" title="">
							<button class="btn btn-sm btn-info" type="button">Xem</button>
						</a>
					</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
			</tbody>
		</table>
	</div>
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-1')
	{{-- end google ads --}}
</div>
	
@endsection