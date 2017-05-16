<?php
	require '../classes/TodosData.php';

	$data = new TodosData();
	$data->connect();

	$todos = $data->getAllTodos();


?>

<!DOCTYPE html>
<html>
<head>
	<title> MyTodos </title>
</head>
<body>
<?php

	
	foreach ($todos as $todo) {
		if($todo['status'] != 2) {
	    echo "<h3>" .$todo['title']. " (ID: " .$todo['id']. ")</h3>";
	    echo "<p>";
	    echo nl2br($todo['body']);
	    echo "</p>";
	    echo "<p><a href='edit.php?id={$todo['id']}'>Edit</a></p>";
	    echo "<p><a href='delete.php?id={$todo['id']}'>Delete</a></p>";
		}
	}

?>
</body>
</html>