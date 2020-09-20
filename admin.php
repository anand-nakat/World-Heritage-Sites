<?php
require_once ("pdo.php");
session_start();
if(!isset($_SESSION['login']))
{
  $_SESSION['error']="Please Log In!";
  header('location:login.php');
  return;
}  
else if($_SESSION['is_admin']!=1)
{
  die("Only for Admin");
}




?>



<html>
  <head>
    <title>World Heritage Sites</title>
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

  <link rel="stylesheet" type="text/css" href="css/home.css">
    <style>
      #about{
        position: relative;
        bottom: 0;
        right: 0;
      }

      .main {
        font-size: 2rem;
      }

      .main h2{
        font-size: 3rem;
        font-family: 'Roboto Slab', serif;
      }
      

      [type=search] {
    outline-offset: 0px;
  }

  #remove-btn,#edit-btn,#edit-form{
    display: none;
  }
 .search-remove-result li:hover,.search-edit-result li:hover{
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    
          <!--Navbar-->
 
          <nav class="navbar navbar-expand-lg navbar-dark " id="top-nav" style=" background-color: rgba(0, 0, 0, 0.9);">

                <a class="navbar-brand" href="home.php" ><span><img src="images/logo1.png" class="img-fluid" style="position: relative; bottom: 0.7rem;"> </span> World Heritage Sites </a>
                    
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item  mr-3 ml-lg-5">
                      <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item mr-3">
                      <a class="nav-link" href="favourite.php">Favourites</a>
                    </li>
                    <?php
                    
                    if($_SESSION['is_admin'])
                    {
                      echo'<li class="nav-item active mr-3">
                      <a class="nav-link" href="admin.php">Admin</a></li>';
                    }

                    ?>
                    <li class="nav-item mr-3">
                      <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item mr-3">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                 </ul>
                    
                  <form class="form-inline my-2 my-lg-0 ">
                      <input class="form-control mr-sm-2 search-box w-100" id="searchbox" type="search" placeholder="Search" aria-label="Search">
                  </form>

    </div>
  </nav>
<!-- END OF NAVBAR -->


<!-- SEARCH LIST -->
  <div class="search-list">

                <div class="result">
          
                </div>
  </div>
<!-- END OF SEARCH LIST -->

<div class="main my-5 container-fluid">

<!--   ADD A SITE -->
  <div class="add my-5 py-2">
      <h2>Add a Site <hr class="w-25 ml-0"> </h2>

        <form class="form" onsubmit="return false" autocomplete="off">

            <label> Country</label> <br>
            <input type="text" class="w-75"  name="country" id="country"> <br><br>
            <label> Site Name</label> <br>
            <input type="text"  class="w-75"  name="site-name" id="site-name"> <br><br>
            <input type="hidden" class="w-75"   name="site-id" id="site-id"> 
            <label> Site Info</label> <br>
            <textarea type="text"  class="w-75"  name="site-info" id="site-info"></textarea> <br><br>
            <label> Image URL</label> <br>
            <input type="text" class="w-75"   name="img-url" id="img-url"> <br><br>

          <button class="btn-success py-1" id="add-btn" > <h3>Add to Database</h3></button>
          <button class="btn-primary py-1" id="clear-field-btn" > <h3>Clear Fields</h3></button>

        </form>

        <h2 id="message"> </h2>
  </div>

<!-- EDIT SITE -->
  <div class="edit my-5 py-2">
    <h2>Edit Existing Site <hr class="w-25 ml-0"> </h2>
      <form onsubmit="return false" autocomplete="off">
        <label> Search </label> <br>
          <input type="search" id="edit-search" class="w-75" placeholder="Search for Site"  >

            <div class="search-edit-result w-75 bg-dark text-white px-1">

            </div>
        </form>
          
            <form  id="edit-form" autocomplete="off" onsubmit="return false">

              <label> Country</label> <br>
              <input type="text" class="w-75"  name="country" id="edit-country"> <br><br>
              <label> Site Name</label> <br>
              <input type="text"  class="w-75"  name="site-name" id="edit-site-name"> <br><br>
              <input type="hidden" class="w-75"   name="site-id" id="edit-site-id">
              <label> Site Info</label> <br>
              <textarea type="text"  class="w-75" rows="5"  name="site-info" id="edit-site-info"></textarea> <br><br>
              <label> Image URL</label> <br>
              <input type="text" class="w-75"   name="img-url" id="edit-img-url">

            </form>

        
          <button class="btn btn-info py-1 " id="edit-btn" autocomplete="off" > <h3>Save Changes</h3></button>
      
  </div>

<!-- REMOVE SITE -->
  <div class="remove my-5 py-2 ">
    <h2>Remove Site <hr class="w-25 ml-0"> </h2>
      <form onsubmit="return false" autocomplete="off">
        <label> Search </label> <br>
          <input type="search" id="remove-search" class="w-75" placeholder="Search for Site"  >

            <div class="search-remove-result w-75 bg-dark text-white px-1">

            </div>

          
            <div>
          <button class="btn-danger py-1 my-2" id="remove-btn" autocomplete="off" > <h3>Remove Site</h3></button>
        </div>
      </form>
  </div>



</div>





<!-- FOOTER -->
<div id="about"></div>
  </body>
</html>


<script>
$(document).ready(function(){
$("#about").load("home.php #footer");

// NAVBAR SEARCH BOX                
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

// NAVBAR SEARCH BOX CLICK
 $(document).on('click', '.search-list li', function() {
  $('#searchbox').val($(this).text());
  $('.search-list').fadeOut();
 }); 


//ADD A SITE
 $("#add-btn").click(function(event) {
   var site_name= $("#site-name").val();
   var country= $("#country").val();
    var div_id= $("#site-id").val();
    var site_info= $("#site-info").val();
    var img_url= $("#img-url").val();
    $.ajax({
        url: "admin-add.php",
        method:"POST",
        data:{site_name:site_name,country:country,div_id:div_id,site_info:site_info,img_url:img_url},
        success:function(response)
        {
          console.log("Clicked:"+response);
          alert(response);
          $("input, textarea").val("");
        }
      });
 });


//CLEAR ADD FIELDS
$("#clear-field-btn").click(function(event) {
    $("input, textarea").val("");
    console.log("Cleared:");
  });


//SEARCH TO EDIT SITE
 $("#edit-search").keyup(function() {
    var query = $(this).val();
    console.log(query);
    if(query!=" " && query.length>=1)
    {
      $.ajax({
        url: "admin-search.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $('.search-edit-result').fadeIn();
          $('#edit-form').fadeIn();
          $('.search-edit-result').html(data);
          $("#edit-btn").show();
          
        }
      });
    }

    else{
      $('.search-edit-result').fadeOut();
      $('#edit-form').fadeOut();
      $("#edit-btn").hide();
      $('.search-edit-result').html(" ");
        
    }
});

//EDIT-SEARCH IF CLICKED
 $(document).on('click', '.search-edit-result li', function() {
  $('#edit-search').val($(this).text());
  $("#edit-site-name").val($(this).text());
  var site_name=$("#edit-site-name").val();
  $.ajax({
      url: "admin-edit-fetch.php",
      method:"POST",
      data:{site_name:site_name},
      dataType: 'JSON',
      success:function(response)
      {
        var array=response;
        
        $("#edit-site-info").val(array[0]["site_info"]);
        $("#edit-site-id").val(array[0]["div_id"]);
        $("#edit-country").val(array[0]["country"]);
        $("#edit-img-url").val(array[0]["img_url"]);
        // console.log(response);
        
      }
    });
  $('.search-edit-result').fadeOut();
 }); 


//FILL DIV ID AND IMG URL AS SITE NAME IS TYPED
$("#edit-site-name").keyup(function(event) {
    var site_name= $(this).val();
    var country= $("#edit-country").val();
     var div_id= site_name.split(" ");
     div_id= div_id.join("-");
    $("#edit-site-id").val(div_id);
    $("#edit-img-url").val("images/separate pages/"+country+"/"+site_name+".jpg");
  });


//ADD COUUNTRY TO IMG URL AS COUNTRY IS TYPED
$("#edit-country").keyup(function(event) {
    var country= $(this).val();
    var site_name= $("#edit-site-name").val();
    $("#edit-img-url").val("images/separate pages/"+country+"/"+site_name+".jpg");
  });


//EDIT BTN CLICKED
$("#edit-btn").click(function(event) {
  console.log('edit btn clicked');
var query=$("#edit-search").val();
var site_name= $("#edit-site-name").val();
var country= $("#edit-country").val();
var div_id= $("#edit-site-id").val();
var site_info= $("#edit-site-info").val();
var img_url= $("#edit-img-url").val();
$.ajax({
      url: "admin-update.php",
      method:"POST",
      data:{query:query,site_name:site_name,country:country,div_id:div_id,site_info:site_info,img_url:img_url},
      success:function(response)
      {
       alert(response);
       $("#edit-btn").fadeOut();
       $("#edit-form").fadeOut();
       $("#edit-search").val("");
        }
    });




});


//SEARCH TO REMOVE SITE
 $("#remove-search").keyup(function() {
    var query = $(this).val();
    console.log(query);
    if(query!=" " && query.length>=1)
    {
      $.ajax({
        url: "admin-search.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $('.search-remove-result').fadeIn();
          $('.search-remove-result').html(data);
          $("#remove-btn").fadeIn();
          
        }
      });
    }

    else{
      $('.search-remove-result').fadeOut();
      $("#remove-btn").fadeOut();
      $('.search-remove-result').html(" ");
        
    }
});

//REMOVE-SEARCH IF CLICKED
 $(document).on('click', '.search-remove-result li', function() {
  $('#remove-search').val($(this).text());
  $('.search-remove-result').fadeOut();
 }); 


//REMOVE BUTTON CLICKED
$("#remove-btn").click(function(event) {
var query= $("#remove-search").val();
console.log(query);
if(confirm("Do you want to delete this site?"))
{
  $.ajax({
        url: "admin-delete.php",
        method:"POST",
        data:{query:query},
        success:function(data)
        {
          $("#remove-btn").fadeOut();
          $('#remove-search').val("");
          
          alert(data);
        }
      });
}

});






//FILL DIV ID AND IMG URL AS SITE NAME IS TYPED
$("#site-name").keyup(function(event) {
    var site_name= $(this).val();
    var country= $("#country").val();
     var div_id= site_name.split(" ");
     div_id= div_id.join("-");
    $("#site-id").val(div_id);
    $("#img-url").val("images/separate pages/"+country+"/"+site_name+".jpg");
  });


//ADD COUUNTRY TO IMG URL AS COUNTRY IS TYPED
$("#country").keyup(function(event) {
    var country= $(this).val();
    var site_name= $("#site-name").val();
    $("#img-url").val("images/separate pages/"+country+"/"+site_name+".jpg");
  });




});

                
</script>