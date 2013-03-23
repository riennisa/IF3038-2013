<?php
	include 'config.php';
	$q=$_POST["q"];
	$result= mysql_query("SELECT * FROM user WHERE email='$q'");
	$count=mysql_num_rows($result);
	if ($count==1)
	{
		echo "*email telah dipakai";
	}
	else
	{
		echo "";
	}
?>