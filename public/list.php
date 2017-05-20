<?php 

	$data = new \BadTodoSample\TodosData();

	$todos = $data->getAllTodos();

	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/list.phtml", ['todos' => $todos]);
?>