<?php
	declare(strict_types=1);

	require 'MyPDO.php';

	class TodosData {

		protected $db = null;

		public function __construct() {
			$this->connect();
		}

		// Create connect function. 
		public function connect() {
				$this->db = new MyPDO();	
		}

		public function getAllTodos() {
			$query = $this->db->prepare("SELECT * FROM todos;");
			$query->execute();
			return $query;
		}

		public function add(array $data) {
			$query = $this->db->prepare("
					INSERT INTO todos (
						title,
						body,
						status
					) VALUES (
						:title,
						:body,
						0
					);
				");

			$query->execute([
				':title' => $data['title'],
				':body' => $data['body']
			]);
		}
	}
?>