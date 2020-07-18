
<?php
include ('PHP/database.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Meye Forum</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel = "stylesheet" href = "topic.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="forum.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between" style="opacity: 0.9">
	 
<img src="Images/logo.png" width="180" height="90" preserveAspectRatio="xMidYMid slice">	  
<ul class = "navbar-nav mr-auto">
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
	  	  <button type="button" class="btn btn-warning navbar-btn ">Create New Topic</button>
		  <button type="button" class="btn btn-light navbar-btn " id = "login_button">Login</button>
		  <button type="button" class="btn btn-light navbar-btn " id = "signup_button">Signup</button>
		  <button type="button" class="btn btn-light navbar-btn " id = "logout_button">Logout</button>
		  <button type="button" class=" btn btn-light navbar-btn">Profile</button>
		 <!-- <img src="Images/thumb.jpg" width="80" alt="..." class="img-thumbnail rounded-circle"> -->
	  </div>
	</nav>
	
	</nav>

	<div class ="forum_body">
		<div class="jumbotron">
		  <h5 style="align-content: center;"> Welcome to the discussions page! Support your fellow members by responding with a comment. Have questions of your own? Create a topic instead! </h5>

		</div>
	</div>


<table class="table" id="topictable">
  <thead>
    <tr style="font-weight: bolder; ">
      <th scope="col" style="width: 200px;">Title</th>
       <th scope="col" style="width: 100px;">Author</th>
      <th scope="col" style="width: 500px;">Content</th>
      <th scope="col" style="width: 50px;">Date Posted</th>
      <th scope="col" style="width: 50px">Views</th>
      <th scope="col" style="width: 100px">Replies</th>

    </tr>
  </thead>
  <tbody>
   <?php

$sql = "SELECT * FROM topics WHERE topic_id = '$_GET[tid]'";
$result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>". $row["title"]."</td><td>". $row["author"]. "</td><td>". $row["content"]. "</td><td>". $row["date_posted"]. "</td><td>".$row["views"]. "</td><td>" . $row["replies"]. "</td></tr>";
  }
   
?>
  
  </tbody>
</table>

<table class="table" id="replytable">
  <thead>
    <tr style="font-weight: bolder; ">
      <th scope="col" style="width: 50px;">Date</th>
      <th scope="col" style="width: 500px;">Comment</th>
      <th scope="col" style="width: 50px">Author</th>

    </tr>
  </thead>
  <tbody>
   <?php



$sql = "SELECT * FROM replies WHERE topic_id = '$_GET[tid]'";
$result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>". $row["date"]."</td><td>". $row["comment"]. "</td><td>". $row["author"]. "</td></tr>";
  }
   
?>
  
  </tbody>
</table>


<div class="response" style="position: absolute; top: 94%;">
	
<h4>Post A Reply</h4>
		<form action="PHP/reply.php" method="post">
		<label>Type your reply here:</label><br>
		<textarea rows = "5" cols = "60" name = "desc" id = "big" placeholder="Type your post here" style="width: 770px;">
         </textarea></br><br>
		<input type="submit" name="replybutton" id = "replybutton" value="Reply to Post">
		</form>
</div>
		

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>

