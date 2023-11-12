<?php
require "../controller/homeController.php";

// query products
$products = query("SELECT * FROM products ORDER BY id DESC");

// melakukan pencarian
if (isset($_POST["search"])) {
  $products = search($_POST["keyword"]);

  if (empty($products)) {
    $error = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>App Name | Keranjang</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- css -->
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body class="p-0 m-0">
    <nav class="navbar bg-info bg-info bg-gradient navbar-expand-lg">
        <div class="container-fluid col-10">
          <a class="navbar-brand fw-bold text-light" href="#">App Name</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="col-8">
            <form class="d-flex" role="search" method="POST">
              <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit" name="search">Search</button>
            </form>
          </div>
          <div class="d-flex">
            <div class="dropdown">
              <a class="btn btn-none btn-outline-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= ucwords($_SESSION["row"]["name"]) ?>
              </a>

              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profil</a></li>
                <li><a class="dropdown-item" href="cart.php"><i class="bi bi-cart"></i> Keranjang</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-left-right"></i> Transaksi</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../controller/logoutController.php"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
              </ul>
            </div>
          </div>
        </div>
    </nav>

    <?php if (isset($error)) : ?>
      <div class="row">

        <div class="col text-center py-4">
          <p class="fs-5 fw-bold">Produk yang Anda maksud, tidak ditemukan.</p>
          <img class="img-fluid col-6" src="../public/img/asset/no_data.jpg">
        </div>
      </div>
    <?php endif; ?>

    <div class="cart-container">
        <div class="row justify-content-center px-3">
            <h4 class="border border-2 border-secondary bg-gradient border-top-0 border-start-0 border-end-0 py-4"><i class="bi bi-cart3"></i> Keranjang saya</h4>
            <div class="col-8 text-end my-3 border border-1 border-secondary p-2 rounded">
                <button type="button" class="btn btn-danger btn-sm rounded" id="delet_all" name="delete_all">Hapus semua</button>
                <div class="row border border-2 border-secondary border-start-0 border-end-0 border-top-0 mx-1 mt-1 mb-2 py-2">
                    <div class="col-6">
                        <div class="row px-2">
                            <div class="col-4">
                                <img src="../public/img/product/berasRambutan.jpg" class="border border-1 rounded img-fluid">
                            </div>
                            <div class="col text-start">
                                <p class="p-0 m-0 fs-6">Beras Rambutan 100 KG</p>
                                <p class="p-0 m-0 fw-bold">Rp100.000,00</p>
                                <div class="row align-items-center py-2">
                                    <div class="col">
                                        <input class="mt-2 border border-2 border-secondary rounded" type="number" style="width: 60px;" value="1">
                                    </div>
                                    <div class="col text-end">
                                        <button class="btn btn-danger btn-sm rounded" type="submit" id="delete" name="delete"><i class="bi bi-trash3-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border border-2 border-secondary border-start-0 border-end-0 border-top-0 mx-1 mt-1 mb-2 py-2">
                    <div class="col-6">
                        <div class="row px-2">
                            <div class="col-4">
                                <img src="../public/img/product/berasRambutan.jpg" class="border border-1 rounded img-fluid">
                            </div>
                            <div class="col text-start">
                                <p class="p-0 m-0 fs-6">Beras Rambutan 100 KG</p>
                                <p class="p-0 m-0 fw-bold">Rp100.000,00</p>
                                <div class="row align-items-center py-2">
                                    <div class="col">
                                        <input class="mt-2 border border-2 border-secondary rounded" type="number" style="width: 60px;" value="1">
                                    </div>
                                    <div class="col text-end">
                                        <button class="btn btn-danger btn-sm rounded" type="submit" id="delete" name="delete"><i class="bi bi-trash3-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="fw-bold fs-5"><span class="text-secondary">Total:</span> Rp500.000,00</p>
            </div>
        </div>
        <div class="d-grid gap-2 col-8 mx-auto my-4">
            <a href="checkout.php" class="btn btn-info bg-gradient text-light fw-semibold" type="button">Checkout</a>
        </div>
    </div>
    




    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>