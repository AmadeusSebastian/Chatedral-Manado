<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Katedral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #F8F9FA; /* Abu-abu terang */
            color: #212529; /* Teks Hitam/Gelap */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #FFFFFF;
            border-right: 1px solid #E9ECEF;
            box-shadow: 2px 0 5px rgba(0,0,0,0.02);
        }
        .nav-link {
            color: #495057;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 15px;
            transition: all 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #F8F9FA;
            color: #212529;
            font-weight: 600;
        }
        .main-content {
            padding: 30px;
        }
        .card {
            border: 1px solid #E9ECEF;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">