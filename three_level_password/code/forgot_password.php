<?php

session_start();
require("Database/db_connection.php");
?>
<html>
	<head>
		<title>Register Now </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="style/login_style.css" rel="stylesheet" type="text/css" />
		<link href="style/box_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="main_container">
			<button type="button" class="back" onclick="location.href='login.php';"></button>
			<div class="container" id="container_1">
				<h1 class="level_heading">Three Level Password Authentication.</h1>
			</div>
			<div class="container" id="container_2">
				<div class="login_container" id="login_container_id">
					<h2 class="login_heading">Forget Password Now</h2>
					<form action="<?php echo$_SERVER["PHP_SELF"]; ?>" name="form1" method="POST" onsubmit="return formvalidation1()" class="login_form" autocomplete="off">
						<label class="login_label">Enter E-mail id</label>
						<p class="form_message" id="form_message_1">Email is empty</p>
						<p class="form_message" id="invalid_email">Enter a valid email address</p>
						<p class="form_message" id="form_message_email_exist">Entered email address is already exist</p>
						<input type="text" placeholder="abc@email.com" name="email" class="input_1" id="email_id">
						<input type="submit" value="SEND OTP" class="form_submit" id="send_otp_id" name="send_opt">
						<input type="submit" value="RESEND OTP" class="form_submit" id="resend_otp_id" name="send_opt">
					</form>
					<div id="otp_container_id">
						<form action="<?php echo$_SERVER["PHP_SELF"]; ?>" name="form_otp" method="POST" onsubmit="return formvalidation_otp()" class="login_form" autocomplete="off">
							<label  class="login_label">Enter OTP</label>
							<input type="text" placeholder="" name="otp" class="input_1" id="otp_id">
							<input type="submit" value="Next" class="form_submit" name="next_1">
						</form>
					</div>
					
				</div>
				
				<div class="login_container" id="color_button_container_id">
				
					<form action="<?php echo$_SERVER["PHP_SELF"]; ?>" name="form2" method="POST" onsubmit="return formvalidation2()" class="login_form" autocomplete="off">
						<label  class="login_label">Create New Password</label>
						<p class="form_message" id="form_message_2">Password is empty</p>
						<p class="form_message" id="password_stenght">Entered Password is not Strong</p>
						<div class="password_container">
							<input type="password" placeholder="********" name="password_1" class="input_1" id="password_id_1"  onkeydown="return strong_password(this.id)" >
							<button type="button" class="view_password" id="view_password_id" onclick="view_password();"></button>
						</div>
						<label  class="login_label">Re-enter Password</label>
						<p class="form_message" id="form_message_3">Re-entered password is empty</p>
						<p class="form_message" id="form_message_4">Re-entered password is not same</p>
						<input type="text"  name="reenter_passwoprd" class="input_1" id="reenter_passwoprd_id">
						<input type="submit" value=" Change Password" class="form_submit" name="next_2">
					</form>
				</div>
				
			</div>
			
			
			<div class='box_container' id='box_container_id'>
				<div class='box'>
					<h1>Message</h1>
					<p id="message_1" class="message">Entered OTP is wrong.Try again.</p>
					<p id="message_2" class="message">Successfully create new passsword.</p>
					<p id="message_3" class="message">Enable to create new passsword.</p>
				
					
					<div class="ok_btn_container">
						<button type="button" class="ok_btn" id="ok_btn_1" onclick="hide_box();">OK</button>
						<button type="button" class="ok_btn" id="ok_btn_2" onclick="location.href='three_level_password_login.php';">OK</button>
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
					if(isset($_POST["send_opt"]))
					{ 
						$email=$_POST["email"];
						$_SESSION["user_email"]=$email;
						
								$generator="1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
								$system_otp="";
								for($i=1; $i<=6; $i++)
								{
									$system_otp.=substr($generator,(rand()%(strlen($generator))),1);
								}
								$_SESSION["system_otp"]=$system_otp;
								echo'
									<script>
										document.getElementById("resend_otp_id").style.display="block";
										document.getElementById("send_otp_id").style.display="none";
										document.getElementById("otp_container_id").style.display="block";
										alert("'.$system_otp.'");
									</script>
								';
								echo'
									<script>
										document.getElementById("email_id").value="'.$email.'";
									</script>
								';
								
						
					}
					if(isset($_POST["next_1"]))
					{ 
						$user_otp=$_POST["otp"];
						$system_otp=$_SESSION["system_otp"];
						if($user_otp==$system_otp)
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
									document.getElementById("box_container_id").style.display="flex";
									document.getElementById("message_1").style.display="block";
									document.getElementById("ok_btn_1").style.display="block";
								</script>
							';
						}
						
					}
					if(isset($_POST["next_2"]))
					{ 
						$password=$_POST["password_1"]; 
						
						$email=$_SESSION["user_email"];
						$query="UPDATE `login_info` SET `Password` = '$password' WHERE `login_info`.`Email` = '$email' ";
						if(mysqli_query($con,$query))
							{
								echo'
									<script>
										document.getElementById("box_container_id").style.display="flex";
										document.getElementById("message_2").style.display="block";
										document.getElementById("ok_btn_2").style.display="block";
									</script>
								';
							}
							else
							{
								echo'
									<script>
										document.getElementById("box_container_id").style.display="flex";
										document.getElementById("message_3").style.display="block";
										document.getElementById("ok_btn_1").style.display="block";
									</script>
								';
							}
					}
				?>
		
		<script>
			
			
			function formvalidation1()
			{
				var email=document.form1.email.value;
				
				
				document.getElementById("form_message_1").style.display="none";
				
				
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
					document.getElementById("invalid_email").style.display="block";
					return false;
				}
				
				
			}
			function formvalidation2()
			{
				var password_1=document.form2.password_1.value;
				 
				var reenter_passwoprd=document.form2.reenter_passwoprd.value;
				
				document.getElementById("form_message_2").style.display="none";
				document.getElementById("form_message_3").style.display="none";
				document.getElementById("form_message_4").style.display="none";
				document.getElementById("password_stenght").style.display="none";
				
			
				if(password_1==null || password_1=="")
				{
					document.getElementById("form_message_2").style.display="block";
					return false;
				}
				if(password_1.match(/[a-z]/g) && password_1.match(/[A-Z]/g) && password_1.match(/[0-9]/g) && password_1.match(/[^a-zA-Z\d]/g) && password_1.length>=8)
				{
				}
				else
				{
					document.getElementById("password_stenght").style.display="block";
					return false;
				}
				if(reenter_passwoprd==null || reenter_passwoprd=="")
				{
					document.getElementById("form_message_3").style.display="block";
					return false;
				}
				if(password_1!=reenter_passwoprd)
				{
					document.getElementById("form_message_4").style.display="block";
					return false;
				}
		
				
				
				
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
			function hide_box()
			{
				document.getElementById("box_container_id").style.display="none";
			}
			
			if(window.history.replaceState)
			{
					window.history.replaceState(null,1,null,window.location.href);
			}
		</script>
	</body>
</html>
	