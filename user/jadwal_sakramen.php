<?php
// Katedral/user/jadwal_sakramen.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold text-katedral-charcoal font-serif mb-4">Jadwal & Info Pelayanan Sakramen</h2>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">Informasi lengkap mengenai jadwal pelayanan Sakramen di Paroki Katedral. Silakan hubungi Sekretariat Paroki untuk pendaftaran dan informasi lebih lanjut.</p>
    </div>

    <!-- Alpine.js Tabs -->
    <div x-data="{ activeTab: 'baptis' }" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-12">
        
        <!-- Tab Navigation (Desktop) -->
        <div class="hidden md:flex border-b border-gray-200">
            <button @click="activeTab = 'baptis'" :class="activeTab === 'baptis' ? 'bg-katedral-cream text-katedral-gold border-b-2 border-katedral-gold' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'" class="flex-1 py-4 px-6 text-center font-medium transition-colors outline-none focus:outline-none">
                <i class="bi bi-water text-lg block mb-1"></i> Baptis
            </button>
            <button @click="activeTab = 'komuni'" :class="activeTab === 'komuni' ? 'bg-katedral-cream text-katedral-gold border-b-2 border-katedral-gold' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'" class="flex-1 py-4 px-6 text-center font-medium transition-colors outline-none focus:outline-none">
                <i class="bi bi-circle text-lg block mb-1"></i> Komuni Pertama
            </button>
            <button @click="activeTab = 'krisma'" :class="activeTab === 'krisma' ? 'bg-katedral-cream text-katedral-gold border-b-2 border-katedral-gold' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'" class="flex-1 py-4 px-6 text-center font-medium transition-colors outline-none focus:outline-none">
                <i class="bi bi-fire text-lg block mb-1"></i> Krisma
            </button>
            <button @click="activeTab = 'pernikahan'" :class="activeTab === 'pernikahan' ? 'bg-katedral-cream text-katedral-gold border-b-2 border-katedral-gold' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'" class="flex-1 py-4 px-6 text-center font-medium transition-colors outline-none focus:outline-none">
                <i class="bi bi-hearts text-lg block mb-1"></i> Pernikahan
            </button>
            <button @click="activeTab = 'pengurapan'" :class="activeTab === 'pengurapan' ? 'bg-katedral-cream text-katedral-gold border-b-2 border-katedral-gold' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'" class="flex-1 py-4 px-6 text-center font-medium transition-colors outline-none focus:outline-none">
                <i class="bi bi-capsule text-lg block mb-1"></i> Pengurapan Orang Sakit
            </button>
        </div>

        <!-- Tab Navigation (Mobile Dropdown) -->
        <div class="md:hidden border-b border-gray-200 bg-gray-50 p-4">
            <select x-model="activeTab" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-katedral-gold focus:border-katedral-gold bg-white">
                <option value="baptis">Sakramen Baptis (Bayi & Dewasa)</option>
                <option value="komuni">Sakramen Komuni Pertama</option>
                <option value="krisma">Sakramen Krisma</option>
                <option value="pernikahan">Sakramen Pernikahan</option>
                <option value="pengurapan">Sakramen Pengurapan Orang Sakit</option>
            </select>
        </div>

        <!-- Tab Contents -->
        <div class="p-6 md:p-10">
            
            <!-- Content: Baptis -->
            <div x-show="activeTab === 'baptis'" x-cloak class="animation-fade">
                <h3 class="text-2xl font-bold text-katedral-charcoal mb-4 border-b pb-2">Sakramen Baptis</h3>
                
                <div class="grid md:grid-cols-2 gap-8 mt-6">
                    <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100">
                        <h4 class="text-xl font-bold text-blue-900 mb-3"><i class="bi bi-person-hearts mr-2"></i>Baptis Bayi/Anak</h4>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex"><i class="bi bi-calendar-check text-katedral-gold mr-3 mt-1"></i> <div><strong>Jadwal:</strong> Minggu ke-2 setiap bulan</div></li>
                            <li class="flex"><i class="bi bi-clock text-katedral-gold mr-3 mt-1"></i> <div><strong>Waktu:</strong> Pkl. 10.00 WITA (setelah Misa Kedua)</div></li>
                            <li class="flex"><i class="bi bi-geo-alt text-katedral-gold mr-3 mt-1"></i> <div><strong>Tempat:</strong> Gereja Katedral</div></li>
                            <li class="flex"><i class="bi bi-info-circle text-katedral-gold mr-3 mt-1"></i> <div><strong>Syarat:</strong> Fotokopi Surat Kawin Katolik orang tua, Surat Permandian Wali Baptis. Pendaftaran paling lambat 1 minggu sebelum jadwal.</div></li>
                        </ul>
                    </div>

                    <div class="bg-amber-50/50 p-6 rounded-xl border border-amber-100">
                        <h4 class="text-xl font-bold text-amber-900 mb-3"><i class="bi bi-person-fill-up mr-2"></i>Baptis Dewasa</h4>
                        <p class="text-gray-700 mb-4">Bagi orang dewasa yang ingin menerima Sakramen Baptis, diwajibkan mengikuti masa Katekumenat (Pelajaran Agama) terlebih dahulu.</p>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex"><i class="bi bi-book text-katedral-gold mr-3 mt-1"></i> <div><strong>Lama Pelajaran:</strong> Kurang lebih 1 tahun (2 periode pendaftaran: Januari & Juli)</div></li>
                            <li class="flex"><i class="bi bi-calendar-check text-katedral-gold mr-3 mt-1"></i> <div><strong>Jadwal Pelajaran:</strong> Setiap Minggu, Pkl. 09.00 - 10.30 WITA</div></li>
                            <li class="flex"><i class="bi bi-water text-katedral-gold mr-3 mt-1"></i> <div><strong>Penerimaan Sakramen:</strong> Biasanya pada Malam Paskah.</div></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content: Komuni -->
            <div x-show="activeTab === 'komuni'" x-cloak class="animation-fade">
                <h3 class="text-2xl font-bold text-katedral-charcoal mb-4 border-b pb-2">Sakramen Komuni Pertama</h3>
                <p class="text-lg text-gray-600 mb-6">Penerimaan Sakramen Mahakudus untuk pertama kalinya bagi anak-anak Katolik.</p>
                
                <div class="bg-gray-50 p-6 md:p-8 rounded-xl border border-gray-200">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/3 flex justify-center items-center">
                            <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-md border border-gray-200">
                                <i class="bi bi-circle-fill text-6xl text-katedral-gold"></i>
                            </div>
                        </div>
                        <div class="md:w-2/3">
                            <ul class="space-y-4 text-gray-700 text-lg">
                                <li class="flex items-start"><i class="bi bi-check-circle-fill text-green-500 mr-3 mt-1 text-xl"></i> <div><strong>Syarat Usia:</strong> Minimal kelas 4 SD atau berusia 10 tahun.</div></li>
                                <li class="flex items-start"><i class="bi bi-journal-text text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Persiapan:</strong> Wajib mengikuti pelajaran persiapan Komuni Pertama selama kurang lebih 3 bulan.</div></li>
                                <li class="flex items-start"><i class="bi bi-calendar-event text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Pelaksanaan:</strong> Umumnya diadakan 1-2 kali setahun (biasanya bertepatan dengan Hari Raya Tubuh dan Darah Kristus).</div></li>
                                <li class="flex items-start"><i class="bi bi-file-earmark-text text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Pendaftaran:</strong> Melalui Ketua Lingkungan masing-masing, membawa fotokopi Surat Baptis anak.</div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content: Krisma -->
            <div x-show="activeTab === 'krisma'" x-cloak class="animation-fade">
                <h3 class="text-2xl font-bold text-katedral-charcoal mb-4 border-b pb-2">Sakramen Krisma (Penguatan)</h3>
                <p class="text-lg text-gray-600 mb-6">Sakramen pendewasaan iman yang dianugerahkan oleh Uskup.</p>

                <div class="bg-red-50/50 p-6 md:p-8 rounded-xl border border-red-100">
                    <ul class="space-y-4 text-gray-700 text-lg">
                        <li class="flex items-start"><i class="bi bi-check-circle-fill text-green-500 mr-3 mt-1 text-xl"></i> <div><strong>Syarat Usia:</strong> Minimal kelas 1 SMP atau berusia 13 tahun, dan sudah menerima Komuni Pertama.</div></li>
                        <li class="flex items-start"><i class="bi bi-journal-text text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Persiapan:</strong> Wajib mengikuti pelajaran persiapan Krisma yang diadakan oleh Paroki.</div></li>
                        <li class="flex items-start"><i class="bi bi-person-badge text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Wali Krisma:</strong> Membutuhkan satu orang Wali Krisma (berjenis kelamin sama dengan calon, beragama Katolik, sudah menerima Krisma, dan hidup sesuai ajaran Gereja).</div></li>
                        <li class="flex items-start"><i class="bi bi-calendar-event text-katedral-gold mr-3 mt-1 text-xl"></i> <div><strong>Pelaksanaan:</strong> Sesuai jadwal kunjungan Bapak Uskup (biasanya 1 kali setahun).</div></li>
                    </ul>
                </div>
            </div>

            <!-- Content: Pernikahan -->
            <div x-show="activeTab === 'pernikahan'" x-cloak class="animation-fade">
                <h3 class="text-2xl font-bold text-katedral-charcoal mb-4 border-b pb-2">Sakramen Pernikahan</h3>
                <p class="text-lg text-gray-600 mb-6">Persiapan dan prosedur penerimaan Sakramen Perkawinan Katolik.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-pink-50/50 p-6 rounded-xl border border-pink-100">
                        <h4 class="text-lg font-bold text-pink-900 mb-4 border-b border-pink-200 pb-2">Langkah Persiapan</h4>
                        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                            <li>Lapor kepada Ketua Lingkungan.</li>
                            <li>Mendaftar ke Sekretariat Paroki (minimal 3 bulan sebelum hari H).</li>
                            <li>Mengikuti Kursus Persiapan Perkawinan (KPP/Discovery).</li>
                            <li>Penyelidikan Kanonik dengan Pastor Paroki.</li>
                            <li>Pengumuman perkawinan di Gereja (3 kali berturut-turut).</li>
                            <li>Penerimaan Sakramen/Pemberkatan.</li>
                        </ol>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h4 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-200 pb-2">Dokumen yang Dibutuhkan</h4>
                        <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm">
                            <li>Fotokopi Surat Permandian (yang sudah diperbarui, maks 6 bulan terakhir).</li>
                            <li>Sertifikat KPP (Kursus Persiapan Perkawinan).</li>
                            <li>Fotokopi KTP dan Kartu Keluarga calon mempelai.</li>
                            <li>Fotokopi KTP Saksi Perkawinan (2 orang Katolik).</li>
                            <li>Pas foto berdampingan (ukuran 4x6, 3 lembar).</li>
                            <li>Surat Keterangan Belum Pernah Menikah dari Kelurahan/Catatan Sipil.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content: Pengurapan -->
            <div x-show="activeTab === 'pengurapan'" x-cloak class="animation-fade">
                <h3 class="text-2xl font-bold text-katedral-charcoal mb-4 border-b pb-2">Sakramen Pengurapan Orang Sakit</h3>
                <p class="text-lg text-gray-600 mb-6">Sakramen penyembuhan dan kekuatan bagi mereka yang sakit parah atau usia lanjut.</p>

                <div class="bg-teal-50/50 p-6 md:p-8 rounded-xl border border-teal-100 text-center">
                    <i class="bi bi-capsule text-6xl text-teal-600 mb-4 block"></i>
                    <p class="text-xl text-gray-700 mb-6 max-w-2xl mx-auto">Sakramen ini diberikan kepada umat Katolik yang sedang menderita sakit berat, akan menjalani operasi besar, atau yang sudah lanjut usia.</p>
                    
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 inline-block text-left mx-auto">
                        <h4 class="font-bold text-lg mb-3">Cara Mengajukan:</h4>
                        <ul class="space-y-2 text-gray-700">
                            <li><i class="bi bi-telephone text-katedral-gold mr-2"></i> Hubungi Sekretariat Paroki segera bila ada keadaan darurat.</li>
                            <li><i class="bi bi-person-lines-fill text-katedral-gold mr-2"></i> Beritahu Ketua Lingkungan setempat.</li>
                            <li><i class="bi bi-house-heart text-katedral-gold mr-2"></i> Pastor akan berkunjung ke rumah atau Rumah Sakit.</li>
                        </ul>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <strong class="text-red-600"><i class="bi bi-exclamation-triangle mr-2"></i>Penting:</strong> Jangan menunggu sampai pasien tidak sadarkan diri.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
    .animation-fade { animation: fadeIn 0.3s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
</style>

<?php include 'includes/footer.php'; ?>
