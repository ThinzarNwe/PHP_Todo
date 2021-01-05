<?php 
	require 'config.php';

	if ($_POST) {
		$title = $_POST['title'];
		$desc = $_POST['description'];

		$sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
		$pdostatement = $pdo->prepare($sql);
		$result = $pdostatement->execute(
			array(
				':title'=>$title,
				':description'=>$desc
			)
		);
		if($result){
			echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Create New</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>
 <body>
 	<div class="card">
 		<div class="card-body">
 			<h2>Create New ToDo</h2>
 			<form class="" accept="add.php" method="post">
 				<div class="form-group">
 					<label for="">Title</label>
 					<input type="text" class="form-control" name="title" value="" required="">
 				</div>

 				<div class="form-group">
 					<label for="">Description</label>
 					<textarea name="description" class="form-control" rows="8" cols="80"></textarea>
 				</div>
 				<div class="form-group my-3">
 					<input type="submit" class="btn btn-primary" name="" value="SUBMIT">
 					<a href="index.php" type="button" class="btn btn-warning" name="">Back</a>
 				</div>
 			</form>
 		</div>
 	</div>
 </body>
 </html>