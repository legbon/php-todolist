<?php
namespace BadTodoSample\Controller;

class Error extends \BadTodoSample\Controller {
	public function indexAction($options) {
		header("HTTP/1.0 404 Not Found");
		$this->render("/errors/index.phtml", ['message' => "Page not found!"]);
	}
}
?>