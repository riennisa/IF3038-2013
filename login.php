<?php
include 'config.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$matching_users = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
$result=mysql_query($matching_users);
$count=mysql_num_rows($result);
if ($count==1) {
    // User exists; log user in.
    $_SESSION['username'] = $username;
    echo "You are now logged in.";
	header( "refresh:1;url=dashboard.php" );
} else {
    // Login failed; re-display login form.
	echo "login gagal";
}
?>