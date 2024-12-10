<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM mobil WHERE id_mobil = $id;";
$result = mysqli_query($conn, $query);
$mobil = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
  if (editMobil($_POST) > 0) {
    echo "<script>
        alert('Mobil berhasil diedit')
        document.location.href = 'iklan-saya.php';
        </script>";
  } elseif (editMobil($_POST) == 0) {
    echo "<script>
    alert('Mobil tidak diedit')
    document.location.href = 'iklan-saya.php';
    </script>";

  } else {
    echo "<script>
        alert('Gagal mengedit mobil')
        </script>";
  }
}

if(isset($_POST["hapus"])) {
  $query = "DELETE FROM mobil WHERE id_mobil = '$id'";
  mysqli_query($conn, $query);
  $query = "DELETE FROM gambar_mobil WHERE id_mobil = '$id'";
  mysqli_query($conn, $query);
  echo "<script>
        alert('Mobil Berhasil Dihapus')
        document.location.href = 'iklan-saya.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $active = 'iklan';
  include("layouts/head.html") ?>
  <title>Edit Mobil</title>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <?php include("layouts/navbar.html") ?>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <div>
      <h2 class="text-center py-3">Edit Mobil</h2>
      <form action="" method="post">
      <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="status">
            <option value="tersedia" <?php if($mobil['status'] == 'tersedia') echo "selected" ?>>Tersedia</option>
            <option value="tidak tersedia" <?php if($mobil['status'] == 'tidak tersedia') echo "selected" ?>>Tidak Tersedia</option>
          </select>
        </div>
    </div>


    <h3>Berikan detail mobil</h3>
    <div class="d-flex">
      <div class="w-50 mr-2">
          <div class="form-group">
            <label for="merek">Merek <span class="text-danger">*</span></label>
            <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="merek" value="<?= $mobil['merek'] ?>">
          </div>
          <div class="form-group">
            <label for="jarak">Jarak Tempuh <span class="text-danger">*</span></label>
            <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="jarak" value="<?= $mobil['jarak'] ?>">
          </div>
          <div class="form-group">
            <label for="warna">Warna <span class="text-danger">*</span></label>
            <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="warna" value="<?= $mobil['warna'] ?>">
          </div>
          <div class="form-group">
            <label for="kapasitas">Kapasitas Mesin <span class="text-danger">*</span></label>
            <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="kapasitas" value="<?= $mobil['kapasitas'] ?>">
          </div>
      </div>
      <div class="w-50 ml-2">
        <div class="form-group">
          <label for="tahun">Tahun Rakit <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tahun" value="<?= $mobil['tahun'] ?>">
        </div>
        <div class="form-group">
          <label for="bahan-bakar">Bahan Bakar <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="bahan-bakar">
            <option value="Bensin" <?php if($mobil['bahan_bakar'] == 'Bensin') echo "selected" ?>>Bensin</option>
            <option value="Diesel" <?php if($mobil['bahan_bakar'] == 'Diesel') echo "selected" ?>>Diesel</option>
            <option value="Listrik" <?php if($mobil['bahan_bakar'] == 'Listrik') echo "selected" ?>>Listrik</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipe-mobil">Tipe Mobil <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tipe-mobil">
            <option value="SUV" <?php if($mobil['tipe'] == 'SUV') echo "selected" ?>>SUV</option>
            <option value="MPV" <?php if($mobil['tipe'] == 'MPv') echo "selected" ?>>MPV</option>
            <option value="Sedan" <?php if($mobil['tipe'] == 'Sedan') echo "selected" ?>>Sedan</option>
            <option value="HatchBack" <?php if($mobil['tipe'] == 'HatchBack') echo "selected" ?>>HatchBack</option>
            <option value="Coupe" <?php if($mobil['tipe'] == 'Coupe') echo "selected" ?>>Coupe</option>
            <option value="Convertible" <?php if($mobil['tipe'] == 'Convertible') echo "selected" ?>>Convertible</option>
            <option value="Pickup" <?php if($mobil['tipe'] == 'Pickup') echo "selected" ?>>Pickup</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipe-tranmisi">Tipe Transmisi <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tipe-transmisi">
            <option value="Manual" <?php if($mobil['transmisi'] == 'Manual') echo "selected" ?>>Manual</option>
            <option value="Automatic" <?php if($mobil['transmisi'] == 'Automatic') echo "selected" ?>>Automatic</option>
          </select>
        </div>
      </div>
    </div>
    <h3>Berikan Judul dan Deskripsi</h3>
    <div class="form-group">
      <label for="nama">Judul <span class="text-danger">*</span></label>
      <input type="text" value="<?= $mobil['nama_mobil'] ?>" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="nama">
      <p class="font-weight-medium" style="font-size: 14px; opacity: 60%;">Sebutkan fitur utama dari mobil Anda (misal merek, model, umur, jenis)</p>
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <input type="text" value="<?= $mobil['deskripsi'] ?>" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9; height: 120px;" name="deskripsi">
      <p class="font-weight-medium" style="font-size: 14px; opacity: 60%;">Sertakan kondisi, fitur, dan alasan penjualan</p>
    </div>
    <h3>Tentukan Harga</h3>
    <div class="form-group">
      <label for="harga">Harga <span class="text-danger">*</span></label>
      <input type="text" value="<?= $mobil['harga'] ?>" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="harga" placeholder="Masukkan Harga Mobil">
    </div>
    <div class="d-flex justify-content-center pt-5">
      <button name="submit" type="submit" class="btn btn-primary w-50 rounded-lg font-weight-bolder">Simpan</button>
    </div>
    <div class="d-flex justify-content-center pt-3 pb-5">
      <button name="hapus" type="submit" class="btn btn-danger w-50 rounded-lg font-weight-bolder">Hapus Mobil</button>
    </div>
    </form>
  </div>
  <!-- END MAIN -->
  </div>


  <!-- FOOTER -->
  <?php include("layouts/footer.html") ?>
  <!-- END FOOTER -->

</body>

</html>