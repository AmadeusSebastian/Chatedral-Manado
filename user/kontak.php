<?php
// Katedral/user/kontak.php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="bg-transparent min-h-screen">
    <!-- Hero Header -->
    <div class="bg-transparent border-b border-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="font-serif font-bold text-4xl md:text-5xl text-katedral-charcoal mb-4">Hubungi Kami</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Untuk keperluan pelayanan pastoral, administrasi, dan informasi lainnya, silakan menghubungi Sekretariat Paroki atau Pastor Paroki kami.
            </p>
        </div>
    </div>

    <!-- Contact Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4 py-12">
        
        <!-- Card 1: Sekretariat Paroki -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition-shadow flex flex-col items-center text-center">
            <!-- Centered Image & Title -->
            <img src="../user/images/foto_gereja.jpg" alt="Gereja Katedral" class="w-24 h-24 rounded-full object-cover border-4 border-katedral-gold/30 mb-4">
            <h3 class="font-serif font-bold text-xl text-katedral-charcoal mb-6">Sekretariat Paroki</h3>
            
            <!-- Left-aligned Contact Details -->
            <div class="space-y-4 text-sm text-gray-700 w-full text-left border-t border-gray-100 pt-5 min-w-0">
                <div class="flex items-start gap-3 min-w-0">
                    <i class="bi bi-geo-alt-fill text-katedral-gold mt-1 text-lg shrink-0"></i>
                    <span class="leading-relaxed break-words min-w-0">Gereja Katolik Hati Tersuci Maria Katedral Manado<br>Jl. Sam Ratulangi No.68, Wenang Utara,<br>Kec. Wenang, Kota Manado, Sulawesi Utara</span>
                </div>
                <div class="flex items-center gap-3 min-w-0">
                    <i class="bi bi-telephone-fill text-katedral-gold text-lg shrink-0"></i>
                    <a href="tel:0431851152" class="hover:text-katedral-gold transition-colors font-medium break-words min-w-0">(0431) 851152</a>
                </div>
                <div class="flex items-center gap-3 min-w-0">
                    <i class="bi bi-envelope-at-fill text-katedral-gold text-lg shrink-0"></i>
                    <a href="mailto:sekretariat@katedralmanado.org" class="hover:text-katedral-gold transition-colors font-medium break-words min-w-0">sekretariat@katedralmanado.org</a>
                </div>
            </div>
        </div>

        <!-- Card 2: Pastor Paroki -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center hover:shadow-md transition-shadow">
            <img src="../user/images/pastor_paroki.jpg" class="w-32 h-32 rounded-full object-cover border-4 border-katedral-gold/30 mx-auto mb-4 shadow-sm" alt="P. Fecky Evendy Singal, Pr">
            <h3 class="font-serif font-bold text-xl text-katedral-charcoal mb-1">RD. Fecky Evendy Singal</h3>
            <p class="text-katedral-gold font-semibold text-sm mb-4">Pastor Paroki</p>
            
            <hr class="border-gray-100 mb-4">
            
            <div class="flex items-center justify-center gap-2 text-gray-600 text-sm">
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium transition-colors break-words">
                    <i class="bi bi-whatsapp text-lg"></i>
                    Hubungi via WhatsApp
                </a>
            </div>
            <p class="text-xs text-gray-400 mt-2 italic">*Untuk keperluan mendesak & pelayanan sakramen orang sakit.</p>
        </div>

        <!-- Card 3: Pastor Rekan -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center hover:shadow-md transition-shadow">
            <img src="../user/images/pastor_rekan.jpg" class="w-32 h-32 rounded-full object-cover border-4 border-katedral-gold/30 mx-auto mb-4 shadow-sm" alt="P. Laurentius Paulus Pitoy, MSC">
            <h3 class="font-serif font-bold text-xl text-katedral-charcoal mb-1">RP. Laurentius Paulus Pitoy, MSC.</h3>
            <p class="text-katedral-gold font-semibold text-sm mb-4">Pastor Rekan</p>
            
            <hr class="border-gray-100 mb-4">
            
            <div class="flex items-center justify-center gap-2 text-gray-600 text-sm">
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-medium transition-colors break-words">
                    <i class="bi bi-whatsapp text-lg"></i>
                    Hubungi via WhatsApp
                </a>
            </div>
            <p class="text-xs text-gray-400 mt-2 italic">*Untuk keperluan mendesak & pelayanan sakramen orang sakit.</p>
        </div>

    </div>

    <!-- Social Media Section -->
    <style>
        /* Bypass Tailwind compiler with native CSS for guaranteed hover colors */
        .btn-fb:hover { background-color: #1877F2 !important; border-color: #1877F2 !important; transform: scale(1.1); }
        .btn-fb:hover i { color: #ffffff !important; }
        
        .btn-ig:hover { background: linear-gradient(to top right, #facc15, #ec4899, #a855f7) !important; border-color: transparent !important; transform: scale(1.1); }
        .btn-ig:hover i { color: #ffffff !important; }
        
        .btn-yt:hover { background-color: #FF0000 !important; border-color: #FF0000 !important; transform: scale(1.1); }
        .btn-yt:hover i { color: #ffffff !important; }
    </style>

    <div class="max-w-3xl mx-auto pb-16 mt-12 text-center">
        <h4 class="font-serif font-bold text-xl text-katedral-charcoal mb-6 border-b-2 border-katedral-gold/30 pb-3 inline-block">Ikuti Sosial Media Kami</h4>
        <div class="flex justify-center items-center gap-8 mt-2">
            <!-- Facebook -->
            <a href="https://www.facebook.com/KatedralManado" target="_blank" rel="noopener noreferrer" class="group flex flex-col items-center gap-2">
                <div class="btn-fb w-14 h-14 bg-white rounded-full shadow-sm border border-gray-100 flex items-center justify-center transition-all duration-300">
                    <i class="bi bi-facebook text-2xl text-[#1877F2] transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-600 group-hover:text-[#1877F2] transition-colors">Facebook</span>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/katedralmanado_" target="_blank" rel="noopener noreferrer" class="group flex flex-col items-center gap-2">
                <div class="btn-ig w-14 h-14 bg-white rounded-full shadow-sm border border-gray-100 flex items-center justify-center transition-all duration-300">
                    <i class="bi bi-instagram text-2xl text-pink-600 transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-600 group-hover:text-pink-600 transition-colors">Instagram</span>
            </a>

            <!-- YouTube -->
            <a href="https://www.youtube.com/@ParokiKatedralManado" target="_blank" rel="noopener noreferrer" class="group flex flex-col items-center gap-2">
                <div class="btn-yt w-14 h-14 bg-white rounded-full shadow-sm border border-gray-100 flex items-center justify-center transition-all duration-300">
                    <i class="bi bi-youtube text-2xl text-[#FF0000] transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-600 group-hover:text-[#FF0000] transition-colors">YouTube</span>
            </a>
        </div>
    </div>

</div>

<?php include 'includes/footer.php'; ?>
