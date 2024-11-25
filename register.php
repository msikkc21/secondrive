<?php 
    session_start()


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
</head>

<body>
    <div class="container pt-5">
        <div class="w-75 mx-auto p-3 text-white rounded" style="background-color: #000CFF;">
            <h2 class="text-center">Registrasi</h2>
            <form action="/register.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Masukkan Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="tipe-daftar">Daftar Sebagai</label>
                    <select class="form-control" name="tipe-daftar">
                        <option value="pembeli">Pembeli</option>
                        <option value="penjual">Penjual</option>
                    </select>
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
                    <input type="password2" class="form-control" name="password2" placeholder="Konfirmasi Password">
                </div>
                <button name="register" type="submit" class="btn w-100 text-white" style="background-color: #00043D;">Daftar</button>
            </form>  
            <p class="text-center mt-3">Sudah memiliki akun? <a href="login.php" class="text-white">Register</a></p>      
        </div>
    </div>
</body>

</html>