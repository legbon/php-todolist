<?php
require '../classes/TodosData.php';
$data = new TodosData();

if((isset($_POST)) && (sizeof($_POST) > 0)) {
	$data->delete($_POST);
	echo "Update successful!";
	header("Location: /");
	exit;
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
<h2>Delete Task</h2>
<form action="./delete.php?id=<?=$_GET['id']?>" method="POST">
	<label>
		Really delete task?
		<p>
			<?=$todo['title']?>
		</p>
		<p>
			<?=$todo['body']?>
		</p>
	</label>

	<input type="hidden" name="id" value="<?=$todo['id'];?>" />
	<input type="submit" value="Delete Task" />
</form>