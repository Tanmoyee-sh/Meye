<?php
session_start();



if(isset($_POST['topic-submit'])) 
{
	require 'database.php';
	
	$t = $_POST['title'];
	$d = $_POST['desc'];
	$date = $_POST['date'];
	$cat_name = $_POST['drop'];


//error handlers

	if( empty($t) || empty($d) || empty($cat_name) || empty($date) )
	{
		
		header("Location: ../create_topic.html?error=emptyfields");
		exit();

	}
	else 
	{
		
		$sql = "INSERT INTO topics (cat_id,title, content, date_posted) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../signup.html?error=sqlerror");
			exit();

		}
		else{
			mysqli_stmt_bind_param($stmt, "ssss", $cat_name, $t, $d, $date);
			mysqli_stmt_execute($stmt);
			header("Location: ../success.html"); ///// go to home page
			exit();
			
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
}

