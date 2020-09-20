<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require_once ("pdo.php");
 
if(isset($_POST['query']))
{
$div_id=$_POST['query'];
$stmt = $conn->prepare('DELETE FROM `favourites` WHERE site_name= :place AND user_id=:uid');
$stmt->execute(array( ':place' => $div_id,':uid' => $_SESSION['user_id']));
// $stmt1 = $conn->prepare('UPDATE  sites set is_fav=0 WHERE div_id=:placedel');
// $stmt1->execute(array( ':placedel' => $div_id));
echo "Removed from Favourites!";
}




?>