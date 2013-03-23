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
	if (!isset($_SESSION['username'])) {
    // User not logged in, so send user away.
    header("Location:/progin2/index.php");
	}
?>
	
<!DOCTYPE HTML>
<html>
	<head>
		<link href='css/style_dashboard.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/animation.js"> </script> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<title> Dashboard </title>
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
			<div id="sidebar">
				<div><button id="AllCat" class="catButton" type="button" onclick="showAll();select(this)"> All Categories </button></div>
				<div><button id="Kuliah" class="catButton" type="button" onclick="showList(this);select(this)"> Kuliah </button></div>
				<div><button id="Organisasi" class="catButton" type="button" onclick="showList(this);select(this)"> Organisasi </button></div>
				<div><button id="Proyek" class="catButton" type="button" onclick="showList(this);select(this)"> Proyek </button></div>
				<div id="tombolKategori"><button id="addCategory" type="button"><a href="#overlay" class="catbutton" onclick="ShowBlack()">Add Category</a></button></div>
				<div><button id="Delete" class="catButton" type="button"><a href="#overlay2" class="catbutton" onclick="ShowBlack()"> Delete Category</a> </button></div>
			</div>

			<div id="kategoriContent">
				<div class="task Kuliah">
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Bikin Genetic Algorithm AI</p>
				<p class="taskClock">10:00 AM</p>
				<p class="taskDate">22 Maret 2013</p>
				<p class="taskTag">Tag		: AI, Algoritma, Genetic Algorithm, Tubes</p>
				<p class="taskStat">Status 	: Sudah Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<div class="task Organisasi"> 
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Rapat Koordinasi</p>
				<p class="taskClock">10:00 AM</p>
				<p class="taskDate">23 Maret 2013</p>
				<p class="taskTag">Tag 		: HMIF, SPARTA, lolwutt</p>
				<p class="taskStat">Status	: Sudah Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<div class="task Proyek" > 
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Ketemu Client</p>
				<p class="taskClock">1:00 PM</p>
				<p class="taskDate">24 Maret 2013</p>
				<p class="taskTag">Tag 		: Website design, proyek, uang, duit</p>
				<p class="taskStat">Status	: Belum Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<div class="task Kuliah" > 
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Kerjain tubes Progin</p>
				<p class="taskClock">11:00 AM</p>
				<p class="taskDate">25 Maret 2013</p>
				<p class="taskTag">Tag 		: Progin, website, internet, tubes</p>
				<p class="taskStat">Status	: Belum Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<div class="task Proyek"> 
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Bikin homepage</p>
				<p class="taskClock">10:00 AM</p>
				<p class="taskDate">26 Maret 2013</p>
				<p class="taskTag">Tag 		: proyek, website design, homepage, uang, duit</p>
				<p class="taskStat">Status	: Sudah Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<div class="task Organisasi"> 
				<p class="taskName" onmouseover="mOverList(this)" onmouseout="mOutList(this)" onclick="redirect()">Bersih-bersih sekre</p>
				<p class="taskClock">09:00 AM</p>
				<p class="taskDate">27 Maret 2013</p>
				<p class="taskTag">Tag 		: HMIF, bersih, sekre</p>
				<p class="taskStat">Satus	: Sudah Selesai</p>
				<p class="taskStat"><input name="status" type="checkbox">Selesai</p>
				<div><button id="DeleteTask" type="button"> Delete Task </button></div>
				</div>
				<button id="addTask" class="button"><a href="new_task.php">Add Task</a></button>
			</div>
		</div =>
		
		<script>
			
			function mOverList(obj){
				obj.style.backgroundColor="yellow";
			}		
			function mOutList(obj){
				obj.style.backgroundColor="#f5fc8f";
			}		
			function redirect(){
				window.location="edit_task.html";
			}
			function showList(obj){
				var allList=document.getElementsByClassName('task');
				for (var i=0;i<allList.length;i++){
					allList[i].style.display="none";
				}
				var selectedCat = obj.id;
				var ListRPL=document.getElementsByClassName(selectedCat);
				for (var i=0;i<ListRPL.length;i++){
					ListRPL[i].style.display="block";
				}
				document.getElementById('addTask').style.display="block";
			}
			function showAll(){
				var allList=document.getElementsByClassName('task');
				for (var i=0;i<allList.length;i++){
					allList[i].style.display="block";
				}
				document.getElementById('addTask').style.display="none";
			}
			
			function select(obj){		
				var arrayCatButt=document.getElementsByClassName('catButton');
				for (var i=0;i<arrayCatButt.length;i++){
					arrayCatButt[i].style.background="#a72323";
				}
				obj.style.background="#870101";
			}		
			function showCatForm(){
				document.getElementById("overlay").style.display="block";
			}
			function addCategory(){
				var newDiv = document.createElement('div');
				var newButton = document.createElement("button");
				var newCat=document.crateTextNode(document.inputCategory.kategori.value);
				var coba=document.createTextNode("hahahaha");
				
				
				newButton.setAttribute('class', 'catButton');
				newButton.setAttribute('type', 'button');
				
				newButton.appendChild(coba);
				
				div_cat_button = document.getElementById("coba");
				document.body.insertBefore(newButton, div_cat_button);
				
			}
		</script>
		
		<!-- Web Footer -->
		
		<div class="footer">
			Copyright Nama Tim 2013
		</div>
		
		<div id="overlay">
			<div id="addcatform">
				<a href="" onclick=""> Close </a>
				<form class="addcat" name="addcatform" method=POST>
					<label>Kategori</label>
					<input type="text" name="kategori" class="addcatinput" tabindex="1" required>
					<br>
					<br>
					<label>User</label>
					<input type="text" name="User" class="addcatinput" tabindex="2" required>
					<br>
					<br>
					<button tabindex="3" class="button">Submit</button>
				</form>
			</div>
		</div>
		
		<div id="overlay2">
			<div id="deletecat">
				<a href="" onclick=""> Close </a>
				<form class="delcat" name="deletecat" method=POST>
					<label>Kategori</label>
					<input type="text" name="kategori" class="delcatinput" tabindex="1" required>
					<br>
					<br>
					<button tabindex="2" class="button">Delete</button>
				</form>
			</div>
		</div>
	</body>
</html>