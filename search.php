<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style_profil.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/animation.js"> </script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Search </title>
	</head>
	<body>
		<!-- Web Header -->
		<header>
			<div id="header_container"> 
				<div class="left">
					<a href="index.html"><img src="img/logo.png" alt="logo" height="80%;"/></a>
				</div>
				<div class="right">
					<div class="thin_line"></div>
					<div class="dashboard">
						<a href="dashboard.html">Dashboard</a>
					</div>
					<div class="thin_line"></div>
					<div class="about">
						<a href="about.html">About</a>
					</div>
					<div class="thin_line"></div>
					<div class="contact">
						<a href="contact.html">Contact</a>	
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
						<a href="#">
						<div class="profileavatar">
							<img src="img/avatar.jpg" alt="logo"/>
						</div>
						<div class="profilename">
							Zulhendra Valiant
						</div>
						</a>
					</div>
					<div class="logout">
						<a href="index.html">Contact</a>	
					</div>
				</div>
			</div>
		</header>
		
		<!-- Web Content -->
		<div id="content_container">
			<div id="s_box">
				<div id="s_left">
					<img src="img/search.png"/>
					<br/>
						<form method="get" action="" id="search">
							<input type="text" placeholder="Search..." />
							<button type="submit">GO</button>
						</form>
					<br/>
					KATEGORI 1
					<br/>
					KATEGORI 2
				</div>
				<div id="s_right">
					<div id="s_satu"></div>
					<div id="s_dua">
						HASIL
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Web Footer -->
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
	</body>
</html>