<!-- Katedral/admin/includes/sidebar_admin.php -->
<aside class="w-64 bg-white border-r border-gray-200 flex flex-col shadow-sm flex-shrink-0">
    <div class="p-6 text-center border-b border-gray-100">
        <h5 class="font-bold text-lg m-0 text-katedral-charcoal">Admin Side</h5>
        <p class="text-sm text-gray-500 mt-1">Hati Tersuci Maria Katedral Manado</p>
    </div>
    
    <div class="flex-1 overflow-y-auto py-4">
        <nav class="space-y-1 px-3">
            <a href="dashboard.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-grid-1x2-fill text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Dashboard
            </a>
            
            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Liturgi & Warta
                </p>
            </div>
            <a href="kelola_liturgi.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-plus-circle text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Input Liturgi
            </a>
            <a href="data_liturgi.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-table text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Data Liturgi
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Pengumuman
                </p>
            </div>
            <a href="kelola_pengumuman.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-megaphone text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Input Pengumuman
            </a>
            <a href="data_pengumuman.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-card-list text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Data Pengumuman
            </a>
            
            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Renungan & Pengantar
                </p>
            </div>
            <a href="kelola_kata_pengantar.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-journal-text text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Input Kata Pengantar
            </a>
            <a href="data_kata_pengantar.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-journals text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Data Kata Pengantar
            </a>

            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Pengaturan
                </p>
            </div>
            <a href="kelola_admin.php" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream transition-colors">
                <i class="bi bi-people text-gray-400 group-hover:text-katedral-gold mr-3 text-lg transition-colors"></i>
                Kelola Admin
            </a>
        </nav>
    </div>
    
    <div class="p-4 border-t border-gray-100">
        <a href="logout.php" class="group flex items-center justify-center w-full px-4 py-2 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition-colors border border-transparent hover:border-red-100">
            <i class="bi bi-box-arrow-right mr-2 text-lg"></i>
            Keluar
        </a>
    </div>
</aside>