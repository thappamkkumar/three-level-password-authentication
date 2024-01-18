<?php

session_start();
require("Database/db_connection.php");
?>
<html>
	<head>
		<title>Home </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="style/login_style.css" rel="stylesheet" type="text/css" />
		<link href="style/navigation.css" rel="stylesheet" type="text/css" />
		<link href="style/box_style.css" rel="stylesheet" type="text/css" />
		<script src="js/sort_list.js"></script>
	</head>
	<body>
		<div class="main_container">
			<div class="top">
				<button type="button" class="menu" id="home" onclick="location.href='home.php';">Home</button>
				<button type="button" class="menu" id="login" onclick="location.href='login.php';">Login</button>
				<button type="button" class="menu" id="register" onclick="location.href='register.php';">Register now</button>
				<button type="button" class="menu" id="contact">Contact</button>
				<button type="button" class="menu" id="help" >Help</button>
			</div>
			<div class="container" id="container_1">
				<h1 class="level_heading">Three Level Password Authentication.</h1>
			</div>
			<div class="container" id="container_2">
				<div class="login_container" id="login_container_id">
					<h2 class="login_heading">Step 1.</h2>
					<div class="login_image_container"><img src="Image/login.png" class="login_icon"></div>
					<h2 class="login_heading">Login</h2>
					<form action="<?php echo$_SERVER["PHP_SELF"]; ?>" name="form1" method="POST" onsubmit="return formvalidation1()" class="login_form" autocomplete="off">
						<label class="login_label">Enter E-mail id</label>
						<p class="form_message" id="form_message_1">Email field is empty.</p>
						<p class="form_message" id="form_message_2">Enter a valid Email.</p>
						<p class="form_message" id="form_message_3">Entered Email is not found.</p>
						<input type="text" placeholder="abc@email.com" name="email" class="input_1" id="email_id">
						<label  class="login_label">Enter Password</label>
						<p class="form_message" id="form_message_4">Password field is empty.</p>
						<p class="form_message" id="form_message_5">Wrong password is entered.</p>
						<div class="password_container">
							<input type="password" placeholder="********" name="password_1" class="input_1" id="password_id_1">
							<button type="button" class="view_password" id="view_password_id" onclick="view_password();"></button>
						</div>
						<div class="password_container" id="forgot_password_container">
							<button type="button" class="forgot" onclick="location.href='forgot_password.php';">Forgot Password</button>
						</div>
						<input type="submit" value="Next" class="form_submit" name="next_1">
					</form>
					<p class="register_container">If you don`t have an account then <button type="button" onclick="location.href='register.php';" class="register">Register Now</button></p>
				</div>
				
				
				<div class="login_container" id="color_button_container_id">
					<h2 class="login_heading">Step 2.</h2>
					<h2 class="login_heading">Select colored button to generate color code.</h2>
					<div class="color_button_container_1">
						<button type="button" class="color_button" id="red_color" onclick="red();"></button>
						<button type="button" class="color_button" id="green_color" onclick="green();"></button>
						<button type="button" class="color_button" id="blue_color" onclick="blue();"></button>
					</div>
					<div class="color_button_container_1">
						<form action="<?php echo$_SERVER["PHP_SELF"]; ?>" name="form2" method="POST" onsubmit="return formvalidation2()"  class="login_form" autocomplete="off">
							<p class="form_message" id="form_message_6">Select colored button to compare color code</p>
							<p class="form_message" id="form_message_7">Selected color code does not match.</p>
							<input type="text"  name="color_code" class="input_1" id="color_code" readonly>
							<div class="color_button_container_1">
								<input type="submit" value="Next" class="form_submit" name="next_2">
								<button type="button" onclick="refresh_color_code();" class="form_submit">Refresh</button>
							</div>
						</form>
					</div>
				</div>
				<div class="login_container" id="image_container_id">
					<h2 class="login_heading">Step 3.</h2>
					<h2 class="login_heading">Solve your image.</h2>
					<p class="form_message" id="image_message">Image not solved.</p>
					<?php
						if(isset($_SESSION["user_email"]))
						{
							$image_email=$_SESSION["user_email"];
					?>		
					<ul id="sortlist">
						<?php
							$get_image="SELECT * FROM `login_info` WHERE Email='$image_email' ";
							$get_image_result=mysqli_query($con,$get_image); 
							$get_image_row = mysqli_fetch_array($get_image_result,MYSQLI_ASSOC);
							 
							$image_url2="Image_Code/".$get_image_row["Image_Code"];
							$arr=array("image1", "image2", "image3", "image4", "image5", "image6", "image7", "image8", "image9", "image10", "image11", "image12", "image13", "image14", "image15", "image16");
							
							
							$arr_lenght=count($arr);
							$percentage = 100 / (4 - 1);
							for($i=0; $i<$arr_lenght; $i++)
							{
								$xpos = ($percentage * ($i % 4));
								$ypos = ($percentage * floor($i / 4));
								 
								echo'<li  id="'.$arr[$i].'" style="margin: 0;
																					  padding: 0px;
																					  border: none;
																					  background: #f5f5f5;
																					  display:inline-block;
																					  width:100px;
																					  height:100px;
																					  float: left;
																					  background-image:url('.$image_url2.');
																					background-size:400% 400%;
																					background-position:'.$xpos.'% '.$ypos.'%;	"																			
											></li>';
								
							}
							
						?>
					
					</ul>
					<div class="color_button_container_1">
						<button type="button" onclick="next3();" class="form_submit">Next</button>
						<button type="button" onclick="shuffleNodes();" class="form_submit">Refresh</button>
					</div>
					 
					<?php
						}
					?>
				</div>
				
			</div>
			<div class='box_container' id='box_container_id'>
				<div class='box'>
					<h1>Message</h1>
					<p id="message_1" class="message">You finish your login.</p>
					
					<div class="ok_btn_container">
						<button type="button" class="ok_btn" id="ok_btn_1" onclick="location.href='home.php'; ">Go</button>
						
					</div>
					
				</div>
			</div>
			
		</div>
		<div class="developer_info" style="background-color:rgba(100,200,255,1); padding:30px 10px 30px 10px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
				<h2>Developer Contact</h2> 
				<p style="padding:10px 10px 10px 10px; display:flex;  flex-wrap:wrap; justify-content:center; align-items:center;">
					<a href="tel:6005819576" style="text-decoration:none;">6005819576  </a>, <a  href="mailto:thappamkkumar@gmail.com" style="text-decoration:none; padding-left:10px;"> thappamkkumar@gmail.com</a>
				</p>
			</div>
		<?php
					if(isset($_POST["next_1"]))
					{ 
						$email=$_POST["email"];
						$password=$_POST["password_1"]; 
						
						$_SESSION["user_email"]=$email;
						
						$check_email="SELECT * FROM `login_info` WHERE Email='$email' ";
						$check_email_result=mysqli_query($con,$check_email); 
						$check_email_count = mysqli_num_rows($check_email_result);  
						if($check_email_count>=1)
						{
							$check_email_pass="SELECT * FROM `login_info` WHERE Email='$email' AND Password='$password' ";
							$check_email_pass_result=mysqli_query($con,$check_email_pass); 
							$check_email_pass_count = mysqli_num_rows($check_email_pass_result);  
							if($check_email_pass_count>=1)
							{
								echo'
									<script>
										document.getElementById("login_container_id").style.display="none";
										document.getElementById("color_button_container_id").style.display="flex";
									</script>
								';
							}
							else
							{
								echo'
								<script>
									document.getElementById("form_message_5").style.display="block";
								</script>
							';
							echo'
									<script>
										document.getElementById("email_id").value="'.$email.'";
									</script>
								';
								echo'
									<script>
										document.getElementById("password_id_1").value="'.$password.'";
									</script>
								';
							}
							
						}
						else
						{
							echo'
								<script>
									document.getElementById("form_message_3").style.display="block";
								</script>
							';
							echo'
									<script>
										document.getElementById("email_id").value="'.$email.'";
									</script>
								';
								echo'
									<script>
										document.getElementById("password_id_1").value="'.$password.'";
									</script>
								';
						}
						
					}
					if(isset($_POST["next_2"]))
					{ 
						$color_code=$_POST["color_code"];
						$email=$_SESSION["user_email"];
						$check_color_code="SELECT * FROM `login_info` WHERE Email='$email' AND Color_Code='$color_code' ";
						$check_color_code_result=mysqli_query($con,$check_color_code); 
						$check_color_code_count = mysqli_num_rows($check_color_code_result);  
						if($check_color_code_count>=1)
						{
							echo'
								<script>
									document.getElementById("login_container_id").style.display="none";
									document.getElementById("color_button_container_id").style.display="none";
									document.getElementById("image_container_id").style.display="block";
								</script>
							';
						}
						else
						{
							echo'
									<script>
										document.getElementById("login_container_id").style.display="none";
										document.getElementById("color_button_container_id").style.display="flex";
										document.getElementById("form_message_7").style.display="block";
									</script>
								';
						}
					 
					}
				?>
		<script>
			window.addEventListener("DOMContentLoaded", () => {
				  slist(document.getElementById("sortlist"));
				});
			
				 
				 
			var list = document.getElementById("sortlist");
			
			function shuffle(items)
			{
				var cached = items.slice(0), temp, i = cached.length, rand;
				while(--i)
				{
					rand = Math.floor(i * Math.random());
					temp = cached[rand];
					cached[rand] = cached[i];
					cached[i] = temp;
				}
				return cached;
			}
			function shuffleNodes()
			{
				var box=document.getElementById("box_container_id").style.display;
				if(box=="flex")
				{
					document.getElementById("box_container_id").style.display="none";
				}
				var nodes = list.children, i = 0;
				nodes = Array.prototype.slice.call(nodes);
				nodes = shuffle(nodes);
				while(i < nodes.length)
				{
					list.appendChild(nodes[i]);
					++i;
				}
			}
			shuffleNodes();
			
			function next3()
			{
			 
				const vv=document.getElementById("sortlist").children;
				var count=0;
			
				var ff=vv[0].id;
				if(ff=="image1")
				{
					count=count+1;
				}
				var ff=vv[1].id;
				if(ff=="image2")
				{
					count=count+1;
				}
				var ff=vv[2].id;
				if(ff=="image3")
				{
					count=count+1;
				}
				var ff=vv[3].id;
				if(ff=="image4")
				{
					count=count+1;
				}
				var ff=vv[4].id;
				if(ff=="image5")
				{
					count=count+1;
				}
				var ff=vv[5].id;
				if(ff=="image6")
				{
					count=count+1;
				}
				var ff=vv[6].id;
				if(ff=="image7")
				{
					count=count+1;
				}
				var ff=vv[7].id;
				if(ff=="image8")
				{
					count=count+1;
				}
				var ff=vv[8].id;
				if(ff=="image9")
				{
					count=count+1;
				}
				var ff=vv[9].id;
				if(ff=="image10")
				{
					count=count+1;
				}
				var ff=vv[10].id;
				if(ff=="image11")
				{
					count=count+1;
				}
				var ff=vv[11].id;
				if(ff=="image12")
				{
					count=count+1;
				}
				var ff=vv[12].id;
				if(ff=="image13")
				{
					count=count+1;
				}
				var ff=vv[13].id;
				if(ff=="image14")
				{
					count=count+1;
				}
				var ff=vv[14].id;
				if(ff=="image15")
				{
					count=count+1;
				}
				var ff=vv[15].id;
				if(ff=="image16")
				{
					count=count+1;
				}
				 
		
				if(count==16)
				{
					document.getElementById("box_container_id").style.display="flex";
					document.getElementById("message_1").style.display="block";
					document.getElementById("ok_btn_1").style.display="block";
				}
				else
				{
					document.getElementById("image_message").style.display="block";
					
				}
			}
		</script>
		<script>
			function formvalidation1()
			{
				var email=document.form1.email.value;
				var password_1=document.form1.password_1.value;
				 
				document.getElementById("form_message_1").style.display="none";
				document.getElementById("form_message_2").style.display="none";
				document.getElementById("form_message_4").style.display="none";
				
				if(email==null || email=="")
				{
					document.getElementById("form_message_1").style.display="block";
					return false;
				}
				var email_formayte= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,8})+$/;
				if(email.match(email_formayte) )
				{
					
				}
				else
				{
					document.getElementById("form_message_2").style.display="block";
					return false;
				}
				
			
				if(password_1==null || password_1=="")
				{
					document.getElementById("form_message_4").style.display="block";
					return false;
				}
				
				
				
			}
			function formvalidation2()
			{
				var color_code=document.form2.color_code.value;
				document.getElementById("form_message_6").style.display="none";
				if(color_code==null || color_code=="")
				{
					document.getElementById("form_message_6").style.display="block";
					return false;
				}
				 
			}
			function red()
			{
				document.getElementById("color_code").value+="#ff0000";
			}
			function green()
			{
				document.getElementById("color_code").value+="#00ff00";
			}
			function blue()
			{
				document.getElementById("color_code").value+="#0000ff";
			}
			function refresh_color_code()
			{
				document.getElementById("color_code").value="";
			}
			function view_password()
			{
				var dd=document.getElementById("password_id_1");
				if(dd.type=="password")
				{
					dd.type="text";
				}
				else
				{
					dd.type="password";
				}
			}
			document.getElementById("login").style.backgroundColor="rgba(255,255,255,1)";
			document.getElementById("login").style.color="rgba(100,200,255,1)";
			if(window.history.replaceState)
			{
					window.history.replaceState(null,1,null,window.location.href);
			}
		</script>
	</body>
</html>
	