<?php
session_start();
include 'db.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Cek apakah ada ID yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pajak kendaraan berdasarkan ID
    $sql = "SELECT * FROM pajak_kendaraan WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $detail = $result->fetch_assoc();
    } else {
        echo "Detail tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pajak Kendaraan</title>
</head>
<body>

<h2>Detail Pajak Kendaraan</h2>

<p><strong>Nama :</strong> <?php echo $detail['name']; ?></p>
<p><strong>No HP:</strong> <?php echo $detail['phone_number']; ?></p>
<p><strong>Nomor Plat:</strong> <?php echo $detail['plate_number']; ?></p>
<p><strong>Jenis Kendaraan:</strong> <?php echo $detail['vehicle_type']; ?></p>
<p><strong>Jatuh Tempo:</strong> <?php echo $detail['due_date']; ?></p>
<p><strong>Nominal Tagihan:</strong> Rp <?php echo number_format($detail['bill_amount'], 0, ',', '.'); ?></p>

<!-- Tombol untuk kembali ke list pajak -->
<form action="list_pajak.php" method="post">
    <input type="submit" value="Kembali">
</form>

</body>
</html>
