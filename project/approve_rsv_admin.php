<?php session_start(); 
	  include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Reserve Requset Admin</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

</body>
</html>

<?php
if (isset($_GET['bookid'])) {
	
	$bookid = $_GET['bookid'];
	$requester_id = $_SESSION['user_id'];
	// get the stock
	$query = "SELECT *FROM add_books WHERE id='$bookid'";
	$result=mysqli_query($link,$query);
	$row1=mysqli_fetch_assoc($result);
	$available_quantity = $row1['availablebookquantity'];	

	// decrease the stock 
	$resulting_quantity=$available_quantity-'1';
	$query2="UPDATE add_books SET availablebookquantity='$resulting_quantity' WHERE id='$bookid'";
	$result2=mysqli_query($link,$query2);
		if (!$result2) {
			echo mysqli_error($link);
		}
	if (!$result2) {
		echo mysqli_error($link);
		}
		$current_date=date("d-m-Y");
		$expire_date=strtotime('+1 minutes',strtotime($current_date)); // when the reserve should be deleted from reserve
		
		$query10="INSERT INTO reserve(book_id,student_id,reserved_date,expire_date) VALUES('$bookid','$requester_id','$current_date','$expire_date')";	
		$result10=mysqli_query($link,$query10);
		if (!$result10) {
			echo mysqli_error($link);
		}else{
		// delete the temporary table row 
			$query101 = "DELETE FROM rqst_reserve WHERE reserve_book_id='$bookid' AND requester_id='$requester_id'";
			$result101=mysqli_query($link,$query101);
			if (!$result101) {
				echo mysqli_error($link);
			}else{
				
				?><script type="text/javascript">
					window.location.href="rqst_rsv_admin.php";
				</script>
				<?php
			}

		}

}
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
	


?>