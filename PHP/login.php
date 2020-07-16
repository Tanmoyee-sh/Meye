<?php
//checks if signup button clicked
if(isset($_POST['login-submit'])) 
{
	require 'database.php';

	$username = $_POST['uname'];
	$pass = $_POST['pwd'];

	if(empty($username) || empty($pass))
	{	
		header("Location: ../login.html?error=emptyfields&uid=".$username);
		exit();
	}
	else

	{
		$sql = "SELECT * FROM users WHERE username=? OR email=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: ../login.html?error=sqlerror");
						exit();

					}

					else{

						mysqli_stmt_bind_param($stmt, "ss", $username, $username);
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						if($row = mysqli_fetch_assoc($result)) //in case result empty
						{
							$pwdCheck = password_verify($pass, $row['password']);
							if($pwdCheck == false) 
							{
								header("Location: ../login.html?error=wrongpwd");
								
								exit();
							}
							elseif ($pwdCheck == true) {

								$sql = "SELECT username FROM users WHERE username=? OR email=?;";
								mysqli_query($conn, $sql);
		                        session_start();
								header("Location: ../forum.html"); 
								exit();                
							}
						}
						else
							{
								header("Location: ../login.html?WrongUserID");
								exit();
							}
						exit();

					}

	}
}
