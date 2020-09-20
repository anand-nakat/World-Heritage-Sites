<?php
session_start();
require_once ("pdo.php");

if(!isset($_SESSION['login']))
{
  $_SESSION['error']="Must be Logged In!";
  header('location:login.php');
  return;
}  
if ( !isset($_GET['name']) ) {
   header('Location: home.php');
  return;
}
$country=$_GET['name'];

$stmt = $conn->prepare("SELECT * FROM sites where country = :xyz ORDER BY site_name");
$stmt->execute(array(":xyz" => $country));
$stmt1 = $conn->prepare("SELECT * FROM favourites where user_id=:uid ");
$stmt1->execute(array(":uid"=> $_SESSION['user_id']));
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
$row1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

if ( count($row) == 0 ) {
    die('Invalid Country');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php 
	
	if($row !== false)
	echo ($row[0]['country']); ?>

		

	</title>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- BOOTSTRAP -->


<!-- FONTS --> 
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab&display=swap" rel="stylesheet"> 
<!-- FONTS -->

<!-- External CSS -->
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/country.css">

</head>
<body>

<div class="div-navbar">
	<nav class="navbar navbar-expand-md navbar-dark" id="top-nav" style="background-color: rgba(0, 0, 0, 0.9);">
	<a class="navbar-brand" href="home.php"> <span><img src="images/logo1.png" class="img-fluid" style="position: relative; bottom: 0.7rem;"> </span> World Heritage Sites </a>
	    
	     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	 

	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	  <ul class="navbar-nav nav-pills  ml-auto">
		    <li class="nav-item mr-3">
		      <a class="nav-link" href="home.php">Home</a>
		    </li>
		    <li class="nav-item mr-3">
		      <a class="nav-link" href="favourite.php">Favourites</a>
		    </li>
		    
		    <?php
                    
            if($_SESSION['is_admin'])
            {
              echo'<li class="nav-item mr-3">
              <a class="nav-link" href="admin.php">Admin</a></li>';
            }

             ?>
		    <li class="nav-item mr-3">
		      <a class="nav-link" href="#footer">About</a>
		    </li>
		    
		    <li class="nav-item mr-3">
		      <a class="nav-link"  href="logout.php">Logout</a>
		    </li>
	   </ul>
	   	<form class="form-inline my-2 my-lg-0 ">
	   	    <input class="form-control mr-sm-2 search-box w-100" id="searchbox" type="search" placeholder="Search" aria-label="Search">
	   	</form>

	</div>
</nav>
</div>	 

<!-- SEARCH LIST -->
  <div class="search-list">

                <div class="result">
          
                </div>
  </div>
<!-- END OF SEARCH LIST -->

<div class="container-fluid heading my-5 pt-5" >
<h1 class="text-center font-weight-bold  text-uppercase " id="country-name"> <?php echo(htmlentities($row[0]['country'])); ?> </h1>	
<hr class="w-25 m-auto">
</div>

 <div class="toast ml-auto">
    <div class="toast-header">
      <strong class="mr-auto text-danger"><h2>Adding Favourites</h2></strong>
     <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">×</button>
    </div>
    <div class="toast-body">
      <h2>Click on Heart to add the place to your Favourites..Check Favourite Page from above menu.</h2>
    </div>
  </div>
</div>


<div class="site-list py-5 container-fluid ">
	
	
	<?php 

	$count=0;
	
	while($count< count($row))
	{$is_fav=0;
		?>
	<div id="<?php echo($row[$count]['div_id']); ?>" class="site pb-5">

			<div class="site-name font-weight-bold text-left"> 

					<div class="num">  <?php echo ($count +1).". "; ?></div> <?php echo($row[$count]['site_name']);  ?>
					
						
						<button class="float-right fav" value="<?php echo($row[$count]['div_id']); ?>">	
							<?php 
							// if fav then display red-heart
							
					
								foreach ($row1 as $key ) {
									
									if($row[$count]['div_id']== $key['site_name'])
											{
												$is_fav=1;
												echo '<i class="fa fa-heart"  aria-hidden="true" data-toggle="popover" 
												data-trigger="hover" title="Unfavourite" data-content="This place will be removed from your Favourites."></i>';
											break;
										}
								}
							
							
							if($is_fav!=1)
							{
							echo '<i class="fa fa-heart-o"  aria-hidden="true" data-toggle="popover" 
							data-trigger="hover" title="Favourite" data-content="This place will be added to your Favourites."></i>';
							}
							?>
						</button>
					
						<!-- 	<img src="images/heart 16.png" class="small img-fluid" data-toggle="popover" data-trigger="hover" title="Favourite" data-content="This place will be added to your Favourites.">  -->	
						
					<hr class="w-50 ml-0">
			</div>


	<div class="row">
		
		<div class="col-lg-8 col-12 m-sm-auto ">
				<div class="site-img">
					<figure><img src="<?php echo($row[$count]['img_url']); ?>" alt="<?php echo($row[$count]['site_name']); ?>" class="img-fluid "></figure>
				</div>
			</div>

		<div class="col-lg-4 col-12">
			
				<div class="site-info mt-5">
					
					<?php echo($row[$count]['site_info']); ?>	
				</div>
		
		</div>	
	
	</div>	<!-- END OF ROW -->
</div>	<!-- END OF SITE -->

<?php 

$count++;
}

 ?>
</div>

<div id="about">

<div>

</body>
<script >
	

$(document).ready(function(){

$('.toast').toast({delay: 5000});
$('.toast').toast({animation: true});
// $('.toast').toast({autohide: false});
  $('.toast').toast('show');
  
  $('[data-toggle="popover"]').popover();
$("#about").load("home.php #footer");

  $("#searchbox").keyup(function() {
    var query = $(this).val();
    console.log(query);
    if(query!=" " && query.length>=1)
    {

      $.ajax({
        url: "search.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $('.result').fadeIn();
          $('.result').html('<span>Search Result: </span><br>'+data);
          
          console.log('added:'+data);
        }
      });
    }

    else{
      $('.result').fadeOut();
      
       $('.result').html(" ");
        
    }
});
 $(document).on('click', '.search-list li', function() {
  $('#searchbox').val($(this).text());
  $('.search-list').fadeOut();
 }); 

		$(".fav i").click(function(){

		var query=$(this).parent().val();
		var country_name='<?php  echo ($country); ?>';
		console.log('country name:'+ country_name);
		var class_name= $(this).attr('class');

				if(class_name.indexOf('fa-heart-o') > -1)
				{
					console.log(query);

					$(this).removeClass('fa-heart-o');
					$(this).addClass('fa-heart');

						$.ajax({
						   url: 'add-fav.php',
						   	method:"POST",
						   	data:{query:query,country_name:country_name},
						   success: function (response) {
						     alert(response);} 
							});
				}
				
				else
				{
					console.log(query);
					$(this).removeClass('fa-heart');
					$(this).addClass('fa-heart-o');
				
						$.ajax({
						   url: 'del.php',
						   method:"POST",
						   data:{query:query},
						   success: function (response) {
						     alert(response);}
						    });
				}
			}); /*END OF CLICK FUN*/

	
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
});

</script>


</html>