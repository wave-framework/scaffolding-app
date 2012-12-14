<?php



class BCrypt {
	
	const SALT = 'B(oi2nhocLn 3oIBu3o9&hife989vgbiu (*Hgfois';
	
	private static $instance;
	
	private static function getInstance(){
		if(self::$instance == null){
			include_once Wave_Config::get('wave')->path->vendors . 'phpass-1.3' . DS . 'PasswordHash.php';
			self::$instance = new PasswordHash(12, false);
		}
		return self::$instance;
	}
	
	public static function createPassword($plain){
		return self::getInstance()->HashPassword($plain . self::SALT);
	}
	
	public static function checkPassword($plain, $hash){
		return self::getInstance()->checkPassword($plain . self::SALT, $hash);
	}
	
}