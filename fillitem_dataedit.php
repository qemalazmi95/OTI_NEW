<?php
//Connection Database
include("connection.php");
 include("session.php");
  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

echo $_POST["code_item"]."<br>";
echo $_POST["name_item"]."<br>";
echo $_POST["quantity"]."<br>";
echo $_POST["price"]."<br>";
echo $_POST["description"]."<br>";



       

              if(isset($_POST["code_item"]) && isset($_POST["name_item"])  && isset($_POST["quantity"]) && isset($_POST["price"]) && isset($_POST["description"]))
            {
                $ID_item = $_POST["code_item"]; 
                $name_item  = $_POST["name_item"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $description = $_POST["description"];
				
       
            try
            {
				$ID_item = $_POST["code_item"]; 
                $name_item  = $_POST["name_item"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $description = $_POST["description"];
				
             
              $sql = "UPDATE incident SET ID_item = :ID_item, name_item = :name_item, quantity = :quantity, price = :price, description = :description WHERE ID_item = :ID_item";
                   
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":ID_item", $ID_item);
                $stmt->bindParam(":name_item", $name_item);				
                $stmt->bindParam(":quantity", $quantity);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":description", $description);               
                $stmt->execute();

               
            }
            catch(PDOException $e)
            {
                echo "ERROR : ".$e->getMessage();
            }
			$email = $_SESSION["session"];
		  
		   $sql3 = "INSERT INTO audit_trail (action, module,ipaddress, table_change, updated_time, email)
					 VALUES ('UPDATE INVENTORY', 'INVONTORY', '$mac', 'inventory', NOW(),'$email')";
 
		  $query = $conn->prepare( $sql3 );
		  if ($query == false) {
		   print_r($conn->errorInfo());
		   die ('Error Prepare');
		  }
		  $sth = $query->execute();
		  if ($sth == false) {
		   print_r($query->errorInfo());
		   die ('Error Execute');
		  }
        }
        else
        {
            try
            {
				$ID_item = $_POST["code_item"]; 
                $name_item  = $_POST["name_item"];
                $quantity = $_POST["quantity"];
                $price = $_POST["price"];
                $description = $_POST["description"];
                
				$sql = "UPDATE incident SET ID_item = :ID_item, name_item = :name_item, quantity = :quantity, price = :price, description = :description WHERE ID_item = :ID_item";
                $stmt = $conn->prepare($sql);                
                $stmt->bindParam(":ID_item", $ID_item);
                $stmt->bindParam(":name_item", $name_item);				
                $stmt->bindParam(":quantity", $quantity);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":description", $description);               
                $stmt->execute();
             
            }
            catch(PDOException $e)
            {
                echo "ERROR : ".$e->getMessage();
            }
        }
		$email = $_SESSION["session"];
		  
		   $sql3 = "INSERT INTO audit_trail (action, module,ipaddress, table_change, updated_time, email)
					 VALUES ('UPDATE INCIDENT', 'INCIDENT', '$mac', 'incident', NOW(),'$email')";
 
		  $query = $conn->prepare( $sql3 );
		  if ($query == false) {
		   print_r($conn->errorInfo());
		   die ('Error Prepare');
		  }
		  $sth = $query->execute();
		  if ($sth == false) {
		   print_r($query->errorInfo());
		   die ('Error Execute');
		  }

    
    else
    {
        echo "DATA NULL!";
    }

header("Location: listitem.php");

?>