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

    $no_hp = gantiformat($no_hp);

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
    if ($currentData['nama'] == $data['nama'] && $currentData['email'] == $data['email'] && $currentData['no_telp'] == $data['telepon'] && $currentData['alamat'] == $data['alamat']) {
        return 0; // Tidak ada perubahan
    }

    // Jika ada perubahan, lakukan update
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $no_hp = $data['telepon'];
    $alamat = htmlspecialchars($data['alamat']);
    
    $no_hp = gantiformat($no_hp);
    $query = "UPDATE users SET nama = '$nama', email = '$email', no_telp = '$no_hp', alamat = '$alamat' WHERE id_user = $id";
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
    $harga = formatNumber($data['harga']);
    $status = 'tersedia';
    
    
    
    // Upload to database
    $query = "INSERT INTO mobil VALUES ('', '$nama', '$merek', '$tipe', '$warna' ,'$tahun', '$bahan_bakar', '$jarak', '$transmisi', '$kapasitas', '$harga', '$deskripsi', '$status', " . $_SESSION['id'] . ");";
    mysqli_query($conn, $query);

    $result = mysqli_query($conn, "SELECT id_mobil FROM mobil ORDER BY id_mobil DESC LIMIT 1;");
    
    $row = mysqli_fetch_assoc($result);
    
    $gambar = upload($_FILES['gambar'], $row['id_mobil']);

    return mysqli_affected_rows($conn);
}

function editMobil($data) {
    global $conn;

    // Ambil data pengguna yang ada di database
    $id = $_GET['id'];
    $nama = $data["nama"];
    $deskripsi = $data["deskripsi"];
    $merek = $data["merek"];
    $jarak = $data["jarak"];
    $warna = $data["warna"];
    $kapasitas = $data["kapasitas"];
    $tahun = $data["tahun"];
    $bahan_bakar = $data["bahan-bakar"];
    $tipe = $data["tipe-mobil"];
    $transmisi = $data["tipe-transmisi"];
    $harga = $data['harga'];
    $status = $data['status'];
    
    $currentData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM mobil WHERE id_mobil = ".$id.";"));
    
    // Periksa apakah ada perubahan
    if ($currentData['nama_mobil'] == $nama && $currentData['deskripsi'] == $deskripsi && $currentData['merek'] == $merek && $currentData['jarak'] == $jarak && $currentData['warna'] == $warna && $currentData['kapasitas'] == $kapasitas && $currentData['tahun'] == $tahun && $currentData['bahan_bakar'] == $bahan_bakar && $currentData['tipe'] == $tipe && $currentData['transmisi'] == $transmisi && $currentData['harga'] == $harga && $currentData['status'] == $status) {
        return 0; // Tidak ada perubahan
    }
    
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
    $harga = formatNumber($data['harga']);
    $status = $data['status'];

    $query = "UPDATE mobil SET 
    nama_mobil = '$nama', 
    merek = '$merek', 
    tipe = '$tipe', 
    warna = '$warna', 
    tahun = '$tahun', 
    bahan_bakar = '$bahan_bakar', 
    jarak = '$jarak', 
    transmisi = '$transmisi', 
    kapasitas = '$kapasitas', 
    harga = '$harga', 
    deskripsi = '$deskripsi', 
    status = '$status' 
    WHERE id_mobil = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function formatNumber($input) {
    // Menghapus karakter yang tidak perlu
    $input = str_replace(['.', ',', ' '], '', $input); // Menghapus titik, koma, dan spasi

    // Cek apakah input adalah angka
    if (!is_numeric($input)) {
        return "Input tidak valid, bukan angka.";
    }

    // Mengubah input ke format yang benar (misalnya, format dengan pemisah ribuan dan dua desimal)
    $formattedNumber = number_format($input, 0, ',', '.');

    return $formattedNumber;
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

function uploadBukti() {
    $targetDir = "imgBukti/";
    $namaFile = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error= $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

    if($error == 4){
        echo "<script> alert('Upload gambar bukti terlebih dahulu!')";
        return false;
    }
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script> alert('Yang anda upload bukan gambar!')";
        return false;
    }

    if($ukuranFile > 5000000){
        echo "<script> alert('Ukuran gambar terlalu besar!')</script>";
        return false;
    }

    $targetFilePath = $targetDir . uniqid() . "_" . $namaFile;
    move_uploaded_file($tmpName, $targetFilePath);

    return $targetFilePath;
}

function gantiformat($nomorhp) {
    //Terlebih dahulu kita trim dl
    $nomorhp = trim($nomorhp);
   //bersihkan dari karakter yang tidak perlu
    $nomorhp = strip_tags($nomorhp);     
   // Berishkan dari spasi
   $nomorhp= str_replace(" ","",$nomorhp);
   // bersihkan dari bentuk seperti  (022) 66677788
    $nomorhp= str_replace("(","",$nomorhp);
   // bersihkan dari format yang ada titik seperti 0811.222.333.4
    $nomorhp= str_replace(".","",$nomorhp); 

    //cek apakah mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($nomorhp))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($nomorhp), 0, 3)=='+62'){
            $nomorhp= trim($nomorhp);
        }
        // cek apakah no hp karakter 1 adalah 0
       elseif(substr($nomorhp, 0, 1)=='0'){
            $nomorhp= '+62'.substr($nomorhp, 1);
        }
    }
    return $nomorhp;
}

