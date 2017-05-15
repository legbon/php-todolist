<?php
	require '../classes/MyPDO.php';
	require '../classes/TodosData.php';

	$data = new TodosData();
	$data->connect();

	$todos = $data->getAllTodos();

	foreach ($todos as $todo) {
    echo "<h3>" .$todo['title']. " (ID: " .$todo['id']. ")</h3>";
    echo "<p>";
    echo nl2br($todo['body']);
    echo "</p>";
	}

?>