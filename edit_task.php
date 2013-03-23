<?php
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
	$result2=mysql_query("SELECT * FROM tugas EQUI JOIN attachment where idcreator='$id' and  ");
	$row2=mysql_fetch_array($result2);
	$namatugas=$row2['namatask'];
	$deadline=$row2['deadline'];
	if (!isset($_SESSION['username'])) {
    // User not logged in, so send user away.
    header("Location:/progin2/index.php");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/form.js"> </script> 
		<script type="text/javascript" src="js/form2.js"> </script> 
		<script type="text/javascript" src="js/form3.js"> </script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Rincian Tugas </title>
	</head>
	<body>
		<!-- Web Header -->
		<header>
			<div id="header_container"> 
				<div class="left">
					<a href="index.php"><img src="img/logo.png" alt="logo" height="80%;"/></a>
				</div>
				<div class="right">
					<div class="thin_line"></div>
					<div class="dashboard">
						<a href="dashboard.php">Dashboard</a>
					</div>
					<div class="thin_line"></div>
					<div class="about">
						<a href="about.php">About</a>
					</div>
					<div class="thin_line"></div>
					<div class="contact">
						<a href="contact.php">Contact</a>	
					</div>
					<div class="searchbox">
						<form method="get" action="" id="search">
							<input type="text" placeholder="Search..." />
						</form>
					</div>
					<div class="profile">
						<a href="profil.php">
						<div class="profileavatar">
							<img src="upload/<?php echo $image;?>" height="50" width="50" alt="logo"/>
						</div>
						<div class="profilename">
							<?php echo $username;?>
						</div>
						</a>
					</div>
					<div class="logout">
						<a href="logout.php"><img src="img/logout.png"></a>	
					</div>
				</div>
			</div>
		</header>
		
		<!-- Web Content -->
		<div id="content_container">
			<div class="taskheadercontent">
					Rincian Tugas
			</div>
			<div class="taskcontainer">
				<br><br>
				<div class="taskcontent">
					Nama Tugas<br>
					Deadline<br>
					Assignee<br>
					Komentar<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					Tag <br>
					Attachment				
				</div>
				<div class="taskcontent2">
					<label id="form"></label>
					 : <?php echo $namatugas;?><br>
					 : <label id="deadline"><?php echo $deadline;?></label><br>
					 <script type="text/javascript">
					 calendar.set("deadline1");
					 </script>
					 : <label id="asignee"></label><br>
					 :<br><textarea rows="5" cols="25" name="komentar"></textarea>
					  <button>Submit</button><br><br>
					 : <label id="tag"></label><br>
					 : <img src="attachment/"+$username+"/"><br>
					 <label id="show"></label>
					 <label id="endform"></label>
				</div>
				<div class ="savechange">
					<label id="taskbutton"><button name="savechange" id="savechange" onclick="Done()" disabled>Simpan</button></label>
				</div>
				<div class ="edittask">
					<label id="taskbutton1"><button name="edittask" id="taskbtn" onclick="Edit()">Edit Task</button></label>
				</div>
			</div>
		</div>
		<!-- Web Footer -->
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
	</body>
</html>