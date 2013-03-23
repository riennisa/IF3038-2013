<?php
include 'config.php';
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 259200)) {
		session_unset();      
		session_destroy();   
	}
$_SESSION['LAST_ACTIVITY'] = time();
include 'config.php';
$result=mysql_query("SELECT * FROM user where username= '".$_SESSION['username']."'");
$row=mysql_fetch_array($result);
$username=$row['username'];
$fullname=$row['fullname'];
$tanggal=$row['birthdate'];
$email=$row['email'];
$image=$row['avatar'];
$id=$row['id'];

$namatask = $_POST['namatugas'];
$deadline = $_POST['tanggal'];
$asignee = $_POST['asignee'];
$tag = $_POST['tag'];
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
	  if (!is_dir('attachment/'. $_SESSION["username"])) {
		mkdir('attachment/'. $_SESSION["username"]);
}
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "attachment/". $_SESSION["username"]."/" . $_FILES["file"]["name"]);
      }
    }  
$query = "INSERT INTO tugas(idcreator,idkat,namatask,deadline)VALUES('$id',1,'$namatask','$deadline')";
$result = mysql_query("SELECT * FROM tugas WHERE namatask= '$namatask'");
$fetch = mysql_fetch_array($result);
$idtask = $fetch['id'];
$query2 = "INSERT INTO assignee(idtask,nama_user)VALUES('$idtask','$asignee')";
$query4 = "INSERT INTO attachment(filename,idtask)VALUES('$file','$idtask')";
if(mysql_query($query) and mysql_query($query2)  and mysql_query($query4))
{
	header("url=edit_task.php");
}
else
{
	echo mysql_error();
}
?>