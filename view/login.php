<?php
require "../controller/loginController.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>App Name | Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <link href="../public/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center bg-light">
    
    <main class="col-4 m-auto">
      <div class="bg-info p-5 rounded">
        <?php if (isset($error)) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Kesalahan!</strong> Cek email dan password Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-bold text-light">Login</h1>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control rounded" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control rounded" placeholder="Password">
                <label for="floatingPassword">Kata sandi</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary text-white fw-semibold" name="submit" type="submit">Masuk</button>
            <p>Belum punya akun ? <a href="register.php">Daftar</a></p>
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

