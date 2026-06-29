<?php
// Katedral/user/pembayaran.php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="bg-transparent min-h-screen py-12 px-4">
    <div class="max-w-md mx-auto bg-white rounded-3xl shadow-lg overflow-hidden p-8 text-center mt-12 mb-12 border border-gray-100">
        
        <div class="mb-6 flex justify-center">
            <div class="w-16 h-16 bg-katedral-gold/10 rounded-full flex items-center justify-center">
                <i class="bi bi-heart-fill text-3xl text-katedral-gold"></i>
            </div>
        </div>

        <h2 class="font-serif font-bold text-3xl text-katedral-charcoal mb-2">Persembahan Kasih</h2>
        <p class="text-gray-600 mb-8 text-sm">
            Ini adalah kode QRIS resmi untuk penyaluran kolekte dan persembahan kasih Paroki Hati Tersuci Maria Katedral Manado.
        </p>

        <img src="../user/images/qris_katedral.jpg" alt="QRIS Paroki Katedral" class="w-full max-w-[250px] mx-auto border-4 border-gray-100 rounded-xl shadow-sm mb-4">

        <a href="../user/images/qris_katedral.jpg" download="QRIS_Paroki_Katedral.jpg" class="inline-flex items-center justify-center gap-2 mt-4 mb-8 px-6 py-2 bg-katedral-gold/10 text-katedral-gold hover:bg-katedral-gold hover:text-white rounded-full font-semibold transition-all duration-300">
            <i class="bi bi-download text-lg"></i> Simpan QRIS
        </a>

        <div class="border-t border-gray-100 pt-6">
            <p class="text-sm font-medium text-katedral-charcoal fst-italic mb-2">
                "Hendaklah masing-masing memberikan menurut kerelaan hatinya, jangan dengan sedih hati atau karena paksaan, sebab Allah mengasihi orang yang memberi dengan sukacita."
            </p>
            <p class="text-xs text-gray-400 font-bold tracking-wider uppercase">— 2 Korintus 9:7</p>
        </div>
        
        <div class="mt-8 bg-gray-50 rounded-lg p-3 border border-gray-100">
            <p class="text-xs text-gray-500 font-medium">
                Terima kasih atas partisipasi dan persembahan kasih Anda untuk pelayanan Gereja.
            </p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
