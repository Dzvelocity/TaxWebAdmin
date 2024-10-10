<?php
session_start();
include 'db.php'; 

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM pajak_kendaraan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Pajak Kendaraan</title>
</head>
<body>

<h2>List Pajak Kendaraan</h2>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>Nomor Plat</th>
        <th>Jenis Kendaraan</th>
        <th>No HP</th>
        <th>Jatuh Tempo</th>
        <th>Nominal Tagihan</th>
        <th>Detail</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['plate_number'] . "</td>";
            echo "<td>" . $row['vehicle_type'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['due_date'] . "</td>";
            echo "<td>Rp " . $row['bill_amount'] . "</td>";
            echo "<td><a href='detail_pajak.php?id=" . $row['id'] . "'>Detail</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data pajak kendaraan</td></tr>";
    }
    ?>
</table>

<br><br>
<form method="post" action="logout.php">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
