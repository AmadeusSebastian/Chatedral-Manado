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

<div class="container mt-4 mb-5">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-lg-8 mb-4">
            
            <?php 
            // JIKA USER KLIK SEBUAH DOA TERTENTU
            if(array_key_exists($doa_aktif, $kumpulan_doa_id)): 
                $item = $kumpulan_doa_id[$doa_aktif];
            ?>
                <div class="card p-4 shadow-sm border-0 text-center py-5">
                    <span class="badge bg-secondary mb-3 mx-auto"><?php echo $item['kategori']; ?></span>
                    <h3 class="fw-bold text-dark mb-4"><?php echo $item['judul']; ?></h3>
                    
                    <div class="p-4 bg-white rounded mx-auto border" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 1.15rem; color: #212529; max-width: 650px; line-height: 1.8;">
                        <?php echo $item['teks']; ?>
                    </div>

                    <div class="mt-5">
                        <a href="doa_indonesia.php" class="btn btn-outline-dark px-4"><i class="bi bi-arrow-left"></i> Kembali ke Daftar Doa</a>
                    </div>
                </div>

            <?php 
            // JIKA USER BELUM KLIK APA-APA (TAMPILKAN MENU UTAMA)
            else: 
            ?>
                <div class="card p-4 shadow-sm border-0 mb-4">
                    <h3 class="fw-bold border-bottom pb-3 mb-4">Doa Dasar Katolik</h3>
                    <p class="text-muted mb-4">Pilih salah satu doa di bawah ini untuk melihat teks lengkapnya :</p>
                    <div class="list-group list-group-flush border rounded">
                        <?php foreach($kumpulan_doa_id as $kode => $isi): ?>
                            <a href="doa_indonesia.php?doa=<?php echo $kode; ?>" class="list-group-item list-group-item-action py-3 d-flex justify-content-between align-items-center">
                                <strong><?php echo $isi['judul']; ?></strong> 
                                <span class="badge bg-light text-dark border"><?php echo $isi['kategori']; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php include 'includes/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>