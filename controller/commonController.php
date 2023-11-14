<?php
require "dbConnection.php";

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

function deleteImage($data) {
    $imageName = str_replace("'", "", $data);
    $path = '../public/img/user/'.$imageName;
    if (is_file($path)) {
        unlink($path);
    }
}

?>