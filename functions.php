<?php
$conn = mysqli_connect('localhost', 'root', '', 'secondrive');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function register($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $no_hp = $data['telepon'];
    $tipe = $data['tipe-daftar'];
    $email = htmlspecialchars($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $date = date('Y-m-d');

    // Cek Email
    $db_email = mysqli_query($conn, "SELECT email FROM " . $tipe . " WHERE email = '" . $email . "';");

    if (mysqli_fetch_assoc($db_email)) {
        echo "<script>
            alert('Email sudah terdaftar');
        </script>";
        return false;
    }

    // Cek Password
    if ($password != $password2) {
        echo "<script>
            alert('Password tidak sama');
        </script>";
        return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Upload to database
    $query = "INSERT INTO " . $tipe . " VALUES ('', '$nama', '$email', '$password', '$alamat', '$no_hp', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editPembeli($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $no_hp = $data['telepon'];
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE  pembeli  SET  nama = '$nama', email = '$email', no_telp = '$no_hp', alamat = '$alamat'  WHERE   email = '" . $_SESSION['email'] . "';";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahMobil($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $merek = htmlspecialchars($data["merek"]);
    $jarak = htmlspecialchars($data["jarak"]);
    $warna = htmlspecialchars($data["warna"]);
    $kapasitas = htmlspecialchars($data["kapasitas"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $bahan_bakar = $data["bahan-bakar"];
    $tipe = $data["tipe-mobil"];
    $transmisi = $data["tipe-transmisi"];
    $harga = $data["harga"];
    $status = 'tersedia';
    $gambar1 = upload($_FILES['gambar1'], 1);
    $gambar2 = upload($_FILES['gambar2'], 0);
    $gambar3 = upload($_FILES['gambar3'], 0);


    // Upload to database
    $query = "INSERT INTO mobil VALUES ('', '$nama', '$merek', '$tipe', '$warna' ,'$tahun', '$bahan_bakar', '$jarak', '$transmisi', '$kapasitas', '$harga', '$deskripsi', '$status', " . $_SESSION['id'] . ");";
    mysqli_query($conn, $query);

    $result = mysqli_query($conn, "SELECT id_mobil FROM mobil ORDER BY id_mobil DESC LIMIT 1;");

    $row = mysqli_fetch_assoc($result);

    $upGambar = "INSERT INTO gambar_mobil VALUES (" . $row['id_mobil'] . ", '$gambar1', '$gambar2', '$gambar3');";
    mysqli_query($conn, $upGambar);

    return mysqli_affected_rows($conn);
}

function upload($data, $wajib)
{
    $namaFile = $data['name'];
    $ukuranFile = $data['size'];
    $error = $data['error'];
    $tmpName = $data['tmp_name'];

    // cek sudah upload gambar
    if ($wajib === 1) {
        if ($error === 4) {
            echo "<script>alert('Upload gambar 1 terlebih dahulu');</script>";
            return false;
        }
    }

    if ($error != 4) {
        // cek ekstensi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Gambar harus berformat jpg, jpeg, png!');</script>";
            return false;
        }

        // cek ukuran
        if ($ukuranFile > 10000000) {
            echo "<script>alert('Ukuran gambar terlalu besar');</script>";
            return false;
        }

        // lolos cek
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.' . $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }
}
