<section class="search-sec mt-3">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        	<select class="form-control search-slt" id="route-car" placeholder=""  style="border-radius:20px 0 0 0">
                                    <option value="" disabled class="text-capitalize"><b>Chọn Tuyến</b></option>
                                @foreach($route_composer as $route)
                        		    <option value="{{ $route->id }}" class="text-capitalize">{{ $route->name }}</option>
                                @endforeach
                        	</select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt">
                        		<option value="" >Chọn Chiều</option>
                        		<option value="1" >Từ Nam Định</option>
                        		<option value="2" >Về Nam Định</option>
                        	</select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="range-time-go">
                                <option>Chọn Thời Gian</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                                <option>Example one</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn wrn-btn" style="border-radius: 0 0 20px 0">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>