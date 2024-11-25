<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("layouts/head.html") ?>
</head>

<body>
    <div class="container pt-5">
        <div class="w-75 mx-auto p-3 text-white rounded" style="background-color: #000CFF;">
            <h2 class="text-center">Login</h2>
            <form>
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
                        <option>Pembeli</option>
                        <option>Penjual</option>
                    </select>
                </div>
                <button type="submit" class="btn w-100 text-white" style="background-color: #00043D;">Daftar</button>
            </form>
            <p class="text-center mt-3">Belum memiliki akun? <a href="register.php" class="text-white">Login</a></p>
        </div>
    </div>
</body>

</html>