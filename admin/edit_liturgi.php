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
    $injil = $_POST['bacaan_injil'];
    $renungan = $_POST['renungan'];
    
    $stmt = $conn->prepare("UPDATE tbl_liturgi SET tanggal=?, kata_pengantar=?, bacaan_1=?, mazmur_tanggapan=?, bacaan_2=?, bacaan_injil=?, renungan=? WHERE id=?");
    $stmt->bind_param("sssssssi", $tanggal, $kata_pengantar, $bacaan_1, $mazmur, $bacaan_2, $injil, $renungan, $id);
    
    if ($stmt->execute()) {
        $pesan = "<div class='alert alert-success'>Data berhasil diperbarui! <a href='data_liturgi.php'>Kembali ke Data Liturgi</a></div>";
    }
}

// Mengambil data lama
$query = $conn->query("SELECT * FROM tbl_liturgi WHERE id = '$id'");
$data = $query->fetch_assoc();

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 main-content">
    <div class="pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold">Edit Warta Liturgi</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="card p-4 shadow-sm border-0">
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kata Pengantar</label>
                        <textarea class="form-control" name="kata_pengantar" rows="4"><?php echo htmlspecialchars($data['kata_pengantar']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Renungan</label>
                        <textarea class="form-control" name="renungan" rows="5"><?php echo htmlspecialchars($data['renungan']); ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Bacaan 1</label>
                        <input type="text" class="form-control" name="bacaan_1" value="<?php echo htmlspecialchars($data['bacaan_1']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mazmur Tanggapan</label>
                        <input type="text" class="form-control" name="mazmur_tanggapan" value="<?php echo htmlspecialchars($data['mazmur_tanggapan']); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-primary">Bacaan 2 (Khusus Minggu)</label>
                        <input type="text" class="form-control border-primary" name="bacaan_2" value="<?php echo htmlspecialchars($data['bacaan_2'] ?? ''); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bacaan Injil</label>
                        <input type="text" class="form-control" name="bacaan_injil" value="<?php echo htmlspecialchars($data['bacaan_injil']); ?>" required>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button type="submit" name="update" class="btn btn-dark px-4">Simpan Perubahan</button>
            <a href="data_liturgi.php" class="btn btn-outline-secondary px-4 ms-2">Batal</a>
        </form>
    </div>
</main>

<?php include 'includes/footer_admin.php'; ?>