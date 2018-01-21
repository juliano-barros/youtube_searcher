<?php  

namespace App\Requests;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/*
 *  Class abstract to make all requests
*/
abstract class RequestBasic{

	private $url;
	private $method;
	private $parameters = [];
	private $headers = [];

	/*
	 *  Method to add parameter to request
 		@param String $key
		@param String $value
	*/
	public function addParameter($key, $value){
		$this->parameters = array_add($this->parameters, $key, $value);
	}

	/*
	 *  Method to add header to request
 		@param String $key
		@param String $value
	*/
	public function addHeader($key, $value){
		$this->headers = array_add($this->headers, $key, $value);
	}

	/*
	 *  Getter of parameters
 		@return Array $parameters
	*/
	public function getParameters(){
		return $this->parameters;
	}

	/*
	 *  Getter of headers
 		@return Array $headers
	*/
	public function getHeaders(){
		return $this->headers;
	}

	/*
	 *  Method to do the request
 		@return Response $response
	*/
	public function request(){
		
		$client = new Client([]);

		return $client->request( $this->getMethod(), $this->getUrl());

	}


	/*
	 *  Setter of url
 		@param String $url
	*/
	public function setUrl($url){
		$this->url = $url;
	}

	/*
	 *  Method to return url, but if the request is a get request, the url must be parametirezed on url
 		@return String $url
	*/
	public function getUrl(){

		$parameters = '';

		// Checking if it is get and have parameters
		if ( ($this->getMethod() == 'get') && ( sizeof($this->getParameters()) > 0 ) ){


			// Setting getter parameters
			$parameters = '?';

			// Each element must be encoded to pass through parameter
			foreach ($this->getParameters() as $key => $value) {
				$parameters .= $key . "=" . urlencode($value) . '&';
			}

			// Deleting last & that was added by foreach
			$parameters = substr($parameters, 0, -1);
			
		}

		return $this->url . $parameters;
	}

	/*
	 *  Setter of method
 		@param String $method
	*/
	public function setMethod($method){
		$this->method = $method;
	}

	/*
	 *  Getter of metod
 		@return String $method
	*/
	public function getMethod(){
		return $this->method;
	}


}
