<?php
$servername = "localhost";
$username = "root"; // Default username di XAMPP
$password = "";     // Password default XAMPP biasanya kosong
$dbname = "pemweb"; // Ganti dengan nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
