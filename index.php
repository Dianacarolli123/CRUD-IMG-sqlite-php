<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD Operation on SQLite3 Database using PHP</title>
</head>
<body>
	<div class="container">
		<p> 
			<!--Botón para crear nuevo producto-->
			<a class="btn btn-success" href="add.php">Create new product</a>
    	</p>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
				<th>Description</th>
				<th>Cost</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					include 'partials/header.php';
					//include our connection
					include 'dbconfig.php';

					//query from the table that we create
					$sql = "SELECT rowid, * FROM members";
					$query = $db->query($sql);

					while($fetch = $query->fetchArray()){
						echo "
							<tr>
								<td>".$fetch['id']."</td>
								
								<td><img src='".$fetch['location']."' heigth='70px' width='70px'></td>

								<td>".$fetch['nameP']."</td>
								<td>".$fetch['descriptionP']."</td>
								<td>".$fetch['costP']."</td>
								<td >
									<a href='edit.php?id=".$fetch['id']. "' >Edit  </a>
									<a href='delete.php?id=".$fetch['id']."'>  Delete</a>
								</td>
								
							</tr>
						";
					}
				?>
			</tbody>
		</table>
	</div>	
</body>
</html>