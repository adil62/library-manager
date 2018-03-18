<!DOCTYPE html>
<html>
<head>
	@media (min-width: @screen-sm-min) { ... }

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="userpage.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>user</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-xs-1 col-lg-12 col-md-12">
<div class="bg-secondary navbar col-xs-1">
  
  <a class="col navbar-brand text-light" href="#"><h1>E-library</h1></a>
  <a class="col nav-link active  text-dark h4" href="userpage.php">Home</a>
  <a class="col nav-link active  text-dark h4" href="reserve_book_client.php">Reserve</a>
  <a class="col nav-link active  text-dark h4" href="request_books.php">Request</a>
  <a class="col nav-link active  text-dark h4" href="display_msg.php">Messages</a>
  <a class="col btn btn-success" href="logout.php?name=<?php echo $_SESSION['login_user'];?>">Logout</a>

   <form method="POST" action="" class="form-inline">
                <input  name="search" class="form-control " type="search" placeholder="Search" >
                <button name="submit_search" class="btn btn-success text-dark" type="submit">Search</button>
   </form>
</div>
</div>
</div>
</div>
</body>
</html>