<?php
$con = mysqli_connect("localhost", "root", "", "quanlydathang");

// Check connection
if ($con->connect_errno) {
  echo "Failed to connect to MySQL: " . $con->connect_error;
  die();
}
