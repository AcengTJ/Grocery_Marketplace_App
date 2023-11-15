<?php 
require "../controller/homeController.php";
require "../controller/profileController.php";

// Cari user yang sedang login
$userId = $_GET['id'];
$user = query("SELECT * FROM users WHERE id = $userId")[0];

// melakukan pencarian
if (isset($_POST["search"])) {
  $products = search($_POST["keyword"]);

  if (empty($products)) {
    $error = true;
  }
}

if (isset($_POST["saveChanges"])) {
  deleteImage($_POST["oldImage"]);
  if (edit($_POST) > 0) {
    echo "<script>alert('Ubah data akun berhasil.')</script>";
    header("LOCATION: profile.php?id=$userId");
  } else {
    echo mysqli_error($conn);
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
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="../public/css/style.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Js -->
    <script src="../public/js/script.js"></script>
    <script src="../public/js/chart.js"></script>
    <!-- chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body class="p-0 m-0">
    <nav class="navbar bg-info bg-info bg-gradient navbar-expand-lg">
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

    <!-- Profile Container -->
    <div class="row my-3 mx-4 rounded border border-2 border-secondary">
        <div class="col">
            <div class="row p-2 justify-content-center align-items-center">
                <div class="col-1 overflow-hidden">
                    <img src="../public/img/user/<?= $user["image"]; ?>" class="border border-1 border-dark rounded-circle" width="70" height="70">
                </div>
                <div class="col">
                    <p class="lh-1 fw-bold fs-4"><?= ucwords($user["name"]); ?></p>
                    <p class="lh-1 fw-semibold fs-6"><i class="bi bi-geo-alt-fill"></i> <?= ucwords($user["address"]) ?></p>
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
                    <button type="button" class="fw-semibold border-0 bg-white text-dark" data-bs-toggle="modal" data-bs-target="#editUserModal">Ubah Profil</button>
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
        <div class="col-9 scrollspy-example-2  mx-auto" data-bs-spy="scroll" data-bs-smooth-scroll="true">
          <p class="fw-bold fs-5">Grafik Transaksi Tahun <span id="year" name="year" style="color: rgb(255, 99, 132);"><?= date('Y'); ?></span></p>
            <div class="col card-body" style="height: 50vh">
              <canvas id="myChart"></canvas>
            </div>

            <div class="d-flex justify-content-center align-items-start flex-column p-2 pb-4 p-md-4">
                <div>
                  <p class="mb-2 fw-bold">Tahun Transaksi</p>
                </div>
                <select class="text-center px-5 py-2 border-0 shadow rounded overflow-auto" name="yearpicker" id="yearpicker">
                </select>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="editUserModal" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ubah Data Diri</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="col-6 text-center mb-2">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                <input type="hidden" name="oldImage" value="<?= $user['image']; ?>">

                <div class="border boder-1 text-center mb-1">
                  <img src="../public/img/user/<?= $user['image']; ?>" class="img-fluid rounded img-preview">
                </div>

                <input id="image" type="file" name="image" class="d-none" onchange="previewImage()" value="<?= $user['image']; ?>">
                <label for="image" class="col-12 btn bg-info text-white p-1 text-center rounded">Pilih foto</label>
              </div>

              <label for="basic-url" class="form-label text-muted fw-semibold">Nama</label>
              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" maxlength="50" autocomplete="off" value="<?= ucwords($user['name']); ?>">
              </div>

              <label for="basic-url" class="form-label text-muted fw-semibold">Kelamin</label>
              <select class="form-select mb-3" name="gender" aria-label="Default select example">
                <?php if ($user['gender'] == "laki-laki") :?> 
                  <option selected value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                <?php else:?>
                  <option value="laki-laki">Laki-laki</option>
                  <option selected value="perempuan">Perempuan</option>
                <?php endif; ?>
              </select>
  
              <label for="basic-url" class="form-label text-muted fw-semibold">Alamat</label>
              <div class="input-group mb-3">
                <input type="text" name="address" class="form-control" maxlength="50" autocomplete="off" value="<?= ucwords($user['address']); ?>">
              </div>
  
              <label for="basic-url" class="form-label text-muted fw-semibold">Provinsi</label>
              <div class="input-group mb-3">
                <input type="text" name="province" class="form-control" autocomplete="off" value="<?= ucwords($user['province']); ?>">
              </div>
  
              <label for="basic-url" class="form-label text-muted fw-semibold">Kota</label>
              <div class="input-group mb-3">
                <input type="text" name="city" class="form-control" autocomplete="off" value="<?= ucwords($user['city']); ?>">
              </div>
  
              <label for="basic-url" class="form-label text-muted fw-semibold">Kode Pos</label>
              <div class="input-group mb-3">
                <input type="text" name="postal_code" class="form-control" maxlength="5" size="5" autocomplete="off" onkeypress="return numberOnly(event);" value="<?= $user['postal_code']; ?>">
              </div>
  
              <label for="basic-url" class="form-label text-muted fw-semibold">Telepon</label>
              <div class="input-group mb-3">
                <input type="text" name="phone" class="form-control" maxlength="14" autocomplete="off" value="<?= ucwords($user['phone']); ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-info text-white" name="saveChanges">Simpan</button>
            </div>
          </div>
        </form>
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
