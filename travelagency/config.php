<?php

$conn = mysqli_connect('localhost', 'root', '' , 'user_db');
$con_obj = new mysqli('localhost', 'root', '' , 'user_db');
//$query=($conn,)



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

try {

  $conns = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conns->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die();
}
?>