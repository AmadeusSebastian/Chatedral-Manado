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
    $tanggal = $_POST['tanggal'];
    $kata_pengantar = $_POST['kata_pengantar'];
    $bacaan_1 = $_POST['bacaan_1'];
    $mazmur = $_POST['mazmur_tanggapan'];
    $bacaan_2 = !empty($_POST['bacaan_2']) ? $_POST['bacaan_2'] : NULL;
    $injil = $_POST['bacaan_injil'];
    $renungan = $_POST['renungan'];
    
    $stmt = $conn->prepare("INSERT INTO tbl_liturgi (tanggal, kata_pengantar, bacaan_1, mazmur_tanggapan, bacaan_2, bacaan_injil, renungan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $tanggal, $kata_pengantar, $bacaan_1, $mazmur, $bacaan_2, $injil, $renungan);
    
    if ($stmt->execute()) {
        $pesan = "<div class='alert alert-success'>Data Warta Liturgi berhasil disimpan!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menyimpan data: " . $conn->error . "</div>";
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold">Kelola Warta Liturgi</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="card p-4 shadow-sm border-0">
        <h5 class="mb-4">Input Warta Liturgi Baru</h5>
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Liturgi</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        <small class="text-muted" id="info_hari">Pilih tanggal untuk menyesuaikan struktur.</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Kata Pengantar</label>
                        <textarea class="form-control" name="kata_pengantar" rows="4" placeholder="Ketik kata pengantar di sini..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Renungan Mingguan/Harian</label>
                        <textarea class="form-control" name="renungan" rows="5" placeholder="Ketik isi renungan di sini..."></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="alert alert-secondary py-2 small mb-3">
                        <i class="bi bi-info-circle me-1"></i> Cukup masukkan referensi ayat (Misal: <i>Yesaya 60:1-6</i>).
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bacaan 1</label>
                        <input type="text" class="form-control" name="bacaan_1" placeholder="Contoh: Kejadian 1:1-5" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Mazmur Tanggapan</label>
                        <input type="text" class="form-control" name="mazmur_tanggapan" placeholder="Contoh: Mzm. 23:1-3a, 3b-4">
                    </div>
                    
                    <div class="mb-3" id="container_bacaan_2" style="display: none;">
                        <label class="form-label text-primary fw-bold">Bacaan 2 (Khusus Hari Minggu)</label>
                        <input type="text" class="form-control border-primary" name="bacaan_2" id="bacaan_2" placeholder="Contoh: 1 Korintus 12:3b-7, 12-13">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bacaan Injil</label>
                        <input type="text" class="form-control" name="bacaan_injil" placeholder="Contoh: Yohanes 3:16-18" required>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            <button type="submit" name="simpan" class="btn btn-dark px-4">Simpan Ke Warta</button>
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
        infoHari.innerHTML = "Hari: <span class='fw-bold text-dark'>" + namaHari[day] + "</span>";

        if(day === 0) { 
            containerBacaan2.style.display = 'block';
        } else { 
            containerBacaan2.style.display = 'none';
            inputBacaan2.value = ''; 
        }
    }
});
</script>

<?php include 'includes/footer_admin.php'; ?>