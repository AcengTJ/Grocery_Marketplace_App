<?php 
require "dbConnection.php";
require "../class/User.php";
require "commonController.php";

function register($data) {
    global $conn;

    $user = new User;
    $user->setName(strtolower(stripslashes($data["name"])));
    $user->setEmail($data["email"]);
    $user->setPassword(mysqli_real_escape_string($conn, $data["password"]));
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $user->setAddress(strtolower($data["address"]));
    $user->setPhone($data["phone"]);
    $user->setImage(upload());

    $email = $user->getEmail();
    $name = $user->getName();
    $password = $user->getPassword();
    $address = $user->getAddress();
    $phone = $user->getPhone();
    
    // upload gambar
    $image = $user->getImage();
    if (!$image) {
        return false;
    }

    // cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email Anda sudah terdaftar.')</script>";
        return false;
    }

    // cek konfirmasi password
    if ($password != $password2) {
        echo "<script>alert('Password tidak sesuai!')</script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambah user ke database
    mysqli_query($conn, "INSERT INTO users (name, email, password, address, phone, image) VALUES ('$name', '$email', '$password', '$address', '$phone', '$image')");

    return mysqli_affected_rows($conn);
}


?>