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
    $no_hp = htmlspecialchars($data['telepon']);
    $tipe = $data['tipe-daftar'];
    $email = htmlspecialchars($data['email']);
    $password = $data['password'];
    $password2 = $data['password2'];
    $date = date('Y-m-d');

    $select = "SELECT email FROM " . $tipe . " WHERE email = " . $email . ";";
    $db_email = mysqli_query($conn, $select);

    if (mysqli_num_rows($db_email) === 1) {
        echo "<script>
            alert('Email sudah terdaftar');
        </script>";
        return false;
    }

    if ($password != $password2) {
        echo "<script>
            alert('Password tidak sama');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO ".$tipe."(nama, email, password, no_hp, alamat
            ) VALUES ('', '$nama', '$email', '$password', '$alamat', '$no_hp', '$date')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "berhasil";
    } else {
        echo "gagal";
    }
}
