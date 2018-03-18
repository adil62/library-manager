<?php include 'connect.php';?><?php session_start();?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Request for new Books</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php include "navbar_cli.php";?>
		<h3 class="text-center">Request New Books</h3>
		<div class="my-3">
		<form action="" method="POST" class="form-group">
			<input required class="form-control" type="text" name="rqstbookname" placeholder="Enter The Name Of The Book ">
			<input required class="form-control" type="text" name="rqstbook_author" placeholder="Enter The Name Of The Author Of The Requesting Book ">
			<input class="form-control" type="submit" name="rqstsubmit" value="Request">
		</form>
	</div>
</div>
</body>
</html>
<?php
	if (isset($_POST['rqstsubmit'])) {
		
		$book_name = $_POST['rqstbookname'];
		$book_auhtor = $_POST['rqstbook_author'];
		$username = $_SESSION['login_user'];
		$todays_date = date('d-m-Y');

		$q="INSERT INTO request_books(rqst_bookname,rqst_author,requested_by,rqst_date) VALUES('$book_name','$book_auhtor','$username','$todays_date')";
		$r = mysqli_query($link,$q);
		if (!$r) {
			echo mysqli_error($link);
		}else{
			?>
			 <script class="fade" type="text/javascript">
				alert("Request was success");
				window.location.href = "userpage.php";
			</script>
			<?php
			}
	}
	
	if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}



?>