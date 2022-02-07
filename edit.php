<?php
	include 'partials/header.php';
	//include our connection
	include 'dbconfig.php';

	//get the row of selected id
	$sql = "SELECT rowid, * FROM members WHERE rowid = '".$_GET['id']."'";
	$query = $db->query($sql);
	$fetch = $query->fetchArray();

?>
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
				<form method="POST" enctype="multipart/form-data">
					<a class="btn btn-warning" href="index.php">Back</a>
					<p>
						<label for="nameP">Name:</label>
						<input class="form-control" type="text" id="nameP" required name="nameP" value="<?php echo $fetch['nameP']; ?>">
					</p>
					<p>
						<label for="descriptionP">Description:</label>
						<input class="form-control" type="text" id="descriptionP" required name="descriptionP" value="<?php echo $fetch['descriptionP']; ?>">
					</p>
					<p>
						<label for="costP">Cost:</label>
						<input class="form-control" type="number" id="costP" required name="costP" value="<?php echo $fetch['costP']; ?>">
					</p>
					<p>
						<label>Image:</label>
						<input class="form-control" type="file" name="image" required="required" class="form-control"/>	
					</p>
					<input class="btn btn-success" type="submit" name="save" value="Save">
				</form>
			</div>
		</div>
	</div>

<?php
	if(isset($_POST['save'])){
		$nameP = $_POST['nameP'];
		$descriptionP = $_POST['descriptionP'];
		$costP = $_POST['costP'];
		
		$file_name = $_FILES['image']['name'];
		$file_temp = $_FILES['image']['tmp_name'];
		
		$exp = explode(".", $file_name);
		$ext = end($exp);
		$image = time().'.'.$ext;
		$ext_allowed = array("png", "jpeg", "jpg", "webp");
		$location = "uploads/".$image;
		if(in_array($ext, $ext_allowed)){
				if(move_uploaded_file($file_temp, $location)){
					$sql = "UPDATE members SET nameImgP='$image', location='$location', nameP = '$nameP', descriptionP = '$descriptionP', costP = '$costP' WHERE rowid = '".$_GET['id']."'";
					$db->exec($sql);	
					echo "<script>alert('Image uploaded!')</script>";
					echo "<script>window.location='index.php'</script>";
			}
		}else{
			echo "<script>alert('Only image to upload!')</script>";
			echo "<script>window.location='index.php'</script>";
		}		
			
		

		header('location: index.php');
	}
?>
</body>
</html>