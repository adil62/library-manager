<?php
session_start();
?>
<?php include 'connect.php'; ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style type="text/css"><meta name="viewport" content="initial-scale=1, maximum-scale=1">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
	<title>approve not approve</title>
<body>
<div class="container">
<div>
	<?php include "admin_nav.php"; ?>	
	<?php include "sec_nav_manage_users.php"; ?>	
	<table  class="table table-bordered">
			<thead>
				<tr>
				<th>id</th>
				<th>username</th>
				<th>age</th>
				<th>password</th>
				<th>status</th>
				<th>Approve status</th>
				<th>Do Not Approve status</th>
			</tr>
			</thead>
			<tbody>
				<?php

					// PRINT USER details


						if (!$connect) {
							echo "connectionh not".mysql_error();
						}

					//chec kthe value in the tabel signup with the entered values

						$query  = "SELECT * FROM signup";
						$result=mysqli_query($connect,$query);
						

						while ($row=mysqli_fetch_assoc($result)) {
							echo "<tr>";
								
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['susername']."</td>";
								echo "<td>".$row['sage']."</td>";
								echo "<td>".$row['password']."</td>";
								echo "<td>".$row['status']."</td>";
								echo "<td>";?> 
									<a href='approve.php?id=<?php echo $row['id']; ?>'>
										approve
									</a>
								<?php echo "</td>";
								echo "<td>";?> 
									<a href='notapprove.php?id=<?php echo $row['id']; ?>'>
										Not approve
									</a>
								<?php echo "</td>";
							
							echo "</tr>";	
						}
						if (!$result) {
							die('query failed').mysql_error();
							
						}
				?>
			</tbody>
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