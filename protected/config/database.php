<?php

// This is the database connection configuration.
return array(
//	'class' => 'CDbConection',
        'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=web',
	'emulatePrepare' => true,
	'username' => 'web',
	'password' => 'web',
	'charset' => 'utf8',
	
);