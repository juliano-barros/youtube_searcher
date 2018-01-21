<?php  

namespace App\Requests;

use App\Requests\RequestBasic;


/*
 *  Request youtube through get verb
*/
class RequestYoutube extends RequestBasic{
	
	/*
	 *  Construct I set all parameters that it is necessary to youtbue
	*/
	public function __construct(){

		// base url
		$this->setUrl(env('URL_API_YOUTUBE'));

		// Method
		$this->setMethod('get');
		$this->addParameter('part', 'snippet');
		$this->addParameter('key', env('APP_KEY_YOUTUBE'));
		$this->addParameter('type', 'video');

	}

}
