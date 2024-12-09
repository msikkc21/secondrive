<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari permintaan
    $data = json_decode(file_get_contents('php://input'), true);
    $id_mobil1 = $data['id_mobil1'];
    $id_mobil2 = $data['id_mobil2'];

    // Query untuk mendapatkan data mobil
    $query = "SELECT * FROM mobil WHERE id_mobil IN ($id_mobil1, $id_mobil2)";
    $result = mysqli_query($conn, $query);

    $mobilList = [];
    while ($mobil = mysqli_fetch_assoc($result)) {
        $query = "SELECT * FROM gambar_mobil WHERE id_mobil = " . $mobil['id_mobil'] . " LIMIT 1;";
        $imgMobil = mysqli_query($conn, $query);
        $img = mysqli_fetch_assoc($imgMobil);

        // Jika tidak ada gambar, gunakan gambar default
        $gambar = $img ? $img['gambar'] : 'path/to/default-image.jpg'; // Ganti dengan path gambar default

        $mobilList[] = [
            'id_mobil' => $mobil['id_mobil'],
            'nama_mobil' => $mobil['nama_mobil'],
            'merek' => $mobil['merek'],
            'tahun' => $mobil['tahun'],
            'harga' => $mobil['harga'],
            'gambar' => $gambar
        ];
    }

    // Mengembalikan data dalam format JSON
    echo json_encode($mobilList);
} else {
    http_response_code(405); // Mengatur status code 405 Method Not Allowed
    echo 'Method tidak diizinkan';
}
?>