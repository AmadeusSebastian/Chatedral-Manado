<?php
// Katedral/admin/data_kata_pengantar.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";
// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt_del = $conn->prepare("DELETE FROM tbl_kata_pengantar_harian WHERE id = ?");
    if ($stmt_del) {
        $stmt_del->bind_param("i", $id);
        if ($stmt_del->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data berhasil dihapus!</div>";
        } else {
            $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menghapus data: " . $conn->error . "</div>";
        }
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';

// Array Nama Bulan
$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Data Kata Pengantar Harian</h1>
        <a href="kelola_kata_pengantar.php" class="bg-katedral-gold hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded transition-colors shadow-sm">+ Add Data</a>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="px-4 py-3 font-semibold">Tanggal & Bulan</th>
                        <th class="px-4 py-3 font-semibold">Tipe</th>
                        <th class="px-4 py-3 font-semibold">Isi / Santo</th>
                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php
                    $query = $conn->query("SELECT * FROM tbl_kata_pengantar_harian ORDER BY bulan ASC, tanggal ASC");
                    
                    if ($query && $query->num_rows > 0):
                        while ($row = $query->fetch_assoc()):
                    ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm font-medium text-katedral-charcoal">
                            <?php echo str_pad($row['tanggal'], 2, '0', STR_PAD_LEFT) . ' ' . $nama_bulan[$row['bulan'] - 1]; ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php if ($row['is_hari_santo']): ?>
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Hari Santo</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Biasa</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">
                            <?php if ($row['is_hari_santo']): ?>
                                <strong><?php echo htmlspecialchars($row['nama_santo']); ?></strong><br>
                            <?php endif; ?>
                            <?php echo htmlspecialchars(substr($row['kata_pengantar'], 0, 50)) . '...'; ?>
                        </td>
                        <td class="px-4 py-3 text-center space-x-1">
                            <a href="edit_kata_pengantar.php?id=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-blue-600 border border-blue-200 hover:bg-blue-50 rounded transition-colors">Edit</a>
                            <a href="data_kata_pengantar.php?hapus=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-red-600 border border-red-200 hover:bg-red-50 rounded transition-colors" onclick="event.preventDefault(); showConfirmModal('Anda yakin ingin menghapus data ini?', this.href);">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else:
                    ?>
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada data.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'includes/footer_admin.php'; ?>
