<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="forum.js"></script>
</head>
<body>

<?php
//checks if signup button clicked
if(isset($_POST['signup-submit'])) 
{
	require 'database.php';
	
	$username = $_POST['uname'];
	$mail = $_POST['mail'];
	$pass = $_POST['pwd'];
	$repeatpass = $_POST['pwd-repeat'];


//error handlers

	if( empty($username) || empty($mail) || empty($pass) || empty($repeatpass) )
	{
		header("Location: ../signup.html?error=emptyfields");
		exit();


	}
	elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
	header("Location: ../signup.html?error");
		exit();
	}
	//checking if valid mail
	elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.html?error".$username);
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.html?error".$mail);
		exit();
	}


	elseif ($pass!==$repeatpass) {
		header("Location: ../signup.html?error=passwordcheck&uid=".$username."&mail=".$mail);
		exit();
	}
	else {
			$sql = "SELECT username FROM users WHERE username=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location: ../signup.html?error=sqlerror");
			exit();
			}
		else {
				// checking if same username been entered multiple times
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt); //fetching from database
				$result_check = mysqli_stmt_num_rows($stmt);
				
				if (result_check > 0) {
				header("Location: ../signup.html?error=usertaken&mail=".$mail);
				exit();
				}

				else
				{
					$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: ../signup.html?error=sqlerror");
						exit();

					}
					else{


						$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sss", $username, $mail, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../forum.php"); ///// go to home page
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
}

?>


</body>
</html>


