<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$jumlahGambar = 0;

if (isset($_POST["submit"])) {

  $id_mobil = tambahMobil($_POST);
  // Jika penambahan mobil berhasil
  if ($id_mobil > 0) {
    // Panggil fungsi upload gambar dan kirimkan ID mobil
    upload($_FILES['gambar'], $id_mobil);
    // Hitung jumlah gambar yang sudah diupload
    $jumlahGambar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gambar_mobil WHERE id_mobil = $id_mobil"));
    echo "<script>
        alert('Mobil berhasil ditambahkan')
        </script>";
  } else {
    echo "<script>
        alert('Gagal menambahkan mobil')
        </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("layouts/head.html") ?>
  <title>Tambah Mobil</title>
  <style>
    .preview-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      margin: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <?php include("layouts/navbar.html") ?>
    <!-- END NAVBAR -->

    <!-- MAIN -->
    <div>
      <h2 class="text-center py-3">Tambah Mobil</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <h3>Unggah foto iklan</h3>
        <input type="file" name="gambar[]" multiple id="file-input" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;">
        <div id="preview-container" class="d-flex flex-wrap mt-3"></div>
        <?php if ($jumlahGambar > 0): ?>
          <p>Jumlah gambar yang telah diupload: <?php echo $jumlahGambar; ?></p>
        <?php endif; ?>
    </div>


    <h3>Berikan detail mobil</h3>
    <div class="d-flex">
      <div class="w-50 mr-2">
        <div class="form-group">
          <label for="merek">Merek <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="merek"
            placeholder="Masukkan merek mobil">
        </div>
        <div class="form-group">
          <label for="jarak">Jarak Tempuh <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="jarak"
            placeholder="Masukkan jarak tempuh mobil">
        </div>
        <div class="form-group">
          <label for="warna">Warna <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="warna"
            placeholder="Masukkan warna mobil">
        </div>
        <div class="form-group">
          <label for="kapasitas">Kapasitas Mesin <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="kapasitas"
            placeholder="Masukkan kapasitas mesin mobil">
        </div>
      </div>
      <div class="w-50 ml-2">
        <div class="form-group">
          <label for="tahun">Tahun Rakit <span class="text-danger">*</span></label>
          <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tahun"
            placeholder="Masukkan tahun rakit mobil">
        </div>
        <div class="form-group">
          <label for="bahan-bakar">Bahan Bakar <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="bahan-bakar">
            <option value="Bensin">Bensin</option>
            <option value="Diesel">Diesel</option>
            <option value="Listrik">Listrik</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipe-mobil">Tipe Mobil <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tipe-mobil">
            <option value="SUV">SUV</option>
            <option value="MPV">MPV</option>
            <option value="Sedan">Sedan</option>
            <option value="HatchBack">HatchBack</option>
            <option value="Coupe">Coupe</option>
            <option value="Convertible">Convertible</option>
            <option value="Pickup">Pickup</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tipe-tranmisi">Tipe Transmisi <span class="text-danger">*</span></label>
          <select class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="tipe-transmisi">
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
          </select>
        </div>
      </div>
    </div>
    <h3>Berikan Judul dan Deskripsi</h3>
    <div class="form-group">
      <label for="nama">Judul <span class="text-danger">*</span></label>
      <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="nama">
      <p class="font-weight-medium" style="font-size: 14px; opacity: 60%;">Sebutkan fitur utama dari mobil Anda (misal merek, model, umur, jenis)</p>
    </div>
    <div class="form-group">
      <label for="deskripsi">Deskripsi</label>
      <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9; height: 120px;" name="deskripsi">
      <p class="font-weight-medium" style="font-size: 14px; opacity: 60%;">Sertakan kondisi, fitur, dan alasan penjualan</p>
    </div>
    <h3>Tentukan Harga</h3>
    <div class="form-group">
      <label for="harga">Harga <span class="text-danger">*</span></label>
      <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="harga" placeholder="Masukkan Harga Mobil">
    </div>
    <div class="d-flex justify-content-center py-5">
      <button name="submit" type="submit" class="btn btn-primary w-50 rounded-lg font-weight-bolder">Tambahkan Mobil</button>
    </div>
    </form>
  </div>
  <!-- END MAIN -->
  </div>


  <!-- FOOTER -->
  <?php include("layouts/footer.html") ?>
  <!-- END FOOTER -->

  <script>
    const fileInput = document.getElementById('file-input');
    const previewContainer = document.getElementById('preview-container');

    fileInput.addEventListener('change', (e) => {
      const files = e.target.files;
      // Clear previous previews
      const currentImages = previewContainer.querySelectorAll('img');
      const currentImageCount = currentImages.length;

      // Loop through selected files
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = (e) => {
          // Create an image element for each file
          const img = document.createElement('img');
          img.src = e.target.result;
          img.className = 'preview-img';
          previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });
  </script>
</body>

</html>