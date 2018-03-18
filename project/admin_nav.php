

<div class="bg-secondary navbar">
	<a class="navbar-brand text-light" href="#"><h1>E-library</h1></a>
  <a class="nav-link active  text-dark h5" href="admin_home.php">Home</a>
  <a class="nav-link active  text-dark h5" href="manage_books.php">Manage Books</a>
  <a class="nav-link active  text-dark h5" href="manage_users.php">Manage User</a>
  <a class="nav-link active  text-dark h5" href="send_message.php">Message</a>
  <a class="btn btn-success" href="logout.php?name=<?php echo $_SESSION['admin'];?>">Logout</a>

   <form method="POST" action="" class="form-inline">
                <input  name="search" class="form-control " type="search" placeholder="Search" >
                <button name="submit_search" class="btn btn-success text-dark" type="submit">Search</button>
   </form>
</div>
     

