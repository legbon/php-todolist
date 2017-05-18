<?php
require '../src/Suggestotron/Autoloader.php';

	$data = new \BadTodoSample\TodosData();

	$todos = $data->getAllTodos();

	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/index.phtml", ['todos' => $todos]);
?>
