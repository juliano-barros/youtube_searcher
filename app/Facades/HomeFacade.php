<?php

namespace App\Facades;

use App\Facades\BasicFacade;
use App\Outputs\OutputViewHome;


class HomeFacade extends BasicFacade {

	/*
	 *  Override getOutput from BasicFacade, must be an Output
 		@return Output 
	*/
	public function getOutput(){
		return new OutputViewHome();
	}

	/*
	 *  Render a view of home
 		@return String retorno
	*/
	public function outputHome(){

		// Rendering view home
		return $this->output->render();

	}
	

}