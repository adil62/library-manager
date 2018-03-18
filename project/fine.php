<!DOCTYPE html>
<html>
<head>
	<title>Fine Calculation</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

</body>
</html>

<?php
function calculate_fine(){
    include 'connect.php';

	$username=$_SESSION['login_user'];
	


	$userid=$_SESSION['user_id'];
	

	$query2="SELECT *FROM issued_books WHERE student_id='$userid'";
	$result2=mysqli_query($link,$query2);
	if (!$result2) {
		echo mysqli_error($link);
	}
	$row2=mysqli_fetch_assoc($result2);
	$return_date = $row2['return_date'];
	$todays_date = date('d-m-Y');
	$bookid  = $row2['book_id'];

	$issued_table_id = $row2['student_id'];
	$uid = $_SESSION['user_id'];
	if($_SESSION['user_id'] == $issued_table_id){
		$returnsecs=strtotime($return_date);
		$todayssecs=strtotime($todays_date);
		if($returnsecs < $todayssecs){
			$daysleft=$todayssecs-$returnsecs;
			$r=$daysleft/86400;
			$r=round($r);
			
			$fine=$r*10;
			
			$query9 = "SELECT *FROM fine WHERE student_id='$uid'";
			$r3 = mysqli_query($link,$query9);
			$ro3 = mysqli_fetch_assoc($r3);
			$fine_stud_id = $ro3['student_id'];

			if($fine_stud_id == $uid){
				$query22alt = "UPDATE fine SET student_fine='$fine',fine_recorded_date='$todays_date',bookid='$bookid' WHERE student_id='$uid'";
				$rr = mysqli_query($link,$query22alt);			
			}else{
				$query22="INSERT INTO fine(student_id,student_fine,student_name,fine_recorded_date,bookid) VALUES('$userid','$fine','$username','$todays_date','$bookid')";
				$result22 = mysqli_query($link,$query22);
				if(!$result22){	
				echo mysqli_error($link);}
			}	
		}
}
}
?>