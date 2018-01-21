<?php

namespace App\Outputs;

// Interface to ensure render will be there when I call on facades.
interface Output{
	
	/*
	 *  All classes of output must be implement render function
	*/
	public function render();

}