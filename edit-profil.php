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

if (isset($_POST["edit"])) {

    $editResult = editUser($_POST);

    if ($editResult > 0) {
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
                    <button type="submit" name="edit" class="ml-4 h-25 btn btn-success d-flex justify-content-center col-5 mx-auto">Submit</button>
                </form>
            </div>
        </section>
        <!-- END MAIN -->
    </div>


    <!-- FOOTER -->
    <?php include('layouts/footer.html') ?>
    <!-- END FOOTER -->

</body>

</html>