<?php


namespace Controllers;

use \DateTime;

class HelloWorldController extends \Wave\Controller {

	/**
	 *	~Route GET, /
	**/
	public function hello(){
		$this->_template = 'installed';

		$this->today = new DateTime();
		$hour = (int)$this->today->format('G');

		if($hour < 12) 
			$this->interval = 'morning';
		elseif($hour < 19)
			$this->interval = 'afternoon';
		else 
			$this->interval = 'evening';

		return $this->respond();
	}

}