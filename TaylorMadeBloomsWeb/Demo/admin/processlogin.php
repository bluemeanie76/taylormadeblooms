<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['login'])) 
{
	if (empty($_POST['loginname']) || empty($_POST['password'])) 
	{
		$error = "loginname or Password is invalid";
	}
	else
	{
		// Define $username and $password
		$username=$_POST['loginname'];
		$password=$_POST['password'];

		$username = stripslashes($username);
		$password = stripslashes($password);

		if($username == 'helen' && $password == 'hayley94')
		{
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: editweddings.php"); // Redirecting To Other Page
		} 
		else 
		{
			$error = "Username or Password is invalid";
		}
	}
}
?>