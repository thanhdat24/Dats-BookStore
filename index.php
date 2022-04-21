<?php
ob_start();
session_start();
// session_destroy();
//data
require 'data/popularBook.php';
require('db/connect.php');
// lib
require 'lib/url.php';
require 'lib/data.php';
require 'lib/cart.php';
require 'lib/template.php';
require 'lib/users.php';
require 'lib/number.php';
require 'lib/product.php';
?>

<?php

$act = isset($_GET['action']) ? $_GET['action'] : 'index';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = "./pages/{$page}/{$act}.php";

// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
// $path = "./pages/{$page}.php";

// require './inc/header.php';

if (file_exists($path)) {
    require "{$path}";
}

// require './inc/footer.php';
