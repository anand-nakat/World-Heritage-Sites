<?php

require_once ("pdo.php");
$term=$_POST['query'];
$stmt = $conn->prepare('SELECT site_name,country,div_id FROM sites WHERE site_name LIKE :prefix LIMIT 7');
$stmt->execute(array( ':prefix' => $term."%"));
$output='<ul class="list-unstyled">';
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row!==false) 
	{
		while($row) 
		{
			$output .= '<li>'.$row["site_name"].'</li>' ;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}

else
	$output.= '<li>Site Not Found</li>';
	

	$output.= '</ul>';
	echo $output;
		



?>
