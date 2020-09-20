
<?php 
session_start();
require_once ("pdo.php");
if(!isset($_SESSION['login']))
{
  $_SESSION['error']="Must be Logged In!";
  header('location:login.php');
  return;
}  
$stmt1 = $conn->prepare("SELECT * FROM favourites where user_id=:uid ");
$stmt1->execute(array(":uid"=> $_SESSION['user_id']));


?>

<!DOCTYPE html>
<html>
<head>
	<title>Favourites</title>
	<link rel="icon" type="image/png" href="images/logo.png">
		   <meta charset="utf-8">
	  		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- JQUERY -->

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Popper JS -->

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- BOOTSTRAP -->


<!-- FONTS --> 
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab&display=swap" rel="stylesheet"> 
<!-- FONTS -->


<link rel="stylesheet" type="text/css" href="css/country.css">
<link rel="stylesheet" type="text/css" href="css/home.css">

<style type="text/css">
	
	 .num{
		display: none;
	} 
.btn-danger{
	float: right;
	font-size: 2rem;
}

html,body{
	height: 100%;
}

/* .text{
	min-height: 50%;
 */
</style>
</head>
<body>

<div class="div-navbar">
	<nav class="navbar navbar-expand-md navbar-dark" id="top-nav"  style="background-color: rgba(0, 0, 0, 0.9);">
	<a class="navbar-brand" href="home.php"><span><img src="images/logo1.png" class="img-fluid" style="position: relative; bottom: 0.7rem;"> </span>  World Heritage Sites </a>
	    
	     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	 

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	  <ul class="navbar-nav nav-pills  ml-auto">
		    <li class="nav-item mr-3">
		      <a class="nav-link" href="home.php">Home</a>
		    </li>
		    <li class="nav-item mr-3 active">
		      <a class="nav-link" href="favourite.php">Favourites</a>
		    </li>
		    
		    <li class="nav-item mr-3 ">
		      <a class="nav-link" href="#about">About</a>
		    </li>
		    
		   <li class="nav-item mr-3">
		      <a class="nav-link"  href="logout.php">Logout</a>
		    </li>
	   </ul>
	</div>
</nav>
</div>	 
<div class="text">
<div class="container-fluid heading my-5" data-aos="fade">
<h1 class="text-center font-weight-bold  text-uppercase"> Your Favourites </h1>	
<hr class="w-50 m-auto">
</div>
<?php 
$row = $stmt1->fetchAll(PDO::FETCH_ASSOC);
if(count($row) > 0)
{


echo '<div class=" d-inline">
	<button type="button" class="btn btn-danger mr-auto">Clear All Favourites</button>
</div><br><br>';
}
else{
	echo "<script>$('.text').css('min-height','70%')</script>";
		echo "<div class='container-fluid message my-5 py-5' data-aos='fade'>
		<h1 class='text-center font-weight-bold '> Oops looks like you don't have any Favourites! <br> Click on the heart Icon and those places will be displayed here. </h1></div>" ;
		
} 
?>
</div>
<div id="paste" class="mx-4">
	
</div>

<div id="about">

<div>
</body>



<?php	

for ($i=0; $i < count($row); $i++) { 
	

	echo '<script type="text/javascript">
		
		var app=$("<div>").load("country.php?name='.$row[$i]['country'].' #'.$row[$i]['site_name'].' ");
		
		$("#paste").append(app);
	</script>';
}
?>

<script >
	
$(document).ready(function() {
$("#about").load("home.php #footer");

// CLEAR ALL FAVOURITES
$(".btn-danger").click(function(event) {
	if(confirm("This will clear all your Favourites!"))
		{
		$.ajax({
				   url: 'del-all.php',
				   	method:"POST",
					success: function (response) {
				    
				    $("#paste").fadeOut();
				    location.reload();
					} 
		});
		}
	});

// FEEDBACK SUBMIT
	$('body').on('click', '.feedback-btn', function() { 
	var name= $("#f-name").val();
	var summary= $("#f-summary").val();
	console.log('name:');
	if(name == "" || summary== "" || summary.length== null || name.length == null)
	{
	  alert("Please fill both the fields ");
	}
	else{
	  $.ajax({
	          url: "feedback.php",
	          method:"POST",
	          data:{name:name,summary:summary},
	          success:function(response)
	          {
	            alert(response);
	          }
	        });
	}
	});

	
//FAVOURITE ICON CLEAR
	$('body').on('click', '.fav', function() { 
	var query= $(this).val();

	console.log(name);
	if(confirm("Clear this site from Favourites?"))
	{
		$.ajax({
			   url: 'del.php',
			   method:"POST",
			   data:{query:query},
			   success: function (response) {
			     $("#"+query).fadeOut();
			     location.reload();
			 		}
			   });
	}
	});


});

</script>


</html>