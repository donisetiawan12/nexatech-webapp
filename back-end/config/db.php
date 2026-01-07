<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "nexatech_auth";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil";
