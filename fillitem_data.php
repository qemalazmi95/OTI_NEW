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




    //echo " entering Update!";
    if( isset($_POST["code_item"])  && isset($_POST["name_item"]) && isset($_POST["quantity"]) && isset($_POST["price"]) && isset($_POST["description"]) )
    {
    	
       
        $ID_item = $_POST["code_item"]; 
        $name_item  = $_POST["name_item"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $description = $_POST["description"];
 
        try
        {
            $sql = "INSERT INTO inventory (ID_item, name_item, quantity, price,  description)
                VALUES (:ID_item, :name_item, :quantity, :price,  :description)";
            $stmt = $conn->prepare($sql);
			$stmt->bindParam(":ID_item", $ID_item);
			$stmt->bindParam(":name_item", $name_item);
			$stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":price", $price);
			$stmt->bindParam(":description", $description);
            $stmt->execute();

            echo "Sucessfully!";
        }
        catch(PDOException $e)
        {
            echo "ERROR : ".$e->getMessage();
        }
		$email = $_SESSION["session"];
		  
		   $sql3 = "INSERT INTO audit_trail (action, module,ipaddress, table_change, updated_time, email)
					 VALUES ('INSERT STOCK', 'INVENTORY', '$mac', 'inventory', NOW(),'$email')";
 
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

header("Location: listitem.php");
?>