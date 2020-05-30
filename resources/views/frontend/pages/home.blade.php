@extends('frontend.layouts.master')
@section('content')
    <!-- banner -->
    <div class="main-w3pvt mian-content-wthree" id="home">
        <div class="container text-center">
            <div class="style-banner mx-auto">
                <h3 class="text-wh font-weight-bold">Tìm Kiếm <span>Xe Khách</span></h3>
            </div>
        </div>
        {{--include search bar --}}
        @include('frontend.layouts.partials.search-bar')
        @include('frontend.layouts.partials.google-ads-top')
        <div class="row mt-2" style="margin-right: 0px; margin-left: 0px">
            @include('frontend.layouts.partials.google-ads-left')
            <div class="col-md-8 content-detail">
                <h4 class="text-center text-primary text-uppercase">Các chuyến xe hôm nay</h4>
                <div class="row detail-content">
                    @foreach($cars as $key => $car)
                        @if($car->count() > 0)
                            <div class="col-md-6 border rounded my-1">
                                <label class="col-12 mt-2 text-center">Tuyến <b>{{ $key }}</b><span class="text-danger"> ({{ $car->count()}} Xe)</span></label>
                                <table class="table table-stripped table-hover table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Stt</th>
                                            <th>Nhà xe</th>
                                            <th class="text-center">Đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody style="max-height: 50px;overflow: auto">
                                        @foreach($car as $k => $c)
                                        @if($k > 4)
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <span class="text-center"><a href="" title="">Xem thêm <span class="fa fa-angle-double-right"></span></a></span>
                                                </td>
                                            </tr>
                                            @php
                                                 break;
                                            @endphp
                                        @endif
                                        <tr>
                                            <td class="text-center">{{ $k+1 }}</td>
                                            <td><a href="{{ route('route',[$c->route,$c->car_slug]) }}" title="">{{ $c->car_name }}</a></td>
                                            <td class="text-center">
                                                @for($i=1;$i<6;$i++)
                                                    @if($i > intval($c->stars) )
                                                        <span style="position: relative;">
                                                            <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star star" style="position: absolute;width: {{ (($c->stars)-intval($c->stars))*100 }}%;top: 0px;left: 0px;overflow: hidden" aria-hidden="true"></i></span>
                                                    @else
                                                        <i class="fa fa-star star" aria-hidden="true"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @include('frontend.layouts.partials.google-ads-right')
        </div>
    </div>
    @include('frontend.layouts.partials.google-ads-bottom')
@endsection