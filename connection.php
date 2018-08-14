<?php

$host_name = "localhost";
$database = "ontarget";
$username = "root";
$password = "";

try {
    $conn = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
//echo $database;

?>


<?php
/*
$host_name = "localhost";
$database = "ontarget"; // Change your database name
$username = "";          // Your database user id 
$password = "";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}*/
?>