<?php
include 'config.php';
$user = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$email = $_POST['email'];
$file = $_FILES['file']['name'];
if ($_FILES['file']["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
else
{

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      }
    }  
$query = "INSERT INTO user(username,password,fullname,birthdate,email,avatar)VALUES('$user','$password','$fullname','$tanggal','$email','$file')";
if(mysql_query($query))
{
	echo "Registrasi berhasil ! Silahkan login";
	header("refresh:2;url=index.php");
}
else
{
	echo mysql_error();
}

?> 