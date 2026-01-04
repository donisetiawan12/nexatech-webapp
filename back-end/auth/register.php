<?php
require_once "../config/db.php";

$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Cek email sudah terdaftar
$check = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../../forms/auth/register.html?error=email_exists");
    exit;
}

// ROLE DIPAKSA USER (INI KUNCI)
$role = 'user';

// Insert user
$query = "INSERT INTO users (name, email, password, role)
          VALUES ('$name', '$email', '$hashedPassword', '$role')";

if (mysqli_query($conn, $query)) {
    header("Location: ../../forms/auth/login.html?success=register");
    exit;
} else {
    echo "Registrasi gagal";
}
?>
