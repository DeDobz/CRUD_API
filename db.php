<?php
$server = "localhost";
$username = "root"; // sesuaikan jika diperlukan
$password = ""; // sesuaikan jika diperlukan
$database = "data-dummy";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
