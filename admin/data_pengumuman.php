<?php
// Katedral/admin/data_pengumuman.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";
// Logika Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt_del = $conn->prepare("DELETE FROM tbl_pengumuman WHERE id = ?");
    if ($stmt_del) {
        $stmt_del->bind_param("i", $id);
        if ($stmt_del->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data pengumuman berhasil dihapus!</div>";
        } else {
            $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal menghapus data: " . $conn->error . "</div>";
        }
    }
}

// Logika Toggle Status
if (isset($_GET['toggle_status'])) {
    $id = $_GET['toggle_status'];
    $current = $_GET['current'];
    $new_status = $current ? 0 : 1;
    $stmt_toggle = $conn->prepare("UPDATE tbl_pengumuman SET status_aktif = ? WHERE id = ?");
    if ($stmt_toggle) {
        $stmt_toggle->bind_param("ii", $new_status, $id);
        if ($stmt_toggle->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Status pengumuman berhasil diubah!</div>";
        }
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="flex justify-between items-center pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Data Pengumuman</h1>
        <a href="kelola_pengumuman.php" class="bg-katedral-gold hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded transition-colors shadow-sm">+ Add</a>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                        <th class="px-4 py-3 font-semibold">Kategori</th>
                        <th class="px-4 py-3 font-semibold">Periode</th>
                        <th class="px-4 py-3 font-semibold text-center">Status</th>
                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php
                    // Use @ to prevent errors if the table doesn't exist yet before user runs SQL
                    $query = @$conn->query("SELECT * FROM tbl_pengumuman ORDER BY id DESC");
                    
                    if ($query && $query->num_rows > 0):
                        while ($row = $query->fetch_assoc()):
                            $is_active = $row['status_aktif'] == 1;
                            $is_expired = strtotime($row['tanggal_selesai']) < strtotime('today');
                            $status_color = $is_active && !$is_expired ? 'bg-green-100 text-green-800' : ($is_active ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800');
                            $status_text = $is_active ? ($is_expired ? 'Expired' : 'Aktif') : 'Nonaktif';
                    ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-sm">
                            <strong class="text-katedral-charcoal font-medium"><?php echo htmlspecialchars($row['kategori']); ?></strong>
                            <div class="text-gray-500 text-xs mt-1 truncate max-w-xs"><?php echo htmlspecialchars(substr($row['isi_pengumuman'], 0, 50)) . '...'; ?></div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">
                            <?php 
                            if ($row['tanggal_mulai']) {
                                echo date('d-M-Y', strtotime($row['tanggal_mulai'])) . ' s.d ';
                            }
                            echo date('d-M-Y', strtotime($row['tanggal_selesai'])); 
                            ?>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full <?php echo $status_color; ?>"><?php echo $status_text; ?></span>
                        </td>
                        <td class="px-4 py-3 text-center space-x-1">
                            <a href="data_pengumuman.php?toggle_status=<?php echo $row['id']; ?>&current=<?php echo $row['status_aktif']; ?>" class="inline-block px-3 py-1 text-sm <?php echo $is_active ? 'text-yellow-600 border border-yellow-200 hover:bg-yellow-50' : 'text-green-600 border border-green-200 hover:bg-green-50'; ?> rounded transition-colors" title="<?php echo $is_active ? 'Nonaktifkan' : 'Aktifkan'; ?>"><?php echo $is_active ? 'Off' : 'On'; ?></a>
                            <a href="edit_pengumuman.php?id=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-blue-600 border border-blue-200 hover:bg-blue-50 rounded transition-colors">Edit</a>
                            <a href="data_pengumuman.php?hapus=<?php echo $row['id']; ?>" class="btn-delete-confirm inline-block px-3 py-1 text-sm text-red-600 border border-red-200 hover:bg-red-50 rounded transition-colors">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    else:
                    ?>
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada data pengumuman atau tabel belum dibuat.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
document.querySelectorAll('.btn-delete-confirm').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    const targetUrl = this.getAttribute('href');
    
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data yang dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#b8965a',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      customClass: {
        popup: 'rounded-4'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = targetUrl;
      }
    });
  });
});
</script>

<?php include 'includes/footer_admin.php'; ?>
