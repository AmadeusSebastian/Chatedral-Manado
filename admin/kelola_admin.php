<?php
// Katedral/admin/kelola_admin.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";

// Tambah Admin Baru
if (isset($_POST['tambah_admin'])) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    
    // Cek username ganda
    $stmt_cek = $conn->prepare("SELECT id FROM tbl_admin WHERE username = ?");
    $stmt_cek->bind_param("s", $username);
    $stmt_cek->execute();
    $cek = $stmt_cek->get_result();
    
    if ($cek->num_rows > 0) {
        $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Username sudah digunakan!</div>";
    } else {
        $stmt_insert = $conn->prepare("INSERT INTO tbl_admin (username, password) VALUES (?, ?)");
        $stmt_insert->bind_param("ss", $username, $password);
        $stmt_insert->execute();
        $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Admin baru berhasil ditambahkan!</div>";
    }
}

// Hapus Admin
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Cegah admin menghapus dirinya sendiri
    if ($id != $_SESSION['admin_id']) {
        $stmt_del = $conn->prepare("DELETE FROM tbl_admin WHERE id = ?");
        $stmt_del->bind_param("i", $id);
        $stmt_del->execute();
        $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Admin berhasil dihapus!</div>";
    } else {
        $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Anda tidak bisa menghapus akun yang sedang digunakan!</div>";
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Kelola Akses Admin</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Form Tambah Admin -->
        <div class="lg:w-1/3">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h6 class="font-bold mb-4 text-katedral-charcoal text-lg border-b border-gray-100 pb-2">Tambah Admin Baru</h6>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="password" required>
                    </div>
                    <button type="submit" name="tambah_admin" class="w-full bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-lg transition-colors">Submit</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Admin -->
        <div class="lg:w-2/3">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h6 class="font-bold mb-4 text-katedral-charcoal text-lg border-b border-gray-100 pb-2">Daftar Admin Aktif</h6>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">
                                <th class="px-4 py-3 font-semibold">No</th>
                                <th class="px-4 py-3 font-semibold">Username</th>
                                <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php
                            $no = 1;
                            $query = $conn->query("SELECT * FROM tbl_admin");
                            while ($row = $query->fetch_assoc()):
                            ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-sm text-gray-600"><?php echo $no++; ?></td>
                                <td class="px-4 py-3">
                                    <strong class="text-katedral-charcoal font-medium"><?php echo htmlspecialchars($row['username']); ?></strong>
                                    <?php if($row['id'] == $_SESSION['admin_id']) echo "<span class='inline-block ml-2 px-2 py-0.5 bg-green-100 text-green-800 text-xs rounded-full font-medium'>Anda</span>"; ?>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <?php if($row['id'] != $_SESSION['admin_id']): ?>
                                        <a href="kelola_admin.php?hapus=<?php echo $row['id']; ?>" class="inline-block px-3 py-1 text-sm text-red-600 border border-red-200 hover:bg-red-50 rounded transition-colors" onclick="event.preventDefault(); showConfirmModal('Anda yakin ingin menghapus admin ini?', this.href);">Hapus</a>
                                    <?php else: ?>
                                        <button class="inline-block px-3 py-1 text-sm text-gray-400 border border-gray-200 bg-gray-50 rounded cursor-not-allowed" disabled>Hapus</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer_admin.php'; ?>