<?php
// Katedral/admin/edit_liturgi.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

if (!isset($_GET['id'])) { header("Location: data_liturgi.php"); exit(); }
$id = $_GET['id'];
$pesan = "";

// Proses Update Data
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $kata_pengantar = $_POST['kata_pengantar'];
    $bacaan_1 = $_POST['bacaan_1'];
    $mazmur = $_POST['mazmur_tanggapan'];
    $bacaan_2 = !empty($_POST['bacaan_2']) ? $_POST['bacaan_2'] : NULL;
    $bait_pengantar = !empty($_POST['bait_pengantar_injil']) ? $_POST['bait_pengantar_injil'] : NULL;
    $injil = $_POST['bacaan_injil'];
    $renungan = $_POST['renungan'];
    
    $stmt = $conn->prepare("UPDATE tbl_liturgi SET tanggal=?, kata_pengantar=?, bacaan_1=?, mazmur_tanggapan=?, bacaan_2=?, bait_pengantar_injil=?, bacaan_injil=?, renungan=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $tanggal, $kata_pengantar, $bacaan_1, $mazmur, $bacaan_2, $bait_pengantar, $injil, $renungan, $id);
    
    if ($stmt->execute()) {
        $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data berhasil diperbarui! <a href='data_liturgi.php' class='underline font-bold'>Kembali ke Data Liturgi</a></div>";
    } else {
        $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal memperbarui data: " . $conn->error . "</div>";
    }
}

// Mengambil data lama
$stmt_get = $conn->prepare("SELECT * FROM tbl_liturgi WHERE id = ?");
$stmt_get->bind_param("i", $id);
$stmt_get->execute();
$data = $stmt_get->get_result()->fetch_assoc();

if (!$data) {
    header("Location: data_liturgi.php");
    exit();
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Edit Warta Liturgi</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <form method="POST" action="">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2">
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Tanggal Liturgi</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="tanggal" id="tanggal" value="<?php echo htmlspecialchars($data['tanggal']); ?>" required>
                        <p class="text-sm text-gray-500 mt-2" id="info_hari"></p>
                    </div>
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Kata Pengantar</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="kata_pengantar" rows="4"><?php echo htmlspecialchars($data['kata_pengantar']); ?></textarea>
                    </div>
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Renungan</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="renungan" rows="5"><?php echo htmlspecialchars($data['renungan']); ?></textarea>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Bacaan 1</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bacaan_1" value="<?php echo htmlspecialchars($data['bacaan_1']); ?>" required>
                    </div>
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Mazmur Tanggapan</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="mazmur_tanggapan" value="<?php echo htmlspecialchars($data['mazmur_tanggapan']); ?>">
                    </div>
                    <div class="mb-5" id="container_bacaan_2" style="display: <?php echo date('w', strtotime($data['tanggal'])) == 0 ? 'block' : 'none'; ?>;">
                        <label class="block font-bold text-katedral-gold mb-2">Bacaan 2 (Khusus Minggu)</label>
                        <input type="text" class="w-full px-4 py-2 border border-katedral-gold rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors bg-orange-50" name="bacaan_2" id="bacaan_2" value="<?php echo htmlspecialchars($data['bacaan_2'] ?? ''); ?>">
                    </div>
                    <div class="mb-5" id="container_bait_pengantar">
                        <label class="block font-medium text-gray-700 mb-2">Bait Pengantar Injil</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bait_pengantar_injil" id="bait_pengantar_injil" value="<?php echo htmlspecialchars($data['bait_pengantar_injil'] ?? ''); ?>">
                    </div>
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Bacaan Injil</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bacaan_injil" value="<?php echo htmlspecialchars($data['bacaan_injil']); ?>" required>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200">
            <div class="flex items-center gap-4">
                <button type="submit" name="update" class="bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-3 px-8 rounded-lg transition-colors shadow-sm">Simpan Perubahan</button>
                <a href="data_liturgi.php" class="inline-block px-8 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-lg transition-colors">Batal</a>
            </div>
        </form>
    </div>
</main>

<script>
function updateHariVisibility() {
    let dateVal = document.getElementById('tanggal').value;
    if(dateVal) {
        let dateObj = new Date(dateVal);
        let day = dateObj.getDay(); 
        let containerBacaan2 = document.getElementById('container_bacaan_2');
        let inputBacaan2 = document.getElementById('bacaan_2');
        let infoHari = document.getElementById('info_hari');
        
        let namaHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        infoHari.innerHTML = "Hari: <span class='font-bold text-katedral-charcoal'>" + namaHari[day] + "</span>";

        if(day === 0) { 
            containerBacaan2.style.display = 'block';
        } else { 
            containerBacaan2.style.display = 'none';
            inputBacaan2.value = ''; 
        }
    }
}
document.getElementById('tanggal').addEventListener('change', updateHariVisibility);
// Run once on load to set initial state
updateHariVisibility();
</script>

<?php include 'includes/footer_admin.php'; ?>