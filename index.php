<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM mobil ORDER BY id_mobil DESC LIMIT 3");

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
    <?php include("layouts/head.html") ?>
    <title>Dashboard Pembeli</title>
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <?php include("layouts/navbar.html"); ?>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <div class="container text-start d-flex" style="height: 80vh;">
            <div class="row align-items-center my-auto w-100">
                <div class="col">
                    <div style="max-width: 448px;">
                        <p class=" m-0 py-2"><span class="text-black fs-1 fw-bold font-family-Poppins">Selamat Datang <br />di
                            </span><span class="text-primary fs-1 fw-bold font-family-Poppins">SeconDrive</span></p>
                        <p class="text-black fs-6 fw-bold font-family-Poppins  m-0 py-2">Tempatnya jual beli mobil bekas terlengkap,
                            terjangkau, dan terpercaya</p>
                        <a style="max-width: 260px;" class="m-0 btn login" href="#Daftar-Mobil" role="button"><b>Lihat Selengkapnya</b></a>
                    </div>
                </div>
                <div class="col">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $isActive = true; ?>
                            <?php foreach ($mobilList as $mobil) : ?>
                                <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                                    <img src="<?= $mobil['gambar'] ?>" class="d-block w-100" alt="<?= $mobil['nama'] ?>" style="height: 50vh;">
                                </div>
                                <?php $isActive = false; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex">
            <a class="m-auto" href="#Daftar-Mobil">
                <svg width="103" height="25" viewBox="0 0 103 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 6L51.3333 18.813L96.6667 6" stroke="#0D12F1" stroke-width="11.3333" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <div class="container mt-5" id="Daftar-Mobil">
            <p class="text-center text-black fs-1 fw-bold font-family-Poppins  m-0 px-3 py-2">Daftar Mobil</p>
            <div class="d-flex gap-2">
                <div class="input-group mb-3" style="max-width: 357px;">
                    <select id="disabledSelect" class="form-select">
                        <option>Semarang</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Temukan Mobil" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2938 14.5697 18.0025 12.8204 18 11C18 7.133 14.867 4 11 4C7.133 4 4 7.133 4 11C4 14.867 7.133 18 11 18C12.8204 18.0025 14.5697 17.2938 15.875 16.025L16.025 15.875Z"
                                fill="#000CFF" />
                        </svg>
                    </span>
                </div>
            </div>


            <section class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($mobilList as $mobil) : ?>
                    <div class="col">
                        <div class="card w-100 rounded-lg my-5">
                            <div class="card-body">
                                <img class="bd-placeholder-img card-img-top" src="<?= $mobil['gambar'] ?>"
                                    style="max-height: 194px; object-fit: cover;" alt="">
                                <div class="row">
                                    <p class="text-black fs-3 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2"><?= $mobil["nama"] ?></p>
                                    <div class="col-12 row align-items-center">
                                        <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2 w-50">Merk : <?= $mobil["merek"] ?></p>
                                        <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-5 m-0 px-3 py-2 w-50">Tahun : <?= $mobil["tahun"] ?></p>
                                    </div>
                                    <p class="text-black fs-4 fw-bold font-family-Poppins col-12 m-0 px-3 py-2"><?= $mobil["harga"] ?></p>
                                    <p class="text-secondary fs-6 fw-semibold font-family-Poppins col-12 m-0 px-3 py-2">Lokasi : Semarang</p>
                                    <div class="d-flex justify-content-end align-items-end">
                                    <a href="detail-mobil.php?id=<?= $mobil["id_mobil"] ?>" class="text-dark text-decoration-none px-2 font-weight-bold">Lihat Detail -></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <!-- END MAIN -->
        </div>
    </div>


        <!-- FOOTER -->
        <?php include("layouts/footer.html") ?>
        <!-- END FOOTER -->


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>