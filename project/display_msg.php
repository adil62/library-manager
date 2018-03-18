<?php session_start();?><!DOCTYPE html>
<?php include 'connect.php';?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Display Message</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php include "navbar_cli.php";?>

<?php
	echo "<div class='my-2'>";
	$userid = $_SESSION['user_id'];
	$query = "SELECT * FROM messages WHERE reciever_id='$userid' ORDER BY id DESC";
	$result = mysqli_query($link,$query);
	
	echo "<div class='container'>";
		echo "<table class='table table-striped table-hover table-condensed'>";
			echo "<tr>";
				echo "<th>Message Title</th>";
				echo "<th>Message Body</th>";
				echo "<th>Message Send Date</th>";
				echo "<th>Delete Message</th>";
			echo "</tr>";
	while($row=mysqli_fetch_assoc($result)){
		$msg_date=$row['msg_sent_date'];
		$msg=$row['msg'];
		$msg_title=$row['msg_title'];
			echo "<tr>";
				echo "<td>$msg_title</td>";
				echo "<td>$msg</td>";
				echo "<td>$msg_date</td>";
				?> <td>	<a class="btn" href="msg_delete_cli.php?msg_id=<?php echo $row['id'];?>">Delete</a></td><?php
			echo "</tr>";
	}
		echo "</table>";
	echo "</div>";

	echo "</div>";

?>
</body>
</html>
<?php 
if(isset($_POST['submit_search'])){
		include 'nav_search.php';
		nav_search();
	}
?>