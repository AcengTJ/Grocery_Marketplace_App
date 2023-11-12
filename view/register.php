<?php 
require "../controller/registerController.php";

if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "<script>alert('Pendaftaran akun berhasil.')</script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>App Name | Daftar</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <link href="../public/css/signin.css" rel="stylesheet">

    <script src="../public/js/script.js"></script>
  </head>
  <body class="bg-light">
    
    <main class="col-5 m-auto">
      <div class="bg-info p-5 rounded">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-bold text-light">Daftar Akun</h1>

            <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama anda">
            </div>

            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control rounded" placeholder="email@example.com">
            </div>

            <label class="form-label" for="password">Kata sandi<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control rounded" placeholder="Password">
            </div>

            <label class="form-label" for="password2">Konfirmasi Password<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="password" name="password2" class="form-control rounded" placeholder="Konfirmasi password">
            </div>

            <label class="form-label" for="address">Alamat<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="text" name="address" class="form-control rounded" placeholder="Alamat anda">
            </div>

            <label class="form-label" for="phone">Telepon<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control rounded" placeholder="Telepon" onkeypress="return numberOnly(event);">
            </div>

            <label class="form-label" for="image">Gambar<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage()">
            </div>
            <div class="col-12 mb-3">
              <img class="img-preview img-fluid">
            </div>
            <button class="w-100 btn btn-lg btn-primary text-white fw-semibold" name="submit" type="submit">Daftar</button>
            <p class="text-center">Sudah punya akun ? <a href="login.php">Login</a></p>
        </form>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>