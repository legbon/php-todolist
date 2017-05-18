<?php
require '../src/BadTodoSample/Autoloader.php';
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