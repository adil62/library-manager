<?php include 'connect.php';?><?php session_start(); ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>return books admin</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
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
		<h4 class="text-center py-2">Return Book</h4>
		<form action=" " method="POST" class="form-group my-3">
			<input required type="text" class="form-control" placeholder="Enter the ID of Book to be returned" name="bookid">
			<input required type="text" class="form-control" placeholder="Enter the ID of user" name="userid">
			<input type="submit" name="submit" class="btn btn-defualt">
		</form>
	</div>

<?php
		
		if (isset($_POST['submit'])) {
		$bookid=$_POST['bookid'];
		$adsid=$_POST['userid'];
		
		$query="SELECT * FROM signup WHERE id='$adsid'";
		$result=mysqli_query($link,$query);
		$row=mysqli_fetch_assoc($result);

		if (!$result) {
			echo mysqli_error($link);
		}
		$slot1=$row['reservebook1'];
		$slot2=$row['reservebook2'];

		if ($slot1==$bookid) {
			//free the reserve slot from the signup table
			$query2="UPDATE signup SET reservebook1=NULL WHERE id='$adsid'";
			$result2=mysqli_query($link,$query2);
			?> <script type="text/javascript">alert("Book succesfully returned");</script> <?php

			$query4="SELECT * FROM add_books WHERE id='$bookid'";
			$result4=mysqli_query($link,$query4);
			$row4=mysqli_fetch_assoc($result4);

			//increase the total book number to 1 from the add_books table
			$current_stock=$row4['availablebookquantity'];
			
			$new_stock=$current_stock+1;
			$query3="UPDATE add_books SET availablebookquantity='$new_stock' WHERE id='$bookid'";
			mysqli_query($link,$query3);		
			
			//delete the row details about the reserve from issued_books table
			$query11="DELETE FROM issued_books WHERE student_id='$adsid'";
			$result11=mysqli_query($link,$query11);

			if (!$result11) {
				echo mysqli_error($link);
			}

		}
		elseif ($slot2==$bookid) {
			$query2="UPDATE signup SET reservebook2=NULL WHERE id='$adsid'";	
			$result2=mysqli_query($link,$query2);
			echo "your book has been successfully returned";
			
			$query4="SELEcT * FROM add_books WHERE id='$bookid'";
			$result4=mysqli_query($link,$query4);
			$row4=mysqli_fetch_assoc($result4);

			$current_stock=$row4['availablebookquantity'];
			echo "current stcok".$current_stock;
			$new_stock=$current_stock+1;
			$query3="UPDATE add_books SET availablebookquantity='$new_stock' WHERE id='$bookid'";
			mysqli_query($link,$query3);
			
			$query11="DELETE FROM issued_books WHERE student_id='$adsid'";
			$result11=mysqli_query($link,$query11);
			if (!$result11) {
				echo mysqli_error($link);
			}

		}
		else{
			echo "the specified book id is wrong";
		}
		
}?>
</body>
</html>



<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>