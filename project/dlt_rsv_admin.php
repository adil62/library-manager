<?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>delete Reserve Requset Admin</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

</body>
</html>
<?php
if(isset($_GET['bookid'])){
session_start();
	$rqst_id=$_GET['bookid'];
	$requester_id = $_SESSION['user_id'];
	$query101 = "DELETE FROM rqst_reserve WHERE rqst_id='$rqst_id' AND requester_id='$requester_id'";
			$result101=mysqli_query($link,$query101);
			if (!$result101) {
				echo mysqli_error($link);
			}else{
				?>
				<script type="text/javascript">
				window.location.href="rqst_rsv_admin.php";
				</script><?php
			}
}
?>