<?php
	declare(strict_types=1);

	class TodosData {

		protected $db = null;

		// Create connect function. 
		public function connect() {
				$this->db = new MyPDO();	
		}

		public function getAllTodos() {
			$query = $this->db->prepare("SELECT * FROM todos;");
			$query->execute();
			return $query;
		}
	}
?>