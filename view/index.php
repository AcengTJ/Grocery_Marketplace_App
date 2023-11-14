<?php 
require "../controller/homeController.php";

// date_default_timezone_set('Asia/Jakarta');
// $currentDate = date('d-m-Y h:i:s');

// $lastWeek = date('d-m-Y h:i:s', strtotime('-7 days', strtotime($currentDate)));


// query products
$products = query("SELECT * FROM products ORDER BY id DESC");

// latest product
$latest_products = query("SELECT * FROM products ORDER BY id DESC LIMIT 10");

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
    <title>App Name | Home</title>
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
                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person-circle"></i> Profil</a></li>
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
    
    <div id="carouselExampleIndicators" class="my-3 mx-4 carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../public/img/ads/ads_1.jpg" class="d-block h-100 w-100 img-fluid">
          </div>
          <div class="carousel-item">
            <img src="../public/img/ads/ads_2.jpg" class="d-block h-100 w-100 img-fluid">
          </div>
          <div class="carousel-item">
            <img src="../public/img/ads/ads_3.jpg" class="d-block h-100 w-100 img-fluid">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="mt-5 mx-4">
      <h1 class="fw-bold">Produk Terbaru</h1>
    </div>
    <div class="row">
      <?php foreach ($latest_products as $product) : ?>
        <div class="col-2 mx-2">
          <a class="btn btn-card" href="detail.php?id=<?= $product["id"] ?>">
            <div class="card mx-2 shadow-sm bg-body rounded" style="width: 12rem; height:17rem;">
              <div class="text-center">
                <img src="../public/img/product/<?= $product["image"] ?>" class="img-fluid card-img-top p-3" style="width: 10rem;">
              </div>
              <div class="card-body text-start">
                <p class="fst-normal fs-6 lh-1"><?= $product["name"] ?></p>
                <p class="card-text fw-bold lh-1 fs-5">Rp<?= number_format($product["price"], 2, ',', '.') ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    
    <div class="mt-3 mx-4">
      <h1 class="fw-bold">Semua Produk</h1>
    </div>
    <div class="row">
      <?php foreach ($products as $product) : ?>
        <div class="col-2 mx-2">
          <a class="btn btn-card" href="detail.php?id=<?= $product["id"] ?>">
            <div class="card mx-2 shadow-sm bg-body rounded" style="width: 12rem; height:17rem;">
              <div class="text-center">
                <img src="../public/img/product/<?= $product["image"] ?>" class="img-fluid card-img-top p-3" style="width: 10rem;">
              </div>
              <div class="card-body text-start">
                <p class="fst-normal fs-6 lh-1"><?= $product["name"] ?></p>
                <p class="card-text fw-bold lh-1 fs-5">Rp<?= number_format($product["price"], 2, ',', '.') ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>




    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
