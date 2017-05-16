<?php
	require '../classes/TodosData.php';
	if (isset($_POST) && sizeof($_POST) > 0) {
		$data = new TodosData();
		$data->add($_POST);
		header("Location: /");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> MyTodos - Add </title>
</head>
<body>
	<h2>New Task</h2>
	<form action="add.php" method="POST">
		<label>
			Title: <input type="text" name="title" />
		</label>
		<br />
		<label>
			Description:
			<br />
			<textarea name="body" cols="50" rows="20"></textarea>
		</label>
		<br />
		<input type="submit" value="Add Task" />
	</form>
</body>
</html>