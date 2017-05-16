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
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">MyTodos</a>
        </div>
        <form class="navbar-form navbar-right" role="search">
            <a href="./add.php" class="btn btn-default">
                <span class="glyphicon glyphicon-plus-sign"></span>
                Add Task
            </a>
        </form>
    </div>
</nav>

<div class="container">
	<?php
		foreach ($todos as $todo) {
			if($todo['status'] != 2) {
	?>

		<section>
			<div class="row">
				<div class="col-xs-12">
					<h3 class="<?= $todo['status'] == 0 ? 'text-warning' : 'text-success' ?>"><?=$todo['title']?>
					<span class="small">
						<?= $todo['status'] == 0 ? '<span class="glyphicon glyphicon-remove text-warning"></span>' : '<span class="glyphicon glyphicon-ok text-success"></span>' ?>
						<a href="./toggle.php?id=<?=$todo['id']?>">
							<button class="btn btn-primary pull-right">Toggle</button>
						</a>
					</span>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<p><?=nl2br($todo['body'])?></p>
				</div>
				<div class="col-xs-4">
					<p class="pull-right">
						<a class='btn btn-warning' href='edit.php?id=<?=$todo["body"]?>'>Edit</a>
						<a class='btn btn-danger' href='delete.php?id=<?=$todo["body"]?>'>Delete</a>
					</p>

				</div>
			</div>
		</section>

	<?php
			}
		}
	?>
</div>


</body>
</html>