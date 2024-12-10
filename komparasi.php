<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$query = "SELECT * FROM mobil";
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
    'nama_mobil' => $mobil['nama_mobil'],
    'merek' => $mobil['merek'],
    'tahun' => $mobil['tahun'],
    'harga' => $mobil['harga'],
    'gambar' => $gambar
  ];
}

if (isset($_POST['compareCars'])) {
  $mobil1 = $_POST['mobil1'];
  $mobil2 = $_POST['mobil2'];

  $query = "SELECT * FROM mobil WHERE id_mobil = " . $mobil1 . ";";
  $result = mysqli_query($conn, $query);
  $mobil1 = mysqli_fetch_assoc($result);
  
  $query = "SELECT * FROM mobil WHERE id_mobil = " . $mobil2 . ";";
  $result = mysqli_query($conn, $query);
  $mobil2 = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  $active = 'komparasi';
  include("layouts/head.html") ?>
  <title>Komparasi</title>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <?php include("layouts/navbar.html"); ?>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <div class="container mt-5" id="Iklan-Saya">
      <p class="text-center text-black fs-1 fw-bold font-family-Poppins  m-0 px-3 py-2">Komparasi</p>
      <p class="text-center text-black fs-3 fw-bold font-family-Poppins  m-0 px-3 py-2">SeconDrive Perbandingan Mobil</p>
      <p class="text-center text-black fs-5 font-family-Poppins  m-0 px-3 py-2">Bingung Mobil apa yang harus dibeli? Manfaatkan komparasi Mobil baru di SeconDrive untuk membandingkan Mobil-Mobil bekas. Bandingkan 2 Mobil dengan beberapa parameter untuk menemukan pilihan yang tepat bagi Anda.
      </p>
    </div>

    <div class="container mt-5">
      <h2 class="text-center">Komparasi Mobil</h2>


      <!-- Card Preview -->
      <div class="row col-8 mx-auto my-4">
        <div class="col-md-6">
          <div class="card" id="card1">
            <div class="card-body mx-auto">
              <h5 class="card-title text-center" id="cardTitle1">Mobil 1</h5>
              <img id="cardImage1" src="assets/default-img.png" alt="Gambar Mobil 1" class="img-fluid" style="height: 230px; object-fit: cover; ">
            </div>
            <button class="btn btn-primary m-4" id="openModal1">Pilih Mobil</button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card" id="card2">
            <div class="card-body mx-auto">
              <h5 class="card-title text-center" id="cardTitle2">Mobil 2</h5>
              <img id="cardImage2" src="assets/default-img.png" alt="Gambar Mobil 2" class="img-fluid" style="height: 230px; object-fit: cover; ">
            </div>
            <button class="btn btn-primary m-4" id="openModal2">Pilih Mobil</button>
          </div>
        </div>
      </div>
    </div>

    <section>
      <form action="" method="post">
        <input type="hidden" name="mobil1" id="mobil1">
        <input type="hidden" name="mobil2" id="mobil2">
        <button id="compareCars" name="compareCars" class="btn btn-primary py-2 col-3 my-3 d-flex mx-auto justify-content-center">Bandingkan</button>
      </form>
      <?php if(isset($_POST['compareCars'])) { ?>
      <div class="container mt-5">
        <h2 class="text-center mb-4"><?= $mobil1["nama_mobil"] ." vs ".$mobil2["nama_mobil"] ?></h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th colspan="2" class="py-4">Komparasi Spesifikasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th colspan="2" class="text-center py-3">Merek</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["merek"] ?></td>
              <td class="text-center py-3"><?= $mobil2["merek"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Jenis</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["tipe"] ?></td>
              <td class="text-center py-3"><?= $mobil2["tipe"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Bahan Bakar</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["bahan_bakar"] ?></td>
              <td class="text-center py-3"><?= $mobil2["bahan_bakar"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Kapasitas Mesin</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["kapasitas"] ?> CC</td>
              <td class="text-center py-3"><?= $mobil2["kapasitas"] ?> CC</td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Transmisi</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["transmisi"] ?></td>
              <td class="text-center py-3"><?= $mobil2["transmisi"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Tahun</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["tahun"] ?></td>
              <td class="text-center py-3"><?= $mobil2["tahun"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Warna</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["warna"] ?></td>
              <td class="text-center py-3"><?= $mobil2["warna"] ?></td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Jarak Tempuh</th>
            </tr>
            <tr>
              <td class="text-center py-3"><?= $mobil1["jarak"] ?> Km</td>
              <td class="text-center py-3"><?= $mobil2["jarak"] ?> Km</td>
            </tr>
            <tr>
              <th colspan="2" class="text-center py-3">Harga</th>
            </tr>
            <tr>
              <td class="text-center py-3">Rp <?= $mobil1["harga"] ?></td>
              <td class="text-center py-3">Rp <?= $mobil2["harga"] ?></td>
            </tr>
          </tbody>
        </table>
        <?php } ?>
    </section>

    <!-- Modal untuk Mobil 1 -->
    <div class="modal fade" id="mobilModal1" tabindex="-1" aria-labelledby="mobilModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mobilModalLabel1">Pilih Mobil 1</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <?php foreach ($mobilList as $mobil): ?>
                <div class="col-4 mb-3">
                  <div class="card">
                    <img src="<?php echo $mobil['gambar']; ?>" height="150px" class="card-img-top" alt="<?php echo $mobil['nama_mobil']; ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $mobil['nama_mobil']; ?></h5>
                      <button class="btn btn-primary select-mobil"
                        data-nama="<?php echo $mobil['nama_mobil']; ?>"
                        data-gambar="<?php echo $mobil['gambar']; ?>"
                        data-id="<?php echo $mobil['id_mobil']; ?>"
                        data-target="1">Pilih</button>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal untuk Mobil 2 -->
    <div class="modal fade" id="mobilModal2" tabindex="-1" aria-labelledby="mobilModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mobilModalLabel2">Pilih Mobil 2</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <?php foreach ($mobilList as $mobil): ?>
                <div class="col-4 mb-3">
                  <div class="card">
                    <img src="<?php echo $mobil['gambar']; ?>" height="150px" class="card-img-top" alt="<?php echo $mobil['nama_mobil']; ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $mobil['nama_mobil']; ?></h5>
                      <button class="btn btn-primary select-mobil"
                        data-nama="<?php echo $mobil['nama_mobil']; ?>"
                        data-gambar="<?php echo $mobil['gambar']; ?>"
                        data-id="<?php echo $mobil['id_mobil']; ?>"
                        data-target="2">Pilih</button>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- END MAIN -->
  </div>

  <!-- FOOTER -->
  <?php include("layouts/footer.html") ?>
  <!-- END FOOTER -->

  <script>
    // Menampilkan modal untuk Mobil 1
    const modal1 = new bootstrap.Modal(document.getElementById('mobilModal1'));
    document.getElementById('openModal1').onclick = function() {
      modal1.show();
    }

    // Menampilkan modal untuk Mobil 2
    const modal2 = new bootstrap.Modal(document.getElementById('mobilModal2'));
    document.getElementById('openModal2').onclick = function() {
      modal2.show();
    }

    // Menangani pemilihan mobil
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('select-mobil')) {
        const idMobil = event.target.getAttribute('data-id');
        const nama = event.target.getAttribute('data-nama');
        const gambar = event.target.getAttribute('data-gambar');
        const target = event.target.getAttribute('data-target');

        // Update card preview sesuai dengan mobil yang dipilih
        if (target === "1") {
          document.getElementById('cardTitle1').innerText = nama;
          document.getElementById('cardImage1').src = gambar;
          const mobil1 = document.getElementById('mobil1').setAttribute('value', idMobil);

          modal1.hide();
        } else if (target === "2") {
          document.getElementById('cardTitle2').innerText = nama;
          document.getElementById('cardImage2').src = gambar;
          const mobil2 = document.getElementById('mobil2').setAttribute('value', idMobil);
          modal2.hide();
        }
      }
    });
  </script>

</body>

</html>