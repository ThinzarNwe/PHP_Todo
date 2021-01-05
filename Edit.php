<?php 
require 'config.php';

if($_POST){
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$id = $_POST['id'];

	$pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
	$result = $pdostatement->execute();

if($result){
			echo "<script>alert('New ToDo is updated');window.location.href='index.php';</script>";
		}
}else{
	$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Edit</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 </head>
 <body>
 	<div class="card">
 		<div class="card-body">
 			<h2>Edit ToDo</h2>
 			<form class="" accept="" method="post">
 				<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
 				<div class="form-group">
 					<label for="">Title</label>
 					<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required="">
 				</div>

 				<div class="form-group">
 					<label for="">Description</label>
 					<textarea name="description" class="form-control" rows="8" cols="80"><?php echo $result[0]['description'] ?></textarea>
 				</div>
 				<div class="form-group my-3">
 					<input type="submit" class="btn btn-primary" name="" value="UPDATE">
 					<a href="index.php" type="button" class="btn btn-warning" name="">Back</a>
 				</div>
 			</form>
 		</div>
 	</div>
 </body>
 </html>