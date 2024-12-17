<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "persepsi_korupsi";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>