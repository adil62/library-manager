<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<title>collect_fine</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
<div class="container">
	<?php include "admin_nav.php"	 ?>
	<?php include "sec_nav_manage_books.php"	 ?>
	<h3 class="py-3">Collect Fine</h3>
	<form action="" method="POST" class="form-group">
		<input required type="text" placeholder="Enter the Id of The user" name="userid" class="form-control">
		<input required type="text" placeholder="Enter the Id of The Book" name="bookid" class="form-control">
		<input required type="text" placeholder="Enter the Fine Amount" name="fine_amnt" class="form-control">
		<input class="btn btn-danger" type="submit" name="submit">
	</form>


</div>
</body>
</html>


<?php
if (isset($_POST['submit'])) {
	include "connect.php";
	$uid = $_POST['userid'];
	$bookid = $_POST['bookid'];
	$fine = $_POST['fine_amnt'];
	// delete fine record 
	
	$q = "DELETE FROM fine WHERE student_id='$uid' AND bookid='$bookid' AND student_fine='$fine'";
	$r = mysqli_query($link,$q);
	if (!$r) {
		echo mysqli_error($link);
	}else{
		?> <script type="text/javascript">alert("successfully collected fine.Please proceed To Return Book Page");</script>
		   <div class="container"><a href="return_books.php" class="btn btn-primary float-right">GO to Page</a>
		   </div>
	<?php
	}




}



?>