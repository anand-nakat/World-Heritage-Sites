<?php
 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("pdo.php");
echo "Not";



if(isset($_POST['site_name']) && isset($_POST['country']) && isset($_POST['img_url']) && isset($_SESSION['user_id']))
{



$stmt = $conn->prepare('INSERT INTO sites (country,div_id,site_info,site_name,img_url) VALUES ( :place1,:place2,:place3,:place4,:place5)');
$stmt->execute(array( ':place1' => $_POST['country'],':place2' => $_POST['div_id'],':place3' => $_POST['site_info'],':place4' => $_POST['site_name'],':place5' => $_POST['img_url']));
// $stmt1 = $conn->prepare('UPDATE  sites set is_fav=1 WHERE div_id=:placedel');
// $stmt1->execute(array( ':placedel' => $div_id));
echo "Added to Favourites!";

}


?>