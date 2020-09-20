<?php
 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("pdo.php");


if(isset($_POST['site_name']) && isset($_POST['country']) && isset($_POST['img_url']) && isset($_SESSION['user_id']))
{

//CHECK IF SITE ALREADY EXISTS ELSE ADD
$stmt1 = $conn->prepare('SELECT * FROM sites WHERE site_name =:place');
$stmt1->execute(array( ':place' => $_POST['site_name']));
$row = $stmt1->fetch(PDO::FETCH_ASSOC);
if($row !==false) 
	{
		echo "Site already exists!";
	}

else{
$stmt = $conn->prepare('INSERT INTO sites (country,div_id,site_info,site_name,img_url) VALUES ( :place1,:place2,:place3,:place4,:place5)');
$stmt->execute(array( ':place1' => $_POST['country'],':place2' => $_POST['div_id'],':place3' => $_POST['site_info'],':place4' => $_POST['site_name'],':place5' => $_POST['img_url']));
echo "Added to Database!";
}
}


?>