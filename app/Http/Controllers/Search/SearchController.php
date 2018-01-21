<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\SearchFacade;

class SearchController extends Controller
{
    //

    /*
     *  Returning type of facade will be used by this controller
        @return SearchFacade $facade
    */
	public function getFacade(){
		return new SearchFacade();
	}

    /*
     *  Method to render search on youtube
        @param Request $request
        @return String of search
    */
    public function searchYoutube(Request $request){

        // Case necessary
    	$this->setRequestFacade($request);

        // Facade of search    	
    	return $this->facade->outputSearch();

    }

}
