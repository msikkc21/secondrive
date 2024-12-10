<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."';");

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
    <title>Profil</title>
</head>

<body>
    <div class="container">
        <!-- NAVBAR -->
        <?php include("layouts/navbar.html") ?>
        <!-- END NAVBAR -->

        <!-- MAIN -->
         <section style="height: 68vh;">
             <div class="my-5 p-3 rounded w-75 mx-auto" style="background-color: #D0D0D0;">
                 <div class="border-bottom border-dark">
                     <h2 class="font-weight-bold">Profil Saya</h2>
                     <p class="font-weight-light">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
                     </p>
                 </div>
                 <div class="d-flex my-2 ml-0">
                     <ul class="font-weight-bold" style="list-style: none;">
                         <li class="my-2">Nama</li>
                         <li class="my-2">Email</li>
                         <li class="my-2">No Telepon</li>
                         <li class="my-2">Alamat</li>
                     </ul>
                     <ul style="list-style: none;">
                         <li class="my-2"><?= $row['nama']  ?></li>
                         <li class="my-2"><?= $row['email']  ?></li>
                         <li class="my-2"><?= $row['no_telp']  ?></li>
                         <li class="my-2"><?= $row['alamat']  ?></li>
                     </ul>
                 </div>
                 <a href="edit-profil.php" class="btn btn-primary d-flex justify-content-center col-5 mx-auto">Edit Profil</a>
             </div>
         </section>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <?php include("layouts/footer.html") ?>
    <!-- END FOOTER -->

</body>

</html>