@extends('layouts.app',['page' => __('Route Management'), 'pageSlug' => 'route_management'])

@section('content')
<div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Routes') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table tablesorter w-100" id="route-table">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col" class="text-center">{{ __('Active') }}</th>
                                <th scope="col" class="text-center">{{ __('Action') }}</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Add/ Edit Route') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="form-group">
                            <label class="required" for="name">Name</label>
                            <input type="text" id="name" class="form-control form-control-sm" name="name" value="" placeholder="">
                        </div>
                        <div class="form-group">
                            <input type="button" value="Submit" class="btn btn-sm btn-primary btn-submit" name="">
                            <input type="button" value="Cancel" class="btn btn-sm btn-danger btn-cancel" name="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@routes
<script src="{{ asset('black/js/pages/route.js') }}" type="text/javascript"></script>
<script>
	$(document).ready(function(){
	});
        
</script>
@endpush
