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

// Memeriksa apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai warna dari form
    $color = $_POST["color"];

    // Query untuk menyimpan status warna ke dalam database
    $sql = "INSERT INTO status (color) VALUES ('$color')";

    if ($conn->query($sql) === TRUE) {
        echo "Status warna berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>
</body>
</html>