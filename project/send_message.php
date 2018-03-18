<?php include 'connect.php';?><?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>send message</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<style type="text/css">
		body{
			background-color:#EFEBE9!important;
		}
	</style>
</head>
<body>

	<div class="container">

		<?php include "admin_nav.php"; ?>
		
		<div class="content py-3 my-3">
			<form action="" method="POST" class="form-group">
				<?php
				
				$query = "SELECT * FROM signup";
				$result=mysqli_query($link,$query);
				if(!$result)	{	echo mysqli_error($link);	}
				
				echo "<select class='form-control' name='sel'>";
				echo "<option>Select Id Of The User</option>";

				while($rows=mysqli_fetch_array($result)) {
						$id=$rows['id'];
						echo "<option >";
							echo $rows['id'];
						echo "</option>";
					}	
				echo "</select>";
				
				echo "<input required type='text' class='form-control' name='msg_title' placeholder='Enter The Title Of The Message'>";
				
				?>		<textarea id='l' onfocus="this.value=''" name='msg' class='form-control'>Enter message</textarea><?php					
				echo "	<input required type='submit' class='btn btn-primary form-control' name='submit' value='Send Message'>";	
				?>
			</form>
		</div>
	</div>
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		$msg_title = $_POST['msg_title'];
		$msg = $_POST['msg'];					
		$reciever = $_POST['sel'];
		$msg_date =$_SESSION['currentdate'];
		

		$query2 = "INSERT INTO messages(msg_title,msg,reciever_id,msg_sent_date) VALUES('$msg_title','$msg','$reciever','$msg_date')";
		$result2 = mysqli_query($link,$query2);
		if (!$result2) {
			echo mysqli_error($link);
		}

	}



?>
<?php 
if(isset($_POST['submit_search'])){
		include "nav_search.php";
		nav_search();
	}
?>