<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>view all fine</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
<div>
<div class="container">
<?php
	include "connect.php";
	include "admin_nav.php";
	include "sec_nav_manage_users.php";
	$query = "SELECT *FROM fine";
	$r = mysqli_query($link,$query);
	?> <table class="table table-condensed table-hover table-striped"> 
		<tr>	
			<td>Student Id</td>
			<td>Student Name</td>
			<td>Fine</td>
			<td>Fine Recorded Date</td>
		</tr>
		<?php
	while($row = mysqli_fetch_assoc($r)){
		?>
		<tr>	
			<td><?php echo $row['student_id'];?></td>
			<td><?php echo $row['student_name'];?></td>
			<td><?php echo $row['student_fine'];?></td>
			<td><?php echo $row['fine_recorded_date'];?></td>
		</tr><?php


	}
?>
	</table>
</div>
</div>





</body>
</html>