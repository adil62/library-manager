<?php include 'connect.php';?>
<?php
	session_start();
	
	$name =$_GET['name'];
if ($name == 'admin') {		
	if(isset($_SESSION['admin'])){
		unset($_SESSION['admin']); 
		?>
		<script type="text/javascript">
				window.location.href="index.php";			
		</script><?php
	}
}
if($name == $_SESSION['login_user']){
	if(isset($_SESSION['login_user'])){
		$name=$_SESSION['login_user'];
		$query="UPDATE signup SET is_loggedin='no' WHERE susername='$name'";
		
		$res=mysqli_query($link,$query);
		if (!$res) {
			echo mysqli_error($link);
		}
		unset($_SESSION['login_user']); 
		?>
		<script type="text/javascript">
				window.location.href="index.php";			
		</script><?php

	}
}	
?>