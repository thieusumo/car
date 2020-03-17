@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.search-sec{
        position: initial!important;
    }
    .star{
    	color: yellow;
    }
</style>
@endsection
@section('content')

{{-- google ads --}}
@include('frontend.layouts.partials.google-ads-2')
{{--include search bar --}}
{{-- @include('frontend.layouts.partials.search-bar') --}}
{{--end include search bar --}}
<div class="row mt-5" style="margin-right: 0px; margin-left: 0px">
	{{-- google ads --}}
		@include('frontend.layouts.partials.google-ads-1')
	
	{{-- end google ads --}}
	<div class="col-md-8 row">
		<div class="col-md-6 col-sm-12 text-center">
			<img src="{{ asset('web/images/bg.jpg') }}" class="w-100 " alt="">
		</div>
		<div class="col-md-6 col-sm-12">
			<h4>NGỌC HÂN</h4>
			<p>Tuyến: <b>Nam Định-Hà Nội</b></p>
			<p>Lộ Trình: <b>Ngĩa Hải-Nghĩa Hưng-Giáp Bát-Hà Nội</b></p>
			<p>Xuất Bến: <b>Nghĩa Hải: 08:00 - Giáp Bát: 13:00</b></p>
			<p>Ngày Đi: <b>Tất Cả Các Ngày</b></p>
			<p>Liên Hệ: <b>0988934262</b></p>
			<p>Xếp Hạng: 
				@for($i=1;$i<6;$i++)
					<i class="fa fa-star star" aria-hidden="true"></i>
				@endfor
			</p>
		</div>
		
	</div>
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="row">
				<img src="https://i.pravatar.cc/" style="border-radius: 50%;width: 30px" alt="">
				thieusumo
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
			</div>
			
			<p>Nhà xe chất lượng, phục vụ nhiệt tình</p>
		</div>
		<div class="col-md-12">
			<div class="row">
				<img src="https://i.pravatar.cc/" style="border-radius: 50%;width: 30px" alt="">
				thieusumo
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
			</div>
			
			<p>Nhà xe chất lượng, phục vụ nhiệt tình</p>
		</div>
		<div class="col-md-12">
			<div class="row">
				<img src="https://i.pravatar.cc/" style="border-radius: 50%;width: 30px" alt="">
				thieusumo
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
			</div>
			
			<p>Nhà xe chất lượng, phục vụ nhiệt tình</p>
		</div>
		<div class="col-md-12">
			<div class="row">
				<img src="https://i.pravatar.cc/" style="border-radius: 50%;width: 30px" alt="">
				thieusumo
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
			</div>
			
			<p>Nhà xe chất lượng, phục vụ nhiệt tình</p>
		</div>
		<div class="col-md-12">
			<div class="row">
				<img src="https://i.pravatar.cc/" style="border-radius: 50%;width: 30px" alt="">
				thieusumo
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
			</div>
			
			<p>Nhà xe chất lượng, phục vụ nhiệt tình</p>
		</div>
	</div>
	<div class="col-md-12" >
		<h4>Đánh Giá</h4>
		@for($i=1;$i<6;$i++)
			<i class="fa fa-star" aria-hidden="true"></i>
		@endfor
		<textarea name="" class="form-control form-control-sm" rows="5" placeholder="Bình luận"></textarea>
		<input type="button" class="btn btn-primary btn-sm my-1" value="Gửi" name="">
	</div>
	{{-- google ads --}}
		@include('frontend.layouts.partials.google-ads-1')
	
	{{-- end google ads --}}
</div>
</section>
	
@endsection