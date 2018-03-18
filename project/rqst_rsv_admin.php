<?php include 'connect.php';?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>rqst_rsv ADMIN</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php include "admin_nav.php"; ?>
	<?php include "sec_nav_manage_books.php"; ?>
	<?php include "connect.php"; ?>
	<div class="my-2">	
	<h4>Dispalaying Reserve Requests</h4>
	<?php 
	$query = "SELECT *FROM rqst_reserve";
	$res = mysqli_query($link,$query);
	?><table class="table class='table table-striped table-hover table-condensed">
		<tr>
			<th>Id</th>
			<th>Reserve Requested by</th>
			<th>Reserve Request Book Id</th>
			<th>Reserve Requested Date</th>
			<th>Approve Request</th>
			<th>Delete Request</th>
		</tr>
	<?php
	while($r=mysqli_fetch_assoc($res)){
		?><tr>
			<td><?php echo $r['rqst_id'];?></td>
			<td><?php echo $r['requester_id'];?></td>
			<td><?php echo $r['reserve_book_id'];?></td>
			<td><?php echo $r['rqst_date'];?></td>
			<td><a href="approve_rsv_admin.php?bookid=<?php echo $r['reserve_book_id'];?>"> Approve Request</a></td>
			<td><a href="dlt_rsv_admin.php?bookid=<?php echo $r['rqst_id'];?>"> Delete Request</a>		</td>
		  </tr>
		<?php

	}
?>
	  </table>
	</div>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>