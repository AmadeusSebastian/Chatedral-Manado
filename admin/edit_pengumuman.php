<?php
// Katedral/admin/edit_pengumuman.php
session_start();
if (!isset($_SESSION['admin_id'])) { header("Location: index.php"); exit(); }
require_once 'includes/db_connect.php';

if (!isset($_GET['id'])) { header("Location: data_pengumuman.php"); exit(); }
$id = $_GET['id'];
$pesan = "";

// Proses Update Data
if (isset($_POST['update'])) {
    $kategori = $_POST['kategori'];
    $isi_pengumuman = $_POST['isi_pengumuman'];
    $tanggal_mulai = !empty($_POST['tanggal_mulai']) ? $_POST['tanggal_mulai'] : NULL;
    $tanggal_selesai = !empty($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : NULL;
    $status_aktif = isset($_POST['status_aktif']) ? 1 : 0;
    
    // Pernikahan fields
    $mempelai_pria_nama = !empty($_POST['mempelai_pria_nama']) ? $_POST['mempelai_pria_nama'] : NULL;
    $pria_ayah_nama = !empty($_POST['pria_ayah_nama']) ? $_POST['pria_ayah_nama'] : NULL;
    $pria_ibu_nama = !empty($_POST['pria_ibu_nama']) ? $_POST['pria_ibu_nama'] : NULL;
    $pria_anak_ke = !empty($_POST['pria_anak_ke']) ? $_POST['pria_anak_ke'] : NULL;
    $mempelai_wanita_nama = !empty($_POST['mempelai_wanita_nama']) ? $_POST['mempelai_wanita_nama'] : NULL;
    $wanita_ayah_nama = !empty($_POST['wanita_ayah_nama']) ? $_POST['wanita_ayah_nama'] : NULL;
    $wanita_ibu_nama = !empty($_POST['wanita_ibu_nama']) ? $_POST['wanita_ibu_nama'] : NULL;
    $wanita_anak_ke = !empty($_POST['wanita_anak_ke']) ? $_POST['wanita_anak_ke'] : NULL;
    $pembacaan_ke = !empty($_POST['pembacaan_ke']) ? $_POST['pembacaan_ke'] : NULL;
    $tanggal_rencana_nikah = !empty($_POST['tanggal_rencana_nikah']) ? $_POST['tanggal_rencana_nikah'] : NULL;

    // Liturgi fields
    $tanggal_tugas_misa = !empty($_POST['tanggal_tugas_misa']) ? $_POST['tanggal_tugas_misa'] : NULL;
    $misa_ke = !empty($_POST['misa_ke']) ? $_POST['misa_ke'] : NULL;
    $mc_nama = !empty($_POST['mc_nama']) ? $_POST['mc_nama'] : NULL;
    $animator_nama = !empty($_POST['animator_nama']) ? $_POST['animator_nama'] : NULL;
    $lektor1_nama = !empty($_POST['lektor1_nama']) ? $_POST['lektor1_nama'] : NULL;
    $lektor2_nama = !empty($_POST['lektor2_nama']) ? $_POST['lektor2_nama'] : NULL;
    $pemazmur_nama = !empty($_POST['pemazmur_nama']) ? $_POST['pemazmur_nama'] : NULL;
    $organis_nama = !empty($_POST['organis_nama']) ? $_POST['organis_nama'] : NULL;
    
    // Delimited arrays
    $cantores = isset($_POST['cantores']) && is_array($_POST['cantores']) ? implode(" | ", array_filter($_POST['cantores'])) : NULL;
    $petugas_khusus = isset($_POST['petugas_khusus']) && is_array($_POST['petugas_khusus']) ? implode(" | ", array_filter($_POST['petugas_khusus'])) : NULL;
    $kebersihan = isset($_POST['kebersihan']) && is_array($_POST['kebersihan']) ? implode(" | ", array_filter($_POST['kebersihan'])) : NULL;

    // Agenda Paroki fields
    $agenda_hari = !empty($_POST['agenda_hari']) ? $_POST['agenda_hari'] : NULL;
    $agenda_tanggal = !empty($_POST['agenda_tanggal']) ? $_POST['agenda_tanggal'] : NULL;
    $agenda_jam = isset($_POST['agenda_jam']) && is_array($_POST['agenda_jam']) ? json_encode(array_filter($_POST['agenda_jam'])) : NULL;
    $agenda_isi_kegiatan = isset($_POST['agenda_isi_kegiatan']) && is_array($_POST['agenda_isi_kegiatan']) ? json_encode(array_filter($_POST['agenda_isi_kegiatan'])) : NULL;

    $stmt = $conn->prepare("UPDATE tbl_pengumuman SET 
        kategori=?, isi_pengumuman=?, tanggal_mulai=?, tanggal_selesai=?, status_aktif=?,
        mempelai_pria_nama=?, pria_ayah_nama=?, pria_ibu_nama=?, pria_anak_ke=?,
        mempelai_wanita_nama=?, wanita_ayah_nama=?, wanita_ibu_nama=?, wanita_anak_ke=?,
        pembacaan_ke=?, tanggal_rencana_nikah=?,
        tanggal_tugas_misa=?, misa_ke=?, mc_nama=?, animator_nama=?, lektor1_nama=?, lektor2_nama=?, pemazmur_nama=?,
        cantores=?, organis_nama=?, petugas_khusus=?, kebersihan=?,
        agenda_hari=?, agenda_tanggal=?, agenda_jam=?, agenda_isi_kegiatan=?
        WHERE id=?");
        
    if ($stmt) {
        $stmt->bind_param("ssssisssisssiissssssssssssssssi", 
            $kategori, $isi_pengumuman, $tanggal_mulai, $tanggal_selesai, $status_aktif,
            $mempelai_pria_nama, $pria_ayah_nama, $pria_ibu_nama, $pria_anak_ke,
            $mempelai_wanita_nama, $wanita_ayah_nama, $wanita_ibu_nama, $wanita_anak_ke,
            $pembacaan_ke, $tanggal_rencana_nikah,
            $tanggal_tugas_misa, $misa_ke, $mc_nama, $animator_nama, $lektor1_nama, $lektor2_nama, $pemazmur_nama,
            $cantores, $organis_nama, $petugas_khusus, $kebersihan,
            $agenda_hari, $agenda_tanggal, $agenda_jam, $agenda_isi_kegiatan,
            $id
        );
        
        if ($stmt->execute()) {
            $pesan = "<div class='bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm'>Data pengumuman berhasil diperbarui! <a href='data_pengumuman.php' class='underline font-bold'>Kembali ke Data Pengumuman</a></div>";
        } else {
            $pesan = "<div class='bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm'>Gagal memperbarui data: " . $conn->error . "</div>";
        }
    }
}

// Mengambil data lama
$stmt_get = $conn->prepare("SELECT * FROM tbl_pengumuman WHERE id = ?");
if($stmt_get) {
    $stmt_get->bind_param("i", $id);
    $stmt_get->execute();
    $data = $stmt_get->get_result()->fetch_assoc();
} else {
    $data = null;
}

if (!$data) {
    header("Location: data_pengumuman.php");
    exit();
}

$cantores_arr = !empty($data['cantores']) ? explode(" | ", $data['cantores']) : [''];
$petugas_khusus_arr = !empty($data['petugas_khusus']) ? explode(" | ", $data['petugas_khusus']) : [''];
$kebersihan_arr = !empty($data['kebersihan']) ? explode(" | ", $data['kebersihan']) : [''];

$kategori_js = htmlspecialchars(json_encode($data['kategori']), ENT_QUOTES, 'UTF-8');
$cantores_js = htmlspecialchars(json_encode($cantores_arr), ENT_QUOTES, 'UTF-8');
$petugas_khusus_js = htmlspecialchars(json_encode($petugas_khusus_arr), ENT_QUOTES, 'UTF-8');
$kebersihan_js = htmlspecialchars(json_encode($kebersihan_arr), ENT_QUOTES, 'UTF-8');

$agendas_arr = [['jam' => '', 'kegiatan' => '']];
if ($data['kategori'] === 'Agenda Paroki' && !empty($data['agenda_jam']) && !empty($data['agenda_isi_kegiatan'])) {
    $jam_arr = json_decode($data['agenda_jam'], true) ?: [];
    $keg_arr = json_decode($data['agenda_isi_kegiatan'], true) ?: [];
    if (is_array($jam_arr) && is_array($keg_arr) && count($jam_arr) > 0) {
        $agendas_arr = [];
        for ($i = 0; $i < count($jam_arr); $i++) {
            $agendas_arr[] = [
                'jam' => $jam_arr[$i] ?? '',
                'kegiatan' => $keg_arr[$i] ?? ''
            ];
        }
    }
}
$agendas_js = htmlspecialchars(json_encode($agendas_arr), ENT_QUOTES, 'UTF-8');

include 'includes/header_admin.php';
include 'includes/sidebar_admin.php';
?>

<main class="flex-1 overflow-y-auto bg-gray-50 p-8">
    <div class="pb-4 mb-8 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-katedral-charcoal">Edit Pengumuman</h1>
    </div>

    <?php echo $pesan; ?>

    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100" x-data="{ kategori: <?php echo $kategori_js; ?>, cantores: <?php echo $cantores_js; ?>, petugas_khusus: <?php echo $petugas_khusus_js; ?>, kebersihan: <?php echo $kebersihan_js; ?>, agendas: <?php echo $agendas_js; ?> }">
        <form method="POST" action="">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Kolom Kiri -->
                <div class="md:w-1/2">
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Kategori</label>
                        <select x-model="kategori" name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" required>
                            <option value="Lainnya">Lainnya / Umum</option>
                            <option value="Pernikahan">Pernikahan</option>
                            <option value="Seksi/Petugas Liturgi">Seksi/Petugas Liturgi</option>
                            <option value="Agenda Paroki">Agenda Paroki</option>
                        </select>
                    </div>

                    <!-- Kategori Umum (Selalu Ada) -->
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2" x-text="kategori === 'Lainnya' || kategori === 'Agenda Paroki' ? 'Isi Pengumuman' : 'Catatan Tambahan (Opsional)'">Isi Pengumuman</label>
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="isi_pengumuman" rows="4"><?php echo htmlspecialchars($data['isi_pengumuman'] ?? ''); ?></textarea>
                    </div>

                    <!-- Kategori Pernikahan -->
                    <div x-show="kategori === 'Pernikahan'" x-cloak class="space-y-6">
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <h6 class="font-bold text-katedral-charcoal mb-4">Data Mempelai Pria</h6>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Mempelai Pria</label>
                                    <input type="text" name="mempelai_pria_nama" value="<?php echo htmlspecialchars($data['mempelai_pria_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                        <input type="text" name="pria_ayah_nama" value="<?php echo htmlspecialchars($data['pria_ayah_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                        <input type="text" name="pria_ibu_nama" value="<?php echo htmlspecialchars($data['pria_ibu_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Anak Ke-</label>
                                    <input type="number" name="pria_anak_ke" value="<?php echo htmlspecialchars($data['pria_anak_ke'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <h6 class="font-bold text-katedral-charcoal mb-4">Data Mempelai Wanita</h6>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Mempelai Wanita</label>
                                    <input type="text" name="mempelai_wanita_nama" value="<?php echo htmlspecialchars($data['mempelai_wanita_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                        <input type="text" name="wanita_ayah_nama" value="<?php echo htmlspecialchars($data['wanita_ayah_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                        <input type="text" name="wanita_ibu_nama" value="<?php echo htmlspecialchars($data['wanita_ibu_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Anak Ke-</label>
                                    <input type="number" name="wanita_anak_ke" value="<?php echo htmlspecialchars($data['wanita_anak_ke'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori Petugas Liturgi -->
                    <div x-show="kategori === 'Seksi/Petugas Liturgi'" x-cloak class="space-y-6">
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg space-y-4">
                            <h6 class="font-bold text-katedral-charcoal">Data Petugas Misa</h6>
                            
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Tugas (Misa Hari Minggu)</label>
                                    <input type="date" name="tanggal_tugas_misa" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold" value="<?php echo htmlspecialchars($data['tanggal_tugas_misa'] ?? ''); ?>">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Misa Ke-</label>
                                    <select name="misa_ke" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                        <option value="">Pilih Misa</option>
                                        <option value="1" <?php if(isset($data['misa_ke']) && $data['misa_ke'] == 1) echo 'selected'; ?>>Misa 1</option>
                                        <option value="2" <?php if(isset($data['misa_ke']) && $data['misa_ke'] == 2) echo 'selected'; ?>>Misa 2</option>
                                        <option value="3" <?php if(isset($data['misa_ke']) && $data['misa_ke'] == 3) echo 'selected'; ?>>Misa 3</option>
                                        <option value="4" <?php if(isset($data['misa_ke']) && $data['misa_ke'] == 4) echo 'selected'; ?>>Misa 4</option>
                                        <option value="5" <?php if(isset($data['misa_ke']) && $data['misa_ke'] == 5) echo 'selected'; ?>>Misa 5</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">MC</label>
                                    <input type="text" name="mc_nama" value="<?php echo htmlspecialchars($data['mc_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Animator</label>
                                    <input type="text" name="animator_nama" value="<?php echo htmlspecialchars($data['animator_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Lektor 1</label>
                                    <input type="text" name="lektor1_nama" value="<?php echo htmlspecialchars($data['lektor1_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Lektor 2</label>
                                    <input type="text" name="lektor2_nama" value="<?php echo htmlspecialchars($data['lektor2_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Pemazmur</label>
                                    <input type="text" name="pemazmur_nama" value="<?php echo htmlspecialchars($data['pemazmur_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-medium text-gray-700">Organis</label>
                                    <input type="text" name="organis_nama" value="<?php echo htmlspecialchars($data['organis_nama'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded">
                                </div>
                            </div>

                            <!-- Dynamic Array: Cantores -->
                            <div class="pt-2 border-t border-gray-200">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cantores</label>
                                <template x-for="(item, index) in cantores" :key="index">
                                    <div class="flex items-center gap-2 mb-2">
                                        <input type="text" x-model="cantores[index]" name="cantores[]" class="flex-1 px-3 py-2 border border-gray-300 rounded text-sm" placeholder="Nama Cantores">
                                        <button type="button" @click="if(cantores.length > 1) cantores.splice(index, 1)" class="text-red-500 hover:text-red-700 px-2">&times;</button>
                                    </div>
                                </template>
                                <button type="button" @click="if(cantores.length < 6) cantores.push('')" class="text-xs text-blue-600 font-medium">+ Tambah Cantores</button>
                            </div>

                            <!-- Dynamic Array: Petugas Khusus -->
                            <div class="pt-2 border-t border-gray-200">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Petugas Khusus</label>
                                <template x-for="(item, index) in petugas_khusus" :key="index">
                                    <div class="flex items-center gap-2 mb-2">
                                        <input type="text" x-model="petugas_khusus[index]" name="petugas_khusus[]" class="flex-1 px-3 py-2 border border-gray-300 rounded text-sm" placeholder="Nama/Kelompok">
                                        <button type="button" @click="if(petugas_khusus.length > 1) petugas_khusus.splice(index, 1)" class="text-red-500 hover:text-red-700 px-2">&times;</button>
                                    </div>
                                </template>
                                <button type="button" @click="if(petugas_khusus.length < 6) petugas_khusus.push('')" class="text-xs text-blue-600 font-medium">+ Tambah Petugas Khusus</button>
                            </div>

                            <!-- Dynamic Array: Kebersihan -->
                            <div class="pt-2 border-t border-gray-200">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kebersihan</label>
                                <template x-for="(item, index) in kebersihan" :key="index">
                                    <div class="flex items-center gap-2 mb-2">
                                        <input type="text" x-model="kebersihan[index]" name="kebersihan[]" class="flex-1 px-3 py-2 border border-gray-300 rounded text-sm" placeholder="Nama/Kelompok">
                                        <button type="button" @click="if(kebersihan.length > 1) kebersihan.splice(index, 1)" class="text-red-500 hover:text-red-700 px-2">&times;</button>
                                    </div>
                                </template>
                                <button type="button" @click="if(kebersihan.length < 6) kebersihan.push('')" class="text-xs text-blue-600 font-medium">+ Tambah Petugas Kebersihan</button>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori Agenda Paroki -->
                    <div x-show="kategori === 'Agenda Paroki'" x-cloak class="space-y-6">
                        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <h6 class="font-bold text-katedral-charcoal mb-4">Detail Agenda Paroki</h6>
                            <div class="space-y-4">
                                <div class="flex gap-4">
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Hari</label>
                                        <select name="agenda_hari" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                            <option value="">Pilih Hari</option>
                                            <option value="Senin" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Senin') echo 'selected'; ?>>Senin</option>
                                            <option value="Selasa" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Selasa') echo 'selected'; ?>>Selasa</option>
                                            <option value="Rabu" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Rabu') echo 'selected'; ?>>Rabu</option>
                                            <option value="Kamis" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Kamis') echo 'selected'; ?>>Kamis</option>
                                            <option value="Jumat" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Jumat') echo 'selected'; ?>>Jumat</option>
                                            <option value="Sabtu" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Sabtu') echo 'selected'; ?>>Sabtu</option>
                                            <option value="Minggu" <?php if(isset($data['agenda_hari']) && $data['agenda_hari'] == 'Minggu') echo 'selected'; ?>>Minggu</option>
                                        </select>
                                    </div>
                                    <div class="w-1/2">
                                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                                        <input type="date" name="agenda_tanggal" value="<?php echo htmlspecialchars($data['agenda_tanggal'] ?? ''); ?>" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                    </div>
                                </div>
                                <div class="pt-2 border-t border-gray-200">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Daftar Kegiatan</label>
                                    <template x-for="(agenda, index) in agendas" :key="index">
                                        <div class="flex items-start gap-4 mb-4 p-3 border border-gray-100 bg-white rounded">
                                            <div class="w-1/3">
                                                <label class="block text-xs text-gray-500 mb-1">Jam (Waktu)</label>
                                                <input type="time" x-model="agenda.jam" name="agenda_jam[]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold text-sm">
                                            </div>
                                            <div class="w-2/3 flex items-start gap-2">
                                                <div class="w-full">
                                                    <label class="block text-xs text-gray-500 mb-1">Isi Kegiatan</label>
                                                    <textarea x-model="agenda.kegiatan" name="agenda_isi_kegiatan[]" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold text-sm" placeholder="Deskripsi acara/kegiatan..."></textarea>
                                                </div>
                                                <button type="button" @click="if(agendas.length > 1) agendas.splice(index, 1)" class="mt-6 text-red-500 hover:text-red-700 p-1" title="Hapus baris ini">
                                                    <i class="bi bi-trash text-lg"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </template>
                                    <button type="button" @click="agendas.push({jam: '', kegiatan: ''})" class="text-sm text-blue-600 font-medium hover:text-blue-800 transition-colors">
                                        <i class="bi bi-plus-circle mr-1"></i> Tambah Kegiatan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan (Tanggal & Status) -->
                <div class="md:w-1/2">
                    <div x-show="kategori === 'Pernikahan'" x-cloak class="mb-5 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Rencana Pernikahan</label>
                            <input type="date" name="tanggal_rencana_nikah" value="<?php echo htmlspecialchars($data['tanggal_rencana_nikah'] ?? ''); ?>" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pengumuman Pernikahan Ke-</label>
                            <select name="pembacaan_ke" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-katedral-gold">
                                <option value="">Pilih</option>
                                <option value="1" <?php if(isset($data['pembacaan_ke']) && $data['pembacaan_ke'] == 1) echo 'selected'; ?>>Pertama Kali</option>
                                <option value="2" <?php if(isset($data['pembacaan_ke']) && $data['pembacaan_ke'] == 2) echo 'selected'; ?>>Kedua Kali</option>
                                <option value="3" <?php if(isset($data['pembacaan_ke']) && $data['pembacaan_ke'] == 3) echo 'selected'; ?>>Ketiga Kali</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Tanggal Mulai Tayang (Opsional)</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="tanggal_mulai" value="<?php echo htmlspecialchars($data['tanggal_mulai'] ?? ''); ?>">
                    </div>
                    
                    <div class="mb-5">
                        <label class="block font-medium text-gray-700 mb-2">Tanggal Selesai Tayang (Kadaluarsa)</label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold transition-colors" name="tanggal_selesai" value="<?php echo htmlspecialchars($data['tanggal_selesai'] ?? ''); ?>" required>
                        <p class="text-sm text-gray-500 mt-2">Pengumuman akan otomatis hilang setelah tanggal ini.</p>
                    </div>
                    
                    <div class="mb-5 flex items-center mt-6">
                        <input type="checkbox" id="status_aktif" name="status_aktif" class="w-5 h-5 text-katedral-gold focus:ring-katedral-gold border-gray-300 rounded" <?php echo $data['status_aktif'] ? 'checked' : ''; ?>>
                        <label for="status_aktif" class="ml-2 block font-medium text-gray-700">Tampilkan ke Publik (Aktif)</label>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200">
            <div class="flex items-center gap-4">
                <button type="submit" name="update" class="bg-katedral-charcoal hover:bg-gray-800 text-white font-medium py-3 px-8 rounded-lg transition-colors shadow-sm">Simpan Perubahan</button>
                <a href="data_pengumuman.php" class="inline-block px-8 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium rounded-lg transition-colors">Batal</a>
            </div>
        </form>
    </div>
</main>

<style>
    [x-cloak] { display: none !important; }
</style>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    var kategori = document.querySelector('select[name="kategori"]').value;
    var isi = document.querySelector('textarea[name="isi_pengumuman"]').value.trim();
    
    if (!kategori || !isi) {
        e.preventDefault();
        Swal.fire({
            title: 'Input Belum Lengkap!',
            text: 'Harap isi semua kolom wajib, tanggal, atau konten pengumuman sebelum menyimpan.',
            icon: 'error',
            confirmButtonColor: '#b8965a',
            customClass: { popup: 'rounded-4' }
        });
        return;
    }

    if (kategori === 'Seksi/Petugas Liturgi') {
        var misaKe = document.querySelector('select[name="misa_ke"]').value;
        var tanggal = document.querySelector('input[name="tanggal_tugas_misa"]').value;
        if (!misaKe || !tanggal) {
            e.preventDefault();
            Swal.fire({
              title: 'Input Belum Lengkap!',
              text: 'Harap isi semua kolom wajib, tanggal, atau konten pengumuman sebelum menyimpan.',
              icon: 'error',
              confirmButtonColor: '#b8965a',
              customClass: { popup: 'rounded-4' }
            });
        }
    }
});
</script>

<?php include 'includes/footer_admin.php'; ?>
