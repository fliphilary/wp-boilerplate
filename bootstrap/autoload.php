<?php

/*----------------------------------------------------*/
// Paths
/*----------------------------------------------------*/
$rootPath = dirname(__DIR__);
$webrootPath = $rootPath.DS.'public';

/*----------------------------------------------------*/
// Composer autoload
/*----------------------------------------------------*/
if (file_exists($autoload = $rootPath.DS.'vendor'.DS.'autoload.php')) {
	require_once $autoload;
}

$file = '.env';

$env = new \Dotenv\Dotenv($rootPath, $file);

try {
	$env->load();
} catch (Exception $e) {}
$env->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST', 'WP_HOME', 'WP_SITEURL']);
