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
	<script type="text/javascript" src="./assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
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
						<form action="./toggle.php" method="POST">
							<button class="btn btn-primary pull-right">Toggle</button>
							<input type="hidden" name="id" value="<?=$todo['id']?>" />
						</form>
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
						<a class='btn btn-warning' href='edit.php?id=<?=$todo["id"]?>'>Edit</a>
						<a class='btn btn-danger' href='delete.php?id=<?=$todo["id"]?>'>Delete</a>
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