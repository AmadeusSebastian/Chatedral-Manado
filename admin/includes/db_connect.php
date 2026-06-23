<?php
// Katedral/admin/includes/db_connect.php

$host = "localhost";
$user = "root";       // Default XAMPP username
$pass = "";           // Default XAMPP password (kosong)
$db   = "db_katedral";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}
?>