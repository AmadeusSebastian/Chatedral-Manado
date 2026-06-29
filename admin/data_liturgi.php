<?php
// Katedral/admin/data_liturgi.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";
// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt_del = $conn->prepare("DELETE FROM tbl_liturgi WHERE id = ?");
    $stmt_del->bind_param("i", $id);
    if ($stmt_del->execute()) {
        $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data liturgi berhasil dihapus!</div>";
    } else {
        $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menghapus data: " . $conn->error . "</div>";
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Data Warta Liturgi</h1>
        <a href="kelola_liturgi.php" class="bg-katedral-gold hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded transition-colors shadow-sm">+ Add</a>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                        <th class="px-4 py-3 font-semibold">Bacaan 1</th>
                        <th class="px-4 py-3 font-semibold">Injil</th>
                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_liturgi ORDER BY tanggal DESC");
                    while ($row = $query->fetch_assoc()):
                    ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm text-gray-800 font-medium"><?php echo date('d-M-Y', strtotime($row['tanggal'])); ?></td>
                        <td class="px-4 py-3 text-sm text-gray-600"><?php echo htmlspecialchars($row['bacaan_1']); ?></td>
                        <td class="px-4 py-3 text-sm text-gray-600"><?php echo htmlspecialchars($row['bacaan_injil']); ?></td>
                        <td class="px-4 py-3 text-center">
                            <a href="edit_liturgi.php?id=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-blue-600 border border-blue-200 hover:bg-blue-50 rounded transition-colors mr-1">Edit</a>
                            <a href="data_liturgi.php?hapus=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-red-600 border border-red-200 hover:bg-red-50 rounded transition-colors" onclick="event.preventDefault(); showConfirmModal('Anda yakin ingin menghapus data ini?', this.href);">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'includes/footer_admin.php'; ?>