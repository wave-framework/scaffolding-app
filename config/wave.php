<?php


return array(
	
	'controller' => array(
		'default_method' => 'execute',
		'default_response' 	=> \Wave\Response::HTML
	),
	
	'logger' => array(
		'default_level' => \Monolog\Logger::ERROR,
		'default_file' => 'error.log'
	),
	
	'path' => array(
		'cache' 		=> SYS_ROOT . 'cache' . DS,
		'config' 		=> SYS_ROOT . 'config' . DS,
		'libraries'		=> SYS_ROOT . 'lib' . DS,
		'logs'			=> SYS_ROOT . 'logs' . DS,

		'controllers'	=> APP_ROOT . 'Controllers'. DS,
		'events'		=> APP_ROOT . 'Events' . DS,
		'models'		=> APP_ROOT . 'Models' . DS,
		'schemas'		=> APP_ROOT . 'schemas' . DS,
		'views'			=> APP_ROOT . 'views' . DS,
	),
	
	
	'router' => array(
		'cache_file' 		=> 'routes',
		'auth' => array(
			'enabled'	=> true,
			'controller'=> 'AuthController'
		),
		'base' => array(
			'methods' => array('html')
		)
	),
	
	'schemas' => array(
		'file_format' => '%s.php'
	),
	
	'view' => array(
		'cache' 		=> SYS_ROOT . 'cache' . DS . 'views' . DS,
		'extension'		=> '.phtml'
	)
	
	
);


?>