<?php
// Connecting to the database
 include("connection.php");
include("session.php");
  if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }
date_default_timezone_set('Asia/Kuala_Lumpur');



echo $_POST["code_item"]."<br>";
echo $_POST["name_item"]."<br>";
echo $_POST["quantity"]."<br>";
echo $_POST["price"]."<br>";
echo $_POST["description"]."<br>";
 


    if(isset($_POST["code_item"]) && isset($_POST["name_item"]) && isset($_POST["quantity"]) && isset($_POST["price"]) && isset($_POST["description"])){
        
        $ID_item = $_POST["code_item"]; 
        $name_item  = $_POST["name_item"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        

      $sql = "UPDATE inventory SET name_item = '$name_item', quantity = '$quantity', price = '$price',  description = '$description' WHERE ID_item = '$ID_item'";
      
      $query = $conn->prepare( $sql );
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
    


header('Location: edit_fillitem.php');



?>