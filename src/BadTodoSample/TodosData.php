<?php
	declare(strict_types=1);
	namespace BadTodoSample;
	
	require 'MyPDO.php';

	class TodosData {

		protected $db = null;

		public function __construct() {
			$this->connect();
		}

		// Create connect function. 
		public function connect() {
				$this->db = new \BadTodoSample\MyPDO();	
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

		public function getTodo($id) {
			$query = $this->db->prepare("SELECT * FROM todos WHERE id = :id LIMIT 1");
			$query->execute([':id' => $id]);
			return $query->fetch(\PDO::FETCH_ASSOC);
		}

		public function update(array $data) {
			$query = $this->db->prepare("
					UPDATE todos SET 
						title = :title,
						body = :body
					 WHERE id = :id;
				");

			return $query->execute([
				':title' => $data['title'],
				':body' => $data['body'],
				':id' => $data['id']
			]);
		}		

		public function delete(array $data) {
			$query = $this->db->prepare("
					UPDATE todos SET 
						status = :status
					 WHERE id = :id;
				");

			return $query->execute([
				':id' => $data['id'],
				':status' => 2
			]);
		}

		public function hardDelete(array $data) {
			$query = $this->db->prepare(
			    "DELETE FROM todos
			        WHERE
			            id = :id"
			);

			return $query->execute([
			    ':id' => $data['id'],
			]);
		}

		public function toggle(array $data) {
			$query = $this->db->prepare(
					"UPDATE todos SET status = :status WHERE id = :id;"
				);

			$task = $this->getTodo($data['id']);
			
			if($task === false) {
				return $task;
			}

			if($task['status'] == 0) {
				$task = 1;
			} elseif($task['status'] == 1) {
				$task = 0;
			}

			$query->execute([
					':id' => $data['id'],
					':status' => $task
				]);


		}

	}
?>