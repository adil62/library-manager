<?php
		session_start();
?><?php include 'connect.php';?>
<html>
<head>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#ddf0ea!important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>login</title>
</head>
<body>
	
	<div class="container">
	<div class="py-4">
	<h1 class="">Login</h1>
		<form action="" method="POST" class="form-group">
		<br>
		<input required  class="form-control" type="text" name="adnum" placeholder="enter your admission number">		
		<input required  class="form-control" type="password" name="password" placeholder="Enter your password">

		<input required class="form-control btn-primary" type="submit" name="submitL" value="Login">
		</form>
		<a href="signup.php" class="btn btn-secondary">Signup</a>
	</div>
	</div>
</body>
</html>
<?php

	if (isset($_POST['submitL'])) {
		include 'semester_update_login.php';
		include 'fine.php';
		include 'reserve_auto_dlt.php';

    	$adnum=$_POST['adnum'];
   		$password=$_POST['password'];
		$dbpass=' ';
		$query="SELECT * from signup where id='$adnum'";
		
		$re=mysqli_query($link,$query);
		if (!$re) {
			echo mysqli_error($link);
		}
		while ($row=mysqli_fetch_assoc($re)) {
			$dbpass=$row['password'];
			$username=$row['susername'];
			$userid = $row['id'];
			$semester = $row['currentsem'];
			$ustatus = $row['status'];
		}

		if ($dbpass==$password) {
			$_SESSION['login_user']=$username;
			$_SESSION['user_id']=$userid;
			$_SESSION['user_semester']=$semester;
			$_SESSION['currentdate']=date('d-m-Y');
			$currentdate=$_SESSION['currentdate'];
			$query44="SELECT *FROM fine WHERE student_name='$username'";
			$result44=mysqli_query($link,$query44);		
			if (!$result44) {
				echo mysqli_error($link);
			}
			while ($rows=mysqli_fetch_array($result44) ) {
					$dbfineid = $rows['fineid'];
					$dbstudent_id = $rows['student_id'];
					$dbstudent_fine = $rows['student_fine'];
					$dbstudent_name = $rows['student_name'];
					$dbfine_recorded_date = $rows['fine_recorded_date'];
				}
			$query2="UPDATE signup SET is_loggedin='yes' WHERE id='$adnum'";			
			$result=mysqli_query($link,$query2);
			if($ustatus == 'yes'){
				 calculate_fine();
				 calculate_sem();
				 res_auto_dlt();
			 	?> <script type="text/javascript">
			 	window.location.href="userpage.php";</script>
			 		
				<?php
			}elseif($ustatus == 'no'){
				?> <script type="text/javascript">alert("Account not Approved by Admin");</script> <?php
			}	
			}
		//check if the entered values are admin
				
		$query="SELECT password FROM librarian WHERE id='$adnum'";
		$result=mysqli_query($link,$query);
		if(!$result){
			echo mysqli_error($link);
		}
		$rarray=mysqli_fetch_assoc($result);
		$dpassword=$rarray['password'];
		
		if($dpassword==$password){
			$_SESSION['admin']=$adnum;
			res_auto_dlt();
			?> <script type="text/javascript">window.location.href="admin_home.php";</script> <?php
		}


		if(	$dbpass != $password && $dpassword!=$password){
			?> <script type="text/javascript">alert('invalid user account');</script> <?php
		}
		
		
	}
	
?>