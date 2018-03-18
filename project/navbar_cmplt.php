	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">E-Library</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>

	      <li class="nav-item">
	        <a class="nav-link" href="#">Reserve</a>
	      </li>
	     
	      <li class="nav-item active">
	        <button class="btn btn-alert"><a href="logout.php?name=<?php echo $_SESSION['login_user']?>">Logout</a></button>
	      </li>
	    </ul>

	   <form method="POST" action="" class="form-inline">
			<input  name="search" class="form-control " type="search" placeholder="Search" >
			<button name="submit_search" class="btn btn-outline-success " type="submit">Search</button>
 		</form>
	  </div>
	</nav>