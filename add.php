<?php include 'partials/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on SQLite3 Database using PHP</title>
</head>
<body>
	<div class="container">	
		<div class="card">
			<div class="card-header">
				<h3>Create new product </h3>
			</div>

			<div class="card-body">
				<form method="POST"  action="upload.php" enctype="multipart/form-data">
					<a class="btn btn-warning" href="index.php">Back</a>
					<p class="form-group">
						<label for="nameP">Name:</label>
						<input class="form-control" type="text" id="nameP" name="nameP" placeholder="Enter product name" required>
						
					</p>
					<p class="form-group">
						<label for="descriptionP">Description:</label>
						<input class="form-control" type="text" id="descriptionP" name="descriptionP" placeholder="Enter product description" required>
					</p>
					<p class="form-group">
						<label for="costP">Cost:</label>
						<input class="form-control" type="number" id="costP" name="costP" placeholder="Enter the cost of the product" required>
					</p>
					<p class="form-group">
						<label>Image:</label>
						<input class="form-control" type="file" name="image" required="required" class="form-control"/>	
					</p>

					<!--<button class="btn btn-primary" name="save">Upload</button>-->

					<input class="btn btn-success" type="submit" name="save" value="Save">
				</form>
			</div>	
		</div>	
	</div>
	<script src="codigo.js"></script> 
</body>
</html>