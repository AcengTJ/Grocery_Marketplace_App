<?php 
session_start();

// Login
if (isset($_SESSION["login"])) {
  header("LOCATION: index.php");
  exit;
}

require_once "dbConnection.php";
require_once "../class/User.php";

// Cek email dan password pada user db
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if ($email == "" && $password == "") {
    echo "<script>alert('Silahkan masukkan email dan password Anda.')</script>";
  } elseif ($email == "" || $password == "") {
    echo "<script>alert('Terdapat kesalahan, cek kembali.')</script>";
  }

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);

  // cek user
  if ($result->num_rows > 0) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    $passVerify = password_verify($password, $row["password"]);

    if ($passVerify) {
      // Set session
      $_SESSION["login"] = true;
      $_SESSION["row"] = $row;
      header("LOCATION: ../view/index.php");
      exit;
    }
  }

  $error = true;
}

?>