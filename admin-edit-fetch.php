
<?php
require_once ("pdo.php");
$site_name=$_POST['site_name'];
$stmt = $conn->prepare('SELECT * FROM sites WHERE site_name =:place');
$stmt->execute(array( ':place' => $site_name));

$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($row!==false) 
	{
		
		$return_arr[] = array("country" => $row[0]['country'],
                    "site_name" => $row[0]['site_name'],
                    "div_id" => $row[0]['div_id'],
                    "site_info" =>$row[0]['site_info'],
                	"img_url" => $row[0]['img_url']);
		echo json_encode($return_arr);
	}

else
	echo "Site Not Found";
		
?>