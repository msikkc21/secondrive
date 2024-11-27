<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if( isset($_POST["submit"]) ) {
    
    if(tambahMobil($_POST) > 0){
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
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between border-bottom border-primary">
            <a class="navbar-brand" href="#">
                <img src="assets/Logo1.webp" width="150" height="30" class="d-inline-block align-top" alt="logo">
            </a>
            <div class="navbar-nav d-flex flex-row">
                <a class="mx-3 nav-item nav-link active" href="#">Dashboard <span class="sr-only">(current)</span></a>
                <a class="mx-3 nav-item nav-link" href="daftar-mobil.php">Daftar Mobil</a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Iklan Saya</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="pembeli.php" class="ml-3">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5625 30.625C6.5625 30.625 4.375 30.625 4.375 28.4375C4.375 26.25 6.5625 19.6875 17.5 19.6875C28.4375 19.6875 30.625 26.25 30.625 28.4375C30.625 30.625 28.4375 30.625 28.4375 30.625H6.5625ZM17.5 17.5C19.2405 17.5 20.9097 16.8086 22.1404 15.5779C23.3711 14.3472 24.0625 12.678 24.0625 10.9375C24.0625 9.19702 23.3711 7.52782 22.1404 6.29711C20.9097 5.0664 19.2405 4.375 17.5 4.375C15.7595 4.375 14.0903 5.0664 12.8596 6.29711C11.6289 7.52782 10.9375 9.19702 10.9375 10.9375C10.9375 12.678 11.6289 14.3472 12.8596 15.5779C14.0903 16.8086 15.7595 17.5 17.5 17.5Z" fill="black" />
                    </svg>
                </a>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <div>
            <h2 class="text-center py-3">Tambah Mobil</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Unggah foto iklan</h3>
                <div class="d-flex">
                    <div class="form-group mr-2">
                        <label for="gambar1">Gambar 1 <span class="text-danger">*</span></label>
                        <input type="file" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9; height: 43px;" name="gambar1">
                    </div>
                    <div class="form-group mx-2">
                        <label for="gambar2">Gambar 2</label>
                        <input type="file" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9; height: 43px;" name="gambar2">
                    </div>
                    <div class="form-group ml-2">
                        <label for="gambar3">Gambar 3</label>
                        <input type="file" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9; height: 43px;" name="gambar3">
                    </div>
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
                    <input type="text" class="form-control border border-primary rounded-lg" style="background-color: #D9D9D9;" name="harga" value="Rp ">
                </div>
                <div class="d-flex justify-content-center py-5">
                    <button name="submit" type="submit" class="btn btn-primary w-50 rounded-lg font-weight-bolder">Tambahkan Mobil</button>
                </div>
            </form>
        </div>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <footer class="text-center" style="background-color: #000769;">
        <!-- Grid container -->
        <div class="container pt-4 ">
            <!-- Section: Navbar -->
            <section class="navbar-nav mb-4 d-flex flex-row justify-content-center">
                <a class="mx-3 nav-item nav-link" href="index.php">Dashboard</a>
                <a class="mx-3 nav-item nav-link" href="daftar-mobil.php">Daftar Mobil</a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Iklan Saya</a>
            </section>
            <!-- Section: Navbar -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #00043D ; color: #000CFF ;">
            All Rights Reserved • Copyright SeconDrive 2024 in Semarang
        </div>
        <!-- Copyright -->
    </footer>
    <!-- END FOOTER -->

</body>

</html>