<?php
function responseError(){
	return response(['status'=>'error','message'=>'Failed!']);
}
function responseSuccess(){
	return response(['status'=>'success','message'=>'Successfully!']);
}