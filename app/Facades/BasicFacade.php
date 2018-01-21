<?php

namespace App\Facades;

use Illuminate\Http\Request;

abstract class BasicFacade {


	protected $request;

	protected $output;

	/*
	    Abstract method 
 		@return Output retorno
	*/
	abstract function getOutput();

	/*
	 *  Constructor to create the output
	*/	
 	public function __construct(){
		$this->output = $this->getOutput();
	}

	/*
	 *  Setting request of facade
 		@param Request $request
	*/	
 	public function setRequest(Request $request){
		$this->request = $request;
	}

	/*
	 *  Getter of requet
 		@return Request $request
	*/
	public function getRequest(){
		return $this->request;
	}



}