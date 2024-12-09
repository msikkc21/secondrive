<?php 
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if( isset($_POST["register"]) ) {
    
    if(register($_POST) > 0){
        echo "<script>
        alert('Registrasi Berhasil!')
        window.location = 'login.php';
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
    <title>Register</title>
</head>

<body style="background-color: rgba(0, 12, 255, 0.33);">
    <div class="container pt-5">
        <div class="w-50 mx-auto p-3 bg-white rounded" style="background-color: #000CFF;">
        <img src="assets/Logo1.webp" alt="logo" class="w-50 my-2">
        <p class="font-weght-medium" style="font-size: 14px;">Platform jual beli mobil bekas terpercaya, mudah, dan transparan.</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Masukkan Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                </div>
                <button name="register" type="submit" class="btn w-100 text-white" style="background-color: #6166FF;">Daftar</button>
            </form>  
            <p class="text-center mt-3">Sudah memiliki akun? <a href="login.php" class="text-dark">Login</a></p>      
        </div>
    </div>
</body>

</html>