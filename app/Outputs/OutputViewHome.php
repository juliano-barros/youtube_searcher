<?php

namespace App\Outputs;

use App\Outputs\OutputView;

class OutputViewHome extends OutputView{
	
	/*
	 *  Returning the name of the view Home
 		@return String $viewname
	*/
	public function getNameView(){
		return 'home.home';
	}
}