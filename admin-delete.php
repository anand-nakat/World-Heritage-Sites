<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require_once ("pdo.php");
 
if(isset($_POST['query']))
{
$stmt = $conn->prepare('DELETE FROM `sites` WHERE site_name= :place');
$stmt->execute(array( ':place' => $_POST['query']));
echo "Site Deleted!";
}


else{
	echo "Error";
}

?>