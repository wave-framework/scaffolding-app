<?php

return array(

	'databases' => array(
		'%MODEL_NS%' => array(
			'production' => array(
				'driver' => 'MySQL',
				'host' => '%DB_HOST%',
				'port' => '3306',
				'username' => '%DB_USER%',
				'password' => '%DB_PASS%',
				'database' => '%DB_NAME%'
			),
		),

	),
);



?>