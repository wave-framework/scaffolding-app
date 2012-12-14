<?php

/**
 * 	This is an example of a validation schema used by models 
 *	to validate input data.
 *
 *	@author Patrick Hindmarsh, patrick@hindmar.sh
**/

return array(
    'fields' => array(
        'email' => array(
            'type' => 'email',
            'required' => true
        ),
        'password' => array(
            'type' => 'varchar',
            'required' => true
        )
    )
);