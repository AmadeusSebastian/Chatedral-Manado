<?php
// Katedral/user/includes/sidebar.php

// 1. Membuat Format Tanggal Hari Ini (Bahasa Indonesia)
$nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$nama_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

$hari_ini = $nama_hari[date('w')];
$tgl_sekarang = date('j') . " " . $nama_bulan[date('n')] . " " . date('Y');

// 2. Mengambil data liturgi KHUSUS UNTUK HARI INI SAJA
$today_date = date('Y-m-d');
$query_liturgi = $conn->query("SELECT * FROM tbl_liturgi WHERE tanggal = '$today_date' LIMIT 1");
$liturgi = $query_liturgi ? $query_liturgi->fetch_assoc() : null;
?>

<!-- Widget Tanggal Hari Ini -->
<div class="bg-katedral-charcoal text-white p-4 mb-6 rounded-xl shadow-sm text-center">
    <small class="uppercase tracking-widest text-xs text-gray-300">Hari Ini</small>
    <h6 class="mb-0 font-bold mt-1 text-lg"><?php echo $hari_ini . ", " . $tgl_sekarang; ?></h6>
</div>

<!-- Widget Jadwal Misa -->
<div class="bg-white mb-6 rounded-2xl shadow-sm border border-katedral-gold/20 overflow-hidden">
    <div class="bg-katedral-charcoal p-4 flex items-center gap-3">
        <i class="bi bi-clock text-katedral-gold text-xl"></i>
        <h4 class="font-serif font-bold text-white text-lg m-0 tracking-wide">Jadwal Misa & Sakramen Tobat</h4>
    </div>
    
    <div class="p-0">
        <div class="p-4 border-b border-gray-100 hover:bg-katedral-cream/40 transition-colors">
            <div class="flex items-center gap-2 mb-3">
                <i class="bi bi-calendar-heart text-katedral-gold"></i>
                <span class="font-bold text-katedral-charcoal">Hari Minggu</span>
            </div>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa I</span> <span class="font-semibold">06.00</span></div>
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa II</span> <span class="font-semibold">08.30</span></div>
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa III</span> <span class="font-semibold">11.00</span></div>
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa IV</span> <span class="font-semibold">17.00</span></div>
                <div class="flex justify-between items-center bg-katedral-gold/10 px-3 py-2 rounded-lg border border-katedral-gold/20 col-span-2"><span class="text-katedral-gold font-medium">Misa V</span> <span class="font-bold text-katedral-charcoal">19.00</span></div>
            </div>
        </div>

        <div class="p-4 border-b border-gray-100 hover:bg-katedral-cream/40 transition-colors">
            <div class="flex items-center gap-2 mb-3">
                <i class="bi bi-calendar3 text-katedral-gold"></i>
                <span class="font-bold text-katedral-charcoal">Harian (Senin - Jumat)</span>
            </div>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa I</span> <span class="font-semibold">05.30</span></div>
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa II</span> <span class="font-semibold">18.00</span></div>
            </div>
        </div>

        <div class="p-4 border-b border-gray-100 hover:bg-katedral-cream/40 transition-colors">
            <div class="flex items-center gap-2 mb-3">
                <i class="bi bi-calendar-week text-katedral-gold"></i>
                <span class="font-bold text-katedral-charcoal">Harian (Sabtu)</span>
            </div>
            <div class="grid grid-cols-1 gap-2 text-sm">
                <div class="flex justify-between items-center bg-gray-50 px-3 py-2 rounded-lg border border-gray-100"><span class="text-gray-500">Misa I</span> <span class="font-semibold">05.30</span></div>
            </div>
        </div>

        <div class="p-4 bg-katedral-cream/50 hover:bg-katedral-cream transition-colors">
            <div class="flex items-center gap-2 mb-2">
                <i class="bi bi-person-hearts text-katedral-gold"></i>
                <span class="font-bold text-katedral-charcoal">Sakramen Tobat</span>
            </div>
            <p class="text-sm text-gray-700 ml-6 flex flex-col">
                <span class="font-medium">Senin - Jumat : 18.00</span>
                <span class="italic text-xs text-gray-500 mt-1">*Dilayani setelah misa sore</span>
            </p>
        </div>
    </div>
</div>

<!-- Widget Warta Liturgi -->
<?php if (!isset($hide_liturgi_sidebar) || !$hide_liturgi_sidebar): ?>
<div class="bg-white p-6 mb-6 rounded-xl shadow-sm border border-gray-100">
    <h5 style="text-align: center;" class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif">Warta Liturgi</h5>
    
    <?php if ($liturgi): ?>
        
        <?php 
        // Format tanggal liturgi ke Bahasa Indonesia
        $tgl_db = strtotime($liturgi['tanggal']);
        $hari_liturgi = $nama_hari[date('w', $tgl_db)];
        $tgl_liturgi_format = date('j', $tgl_db) . " " . $nama_bulan[date('n', $tgl_db)] . " " . date('Y', $tgl_db);
        ?>
        
        <p class="text-sm mb-4">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-katedral-gold text-white">
                <i class="bi bi-calendar3 mr-1.5"></i> <?php echo $hari_liturgi . ", " . $tgl_liturgi_format; ?>
            </span>
        </p>
        
        <?php if(!empty($liturgi['kata_pengantar'])): ?>
            <div class="mb-4 text-sm text-gray-600">
                <strong class="text-katedral-charcoal">Kata Pengantar :</strong><br>
                <?php echo nl2br(htmlspecialchars($liturgi['kata_pengantar'])); ?>
            </div>
        <?php endif; ?>

        <ul class="space-y-3 text-sm text-gray-600">
            <li><strong class="text-katedral-charcoal">Bacaan 1 :</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_1']); ?></li>
            
            <?php if(!empty($liturgi['mazmur_tanggapan'])): ?>
                <li><strong class="text-katedral-charcoal">Mazmur :</strong> <br> <?php echo htmlspecialchars($liturgi['mazmur_tanggapan']); ?></li>
            <?php endif; ?>

            <?php if(date('w', $tgl_db) == 0 && !empty($liturgi['bacaan_2'])): ?>
                <li class="text-katedral-gold"><strong class="text-katedral-gold">Bacaan 2 :</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_2']); ?></li>
            <?php endif; ?>

            <?php if(!empty($liturgi['bait_pengantar_injil'])): ?>
                <li><strong class="text-katedral-charcoal">Bait Pengantar Injil :</strong> <br> <?php echo htmlspecialchars($liturgi['bait_pengantar_injil']); ?></li>
            <?php endif; ?>

            <li><strong class="text-katedral-charcoal">Injil :</strong> <br> <?php echo htmlspecialchars($liturgi['bacaan_injil']); ?></li>
        </ul>

        <?php if(!empty($liturgi['renungan'])): ?>
            <div class="mt-4 p-4 bg-katedral-cream rounded-lg text-sm text-gray-700 border border-gray-200">
                <strong class="text-katedral-charcoal">Renungan :</strong><br>
                <?php echo nl2br(htmlspecialchars($liturgi['renungan'])); ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <!-- Tampilan jika tidak ada data untuk HARI INI -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg text-center text-sm text-gray-500 py-6 mb-0">
            <i class="bi bi-journal-x block text-3xl mb-3 text-gray-400"></i>
            Belum terdapat bacaan liturgi untuk hari ini.
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Widget Petugas Liturgi Hari Ini -->
<div class="bg-white p-6 mb-6 rounded-xl shadow-sm border border-gray-100">
    <h5 style="text-align: center;" class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif">Petugas Liturgi Hari Minggu ini</h5>
    
    <?php if (date('w') == 0): // Sunday ?>
        <?php
        $today_date = date('Y-m-d');
        $query_petugas = $conn->query("SELECT * FROM tbl_pengumuman WHERE kategori = 'Seksi/Petugas Liturgi' AND tanggal_tugas_misa = '$today_date' ORDER BY misa_ke ASC");
        
        if ($query_petugas && $query_petugas->num_rows > 0):
        ?>
            <div class="accordion accordion-flush" id="accordionPetugasLiturgi">
                <?php while ($p = $query_petugas->fetch_assoc()): ?>
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="headingMisa<?php echo $p['misa_ke']; ?>">
                            <button class="accordion-button collapsed py-2 px-3 text-sm fw-bold text-katedral-charcoal bg-gray-50" style="box-shadow: none;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisa<?php echo $p['misa_ke']; ?>" aria-expanded="false" aria-controls="collapseMisa<?php echo $p['misa_ke']; ?>">
                                Misa <?php echo $p['misa_ke']; ?>
                            </button>
                        </h2>
                        <div id="collapseMisa<?php echo $p['misa_ke']; ?>" class="accordion-collapse collapse" aria-labelledby="headingMisa<?php echo $p['misa_ke']; ?>" data-bs-parent="#accordionPetugasLiturgi">
                            <div class="accordion-body p-3 text-sm text-gray-600">
                                <ul class="list-unstyled mb-0 space-y-2">
                                    <?php if(!empty($p['mc_nama'])) echo "<li><strong>MC:</strong> " . htmlspecialchars($p['mc_nama']) . "</li>"; ?>
                                    <?php if(!empty($p['animator_nama'])) echo "<li><strong>Animator:</strong> " . htmlspecialchars($p['animator_nama']) . "</li>"; ?>
                                    <?php 
                                        $lektors = array_filter([$p['lektor1_nama'], $p['lektor2_nama']]);
                                        if(!empty($lektors)) echo "<li><strong>Lektor:</strong> " . htmlspecialchars(implode(' & ', $lektors)) . "</li>"; 
                                    ?>
                                    <?php if(!empty($p['pemazmur_nama'])) echo "<li><strong>Pemazmur:</strong> " . htmlspecialchars($p['pemazmur_nama']) . "</li>"; ?>
                                    <?php if(!empty($p['organis_nama'])) echo "<li><strong>Organis:</strong> " . htmlspecialchars($p['organis_nama']) . "</li>"; ?>
                                    <?php if(!empty($p['cantores'])) echo "<li><strong>Cantores:</strong> " . htmlspecialchars(str_replace(' | ', ', ', $p['cantores'])) . "</li>"; ?>
                                    <?php if(!empty($p['petugas_khusus'])) echo "<li><strong>Khusus:</strong> " . htmlspecialchars(str_replace(' | ', ', ', $p['petugas_khusus'])) . "</li>"; ?>
                                    <?php if(!empty($p['kebersihan'])) echo "<li><strong>Kebersihan:</strong> " . htmlspecialchars(str_replace(' | ', ', ', $p['kebersihan'])) . "</li>"; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="bg-gray-50 border border-gray-200 rounded-lg text-center text-sm text-gray-500 py-6 mb-0">
                <i class="bi bi-journal-x block text-3xl mb-3 text-gray-400"></i>
                Belum ada jadwal petugas liturgi untuk hari ini.
            </div>
        <?php endif; ?>
        
    <?php else: // Not Sunday ?>
        <div class="bg-light p-3 text-center rounded-3 border border-dashed text-muted text-sm" style="border-style: dashed !important;">
            <i class="bi bi-info-circle mb-2 d-block fs-4 text-gray-400"></i>
            Jadwal petugas liturgi hanya tersedia saat perayaan Misa hari Minggu.
        </div>
    <?php endif; ?>
</div>

<!-- Bagian Doa Bahasa Indonesia -->
<?php if (!isset($hide_doa_indonesia_sidebar) || !$hide_doa_indonesia_sidebar): ?>
<div class="bg-white p-6 mb-6 rounded-xl shadow-sm border border-gray-100">
    <h5 style="text-align: center;" class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif">Doa Bahasa Indonesia</h5>
    <div class="flex flex-col space-y-1">
        <a href="doa_indonesia.php?doa=bapa-kami" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Bapa Kami</a>
        <a href="doa_indonesia.php?doa=salam-maria" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Salam Maria</a>
        <a href="doa_indonesia.php?doa=aku-percaya" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Aku Percaya (Singkat)</a>
        <a href="doa_indonesia.php?doa=saya-mengaku" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Saya Mengaku</a>
        <a href="doa_indonesia.php?doa=malaikat-tuhan" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Malaikat Tuhan (Angelus)</a>
    </div>
    <a href="doa_indonesia.php" class="mt-4 block w-full text-center px-4 py-2 border border-katedral-gold text-katedral-gold rounded-lg hover:bg-katedral-gold hover:text-white transition-colors text-sm font-medium">Lihat Semua Doa Dasar</a>
</div>
<?php endif; ?>

<!-- Bagian Doa & Nyanyian Latin -->
<?php if (!isset($hide_doa_latin_sidebar) || !$hide_doa_latin_sidebar): ?>
<div class="bg-white p-6 mb-6 rounded-xl shadow-sm border border-gray-100">
    <h5 style="text-align: center;" class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif">Kumpulan Doa Latin</h5>
    <div class="flex flex-col space-y-1">
        <a href="doa_latin.php?doa=pater-noster" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Pater Noster (Bapa Kami)</a>
        <a href="doa_latin.php?doa=ave-maria" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Ave Maria (Salam Maria)</a>
        <a href="doa_latin.php?doa=credo-nicea" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Credo (Syahadat Nicea)</a>
        <a href="doa_latin.php?doa=confiteor" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Confiteor (Saya Mengaku)</a>
    </div>
    <a href="doa_latin.php" class="mt-4 block w-full text-center px-4 py-2 bg-katedral-charcoal text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium">Lihat Semua Doa</a>
</div>

<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
    <h5 style="text-align: center;" class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif">Nyanyian Latin</h5>
    <div class="flex flex-col space-y-1">
        <a href="doa_latin.php?nyanyian=vidi-aquam" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Vidi Aquam</a>
        <a href="doa_latin.php?nyanyian=pange-lingua" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Pange Lingua</a>
        <a href="doa_latin.php?nyanyian=tantum-ergo" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Tantum Ergo</a>
        <a href="doa_latin.php?nyanyian=panis-angelicus" class="block py-2 text-gray-600 hover:text-katedral-charcoal hover:font-semibold border-b border-dashed border-gray-200 transition-colors">Panis Angelicus</a>
    </div>
    <a href="doa_latin.php" class="mt-4 block w-full text-center px-4 py-2 bg-katedral-charcoal text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium">Lihat Semua Nyanyian</a>
</div>
<?php endif; ?>

<!-- Swiper JS untuk Slider -->
<?php if (isset($pengumuman_slider) && !empty($pengumuman_slider)): ?>
<div class="mt-6 mb-6">
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <h5 style="text-align: center;" class="font-serif font-bold text-xl mb-3 text-katedral-charcoal border-b-2 border-katedral-gold/30 pb-2">Pengumuman Lainnya</h5>
        <div class="swiper announcementSwiper rounded-xl overflow-hidden pb-12">
            <div class="swiper-wrapper">
                <?php foreach($pengumuman_slider as $slide): ?>
                    <div class="swiper-slide h-auto flex flex-col justify-start">
                        <!-- Added pt-1 and pl-1 to prevent font clipping -->
                        <h6 class="font-serif font-bold text-sm text-katedral-gold mb-2 pt-1 pl-1 leading-normal">
                            <?php echo htmlspecialchars($slide['judul_pengumuman'] ?? $slide['kategori']); ?>
                        </h6>
                        
                        <!-- Scrollable wrapper with left padding -->
                        <div class="max-h-60 overflow-y-auto pr-3 pl-1 custom-scrollbar w-full">
                            <p class="text-gray-600 text-xs leading-relaxed text-justify pb-4">
                                <?php echo nl2br(htmlspecialchars($slide['isi_pengumuman'] ?? '')); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper !== 'undefined') {
        const swiper = new Swiper('.announcementSwiper', {
            loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true, dynamicBullets: true },
            autoHeight: true,
            spaceBetween: 10
        });
    }
});
</script>
<?php endif; ?>