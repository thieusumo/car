@extends('layouts.app',['page' => __('Car Edit'), 'pageSlug' => 'car_edit'])
@section('style')
    <style>
        select > option{
            color: black!important;
        }
        .required:after{
            color: red;
            content: "*";
        }
        label{
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ __('Thông tin Nhà Xe: '.$cars->name) }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('car.update',request()->route()->car) }}" method="POST" accept-charset="utf-8">
                    @method('PATCH')
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name">Tên nhà xe:</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $cars->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="station_go">Bến đi:</label>
                            <input type="text" id="station_go" class="form-control" name="station_go" value="{{ $cars->station_go }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="station_back">Bến về:</label>
                            <input type="text" id="station_back" class="form-control" name="station_back" value="{{ $cars->station_back }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="route_id">Loại xe:</label>
                            <select name="route_id" id="route_id" class="form-control">
                                <option {{ $cars->car_type==1?"selected":"" }} value="1">Xe Khách</option>
                                <option {{ $cars->car_type==2?"selected":"" }} value="2">Xe Tiện Chuyến</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="route_id">Tuyến:</label>
                            <select name="route_id" id="route_id" class="form-control">
                                <option value=""></option>
                                @foreach($routes as $route)
                                    <option {{ $route->id==$cars->route_id?"selected":"" }} value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="line">Lộ trình:</label>
                            <input type="text" id="line" class="form-control" name="line" value="{{ $cars->line }}">
                        </div>
                    </div>

                    @for($i=0;$i<4;$i++)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone{{ $i }}">Số điện thoại {{ $i+1 }}:</label>
                            <input type="number" onkeypress="return isNumberKey(event)" id="phone{{ $i }}" class="form-control" name="phone[]" value="{{ explode(';', $cars->phone)[$i]??"" }}">
                        </div>
                    </div>
                    @endfor

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" class="form-control" name="address" value="{{ $cars->address }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Thông tin thêm:</label>
                            <textarea name="description" class="form-control" rows="3">{{ $cars->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            <a href="{{ route('car.index') }}" title="">
                                <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
@routes
<script>
	$(document).ready(function(){
       
	});
</script>
@endpush
