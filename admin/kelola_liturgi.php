<?php
// Katedral/admin/kelola_liturgi.php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
require_once 'includes/db_connect.php';

$pesan = "";
if (isset($_POST['simpan'])) {
    if (empty($_POST['tanggal']) || empty($_POST['bacaan_1']) || empty($_POST['bacaan_injil'])) {
        $pesan = "<div class='alert alert-danger bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menyimpan: Pastikan data wajib (Tanggal, Bacaan 1, Injil) telah diisi!</div>";
    } else {
        $tanggal = $_POST['tanggal'];
        $kata_pengantar = $_POST['kata_pengantar'];
        $bacaan_1 = $_POST['bacaan_1'];
        $mazmur = $_POST['mazmur_tanggapan'];
        $bacaan_2 = !empty($_POST['bacaan_2']) ? $_POST['bacaan_2'] : NULL;
        $bait_pengantar = !empty($_POST['bait_pengantar_injil']) ? $_POST['bait_pengantar_injil'] : NULL;
        $injil = $_POST['bacaan_injil'];
        $renungan = $_POST['renungan'];
        
        $stmt = $conn->prepare("INSERT INTO tbl_liturgi (tanggal, kata_pengantar, bacaan_1, mazmur_tanggapan, bacaan_2, bait_pengantar_injil, bacaan_injil, renungan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $tanggal, $kata_pengantar, $bacaan_1, $mazmur, $bacaan_2, $bait_pengantar, $injil, $renungan);
        
        if ($stmt->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data Warta Liturgi berhasil disimpan!</div>";
        } else {
            $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menyimpan data: " . $conn->error . "</div>";
        }
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Kelola Warta Liturgi</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <h5 class="font-bold text-lg mb-6 text-katedral-charcoal border-b border-gray-100 pb-2">Input Warta Liturgi Baru</h5>
        <form method="POST" action="">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2">
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Tanggal Liturgi</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="tanggal" id="tanggal" required>
                        <p class="text-sm text-gray-500 mt-2" id="info_hari">Pilih tanggal untuk menyesuaikan struktur.</p>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Kata Pengantar</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="kata_pengantar" rows="4" placeholder="Ketik kata pengantar di sini..."></textarea>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Renungan Mingguan/Harian</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="renungan" rows="5" placeholder="Ketik isi renungan di sini..."></textarea>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <div class="bg-gray-50 border border-gray-200 p-3 rounded-lg text-sm text-gray-600 mb-5 flex items-start">
                        <i class="bi bi-info-circle mr-2 text-katedral-gold text-lg leading-none"></i> 
                        <span>Cukup masukkan referensi ayat (Misal: <i>Yesaya 60:1-6</i>).</span>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Bacaan 1</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bacaan_1" placeholder="Contoh: Kejadian 1:1-5" required>
                    </div>
                    
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Mazmur Tanggapan</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="mazmur_tanggapan" placeholder="Contoh: Mzm. 23:1-3a, 3b-4">
                    </div>
                    
                    <div class="mb-5" id="container_bacaan_2" style="display: none;">
                        <label class="block font-bold text-katedral-gold mb-2">Bacaan 2 (Khusus Hari Minggu)</label>
                        <input type="text" class="w-full px-4 py-2 border border-katedral-gold rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors bg-orange-50" name="bacaan_2" id="bacaan_2" placeholder="Contoh: 1 Korintus 12:3b-7, 12-13">
                    </div>

                    <div class="mb-5" id="container_bait_pengantar">
                        <label class="block font-medium text-gray-700 mb-2">Bait Pengantar Injil</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bait_pengantar_injil" id="bait_pengantar_injil" placeholder="Contoh: Alleluya">
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Bacaan Injil</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="bacaan_injil" placeholder="Contoh: Yohanes 3:16-18" required>
                    </div>
                </div>
            </div>
            
            <hr class="my-6 border-gray-200">
            <button type="submit" name="simpan" class="bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-3 px-8 rounded-lg transition-colors shadow-sm">Simpan Ke Warta</button>
        </form>
    </div>
</main>

<script>
document.getElementById('tanggal').addEventListener('change', function() {
    let dateVal = this.value;
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
});

document.querySelector('form').addEventListener('submit', function(e) {
    var tanggal = document.querySelector('input[name="tanggal"]').value;
    var bacaan1 = document.querySelector('input[name="bacaan_1"]').value.trim();
    var mazmur = document.querySelector('input[name="mazmur_tanggapan"]').value.trim();
    var bait = document.querySelector('input[name="bait_pengantar_injil"]').value.trim();
    var injil = document.querySelector('input[name="bacaan_injil"]').value.trim();
    var renungan = document.querySelector('textarea[name="renungan"]').value.trim();
    
    var isIncomplete = !tanggal || !bacaan1 || !mazmur || !bait || !injil || !renungan;
    
    if (tanggal) {
        var day = new Date(tanggal).getDay();
        var bacaan2 = document.querySelector('input[name="bacaan_2"]').value.trim();
        if (day === 0 && !bacaan2) {
            isIncomplete = true;
        }
    }

    if (isIncomplete) {
        e.preventDefault();
        Swal.fire({
            title: 'Bacaan Liturgi Belum Lengkap!',
            text: 'Pastikan Tanggal, Bacaan Utama, Mazmur, Bait Pengantar, Injil, dan Renungan sudah terisi.',
            icon: 'error',
            confirmButtonColor: '#b8965a',
            customClass: { popup: 'rounded-4' }
        });
    }
});
</script>

<?php include 'includes/footer_admin.php'; ?>