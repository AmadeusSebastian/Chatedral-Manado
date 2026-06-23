<?php
// Katedral/admin/dashboard.php
session_start();
// Cek apakah admin sudah login, jika belum lempar ke halaman login
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

// Memanggil Header dan Sidebar
include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card bg-white p-5 text-center">
                <h3 class="fw-bold mb-3">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
                <p class="text-muted mb-0">Ini adalah halaman utama Panel Admin. Gunakan menu di sebelah kiri untuk mengelola Warta Liturgi, Pengumuman Mingguan, dan Informasi Paroki.</p>
            </div>
        </div>
    </div>
</main>

<?php 
// Memanggil Footer
include 'includes/footer_admin.php'; 
?>