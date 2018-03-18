<?php include 'connect.php';?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>View Books User</title>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#FDF3E7!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<h1 class="h1" href="">E-Library</h1>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      	<li class="nav-item active">
	        <a class="nav-link" href="userpage.php">Home</a>
	      	</li>

	     	<li class="nav-item">
	       		 <a class="nav-link" href="reserve_book_client.php">Reserve</a>
	        </li>
			

	     	<li class="nav-item">
	       		 <a class="nav-link" href="request_books.php">Request</a>
	        </li>


	     	<li class="nav-item">
	       		 <a class="nav-link" href="display_msg.php">Messages</a>
	        </li>


	      	<li class="nav-item active">
	        	<a class="btn btn-secondary" href="logout.php?name=<?php echo $_SESSION['login_user']?>">Logout</a>
	      	</li>
	    </ul>

	   <form method="POST" action="" class="form-inline">
			<input  name="search" class="form-control " type="search" placeholder="Search" >
			<button name="submit_search" class="btn btn-outline-success " type="submit">Search</button>
 		</form>
	  </div>
	</nav>

			
			<?php
			session_start();
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
</body>
</html>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>