<?php
namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class MenuPresenter extends Presenter {

	public function liTag(){
		if($this->parent_id == 0)
			return '<li><a class="text-uppercase" href="'.route('route',$this->slug).'">'.$this->name.'</a></li>';
		else
			return '<li><a class="text-uppercase" href="'.route('route',$this->slug).'">'.$this->name.'</a></li>';
	}
	public function openTag(){
		return '
		<li>
            <label for="drop-2" class="toggle toogle-2">'.$this->name.'<span class="fa fa-angle-down"
                    aria-hidden="true"></span>
            </label>
            <a class="text-uppercase" href="javascript:void(0)">'.$this->name.'<span class="fa fa-angle-down" aria-hidden="true"></span></a>
            <input type="checkbox" id="drop-2" />
        	<ul>
		';
	}
	public function closeTag(){
		return '
		    </ul>
        </li>
		';
	}

}