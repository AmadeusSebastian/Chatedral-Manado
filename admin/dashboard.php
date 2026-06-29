<?php
// Katedral/admin/dashboard.php
session_start();
// Cek apakah admin sudah login, jika belum lempar ke halaman login
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'includes/db_connect.php';

// Menghitung total data dari masing-masing tabel
$count_admin = $conn->query("SELECT COUNT(*) as total FROM tbl_admin")->fetch_assoc()['total'] ?? 0;
$count_pengumuman = $conn->query("SELECT COUNT(*) as total FROM tbl_pengumuman")->fetch_assoc()['total'] ?? 0;
$count_liturgi = $conn->query("SELECT COUNT(*) as total FROM tbl_liturgi")->fetch_assoc()['total'] ?? 0;
$count_kata = $conn->query("SELECT COUNT(*) as total FROM tbl_kata_pengantar_harian")->fetch_assoc()['total'] ?? 0;

// Memanggil Header dan Sidebar
include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Dashboard</h1>
    </div>

    <!-- Wrapper with Cathedral Image and Dark Overlay -->
    <div class="w-full p-8 sm:p-10 flex flex-col justify-center shadow-md relative overflow-hidden" 
         style="background: linear-gradient(rgba(33, 37, 41, 0.8), rgba(33, 37, 41, 0.85)), url('../user/images/santo_carlo_acutis.jpg'); background-size: cover; background-position: center; border-radius: 1rem; min-height: 80vh;">
        
        <div class="relative z-10 w-full max-w-7xl mx-auto">
            <h2 class="text-white font-bold text-3xl sm:text-4xl mb-2" style="font-family: 'Playfair Display', serif;">
                Selamat Datang di Panel Admin Katedral
            </h2>
            <p class="text-gray-300 text-lg mb-8">Halo, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?>! Berikut adalah ringkasan data sistem saat ini.</p>
            
            <!-- 4-Column Responsive Grid (Tailwind translation of Bootstrap row g-4) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-4">
                
                <!-- Card 1: Total Admin -->
                <div class="bg-white border-0 shadow-lg rounded-2xl p-6 h-full flex items-center transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="shrink-0 mr-4">
                        <i class="bi bi-person-badge text-blue-600 text-[3rem]"></i>
                    </div>
                    <div>
                        <h6 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Total Admin</h6>
                        <h3 class="font-bold text-4xl text-gray-800 m-0"><?php echo $count_admin; ?></h3>
                    </div>
                </div>

                <!-- Card 2: Pengumuman -->
                <div class="bg-white border-0 shadow-lg rounded-2xl p-6 h-full flex items-center transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="shrink-0 mr-4">
                        <i class="bi bi-megaphone text-red-500 text-[3rem]"></i>
                    </div>
                    <div>
                        <h6 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Pengumuman</h6>
                        <h3 class="font-bold text-4xl text-gray-800 m-0"><?php echo $count_pengumuman; ?></h3>
                    </div>
                </div>

                <!-- Card 3: Warta Liturgi -->
                <div class="bg-white border-0 shadow-lg rounded-2xl p-6 h-full flex items-center transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="shrink-0 mr-4">
                        <i class="bi bi-book text-yellow-500 text-[3rem]"></i>
                    </div>
                    <div>
                        <h6 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Warta Liturgi</h6>
                        <h3 class="font-bold text-4xl text-gray-800 m-0"><?php echo $count_liturgi; ?></h3>
                    </div>
                </div>

                <!-- Card 4: Kata Pengantar -->
                <div class="bg-white border-0 shadow-lg rounded-2xl p-6 h-full flex items-center transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="shrink-0 mr-4">
                        <i class="bi bi-journal-text text-purple-500 text-[3rem]"></i>
                    </div>
                    <div>
                        <h6 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Kata Pengantar</h6>
                        <h3 class="font-bold text-4xl text-gray-800 m-0"><?php echo $count_kata; ?></h3>
                    </div>
                </div>

            </div>

            <!-- Quote Section -->
            <div class="mt-10 text-center px-6 py-8 rounded-3xl shadow-sm" style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.15);">
                <i class="bi bi-quote text-[4rem]" style="color: #b8965a; opacity: 0.8; line-height: 1;"></i>
                <h4 class="font-serif italic text-white mt-2 mb-6 font-light text-2xl sm:text-3xl" style="letter-spacing: 0.5px; line-height: 1.5;">
                    "The Eucharist is my highway to heaven."
                </h4>
                <div class="flex items-center justify-center gap-4">
                    <div style="width: 50px; height: 1px; background-color: #b8965a; opacity: 0.7;"></div>
                    <span class="font-medium uppercase text-sm" style="letter-spacing: 2.5px; color: #e4d5b7 !important;">Saint Carlo Acutis</span>
                    <div style="width: 50px; height: 1px; background-color: #b8965a; opacity: 0.7;"></div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php 
// Memanggil Footer
include 'includes/footer_admin.php'; 
?>