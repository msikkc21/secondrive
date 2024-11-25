<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between border-bottom border-primary">
            <a class="navbar-brand" href="#">
                <img src="assets/Logo1.webp" width="150" height="30" class="d-inline-block align-top" alt="logo">
            </a>
            <div class="navbar-nav d-flex flex-row">
                <a class="mx-3 nav-item nav-link" href="index.php">Dashboard </a>
                <a class="mx-3 nav-item nav-link active" href="#">Daftar Mobil <span class="sr-only">(current)</span></a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Komparasi</a>
            </div>
            <button class="btn btn-danger">Logout</button>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <main class="container mt-5">
            <h1 class="text-center">Daftar Mobil</h1>
            <section>
                <div class="card w-100 rounded my-5">
                    <div class="card-body d-flex flex-row">
                        <img src="assets/bmwm3.png" width="200px" height="200px" alt="bmw m3">
                        <div class="px-4">
                            <h5 class="card-title font-weight-bold">BMW M3</h5>
                            <div class="d-flex flex-row font-weight-bold">
                                <p class="card-text pr-2">Merk : BMW</p>
                                <p class="card-text">Tahun : 2020</p>
                            </div>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn" style="background-color: #000CFF; color: white;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="card w-100 rounded my-5">
                    <div class="card-body d-flex flex-row">
                        <img src="assets/bmwm3.png" width="200px" height="200px" alt="bmw m3">
                        <div class="px-4">
                            <h5 class="card-title font-weight-bold">BMW M3</h5>
                            <div class="d-flex flex-row font-weight-bold">
                                <p class="card-text pr-2">Merk : BMW</p>
                                <p class="card-text">Tahun : 2020</p>
                            </div>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn" style="background-color: #000CFF; color: white;">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <footer class="text-center text-white" style="background-color: #000769;">
        <!-- Grid container -->
        <div class="container pt-4 ">
            <!-- Section: Navbar -->
            <section class="navbar-nav mb-4 d-flex flex-row justify-content-center">
                <a class="mx-3 nav-item nav-link" href="index.php">Dashboard</a>
                <a class="mx-3 nav-item nav-link" href="daftar-mobil.php">Daftar Mobil</a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Komparasi</a>
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