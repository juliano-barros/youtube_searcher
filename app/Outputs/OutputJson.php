<?php

namespace App\Outputs;

use App\Outputs\Output;

class OutputJson implements Output{
	
	protected $content;

	/*
	 *  Rendering reponse of json that was setted by something else
 		@return Json reponse
	*/
	public function render(){
		return response($this->getContent());
	}

	/*
	 *  In this case must be a Json string content
 		@param Json $content
	*/
	public function setContent($content){
		$this->content = $content;
	}

	/*
	 *  Returning the content setted by setContent
 		@return String $content
	*/
	public function getContent(){
		return $this->content;
	}

}