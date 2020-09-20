<?php
 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("pdo.php");



if(isset($_POST['query']) && isset($_SESSION['user_id']))
{




$stmt = $conn->prepare('INSERT INTO favourites (site_name,user_id,country) VALUES ( :place,:uid,:cname)');
$stmt->execute(array( ':place' => $_POST['query'],':uid' => $_SESSION['user_id'],':cname' => $_POST['country_name']));
// $stmt1 = $conn->prepare('UPDATE  sites set is_fav=1 WHERE div_id=:placedel');
// $stmt1->execute(array( ':placedel' => $div_id));
echo "Added to Favourites!";
}



?>