<?php session_start(); ?>
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>view book requests</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<!-- navbar starts here -->
	<div class="container">
		<?php include "admin_nav.php"; ?>
	<?php include "sec_nav_manage_books.php"; ?>
	<?php include "connect.php"; ?>
		<!-- secondary nav end -->
<!-- nav bar ends here -->


<?php
	
	$query ="SELECT *FROM request_books ORDER BY rqst_id DESC";
	$result=mysqli_query($link,$query);
	?>
	<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<td>Request ID</td>
			<td>Requested Book-Name</td>
			<td>Author</td>
			<td>Requested By</td>
			<td>Requested Date</td>
		</tr>
	<?php
	while ($r = mysqli_fetch_assoc($result)) {
		?><tr>
			<td><?php	echo $r['rqst_id'];			?></td>
			<td><?php	echo $r['rqst_bookname'];	?></td>
			<td><?php	echo $r['rqst_author'];		?></td>
			<td><?php	echo $r['requested_by'];	?></td>
			<td><?php	echo $r['rqst_date'];		?></td>
		</tr>
		<?php
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