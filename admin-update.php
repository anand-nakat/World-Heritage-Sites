<?php
 if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once ("pdo.php");
 

if(isset($_POST['query']))
{

                $sql = "UPDATE sites SET country = :place1,
                        site_name = :place2, div_id = :place3,site_info = :place4,img_url = :place5 
                        WHERE site_name = :place6";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ':place1' => $_POST['country'],
                    ':place2' => $_POST['site_name'],
                    ':place3' => $_POST['div_id'],
                    ':place4' => $_POST['site_info'],
                    ':place5' => $_POST['img_url'],
                    ':place6' => $_POST['query']));
            echo "Site Updated";

}
else{
	echo "Missing Name";
}

?>