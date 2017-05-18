<?php
	require '../src/BadTodoSample/TodosData.php';
	require '../src/BadTodoSample/Template.php';

	$data = new \BadTodoSample\TodosData();

	$todos = $data->getAllTodos();

	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/index.phtml", ['todos' => $todos]);
?>
