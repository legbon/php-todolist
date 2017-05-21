<?php 
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

$route = null;

if(isset($_SERVER['PATH_INFO'])) {
	$route = $_SERVER['PATH_INFO'];
}

if(isset($_SERVER['REDIRECT_URL'])) {
	$route = $_SERVER['REDIRECT_URL'];
}

$router = new \BadTodoSample\Router();
$router->start($route);

?>