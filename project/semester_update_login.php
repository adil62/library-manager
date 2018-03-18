<?php include 'connect.php';?><?php


function date_transform($date,$after_nmonths){
	$a=strtotime("+$after_nmonths months",strtotime($date));
	$a=date("d-m-Y",$a);
	return $a;
}

function calculate_sem(){
include 'connect.php';
$uid = $_SESSION['user_id'];
$semester = $_SESSION['user_semester'];


$q = "SELECT *FROM signup WHERE id='$uid'";
$result = mysqli_query($link,$q);
	if(!$result){echo mysqli_error($link);}
$r=mysqli_fetch_assoc($result);
$reg_date= $r['registered_date'];
$current_date =time();
$reg_date = strtotime($reg_date);	
$exp_semdt_2 = strtotime("+6 months",$reg_date);
$exp_semdt_3 = strtotime("+6 months",$exp_semdt_2);
$exp_semdt_4 = strtotime("+6 months",$exp_semdt_3);
$exp_semdt_5 = strtotime("+6 months",$exp_semdt_4);
$exp_semdt_6 = strtotime("+6 months",$exp_semdt_5);

if($semester == 1){
	if ($current_date < $exp_semdt_2) {
		$q = "UPDATE signup SET currentsem='1' WHERE id='$uid'";
		mysqli_query($link,$q);
	}
	elseif($current_date > $reg_date && $current_date < $exp_semdt_3  ){
		$q = "UPDATE signup SET currentsem='2' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}//sem 2 aano?
	elseif($current_date > $exp_semdt_2 && $current_date < $exp_semdt_4  ){
		$q = "UPDATE signup SET currentsem='3' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}	
	elseif($current_date > $exp_semdt_3 && $current_date < $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='4' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date > $exp_semdt_4 && $current_date < $exp_semdt_6  ){
		$q = "UPDATE signup SET currentsem='5' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date >  $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='6' WHERE id='$uid'";
		mysqli_query($link,$q);
	}
}

elseif($semester == '2'){
	if ($current_date < $exp_semdt_3) {
		$q = "UPDATE signup SET currentsem='2' WHERE id='$uid'";
		$re=mysqli_query($link,$q);
		if(!$re){
			echo mysqli_error($link);
		}
	}
	elseif($current_date > $exp_semdt_2 && $current_date < $exp_semdt_4  ){
		$q = "UPDATE signup SET currentsem='3' WHERE id='$uid'";
		$re=mysqli_query($link,$q);
		if(!$re){
			echo mysqli_error($link);
		}
		
	}	
	elseif($current_date > $exp_semdt_3 && $current_date < $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='4' WHERE id='$uid'";
		$re=mysqli_query($link,$q);
		if(!$re){
			echo mysqli_error($link);
		}
		
	}
	elseif($current_date > $exp_semdt_4 && $current_date < $exp_semdt_6  ){
		$q = "UPDATE signup SET currentsem='5' WHERE id='$uid'";
		$re=mysqli_query($link,$q);
		if(!$re){
			echo mysqli_error($link);
		}
		
	}                
}

elseif($semester == 3){
	if ($current_date < $exp_semdt_4) {
		$q = "UPDATE signup SET currentsem='3' WHERE id='$uid'";
		mysqli_query($link,$q);
	
	}

	elseif($current_date > $exp_semdt_3 && $current_date < $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='4' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date > $exp_semdt_4 && $current_date < $exp_semdt_6  ){
		$q = "UPDATE signup SET currentsem='5' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date >  $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='6' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
}

elseif($semester == 4){
	if ($current_date < $exp_semdt_5) {
		$q = "UPDATE signup SET currentsem='4' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date > $exp_semdt_4 && $current_date < $exp_semdt_6  ){
		$q = "UPDATE signup SET currentsem='5' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
	elseif($current_date >  $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='6' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}
}
elseif($semester == 5){
	if ($current_date < $exp_semdt_6) {
		$q = "UPDATE signup SET currentsem='5' WHERE id='$uid'";
		mysqli_query($link,$q);
	
	}
	elseif($current_date >  $exp_semdt_5  ){
		$q = "UPDATE signup SET currentsem='6' WHERE id='$uid'";
		mysqli_query($link,$q);
		
	}	
}
elseif ($semester == 6) {
		
	}

}

?>