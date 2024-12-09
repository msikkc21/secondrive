<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "';");

$row = mysqli_fetch_assoc($result);

if( isset($_POST["edit"]) ) {
    
    $editResult = editUser ($_POST);
    
    if($editResult > 0){
        echo "<script>
        alert('Profil berhasil diubah')
        window.location = 'profil.php';
        </script>";
    } elseif ($editResult === 0) {
        echo "<script>
        alert('Data tidak berubah');
        window.location = 'profil.php';
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
    <title>Edit Profil</title>
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between border-bottom border-primary">
            <a class="navbar-brand" href="#">
                <img src="assets/Logo1.webp" width="150" height="30" class="d-inline-block align-top" alt="logo">
            </a>
            <div class="navbar-nav d-flex flex-row">
                <a class="mx-3 nav-item nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
                <a class="mx-3 nav-item nav-link" href="daftar-mobil.php">Daftar Mobil</a>
                <a class="mx-3 nav-item nav-link" href="#">Chat</a>
                <a class="mx-3 nav-item nav-link" href="#">Komparasi</a>
            </div>
            <div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="profil.php" class="ml-3">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5625 30.625C6.5625 30.625 4.375 30.625 4.375 28.4375C4.375 26.25 6.5625 19.6875 17.5 19.6875C28.4375 19.6875 30.625 26.25 30.625 28.4375C30.625 30.625 28.4375 30.625 28.4375 30.625H6.5625ZM17.5 17.5C19.2405 17.5 20.9097 16.8086 22.1404 15.5779C23.3711 14.3472 24.0625 12.678 24.0625 10.9375C24.0625 9.19702 23.3711 7.52782 22.1404 6.29711C20.9097 5.0664 19.2405 4.375 17.5 4.375C15.7595 4.375 14.0903 5.0664 12.8596 6.29711C11.6289 7.52782 10.9375 9.19702 10.9375 10.9375C10.9375 12.678 11.6289 14.3472 12.8596 15.5779C14.0903 16.8086 15.7595 17.5 17.5 17.5Z" fill="black" />
                    </svg>
                </a>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- MAIN -->
        <div class="my-5 p-3 rounded" style="background-color: #D0D0D0;">
            <div class="border-bottom border-dark">
                <h2 class="font-weight-bold">Profil Saya</h2>
                <p class="font-weight-light">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
                </p>
            </div>
            <form action="" method="post">
                <div class="d-flex my-2 ml-0">
                    <ul class="font-weight-bold" style="list-style: none;">
                        <li class="my-3">Nama</li>
                        <li class="my-3">Email</li>
                        <li class="my-3">No Telepon</li>
                        <li class="my-3">Alamat</li>
                    </ul>
                    <ul style="list-style: none;">
                        <input type="text" class="form-control mt-1" name="nama" value=<?= $row['nama'] ?>>
                        <input type="text" class="form-control mt-1" name="email" value=<?= $row['email'] ?>>
                        <input type="text" class="form-control mt-1" name="telepon" value="<?= htmlspecialchars($row['no_telp'], ENT_QUOTES, 'UTF-8') ?>">
                        <input type="text" class="form-control mt-1" name="alamat" value="<?= htmlspecialchars($row['alamat'], ENT_QUOTES, 'UTF-8') ?>">
                    </ul>
                </div>
                <button type="submit" name="edit" class="ml-4 h-25 btn btn-success">Submit</button>
            </form>
        </div>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <?php include('layouts/footer.html') ?>
    <!-- END FOOTER -->

</body>

</html>