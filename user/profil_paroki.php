<?php
// Katedral/user/profil_paroki.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="lg:w-2/3">
            <!-- Kartu Sejarah -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 mb-8">
                <h3 class="font-bold text-3xl border-b-2 border-katedral-charcoal pb-3 mb-6 font-serif text-katedral-charcoal">Profil & Sejarah Gereja Katedral Manado</h3>
                <p class="text-gray-600 leading-relaxed text-lg mb-8">
                    Gereja Katolik Hati Tersuci Maria (Katedral) adalah pusat pelayanan pastoral dan spiritual bagi umat Katolik. Berdiri sebagai saksi bisu perkembangan iman umat, gereja ini terus melayani sakramen, peribadatan, dan pembinaan iman dari generasi ke generasi.
                </p>
                
                <h5 class="font-bold text-xl mt-8 mb-4 font-serif text-katedral-charcoal"><i class="bi bi-diagram-3 text-katedral-gold mr-2"></i> Hirarki Keuskupan Manado</h5>
                <div class="p-5 bg-katedral-cream border border-gray-200 rounded-xl shadow-inner text-gray-800 flex flex-col sm:flex-row items-center sm:items-start gap-5 text-center sm:text-left">
                    <img src="../user/images/uskup_manado.jpg" class="w-24 h-24 rounded-xl object-cover shrink-0 mx-auto sm:mx-0 border-2 border-katedral-gold/30 shadow-sm">
                    <div class="flex-1 w-full min-w-0 flex items-center justify-center sm:justify-start sm:h-24">
                        <p class="mb-0 text-lg break-words"><strong>Uskup:</strong> Mgr. Benedictus Estephanus Rolly Untu, MSC</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Tim Pastoral -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 mb-8">
                <h4 class="font-bold text-2xl border-b-2 border-katedral-charcoal pb-3 mb-6 font-serif text-katedral-charcoal">Tim Pastoral Paroki</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                    <div class="bg-gray-50 rounded-xl p-6 h-full border border-gray-200 transition-transform hover:-translate-y-1 duration-300 flex flex-col items-center">
                        <!-- Pastor Paroki Photo Placeholder -->
                        <div class="w-32 h-32 rounded-2xl bg-white border-4 border-katedral-gold flex items-center justify-center shadow-sm overflow-hidden mb-5">
                            <img src="../user/images/pastor_paroki.jpg" class="w-full h-full object-cover">
                            <!-- <i class="bi bi-person-square text-6xl text-gray-400"></i> -->
                        </div>
                        <h6 class="font-bold text-lg text-katedral-charcoal mb-1">RD. Fecky Evendy Singal</h6>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-katedral-charcoal text-white">Pastor Paroki</span>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 h-full border border-gray-200 transition-transform hover:-translate-y-1 duration-300 flex flex-col items-center">
                        <!-- Pastor Rekan Photo Placeholder -->
                        <div class="w-32 h-32 rounded-2xl bg-white border-4 border-gray-400 flex items-center justify-center shadow-sm overflow-hidden mb-5">
                            <img src="../user/images/pastor_rekan.jpg" class="w-full h-full object-cover">
                            <!-- <i class="bi bi-person-square text-6xl text-gray-400"></i> -->
                        </div>
                        <h6 class="font-bold text-lg text-katedral-charcoal mb-3">RP. Paulus Laurentius Pitoy, MSC</h6>
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-gray-500 text-white">Pastor Rekan</span>
                    </div>
                </div>
            </div>
            
            <!-- Kartu Alamat -->
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <h4 class="font-bold text-2xl border-b-2 border-katedral-charcoal pb-3 mb-4 font-serif text-katedral-charcoal">Lokasi Gereja</h4>
                <p class="text-gray-700 text-lg flex items-start mb-6"><i class="bi bi-geo-alt-fill text-red-500 mr-3 mt-1 text-xl"></i> Jl. Sam Ratulangi No.68, Wenang, Kota Manado</p>
                
                <a href="https://maps.app.goo.gl/jJbCq26GY1FhYvRT8" target="_blank" rel="noopener noreferrer" class="group block relative rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all border border-gray-200 h-64 bg-gray-100">
                    <img src="../user/images/foto_gereja.jpg" alt="Foto Gereja Katedral" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                    <div class="absolute inset-0 bg-katedral-charcoal/40 group-hover:bg-katedral-charcoal/20 transition-colors flex items-center justify-center">
                        <span class="bg-white/95 backdrop-blur-sm text-katedral-charcoal font-semibold rounded-full px-4 py-2 sm:px-6 sm:py-3 text-xs sm:text-sm shadow-lg flex items-center gap-2 whitespace-nowrap transform group-hover:bg-katedral-gold group-hover:text-white group-hover:scale-105 transition-all duration-300">
                            <i class="bi bi-geo-alt-fill text-red-500 group-hover:text-white transition-colors"></i>
                            <span>Lihat di Google Maps</span>
                        </span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Memanggil Sidebar di sebelah kanan -->
        <div class="lg:w-1/3">
            <?php include 'includes/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>