<?php
ob_start();
session_start();
// session_destroy();

require('db/connect.php');
require 'lib/url.php';
require 'lib/data.php';
require 'lib/cart.php';
require 'lib/number.php';
require 'lib/product.php';
?>

<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = "./pages/{$page}.php";

require './inc/header.php';

if (file_exists($path)) {
    require "{$path}";
}

require './inc/footer.php';
