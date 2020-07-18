
<!DOCTYPE html>
<html>
<head>
	<title>Meye Forum</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel = "stylesheet" href = "forum.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="forum.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between" style="opacity: .9">
	 
<img src="Images/logo.png" width="180" height="90" preserveAspectRatio="xMidYMid slice">			<ul class = "navbar-nav mr-auto">
				<li class = "nav-item">
					<a class = "nav-link" href="home.html" style="color: white;">Home</a>
				</li>

				<li class = "nav-item">
					<a class = "nav-link" href="" style="color: white;">About</a>
				</li>

				<li class = "nav-item">
					<a class = "nav-link" href="forum.php" style="color: white;">Forum</a>
				</li>

				<li class = "nav-item">
					<a class = "nav-link" href="" style="color: white;">Contact</a>
				</li>
			</ul>

	  
	  <form class="form-inline ml-auto">
	  	
	    <input class="form-control  mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	    <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
	  </form>

	  <div class = "ml-auto">
	  	  <button type="button" class="btn btn-warning navbar-btn" id = "create_topic" >Create New Topic</button>

		  <?php
	  	  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
	  	  	<button type="button" class="btn btn-outline-info navbar-btn " id = "logout_button" >Logout</button>
	  	  <?php }else{ ?>
		  <button type="button"  class="btn btn-light navbar-btn " id = "login_button" >Login</button>
		  <button type="button" class="btn btn-light navbar-btn " id = "signup_button" >Signup</button>
		  <?php } ?>
		  <button type="button" class=" btn btn-light navbar-btn">Profile</button>
		 <!-- <img src="Images/thumb.jpg" width="80" alt="..." class="img-thumbnail rounded-circle"> -->
	  </div>
	</nav>
	
	</nav>

	<div class ="forum_body">
		<div class="jumbotron">
		  <h3 class="display-4">Welcome to Meye Forum!</h1><br>
		  <p style="font-size: 17px">This is a place where you can ask opinions from an entire community of supportive girls who, chances are, have gone through exactly what you're going through right now. Support your fellow members and remember to lift each other up. Together we're strong! </p>

		</div>
	</div>

	<div class="loginbox" id = "loginbox">
	
	<h1>LOGIN</h1> <br>

	<form action="PHP/login.php" method="post">
		<p>Username</p>
	<input type="text" name="uname" placeholder="Enter Username">
	<p>Password</p>
	<input type="Password" name="pwd" placeholder="Enter Password">
	<button id = "sub" onclick="mysecond()" type="submit" name="login-submit">Login</button><br><br>
	
	<a href="signup.html" class = "signuplink">Don't have an account?</a>
	</form>	

</div>

		<div class="container">
			<h1>    </h1>
	  <div class="row">
	    <div class="col-sm">

	      <button type="button" class="btn-pri btn-primary btn-lg" id = "but1">Come Say Hello!</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class="btn-sec btn-primary btn-lg" id = "but2">GUESS WHAT HAPPENED TODAY</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class="btn-suc btn-primary btn-lg" id = "but3">We All Need Chocolate Here</button>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-sm">
	      <button type="button" class="btn-dan btn-primary btn-lg" id = "but4">Dear Stereotypes...</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class="btn-war btn-primary btn-lg" id = "but5">Burgers...Salads...Probably Burgers</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class=" btn-inf btn-primary btn-lg" id = "but6">Oh My Myths</button>
	    </div>
	  </div>
	   <div class="row">
	    <div class="col-sm">
	      <button type="button" class=" btn-lig btn-primary btn-lg" id = "but7">WE'RE HERE FOR YOU!</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class="btn-dar btn-primary btn-lg" id = "but8">What Should I Wear?</button>
	    </div>
	    <div class="col-sm">
	      <button type="button" class=" btn-lin btn-primary btn-lg" id = "but9">Blood, Cramps, and Vampires</button>
	    </div>
	  </div>
	</div>


<script>
function myFunction() {
  var x = document.getElementById("loginbox");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function mysecond() {
  var x = document.getElementById("login_button");
  var y = document.getElementById("signup_button");

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
  }

}

</script>

	<!--Bootstrap JavaScript Code-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>