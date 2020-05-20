<?php

use Illuminate\Database\Seeder;
use App\Models\Port;

class PortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Port::truncate();
        $ports = ['Mỹ Đình','Gia Lâm','Giáp Bát','Yên Nghĩa','Ga Hà Nội'];
        $port_arr = [];
        foreach ($ports as $key => $port) {
        	$route_id = 2;
        	$port_arr[] = [
        		'name' => $port,
        		'slug' => str_slug($port),
        		'route_id' => $route_id,
        		'active' => 1,
        		'created_at' => now(),
        		'updated_at' => now()
        	];
        }
        Port::insert($port_arr);
    }
}
