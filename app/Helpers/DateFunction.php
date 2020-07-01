<?php 
 function H_i_d_m($date)
 {
 	return \Carbon\Carbon::parse($date)->format('H:i A, d/m');
 }
?>