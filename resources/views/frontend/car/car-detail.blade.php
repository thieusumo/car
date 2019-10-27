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
	<div class="col-md-8 row">
		<div class="col-md-6 text-center">
			<img src="{{ asset('web/images/nhuy.jpg') }}" class="w-100 " alt="">
		</div>
		<div class="col-md-6">
			<h4>NGỌC HÂN</h4>
			<p>Tuyến: <b>Nam Định-Hà Nội</b></p>
			<p>Lộ Trình: <b>Ngĩa Hải-Nghĩa Hưng-Giáp Bát-Hà Nội</b></p>
			<p>Xuất Bến: <b>Nghĩa Hải: 08:00 - Giáp Bát: 13:00</b></p>
			<p>Ngày Đi: <b>Tất Cả Các Ngày</b></p>
			<p>Liên Hệ: <b>0988934262</b></p>
			<p>Đánh giá: <b>5 sao</b></p>
		</div>
		<div class="col-md-12 row">
			<div class="fb-comments" data-href="{{ route('chi-tiet.show',$id) }}" data-width="100%" data-numposts="5"></div>
		</div>
		
	</div>
	{{-- google ads --}}
	@include('frontend.layouts.partials.google-ads-1')
	{{-- end google ads --}}
</div>
	
@endsection