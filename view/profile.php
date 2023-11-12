<?php 
require "../controller/homeController.php";

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
    <title>App Name | Profile</title>
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
    <!-- Js -->
    <script src="../public/js/chart.js"></script>
    <!-- chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <!-- Profile Container -->
    <div class="row my-3 mx-4 rounded border border-2 border-secondary">
        <div class="col">
            <div class="row p-2 justify-content-center align-items-center">
                <div class="col-1">
                    <img src="../public/img/user/<?php echo $_SESSION["row"]["image"] ?>" class="border border-1 border-dark img-fluid rounded-circle">
                </div>
                <div class="col">
                    <p class="lh-1 fw-bold fs-4"><?= ucwords($_SESSION["row"]["name"]) ?></p>
                    <p class="lh-1 fw-semibold fs-6"><i class="bi bi-geo-alt-fill"></i> <?= ucwords($_SESSION["row"]["address"]) ?></p>
                </div>
                <div class="col">
                    <div class="row text-center">
                        <div class="col">
                            <p class="p-0 m-0 fw-bold"><i class="bi bi-box-seam-fill"></i> 900</p>
                            <p class="p-0 m-0 fw-semibold text-muted">Transaksi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-3">
        <!-- Profile List Container -->
        <div class="col-3 ">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="" class="fw-semibold link-none text-decoration-none text-dark">Ubah Profil</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="" class="fw-semibold link-none text-decoration-none text-dark">Riwayat Transaksi</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="" class="fw-semibold link-none text-decoration-none text-dark">Pesanan Saya</a>
                </li>
            </ul>
        </div>
        <!-- Chart Container -->
        <div class="col">
            <div class="card-body" style="height: 50vh">
              <p class="fw-bold fs-5">Grafik Transaksi Tahun <span class="text-danger"><?= date('Y'); ?></span></p>
              <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <script type="text/javascript">
      const ctx = document.getElementById("myChart");

      const labels = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
      ];

      const data = {
        labels: labels,
        datasets: [
          {
            label: "Transaksi",
            backgroundColor: "rgb(255, 99, 132)",
            borderColor: "rgb(255, 99, 132)",
            data: [0, 10, 2, 5, 20, 30, 45],
          },
        ],
      };

      const config = {
        type: "bar",
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animations: {
              tension: {
                duration: 1000,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
              }
            },
            scales: {
              y: { // defining min and max so hiding the dataset does not change scale range
                min: 0,
                max: 100
              }
            },
        },
      };

      var myChart = new Chart(
        document.getElementById("myChart"), 
        config
      );
    </script>
  </body>
</html>
