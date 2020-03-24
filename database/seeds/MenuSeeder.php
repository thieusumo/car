<?php

use Illuminate\Database\Seeder;

use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        $menu_arr = [];

        $menu_arr = [
        	[
        		'name'=> 'Home',
	        	'slug' => '/',
	        	'parent_id' => 0,
	        	'position' => 1,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Xe Khách',
	        	'slug' => 'xe-khach',
	        	'parent_id' => 0,
	        	'position' => 2,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Xe Tiện Chuyến',
	        	'slug' => 'xe-tien-chuyen',
	        	'parent_id' => 0,
	        	'position' => 3,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Hà Nội',
	        	'slug' => 'ha-noi',
	        	'parent_id' => 2,
	        	'position' => 2,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Tây Nguyên',
	        	'slug' => 'tay-nguyen',
	        	'parent_id' => 2,
	        	'position' => 2,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Sài Gòn',
	        	'slug' => 'sai-gon',
	        	'parent_id' => 2,
	        	'position' => 2,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Liên Hệ',
	        	'slug' => 'lien-he',
	        	'parent_id' => 0,
	        	'position' => 3,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Đăng Nhập',
	        	'slug' => 'dang-nhap',
	        	'parent_id' => 0,
	        	'position' => 4,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        	[
        		'name'=> 'Đăng Kí',
	        	'slug' => 'dang-ki',
	        	'parent_id' => 0,
	        	'position' => 5,
	        	'active'=> 1,
	        	'created_by' => 2,
	        	'updated_by' => 2,
	        	'created_at' => now(),
            	'updated_at' => now()
        	],
        ];
        Menu::insert($menu_arr);
    }
}
