<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore"; 


// $severname = "mysql8001.site4now.net";
// $username = "a85ef7_books";
// $password = "Dat24032001";
// $dbname = "db_a85ef7_books";

$con = mysqli_connect($severname,$username,$password,$dbname);
$con->set_charset('utf8mb4');

// Check connection
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  die();
}
