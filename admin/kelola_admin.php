<?php
// Katedral/admin/kelola_admin.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

$pesan = "";

// Tambah Admin Baru
if (isset($_POST['tambah_admin'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    
    // Cek username ganda
    $cek = $conn->query("SELECT * FROM tbl_admin WHERE username = '$username'");
    if ($cek->num_rows > 0) {
        $pesan = "<div class='alert alert-danger py-2'>Username sudah digunakan!</div>";
    } else {
        $conn->query("INSERT INTO tbl_admin (username, password) VALUES ('$username', '$password')");
        $pesan = "<div class='alert alert-success py-2'>Admin baru berhasil ditambahkan!</div>";
    }
}

// Hapus Admin
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Cegah admin menghapus dirinya sendiri
    if ($id != $_SESSION['admin_id']) {
        $conn->query("DELETE FROM tbl_admin WHERE id = '$id'");
        $pesan = "<div class='alert alert-success py-2'>Admin berhasil dihapus!</div>";
    } else {
        $pesan = "<div class='alert alert-danger py-2'>Anda tidak bisa menghapus akun yang sedang digunakan!</div>";
    }
}

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 main-content">
    <div class="pb-2 mb-4 border-bottom">
        <h1 class="h3 fw-bold">Kelola Akses Admin</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="row">
        <!-- Form Tambah Admin -->
        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow-sm border-0">
                <h6 class="fw-bold mb-3">Tambah Admin Baru</h6>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label small text-muted">Username</label>
                        <input type="text" class="form-control" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small text-muted">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" name="tambah_admin" class="btn btn-dark w-100">Simpan Admin</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Admin -->
        <div class="col-md-8">
            <div class="card p-4 shadow-sm border-0">
                <h6 class="fw-bold mb-3">Daftar Admin Aktif</h6>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $conn->query("SELECT * FROM tbl_admin");
                            while ($row = $query->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <strong><?php echo htmlspecialchars($row['username']); ?></strong>
                                    <?php if($row['id'] == $_SESSION['admin_id']) echo "<span class='badge bg-success ms-2'>Anda</span>"; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($row['id'] != $_SESSION['admin_id']): ?>
                                        <a href="kelola_admin.php?hapus=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus admin ini?');">Hapus</a>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-secondary" disabled>Hapus</button>
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