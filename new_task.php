<?php
	include 'config.php';
	session_start();
	if (isset($_SESSION['LAST_ACTIVITY']) and (time() - $_SESSION['LAST_ACTIVITY'] > 259200)) {
		session_unset();      
		session_destroy();   
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	$result=mysql_query("SELECT * FROM user where username= '".$_SESSION['username']."'");
	$row=mysql_fetch_array($result);
	$username=$row['username'];
	$fullname=$row['fullname'];
	$tanggal=$row['birthdate'];
	$email=$row['email'];
	$image=$row['avatar']; // If 
	if (!isset($_SESSION['username'])) {
    // User not logged in, so send user away.
    header("Location:/progin2/index.php");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<link href='css/style_profil.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/animation.js"> </script> 
		<script type="text/javascript" src="js/form2.js"> </script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Buat Tugas Baru </title>
	</head>
	<body>
		<!-- Web Header -->
		<header>
			<div id="header_container"> 
				<div class="left">
					<a href="index.php"><img src="img/doshare.png" alt="logo"/></a>
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
						<div class="s_1">	
							<form method="get" action="" id="search">
								<input type="text" placeholder="Search..." />
							</form>
						</div>
						<div class="s_2">
							<select>
								<option>ALL</option>
								<option>username</option>
								<option>kategori</option>
								<option>task</option>
							</select>
						</div>
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
			<div class="taskheadercontent2">
				<img src="img/newtask.png" alt="logo"/>
			</div>
			<div class="newtaskcontainer">
				<br><br>
				<div class="newtaskcontent">	
					Nama Tugas<br>
					Deadline<br>
					Asignee<br>
					Tag<br>
					Attachment<br>
				</div>
				<div class="newtaskcontent2">
				<form name="newtask" action="addtask.php" method="POST" enctype="multipart/form-data">
					: <input type="text" onkeypress="validateNamaTugas(newtask);disable(newtask)" size=20 name="namatugas"><label id="errorMsgNamaTugas"></label><br>
					: <input size=20 name="tanggal" onchange="" id="tanggal"><label id="errorMsgTanggal"></label><br>
					<script type="text/javascript">
						calendar.set("tanggal");
					</script>
					: <input type="text" onkeypress="validateAsignee(newtask);disable(newtask)" size=20 name="asignee"><label id="errorMsgAsignee"></label><br>
					: <input type="text" onkeypress="validateTag(newtask);disable(newtask)" size=20 name="tag"><label id="errorMsgTag"></label><br>
					: <input type="file" name="file" onchange="Checkfiles();disable(newtask)" id="filename"><label id="errorMsgAvatar1"></label><br><br><br>
					&nbsp; <input type="submit" id="submit" value="Submit" disabled >
				</form>
				</div>
			</div>
		</div>
		<!-- Web Footer -->
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
	</body>
</html>