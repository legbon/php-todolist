<?php
require '../src/Suggestotron/Autoloader.php';
	if (isset($_POST) && sizeof($_POST) > 0) {
		$data = new \BadTodoSample\TodosData();
		$data->add($_POST);
		header("Location: /");
		exit;

	}
	$template = new \BadTodoSample\Template("../views/base.phtml");
	$template->render("../views/index/add.phtml");
?>
 