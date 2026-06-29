<?php
$current_page = basename($_SERVER['PHP_SELF']);
$active_desktop = "bg-katedral-gold/10 text-katedral-gold font-semibold";
$inactive_desktop = "text-gray-600 hover:text-katedral-gold hover:bg-katedral-cream font-medium";

$active_mobile = "bg-katedral-gold/5 text-katedral-gold font-semibold";
$inactive_mobile = "text-gray-700 hover:text-katedral-gold hover:bg-katedral-cream font-medium";
?>
<!-- Katedral/user/includes/navbar.php -->
<nav class="bg-white/85 backdrop-blur-md shadow-sm border-b border-katedral-gold/20 sticky top-0 z-50" x-data="{ open: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-20"> 
      <div class="flex items-center">
        <a href="index.php" class="font-serif font-bold text-xl md:text-2xl text-katedral-charcoal flex items-center gap-3 group">
          <div class="flex items-center justify-center w-10 h-10 bg-katedral-gold/10 rounded-lg group-hover:bg-katedral-gold/20 transition-colors">
            <img src="../user/images/logo_katedral.jpg" class="w-full h-full object-cover">
          </div>
          <span class="tracking-wide whitespace-nowrap">Paroki Katedral Manado</span>
        </a>
      </div>
      
      <div class="hidden xl:flex items-center space-x-1">
        <a href="index.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'index.php' ? $active_desktop : $inactive_desktop; ?>">Beranda</a>
        <a href="profil_paroki.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'profil_paroki.php' ? $active_desktop : $inactive_desktop; ?>">Profil Paroki</a>
        <a href="liturgi.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'liturgi.php' ? $active_desktop : $inactive_desktop; ?>">Liturgi</a>
        <a href="jadwal_sakramen.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'jadwal_sakramen.php' ? $active_desktop : $inactive_desktop; ?>">Sakramen</a>
        <a href="doa_indonesia.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'doa_indonesia.php' ? $active_desktop : $inactive_desktop; ?>">Doa Indonesia</a>
        <a href="doa_latin.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'doa_latin.php' ? $active_desktop : $inactive_desktop; ?>">Doa Latin</a>
        <a href="pembayaran.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'pembayaran.php' ? $active_desktop : $inactive_desktop; ?>">Persembahan</a>
        <a href="kontak.php" class="px-2 py-2 text-sm whitespace-nowrap rounded-full transition-all <?php echo $current_page == 'kontak.php' ? $active_desktop : $inactive_desktop; ?>">Kontak</a>
      </div>
      
      <div class="-mr-2 flex items-center xl:hidden">
        <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-katedral-gold hover:bg-gray-50 focus:outline-none">
          <i class="bi bi-list text-3xl" x-show="!open"></i>
          <i class="bi bi-x text-3xl" x-show="open" x-cloak></i>
        </button>
      </div>
    </div>
  </div>

  <div x-show="open" x-transition class="xl:hidden bg-white/95 backdrop-blur-md border-t border-gray-100 absolute w-full shadow-lg" x-cloak>
    <div class="px-4 pt-2 pb-4 space-y-1 shadow-inner">
      <a href="index.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'index.php' ? $active_mobile : $inactive_mobile; ?>">Beranda</a>
      <a href="profil_paroki.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'profil_paroki.php' ? $active_mobile : $inactive_mobile; ?>">Profil Paroki</a>
      <a href="liturgi.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'liturgi.php' ? $active_mobile : $inactive_mobile; ?>">Liturgi</a>
      <a href="jadwal_sakramen.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'jadwal_sakramen.php' ? $active_mobile : $inactive_mobile; ?>">Sakramen</a>
      <a href="doa_indonesia.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'doa_indonesia.php' ? $active_mobile : $inactive_mobile; ?>">Doa Indonesia</a>
      <a href="doa_latin.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'doa_latin.php' ? $active_mobile : $inactive_mobile; ?>">Doa Latin</a>
      <a href="pembayaran.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'pembayaran.php' ? $active_mobile : $inactive_mobile; ?>">Persembahan</a>
      <a href="kontak.php" class="block px-4 py-3 rounded-lg text-base <?php echo $current_page == 'kontak.php' ? $active_mobile : $inactive_mobile; ?>">Kontak</a>
    </div>
  </div>
</nav>