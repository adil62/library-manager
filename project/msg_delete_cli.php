<?php include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>msg_delete</title><meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>

</body>
</html>
<?php
	if (isset($_GET['msg_id'])) {
		$qid = $_GET['msg_id'];

		$query = "DELETE FROM messages WHERE id='$qid'";
		$r = mysqli_query($link,$query);
		if (!$r) {
				mysqli_error($link);
			}
		
		?>
		<script type="text/javascript">
				window.location.href="display_msg.php";			
		</script><?php
	}





?>