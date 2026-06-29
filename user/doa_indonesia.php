<?php
// Katedral/user/doa_indonesia.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 

// Database kecil khusus untuk teks doa Bahasa Indonesia
$kumpulan_doa_id = [
    'tanda-salib' => [
        'judul' => 'Tanda Salib',
        'kategori' => 'Doa Dasar',
        'teks' => "Dalam nama Bapa dan Putra dan Roh Kudus. Amin."
    ],
    'bapa-kami' => [
        'judul' => 'Bapa Kami',
        'kategori' => 'Doa Dasar',
        'teks' => "Bapa kami yang ada di surga,<br>Dimuliakanlah nama-Mu.<br>Datanglah kerajaan-Mu.<br>Jadilah kehendak-Mu<br>di atas bumi seperti di dalam surga.<br><br>Berilah kami rezeki pada hari ini,<br>dan ampunilah kesalahan kami,<br>seperti kami pun mengampuni yang bersalah kepada kami.<br>Dan janganlah masukkan kami ke dalam pencobaan,<br>tetapi bebaskanlah kami dari yang jahat. Amin."
    ],
    'salam-maria' => [
        'judul' => 'Salam Maria',
        'kategori' => 'Doa Dasar',
        'teks' => "Salam Maria, penuh rahmat, Tuhan sertamu,<br>terpujilah engkau di antara wanita,<br>dan terpujilah buah tubuhmu, Yesus.<br><br>Santa Maria, bunda Allah,<br>doakanlah kami yang berdosa ini<br>sekarang dan waktu kami mati. Amin."
    ],
    'kemuliaan' => [
        'judul' => 'Kemuliaan',
        'kategori' => 'Doa Dasar',
        'teks' => "Kemuliaan kepada Bapa dan Putra dan Roh Kudus,<br>seperti pada permulaan, sekarang, selalu,<br>dan sepanjang segala abad. Amin."
    ],
    'saya-mengaku' => [
        'judul' => 'Saya Mengaku (Confiteor)',
        'kategori' => 'Doa Tobat & Persiapan',
        'teks' => "Saya mengaku kepada Allah yang Mahakuasa, dan kepada Saudara sekalian, bahwa saya telah berdosa, dengan pikiran dan perkataan, dengan perbuatan dan kelalaian.<br><br><em>(sambil menebah dada 3 kali)</em><br>Saya berdosa, saya berdosa, saya sungguh berdosa.<br><br>Oleh sebab itu saya mohon kepada Santa Perawan Maria, kepada para Malaikat dan Orang Kudus dan kepada Saudara sekalian, supaya mendoakan saya pada Allah, Tuhan kita."
    ],
    'aku-percaya' => [
        'judul' => 'Aku Percaya (Syahadat Para Rasul)',
        'kategori' => 'Syahadat Singkat',
        'teks' => "Aku percaya akan Allah,<br>Bapa yang Mahakuasa, pencipta langit dan bumi.<br>Dan akan Yesus Kristus, Putra-Nya yang tunggal, Tuhan kita.<br>Yang dikandung dari Roh Kudus, dilahirkan oleh perawan Maria.<br>Yang menderita sengsara dalam pemerintahan Pontius Pilatus,<br>disalibkan, wafat dan dimakamkan.<br>Yang turun ke tempat penantian, pada hari ketiga bangkit dari antara orang mati.<br>Yang naik ke surga, duduk di sebelah kanan Allah Bapa yang Mahakuasa.<br>Dari situ Ia akan datang mengadili orang hidup dan mati.<br><br>Aku percaya akan Roh Kudus,<br>Gereja Katolik yang kudus, persekutuan para kudus,<br>pengampunan dosa,<br>kebangkitan badan,<br>kehidupan kekal. Amin."
    ],
    'aku-percaya-nicea' => [
        'judul' => 'Aku Percaya (Syahadat Nicea-Konstantinopel)',
        'kategori' => 'Syahadat Panjang',
        'teks' => "Aku percaya akan satu Allah,<br>Bapa yang Mahakuasa, pencipta langit dan bumi, dan segala sesuatu yang kelihatan dan tak kelihatan.<br><br>Dan akan satu Tuhan Yesus Kristus, Putra Allah yang tunggal. Ia lahir dari Bapa sebelum segala abad. Allah dari Allah, Terang dari Terang, Allah benar dari Allah benar. Ia dilahirkan, bukan dijadikan, sehakikat dengan Bapa; segala sesuatu dijadikan oleh-Nya. Ia turun dari surga untuk kita manusia dan untuk keselamatan kita. Dan Ia menjadi daging oleh Roh Kudus dari Perawan Maria, dan menjadi manusia. Ia disalibkan untuk kita di bawah pemerintahan Pontius Pilatus; Ia menderita sengsara dan dimakamkan. Pada hari ketiga Ia bangkit menurut Kitab Suci. Ia naik ke surga, duduk di sisi Bapa. Ia akan datang kembali dengan mulia, mengadili orang yang hidup dan yang mati; Kerajaan-Nya takkan berakhir.<br><br>Aku percaya akan Roh Kudus, Ia Tuhan yang menghidupkan; Ia berasal dari Bapa dan Putra. Yang serta Bapa dan Putra disembah dan dimuliakan; Ia bersabda dengan perantaraan para nabi. Aku percaya akan Gereja yang satu, kudus, katolik dan apostolik. Aku mengakui satu pembaptisan akan penghapusan dosa. Aku menantikan kebangkitan orang mati dan hidup di akhirat. Amin."
    ],
    'doa-tobat' => [
        'judul' => 'Doa Tobat',
        'kategori' => 'Doa Tobat & Persiapan',
        'teks' => "Allah yang maharahim, aku menyesal atas dosa-dosaku.<br>Aku sungguh patut Engkau hukum, terutama karena aku telah tidak setia kepada Engkau yang maha pengasih dan mahabaik bagiku.<br><br>Aku benci akan segala dosaku, dan berjanji dengan pertolongan rahmat-Mu hendak memperbaiki hidupku dan tidak akan berbuat dosa lagi.<br>Allah yang mahamurah, ampunilah aku, orang berdosa. Amin."
    ],
    'malaikat-tuhan' => [
        'judul' => 'Malaikat Tuhan (Angelus)',
        'kategori' => 'Doa Harian (Pkl 06.00, 12.00, 18.00)',
        'teks' => "P: Maria diberi kabar oleh malaikat Tuhan,<br>U: Bahwa ia akan mengandung dari Roh Kudus.<br><em>(Salam Maria...)</em><br><br>P: Aku ini hamba Tuhan,<br>U: Terjadilah padaku menurut perkataanmu.<br><em>(Salam Maria...)</em><br><br>P: Sabda sudah menjadi daging,<br>U: Dan tinggal di antara kita.<br><em>(Salam Maria...)</em><br><br>P: Doakanlah kami, ya Santa Bunda Allah,<br>U: Supaya kami dapat menikmati janji Kristus.<br><br>Marilah berdoa: Ya Allah, karena kabar malaikat kami mengetahui bahwa Yesus Kristus Putra-Mu menjadi manusia; curahkanlah rahmat-Mu ke dalam hati kami, supaya karena sengsara dan salib-Nya, kami dibawa kepada kejayaan kebangkitan. Sebab Dialah Tuhan, pengantara kami. Amin."
    ]
];

// Menangkap parameter dari URL
$doa_aktif = isset($_GET['doa']) ? $_GET['doa'] : '';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="lg:w-2/3">
            
            <?php 
            // JIKA USER KLIK SEBUAH DOA TERTENTU
            if(array_key_exists($doa_aktif, $kumpulan_doa_id)): 
                $item = $kumpulan_doa_id[$doa_aktif];
            ?>
                <div class="bg-white p-8 md:p-12 shadow-sm border border-gray-100 text-center rounded-xl">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 mb-6 uppercase tracking-wider"><?php echo $item['kategori']; ?></span>
                    <h3 class="font-bold text-4xl text-katedral-charcoal mb-8 font-serif"><?php echo $item['judul']; ?></h3>
                    
                    <div class="p-6 md:p-10 bg-katedral-cream rounded-xl mx-auto border border-gray-200 shadow-inner text-lg md:text-xl text-gray-800 max-w-2xl leading-relaxed font-serif">
                        <?php echo $item['teks']; ?>
                    </div>

                    <div class="mt-10">
                        <a href="doa_indonesia.php" class="inline-flex items-center justify-center px-6 py-3 border border-katedral-charcoal text-katedral-charcoal rounded-lg hover:bg-katedral-charcoal hover:text-white transition-colors font-medium">
                            <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar Doa
                        </a>
                    </div>
                </div>

            <?php 
            // JIKA USER BELUM KLIK APA-APA (TAMPILKAN MENU UTAMA)
            else: 
            ?>
                <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl mb-8">
                    <h3 class="font-bold text-2xl border-b-2 border-katedral-charcoal pb-4 mb-6 font-serif text-katedral-charcoal">Doa Dasar Katolik</h3>
                    <p class="text-gray-600 mb-6 text-lg">Pilih salah satu doa di bawah ini untuk melihat teks lengkapnya :</p>
                    
                    <!-- Search Box -->
                    <div class="mb-6 relative">
                        <input type="text" id="searchDoa" class="form-control w-full px-4 py-3 ps-5 border border-gray-300 rounded-xl focus:ring-katedral-gold focus:border-katedral-gold transition-colors shadow-sm" placeholder="Cari doa...">
                        <i class="bi bi-search absolute left-4 top-3.5 text-gray-400 text-lg" style="margin-top: 3px;"></i>
                    </div>
                    
                    <div class="border border-gray-200 rounded-xl overflow-hidden divide-y divide-gray-200" id="doaList">
                        <?php foreach($kumpulan_doa_id as $kode => $isi): ?>
                            <a href="doa_indonesia.php?doa=<?php echo $kode; ?>" class="doa-item block p-4 sm:px-6 hover:bg-gray-50 transition-colors group">
                                <div class="flex items-center justify-between">
                                    <strong class="doa-title text-gray-900 group-hover:text-katedral-gold transition-colors text-lg"><?php echo $isi['judul']; ?></strong> 
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-katedral-cream text-katedral-charcoal border border-gray-200"><?php echo $isi['kategori']; ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    
                    <div id="noResults" class="hidden text-center py-10 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-200 mt-4">
                        <i class="bi bi-search text-4xl mb-3 block text-gray-300"></i>
                        <p>Doa tidak ditemukan.</p>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const searchInput = document.getElementById('searchDoa');
                            const doaItems = document.querySelectorAll('.doa-item');
                            const noResults = document.getElementById('noResults');
                            const doaList = document.getElementById('doaList');

                            if(searchInput) {
                                searchInput.addEventListener('keyup', function() {
                                    const searchTerm = this.value.toLowerCase();
                                    let visibleCount = 0;

                                    doaItems.forEach(function(item) {
                                        const title = item.querySelector('.doa-title').textContent.toLowerCase();
                                        if (title.includes(searchTerm)) {
                                            item.style.display = 'block';
                                            visibleCount++;
                                        } else {
                                            item.style.display = 'none';
                                        }
                                    });

                                    if (visibleCount === 0) {
                                        noResults.classList.remove('hidden');
                                        doaList.classList.add('hidden');
                                    } else {
                                        noResults.classList.add('hidden');
                                        doaList.classList.remove('hidden');
                                    }
                                });
                            }
                        });
                    </script>
                </div>

            <?php endif; ?>

        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <?php 
            $hide_doa_indonesia_sidebar = true;
            include 'includes/sidebar.php'; 
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>