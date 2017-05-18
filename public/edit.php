<?php
require '../src/BadTodoSample/TodosData.php';
$data = new \BadTodoSample\TodosData();

if((isset($_POST)) && (sizeof($_POST) > 0)) {
	$data->update($_POST);
	echo "Update successful!";
}

if(!isset($_GET) && empty($_GET['id'])) {
		echo "You did not pass an id.";
		exit;
}

$todo = $data->getTodo($_GET['id']);

if($todo === false) {
	echo "Task not found.";
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> MyTodos - Edit </title>
</head>
<body>
	<h2>Edit Task</h2>
	<form action="./edit.php?id=<?=$_GET['id']?>" method="POST">
		<label>
			Title: <input type="text" name="title" value="<?=$todo['title'];?>" />
		</label>
		<br />
		<label>
			Text:
			<br />
			<textarea name="body" cols="50" rows="20"><?=$todo['body']?></textarea>
		</label>
		<br />
		<input type="hidden" name="id" value="<?=$todo['id'];?>" />
		<input type="submit" value="Edit Task" />
	</form>
</body>
</html>