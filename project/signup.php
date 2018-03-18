<?php include 'connect.php';?><!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background-color:#ddf0ea!important;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>signup</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
	<div class="container">
	<div class="py-4">
	<h1 class="">Sign Up</h1>

		<form action="" method="POST" class="form-group">
		<br>
		<input required class="form-control" type="text" name="usernameS" placeholder="Enter your name">		
		<input required class="form-control" type="text" name="idS" placeholder="Enter your admission number" size="35">
		<input required class="form-control" type="text" name="branchS" placeholder="Enter your branch" size="35">
		<input required class="form-control" type="text" name="ageS" placeholder="Enter your age" size="35">
		<input required class="form-control" type="text" name="semS" placeholder="Enter your current semester" size="35">
		<input required class="form-control" type="password" name="passwordS" placeholder="choose a password">
		<input required class="form-control" type="password" name="re_passwordS"  placeholder="re-enter your password" size="35">
		<input required class="form-control btn-primary"" type="submit" name="submitS" value="Signup">
		</form>
		<a href="index.php" class="btn btn-secondary">Go-back</a>
	</div>
	
</div>
</body>
</html>
<?php
	if (isset($_POST['submitS'])) {
	$name=$_POST['usernameS'];
	$id=$_POST['idS'];
	$age=$_POST['ageS'];
	$branch=$_POST['branchS'];
	$semester=$_POST['semS'];
	$password=$_POST['passwordS'];
	$re_password=$_POST['re_passwordS'];
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      ?> <script type="text/javascript"> alert("Only letters and white space allowed"); </script>; <?php 
      	goto l1;
		if ($password==$re_password) {
			if (!$link) {
				echo mysqli_error($link); 
			}
			$registered_date = date('d-m-Y');
			$query="INSERT into signup(id,susername,sage,currentsem,branch,password,registered_date) VALUES('$id','$name','$age','$semester','$branch','$password','$registered_date')";
			if ($query) {
				echo mysqli_error($link); 
			}
			$result=mysqli_query($link,$query);
			if(!$result){
				echo mysqli_error($link);
			}else{
				?> <script type="text/javascript">
					alert("Successfully registered with the system");
				</script>
				<?php
					
			}
		l1:}else{
			?> <script type="text/javascript">alert("Password mismatch");</script>
		<?php
		}

	}
}
	


?>