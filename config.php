<?php

define( 'BASE_PATH', 'http://mreouven.synology.me/project/');
define( 'DB_HOST', 'mreouven.synology.me:3307' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', 'reouven');
define( 'DB_NAME', 'accounts');

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
