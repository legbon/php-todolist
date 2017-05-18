<?php
require '../src/BadTodoSample/Autoloader.php';

$data = new \BadTodoSample\TodosData();

if((isset($_POST)) && (sizeof($_POST) > 0)) {
	$data->update($_POST);
	header("Location: /");
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
$template->render("../views/index/edit.phtml", ["todo" => $todo]);
?>
