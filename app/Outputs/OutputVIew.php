<?php

namespace App\Outputs;

use App\Outputs\Output;
use Illuminate\Http\Request;

/*
 *  Class base from all outputs based on view
*/
abstract class OutputView implements Output{
	

	protected $parameters;

	/*
	 *  All classes have to implement the name of the view
 		@return String $nameView
	*/
	abstract protected function getNameView();

	/*
	 *  Construct, setting empty parameters to view
 		@return OutputView instance
	*/
	public function __construct(){
		// Parameters at first is empty
		$this->setParameters([]);
	}

	/*
	 *  Function to add parameters to view
 		@param Array $parameters
	*/
	public function setParameters($parameters){
		$this->parameters = $parameters;
	}

	/*
	 *  Getter of parameters
 		@return Array $parameters
	*/
	protected function getParametersView(){
		return $this->parameters;
	}

	/*
	 *  This render always will render a view
 		@return View $view
	*/
	public function render(){
		return view($this->getNameView(), $this->getParametersView());
	}

}