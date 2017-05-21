<?php

namespace BadTodoSample\Controller;

class Todos {
	
	public function listAction() {
		$data = new \BadTodoSample\TodosData();

		$todos = $data->getAllTodos();

		$template = new \BadTodoSample\Template("../views/base.phtml");
		$template->render("../views/index/list.phtml", ['todos' => $todos]);
	}

	public function addAction() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$data = new \BadTodoSample\TodosData();
			$data->add($_POST);
			header("Location: /");
			exit;

		}
		$template = new \BadTodoSample\Template("../views/base.phtml");
		$template->render("../views/index/add.phtml");
	}

	public function editAction() {
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
	}

	public function deleteAction() {
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
	}

	public function toggleAction() {
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

	}

}

?>