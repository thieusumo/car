<?php

use Illuminate\Database\Seeder;
use App\Models\Date;
use App\Models\Time;

class DateTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Time::truncate();

        $time_arr = [];
        $minutes = ['00','15','30','45'];

        for ($i=00; $i <= 23; $i++) {
        	foreach ($minutes as $key => $minute) {
        		$time_arr[] = [
		        	'time' => "2019-11-03 ".$i.":".$minute.":00"
		        ];
        	}
	        	
        }
        Time::insert($time_arr);

        Date::truncate();

        $date_arr = [];

        for ($i=1; $i <= 31; $i++) { 
        	$date_arr[] = [
        		'time' => "2019-12-".$i." 00:00:00"
        	];
        }
        Date::insert($date_arr);
	        
    }
}
