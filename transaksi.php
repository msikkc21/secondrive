<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM mobil WHERE id_mobil = " . $id . ";");
$mobil = mysqli_fetch_assoc($result);

$query = "SELECT * FROM gambar_mobil WHERE id_mobil = " . $id . " LIMIT 1;";
$imgMobil = mysqli_query($conn, $query);
$img = mysqli_fetch_assoc($imgMobil);

$query = "SELECT * FROM users WHERE id_user = " . $mobil['id_user'] . ";";
$penjual = mysqli_query($conn, $query);
$penjual = mysqli_fetch_assoc($penjual);

$query = "SELECT * FROM users WHERE id_user = " . $_SESSION['id'] . ";";
$pembeli = mysqli_query($conn, $query);
$pembeli = mysqli_fetch_assoc($pembeli);

function transaksi($data) {
  global $conn, $mobil, $penjual, $pembeli;
  $harga_akhir = number_format($data['hargaAkhir'],0,",",".");
  $jenis = $data['jenis'];
  $query = "INSERT INTO transaksi VALUES ('', " . $mobil['id_mobil'] . ", " . $penjual['id_user'] . ", " . $pembeli['id_user'] . ", '" . $harga_akhir . "', '" . $jenis . "');";
  mysqli_query($conn, $query);
  
  $result = mysqli_query($conn, "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1;");
  $row = mysqli_fetch_assoc($result);
  
  $gambar = uploadBukti();
  $query = "INSERT INTO gambar_bukti VALUES ('', ".$row['id_transaksi'].", '$gambar');";
  mysqli_query($conn, $query);

  
  $query = "UPDATE mobil SET status = 'tidak tersedia' WHERE id_mobil = ".$mobil['id_mobil'].";";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

if (isset($_POST["konfirmasi"])) {

    if (transaksi($_POST) > 0) {
      echo "<script>
          alert('Konfirmasi Berhasil!');
          window.location = 'index.php';
          </script>";
    } else {
      echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("layouts/head.html") ?>
  <title>Transaksi</title>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->

    <?php
    $active = 'daftar-mobil';
    include("layouts/navbar.html");
    ?>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <div class="container">
      <h1 class="fw-bold text-center my-5">Konfirmasi Transaksi</h1>
      <img class="w-50 rounded rounded-lg d-flex mx-auto shadow" src=<?= $img['gambar'] ?> alt="gambar mobil">
      <form action="" method="post" enctype="multipart/form-data" class="my-5 w-75 mx-auto">
        <div class="form-group">
          <label for="mobil" class="fw-bold fs-5 ml-2">Mobil</label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" id="mobil" name="mobil" value=<?= $mobil['nama_mobil'] ?> disabled>
        </div>
        <div class="form-group">
          <label for="penjual" class="fw-bold fs-5 ml-2">Nama Penjual</label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" id="penjual" name="penjual" value=<?= $penjual['nama'] ?> disabled>
        </div>
        <div class="form-group">
          <label for="pembeli" class="fw-bold fs-5 ml-2">Nama Pembeli</label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" id="pembeli" name="pembeli" value=<?= $pembeli['nama'] ?> disabled>
        </div>
        <div class="form-group">
          <label for="hargaAwal" class="fw-bold fs-5 ml-2">Harga Awal</label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" id="hargaAwal" name="hargaAwal" value="RP <?= $mobil['harga'] ?>" disabled>
        </div>
        <div class="form-group">
          <label for="hargaAkhir" class="fw-bold fs-5 ml-2">Harga Akhir</label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #EBEBEB;" id="hargaAkhir" name="hargaAkhir" placeholder="Masukkan Harga Akhir">
        </div>
        <div class="form-group">
          <label for="jenis" class="fw-bold fs-5 ml-2">Jenis Transaksi</label>
          <select name="jenis" id="jenis" class="form-control border border-primary rounded-lg" style="background-color: #EBEBEB;">
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
          </select>
        </div>
        <div class="form-group">
          <label for="bukti" class="fw-bold fs-5 ml-2">Upload Bukti Transaksi <span class="fw-normal fs-6">(maks 5mb)</span></label>
          <input type="file" class="form-control border border-primary rounded-lg" style="background-color: #EBEBEB;" id="bukti" name="bukti">
        </div>
        <div class="form-group">
          <button type="submit" name="konfirmasi" class="btn btn-primary d-flex justify-content-center mx-auto col-5 my-5">Konfirmasi</button>
        </div>
      </form>
    </div>



    <!-- END MAIN -->
  </div>
  </div>


  <!-- FOOTER -->
  <?php include("layouts/footer.html") ?>
  <!-- END FOOTER -->

</body>

</html>