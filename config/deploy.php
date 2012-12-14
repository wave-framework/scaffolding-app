<?php 


return array(

		'mode' => \Wave\Core::MODE_DEVELOPMENT, 

		// lists the domains this app functions under, must be one called default
		// use a * for a wildcard subdomain
		'profiles' => array(
			'default' => array(
				'baseurl' => 'localhost'
			)
		),
		
		'assets' => '/static',
		
		'auth' => array(
			'persist_type' => 'cookie',	// can be either cookie, session or none
			'use_cookies' => true,
			'cookie' => array(
				'name' => 'wave_auth_token',
				'domain' => 'localhost',
				'path' => '/',
				'expires' => '+1 day',
				'secure' => false,
				'httponly' => false
			),
			'csrf' => array(
				'enabled' => true,
				'hmac_key' => 'SOME_RANDOM_CHARACTERS',
				'form_name' => '_token'
			),
		),
			
		'email' => array(
   			'loader'   => null,
   			'transport'=> 'SENDMAIL',
   			'fromname' => 'Wave Framework',
   			'fromaddr' => '',
   			'default_mimetype' => 'text/html'
   		)
);

?>