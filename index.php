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
                <a class="mx-3 nav-item nav-link active" href="#">Dashboard <span class="sr-only">(current)</span></a>
                <a class="mx-3 nav-item nav-link" href="daftar-mobil.php">Daftar Mobil</a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Komparasi</a>
            </div>
            <button class="btn btn-danger">Logout</button>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <div class="h-75 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"></div>
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