<?php
session_start();
?><?php include 'connect.php';?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Manage Books</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
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
		<div row>
			<div class="">		
			<?php
			
			echo "<table class='table table-striped table-hover table-condensed'>";
		
			echo "<tr>";
				echo "<th>Bookname</th>";
				echo "<th>Author Name</th>";
				echo "<th>Book Image</th>";
				echo "<th>Total Book Number</th>";
				echo "<th>Available Book Number</th>";
				echo "<th>Branch</th>";

			echo "</tr>";

				if (!$connect) {
					echo "connectionh not".mysql_error();
				}
				$query  = "SELECT * FROM add_books";
				$result=mysqli_query($connect,$query);
				if (!$result) {
					echo mysqli_error($connect);
				}
				while ($r=mysqli_fetch_assoc($result)) {
					echo "<tr>";
						echo "<td>"; echo $r['bookname'];echo "</td>";
						echo "<td>"; echo $r['authorname'];echo "</td>";
						
						echo "<td>";?>
							 <img height="200" width="160" src="<?php echo $r['bookimage'];?>">
							 <?php
						echo "</td>";
						
						echo "<td>"; echo $r['totalbooknumber'];echo "</td>";
						echo "<td>"; echo $r['availablebookquantity'];echo "</td>";
						echo "<td>"; echo $r['branch'];echo "</td>";
						?>
						<?php
					echo "</tr>";
					}
				echo "</table>";
				?>

		</div>
	</div>
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
