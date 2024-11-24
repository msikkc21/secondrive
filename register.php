<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }

        .element::-webkit-scrollbar {
            width: 0 !important
        }

        html {
            scrollbar-width: none;
        }
    </style>
</head>

<body>
    <div class="container pt-5">
        <div class="w-75 mx-auto p-3 text-white rounded" style="background-color: #000CFF;">
            <h2 class="text-center">Registrasi</h2>
            <form>
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
                        <option>Pembeli</option>
                        <option>Penjual</option>
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
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Konfirmasi Password">
                </div>
                <button type="submit" class="btn w-100 text-white" style="background-color: #00043D;">Daftar</button>
            </form>  
            <p class="text-center mt-3">Sudah memiliki akun? <a href="login.php" class="text-white">Register</a></p>      
        </div>
    </div>
</body>

</html>