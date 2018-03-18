<?php include 'connect.php';?><?php

$id=$_GET['id'];
$query="UPDATE signup set status='no' where id=$id";



						if (!$connect) {
							echo "connectionh not".mysql_error();
						}



$result=mysqli_query($connect,$query);
if(!$result){
	echo mysql_error();
}
else{
?>
		<script type="text/javascript">
				window.location.href="approve_notapprove.php";			
		</script><?php
}
?>