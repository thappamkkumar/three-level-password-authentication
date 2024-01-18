<?php

session_start();
require("Database/db_connection.php");
?>
<html>
	<head>
		<title>Home </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="style/home.css" rel="stylesheet" type="text/css" />
		<link href="style/navigation.css" rel="stylesheet" type="text/css" />
		 
	</head>
	<body>
		<div class="main_container">
			<div class="top" id="top_1">
				<button type="button" class="menu" id="home" onclick="location.href='home.php';">Home</button>
				<button type="button" class="menu" id="login" onclick="location.href='login.php';">Login</button>
				<button type="button" class="menu" id="register" onclick="location.href='register.php';">Register now</button>
				<button type="button" class="menu" id="contact">Contact</button>
				<button type="button" class="menu" id="help" >Help</button>
			</div>
			<div class="container">
				<h1 class="main_heading">Three level image password authentication</h1>
				 <img src="Image/security5.jpg" class="image">
				 
				<p class="para">
					The project is an authentication system that validates user for accessing the system only when they have input correct password. The project involves three levels of user authentication. There are varieties of password systems available, many of which have failed due to bot attacks while few have sustained it but to a limit. In short, almost all the passwords available today can be broken to a limit. Hence this project is aimed to achieve the highest security in authenticating users.
						It contains three logins having three different kinds of password system. The password difficulty increases with each level. Users have to input correct password for successful login. Users would be given privilege to set passwords according to their wish. The project comprises of text password i.e. passphrase, image based password and graphical password for the three levels respectively. This way there would be negligible chances of bot or anyone to crack passwords even if they have cracked the first level or second level, it would be impossible to crack the third one. Hence while creating the technology the emphasis was put on the use of innovative and untraditional methods. Many users find the most widespread text‐based password systems unfriendly, so in the case of three level password we tried creating a simple user interface and providing users with the best possible comfort in solving password.
				</p>
				<h3 class="sub_heading">Features:</h3>
				<ul>
					<li>Users would be given a registration form that has to be filled with required details.</li>
					<li>Next users would be asked to set password for first level, second level and third level subsequently.</li>
					<li>After the passwords are set for the three level users can now login into the system.</li>
					<li>While login the system will ask for the first level password. On entering correct password, second level password is asked and then third one.</li>
					<li>After the user has provided correct password in the third level, he gets authenticated and can now access the system.  </li>
					
				</ul>
				<h3 class="sub_heading">Levels in the system:</h3>
				<ol>
					<li><span>First Level: </span>The first level is a conventional password system i.e. text based password or a passphrase. Users would have to set a text password initially based on some specifications</li>
					<li><span>Second Level: </span>The second level is an image based password where users can upload their desired image into the system and then create password by segmenting it and assigning them serial numbers. During login process the system will automatically disperse the image segmentations and users have to arrange it as set by them initially.</li>
					<li><span>Third Level: </span>The third level is a graphical password method where users have to set password based on some color combinations through RGB button combinations.</li>
				</ol>
			</div>
			<div class="developer_info" style="background-color:rgba(100,200,255,1); padding:30px 10px 30px 10px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
				<h2>Developer Contact</h2> 
				<p style="padding:10px 10px 10px 10px; display:flex;  flex-wrap:wrap; justify-content:center; align-items:center;">
					<a href="tel:6005819576" style="text-decoration:none;">6005819576  </a>, <a  href="mailto:thappamkkumar@gmail.com" style="text-decoration:none; padding-left:10px;"> thappamkkumar@gmail.com</a>
				</p>
			</div>
		</div>
	
		
		<script>
			document.getElementById("home").style.backgroundColor="rgba(255,255,255,1)";
			document.getElementById("home").style.color="rgba(100,200,255,1)";
			if(window.history.replaceState)
			{
					window.history.replaceState(null,1,null,window.location.href);
			}
		</script>
	</body>
</html>
	