<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $facade;

    abstract protected function getFacade();

    public function __construct(){
    	$this->facade = $this->getFacade();
    }

    protected function setRequestFacade(Request $request){
    	$this->facade->setRequest($request);
    }



}
