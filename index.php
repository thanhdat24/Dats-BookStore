<?php
ob_start();
session_start();

//data
require 'data/popularBook.php';
require('db/connect.php');

// lib
require 'library/url.php';
require 'library/data.php';
require 'library/cart.php';
require 'library/template.php';
require 'library/users.php';
require 'library/number.php';
require 'library/product.php';
?>

<?php

$act = isset($_GET['action']) ? $_GET['action'] : 'index';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = "./pages/{$page}/{$act}.php";

if (file_exists($path)) {
    require "{$path}";
} else {
    require "./include/404.php";
}
