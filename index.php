<?php
include 'config.php';
session_start(); // If 
if (isset($_SESSION['username'])) {
    // User logged in, so send user away.
    header("Location:/progin2/dashboard.php");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style.css' rel='stylesheet' type='text/css'>
		<link href='css/calendar.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" language="javascript" src="js/style.js"></script>
		<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
		<script type="text/javascript" language="javascript" src="js/form.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<script type="text/javascript">
		var monthtext=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

		function populatedropdown(dayfield, monthfield, yearfield){
		var today=new Date()
		var dayfield=document.getElementById(dayfield)
		var monthfield=document.getElementById(monthfield)
		var yearfield=document.getElementById(yearfield)
		for (var i=0; i<31; i++)
		dayfield.options[i]=new Option(i, i+1)
		dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true) //select today's day
		for (var m=0; m<12; m++)
		monthfield.options[m]=new Option(monthtext[m], monthtext[m])
		monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
		var thisyear=today.getFullYear()
		for (var y=0; y<20; y++){
		yearfield.options[y]=new Option(thisyear, thisyear)
		thisyear+=1
		}
		yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
		}

		</script>
		<title> Nama Situs - Home </title>
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
					<div class="about">
						<a href="about.html">About</a>
					</div>
					<div class="thin_line"></div>
					<div class="contact">
						<a href="contact.php">Contact</a>	
					</div>
				</div>
			</div>
		</header>
		
		<!-- Web Content -->
		<div id="content_container">
				<div class="homeimage">
					<img src="img/home.jpeg" alt="logo" />
				</div>
				<div class="homecontent">
					<div class="content">
						<span class="contenttitle">WELCOME</span>
						<br>
						Selamat datang di situs "Nama Situs", silahkan login jika sudah mempunyai akun atau anda dapat mendaftar terlebih dahulu. Gratis !
					</div>
					<div class="contentbutton">
						<div class="loginbtn">
							<a href="#overlay" class="button" onclick="ShowBlack()">Login</a>
						</div>
						<div class="atau">
							atau
						</div>
						<div class="signupbtn">
							<a href="#overlay2" class="button" onclick="ShowBlack()">Sign Up</a>
						</div>
					</div>
				</div>
		</div>
		<!-- Web Footer -->
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
		<!-- Login and Signup-->
		<div id="overlay">
			<div id="loginform">
				<a href="" onclick=""> Close </a>
				<form class="login" name="loginform" action="">
					<label>Username</label>
					<input type="text" name="username" class="logininput"  tabindex="1" required>
					<br>
					<br>
					<label>Password</label>
					<input type="password" name="password" class="logininput" tabindex="2" required>
					<br>
					<label id="checkLogin"></label>
					<br>
					<input type="button" tabindex="3" class="button" onclick="checkLogin(loginform)" value="Login" >
				</form>
			</div>
		</div>
		<div id="overlay2">
			<div id="registrationform">
				<a href="" onclick=""> Close </a>
				<div class="registration1">
					<br>
					<form class="registration" name="registrasi" action="registration.php" method="POST" enctype="multipart/form-data">
					Username:<br>
					<input type="text" class="registrationinput" onkeypress="checkUsername(this.value);validateUsername(registrasi);disable(registrasi)" size=20 name="username"><label id="errorMsgUsername"></label><label id="errorMsgUsername2"></label><br>
					Password:<br>
					<input type="password" class="registrationinput" onkeypress="validatePassword(registrasi);disable(registrasi)" size=20 name="password"><label id="errorMsgPassword"></label><br>
					Confirm Password:<br>
					<input type="password" class="registrationinput" onkeypress="confirmPassword(registrasi);disable(registrasi)" size=20 name="cnfpassword"><label id="errorMsgCnfPassword"></label><br>
					Nama Lengkap:<br>
					<input type="text" class="registrationinput" onkeypress="validateNama(registrasi);disable(registrasi)" size=20 name="nama"><label id="errorMsgNama"></label><br>
					Tanggal Lahir:<br>
					<input type="date"><br>
					Email:<br>
					<input type="text" onkeypress="checkEmail(this.value);validateEmail(registrasi);disable(registrasi)" size=20 name="email"><label id="errorMsgEmail"></label><label id="errorMsgEmail2"></label><br>
					Upload Avatar:<br>
					<input type="file" name="file" onchange="Checkfiles();disable(registrasi)" id="filename"><label id="errorMsgAvatar"></label><br><br><br>
					<button type="submit" class="button" id="submit" disabled>Register</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>