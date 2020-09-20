<?php
    session_start();
    require_once "pdo.php";
    require_once "util.php";
    $salt = 'XyZzy12*_';
 
if (isset($_POST["login_email"]) && isset($_POST["login_password"]) ) 
{
 $msg=login_validate($salt,$conn);
	
	if(is_string($msg))
	{
		$_SESSION["error"]=$msg;
		header("location:login.php");
		return;
	}
header("Location: home.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">

  
</head>
<body>

		<nav class="navbar navbar-expand-md navbar-dark " style=" background-color: rgba(0, 0, 0, 0.5);">

		<a class="navbar-brand" href="home.php"> <span><img src="images/logo1.png" class="img-fluid" style="position: relative; bottom: 0.7rem;"> </span> World Heritage Sites </a>

		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    				<span class="navbar-toggler-icon"></span>
  			</button>



		<div class="collapse navbar-collapse pr-4" id="collapsibleNavbar">
			<ul class="navbar-nav nav-pills  ml-auto">
				<li class="nav-item active mr-4 ">
					<a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
				</li>
				
				<li class="nav-item mr-4 ">
					<a class="nav-link" href="signup.php">Sign Up</a>
				</li>
				
				<li class="nav-item mr-4 ">
					<a class="nav-link" href="favourite.php">Favourites</a>
				</li>
			</ul>
		</div>
			
		</nav>
	


	<div class="main">

	<div class="loginbox">
			 <h1>Login</h1>
		<form method="post" >

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" id="email" name="login_email" placeholder="Email" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" id="pwd" name="login_password" placeholder="Password" value="" >
			</div>

			<input type="submit" class="btn" name="submit" value="Sign In" id="login-btn" >
		</form>


			<input type="button" class="btn" id="reg-btn" value="Register" onclick="window.location.href='signup.php';">
			<div style="font-size: 2.5rem;">New User? Register!</div>
			 <div>

			 	<div><p class="text-capitalize font-weight-bold mt-3 text-center text-info" id="error_message1"></p></div>
	<?php

			    if ( isset($_SESSION["error"]) ) {
			        echo('<div><p class="text-capitalize font-weight-bold mt-3 text-center text-white" id="error_message">'.htmlentities($_SESSION["error"])."</p></div>\n");
			        unset($_SESSION["error"]);
			    }
				?>
			</div>
	</div>

</div>
		
   
  </div> 
  
	
	

</body>

</html>