<?php session_start(); ?><!DOCTYPE html>
<?php include 'connect.php';?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Display Fine Details of Students</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<div>
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<h1 class="h1" href="">E-Library</h1>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      	<li class="nav-item active">
	        <a class="nav-link" href="manage_books.php">Home</a>
	      	</li>

	     	<li class="nav-item">
	       		 <a class="nav-link" href="manage_books.php">Manage Books</a>
	        </li>
			

	     	<li class="nav-item">
	       		 <a class="nav-link" href="manage_users_admin.php">Manage Users</a>
	        </li>


	     	<li class="nav-item">
	       		 <a class="nav-link" href="send_message.php">Message</a>
	        </li>
	        

	      	<li class="nav-item active">
	        	<a class="btn btn-secondary" href="logout.php?name=<?php echo $_SESSION['admin'];?>">Logout</a>
	      	</li>
	    </ul>

	   <form method="POST" action="" class="form-inline">
			<input  name="search" class="form-control " type="search" placeholder="Search" >
			<button name="submit_search" class="btn btn-outline-success " type="submit">Search</button>
 		</form>
	  </div>
	</nav>
<!-- nav bar ends here -->

		<!-- sidebar -->
		<div >
		<nav class="navbar navbar-expand-lg navbar-light bg-dark">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    	<ul class="navbar-nav mr-auto">
            	 <li class="nav-item ">
                    <a  class="nav-link" href="approve_notapprove.php" style="color: #e6e6e6">Approve User Accounts</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link"  href="all_user_admin.php" style="color: #e6e6e6">All User Details</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="delete_user_account.php" style="color: #e6e6e6">Delete User</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="admin_view_book_request.php" style="color: #e6e6e6">Book Requests By Users</a>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link" href="display_fine_details.php" style="color: #e6e6e6">Fine Details</a>
                </li>
                 <li class="nav-item ">
                    <a  class="nav-link" href="view_online_users.php" style="color: #e6e6e6">View Online Users</a>
                </li>
            </ul>
        </div>
</div>

		</div>
		<table class="table table-dashed">
			<tr>
				<th>fine_id</th>
				<th>Student_id</th>
				<th>Student_fine</th>
				<th>Student_name</th>
				<th>Fine_last_recorded_date</th>
			</tr>
			<?php
				
				$query = "SELECT *FROM fine";
				$result=mysqli_query($link,$query);
				while( $row=mysqli_fetch_assoc($result) ){
					echo "<tr>";
						echo "<td>"; echo $row['fineid'];	echo "</td>";
						echo "<td>"; echo $row['student_id'];	echo "</td>";
						echo "<td>"; echo $row['student_fine'];	echo "</td>";
						echo "<td>"; echo $row['student_name'];	echo "</td>";
						echo "<td>"; echo $row['fine_recorded_date'];	echo "</td>";
					echo "</tr>";
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