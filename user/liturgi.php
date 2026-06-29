<?php
// Katedral/user/liturgi.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 

// Cek apakah ada tanggal spesifik yang direquest
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');

// Query liturgi untuk tanggal tersebut
$stmt = $conn->prepare("SELECT * FROM tbl_liturgi WHERE tanggal = ?");
$stmt->bind_param("s", $tanggal);
$stmt->execute();
$result = $stmt->get_result();
$liturgi_hari_ini = $result->fetch_assoc();

// Query untuk mendapatkan 5 liturgi terbaru untuk navigasi sidebar
$query_recent = $conn->query("SELECT tanggal, kata_pengantar FROM tbl_liturgi ORDER BY tanggal DESC LIMIT 5");

// Fungsi helper untuk nama hari dan bulan
$nama_hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
$nama_bulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

$tgl_db = strtotime($tanggal);
$hari = $nama_hari[date('w', $tgl_db)];
$tgl_format = date('j', $tgl_db) . " " . $nama_bulan[date('n', $tgl_db)] . " " . date('Y', $tgl_db);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="lg:w-2/3">
            
            <div class="bg-white p-8 md:p-10 shadow-sm border border-gray-100 rounded-xl mb-8">
                <div class="text-center mb-8 border-b-2 border-katedral-charcoal pb-6 relative">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-katedral-gold text-white mb-4 tracking-widest uppercase">Warta Liturgi</span>
                    <h3 class="font-bold text-3xl md:text-4xl text-katedral-charcoal font-serif mb-3"><?php echo $hari; ?></h3>
                    <p class="text-lg text-gray-500 font-medium mb-4"><?php echo $tgl_format; ?></p>
                    
                    <?php if ($liturgi_hari_ini && $tanggal == date('Y-m-d')): ?>
                    <a href="unduh_warta.php" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-red-500 text-red-600 rounded-lg shadow-sm text-sm font-medium hover:bg-red-50 transition-colors">
                        <i class="bi bi-file-earmark-pdf-fill mr-2 text-lg"></i> Unduh PDF / Cetak
                    </a>
                    <?php endif; ?>
                </div>

                <?php if ($liturgi_hari_ini): ?>
                    
                    <?php if(!empty($liturgi_hari_ini['kata_pengantar'])): ?>
                        <div class="mb-8 text-center max-w-2xl mx-auto">
                            <p class="text-gray-700 italic text-lg leading-relaxed font-serif">"<?php echo htmlspecialchars($liturgi_hari_ini['kata_pengantar']); ?>"</p>
                        </div>
                    <?php endif; ?>

                    <div class="space-y-8">
                        <div>
                            <h5 class="font-bold text-lg text-katedral-gold mb-3 uppercase tracking-wider text-sm border-b border-gray-100 pb-2">Bacaan Pertama</h5>
                            <p class="text-katedral-charcoal font-medium mb-2 text-lg"><?php echo htmlspecialchars($liturgi_hari_ini['bacaan_1']); ?></p>
                        </div>
                        
                        <?php if(!empty($liturgi_hari_ini['mazmur_tanggapan'])): ?>
                            <div>
                                <h5 class="font-bold text-lg text-katedral-gold mb-3 uppercase tracking-wider text-sm border-b border-gray-100 pb-2">Mazmur Tanggapan</h5>
                                <p class="text-katedral-charcoal font-medium mb-2 text-lg"><?php echo htmlspecialchars($liturgi_hari_ini['mazmur_tanggapan']); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(date('w', $tgl_db) == 0 && !empty($liturgi_hari_ini['bacaan_2'])): ?>
                            <div>
                                <h5 class="font-bold text-lg text-katedral-gold mb-3 uppercase tracking-wider text-sm border-b border-gray-100 pb-2">Bacaan Kedua</h5>
                                <p class="text-katedral-charcoal font-medium mb-2 text-lg"><?php echo htmlspecialchars($liturgi_hari_ini['bacaan_2']); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($liturgi_hari_ini['bait_pengantar_injil'])): ?>
                            <div>
                                <h5 class="font-bold text-lg text-katedral-gold mb-3 uppercase tracking-wider text-sm border-b border-gray-100 pb-2">Bait Pengantar Injil</h5>
                                <p class="text-katedral-charcoal font-medium mb-2 text-lg"><?php echo htmlspecialchars($liturgi_hari_ini['bait_pengantar_injil']); ?></p>
                            </div>
                        <?php endif; ?>

                        <div>
                            <h5 class="font-bold text-lg text-katedral-gold mb-3 uppercase tracking-wider text-sm border-b border-gray-100 pb-2">Bacaan Injil</h5>
                            <p class="text-katedral-charcoal font-medium mb-2 text-lg"><?php echo htmlspecialchars($liturgi_hari_ini['bacaan_injil']); ?></p>
                        </div>
                    </div>

                    <?php if(!empty($liturgi_hari_ini['renungan'])): ?>
                        <div class="mt-10 p-6 md:p-8 bg-katedral-cream rounded-xl text-gray-800 border border-gray-200 shadow-inner">
                            <h5 class="font-bold text-xl text-katedral-charcoal mb-4 font-serif">Renungan Singkat</h5>
                            <div class="leading-relaxed font-serif text-lg">
                                <?php echo nl2br(htmlspecialchars($liturgi_hari_ini['renungan'])); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="text-center py-12 text-gray-500 bg-gray-50 rounded-xl border border-gray-100">
                        <i class="bi bi-journal-x text-5xl mb-4 block text-gray-400"></i>
                        <p class="text-lg">Belum terdapat bacaan liturgi untuk tanggal ini.</p>
                        <a href="liturgi.php" class="inline-block mt-4 text-katedral-gold hover:underline font-medium">Kembali ke Hari Ini</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            
            <!-- Liturgi Terbaru Navigasi -->
            <div class="bg-white p-6 mb-6 rounded-xl shadow-sm border border-gray-100">
                <h5 class="font-bold text-lg border-b-2 border-katedral-charcoal pb-2 mb-4 font-serif text-katedral-charcoal">Warta Sebelumnya</h5>
                <div class="flex flex-col space-y-2">
                    <?php 
                    if ($query_recent && $query_recent->num_rows > 0):
                        while ($recent = $query_recent->fetch_assoc()): 
                            $r_tgl = strtotime($recent['tanggal']);
                            $r_format = date('d M Y', $r_tgl);
                            $is_active = ($recent['tanggal'] == $tanggal) ? 'bg-katedral-cream border-l-4 border-katedral-gold text-katedral-charcoal' : 'text-gray-600 hover:bg-gray-50 hover:text-katedral-gold border-l-4 border-transparent';
                    ?>
                        <a href="liturgi.php?tanggal=<?php echo $recent['tanggal']; ?>" class="block px-4 py-3 rounded-r-lg transition-colors <?php echo $is_active; ?>">
                            <div class="font-medium"><?php echo $nama_hari[date('w', $r_tgl)] . ", " . $r_format; ?></div>
                        </a>
                    <?php 
                        endwhile;
                    else:
                    ?>
                        <p class="text-sm text-gray-500 py-2">Belum ada warta lain.</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php 
            $hide_liturgi_sidebar = true;
            include 'includes/sidebar.php'; 
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
