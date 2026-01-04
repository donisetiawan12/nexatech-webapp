<?php
$host = "localhost";
$user = "db_user_public";
$pass = "db_password_public";
$db   = "nexatech_auth";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal");
}
