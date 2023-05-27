<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "testing_mysql");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan status warna terbaru
$sql = "SELECT color FROM status ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mendapatkan hasil query
    $row = $result->fetch_assoc();
    $color = $row["color"];

    // Mengubah warna konten halaman
    echo "<style>body { background-color: $color; }</style>";
}

// Menutup koneksi database
$conn->close();
?>
</body>
</html>