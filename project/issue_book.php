<?php session_start(); ?><?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>issue Books to students</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
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

	<form class="form-group my-2" method="POST" action="">
		<h3 class="h3">Issue-Books</h3>
		<input type="text" required name="adno" placeholder="enter Users admission number" class="form-control">
		<input type="text" required name="bookid" placeholder="Enter the ID of Book To Be Issued" class="form-control">
		<input type="submit" class="btn btn-default" name="submit">
	</form>

	<form class="form-group my-2" method="POST" action="">
		<h3 class="h3">Issue Reserved Books</h3>
		<input required type="text" name="res_adno" placeholder="enter Users admission number" class="form-control">
		<input type="submit" class="btn btn-default" name="res_submit">
	</form>
	
</div>
	</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		$adnum=$_POST['adno'];
		$bookid=$_POST['bookid'];
		
		$query="SELECT availablebookquantity FROM add_books WHERE id='$bookid'";
		$result=mysqli_query($link,$query);
		
		if (!$result) {
			echo mysqli_error($link);
		}
		
		$row=mysqli_fetch_assoc($result);
		if (!$row) {
			echo  mysqli_error($link);
		}

		$available_quantity=$row['availablebookquantity'];
		$resulting_quantity="";
		if ($available_quantity > '0') {

			//get all data from signup table 
			$query3="SELECT * FROM signup WHERE id='$adnum'";
			$result3=mysqli_query($link,$query3);
			$row3=mysqli_fetch_assoc($result3);
			// check if a users slot1 is empty 
			if (empty($row3['reservebook1']))  {
					echo "slot 1 is free adding the book";
					$query4="UPDATE signup SET reservebook1='$bookid' WHERE id='$adnum'";
					$result5=mysqli_query($link,$query4);
					if (!$result5) {
						echo mysqli_error($link);
					}
					// new stock after issuing the book
					$resulting_quantity=$available_quantity-'1';
					$query2="UPDATE add_books SET availablebookquantity='$resulting_quantity' WHERE id='$bookid'";
					$result2=mysqli_query($link,$query2);
					if (!$result2) {
						echo mysqli_error($link);
					}
					$current_date=date("d-m-Y");
					$return_date=strtotime('+2 week',strtotime($current_date));
					$return_date=date('d-m-Y',$return_date);
					
					$query10="INSERT INTO issued_books(book_id,student_id,reserved_date,return_date) VALUES('$bookid','$adnum','$current_date','$return_date')";	
					$result10=mysqli_query($link,$query10);
					if (!$result10) {
						echo mysqli_error($link);
					}

				}
				// if slot 1 is empty add to the second slot of the signup table
			elseif(empty($row3['reservebook2'])) {
				
					echo "adding to slot 2";
					$query7="UPDATE signup SET reservebook2='$bookid' WHERE id='$adnum'";
					$result7=mysqli_query($link,$query7);
					if (!$result7) {
						echo mysqli_error($link);
					}

					$resulting_quantity=$available_quantity-'1';
					$query2="UPDATE add_books SET availablebookquantity='$resulting_quantity' WHERE id='$bookid'";
					$result2=mysqli_query($link,$query2);
					if (!$result2) {
						echo mysqli_error($link);
					}	
					
					$current_date=date("d-m-Y");
					$return_date=strtotime('+2 week',strtotime($current_date));
					$return_date=date('d-m-Y',$return_date);

					$query10="INSERT INTO issued_books(book_id,student_id,reserved_date,return_date) VALUES('$bookid','$adnum','$current_date','$return_date')";	
					$result10=mysqli_query($link,$query10);
					if (!$result10) {
						echo mysqli_error($link);
					}else{
						?> <script type="text/javascript">alert("success!");</script> <?php
					}
				}
			else{
				echo "You have already reserved 2 books, please return a book to proceed";
				}
			}
		else{
			echo "Selected Book Is Out Of Stock,Or Invalid Book Id Entered";
		}
			}
//  reserve issue book validation
		if (isset($_POST['res_submit'])) {
			$stud_id = $_POST['res_adno'];
			$qu1 ="SELECT *FROM reserve WHERE student_id='$stud_id'";
			$re = mysqli_query($link,$qu1);
			while ($r = mysqli_fetch_assoc($re)) {
				$book_id = $r['book_id'];	
				$student_id = $r['student_id'];	
			}

			$qu = "DELETE FROM reserve WHERE student_id='$stud_id'"; // deleted The record from the reserve table
			$r = mysqli_query($link,$qu);
		// add to issue_books table
		// add the book id to signup slot
			$today = time();
			$ret = strtotime("+2 weeks",$today);
			$ret = date("d-m-Y",$ret);
			$today = date("d-m-Y",$today);
			if(!empty($book_id)){
			$qu2 = "INSERT INTO issued_books(book_id,student_id,reserved_date,return_date) VALUES('$book_id','$stud_id','$today','$ret')";
			$r2 = mysqli_query($link,$qu2);
			}
			if (!$r2) {
				echo mysqli_error($link);
			}else{
				?> <script type="text/javascript">alert("Success!");</script> <?php
			}
			// add the book id to any slot of the user
			$qu5 = "SELECT * FROM signup WHERE id='$stud_id'";
			$r3 = mysqli_query($link,$qu5);
			while ($r0 = mysqli_fetch_array($r3)) {
				$slot1 = $r0['reservebook1'];
				$slot2 = $r0['reservebook2'];
			}
			if (empty($slot1)) {
				$qu223 = "UPDATE signup SET reservebook1='$book_id' WHERE id='$stud_id'";
				$r223 = mysqli_query($link,$qu223); 
			}
			elseif (empty($slot2)) {
				$qu223 = "UPDATE signup SET reservebook2='$book_id' WHERE id='$stud_id'";
				$r223 = mysqli_query($link,$qu223);	
			}
			else {
				?> <script type="text/javascript">alert("slots are full! please return a book");</script><?php
			}

		}
			


	

?>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>