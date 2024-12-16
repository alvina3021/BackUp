<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "poi"; 

$conn = new mysqli("localhost", "root", "", "poi");
$conn_pencarian = new mysqli("localhost", "root", "", "pencarian");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database poi gagal: " . $conn->connect_error);
}
if ($conn_pencarian->connect_error) {
    die("Koneksi ke database pencarian gagal: " . $conn_pencarian->connect_error);
}
