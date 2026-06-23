<?php
// Katedral/user/profil_paroki.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="container mt-4 mb-5">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-lg-8 mb-4">
            <!-- Kartu Sejarah -->
            <div class="card p-4 shadow-sm border-0 mb-4">
                <h3 class="fw-bold border-bottom pb-2 mb-3">Profil & Sejarah Paroki Katedral</h3>
                <p class="text-muted" style="line-height: 1.8;">
                    Gereja Katolik Hati Tersuci Maria (Katedral) adalah pusat pelayanan pastoral dan spiritual bagi umat Katolik. Berdiri sebagai saksi bisu perkembangan iman umat, gereja ini terus melayani sakramen, peribadatan, dan pembinaan iman dari generasi ke generasi.
                </p>
                
                <h5 class="fw-bold mt-4 mb-3"><i class="bi bi-diagram-3 text-dark"></i> Hirarki Keuskupan Manado</h5>
                <div class="p-3 bg-light border rounded">
                    <p class="mb-0"><strong>Uskup:</strong> Mgr. Benedictus Estephanus Rolly Untu, MSC</p>
                </div>
            </div>

            <!-- Kartu Tim Pastoral -->
            <div class="card p-4 shadow-sm border-0 mb-4">
                <h4 class="fw-bold border-bottom pb-2 mb-4">Tim Pastoral Paroki</h4>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="bg-light rounded p-3 h-100 border">
                            <i class="bi bi-person-circle text-secondary d-block mb-2" style="font-size: 3rem;"></i>
                            <h6 class="fw-bold mb-1">P. Fecky Evendy Singal, Pr</h6>
                            <span class="badge bg-dark">Pastor Paroki</span>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="bg-light rounded p-3 h-100 border">
                            <i class="bi bi-person-circle text-secondary d-block mb-2" style="font-size: 3rem;"></i>
                            <h6 class="fw-bold mb-1">P. Paulus Laurentius Pitoy, MSC</h6>
                            <span class="badge bg-secondary">Pastor Rekan</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Kartu Alamat -->
            <div class="card p-4 shadow-sm border-0">
                <h4 class="fw-bold border-bottom pb-2 mb-3">Lokasi Gereja</h4>
                <p><i class="bi bi-geo-alt-fill text-danger me-2"></i> Jl. Sam Ratulangi No.68, Wenang, Kota Manado</p>
            </div>
        </div>

        <!-- Memanggil Sidebar di sebelah kanan -->
        <div class="col-lg-4">
            <?php include 'includes/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>