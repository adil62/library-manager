<?php session_start(); ?>
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print USer Details</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php include "admin_nav.php"; ?>	
	<?php include "sec_nav_manage_users.php"; ?>	
		<?php
		$qu = "SELECT *FROM signup WHERE status='yes'";
		$r  = mysqli_query($link,$qu);
		?> <table class="table table-dashed">
				<tr>
				<th>User Admission Number</th>
				<th>User Name</th>
				<th>User Age</th>
				<th>User Current Semester</th>
				<th>User Branch</th>
				<th>User logged in</th>
				<th>User Registered Date</th>
			</tr> <?php
		while ($re = mysqli_fetch_assoc($r)) {
			?> 
			<tr>
				<td><?php echo $re['id']; ?></td>
				<td><?php echo $re['susername']; ?></td>
				<td><?php echo $re['sage']; ?></td>
				<td><?php echo $re['currentsem']; ?></td>
				<td><?php echo $re['branch']; ?></td>
				<td><?php echo $re['is_loggedin']; ?></td>
				<td><?php echo $re['registered_date']; ?></td>
			</tr><?php
		}
			?>
		</table>
	</div>

</body>
</html>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}

?>