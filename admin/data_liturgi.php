<?php
// Katedral/admin/data_liturgi.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";
// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM tbl_liturgi WHERE id = '$id'");
    $pesan = "<div class='alert alert-success py-2'>Data liturgi berhasil dihapus!</div>";
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold">Data Warta Liturgi</h1>
        <a href="kelola_liturgi.php" class="btn btn-primary btn-sm">+ Add</a>
    </div>

    <?php echo $pesan; ?>

    <div class="card p-4 shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Bacaan 1</th>
                        <th>Injil</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_liturgi ORDER BY tanggal DESC");
                    while ($row = $query->fetch_assoc()):
                    ?>
                    <tr>
                        <td><strong><?php echo date('d-M-Y', strtotime($row['tanggal'])); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['bacaan_1']); ?></td>
                        <td><?php echo htmlspecialchars($row['bacaan_injil']); ?></td>
                        <td class="text-center">
                            <a href="edit_liturgi.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="data_liturgi.php?hapus=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'includes/footer_admin.php'; ?>