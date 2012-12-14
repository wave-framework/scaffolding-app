<?php

class Gravatar {
	
	public static function fetch($email, $size = 50){
		$url = 'https://secure.gravatar.com/avatar/';
		$hash = md5($email);
		$args = array('d' => User::defaultAvatar(),
					  's' => $size,
					  'r' => 'pg');
		
		return $url . $hash . '?' . http_build_query($args);
	}
}

?>