<?php

namespace Helpers;

class Utils {

	const REGEX_URL = '/\b(https?|ftp|file):\/\/([-A-Za-z0-9+&@#\/%?=~_|!:,.;]*[-A-Za-z0-9+&@#\/%=~_|])/';

	public static function stringToURL($input){
		$new = preg_replace("/[^A-Za-z0-9\s\s+]/", "", $input);
		return strtr($new, ' ', '-');
	}

	public static function shortenString($str, $max_length = 40, $suffix_length = 5, $separator = '...'){
		$length = strlen($str);
		if($length <= $max_length) return $str;
		else {
			$prefix = substr($str, 0, $max_length - $suffix_length - strlen($separator));
			$suffix = substr($str, ($suffix_length * -1));

			return $prefix . $separator . $suffix;
		}
	}

	public static function shortenURL($url, $max_length = 40, $suffix_length = 5, $separator = '...'){
		return self::shortenString(str_replace(array('https://', 'http://'), '', $url), $max_length, $suffix_length, $separator);
	}
	
	public static function plural($word, $count = null){
		
		if($count !== null && $count == 1)
			return $word;
		else
			return Wave_Inflector::pluralize($word);
		
	}

	/**
	 *	Takes plain text and converts it to an HTML string
	 *  Inserts hyperlinks, replaces new lines. 
	 *	Escapes input first to prevent sneaky html markup being injected first
	**/
	public static function convertTextToHTML($text){
		$text = preg_replace_callback(self::REGEX_URL, function($matches){ 
			return sprintf('<a href="%s" target="_blank" rel="nofollow external">%s</a>', $matches[0], Utils::shortenURL($matches[2]));
		}, $text);

		$text = nl2br($text);
		return $text;
	}

	public static function parseLinks($text){
		$matches = array(array());
		preg_match_all(self::REGEX_URL, $text, $matches);

		return $matches[0];
	}
	
	public static function generateRandomChars($length){
		$length = $length - ($length / 3); // make it near enough to the length
		return base_convert(bin2hex(openssl_random_pseudo_bytes($length)), 16, 33);
	}
	
	public static function image_base64($url){
		$image = file_get_contents($url);
		$f = finfo_open();
		$mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
		
		if (in_array($mime_type, array('image/png', 'image/jpeg', 'image/gif'))) {
			return "data:$mime_type;base64,".base64_encode($image);	
		}
		else return null;
	}
	
	public static function getBrowserString(){
		return array_key_exists('HTTP_USER_AGENT', $_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
	} // end getBrowserString

	public static function passwordComplexity($password){
		$length = strlen($password) >= 8;
		$metrics = array(
			'letters' => preg_match('/[a-zA-Z]+/', $password) ? 1 : 0,
			'numbers' => preg_match('/[0-9]+/', $password) ? 1 : 0,
			'symbols' => preg_match('/[\W|_]+/', $password) ? 1 : 0
		);
		$sum = array_sum($metrics);

		return $length && array_sum($metrics) >= 2;
	}


}


?>