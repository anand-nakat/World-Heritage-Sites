<?php
 function signup_insert_validate($salt,$conn)
 {

	if(strlen($_POST['new_password']) >= 1 && strlen($_POST['new_email']) >= 1 && strlen($_POST['new_username']) >= 1)
		{

			if(strlen($_POST['new_username']) < 3 )
				return "Name must be atleast 3 <br> characters long";

			if(strlen($_POST['new_password']) < 4 )
				return "Password must be atleast 4 <br> characters long";
			  
			  if (strpos($_POST['new_email'],'@') === false || ( (strlen($_POST['new_email']) -strpos($_POST['new_email'],'@')) < 3 )) 
					return "Invaild Email ID";
		            
		      
		      $pass = hash('md5', $salt.$_POST["new_password"]);
			  $stmt = $conn->prepare('INSERT INTO users (user_name,email,pwd,is_admin)
				  VALUES ( :u, :e, :p,0)');
			
			  $stmt->execute(array(
			  ':u' => $_POST['new_username'],
			  ':e' => $_POST['new_email'],
			  ':p' => $pass));
		}
	
		else
			return "all fields are required";
			
}

function login_validate($salt,$conn)
{

	if ( strlen($_POST['login_password']) >= 1 && strlen($_POST['login_email']) >= 1)
	{
		
                         
		$check = hash('md5', $salt.$_POST["login_password"]);
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :em AND pwd = :pw');
        $stmt->execute(array( ':em' => $_POST["login_email"], ':pw' => $check));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ( $row !== false ) 
             {
         		$_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                $_SESSION["login"]=true;
             }
             
              else
                  return "Incorrect password or email";
    }
    else
    	return "all fields are required";
		
}
?>