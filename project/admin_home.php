<?php session_start(); ?>
<?php 
function find_total_num_books() {
	include "connect.php";
	$query = "select *from add_books";
	$result = mysqli_query($link,$query);
	$num = '0';
	$sum = '0';
	while($row = mysqli_fetch_assoc($result)){
		$num = $row['totalbooknumber'];	
		$sum = $num + $sum; 			// total books in the library
	}
	echo $sum;

}
function find_fine_pending() {
	include "connect.php";
	$query = "select *from fine";
	$result = mysqli_query($link,$query);
	$num = '0';
	$sum = '0';
	while($row = mysqli_fetch_assoc($result)){	
		$sum ++ ;			// total books in the library
	}
	echo $sum;
}


function find_total_reserved() {
	include "connect.php";
	$query = "select *from reserve";
	$result = mysqli_query($link,$query);
	$num = '0';
	$sum = '0';
	while($row = mysqli_fetch_assoc($result)){	
		$sum ++ ;			// total books in the library
	}
	
	echo $sum;
}

function find_total_issued() {
	include "connect.php";
	$query = "select *from issued_books";
	$result = mysqli_query($link,$query);
	$num = '0';
	$sum = '0';
	while($row = mysqli_fetch_assoc($result)){	
		$sum ++ ;			// total books in the library
	}
	echo $sum;	
} 
function find_total_users() {
	include "connect.php";
	$query = "select *from signup WHERE status='yes'";
	$result = mysqli_query($link,$query);
	$num = '0';
	$sum = '0';
	while($row = mysqli_fetch_assoc($result)){	
		$sum ++ ;			// total books in the library
	}
	echo $sum;	
} 

?>



<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<title>home page</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color: #E7CC8F;
		}

	</style>
</head>
<body>
<div class="container">
	<?php include "admin_nav.php"; ?> 
	<div class="py-3">
		<table class="table table-striped table-hover table-condensed"> 	
		<div>
			<tr>	
				<th class=""> Total Number Of Books In library: </th>
				<td class=""> <?php find_total_num_books();?>		</td>
			</tr>
			<tr>
				<th class=""> Total Number Of Books Past Return Date : </th>
				<td class=""> <?php find_fine_pending();?>	</td>
			</tr>
			<tr>
				<th class=""> Total Number Of Books In Reserve : </th>
				<td class=""> <?php find_total_reserved();?>		</td>
			</tr>
			<tr>	
				<th class=""> Number Of Books Issued :   </th>
				<td class=""> <?php find_total_issued();?>			</td>
		 	</tr>
		 	<tr>	
				<th class=""> Number Of Students Registered In the System :   </th>
				<td class=""> <?php find_total_users();?>			</td>
		 	</tr>			    
		 </div>	 	
		</table>
	</div>
	
</div>

</body>
</html>