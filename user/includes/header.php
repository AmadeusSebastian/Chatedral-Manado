<?php
// Katedral/user/includes/header.php
// Memanggil koneksi database dari folder admin
require_once '../admin/includes/db_connect.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paroki Katedral</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #F8F9FA; color: #212529; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #FFFFFF; border-bottom: 1px solid #E9ECEF; }
        .navbar-brand { font-weight: 700; color: #212529 !important; }
        .card { border: 1px solid #E9ECEF; border-radius: 10px; background-color: #FFFFFF; box-shadow: 0 2px 10px rgba(0,0,0,0.02); }
        .sidebar-title { font-weight: 600; border-bottom: 2px solid #212529; padding-bottom: 10px; margin-bottom: 15px; }
        .doa-link { text-decoration: none; color: #495057; display: block; padding: 8px 0; border-bottom: 1px dashed #DEE2E6; }
        .doa-link:hover { color: #000; font-weight: 600; }
    </style>
</head>
<body>