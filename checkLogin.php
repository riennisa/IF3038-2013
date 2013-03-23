<?php
	include 'config.php';
	session_start();
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	$matching_users = "SELECT * FROM user WHERE username='$user' AND password='$pass' ";
	$result=mysql_query($matching_users);
	$count=mysql_num_rows($result);
	if ($count==1)
	{
		echo "";
		$_SESSION['username'] = $user;
	}
	else
	{
		echo "*Username atau Password salah.";
	}
?>