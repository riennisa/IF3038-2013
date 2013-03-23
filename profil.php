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
	$result2=mysql_query("SELECT * FROM tugas where idcreator='$id' ");	// If 
	$row2=mysql_fetch_array($result2);
	$namatugas=$row2['namatask'];// If 
	if (!isset($_SESSION['username'])) {
    // User not logged in, so send user away.
    header("Location:/progin2/index.php");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style_profil.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/animation.js"> </script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Profil </title>
	</head>
	<body>
		<!-- Web Header -->
		<header>
			<div id="header_container"> 
				<div class="left">
					<a href="index.php"><img src="img/doshare.png" alt="logo" height="80%;"/></a>
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
			<div id="box">
				<div id="up_p"></div>
				<div id="left_p">
					<div id="foto">
						<img src="upload/<?php echo $image;?>" height="110" width="110" alt="avatar"/>
					</div>
					<div id="list">
						<div id="list_ki_p">
							Username<br/>
							Full Name<br/>
							Tanggal Lahir<br/>
							Email<br/>
						</div>
						<div id="list_ka_p">
							: <?php echo $username;?><br/>
							: <?php echo $fullname;?><br/>
							: <?php echo $tanggal;?><br/>
							: <?php echo $email;?><br/>
						</div>
					</div>
					<div id="edit_p">
						EDIT
					</div>
				</div>
				<div id="right_p">
					<div id="title_task"></div>
					<div id="isi_task"><?php echo $namatugas;?></div>
				</div>
			</div>
		</div>
		
		
		<!-- Web Footer -->
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
	</body>
</html>