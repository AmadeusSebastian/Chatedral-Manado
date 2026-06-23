<?php 
// Katedral/user/index.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="container mt-4">
    <div class="row">
        <!-- Konten Utama (Kiri/Tengah) -->
        <div class="col-lg-8 mb-4">
            
            <!-- Sambutan & Profil Singkat -->
            <div class="card p-4 mb-4">
                <h3 class="fw-bold mb-3">Selamat Datang di Paroki Katedral</h3>
                <p class="text-muted">Website resmi ini adalah sarana informasi dan pelayanan umat Paroki Katedral. Di sini Anda dapat menemukan berbagai informasi terkait kegiatan gereja, warta liturgi, dan pelayanan pastoral.</p>
                <hr>
                <div class="row mt-3">
                    <div class="mt-2 p-3 bg-light rounded border">
                        <h6 class="fw-bold mb-1"><i class="bi bi-diagram-3"></i> Keuskupan Manado</h6>
                        <p class="small mb-0"><strong>Uskup :</strong> Mgr. Benedictus Estephanus Rolly Untu, MSC</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="bi bi-person-badge"></i> Pastor Paroki</h6>
                        <p class="small mb-0">P. Vecky Singal, Pr</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold"><i class="bi bi-people"></i> Pastor Rekan</h6>
                        <p class="small mb-0">P. Polce Pitoy, MSCr</p>
                    </div>
                </div>
            </div>

            <!-- Pengumuman Statis -->
            <div class="card p-4">
                <h5 class="fw-bold mb-4 border-bottom pb-2">Pengumuman & Agenda Paroki</h5>
                <div class="alert alert-secondary border-0 small">
                    <strong>Pernikahan :</strong><br>
                    Akan saling menerimakan Sakramen Perkawinan, Sdr. John Doe (Lingkungan St. Petrus) dan Sdri. Jane Doe (Lingkungan St. Paulus) pada hari Sabtu, 30 Mei 2026.
                </div>
                <div class="alert alert-secondary border-0 small">
                    <strong>Petugas Liturgi Minggu Depan :</strong><br>
                    Koor: Wilayah Rohani St. Yoseph | Tata Tertib: Wilayah Rohani St. Maria.
                </div>
            </div>
        </div>

        <!-- Sidebar (Kanan) -->
        <div class="col-lg-4">
            <?php include 'includes/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>