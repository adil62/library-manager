<?php session_start(); ?>
<?php include 'connect.php'; ?>
<?php
	
	if (isset($_POST['submit_book_details']) && $_FILES['file']['name']) {
		$bookname=$_POST['bookname'];
		$authorname=$_POST['authorname'];
		$price=$_POST['price'];
		$purchase_date=$_POST['purchase_date'];
		$total_books=$_POST['total_book_number'];
		$available_books=$_POST['available_book_quantity'];
		$branch=$_POST['branch'];

		$file_name=$_FILES['file']['name'];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		
		$location="book_image/";
		$complete_loc=$location.$file_name;

		if(move_uploaded_file($file_tmp_name,$location.$file_name))
			{}
		else
			echo "erro uploding";

		
		$query="INSERT into add_books (bookname,authorname,bookimage,price,purchasedate,totalbooknumber,availablebookquantity,branch) VALUES ('$bookname','$authorname','$complete_loc','$price','$purchase_date','$total_books','$available_books','$branch');";
		$result=mysqli_query($connect,$query);
		
		if (!$result) {
			echo "<br/>"."error".mysqli_error($connect);
		}else
		{?> <script type="text/javascript">alert("successfully added");</script> <?php }
	}
	if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>addbooks</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
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

		<h3 class="text-center py-2">Add New Books To Library</h3>
			<!--navbar ends  -->
	<div class="row mx-auto my-auto py-2">
		<div class="col-12 ">
		<form class="form-group" action="addbooks.php" method="POST" enctype="multipart/form-data">
			<tr>
				<td>
					<input required class="form-control" type="text" name="bookname" placeholder="Enter book name">
					<input required class="form-control" type="text" name="authorname" placeholder="Enter Author Name">
					<input required class="form-control" type="text" name="price" placeholder="Enter Price">
					<input required class="form-control" type="text" name="purchase_date" placeholder="Enter book purchase Date">
					<input required class="form-control" type="text" name="total_book_number" placeholder="Enter Total aount of Books">
					<input required class="form-control" type="text" name="available_book_quantity" placeholder="available quantity">
					<input required class="form-control" type="text" name="branch" placeholder="Branch">
					<input required class="form-control" type="file" name="file">
					<input required type="submit" name="submit_book_details" value="ok" class="btn btn-primary py-2">
				</td>
			</tr>
		</form>
		</div>
	</div>
	
</body>
</html>
