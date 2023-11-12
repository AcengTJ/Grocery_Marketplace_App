<?php 
require "../controller/detailController.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>App Name | Detail</title>
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
    <nav class="navbar bg-info navbar-expand-lg">
        <div class="container-fluid col-10">
          <a class="navbar-brand fw-bold text-light" href="index.php">App Name</a>
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

    <div class="content">
      <div class="row my-5 mx-3">
        <div class="col-4">
          <img src="../public/img/product/<?= $product["image"] ?>" class="img-thumbnail" alt="...">
        </div>
        <div class="col">
          <p class="fw-bold fs-4 p-0 m-0"><?= $product["name"] ?></p>
          <div class="row">
            <div class="col">
              <p class="fw-bold fs-3 p-0 m-0">Rp <?= number_format($product["price"], 2,",", ".") ?></p>
            </div>
            <div class="col">
              <button type="button" class="btn btn-info text-light btn-md" data-bs-toggle="modal" data-bs-target="#order-modal">Pesan Sekarang</button>
            </div>
          </div>

          <div class="mt-2 detail border border-top-0 border-end-0 border-start-0 border-2 border-dark">
            <p class="fw-semibold fs-5 p-0 m-0 pb-2">Detail</p>
          </div>
          <div class="detail-content px-2 py-2">
            <p class="lh-1 fw-semibold text-primary"><span class="text-secondary">Etalase:</span> <?= $product["category"] ?></p>
            <p class="lh-1 fw-semibold"><span class="text-secondary">Merk:</span> <?= $product["brand"] ?></p> 
            <p class="lh-1 fw-semibold"><span class="text-secondary">Berat Massa:</span> <?= $product["mass"] ?> <span><?= strtoupper($product["density"]) ?></span></p>
            <p class="lh-1 fw-semibold"><span class="text-secondary">Stok:</span> <?= $product["stock"] ?></p>
            <p class="fw-semibold"><i class="bi bi-geo-alt-fill"></i> <?= ucwords("JL. Merdeka No. 118") ?></p>
          </div>

          <div class="px-2 user-store border border-start-0 border-end-0">
            <div class="row justify-content-center align-items-center">
              <div class="col-1 my-2 text-center">
                <img src="../public/img/user/653187d7e3aa5_FlowchartDiagram1.png" class="border border-3 border-dark img-fluid rounded-circle">
              </div>

              <div class="col">
                <div class="row justify-content-center align-items-center">
                  <div class="col py-2">
                    <p class="p-0 m-0 fs-6 fw-bold">Test Store</p>
                    <p class="p-0 m-0 fs-6"><i class="bi bi-box2-fill"></i> 92 total barang</p>
                  </div>
  
                  <div class="col text-end">
                    <a href="#" class="btn btn-info text-light btn-sm">Kunjungi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="order-modal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pemesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <div class="mb-3">
                <label for="qty" class="form-label">Jumlah Pesan<span class="text-danger">*</span></label>
                <div class="input-group">
                  <input type="number" name="qty" class="form-control" value="1">
                </div>
                <!-- <p class="text-danger p-0 m-0"><span class="text-danger">*</span>Jumlah pesan maksimal 2 item.</p> -->
              </div>
              <div class="mb-3">
                <div class="col-sm">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Alamat Tujuan</h5>
                      <p class="card-text"><?= ucwords($_SESSION["row"]["address"]) ?></p>
                      <a href="#" class="btn btn-primary">Ubah</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="mb-3">
              <label for="note" class="form-label">Catatan<span class="text-danger">*</span></label>
                <div class="input-group">
                  <textarea class="form-control" name="note" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3">
              <p class="text-end fw-bold fs-4"><span class="text-secondary">Total:</span> Rp200.000,00</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-info text-light">Masukkan Keranjang</button>
          </div>
        </div>
      </div>
    </div>






    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>