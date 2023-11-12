<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("LOCATION: login.php");
  exit;
}

require_once('../class/Product.php');
require_once('dbConnection.php');

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function search($keyword) {
  $query = "SELECT * FROM products
              WHERE
            name LIKE '%$keyword%'";

  return query($query);
}


?>