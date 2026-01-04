<?php
session_start();
require_once "../config/db.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    // SET SESSION
    $_SESSION['user_id']    = $user['id'];
    $_SESSION['user_name']  = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['role']       = $user['role'];

    // 🔥 REDIRECT BERDASARKAN ROLE
    if ($user['role'] === 'admin') {
        header("Location: ../../back-end/admin/dashboard.php");
    } else {
        header("Location: ../../index.php");
    }
    exit;

} else {
    header("Location: ../../forms/auth/login.html?error=invalid");
    exit;
}
