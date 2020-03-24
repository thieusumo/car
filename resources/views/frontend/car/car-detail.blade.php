@extends('frontend.layouts.master')
@section('style')
<style type="text/css" media="screen">
	.search-sec{
        position: initial!important;
    }
    .title-content{
    	margin: 0 0.5em;
    	text-transform: uppercase;
    }
    .ans-content{
    	padding-left: 10px
    }
    .ans-box{
    	border-bottom: 1px solid #f4f4f4;
    }
    .progress{
    	height: .8rem;
    }
    .report-info:hover{
    	color: green;
    }
    .report-info{
    	color: #17a2b8;
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
	<div class="col-md-8 content-detail">
		<div class="row detail-content">
			<div class="col-md-6 col-sm-12 text-center">
				<img src="{{ asset('web/images/bg.jpg') }}" class="w-100 " alt="">
			</div>
			<div class="col-md-6 col-sm-12">
				<h4>{{ $car->name }}</h4>
				<p>
					@for($i=1;$i<6;$i++)
					    @if($i > $car->stars )
							<i class="fa fa-star-o" aria-hidden="true"></i>
						@else
							<i class="fa fa-star star" aria-hidden="true"></i>
						@endif
					@endfor
					<span class="view-cmt text-info">(Xem 4 đánh giá)</span>
				</p>
				<p>Tuyến: <b>{{ $name }}</b></p>
				<p>Lộ Trình: <b>{{ $car->line }}</b></p>
				<p>Xuất Bến: <b>{{ $car->station_go }}: {{ $car->time_go }} - {{ $car->station_back }}: {{ $car->time_back }}</b></p>
				<p>Ngày Đi: <b>Tất Cả Các Ngày</b></p>
				<p>Liên Hệ:
					<div>
						@foreach(explode(';',$car->phone) as $phone)
							{{ $phone }}
						@endforeach
					</div>
				</p>
				<span class="report-info">
					<i class="fa fa-comment" aria-hidden="true"></i>
						Phản ánh thông tin nhà xe không chính xác
				</span>
			</div>
		</div>
		<div class="detail-content">
			<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item col-md-12 active">
    	<div class="row">
    		<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
    	</div>
    </div>
    <div class="carousel-item">
    	<div class="row">
    		<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
    	</div>
    </div>
    <div class="carousel-item">
        <div class="row">
    		<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
	    	<div class="col-4 px-1">
	    		<img src="{{ asset('web/images/bg.jpg') }}" alt="Los Angeles"  style="width: 100%;max-height: 100px">
	    	</div>
    	</div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

		</div>
		<h5 class="title-content">Hỏi, đáp về nhà xe</h5>
		<div class="detail-content">
			<div class="ans-box">
				<span><b>có chọn được nắp xanh không shop</b></span>
				<p class="ans-content">
					@php
						$ans = "Chào bạn, hiện sản phẩm chỉ có màu cam bạn nhé. Nếu có nhu cầu về sản phẩm, bạn có thể đặt hàng theo hướng dẫn https://hotro.tiki.vn/hc/vi/articles/203807174 hoặc liên hệ hotline 1800-6963 để được hỗ trợ đặt hàng, cảm ơn bạn đã quan tâm và ủng hộ Tiki.";
					@endphp
					
					{!! shorterString($ans,30) !!}
				</p>
				<i class="ans-content">Tiki trả lời vào 06/03/2020</i>
			</div>
			<div class="ans-box">
				<span><b>có chọn được nắp xanh không shop</b></span>
				<p class="ans-content">
					@php
						$ans = "Chào bạn, hiện sản phẩm chỉ có màu cam bạn nhé. Nếu có nhu cầu về sản phẩm, bạn có thể đặt hàng theo hướng dẫn https://hotro.tiki.vn/hc/vi/articles/203807174 hoặc liên hệ hotline 1800-6963 để được hỗ trợ đặt hàng, cảm ơn bạn đã quan tâm và ủng hộ Tiki.";
					@endphp
					
					{!! shorterString($ans,50) !!}
				</p>
				<i class="ans-content">Tiki trả lời vào 06/03/2020</i>
			</div>
			<div class="input-group my-2">
			    <input type="text" class="form-control form-control-sm" placeholder="Hãy đặt câu hỏi liên quan đến nhà xe">
				<div class="input-group-append">
					<button class="btn btn-sm btn-warning" type="submit">Gửi câu hỏi</button>
				</div>
			</div>
		</div>
		<div class="detail-content box-y-cmt" >
			<h5 class="text-uppercase">Đánh Giá Của bạn</h5>
			@for($i=1;$i<6;$i++)
				<i class="fa fa-star-o" aria-hidden="true"></i>
			@endfor
			<textarea name="" class="form-control form-control-sm" rows="5" placeholder="Nhận xét của bạn"></textarea>
			Mẫu: <span class="badge badge-info ml-2">Chất lượng tốt</span><span class="badge badge-info ml-2">Nhà xe nhiệt tình</span><span class="badge badge-info ml-2">Nhân viên thân thiện</span><br>
			<input type="button" class="btn btn-warning btn-sm my-1 submit-comment" value="Gửi nhận xét" name="">
		</div>

		<h5 class="title-content">khách hàng nhận xét</h5>
		<div class="detail-content" >
			<div class="row text-center pb-2 ans-box">
				<div class="col-md-4">
					<span>Đánh giá trung bình</span>
					<h4 class="text-danger">5/5</h4>
					@for($i=1;$i<6;$i++)
						@if($i<4)
							<i class="fa fa-star star" aria-hidden="true"></i>
						@else
							<i class="fa fa-star-o" aria-hidden="true"></i>
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
						    <div class="progress-bar bg-success" style="width:{{ $i }}0%">{{ $i }}0%</div>
						</div>
					</div>
						
					@endfor
				</div>
				<div class="col-md-4">
					<p>Chia sẻ nhận xét về nhà xe</p>
					<button class="btn btn-sm btn-warning btn-y-cmt">Viết nhận xét của bạn</button>
				</div>
			</div>
			@for($j=0;$j<5;$j++)
			<div class="my-2 px-2 box-cmt">
				<div class="row">
					<div class="col-2 p-0 m-0">
						<figure class="text-center">
							<img src="{{ asset('web/images/ava.jpg') }}" class="ava-cmt"  alt="">
							<figcaption><span>thieusumo</span><p>1 giờ trước</p></figcaption>
						</figure>
					</div>
					<div class="col-10">
						@for($i=1;$i<6;$i++)
							@if($i<4)
								<i class="fa fa-star star" aria-hidden="true"></i>
							@else
								<i class="fa fa-star-o" aria-hidden="true"></i>
							@endif
						@endfor
						@php
							$cmts ="Đây là loại bình mà tôi dùng để ở bàn ăn của gia đình. Bình thiết kế đơn giản, hài hòa với căn bếp của gia đình tôi. Dung tích khá lớn, chứa được 1,3 lít nước, khi đổ nước nóng hay nước lạnh vào không gây nứt bình như những loại bình khác. Bình làm bằng thủy tinh cao cấp nên rất bền, nắp bình làm bằng nhựa tốt không độc hại, bình cũng rất dễ chùi rửa và không để lại mùi hôi khi trời nắng nóng. Bình nhẹ, tuy nhiên tay cầm hơi nhỏ nên rất khó cầm và dễ làm bình đưa qua đưa lại khi rót nước.";
						@endphp
						<p>
							{!! shorterString($cmts,50) !!}
						</p>
					</div>
				</div>
				
			</div>
			@endfor
		</div>
	</div>
	{{-- google ads --}}
		@include('frontend.layouts.partials.google-ads-1')
	
	{{-- end google ads --}}
</div>
</section>
	
@endsection
@section('script')
<script>
	$(document).ready(function() {
		
	});
</script>

@endsection