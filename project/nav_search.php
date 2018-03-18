<?php include 'connect.php';?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	</head>
<body></body> </html>
<?php
function nav_search(){ 
	if (isset($_SESSION['login_user']) || isset($_SESSION['admin'])) {
	$searchq=$_POST['search'];
	include 'connect.php';
	$query="select * from add_books where bookname like '%$searchq%'";
	$result=mysqli_query($link,$query);
	if (!$result) {
		echo mysqli_error($link);
	}
	if (!$result) {
		echo mysqli_error($link);						
	}
		echo "<div class='container'>";
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
					?><?php
				echo "</div>";

	}
}