<?php
require_once "homeController.php";

// Ambil data di URL
$productId = $_GET["id"];

$product = query("SELECT * FROM products WHERE id = $productId")[0];

?>