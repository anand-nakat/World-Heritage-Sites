<?php
 
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("pdo.php");



if(isset($_POST['name']) && isset($_POST['summary']))
{

	if(strlen($_POST['name']) <1 || strlen($_POST['summary']) < 1)
	{
		echo "Please fill both sdfields";
	}
		else
		{
		$stmt = $conn->prepare('INSERT INTO feedback (user_name,user_id,views) VALUES ( :name,:uid,:summary)');
		$stmt->execute(array( ':name' => $_POST['name'],':uid' => $_SESSION['user_id'],':summary' => $_POST['summary']));
		echo "Feedback Submitted!";
		}

}



?>