<?php 
// Katedral/user/index.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 

// LIVE STREAMING URL (Admin edits this directly)
$live_streaming_url = 'https://www.youtube.com/live/f17J3AXVK5w?si=NMEHNyAcamR-Wr5P'; 
?>

<div class="container py-4">
    <div class="row g-4 align-items-start">

        <!-- ============================================ -->
        <!-- LEFT COLUMN (col-lg-8) — Main Content        -->
        <!-- ============================================ -->
        <div class="col-lg-8">
            <div class="d-flex flex-column gap-4">

                <!-- =============================== -->
                <!-- SECTION 1: Hero / Sambutan       -->
                <!-- =============================== -->
                <div class="bg-gradient-to-br from-white to-katedral-cream p-8 rounded-xl shadow-sm border border-katedral-gold/20 mb-6 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 p-4 opacity-5 pointer-events-none transform rotate-12">
                        <i class="bi bi-brightness-alt-high text-[15rem] text-katedral-gold"></i>
                    </div>
                    
                    <div class="flex flex-col md:flex-row gap-8 items-center relative z-10">
                        <div class="md:w-1/3 flex justify-center">
                            <div class="w-64 h-80 bg-gray-100 rounded-2xl border-4 border-white shadow-lg flex items-center justify-center overflow-hidden relative group">
                                <div class="absolute inset-0 bg-katedral-gold opacity-0 group-hover:opacity-10 transition-opacity duration-300 z-10"></div>
                                <img src="../user/images/bunda_maria.jpg" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 relative z-0" alt="Bunda Maria">
                            </div>
                        </div>
                        <div class="md:w-2/3">
                            <div class="inline-flex items-center justify-center px-3 py-1 mb-4 text-xs font-semibold tracking-widest text-katedral-gold uppercase bg-white border border-katedral-gold/30 rounded-full shadow-sm">
                                <i class="bi bi-stars mr-2"></i> Official Website
                            </div>
                            
                            <h3 style="text-align: center;" class="font-bold text-3xl md:text-4xl mb-4 font-serif text-katedral-charcoal leading-tight">
                                Gereja Katolik Hati Tersuci Maria Katedral Manado
                            </h3>
                            
                            <div class="w-20 h-1 bg-katedral-gold/50 rounded-full mb-5"></div>
                            
                            <p class="text-gray-700 leading-relaxed text-lg text-justify min-h-[6rem]" x-data="{ text: '', fullText: 'Website resmi ini adalah sarana informasi dan pelayanan umat Paroki Katedral Manado. Di sini Anda dapat menemukan berbagai informasi terkait kegiatan gereja, warta liturgi, dan pelayanan pastoral secara terpadu.', init() { let i = 0; let int = setInterval(() => { this.text += this.fullText[i]; i++; if(i === this.fullText.length) clearInterval(int); }, 35); } }" x-text="text"></p>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="card-body p-4">

                        <!-- Uskup & Pastor Cards -->
                        <div class="row g-3">
                            <!-- Uskup — full width -->
                            <div class="col-12">
                                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6 text-center sm:text-left bg-gray-50 border border-gray-100 p-4 rounded-xl shadow-sm">
                                    <img src="../user/images/uskup_manado.jpg" class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl object-cover shrink-0 mx-auto sm:mx-0 border-2 border-katedral-gold/30 shadow-sm">
                                    <div class="flex-1 w-full min-w-0">
                                        <h6 class="font-bold text-lg text-katedral-charcoal mb-1 break-words"><i class="bi bi-diagram-3 mr-2 text-katedral-gold text-base"></i>Keuskupan Manado</h6>
                                        <p class="text-sm text-gray-600 mb-0 break-words"><strong>Uskup :</strong> Mgr. Benedictus Estephanus Rolly Untu, MSC</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Pastor Paroki -->
                            <div class="col-md-6">
                                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 text-center sm:text-left bg-white border border-gray-100 p-4 rounded-xl shadow-sm h-full">
                                    <img src="../user/images/pastor_paroki.jpg" class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl object-cover shrink-0 mx-auto sm:mx-0 border border-gray-200 shadow-sm">
                                    <div class="flex-1 w-full min-w-0">
                                        <h6 class="font-bold text-base text-katedral-charcoal mb-1 break-words">Pastor Paroki</h6>
                                        <p class="text-sm text-gray-600 mb-0 break-words">RD. Fecky Evendy Singal</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Pastor Rekan -->
                            <div class="col-md-6">
                                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 text-center sm:text-left bg-white border border-gray-100 p-4 rounded-xl shadow-sm h-full">
                                    <img src="../user/images/pastor_rekan.jpg" class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl object-cover shrink-0 mx-auto sm:mx-0 border border-gray-200 shadow-sm">
                                    <div class="flex-1 w-full min-w-0">
                                        <h6 class="font-bold text-base text-katedral-charcoal mb-1 break-words">Pastor Rekan</h6>
                                        <p class="text-sm text-gray-600 mb-0 break-words">RP. Paulus Laurentius Pitoy, MSC</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row g-3 (Uskup/Pastor) -->
                    </div><!-- /.card-body -->
                </div><!-- /.card (Hero) -->

                <!-- ======================================== -->
                <!-- SECTION 2: Live Stream                   -->
                <!-- ======================================== -->
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: #3a3530;">
                            <i class="bi bi-broadcast text-danger me-2"></i>Siaran Langsung
                        </h5>
                        <?php if (!empty($live_streaming_url)): ?>
                            <a href="<?php echo htmlspecialchars($live_streaming_url); ?>" target="_blank" rel="noopener noreferrer" class="d-block position-relative rounded-3 overflow-hidden mb-2" style="height: 250px; background: #111;">
                                <img src="../user/images/live_thumbnail.jpg" alt="Live Stream" class="w-100 h-100" style="object-fit: cover; opacity: 0.75;">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle shadow-lg" style="width: 56px; height: 56px; background: rgba(220,38,38,0.9);">
                                        <i class="bi bi-play-fill text-white fs-3" style="margin-left: 3px;"></i>
                                    </div>
                                </div>
                                <span class="position-absolute top-0 start-0 m-2 badge bg-danger fw-bold small">LIVE</span>
                            </a>
                            <p class="text-secondary small text-center mt-2">Klik untuk mengikuti perayaan Ekaristi secara langsung.</p>
                        <?php else: ?>
                            <div class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-center p-4 rounded-3" style="background: #f9fafb; border: 2px dashed #e5e7eb;">
                                <i class="bi bi-tv fs-1 mb-2" style="color: #d1d5db;"></i>
                                <p class="text-secondary small mb-0">Untuk saat ini tidak ada siaran langsung. Silakan cek kembali nanti.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- =============================== -->
                <!-- SECTION 3: Kata Pengantar        -->
                <!-- =============================== -->
                <?php
                $current_m = (int)date('n');
                $current_d = (int)date('j');
                $kp_query = @$conn->query("SELECT * FROM tbl_kata_pengantar_harian WHERE bulan = $current_m AND tanggal = $current_d LIMIT 1");
                $kp = ($kp_query && $kp_query->num_rows > 0) ? $kp_query->fetch_assoc() : null;
                ?>
                <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, #faf7f0, #ffffff); border: 1px solid rgba(184,150,90,0.3) !important;">
                    <div class="position-absolute top-0 end-0 p-3" style="opacity: 0.1; pointer-events: none;">
                        <i class="bi bi-quote" style="font-size: 5rem; color: #b8965a;"></i>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: #b8965a;">
                            <i class="bi bi-sun me-2"></i>Kata Pengantar
                        </h5>

                        <?php if ($kp): ?>
                            <?php if ($kp['is_hari_santo']): ?>
                                <div class="d-flex flex-column flex-md-row gap-3 mb-3 align-items-start">
                                    <?php if (!empty($kp['foto_santo'])): ?>
                                        <div class="flex-shrink-0 rounded-3 overflow-hidden shadow-sm" style="width: 120px; height: 120px; border: 1px solid #e5e7eb;">
                                            <img src="../<?php echo htmlspecialchars($kp['foto_santo']); ?>" alt="Foto Santo" class="w-100 h-100" style="object-fit: cover;">
                                        </div>
                                    <?php else: ?>
                                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3 shadow-sm" style="width: 120px; height: 120px; background: #eff6ff; border: 1px solid #e5e7eb;">
                                            <i class="bi bi-person-square" style="font-size: 3rem; color: #93c5fd;"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <h6 class="fw-bold" style="color: #3a3530;"><?php echo htmlspecialchars($kp['nama_santo']); ?></h6>
                                        <p class="text-secondary small mb-0 lh-lg break-words"><?php echo nl2br(htmlspecialchars($kp['sejarah_santo'])); ?></p>
                                    </div>
                                </div>
                                <hr style="border-color: rgba(184,150,90,0.2);">
                            <?php endif; ?>

                            <p class="fst-italic lh-lg position-relative break-words" style="font-family: 'Playfair Display', serif; font-size: 1.1rem; color: #374151; z-index: 1;">
                                "<?php echo nl2br(htmlspecialchars($kp['kata_pengantar'])); ?>"
                            </p>
                        <?php else: ?>
                            <p class="fst-italic lh-lg position-relative" style="font-family: 'Playfair Display', serif; font-size: 1.1rem; color: #374151; z-index: 1;">
                                "Tuhan menyertai dan memberkati segala aktivitas serta pelayanan kita hari ini. Mari kita senantiasa memancarkan kasih Kristus di mana pun kita berada."
                            </p>
                        <?php endif; ?>
                    </div>
                </div><!-- /.card (Kata Pengantar) -->

                <!-- =============================== -->
                <!-- SECTION 4: Pengumuman & Agenda   -->
                <!-- =============================== -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 pb-2" style="font-family: 'Playfair Display', serif; color: #3a3530; border-bottom: 2px solid #3a3530;">Pengumuman & Agenda Paroki</h5>

                        <?php
                        $pengumuman_query = @$conn->query("SELECT * FROM tbl_pengumuman WHERE status_aktif = 1 AND CURDATE() <= tanggal_selesai ORDER BY created_at DESC");

                        $all_pengumuman = [];
                        $liturgi_data = [];
                        $pengumuman_slider = [];

                        if ($pengumuman_query && $pengumuman_query->num_rows > 0) {
                            while ($row = $pengumuman_query->fetch_assoc()) {
                                if ($row['kategori'] === 'Seksi/Petugas Liturgi' && !empty($row['misa_ke'])) {
                                    $misa_ke = $row['misa_ke'];
                                    $liturgi_data[$misa_ke] = $row;
                                } elseif ($row['kategori'] === 'Pernikahan' || $row['kategori'] === 'Agenda Paroki') {
                                    $all_pengumuman[] = $row;
                                } else {
                                    $pengumuman_slider[] = $row;
                                }
                            }
                        }

                        $has_pengumuman = !empty($liturgi_data) || !empty($all_pengumuman) || !empty($pengumuman_slider);

                        if ($has_pengumuman):
                            // 1. Tampilkan Liturgi Matrix Table jika ada
                            if (!empty($liturgi_data)):
                                $first_liturgi = reset($liturgi_data);
                                $tanggal_misa = !empty($first_liturgi['tanggal_tugas_misa']) ? $first_liturgi['tanggal_tugas_misa'] : '';
                                
                                $formatted_date = "";
                                if ($tanggal_misa) {
                                    $bulan = array(
                                        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                    );
                                    $split = explode('-', $tanggal_misa);
                                    $formatted_date = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
                                }
                        ?>
                            <div class="mb-3 p-4 rounded-3 shadow-sm" style="background: #faf7f0; border-left: 4px solid #b8965a;">
                                <strong class="d-block mb-3 fs-6" style="font-family: 'Playfair Display', serif; color: #3a3530;">Seksi/Petugas Liturgi</strong>
                                <?php if (!empty($tanggal_misa)): ?>
                                    <h6 class="text-katedral-gold fw-bold mb-3 font-serif border-bottom pb-2">
                                        <i class="bi bi-calendar-event me-2"></i> Jadwal Petugas Misa: <?php echo date('d M Y', strtotime($tanggal_misa)); ?>
                                    </h6>
                                <?php endif; ?>

                                <ul class="nav nav-pills mb-3 gap-2" id="liturgi-tabs-<?php echo $first_liturgi['id']; ?>" role="tablist">
                                    <?php
                                    $is_first = true;
                                    ksort($liturgi_data); // Ensure tabs are ordered by misa_ke
                                    foreach ($liturgi_data as $misa_ke => $data) {
                                        $activeClass = $is_first ? 'active' : '';
                                        echo '<li class="nav-item" role="presentation">';
                                        echo '<button class="nav-link rounded-pill ' . $activeClass . ' px-4 py-2 text-sm fw-medium" id="pills-misa' . $misa_ke . '-tab" data-bs-toggle="pill" data-bs-target="#pills-misa' . $misa_ke . '" type="button" role="tab" aria-controls="pills-misa' . $misa_ke . '" aria-selected="' . ($is_first ? 'true' : 'false') . '">Misa ' . $misa_ke . '</button>';
                                        echo '</li>';
                                        $is_first = false;
                                    }
                                    ?>
                                </ul>

                                <div class="tab-content bg-white border border-gray-100 rounded-3 p-4 shadow-sm" id="liturgi-content-<?php echo $first_liturgi['id']; ?>">
                                    <?php
                                    $is_first = true;
                                    $roles = [
                                        'MC' => 'mc_nama',
                                        'Animator' => 'animator_nama',
                                        'Lektor' => ['lektor1_nama', 'lektor2_nama'],
                                        'Pemazmur' => 'pemazmur_nama',
                                        'Organis' => 'organis_nama',
                                        'Cantores' => 'cantores',
                                        'Petugas Khusus' => 'petugas_khusus',
                                        'Kebersihan' => 'kebersihan'
                                    ];

                                    foreach ($liturgi_data as $misa_ke => $data) {
                                        $activeClass = $is_first ? 'show active' : '';
                                        echo '<div class="tab-pane fade ' . $activeClass . '" id="pills-misa' . $misa_ke . '" role="tabpanel" aria-labelledby="pills-misa' . $misa_ke . '-tab">';
                                        
                                        echo '<div class="row g-4">';
                                        foreach ($roles as $role_label => $db_fields) {
                                            if (is_array($db_fields)) {
                                                $val1 = trim($data[$db_fields[0]] ?? '');
                                                $val2 = trim($data[$db_fields[1]] ?? '');
                                                $combined = [];
                                                if (!empty($val1)) $combined[] = $val1;
                                                if (!empty($val2)) $combined[] = $val2;
                                                $val = implode(' & ', $combined);
                                            } else {
                                                $val = trim($data[$db_fields] ?? '');
                                                if (in_array($db_fields, ['cantores', 'petugas_khusus', 'kebersihan'])) {
                                                    $val = str_replace(' | ', ', ', $val);
                                                }
                                            }
                                            $val = !empty($val) ? htmlspecialchars($val) : '-';

                                            echo '<div class="col-12 col-md-6">';
                                            echo '<div class="row border-bottom border-gray-100 pb-2 h-100">';
                                            echo '<div class="col-sm-5 fw-bold text-secondary text-uppercase mb-1 mb-sm-0" style="font-size: 0.85rem; letter-spacing: 0.5px;">' . $role_label . '</div>';
                                            echo '<div class="col-sm-7 text-dark text-sm break-words">' . $val . '</div>';
                                            echo '</div></div>';
                                        }
                                        echo '</div>'; // end row

                                        if (!empty($data['isi_pengumuman'])) {
                                            echo '<div class="mt-4 p-3 bg-light rounded-3 text-secondary text-sm border border-gray-200 break-words">';
                                            echo '<i class="bi bi-info-circle me-2"></i><strong>Catatan:</strong><br>' . nl2br(htmlspecialchars($data['isi_pengumuman']));
                                            echo '</div>';
                                        }

                                        echo '</div>'; // end tab-pane
                                        $is_first = false;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; // End of Liturgi Matrix Table ?>

                        <?php
                            // 2. Tampilkan sisa pengumuman
                            foreach ($all_pengumuman as $peng):
                        ?>
                            <div class="mb-3 p-4 rounded-3 shadow-sm" style="background: #faf7f0; border-left: 4px solid #b8965a;">
                                <strong class="d-block mb-2 fs-6" style="font-family: 'Playfair Display', serif; color: #3a3530;"><?php echo htmlspecialchars($peng['kategori']); ?></strong>

                                <?php if ($peng['kategori'] === 'Pernikahan' && !empty($peng['mempelai_pria_nama'])): ?>
                                    <div class="text-secondary lh-lg">
                                        <p>Hendak menikah :<br></p>
                                        <ul class="ms-3 mb-2 break-words">
                                            <li><strong>Saudara <?php echo htmlspecialchars($peng['mempelai_pria_nama']); ?></strong> (Putra ke-<?php echo htmlspecialchars($peng['pria_anak_ke']); ?> dari Bpk. <?php echo htmlspecialchars($peng['pria_ayah_nama']); ?> & Ibu <?php echo htmlspecialchars($peng['pria_ibu_nama']); ?>)</li>
                                            <li><strong>Saudari <?php echo htmlspecialchars($peng['mempelai_wanita_nama']); ?></strong> (Putri ke-<?php echo htmlspecialchars($peng['wanita_anak_ke']); ?> dari Bpk. <?php echo htmlspecialchars($peng['wanita_ayah_nama']); ?> & Ibu <?php echo htmlspecialchars($peng['wanita_ibu_nama']); ?>)</li>
                                        </ul>
                                        <p>Pernikahan akan dilaksanakan pada <strong><?php echo date('d M Y', strtotime($peng['tanggal_rencana_nikah'])); ?></strong>.</p>
                                        <p class="small fst-italic text-danger">Dibaca untuk yang ke-<?php echo htmlspecialchars($peng['pembacaan_ke']); ?><br> Barang siapa mengetahui adanya halangan perkawinan, silahkan memberitahukan kepada Pastor Paroki.</p>
                                    </div>
                                <?php elseif ($peng['kategori'] === 'Agenda Paroki'): ?>
                                    <div class="text-secondary lh-lg">
                                        <div class="d-flex align-items-start gap-3 p-3 mb-2 rounded-3 bg-white shadow-sm" style="border: 1px solid #e5e7eb;">
                                            <!-- Date Badge -->
                                            <div class="flex-shrink-0 text-center rounded-3 p-2" style="min-width: 70px; background: #faf7f0; color: #b8965a;">
                                                <span class="d-block text-uppercase fw-bold" style="font-size: 0.7rem;"><?php echo htmlspecialchars($peng['agenda_hari'] ?? ''); ?></span>
                                                <span class="d-block fw-bold lh-1 my-1" style="font-size: 1.5rem; font-family: 'Playfair Display', serif;"><?php echo $peng['agenda_tanggal'] ? date('d', strtotime($peng['agenda_tanggal'])) : ''; ?></span>
                                                <span class="d-block" style="font-size: 0.7rem;"><?php echo $peng['agenda_tanggal'] ? date('M', strtotime($peng['agenda_tanggal'])) : ''; ?></span>
                                            </div>
                                            <!-- Agenda Items (parsed from JSON) -->
                                            <div class="flex-grow-1">
                                                <?php
                                                $jams = json_decode($peng['agenda_jam'] ?? '[]', true) ?: [];
                                                $kegiatans = json_decode($peng['agenda_isi_kegiatan'] ?? '[]', true) ?: [];
                                                if (!empty($jams) && is_array($jams)):
                                                ?>
                                                <ul class="list-unstyled mb-2">
                                                    <?php foreach ($jams as $idx => $jam): ?>
                                                        <li class="d-flex align-items-start gap-2 small py-1<?php echo ($idx < count($jams) - 1) ? ' border-bottom' : ''; ?>" style="border-color: #f3f4f6 !important;">
                                                            <span class="fw-semibold flex-shrink-0" style="width: 60px; color: #b8965a;">
                                                                <i class="bi bi-clock me-1"></i><?php echo htmlspecialchars($jam); ?>
                                                            </span>
                                                            <span class="fw-medium break-words" style="color: #374151;"><?php echo htmlspecialchars($kegiatans[$idx] ?? ''); ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <?php endif; ?>

                                                <?php if (!empty($peng['isi_pengumuman'])): ?>
                                                    <p class="small text-muted mb-0 break-words"><?php echo nl2br(htmlspecialchars($peng['isi_pengumuman'])); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($peng['tanggal_mulai'] && $peng['tanggal_selesai']): ?>
                                    <small class="d-block mt-2 pt-2 fw-medium" style="font-size: 0.75rem; color: #b8965a; border-top: 1px solid rgba(184,150,90,0.2);">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <?php echo date('d M Y', strtotime($peng['tanggal_mulai'])) . ' - ' . date('d M Y', strtotime($peng['tanggal_selesai'])); ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                        <?php
                            endforeach;
                        else:
                        ?>
                            <div class="text-center py-5 rounded-3" style="background: #f9fafb; border: 1px solid #f3f4f6;">
                                <i class="bi bi-info-circle d-block mb-2" style="font-size: 2.5rem; color: #9ca3af;"></i>
                                <p class="text-secondary mb-0">Tidak ada pengumuman aktif saat ini.</p>
                            </div>
                        <?php endif; ?>
                    </div><!-- /.card-body -->
                </div><!-- /.card (Pengumuman) -->

            </div><!-- /.d-flex flex-column gap-4 -->
        </div><!-- /.col-lg-8 -->

        <!-- ============================================ -->
        <!-- RIGHT COLUMN (col-lg-4) — Sidebar            -->
        <!-- ============================================ -->
        <div class="col-lg-4">
            <?php include 'includes/sidebar.php'; ?>
        </div><!-- /.col-lg-4 -->

    </div><!-- /.row -->
</div><!-- /.container -->

<?php include 'includes/footer.php'; ?>