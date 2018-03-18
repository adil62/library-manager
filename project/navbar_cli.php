

<div class="bg-secondary navbar">
  <a class="navbar-brand text-light" href="#"><h1>E-library</h1></a>
  <a class="nav-link active  text-dark h4" href="userpage.php">Home</a>
  <a class="nav-link active  text-dark h4" href="reserve_book_client.php">Reserve</a>
  <a class="nav-link active  text-dark h4" href="request_books.php">Request</a>
  <a class="nav-link active  text-dark h4" href="display_msg.php">Messages</a>
  <a class="btn btn-success" href="logout.php?name=<?php echo $_SESSION['login_user'];?>">Logout</a>

   <form method="POST" action="" class="form-inline">
                <input  name="search" class="form-control " type="search" placeholder="Search" >
                <button name="submit_search" class="btn btn-success text-dark" type="submit">Search</button>
   </form>

</div>

