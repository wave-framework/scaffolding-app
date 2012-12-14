<?php

namespace Controllers;

use \Wave\Log;

class ExceptionController extends \Wave\Controller {


	/**
	 *	~Route GET, /error/<int>code
	**/
	public function trigger(){
		throw new PlatformException($this->_data['code']);		
	}
	
	public function execute(){
			
		$this->_response_method = \Wave\Exception::getResponseMethod();
		
		$this->error['code'] = $this->_data['exception']->getCode();
		$this->error['message'] = $this->_data['exception']->getMessage();
		
		if($this->error['code'] == 0)
		    $this->_status = \Wave\Response::STATUS_EXCEPTION;
		else
		    $this->_status = $this->error['code'];
				
		return $this->respond();
		
	}
	
	protected function respondJSON($payload = null){
		if($this->error['code'] == 401)
			header("HTTP/1.0 401 Not authorized");
		
		parent::respondJSON($payload);
		
	}
	
	
	protected function respondHTML(){
		if($this->error['code'] == 401){
			$to = urlencode($_SERVER['REQUEST_URI']);
			return \Wave\Utils::redirect('/sign-in?to='.$to);
		}
		$exception = $this->_data['exception'];
		include_once(\Wave\Config::get('wave')->path->views . 'system' . DS . 'exception.php');
	}
	
	protected function respondDialog(){
		
		$html = "
		<h2>An error has occured</h2>
		<p>Unfortunately there was an error while processing your request.</p>
		<div class=\"error\">
			<h4>Code: ".$this->_data['exception']->getCode() . "</h4>
			<p>" . $this->_data['exception']->getMessage() . "</p>
		</div>";
		
		$this->respondJSON($html);

	}
	
	
    protected function respondCLI(){
		echo "\n\n***** ERROR ****** \n";
		echo "  Code:    ".$this->_data['exception']->getCode()."\n";
		echo "  Message: ".$this->_data['exception']->getMessage()."\n";
		echo "**************\n\n";
	}

}




?>