<?php
// Katedral/user/includes/footer.php
?>
    <footer class="bg-white border-t border-gray-200 py-6 mt-10 text-center text-gray-500 text-sm mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            &copy; <?php echo date("Y"); ?> Paroki Hati Tersuci Maria Katedral Manado. Semua hak dilindungi. by Amadeus Sekeon
        </div>
    </footer>

<!-- Reusable Confirmation Modal -->
<div x-data="{ 
        confirmModalOpen: false, 
        confirmMessage: '', 
        confirmActionUrl: '' 
    }" 
    @open-confirm-modal.window="
        confirmMessage = $event.detail.message; 
        confirmActionUrl = $event.detail.url; 
        confirmModalOpen = true;
    "
    class="relative z-[100]" 
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true" 
    x-show="confirmModalOpen" 
    x-cloak>
    
    <!-- Backdrop -->
    <div x-show="confirmModalOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-katedral-charcoal/60 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal Panel -->
            <div x-show="confirmModalOpen"
                 @click.away="confirmModalOpen = false"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="bi bi-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-xl font-bold leading-6 text-katedral-charcoal font-serif" id="modal-title">Konfirmasi Hapus</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" x-text="confirmMessage"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100">
                    <a :href="confirmActionUrl" class="inline-flex w-full justify-center rounded-lg bg-red-600 px-3 py-2 text-sm font-bold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors">Ya, Hapus</a>
                    <button type="button" @click="confirmModalOpen = false" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showConfirmModal(message, url) {
    window.dispatchEvent(new CustomEvent('open-confirm-modal', {
        detail: { message: message, url: url }
    }));
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>