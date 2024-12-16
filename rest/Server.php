<?php 
require_once 'Koneksi.php'; 

header('Content-Type: application/json');

// Query untuk mengambil semua data dari tabel 'wisata'
$sql = "SELECT * FROM wisata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array(); // Inisialisasi array untuk menampung data
    
    while($row = $result->fetch_assoc()) {
        $data[] = array( // Tambahkan data ke array
            'type' => 'wisata',
            'nama' => $row["nama"],
            'deskripsi' => $row["deskripsi"],
            'kategori' => $row["kategori"],
            'rating' => $row["rating"],
            'waktu_buka' => $row["waktu_buka"],
            'kontak' => $row["kontak"]
        );
    }

    // Kirim seluruh array data sebagai JSON
    echo json_encode($data);
} else {
    echo json_encode(['message' => 'Tidak ada data wisata.']);
}

$conn->close();
?>
