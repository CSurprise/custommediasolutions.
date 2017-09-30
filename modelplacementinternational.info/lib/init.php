<?php

DEFINE('SITE_CACHE_ENABLED',0);

$twigParams = array();

require_once dirname(__FILE__).'/vendor/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../templates');


if(SITE_CACHE_ENABLED === 1){
	$twigParams['cache'] = dirname(__FILE__).'/../cache/twig';
}


$twig = new Twig_Environment($loader, $twigParams);

?>