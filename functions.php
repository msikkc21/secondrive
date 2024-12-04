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
    $email = htmlspecialchars($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $date = date('Y-m-d');

    // Cek Email
    $db_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '" . $email . "';");

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
    $query = "INSERT INTO users VALUES ('', '$nama', '$email', '$password', '$alamat', '$no_hp', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editUser($data)
{
    global $conn;

    // Ambil data pengguna yang ada di database
    $id = $_SESSION['id'];
    $currentData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM users WHERE id_user = ".$id.";"));

    // Periksa apakah ada perubahan
    if ($currentData['name'] == $data['name'] && $currentData['email'] == $data['email']) {
        return 0; // Tidak ada perubahan
    }

    // Jika ada perubahan, lakukan update
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    
    $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
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
    
    
    
    // Upload to database
    $query = "INSERT INTO mobil VALUES ('', '$nama', '$merek', '$tipe', '$warna' ,'$tahun', '$bahan_bakar', '$jarak', '$transmisi', '$kapasitas', '$harga', '$deskripsi', '$status', " . $_SESSION['id'] . ");";
    mysqli_query($conn, $query);

    $result = mysqli_query($conn, "SELECT id_mobil FROM mobil ORDER BY id_mobil DESC LIMIT 1;");
    
    $row = mysqli_fetch_assoc($result);
    
    $gambar = upload($_FILES['gambar'], $row['id_mobil']);

    // $upGambar = "INSERT INTO gambar_mobil VALUES (''," . $row['id_mobil'] . ", '$gambar')";
    // mysqli_query($conn, $upGambar);

    return mysqli_affected_rows($conn);
}

function upload($files, $id_mobil) {
    // Tentukan direktori upload
    $targetDir = "img/";
    $uploadOk = 1; // Flag untuk mengecek apakah upload berhasil
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif']; // Jenis file yang diizinkan

    // Loop melalui setiap file yang diupload
    foreach ($files['tmp_name'] as $key => $tmpName) {
        $fileType = $files['type'][$key];

        // Cek apakah file adalah gambar
        if (in_array($fileType, $allowedTypes)) {
            // Generate nama file unik
            $fileName = basename($files['name'][$key]);
            $targetFilePath = $targetDir . uniqid() . "_" . $fileName;

            // Coba untuk memindahkan file ke direktori target
            if (move_uploaded_file($tmpName, $targetFilePath)) {
                // Simpan informasi gambar ke database
                $query = "INSERT INTO gambar_mobil (id, id_mobil, gambar) VALUES ('','$id_mobil', '$targetFilePath')";
                mysqli_query($GLOBALS['conn'], $query);
            } else {
                $uploadOk = 0; // Set flag gagal jika ada kesalahan dalam upload
            }
        } else {
            $uploadOk = 0; // Set flag gagal jika tipe file tidak diizinkan
        }
    }

    return $uploadOk; // Kembalikan status upload
}

// function upload($data, $wajib)
// {
//     // Cek apakah data yang diperlukan ada
//     if (!isset($data["name"]) || !isset($data['size']) || !isset($data['error']) || !isset($data['tmp_name'])) {
//         echo "<script>alert('Data upload tidak lengkap');</script>";
//         return false;
//     }

//     $fileNames = $data["name"];
//     $ukuranFiles = $data['size'];
//     $errors = $data['error'];
//     $tmpNames = $data['tmp_name'];

//     // Cek jumlah gambar yang diupload
//     if (count($fileNames) > 3) {
//         echo "<script>alert('Maksimal upload 3 gambar');</script>";
//         return false;
//     }

//     $uploadedFiles = [];

//     for ($i = 0; $i < count($fileNames); $i++) {
//         $namaFile = $fileNames[$i];
//         $ukuranFile = $ukuranFiles[$i];
//         $error = $errors[$i];
//         $tmpName = $tmpNames[$i];

//         // cek sudah upload gambar
//         if ($wajib === 1 && $error === 4) {
//             echo "<script>alert('Upload gambar 1 terlebih dahulu');</script>";
//             return false;
//         }

//         // Jika ada error saat upload
//         if ($error != 0) {
//             echo "<script>alert('Terjadi kesalahan saat mengupload gambar');</script>";
//             return false;
//         }

//         // cek ekstensi gambar
//         $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//         $ekstensiGambar = explode('.', $namaFile);
//         $ekstensiGambar = strtolower(end($ekstensiGambar));
//         if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//             echo "<script>alert('Gambar harus berformat jpg, jpeg, png!');</script>";
//             return false;
//         }

//         // cek ukuran
//         if ($ukuranFile > 10000000) {
//             echo "<script>alert('Ukuran gambar terlalu besar');</script>";
//             return false;
//         }

//         // lolos cek
//         $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

//         // Pindahkan file yang diupload ke direktori yang diinginkan
//         if (move_uploaded_file($tmpName, 'img/' . $namaFileBaru)) {
//             $uploadedFiles[] = $namaFileBaru;
//         } else {
//             echo "<script>alert('Gagal memindahkan file');</script>";
//             return false;
//         }
//     }

//     return $uploadedFiles; // Mengembalikan array nama file yang berhasil diupload

// }
