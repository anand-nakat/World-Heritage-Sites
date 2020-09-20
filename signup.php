
<?php
session_start();
$salt = 'XyZzy12*_';
    require_once "pdo.php";
    require_once "util.php";

if ( isset($_POST["new_email"]) && isset($_POST["new_password"]) && isset($_POST["new_username"])) 
{
 
 $msg=signup_insert_validate($salt,$conn);

	if(is_string($msg))
	{
		$_SESSION["error"]=$msg;
		header("location:signup.php");
		return;
	}

header("Location: login.php");
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/signup.css">

 
</head>
<body >
	<header>
		<nav class="navbar navbar-expand-md navbar-dark" style=" background-color: rgba(0, 0, 0, 0.5);">

		<a class="navbar-brand" href="home.php"><span><img src="images/logo1.png" class="img-fluid" style="position: relative; bottom: 0.7rem;"> </span>  World Heritage Sites </a>
				
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    				<span class="navbar-toggler-icon"></span>
  			</button>



		<div class="collapse navbar-collapse pr-4" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item pr-4 active">
					<a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
				</li>
				
				<li class="nav-item pr-4">
					<a class="nav-link" href="login.php">Log In</a>
				</li>
				
				<li class="nav-item pr-4">
					<a class="nav-link"  href="favourite.php">Favourites</a>
				</li>
				
			</ul>
		</div>
			
		</nav>
	</header><!-- /header -->
	

   
  <div class="main ">
	<div class="signupbox">
			<h1>Sign Up</h1>
			
		<form method="post" autocomplete="off">

			<div class="s_textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input class="s_input" type="text" id="u_name" name="new_username" placeholder="Username" value="">
			</div>
			
			<div class="s_textbox">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<input class="s_input" type="text" id="email" name="new_email" placeholder="Email" value="">
			</div>

			<div class="s_textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input class="s_input" type="password" id="pwd" name="new_password" placeholder="Password" value="">
			</div>

			<input type="submit" class="btn_signup" name="submit"  value="Register">

						 <div><p class="text-capitalize font-weight-bold mt-3 text-center text-white" id="error_message1"></p></div>

						 <div>
				<?php

						    if ( isset($_SESSION["error"]) ) {
						        echo('<div><p class="text-capitalize font-weight-bold mt-3 text-center text-white" id="error_message">'.$_SESSION["error"]."</p></div>\n");
						        unset($_SESSION["error"]);
						    }
							?>
						</div>

		</form>
		</div>
	</div>
   
	

</body>
<script >
	

	$(document).ready(function() {
		
		$("#u_name").keyup(function(event) {
			var name= $(this).val();
			if(name.length < 3)
			{
				
				$("#error_message1").html("Name must contain atleast 3 <br> characters ");
			}
			else{
				$("#error_message1").html("");


			}
		});	


		$("#pwd").keyup(function(event) {
			var pwd= $(this).val();
			if(pwd.length < 4)
			{
				$("#error_message1").html("Password must contain atleast <br> 4 characters");
			}
			else{
				$("#error_message1").html("");
			}
		});
	});
</script>
</html>