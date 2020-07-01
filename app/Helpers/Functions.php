<?php
function responseError(){
	return response(['status'=>'error','message'=>'Failed!']);
}
function responseSuccess(){
	return response(['status'=>'success','message'=>'Successfully!']);
}
function shorterString($string,$number){
	$cmts = explode(' ', $string);
	$max_key = count($cmts);
	if($max_key < $number + 10)
		$new_string = $string;
	else{
		$new_string = "";
		foreach($cmts as $key => $cmt){
			if($key < $number)
				$new_string .= $cmt ." ";
			elseif($key == $max_key -1 )
				$new_string .= '<span class="cmt-hidden cmt-more text-danger" style="display: none">Ẩn bớt</span>';
			else
				$new_string .= '<span class="cmt-more" style="display: none">'.$cmt." " .'</span>';
			if($key == $number)
				$new_string .= '<span class="text-success read-more">...Xem thêm</span>';
		}
	}
		
	return $new_string;
}

function shortStringMessage($str)
{
	$cmts = explode(' ', $str);
	$max_key = count($cmts);
	$string = "";

	if($max_key < 5){
		return $str;
	}else{
		foreach($cmts as $key => $cmt){
			
				$string .= $cmt. " ";

			if($key > 5) break;
		}
		return $string;
	}

}