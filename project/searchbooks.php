<?php include 'connect.php';?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="form-group">
			<input class="form-control" placeholder="Enter the book name" type="text" name="searchbox" size="50">
			<input class="form-control" name="submit" type="submit" class="btn btn-primary">
		</form>
		<button> <a href="userpage.php">goback</a> </button>
	</div>

</body>
</html>
<?php
session_start();
if (isset($_POST['submit'])) {
	$userq=$_POST['searchbox'];
	$query="select * from add_books where bookname like '%$userq%'";
	$result=mysqli_query($link,$query);
	if (!$result) {
		echo mysqli_error($link);
	}
	if (!$result) {
		echo mysqli_error($link);						
	}
		echo "<table class='table table-striped table-hover table-condensed'>";
		while ($r=mysqli_fetch_assoc($result)) {
					echo "<tr>";
						echo "<td>"; echo $r['bookname'];echo "</td>";
						echo "<td>"; echo $r['authorname'];echo "</td>";
						
						echo "<td>";?>
							 <img height="200" width="160" src="<?php echo $r['bookimage'];?>">
							 <?php
						echo "</td>";
						
						echo "<td>"; echo $r['price'];echo "</td>";
						echo "<td>"; echo $r['purchasedate'];echo "</td>";
						echo "<td>"; echo $r['totalbooknumber'];echo "</td>";
						echo "<td>"; echo $r['availablebookquantity'];echo "</td>";
						echo "<td>"; echo $r['branch'];echo "</td>";
					echo "</tr>";
					}
				echo "</table>";
					?><a href="logout.php?name=<?php echo $_SESSION['login_user']?>">Logout</a><?php
}

