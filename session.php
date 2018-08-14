<?php
    //Start session
    session_start();

    //Connection Database
    include("connection.php");
	
	//$error = "";

    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $pass = $_POST["password"];
		//$pass = md5($password);

        try
        {
				
				
           $stmt = $conn->prepare("SELECT * FROM staff WHERE email=:umail AND password=:upass LIMIT 1");
           $stmt->execute(array(':umail'=>$email, ':upass'=>$pass));
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
		   
		   
				
				
           if($stmt->rowCount() > 0)
           {
               $_SESSION['session'] = $row['email'];
             $_SESSION['name'] = $row['name'];
              $_SESSION['role'] = $row['role'];

			   
			   $email = $_SESSION["session"];
				$sql = "UPDATE staff SET last_login = now() WHERE email = :email";
                $stmt = $conn->prepare($sql);
				$stmt->bindParam(":email", $email);
			    $stmt->execute();
           } else {
               //header("Location: home.php");
			   echo '<script type="text/javascript">alert("Username and/or Password incorrect");</script>';
           }
        }
        catch(PDOException $e)
        {
           //echo $e->getMessage();
		  echo "Username and password is incorrect!";	
        }
    }
	/*else {
		
		
	}*/

			if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
				// last request was more than 15 minutes ago
				session_unset();     // unset $_SESSION variable for the run-time 
				session_destroy();   // destroy session data in storage
			}
		
			$_SESSION['LAST_ACTIVITY'] = time();
		
			if(!isset($login_session)){
              // mysql_close($connection); // Closing Connection
				//header("Location: index"); // Redirecting To Home Page
			}
		
			//echo "Hello world!<br>";

?>