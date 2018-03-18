<header>
    <nav class="navbar navbar-expand-lg navbar-light pink scrolling-navbar">
        <a class="navbar-brand" href="#"><strong>E-library</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="manage_books.php">Home</a>
            </li>

            <li class="nav-item">
                 <a class="nav-link" href="manage_books.php">Manage Books</a>
            </li>
            

            <li class="nav-item">
                 <a class="nav-link" href="manage_users_admin.php">Manage Users</a>
            </li>


            <li class="nav-item">
                 <a class="nav-link" href="send_message.php">Message</a>
            </li>
            
            
            <li class="nav-item active">
                <a class="btn btn-secondary" href="logout.php?name=<?php echo $_SESSION['admin'];?>">Logout</a>
            </li>
            
        </ul>
        </div>
    </nav>

</header>