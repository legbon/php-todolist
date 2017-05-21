<?php
namespace BadTodoSample;

class Router {
	public function start($route) {

		if($route[0] == "/") {
			$route = substr($route, 1);
		}

		$controller = new \BadTodoSample\Controller\Todos();

		$method = [$controller, $route . 'Action'];

		if(is_callable($method)) {
			return $method();
		}
		
		require 'error.php';
	}
}
?>