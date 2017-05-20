<?php
require_once '../src/BadTodoSample/Config.php';
\BadTodoSample\Config::setDirectory('../config');

$config = \BadTodoSample\Config::get('autoload');
require_once $config['class_path'] . '/BadTodoSample/Autoloader.php';

$data = new \BadTodoSample\TodosData();

if((isset($_POST)) && (sizeof($_POST) > 0)) {
	$data->delete($_POST);
	echo "Update successful!";
	header("Location: /");
	exit;
}

if(!isset($_GET) && empty($_GET['id'])) {
		echo "You did not pass an id.";
		exit;
}

$todo = $data->getTodo($_GET['id']);

if($todo === false) {
	echo "Task not found.";
	exit;
}

$template = new \BadTodoSample\Template("../views/base.phtml");
$template->render("../views/index/delete.phtml", ["todo" => $todo]);

?>
