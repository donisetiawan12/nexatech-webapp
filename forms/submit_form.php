<?php
require_once __DIR__ . '/../back-end/config/db.php';

// ambil data dari form
$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$whatsapp = $_POST['whatsapp'] ?? '';
$subject  = $_POST['subject'] ?? '';
$message  = $_POST['message'] ?? '';

// =========================
// NORMALISASI NOMOR WA
// =========================

// hapus spasi depan/belakang
$whatsapp = trim($whatsapp);

// hapus semua karakter selain angka
$whatsapp = preg_replace('/[^0-9]/', '', $whatsapp);

// kalau diawali 0 → ganti jadi 62
if (substr($whatsapp, 0, 1) === '0') {
    $whatsapp = '62' . substr($whatsapp, 1);
}

// kalau belum diawali 62 → paksa tambah 62
if (substr($whatsapp, 0, 2) !== '62') {
    $whatsapp = '62' . $whatsapp;
}

// =========================
// INSERT KE DATABASE
// =========================

$query = "INSERT INTO contacts (name, email, whatsapp, subject, message)
          VALUES ('$name', '$email', '$whatsapp', '$subject', '$message')";

mysqli_query($conn, $query);

// =========================
// REDIRECT + TOAST
// =========================
header("Location: ../index.php?status=success#main");
exit;
