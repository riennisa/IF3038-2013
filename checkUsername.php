<?php
	include 'config.php';
	$q=$_POST["q"];
	$result= mysql_query("SELECT * FROM user WHERE username='$q'");
	$count=mysql_num_rows($result);
	if ($count==1)
	{
		echo "*username telah dipakai";
	}
	else
	{
		echo "";
	}
?>