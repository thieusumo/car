<section class="search-sec my-2">
    <div class="container">
        <form action="{{ route('car.search') }}" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        	<select class="form-control search-slt" id="route-car" placeholder=""  style="border-radius:20px 0 0 0" name="tuyen">
                                    <option value="" disabled class="text-capitalize"><b>__CHỌN TUYẾN__</b></option>
                                @foreach($route_composer as $route)
                        		    <option value="{{ $route->route }}" class="text-capitalize">{{ $route->name }}</option>
                                @endforeach
                        	</select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" name="chieu">
                        		<option value="" disabled >__CHIỀU ĐI__</option>
                        		<option value="di" >Từ Nam Định</option>
                        		<option value="ve" >Về Nam Định</option>
                        	</select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0 row" style="margin-left: 0px; margin-right: 0px">
                            <input type="text" class="form-control col-md-6 search-slt date" name="ngay" placeholder="NGÀY">
                            <input type="text" class="form-control col-md-6 search-slt time" name="gio" placeholder="GIỜ">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn wrn-btn" style="border-radius: 0 0 20px 0">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>