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
    $db_email = mysqli_query($conn, "SELECT email FROM ".$tipe." WHERE email = '".$email."';");

    if ( mysqli_fetch_assoc($db_email) ) {
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
    $query = "INSERT INTO ".$tipe." VALUES ('', '$nama', '$email', '$password', '$alamat', '$no_hp', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function editPembeli($data) {
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $no_hp = $data['telepon'];
    $alamat = htmlspecialchars($data['alamat']);

    $query = "UPDATE  pembeli  SET  nama = '$nama', email = '$email', no_telp = '$no_hp', alamat = '$alamat'  WHERE   email = '".$_SESSION['email']."';";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

