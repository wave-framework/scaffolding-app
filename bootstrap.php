<?php

use \Wave\Config,
	\Wave\Exception,
	\Wave\Log;

define ('DS', '/');
define ('SYS_ROOT', dirname(__FILE__) . DS);
define ('APP_ROOT', SYS_ROOT . 'application' . DS);
define ('PUBLIC_ROOT', SYS_ROOT . 'public' . DS);

require_once dirname(__FILE__) . '/vendor/autoload.php';

Config::init(SYS_ROOT . 'config');
Exception::register('\\Controllers\\ExceptionController');

$__opt = getopt('', array('mode::', 'route::'));
$mode = Config::get('deploy')->mode;

if(array_key_exists('WAVE_MODE', $_SERVER))
	$mode = $_SERVER['WAVE_MODE'];
else if(is_array($__opt) && isset($__opt['mode']))
	$mode = $__opt['mode'];

\Wave\Core::bootstrap($mode);

if(true || \Wave\Core::$_MODE == \Wave\Core::MODE_DEVELOPMENT){
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', '1');
}