<?php
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

	if((isset($_POST)) && (sizeof($_POST) > 0)) {
		$data = new \BadTodoSample\TodosData();
		$data->toggle($_POST);
		if($data === false) {
			echo "Task not found.";
		} else {
			echo "Update successful!";
			header("Location: /");
			exit;	
		}
	}

?>