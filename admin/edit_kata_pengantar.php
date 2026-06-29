<?php
// Katedral/admin/edit_kata_pengantar.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

if (!isset($_GET['id'])) { header("Location: data_kata_pengantar.php"); exit(); }
$id = $_GET['id'];
$pesan = "";

// Mengambil data lama
$stmt_get = $conn->prepare("SELECT * FROM tbl_kata_pengantar_harian WHERE id = ?");
if($stmt_get) {
    $stmt_get->bind_param("i", $id);
    $stmt_get->execute();
    $data = $stmt_get->get_result()->fetch_assoc();
} else {
    $data = null;
}

if (!$data) {
    header("Location: data_kata_pengantar.php");
    exit();
}

if (isset($_POST['update'])) {
    $bulan = $_POST['bulan'];
    $tanggal = $_POST['tanggal'];
    $is_hari_santo = isset($_POST['is_hari_santo']) ? 1 : 0;
    $nama_santo = !empty($_POST['nama_santo']) ? $_POST['nama_santo'] : NULL;
    $sejarah_santo = !empty($_POST['sejarah_santo']) ? $_POST['sejarah_santo'] : NULL;
    $kata_pengantar = $_POST['kata_pengantar'];
    $foto_santo = $data['foto_santo']; // keep old photo by default

    // Handle Upload Foto
    if ($is_hari_santo && isset($_FILES['foto_santo']) && $_FILES['foto_santo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../assets/images/santo/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        
        $file_name = time() . '_' . basename($_FILES['foto_santo']['name']);
        $target_file = $upload_dir . $file_name;
        
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'webp'])) {
            if (move_uploaded_file($_FILES['foto_santo']['tmp_name'], $target_file)) {
                $foto_santo = 'assets/images/santo/' . $file_name;
            }
        }
    }

    $stmt = $conn->prepare("UPDATE tbl_kata_pengantar_harian SET bulan=?, tanggal=?, is_hari_santo=?, nama_santo=?, sejarah_santo=?, foto_santo=?, kata_pengantar=? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("iiissssi", $bulan, $tanggal, $is_hari_santo, $nama_santo, $sejarah_santo, $foto_santo, $kata_pengantar, $id);
        if ($stmt->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data berhasil diperbarui! <a href='data_kata_pengantar.php' class='underline font-bold'>Kembali ke Data</a></div>";
            // Refresh data
            $data['bulan'] = $bulan; $data['tanggal'] = $tanggal; $data['is_hari_santo'] = $is_hari_santo;
            $data['nama_santo'] = $nama_santo; $data['sejarah_santo'] = $sejarah_santo; 
            $data['foto_santo'] = $foto_santo; $data['kata_pengantar'] = $kata_pengantar;
        } else {
            $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal memperbarui data: " . ($conn->errno === 1062 ? "Data untuk tanggal ini sudah ada." : $conn->error) . "</div>";
        }
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';

$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
$is_santo_js = $data['is_hari_santo'] ? 'true' : 'false';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Edit Kata Pengantar Harian</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100" x-data="{ isSanto: <?php echo $is_santo_js; ?> }">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Kiri: Data Utama -->
                <div class="md:w-1/2">
                    <div class="flex gap-4 mb-5">
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700 mb-2">Tanggal</label>
                            <select name="tanggal" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" required>
                                <?php for($i=1; $i<=31; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php echo $data['tanggal'] == $i ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700 mb-2">Bulan</label>
                            <select name="bulan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" required>
                                <?php foreach($nama_bulan as $index => $nama): ?>
                                    <option value="<?php echo $index + 1; ?>" <?php echo $data['bulan'] == ($index+1) ? 'selected' : ''; ?>><?php echo $nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Kata Pengantar Harian</label>
                        <textarea name="kata_pengantar" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" required><?php echo htmlspecialchars($data['kata_pengantar']); ?></textarea>
                    </div>

                    <div class="mb-5">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="is_hari_santo" x-model="isSanto" class="w-5 h-5 text-katedral-gold border-gray-300 rounded focus:ring-katedral-gold">
                            <span class="text-gray-700 font-medium">Hari ini merupakan peringatan Santo/Santa</span>
                        </label>
                    </div>
                </div>

                <!-- Kanan: Data Santo (Conditional) -->
                <div class="md:w-1/2" x-show="isSanto" x-cloak>
                    <div class="p-6 bg-blue-50 border border-blue-100 rounded-xl space-y-5">
                        <h6 class="font-bold text-katedral-charcoal"><i class="bi bi-person-badge mr-2 text-katedral-gold"></i>Data Santo/Santa</h6>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Santo/Santa</label>
                            <input type="text" name="nama_santo" value="<?php echo htmlspecialchars($data['nama_santo'] ?? ''); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sejarah / Profil Singkat</label>
                            <textarea name="sejarah_santo" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold"><?php echo htmlspecialchars($data['sejarah_santo'] ?? ''); ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto/Ilustrasi Baru (Opsional)</label>
                            <?php if(!empty($data['foto_santo'])): ?>
                                <p class="text-xs text-green-600 mb-2"><i class="bi bi-check-circle"></i> Sudah ada foto tersimpan.</p>
                            <?php endif; ?>
                            <input type="file" name="foto_santo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200">
            <div class="flex items-center gap-4">
                <button type="submit" name="update" class="bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-3 px-8 rounded-lg transition-colors shadow-sm">Simpan Perubahan</button>
                <a href="data_kata_pengantar.php" class="inline-block px-8 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-lg transition-colors">Batal</a>
            </div>
        </form>
    </div>
</main>

<style>
    [x-cloak] { display: none !important; }
</style>

<?php include 'includes/footer_admin.php'; ?>
