<?php
// Client.php

// URL dari RESTful API server
$url = "http://localhost/finalprojek/rest/Server.php";

// HTTP GET request ke server
$response = file_get_contents($url);

// Periksa apakah ada respon dari server
if ($response !== false) {
    $data = json_decode($response, true);

    // Periksa apakah respon valid dan merupakan array
    if (is_array($data) && !isset($data['message'])) {
        // Iterasi untuk menampilkan semua data wisata
        foreach ($data as $wisata) {
            echo "Lokasi: " . $wisata['nama'] . "\n";
            echo "Deskripsi: " . $wisata['deskripsi'] . "\n";
            echo "Kategori: " . $wisata['kategori'] . "\n";
            echo "Rating: " . $wisata['rating'] . "\n";
            echo "Waktu Buka: " . $wisata['waktu_buka'] . "\n";
            echo "Kontak: " . $wisata['kontak'] . "\n\n";
        }
    } elseif (isset($data['message'])) {
        // Jika ada pesan dari server
        echo $data['message'] . "\n";
    } else {
        echo "Terjadi kesalahan saat memproses data dari server.\n";
    }
} else {
    echo "Terjadi kesalahan saat menghubungi server.\n";
}
?>
