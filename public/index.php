<?php 
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

	$data = new \BadTodoSample\TodosData();

	$todos = $data->getAllTodos();

	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/index.phtml", ['todos' => $todos]);
?>
