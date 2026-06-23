<?php
// Katedral/user/includes/sidebar.php

// 1. Membuat Format Tanggal Hari Ini (Bahasa Indonesia)
$nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$nama_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

$hari_ini = $nama_hari[date('w')];
$tgl_sekarang = date('j') . " " . $nama_bulan[date('n')] . " " . date('Y');

// 2. Mengambil data liturgi KHUSUS UNTUK HARI INI SAJA
$query_liturgi = $conn->query("SELECT * FROM tbl_liturgi WHERE tanggal = CURDATE() LIMIT 1");
$liturgi = $query_liturgi->fetch_assoc();
?>

<!-- Widget Tanggal Hari Ini -->
<div class="card p-3 mb-4 shadow-sm border-0 bg-dark text-white text-center rounded">
    <small class="text-uppercase" style="letter-spacing: 1px;">Hari Ini</small>
    <h6 class="mb-0 fw-bold mt-1"><?php echo $hari_ini . ", " . $tgl_sekarang; ?></h6>
</div>

<!-- Widget Warta Liturgi -->
<div class="card p-4 mb-4 shadow-sm border-0">
    <h5 class="sidebar-title">Warta Liturgi</h5>
    
    <?php if ($liturgi): ?>
        
        <?php 
        // Format tanggal liturgi ke Bahasa Indonesia
        $tgl_db = strtotime($liturgi['tanggal']);
        $hari_liturgi = $nama_hari[date('w', $tgl_db)];
        $tgl_liturgi_format = date('j', $tgl_db) . " " . $nama_bulan[date('n', $tgl_db)] . " " . date('Y', $tgl_db);
        ?>
        
        <p class="small mb-3">
            <span class="badge bg-primary"><i class="bi bi-calendar3"></i> <?php echo $hari_liturgi . ", " . $tgl_liturgi_format; ?></span>
        </p>
        
        <?php if(!empty($liturgi['kata_pengantar'])): ?>
            <div class="mb-3 small">
                <strong>Kata Pengantar:</strong><br>
                <?php echo nl2br(htmlspecialchars($liturgi['kata_pengantar'])); ?>
            </div>
        <?php endif; ?>

        <ul class="list-unstyled small">
            <li class="mb-2"><strong>Bacaan 1:</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_1']); ?></li>
            
            <?php if(!empty($liturgi['mazmur_tanggapan'])): ?>
                <li class="mb-2"><strong>Mazmur:</strong> <br> <?php echo htmlspecialchars($liturgi['mazmur_tanggapan']); ?></li>
            <?php endif; ?>

            <?php if(!empty($liturgi['bacaan_2'])): ?>
                <li class="mb-2 text-primary"><strong>Bacaan 2:</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_2']); ?></li>
            <?php endif; ?>

            <li class="mb-2"><strong>Injil:</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_injil']); ?></li>
        </ul>

        <?php if(!empty($liturgi['renungan'])): ?>
            <div class="mt-3 p-3 bg-light rounded small border">
                <strong>Renungan:</strong><br>
                <?php echo nl2br(htmlspecialchars($liturgi['renungan'])); ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <!-- Tampilan jika tidak ada data untuk HARI INI -->
        <div class="alert alert-light border text-center small text-muted py-4 mb-0">
            <i class="bi bi-journal-x d-block fs-3 mb-2 text-secondary"></i>
            Belum terdapat bacaan liturgi untuk hari ini.
        </div>
    <?php endif; ?>
</div>

<!-- Bagian Doa Bahasa Indonesia -->
<div class="card p-4 mb-4 shadow-sm border-0">
    <h5 class="sidebar-title">Doa Bahasa Indonesia</h5>
    <a href="doa_indonesia.php?doa=bapa-kami" class="doa-link">Bapa Kami</a>
    <a href="doa_indonesia.php?doa=salam-maria" class="doa-link">Salam Maria</a>
    <a href="doa_indonesia.php?doa=aku-percaya" class="doa-link">Aku Percaya (Singkat)</a>
    <a href="doa_indonesia.php?doa=saya-mengaku" class="doa-link">Saya Mengaku</a>
    <a href="doa_indonesia.php?doa=malaikat-tuhan" class="doa-link">Malaikat Tuhan (Angelus)</a>
    <a href="doa_indonesia.php" class="btn btn-sm btn-outline-primary mt-3 w-100">Lihat Semua Doa Dasar</a>
</div>

<!-- Bagian Doa & Nyanyian Latin -->
<div class="card p-4 mb-4 shadow-sm border-0">
    <h5 class="sidebar-title">Kumpulan Doa Latin</h5>
    <a href="doa_latin.php?doa=pater-noster" class="doa-link">Pater Noster (Bapa Kami)</a>
    <a href="doa_latin.php?doa=ave-maria" class="doa-link">Ave Maria (Salam Maria)</a>
    <a href="doa_latin.php?doa=credo-nicea" class="doa-link">Credo (Syahadat Nicea)</a>
    <a href="doa_latin.php?doa=confiteor" class="doa-link">Confiteor (Saya Mengaku)</a>
    <a href="doa_latin.php" class="btn btn-sm btn-outline-dark mt-3 w-100">Lihat Semua Doa</a>
</div>

<div class="card p-4 shadow-sm border-0">
    <h5 class="sidebar-title">Nyanyian Latin</h5>
    <a href="doa_latin.php?nyanyian=vidi-aquam" class="doa-link">Vidi Aquam</a>
    <a href="doa_latin.php?nyanyian=pange-lingua" class="doa-link">Pange Lingua</a>
    <a href="doa_latin.php?nyanyian=tantum-ergo" class="doa-link">Tantum Ergo</a>
    <a href="doa_latin.php?nyanyian=panis-angelicus" class="doa-link">Panis Angelicus</a>
    <a href="doa_latin.php" class="btn btn-sm btn-outline-dark mt-3 w-100">Lihat Semua Nyanyian</a>
</div>