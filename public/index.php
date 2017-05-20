<?php 
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

if(!isset($_SERVER['REDIRECT_URL']) || 
		empty($_SERVER['REDIRECT_URL']) ||
		$_SERVER['REDIRECT_URL'] == '/'
	) 
{
	if(!isset($_SERVER['PATH_INFO']) || 
			empty($_SERVER['PATH_INFO']) ||
			$_SERVER['PATH_INFO'] == '/'
		) 
	{
		$route = 'list';
	} else {
		$route = $_SERVER['PATH_INFO'];
	}
} else {
		$route = $_SERVER['REDIRECT_URL'];
}

$router = new \BadTodoSample\Router();
$router->start($route);

?>