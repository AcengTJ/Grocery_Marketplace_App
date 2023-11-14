<?php 
require "commonController.php";
require "../class/User.php";
require "dbConnection.php";


function edit($data) {
    global $conn;
    
    $user = new User;
    $user->setId($data["id"]);
    $user->setName(htmlspecialchars(strtolower(stripslashes($data["name"]))));
    $user->setAddress(htmlspecialchars(strtolower($data["address"])));
    $user->setPhone(htmlspecialchars($data["phone"]));
    $user->setImage(upload());
    $user->setGender($data["gender"]);
    $user->setProvince(htmlspecialchars($data["province"]));
    $user->setCity(htmlspecialchars($data["city"]));
    $user->setPostalCode(htmlspecialchars($data["postal_code"]));

    $id = $user->getId();
    $name = $user->getName();
    $address = $user->getAddress();
    $phone = $user->getPhone();
    $gender = $user->getGender();
    $province = $user->getProvince();
    $city = $user->getCity();
    $postal_code = $user->getPostalCode();
    
    // Tanggal update
    $updated_at = date('Y-m-d h:i:s');

    // upload gambar
    $image = $user->getImage();
    if (!$image) {
        return false;
    }

    // Query database
    $query = "UPDATE users SET
                name = '$name',
                image = '$image',
                address = '$address',
                phone = '$phone',
                gender = '$gender',
                province = '$province',
                city = '$city',
                postal_code = '$postal_code',
                updated_at = '$updated_at'
            WHERE id = $id";

    // Update user ke database
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>