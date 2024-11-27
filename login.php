<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'functions.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $tipe = $_POST["tipe-login"];

    $result = mysqli_query($conn, "SELECT * FROM " . $tipe . " WHERE email = '" . $email . "';");

    // cek email
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row["id_".$tipe];
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

    if ($error) {
        echo "<script>
                alert('Email atau Password salah!')
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
    <title>Login</title>
</head>

<body>
    <div class="container pt-5">
        <div class="w-75 mx-auto p-3 text-white rounded" style="background-color: #000CFF;">
            <h2 class="text-center">Login</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="tipe-login">Login Sebagai</label>
                    <select class="form-control" name="tipe-login">
                        <option value="pembeli">Pembeli</option>
                        <option value="penjual">Penjual</option>
                    </select>
                </div>
                <button name="login" type="submit" class="btn w-100 text-white" style="background-color: #00043D;">Daftar</button>
            </form>
            <p class="text-center mt-3">Belum memiliki akun? <a href="register.php" class="text-white">Register</a></p>
        </div>
    </div>
</body>

</html>