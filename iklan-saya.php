<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$query = "SELECT * FROM mobil WHERE id_user = " . $_SESSION['id'] . " ORDER BY id_mobil DESC";
$result = mysqli_query($conn, $query);

$mobilList = [];
while ($mobil = mysqli_fetch_assoc($result)) {
  $query = "SELECT * FROM gambar_mobil WHERE id_mobil = " . $mobil['id_mobil'] . " LIMIT 1;";
  $imgMobil = mysqli_query($conn, $query);
  $img = mysqli_fetch_assoc($imgMobil);

  // Jika tidak ada gambar, gunakan gambar default
  $gambar = $img ? $img['gambar'] : 'path/to/default-image.jpg'; // Ganti dengan path gambar default

  $mobilList[] = [
    'id_mobil' => $mobil['id_mobil'],
    'nama' => $mobil['nama_mobil'],
    'merek' => $mobil['merek'],
    'tahun' => $mobil['tahun'],
    'harga' => $mobil['harga'],
    'gambar' => $gambar
  ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  $active = 'iklan';
  include("layouts/head.html") ?>
  <title>Dashboard Pembeli</title>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <?php include("layouts/navbar.html"); ?>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="height: 76vh;">
      <?php foreach ($mobilList as $mobil) : ?>
        <div class="col">
          <div class="card w-100 rounded-lg my-5">
            <div class="card-body">
              <img class="bd-placeholder-img card-img-top" src="<?= $mobil['gambar'] ?>"
                style="height: 230px; object-fit: cover;" alt="">
              <div class="row">
                <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2"><?= $mobil["nama"] ?></p>
                <div class="col-12 row align-items-center">
                  <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2 w-50">Merk : <?= $mobil["merek"] ?></p>
                  <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2 w-50">Tahun : <?= $mobil["tahun"] ?></p>
                </div>
                <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2"><?= $mobil["harga"] ?></p>
                <div class="d-flex justify-content-end align-items-end">
                  <a href="detail-mobil.php?id=<?= $mobil["id_mobil"] ?>" class="text-dark text-decoration-none px-2 font-weight-bold">Lihat Detail -></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col">
        <div class="card card w-100 rounded-lg my-5">
          <div class="card-body">
            <a href="tambah-mobil.php">
              <div class="px-1 py-1 bg-white rounded-3 border border-1 border-primary col-10 align-items-center d-flex mx-auto" style="height: 315px;">
                <svg class="m-auto" width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.5 33.5H62.8333M33.6667 4.33333V62.6667" stroke="#000CFF" stroke-width="8"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </a>
            <a href="tambah-mobil.php" class="btn btn-primary py-2 col-10 d-flex mx-auto justify-content-center mt-5" style="background-color: #000CFF !important;">Pasang Iklan
            </a>
          </div>
        </div>
      </div>

    </section>
    <!-- END MAIN -->
  </div>
  </div>


  <!-- FOOTER -->
  <?php include("layouts/footer.html") ?>
  <!-- END FOOTER -->

</body>

</html>