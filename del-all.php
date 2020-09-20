<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require_once ("pdo.php");
 

$stmt = $conn->prepare('DELETE FROM `favourites` WHERE user_id=:uid');
$stmt->execute(array( ':uid' => $_SESSION['user_id']));
// $stmt1 = $conn->prepare('UPDATE  sites set is_fav=0 WHERE div_id=:placedel');
// $stmt1->execute(array( ':placedel' => $div_id));
echo "Removed from Favourites!";





?>