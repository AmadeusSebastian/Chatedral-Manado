<?php
// Katedral/admin/index.php
session_start();
require_once 'includes/db_connect.php';

// Fitur Developer: Otomatis buat akun admin default jika tabel kosong
$check_admin = $conn->query("SELECT * FROM tbl_admin");
if ($check_admin->num_rows == 0) {
    $default_user = "admin";
    $default_pass = password_hash("admin123", PASSWORD_BCRYPT);
    $conn->query("INSERT INTO tbl_admin (username, password) VALUES ('$default_user', '$default_pass')");
}

$error = "";

// Logika Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM tbl_admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Gereja Katedral</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F8F9FA; /* Abu-abu terang minimalis */
            color: #212529; /* Hitam elegan */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border: 1px solid #E9ECEF;
        }
        .btn-primary {
            background-color: #212529;
            border: none;
        }
        .btn-primary:hover {
            background-color: #495057;
        }
        .form-control:focus {
            border-color: #adb5bd;
            box-shadow: none;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h4 class="fw-bold">Panel Admin</h4>
        <p class="text-muted small">Warta Paroki Katedral</p>
    </div>

    <?php if ($error != ""): ?>
        <div class="alert alert-danger py-2 small"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label small text-muted">Username</label>
            <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label small text-muted">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
    </form>
    
    <div class="text-center mt-3 small text-muted">
        *Default Username: <b>admin</b> | Password: <b>admin123</b>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>