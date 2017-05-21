<?php

namespace BadTodoSample\Controller;

class Todos {
	
	protected $ata;
	protected $template;
	protected $config;

	public function __construct() {
		$this->config = \BadTodoSample\Config::get('site');
		$this->data = new \BadTodoSample\TodosData();
		$this->template = new \BadTodoSample\Template($this->config['view_path'] . "/base.phtml");
	}

	public function render($template, $data = array()) {
		$this->template->render($this->config['view_path'] . "/" . $template, $data);
	}

	public function listAction() {
		

		$todos = $this->data->getAllTodos();

		
		$this->render("index/list.phtml", ['todos' => $todos]);
	}

	public function addAction() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$this->data->add($_POST);
			header("Location: /");
			exit;

		}
		
		$this->render("index/add.phtml");
	}

	public function editAction() {

		if((isset($_POST)) && (sizeof($_POST) > 0)) {
			$this->data->update($_POST);
			header("Location: /");
		}

		if(!isset($_GET) && empty($_GET['id'])) {
				echo "You did not pass an id.";
				exit;
		}

		$todo = $this->data->getTodo($_GET['id']);

		if($todo === false) {
			echo "Task not found.";
			exit;
		}

		
		$this->render("index/edit.phtml", ["todo" => $todo]);
	}

	public function deleteAction() {

		if((isset($_POST)) && (sizeof($_POST) > 0)) {
			$this->data->delete($_POST);
			echo "Update successful!";
			header("Location: /");
			exit;
		}

		if(!isset($_GET) && empty($_GET['id'])) {
				echo "You did not pass an id.";
				exit;
		}

		$todo = $this->data->getTodo($_GET['id']);

		if($todo === false) {
			echo "Task not found.";
			exit;
		}

		
		$this->render("index/delete.phtml", ["todo" => $todo]);
	}

	public function toggleAction() {
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