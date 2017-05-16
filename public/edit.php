<?php
require '../classes/TodosData.php';

$data = new TodosData();
$todo = $data->getTodo($_GET['id']);

?>
<h2>Edit Task</h2>
<form>
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