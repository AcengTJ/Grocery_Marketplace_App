<?php 
require "dbConnection.php";

function register($data) {
    global $conn;

    $name = strtolower(stripslashes($data["name"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $address = strtolower($data["address"]);
    $phone = $data["phone"];
    
    // upload gambar
    $image = upload();
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

function upload() {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek gambar
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu.')</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['png', 'jpg', 'jpeg'];
    $ekstensiGambar = explode('.', $fileName);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang Anda upload bukan gambar')</script>";
        return false;
    }

    if ($fileSize > 4500000) {
        echo "<script>alert('Ukuran gambar harus dibawah 4MB')</script>";
        return false;   
    }

    // upload gambar
    $newFileName = uniqid().'_'. $fileName;
    move_uploaded_file($tmpName, '../public/img/user/'. $newFileName);

    return $newFileName;
}

?>