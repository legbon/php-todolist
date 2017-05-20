<?php
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

	if (isset($_POST) && sizeof($_POST) > 0) {
		$data = new \BadTodoSample\TodosData();
		$data->add($_POST);
		header("Location: /");
		exit;

	}
	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/add.phtml");
?>
 