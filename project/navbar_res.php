<div>
    <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light pink scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>E-library</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="userpage.php">Home</a>
                </li>

                <li class="nav-item">
                     <a class="nav-link" href="reserve_book_client.php">Reserve</a>
                </li>
                

                <li class="nav-item">
                     <a class="nav-link" href="request_books.php">Request</a>
                </li>


                <li class="nav-item">
                     <a class="nav-link" href="display_msg.php">Messages</a>
                </li>


                <li class="nav-item active">
                    <a class="btn btn-secondary" href="logout.php?name=<?php echo $_SESSION['login_user'];?>">Logout</a>
                </li>
            </ul>


                <form method="POST" action="" class="form-inline">
                <input  name="search" class="form-control " type="search" placeholder="Search" >
                <button name="submit_search" class="btn btn-outline-success " type="submit">Search</button>
            </form>

        </div>
    </nav>


</header>

</div>
<br>
<br>