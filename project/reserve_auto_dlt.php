<?php
function res_auto_dlt(){
	include "connect.php";
	$today = time();
	$query = "SELECT *FROM reserve WHERE expire_date < '$today'";
	$re = mysqli_query($link,$query);

	if (!$re ) {
		echo mysqli_error($link);
	}

while($row = mysqli_fetch_assoc($re)){
	$dbuid 	  = $row['student_id'];
	$res_date = $row['reserved_date'];
	$exp_date = $row['expire_date'];
	$res_id = $row['reserve_number'];
	$bookid = $row['book_id'];

	// if todays date > expire_date then delete that row
	$q2 = "DELETE FROM reserve WHERE reserve_number='$res_id'";
	$re2 = mysqli_query($link,$q2);

	if (!$re2) {
		echo mysqli_error($link);
	}
	$q = "SELECT *FROM add_books WHERE id='$bookid'";
	$r = mysqli_query($link,$q);

	$r = mysqli_fetch_assoc($r);
		$av_bk_qn = $r['availablebookquantity']; 
		$res_qn	  = $av_bk_qn + 1;
		$q3 = "UPDATE add_books SET availablebookquantity='$res_qn' WHERE id='$bookid'";
		$r3 = mysqli_query($link,$q3);
	
}


}
		
?>