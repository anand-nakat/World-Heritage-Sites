<?php
require_once ("pdo.php");
session_start();
if(!isset($_SESSION['login']))
{
  $_SESSION['error']="Please Log In!";
  header('location:login.php');
  return;
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
                    <li class="nav-item active mr-3 ml-lg-5">
                      <a class="nav-link" href="#home">Home<span class="sr-only">(current)</span></a>
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

<!-- TOP CAROUSEL -->
<div id="top-carousel" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="2000" data-pause="true">

        <div class="carousel-inner carousel-head">
    
              <div class="carousel-item active">
                <img src="images/home-main/home-bg-1.jpg" class="img-fluid"  alt="Chicago">
               </div>
               
               <div class="carousel-item">
                <img src="images/home-main/home-bg-2.jpg" class="img-fluid">
              </div>
              <div class="carousel-item">
                <img src="images/home-main/home-bg-3.jpg" class="img-fluid"  alt="New York">
                
              </div>
           
               <div class="carousel-item">
                <img src="images/home-main/home-bg-5.jpg" class="img-fluid"  alt="The Grea">
              </div>
               <div class="carousel-item">
                <img src="images/home-main/home-bg-6.jpg" class="img-fluid"  alt="The Grea">
              </div>

          </div>
</div>
<!-- END OF TOP CAROUSEL -->

<!-- WHS DEFINITION -->
<div class="container-fluid main mt-5" id="top">
  <h1 class="text-dark text-center text-capitalize pb-2" > What is a World Heritage Site</h1>
    <hr class=" w-50 ml-auto">
  
  <div class="row">

      <div class="col-lg-6 col-md-6 col-12 " >
        <div class="unesco ml-lg-auto mx-auto">
        <img src="images/rsz_unesco-logo.jpg" alt="world map" class="img-fluid ">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-12 py-5 " >
            <p class="mx-5 " >
              A World Heritage Site is a landmark or area with legal protection by an international convention administered by the United Nations Educational, Scientific and Cultural Organization (UNESCO). World Heritage Sites are designated by UNESCO for having cultural, historical, scientific or other form of significance.
            </p>
      </div>

  </div>

</div>
<!-- END OF WHS DEFINITION -->


<!-- COUNTRIES HEADING-->
<section class="heading py-5 my-5 ">
    <h1 class="text-dark text-center text-capitalize pb-2" >Grouped by nations united by nature</h1>
    <hr class=" w-50 ml-auto">
</section>

<!-- COUNTRIES LIST-->

<div class="countries container-fluid mb-5">
<!--ITALY-->
<div id="italy">
<div class="text-uppercase   my-5 pt-3 country-heading  " ><h1 class="text-center pb-5 font-weight-bold ">1. Italy<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row">      <!-- ROW 1-->
      <!-- COL 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto italy-carousel " >         

          <div id="italy" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               <div>
                   <div class="carousel-inner country mx-auto">
                     
                      
                      <div class="carousel-item active">
                         <img src="images/italy/cinque terre.jpg" class="img-fluid"  alt="Cinque Terre">
                      </div>
                      <div class="carousel-item">
                         <img src="images/italy/The Dolomites.jpg" class="img-fluid"  alt="Dolomites">
                      </div>

                      <div class="carousel-item">
                         <img src="images/italy/Rhaetian Railway.jpg" class="img-fluid"  alt="Rhaetian Railway">
                      </div>
                      
                      <div class="carousel-item">
                         <img src="images/italy/aeollian island.jpg" class="img-fluid"  alt="aeollian island">
                      </div>

                        <div class="carousel-item ">
                          <img src="images/italy/Caserta.jpg" class="img-fluid"  alt="Caserta">
                         
                      </div>
                    </div>
                   
                </div>
          </div>
      </div>
      <!-- COL 2-->
      <div class="col-lg-4 col-12 italy-text " >
          <div class="div-country-text">
            <h2 class=" country-text text-left">Italy is the number one country in the world when it comes to UNESCO World Heritage sites. With 51 cultural and natural landmarks, and possible 40 spots having been taken for consideration, it makes up over 5% of UNESCO’s global list. From the Dolomites and historic centres of Florence and Rome to Pompeii and the Amalfi Coast, the Italian sites are ideal travel destinations for anyone seeking out history, art and culture.
            </h2>
          </div>
      </div>
              <div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-italy" value="View World Heritage Sites" onclick="window.location.href='country.php?name=italy';"> 
             </div>

    </div>
  </div>
    

<!--CHINA-->
<div id="china">
<div class="text-uppercase   my-5 pt-3 country-heading" ><h1 class="text-center pb-5 font-weight-bold">2. China<hr class=" w-25 ml-auto"></h1> </div>
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="china" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               
                   <div class="carousel-inner country mx-auto">
                       <div class="carousel-item active">
                          <img src="images/China/The-Great-Wall-of-China.jpg" class="img-fluid"  alt="The-Great-Wall-of-China">
                         
                      </div>
                       <div class="carousel-item">
                         <img src="images/China/Mount Fanjingshan.jpg" class="img-fluid"  alt="Mount Fanjingshan">
                      </div>
                       <div class="carousel-item">
                         <img src="images/China/Wulingyuan Scenic Area.jpg" class="img-fluid"  alt="Wulingyuan Scenic Area">
                      </div>
                      <div class="carousel-item">
                         <img src="images/China/Mount Qingcheng.jpg" class="img-fluid"  alt="Mount Qingcheng">
                      </div>
                     
                      <div class="carousel-item">
                         <img src="images/China/Xinjiang Tianshan.jpg" class="img-fluid"  alt="Xinjiang Tianshan">
                      </div>
                  </div>
          </div>
      </div>
    
      <!-- COL 2-->
      <div class="col-lg-4 col-12"  >
          <div class="div-country-text">
            <h2 class=" country-text text-left">China has 55, ranking top in the world along with Italy. China ratified The Convention Concerning the Protection of the World Cultural and Natural Heritage on 12 December 1985. These sites comprise some of the most essential part of China's valuable and rich tourism resources.
            </h2>
            
              
        </div>
      </div>
<div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-china" value="View World Heritage Sites" onclick="window.location.href='country.php?name=china';"> 
             </div>
    </div>
  </div>


<!--SPAIN-->
<div id="spain">
<div class="text-uppercase my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">3. Spain<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="spain" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               
                   <div class="carousel-inner country mx-auto">
                       
                      <div class="carousel-item active">
                         <img src="images/spain/Antequera Dolmens Site.jpg" class="img-fluid"  alt="Antequera Dolmens Site">
                      </div>
                      <div class="carousel-item">
                         <img src="images/spain/Mont Perdu.jpeg" class="img-fluid"  alt="Mont Perdu">
                      </div>
                       <div class="carousel-item">
                          <img src="images/spain/Ibiza.jpg" class="img-fluid"  alt="Ibiza">
                         
                      </div>
                      <div class="carousel-item">
                         <img src="images/spain/Las Médulas.jpg" class="img-fluid"  alt="Las Médulas">
                      </div>
                      <div class="carousel-item">
                          <img src="images/spain/HANGING HOUSES OF CUENCA.jpg" class="img-fluid"  alt="HANGING HOUSES OF CUENCA">
                      </div>
                  </div>
          </div>
      </div>
    
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left">Honored for their “cultural and natural heritage of outstanding value to humanity”, Spain has 48 UNESCO World Heritage Sites,the third most after Italy and China in the world.Most of the sites are known for their cultural significance or natural beauty, including some that are entire towns.
            </h2>
            
              
        </div>
      </div>
<div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-spain" value="View World Heritage Sites" onclick="window.location.href='country.php?name=spain';"> 
             </div>
    </div>
  </div>

  <!--GERMANY-->
<div id="germany">
<div class="text-uppercase my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">4. Germany<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="spain" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               
                   <div class="carousel-inner country mx-auto">
                       
                      <div class="carousel-item active">
                         <img src="images/germany/Aachen Cathedral.jpg" class="img-fluid"  alt="Aachen Cathedral">
                      </div>
                      <div class="carousel-item">
                         <img src="images/germany/Rhine Valley.jpg" class="img-fluid"  alt="Rhine Valley">
                      </div>
                      <div class="carousel-item">
                         <img src="images/germany/Kassels Bergpark Wilhelmshöhe.jpg" class="img-fluid"  alt="Kassels Bergpark Wilhelmshöhe">
                      </div>
                      <div class="carousel-item">
                         <img src="images/germany/Wartburg Castle.jpg" class="img-fluid"  alt="Wartburg Castle">
                      </div>

                      <div class="carousel-item">
                         <img src="images/germany/Cologne Cathedral.jpg" class="img-fluid"  alt="Cologne Cathedral">
                      </div>
                      <div class="carousel-item">
                          <img src="images/germany/Potsdams palace.jpg" class="img-fluid"  alt="Potsdams palace">
                          <div class="carousel-caption text-lowercase text-capitalize">Potsdam palace</div>
                      </div>
                     
                   
                </div>
          </div>
      </div>
    
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left">Germany is an exciting mix of medieval castles, fairytale palaces, big city marvels and stunningly stirring scenery.There are 46 official UNESCO World Heritage Sites in Germany, 43 cultural and 3 natural, with one additional previous site struck from the list.
            </h2>
            
              
        </div>
      </div>
<div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-spain" value="View World Heritage Sites" onclick="window.location.href='country.php?name=germany';"> 
             </div>
    </div>
  </div>



 <!--FRANCE-->
<div id="france">
<div class="text-uppercase   my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">5. France<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="france" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               <div>
                   <div class="carousel-inner country mx-auto">
                      <div class="carousel-item active">
                         <img src="images/france/French Austral Lands and Seas 1.jpg" class="img-fluid"  alt="French Austral Lands and Seas">
                      </div> 

                      <div class="carousel-item ">
                         <img src="images/france/Paris, Banks of the Seine.jpg" class="img-fluid"  alt="Paris, Banks of the Seine">
                      </div> 

                     <div class="carousel-item">
                         <img src="images/france/La Reunion 1.jpg" class="img-fluid"  alt="La Reunion">
                      </div>
                      <div class="carousel-item">
                         <img src="images/france/Gulf of Porto.jpg" class="img-fluid"  alt="Gulf of Porto">
                      </div>
                      <div class="carousel-item">
                         <img src="images/france/Pont du Gard.jpg" class="img-fluid"  alt="Pont du Gard">
                      </div>

                     
                    </div>
                </div>
          </div>
      </div>
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left">Currently, 45 properties in France are inscribed on the World Heritage List. 39 of these are cultural properties, 5 are natural properties, and 1 is mixed.France may be fifth in the world when it comes to having the most UNESCO sites, but many of them fly under the visitors' radar. 
            </h2>
            
              
        </div>
      </div>
<div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-italy" value="View World Heritage Sites" onclick="window.location.href='country.php?name=france';"> 
             </div>
    </div>
  </div>

<!-- INDIA-->
  <div id="india">
    <div class="text-uppercase country-heading"  ><h1 class="text-center pb-5 font-weight-bold">6. India<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row my-1 ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="india" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               
                   <div class="carousel-inner country mx-auto">
                        <div class="carousel-item active">
                         <img src="images/india/Himalayan National Park.jpg" class="img-fluid"  alt="Himalayan National Park">
                      </div>


                       <div class="carousel-item ">
                          <img src="images/india/Taj Mahal.jpg" class="img-fluid"  alt="Taj Mahal">
                         
                      </div>
                      <div class="carousel-item">
                         <img src="images/india/Western-Ghats-monsoon.jpg" class="img-fluid"  alt="Western Ghats">
                      </div>

                      <div class="carousel-item">
                         <img src="images/india/Sundarbans National Park.jpg" class="img-fluid"  alt="Sundarbans National Park">
                      </div>

                      <div class="carousel-item">
                         <img src="images/india/Valley of Flowers.jpg" class="img-fluid"  alt="Valley of Flowers">
                      </div>
                      <div class="carousel-item">
                         <img src="images/india/Khajuraho.jpg" class="img-fluid"  alt="Khajuraho">
                      </div>
                     
                      
                      <div class="carousel-item">
                         <img src="images/india/Ellora Caves.jpg" class="img-fluid"  alt="Elora caves">
                      </div>
                    </div>
                   
                </div>
          </div>
          
      
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left india-text">India is home to several UNESCO World Heritage Sites; ranging from natural wonders to architectural marvels. While some are keepers of the magnificence of history, others are a safe and lush haven for biodiversity to flourish.India has now 38 World Heritage Sites, and that makes India with the 6th largest number of World Heritage Sites in the world! There are 30 cultural sites, 7 natural sites and 1 mixed as recognised by UNESCO.
            </h2>
            
             
        </div>
      </div>
 <div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-india" value="View World Heritage Sites" onclick="window.location.href='country.php?name=india';"> 
             </div>
    </div>
  </div>


<!-- MEXICO -->
  <div id="italy">
<div class="text-uppercase   my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">7. Mexico<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto"  >         <!-- COL 1-->

          <div id="italy" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               <div>
                   <div class="carousel-inner country mx-auto">

                    <div class="carousel-item active">
                         <img src="images/mexico/Sian Ka'an.jpg" class="img-fluid"  alt="Sian Ka'an ">
                      </div>

                      <div class="carousel-item">
                         <img src="images/mexico/Tehuacán-Cuicatlán Valley.jpg" class="img-fluid"  alt="Tehuacán-Cuicatlán Valley ">
                      </div>
                      <div class="carousel-item">
                         <img src="images/mexico/Archipiélago de Revillagigedo.jpg" class="img-fluid"  alt="Archipiélago de Revillagigedo ">
                      </div>

                      <div class="carousel-item">
                         <img src="images/mexico/Monarch Butterfly Reserve.jpg" class="img-fluid"  alt=" Monarch Butterfly Reserve">
                      </div>
                      

                      <div class="carousel-item">
                         <img src="images/mexico/Guanajuato City.jpg" class="img-fluid"  alt="Guanajuato City ">
                      </div>
                </div>
                   
                </div>
          </div>
      </div>
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left"> With an astounding diversity of natural and cultural heritage, Mexico is home to a total of 35 World Heritage Sites, including twenty-seven cultural sites, six natural sites and two mixed sites.The country ranks first in the Americas and seventh worldwide by number of Heritage sites.
            </h2>
            
             
        </div>
      </div>
 <div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-italy" value="View World Heritage Sites" onclick="window.location.href='country.php?name=mexico';"> 
             </div>
    </div>
  </div>


   <!--UK-->
<div id="UK">
<div class="text-uppercase   my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">8. UK<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="UK" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="false">
               <div>
                   <div class="carousel-inner country mx-auto">
                       <div class="carousel-item active">
                          <img src="images/UK/Stonehenge.jpg" class="img-fluid"  alt="Stonehenge">
                         
                      </div>
                      <div class="carousel-item">
                         <img src="images/UK/Dorset and East Devon Coast.jpg" class="img-fluid"  alt="Dorset and East Devon Coast">
                      </div>

                      <div class="carousel-item">
                         <img src="images/UK/Giant's Causeway and Causeway Coast.jpg" class="img-fluid"  alt="Giants Causeway and Causeway Coast">
                      </div>
                       <div class="carousel-item ">
                          <img src="images/UK/St Kilda.jpg" class="img-fluid"  alt="St Kilda">
                         
                      </div>
                    

                      <div class="carousel-item">
                         <img src="images/UK/Edinburgh Castle.jpg" class="img-fluid"  alt="Edinburgh Castle">
                      </div>
                        
                    </div>
                </div>
          </div>
      </div>
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left">From the historic city of Bath to the Jurassic Coast, Britain has breathtaking UNESCO World Heritage Sites of great beauty and historic importance.The United Kingdom of Great Britain and Northern Ireland has 27 cultural, 4 natural and 1 mixed sites in 2020. There are further 10 sites on the tentative list.
            </h2>
            
             
        </div>
      </div>
 <div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-italy" value="View World Heritage Sites" onclick="window.location.href='country.php?name=uk';"> 
             </div>
    </div>
  </div>


 <!--FRANCE-->
<div id="russia">
<div class="text-uppercase   my-5 pt-3 country-heading"  ><h1 class="text-center pb-5 font-weight-bold">9. Russia<hr class=" w-25 ml-auto"></h1> </div>
    
    <div class="row ">      <!-- ROW 1-->
      <div class=" col-lg-8 col-12 mr-lg-auto mx-auto" >         <!-- COL 1-->

          <div id="russia" class="carousel slide carousel-fade mr-auto pb-2 mx-auto" data-ride="carousel" data-interval="1000" data-pause="true">
               <div>
                   <div class="carousel-inner country mx-auto">
                       <div class="carousel-item active">
                          <img src="images/russia/Lake Baikal.jpg" class="img-fluid"  alt="Lake Baikal">
                         
                      </div>
                      <div class="carousel-item">
                         <img src="images/russia/Moscow Kremlin and Red Square.jpg" class="img-fluid"  alt="Moscow Kremlin and Red Square">
                      </div>
                       <div class="carousel-item">
                         <img src="images/russia/Volcanoes of Kamchatka.jpg" class="img-fluid"  alt="Volcanoes of Kamchatka">
                      </div>

                         <div class="carousel-item">
                         <img src="images/russia/Curonian Spit.jpg" class="img-fluid"  alt="Curonian Spit">
                      </div>
                       <div class="carousel-item">
                         <img src="images/russia/Lena Pillars.jpg" class="img-fluid"  alt="Lena Pillars">
                      </div>
                      
                      <div class="carousel-item">
                         <img src="images/russia/Kizhi Pogost.jpg" class="img-fluid"  alt="Kizhi Pogost">
                      </div>
                    </div>
                </div>
          </div>
      </div>
      <!-- COL 2-->
      <div class="col-lg-4 col-12" >
          <div class="div-country-text">
            <h2 class=" country-text text-left">From the world’s largest museum to its oldest and deepest lake, outrageously gilded palaces to elaborate timber monasteries, this country conjures up a special kind of magic. Currently, there are 29 World Heritage Sites in Russia, out of which 18 properties are cultural and 11 are natural. 24 more properties are on UNESCO's tentative list.
            </h2>
            
             
        </div>
      </div>
 <div class="w-100 text-center mt-5" >
              <input type="submit" class="visit-btn btn-italy" value="View World Heritage Sites" onclick="window.location.href='country.php?name=russia';"> 
             </div>
    </div>
  </div>
</div>


<!-- FOOTER -->
<footer id="footer">

<!-- ABOUT SITE -->
  <div class="footer-body">
    <div class="row mx-1">
          
      <div class="col-lg-6 col-md-4 col-12 footer-section">
          <h1 class="footer-heading">About the Site</h1>
            The website features Top 9 Countries ranked according to the no of World Heritage Sites. Each country features some of the best sites it is home to.This website is created just for educational purpose. I do not own any of the images used used while creating the website.
      </div>
<!--END OF ABOUT SITE -->


<!-- LINKS -->
    <div class="col-lg-3 col-md-3 col-6 footer-section">
       <h1 class="footer-heading">Quick Links</h1> 
            <div>
              <ul class="social-icons list-unstyled ">
                    <li class="d-block"> <a href="#top-nav" >Back to Top</a>  </li>
                    <li class="d-block"> <a href="favourite.php" >Favourites</a>  </li>

                    <br> <h2 class="footer-heading">Connect with me!</h2>

                    <li class="d-inline"><a class="facebook" href="https://www.facebook.com/profile.php?id=100008843023697"><i class="fa fa-facebook"></i></a></li>
                    <li class="d-inline"><a class="instagram" href="https://www.instagram.com/anand_nakat/"><i class="fa fa-instagram"></i></a></li>
                    <li class="d-inline"><a class="linkedin" href="https://www.linkedin.com/in/anand-nakat-ab4615155"><i class="fa fa-linkedin"></i></a></li>   
                  </ul>
            </div>
    </div>
<!--END OF LINKS -->


<!-- FEEDBACK FORM -->
    <div class="col-lg-3 col-md-5 col-6 footer-section">
          <h1 class="footer-heading">Feedback</h1> 
              Write to us your thoughts about this website or any suggestions!!
            <button type="button" class="btn btn-info p-3 d-block my-4 mx-auto"  data-toggle="modal" data-target="#myModal"><h1>Submit Feedback</h1></button>
          

            <!-- MODAL START -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header bg-dark">
                    <h4 class="modal-title text-white "><h2>Feedback Form</h2> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form >
                      <h2 class="text-dark">User Name</h2>
                      <input type="text" name="name" id="f-name"  class="w-100 text-capitalize" placeholder="Your Name" required 
                        value="<?php echo(htmlentities($_SESSION['user_name']) ) ;?>">
                      <br><br>
                      <h2 class="text-dark">Your Thoughts about the Website</h2> 
                      <textarea name="summary"  id="f-summary" rows="8" cols="40"  class="w-100" required autocomplete="off"></textarea>
                    </form>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info feedback-btn" data-dismiss="modal"><h2> Submit</h2></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <h2> Close</h2></button>
                  </div>

                </div>
              </div>
            </div>
            <!-- END OF MODAL -->
      </div>
      <!-- END OF FEDDBACK FORM -->
  </div>
</div>
<!-- END FOOTER BODY -->


<!-- FOOTER BOTTOM -->
<div class=" footer-bottom text-center col-12">
  &copy;world-heritage-sites.infinityfreeapp.com | Developed by Anand Nakat    
</div>
<!-- END OF FOOTER BOTTOM -->

</footer>

</body>

<script type="text/javascript">
  $(document).ready(function(){
  

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
            $('.carousel-head').css("margin-top", "-1rem");
            console.log('added:'+data);
          }
        });
      }

      else{
        $('.result').fadeOut();
        $('.carousel-head').css("margin-top", "0rem");
         $('.result').html(" ");
          
      }
  });
   $(document).on('click', '.search-list li', function() {
    $('#searchbox').val($(this).text());
    $('.search-list').fadeOut();
   }); 

$(".feedback-btn").click(function(event) {
var name= $("#f-name").val();
var summary= $("#f-summary").val();
console.log('name:'+name + 'summary:'+ summary);
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