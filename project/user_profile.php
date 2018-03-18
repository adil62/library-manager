<?php include 'connect.php';?><?php
session_start();
$userid = $_SESSION['user_id'];
$query  = "SELECT *FROM signup WHERE id='$userid'";
$result = mysqli_query($link,$query);
$query_fine = "SELECT *FROM fine WHERE student_id='$userid'";
$result2 = mysqli_query($link,$query_fine);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Profile</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
	<div class="container">
		<h2>User Details</h2>
		<table class='table table-striped table-hover table-condensed'>
			
			
			


			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					?>
				<div>
					<tr>
						<th>Name:</th>
						<td> <?php echo $row['susername']; ?></td>	
					</tr>
					<tr>	
						<th>Admission Number:</th>
						<td> <?php echo $row['id']; ?></td>	
							
				  	</tr>
					<tr>
						<th>Semester:</th>
						<td> <?php echo $row['currentsem']; ?></td>	
					</tr>
					<tr>
						<th>Age:</th>				
						<td> <?php echo $row['sage']; ?></td>					
					</tr>
					<tr>	
						<th>Branch:</th>			
						<td> <?php echo $row['branch']; ?></td>	
					</tr>
					<tr>	
						<th>Registered On:</th>	
						<td> <?php echo $row['registered_date']; ?></td>		
					</tr>
					<tr>	
						<th>Reserve slot 1:</th>
						<td> <?php echo $row['reservebook1']; ?></td>		
					</tr>
					<tr>	
						<th>Reserve slot 2:</th>
						<td> <?php echo $row['reservebook2']; ?></td>		
					</tr>
					<tr>	
						<th>Fine if any:</th>	
							<?php $row_fine= mysqli_fetch_assoc($result2); ?>
						<td> <?php echo $row_fine['student_fine']; ?></td>		
					</tr>			
				</div>

					<?php
				}
			?>
				
			


	</div>

</body>
</html>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>