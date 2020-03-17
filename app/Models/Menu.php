<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Models\BaseModel;

class Menu extends BaseModel
{
	use PresentableTrait;

    protected $presenter = '\\App\\Presenters\\MenuPresenter';

    public static function boot()
    {
        parent::boot();
    }
    protected $table = "menus";
    protected $fillable = [
    	'name',
    	'slug',
    	'parent_id',
    	'position',
    	'active',
    	'created_by',
    	'updated_by',
        'menu_type'
    ];
    public function scopeActive($query){
    	return $query->where('active',1);
    }

    public static function treeMenu($list,$parent_id = 0){

    	$menu_tree = [];

    	$parent_list = $list->where('parent_id',$parent_id);

    	foreach ($parent_list as $key => $parent) {

    		$menu_tree[$key] = $parent;

    		$children_menu = self::treeMenu($list,$parent->id);

    		if(!empty($children_menu))

    			$menu_tree[$key]['children'] = $children_menu;
    		else 
    			$menu_tree[$key]['children'] = [];

    	}
    	return $menu_tree;
    	
    }
    public static function listMenu($menu_tree){

    	$list = '';

    	foreach ($menu_tree as $key => $menu) {
    		

    		if( count($menu['children']) == 0 ){

    			$list .= $menu->present()->liTag;
    		}else{
    			$list .= $menu->present()->openTag;

    			foreach ($menu['children'] as $key => $menu_child) {
    				$list .= $menu_child->present()->liTag;
    			}
    			$list .= $menu->present()->closeTag;
    		}
    	}
    	return $list;
    }
    	

    public static function getMenu(){

    	$list = self::active()->get();
    	$menu_tree = self::treeMenu($list);
    	$menu_list = self::listMenu($menu_tree);


    	return $menu_list;
    }

}
