<?php
	
	if(isset($_POST['save'])){ //
		//include our connection
		include 'dbconfig.php'; //
		$file_name = $_FILES['image']['name'];
		$file_temp = $_FILES['image']['tmp_name'];
		
		$exp = explode(".", $file_name);
		$ext = end($exp);
		$image = time().'.'.$ext;
		$ext_allowed = array("png", "jpeg", "jpg", "webp");
		$location = "uploads/".$image;

		
		if(in_array($ext, $ext_allowed)){
			if(move_uploaded_file($file_temp, $location)){
				//insert query
				//
				$sql = "INSERT INTO members (nameImgP, location, nameP, descriptionP, costP) VALUES ('$image', '$location', '".$_POST['nameP']."', '".$_POST['descriptionP']."', '".$_POST['costP']."')"; 
				$db->exec($sql);//
				echo "<script>alert('Image uploaded!')</script>";
				echo "<script>window.location='index.php'</script>";
			}
		}else{
			echo "<script>alert('Only image to upload!')</script>";
			echo "<script>window.location='index.php'</script>";
		}

		header('location: index.php'); //

	}
?>