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

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "';");

    // cek email
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row["id_user"];
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

<body style="background-color: #000769;">
    <div class="container pt-5">
        <div class="w-50 mx-auto p-3 text-dark rounded bg-white">
            <img src="assets/Logo1.webp" alt="logo" class="w-50 my-2">
            <p class="font-weght-medium" style="font-size: 14px;">Platform jual beli mobil bekas terpercaya, mudah, dan transparan.</p>
            <form action="" method="post">
                <div class="form-group my-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group my-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                </div>
                <button name="login" type="submit" class="btn w-100 text-white mt-5" style="background-color: #6166FF;">Masuk</button>
            </form>
            <p class="text-center mt-3">Belum memiliki akun? <a href="register.php" class="text-dark">Register</a></p>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>