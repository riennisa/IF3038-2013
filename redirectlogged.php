<?php
include 'config.php';
session_start(); // If 
if (isset($_SESSION['username'])) {
    // User logged in, so send user away.
    header("Location:/progin2/dashboard.html");
}
else{
	header("Location:/progin2/index.php");
}
?>