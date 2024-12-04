<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id_mobil = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM mobil WHERE id_mobil = " . $id_mobil . ";");
$mobil = mysqli_fetch_assoc($result);

$query = "SELECT * FROM gambar_mobil WHERE id_mobil = " . $id_mobil . ";";
$imgMobil = mysqli_query($conn, $query);

$query = "SELECT nama FROM users WHERE id_user = " . $mobil['id_user'] . ";";
$result = mysqli_query($conn, $query);
$penjual = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
    <title>Dashboard Pembeli</title>
    <style>
        .carousel-item img {
            height: 75vh;
            /* Atur tinggi yang diinginkan */
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
            width: 100%;
            /* Agar gambar memenuhi lebar carousel */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <?php include("layouts/navbar.html") ?>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <div class="container">
            <!-- Carousel -->
            <div id="carouselExampleIndicators" class="carousel slide mx-auto my-3" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-inner">
                    <?php $isActive = true; ?>
                <?php while ($img = mysqli_fetch_assoc($imgMobil)) : ?>
                    <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                        <img src="<?= $img['gambar'] ?>" class="d-block w-100" alt="<?= $img['gambar'] ?>" style="max-height: 75vh;">
                    </div>
                    <?php $isActive = false; ?>
                <?php endwhile; ?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel End -->

            <section class="d-flex">
                <div class="mr-4 w-75">
                    <div class="px-2 py-4" style="background-color: #D8DFE0;">
                        <h2 class="font-weight-bold pl-2 mb-3" style="font-size: 42px;"><?= $mobil["nama_mobil"] ?></h2>
                        <div class="d-flex">
                            <div class="d-flex px-2 align-items-center" style="border-style: solid; border-width: 0px 2px 0px 0px;">
                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 21H13M2 8H12M12 21V3C12 2.46957 11.7893 1.96086 11.4142 1.58579C11.0391 1.21071 10.5304 1 10 1H4C3.46957 1 2.96086 1.21071 2.58579 1.58579C2.21071 1.96086 2 2.46957 2 3V21M12 12H14C14.5304 12 15.0391 12.2107 15.4142 12.5858C15.7893 12.9609 16 13.4696 16 14V16C16 16.5304 16.2107 17.0391 16.5858 17.4142C16.9609 17.7893 17.4696 18 18 18C18.5304 18 19.0391 17.7893 19.4142 17.4142C19.7893 17.0391 20 16.5304 20 16V8.83C20.0002 8.56609 19.9482 8.30474 19.8469 8.06103C19.7457 7.81732 19.5972 7.59606 19.41 7.41L16 4" stroke="#535353" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <p class="ml-2 text-uppercase my-auto" style="font-size: 18px; color: #535353;"><?= $mobil["bahan_bakar"] ?></p>
                            </div>
                            <div class="d-flex px-2 align-items-center" style="border-style: solid; border-width: 0px 2px 0px 0px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 14L16 10M3.34 19C2.46222 17.4798 2.00007 15.7554 2 14C1.99993 12.2445 2.46195 10.52 3.33962 8.99979C4.21729 7.47954 5.47967 6.21711 6.99989 5.33938C8.52011 4.46166 10.2446 3.99957 12 3.99957C13.7554 3.99957 15.4799 4.46166 17.0001 5.33938C18.5203 6.21711 19.7827 7.47954 20.6604 8.99979C21.538 10.52 22.0001 12.2445 22 14C21.9999 15.7554 21.5378 17.4798 20.66 19" stroke="#535353" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <p class="ml-2 text-uppercase my-auto" style="font-size: 18px; color: #535353;"><?= $mobil["jarak"] ?> KM</p>
                            </div>
                            <div class="d-flex px-2 align-items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4M12 20C9.87827 20 7.84344 19.1571 6.34315 17.6569C4.84285 16.1566 4 14.1217 4 12M12 20V22M12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12M12 4V2M4 12H2M14 12C14 12.5304 13.7893 13.0391 13.4142 13.4142C13.0391 13.7893 12.5304 14 12 14C11.4696 14 10.9609 13.7893 10.5858 13.4142C10.2107 13.0391 10 12.5304 10 12C10 11.4696 10.2107 10.9609 10.5858 10.5858C10.9609 10.2107 11.4696 10 12 10C12.5304 10 13.0391 10.2107 13.4142 10.5858C13.7893 10.9609 14 11.4696 14 12ZM14 12H22M17 20.66L16 18.93M11 10.27L7 3.34M20.66 17L18.93 16M3.34 7L5.07 8M20.66 7L18.93 8M3.34 17L5.07 16M17 3.34L16 5.07M11 13.73L7 20.66" stroke="#535353" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <p class="ml-2 text-uppercase my-auto" style="font-size: 18px; color: #535353;"><?= $mobil["transmisi"] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 py-4 my-4" style="background-color: #D8DFE0;">
                        <h2 class="font-weight-bold mb-3" style="font-size: 42px;">Spesifikasi</h2>
                        <div class="d-flex justify-content-between">
                            <div class="w-50 mr-2">
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Merek</p>
                                    <p class="font-weight-bold"><?= $mobil["merek"] ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Tipe</p>
                                    <p class="font-weight-bold"><?= $mobil["tipe"] ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Bahan Bakar</p>
                                    <p class="font-weight-bold"><?= $mobil["bahan_bakar"] ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Jenis Transmisi</p>
                                    <p class="font-weight-bold"><?= $mobil["transmisi"] ?></p>
                                </div>
                            </div>
                            <div class="w-50 ml-2">
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Tahun Rakit</p>
                                    <p class="font-weight-bold"><?= $mobil["tahun"] ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Warna</p>
                                    <p class="font-weight-bold"><?= $mobil["warna"] ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="color: #535353;">Jarak Tempuh</p>
                                    <p class="font-weight-bold"><?= $mobil["jarak"] ?></p>
                                </div>
                            </div>
                        </div>
                        <hr style="border: 1px solid #535353; margin: 20px 0;">
                        <h2 class="font-weight-bolder mb-3" style="font-size: 42px;">Deskripsi</h2>
                        <p class="pb-5"><?= $mobil["deskripsi"] ?></p>
                    </div>
                </div>
                <div class="w-25">
                    <div class="px-2 py-4" style="background-color: #D8DFE0;">
                        <h2 class="font-weight-normal pl-2 mb-2 text-center" style="font-size: 38px;"><?= $mobil["harga"] ?></h2>
                        <a class="btn btn-primary w-75 d-flex justify-content-center mx-auto" href="#">Beli</a>
                    </div>
                    <div class="px-3 py-4 my-4" style="background-color: #D8DFE0;">
                        <h2 class="font-weight-normal pl-2 mb-2 text-center" style="font-size: 20px;"><?= $penjual["nama"] ?></h2>
                        <a class="btn btn-primary w-75 d-flex justify-content-center mx-auto" href="#">Chat dengan penjual</a>
                    </div>
                </div>
            </section>
        </div>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <?php include("layouts/footer.html") ?>
    <!-- END FOOTER -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>