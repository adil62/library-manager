<?php 
session_start();
?>
<?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete_books</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
<div class="container">
	<?php include "connect.php";?>
	<?php include "admin_nav.php"; ?>
	<?php include "sec_nav_manage_books.php"; ?>

<!-- navbar ends here -->
		<form class="form-group" action=" " method="POST" enctype="multipart/form-data">
			<h3 class="form-control my-2">Remove Multiple Books of Same Name and Author</h3>
			<input required class="form-control" required type="text" name="book_name_multi" placeholder="Enter the Name Of the Book">
			<input required class="form-control" required type="text" name="author_name_multi" placeholder="Enter the Name Of the Author">
			<input class="btn btn-danger form-control" type="submit" name="submit_mul" value="Delete">

		</form>	
		<form action="" method="POST">
					<h3 class="form-control">Remove A Single book</h3>
					<?php
					$query = "SELECT *FROM add_books";
					$result = mysqli_query($link,$query);
					echo "<select class='form-control' name='dlt_single'>";
					echo "<option>Select Book</option>";
					while($rows=mysqli_fetch_array($result)) {
						echo "<option >";
							echo $rows['bookname'];
						echo "</option>";
					}	
					echo "</select>";
					?>
					<input class="btn btn-danger form-control" type="submit" name="submit_sgl" value="Delete">
				</td>
			</tr>
		</form>
	</div>
</body>
</html>
<?php
	
	if (isset($_POST['submit_sgl'])) {
		include "connect.php";
		$bookname=$_POST['dlt_single'];
		echo "book is ".$bookname;
		$query = "SELECT *FROM add_books WHERE bookname='$bookname'";
		$result = mysqli_query($link,$query);
		$r=mysqli_fetch_assoc($result);
		$available_book =   $r['availablebookquantity'];
		$total_book     = 	$r['totalbooknumber'];
		
		$total_book =$total_book - 1;
		echo "toatl book is ".$total_book;
		$available_book = $available_book - 1;
		echo "available book is ".$available_book;
		
		$q ="UPDATE add_books SET availablebookquantity='$available_book',totalbooknumber='$total_book' WHERE bookname='$bookname'";
		$result2 = mysqli_query($link,$q);

		if (!$result2) {
			echo mysqli_error($link);
		}
	}	

	if (isset($_POST['submit_mul'])) {
		$bookname_multi = $_POST['book_name_multi'];
		$authorname_multi = $_POST['author_name_multi'];
		$query = "DELETE FROM add_books WHERE bookname='$bookname_multi' AND authorname='$authorname_multi'";
		$result = mysqli_query($link,$query);
				
}	
// code to For Processing search query
if (isset($_SESSION['login_user']) && isset($_POST['submit_search'])) {
	$searchq=$_POST['search'];
	
	$query="select * from add_books where bookname like '%$searchq%'";
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
					?><button class="btn btn-alert"><a href="logout.php?name=<?php echo $_SESSION['login_user']?>">Logout</a></button><?php


}

?>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>