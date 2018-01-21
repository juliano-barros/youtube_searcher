<?php

namespace App\Facades;
use App\Outputs\OutputJson;
use App\Requests\RequestYoutube;
use App\Facades\BasicFacade;

// Class to search on youtube
class SearchFacade extends BasicFacade{
	
	// Youtube request
	private $youtubeRequest;

	/*
	 *  Constructor creating in this case youtubeRequest
		@return SearchFacade
	*/
	public function __construct(){
		parent::__construct();
		$this->youtubeRequest = new RequestYoutube();
	}

	/*
	 *  Type of output, in this case it is a json return
 		@return Output instance of Output
	*/
	public function getOutput(){
		return new OutputJson();
	}

	/*
	 *  Method to search youtube request
 		@return String renderOutput
	*/
	public function outputSearch(){

		// Parameter of search
		$this->youtubeRequest->addParameter('q', $this->getSearch() );
		// If has next page I pass to get next videos
		if ($this->getNextPageToken() != ""){
			$this->youtubeRequest->addParameter('pageToken', $this->getNextPageToken() );
		}

		// Response
		$response = $this->youtubeRequest->request();

		// Gettint all content from request
		$this->output->setContent($response->getBody()->getContents());

		// Output generated by getOutPut
		return $this->output->render();
	}
	
	/*
	 *  Next page token of youtube, to search nextpage of last search
 		@return String nextpage
	*/
	public function getNextPageToken(){
		// Next page token
		return $this->getRequest()['nextpage'];
	}

	/*
	 *  Get search from request
 		@return String search
	*/
	public function getSearch(){
		// getSearch
		return $this->getRequest()['search'];
	}

}