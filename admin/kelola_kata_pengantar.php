<?php
// Katedral/admin/kelola_kata_pengantar.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";
if (isset($_POST['simpan'])) {
    if (empty($_POST['bulan']) || empty($_POST['tanggal']) || empty($_POST['kata_pengantar'])) {
        $pesan = "<div class='alert alert-danger bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menyimpan: Pastikan data wajib (Bulan, Tanggal, Kata Pengantar) telah diisi!</div>";
    } else {
        $bulan = $_POST['bulan'];
        $tanggal = $_POST['tanggal'];
        $is_hari_santo = isset($_POST['is_hari_santo']) ? 1 : 0;
        $nama_santo = !empty($_POST['nama_santo']) ? $_POST['nama_santo'] : NULL;
        $sejarah_santo = !empty($_POST['sejarah_santo']) ? $_POST['sejarah_santo'] : NULL;
        $kata_pengantar = $_POST['kata_pengantar'];
        $foto_santo = NULL;

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

    // 1. Cek duplikasi sebelum INSERT
    $check_stmt = $conn->prepare("SELECT id FROM tbl_kata_pengantar_harian WHERE bulan = ? AND tanggal = ?");
    $check_stmt->bind_param("ii", $bulan, $tanggal);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $pesan = "<div class='alert alert-danger bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Data Kata Pengantar untuk tanggal dan bulan ini sudah ada! Silakan gunakan menu Data Kata Pengantar untuk mengedit.</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO tbl_kata_pengantar_harian (bulan, tanggal, is_hari_santo, nama_santo, sejarah_santo, foto_santo, kata_pengantar) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("iiissss", $bulan, $tanggal, $is_hari_santo, $nama_santo, $sejarah_santo, $foto_santo, $kata_pengantar);
            try {
                if ($stmt->execute()) {
                    $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data berhasil disimpan!</div>";
                }
            } catch (mysqli_sql_exception $e) {
                $pesan = "<div class='alert alert-danger bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menyimpan data: " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        }
    }
}
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';

$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Input Kata Pengantar Harian</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100" x-data="{ isSanto: false }">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Kiri: Data Utama -->
                <div class="md:w-1/2">
                    <div class="flex gap-4 mb-5">
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700 mb-2">Tanggal</label>
                            <select name="tanggal" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" required>
                                <?php for($i=1; $i<=31; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block font-medium text-gray-700 mb-2">Bulan</label>
                            <select name="bulan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" required>
                                <?php foreach($nama_bulan as $index => $nama): ?>
                                    <option value="<?php echo $index + 1; ?>"><?php echo $nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Kata Pengantar Harian</label>
                        <textarea name="kata_pengantar" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" placeholder="Renungan singkat atau pengantar hari ini..." required></textarea>
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
                            <input type="text" name="nama_santo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" placeholder="Contoh: Santo Benediktus">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sejarah / Profil Singkat</label>
                            <textarea name="sejarah_santo" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold" placeholder="Profil atau kisah hidup santo/santa..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto/Ilustrasi (Opsional)</label>
                            <input type="file" name="foto_santo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-white text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200">
            <button type="submit" name="simpan" class="bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-3 px-8 rounded-lg transition-colors shadow-sm">Simpan Data</button>
        </form>
    </div>
</main>

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    var tanggal = document.querySelector('select[name="tanggal"]').value;
    var bulan = document.querySelector('select[name="bulan"]').value;
    var kataPengantar = document.querySelector('textarea[name="kata_pengantar"]').value.trim();
    var isSanto = document.querySelector('input[name="is_hari_santo"]').checked;
    
    if (!tanggal || !bulan || !kataPengantar) {
        e.preventDefault();
        Swal.fire({
            title: 'Data Kata Pengantar Kosong!',
            text: 'Judul, isi pengantar, tanggal, dan foto wajib dilengkapi terlebih dahulu.',
            icon: 'error',
            confirmButtonColor: '#b8965a',
            customClass: { popup: 'rounded-4' }
        });
        return;
    }

    if (isSanto) {
        var namaSanto = document.querySelector('input[name="nama_santo"]').value.trim();
        var fotoSanto = document.querySelector('input[name="foto_santo"]').value;
        if (!namaSanto || !fotoSanto) {
            e.preventDefault();
            Swal.fire({
                title: 'Data Kata Pengantar Kosong!',
                text: 'Judul, isi pengantar, tanggal, dan foto wajib dilengkapi terlebih dahulu.',
                icon: 'error',
                confirmButtonColor: '#b8965a',
                customClass: { popup: 'rounded-4' }
            });
        }
    }
});
</script>

<?php include 'includes/footer_admin.php'; ?>
