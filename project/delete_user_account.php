<?php
session_start();
?>
<?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Delete account</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
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
	<form action="" method="POST" class="form-group">
					<h3 class="form-control">Remove A User Account</h3>
					<?php
					$query = "SELECT *FROM signup WHERE status='yes'";
					$result = mysqli_query($link,$query);
					echo "<select class='form-control' name='dlt'>";
					echo "<option>Select User Id</option>";
					while($rows=mysqli_fetch_array($result)) {
						echo "<option >";
							echo $rows['id'];
						echo "</option>";	
					}
					echo "</select>";
					?>
					<input class="btn btn-danger form-control" type="submit" name="submit" value="Delete User">
				</td>
			</tr>
		</form>
	<?php
		if (isset($_POST['submit'])) {
			$uid = $_POST['dlt'];
			$query = "DELETE FROM signup WHERE id='$uid'";
			$re    =	mysqli_query($link,$query);
			if ($re) {
				?> <script type="text/javascript">
					alert("User account succesfully deleted");
				</script><?php
			}
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