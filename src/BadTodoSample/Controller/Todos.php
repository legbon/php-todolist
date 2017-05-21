<?php

namespace BadTodoSample\Controller;

class Todos extends \BadTodoSample\Controller {
	
	protected $ata;

	public function __construct() {
		parent::__construct();
		$this->data = new \BadTodoSample\TodosData();
	}

	public function listAction($options) {
		

		$todos = $this->data->getAllTodos();

		
		$this->render("index/list.phtml", ['todos' => $todos]);
	}

	public function addAction($options) {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$this->data->add($_POST);
			header("Location: /");
			exit;

		}
		
		$this->render("index/add.phtml");
	}

	public function editAction($options) {

		if((isset($_POST)) && (sizeof($_POST) > 0)) {
			$this->data->update($_POST);
			header("Location: /");
		}

		if(!isset($options) && empty($options['id'])) {
				echo "You did not pass an id.";
				exit;
		}

		$todo = $this->data->getTodo($options['id']);

		if($todo === false) {
			echo "Task not found.";
			exit;
		}

		
		$this->render("index/edit.phtml", ["todo" => $todo]);
	}

	public function deleteAction($options) {

		if((isset($_POST)) && (sizeof($_POST) > 0)) {
			$this->data->delete($_POST);
			echo "Update successful!";
			header("Location: /");
			exit;
		}

		if(!isset($options) && empty($options['id'])) {
				echo "You did not pass an id.";
				exit;
		}

		$todo = $this->data->getTodo($options['id']);

		if($todo === false) {
			echo "Task not found.";
			exit;
		}

		
		$this->render("index/delete.phtml", ["todo" => $todo]);
	}

	public function toggleAction($options) {
		if((isset($_POST)) && (sizeof($_POST) > 0)) {
			$this->data->toggle($_POST);
			if($this->data === false) {
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