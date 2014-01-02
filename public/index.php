<?php

/*** error reporting on ***/
error_reporting (E_ALL ^ E_NOTICE);

/*** define the site path ***/
$site_path = realpath(dirname(dirname(__FILE__)));
define ('ROOT', $site_path);

/*** define the site url ***/
$base_url = 'http://' . $_SERVER['HTTP_HOST'];
define ('URL', $base_url);

include ROOT . '/library/Autoloader.php';

include ROOT . '/library/Functions.php';

/*** register the loader functions ***/
Autoloader::setCacheFilePath(ROOT . '/library/cache.txt');
Autoloader::setClassPaths(array(
    ROOT . '/application/models/',
    ROOT . '/library/Core/',
    ROOT . '/library/Db/',
    ROOT . '/library/Helper/'
));
Autoloader::register();

/*** a new registry object ***/
$registry = new Registry;

/*** load up the template ***/
$registry->template = new Template($registry);

/*** set the template path ***/
$registry->template->setPath(ROOT . '/application/views');

/*** load the router ***/
$registry->router = new Router($registry);

/*** set the controller path ***/
$registry->router->setPath(ROOT . '/application/controllers');

 /*** load the controller ***/
$registry->router->loader();

?>
