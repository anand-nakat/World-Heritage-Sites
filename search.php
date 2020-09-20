<?php

require_once ("pdo.php");
$term=$_POST['query'];
$stmt = $conn->prepare('SELECT site_name,country,div_id FROM sites WHERE site_name LIKE :prefix LIMIT 5');
$stmt->execute(array( ':prefix' => $term."%"));
$output='<ul class="list-unstyled">';
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row!==false) 
	{
		while($row) 
		{
			$output .= '<li><a href="country.php?name='.$row['country']."#".$row['div_id'].' ">'.$row["site_name"].'</li>' ;
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}

else
	$output.= '<li>Site Not Found</li>';
	

	$output.= '</ul>';
	echo $output;
		



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div>
<a href=" "> </a>


</body>
</html>