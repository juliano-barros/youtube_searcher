<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\HomeFacade;

class HomeController extends Controller
{


	/*
	 *  Returning type of facade will be used by this controller
 		@return HomeFacade $facade
	*/
	protected function getFacade(){
		return new HomeFacade();
	}

	/*
	 *  Method to render homepage
 		@param Request $request
 		@return String $homepage
	*/
    public function home(Request $request){

    	// Case necessary
    	$this->setRequestFacade($request);

    	return $this->facade->outputHome();

    }
}
