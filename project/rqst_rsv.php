<?php include 'connect.php';?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css">
	<title>rqst_rsv</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

</body>
</html>
<?php
	if (isset($_GET['bookid'])) {
		session_start();
		$requester = $_SESSION['user_id'];
		$bookid = $_GET['bookid'];	
		$date = date('d-m-Y');
		$q = "INSERT INTO rqst_reserve(requester_id,reserve_book_id,rqst_date) VALUES('$requester','$bookid','$date')";
		// Reserve request of the logged in user has been stored to a temp table 
		$re = mysqli_query($link,$q);
		if (!$re)
			echo mysqli_error($link);
		?>
		<script type="text/javascript">
				window.location.href="reserve_book_client.php";			
		</script><?php
		
	}
?>