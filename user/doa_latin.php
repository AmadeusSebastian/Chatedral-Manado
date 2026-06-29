<?php
// Katedral/user/doa_latin.php
include 'includes/header.php'; 
include 'includes/navbar.php'; 

// 1. Array Data Doa Latin
$kumpulan_doa = [
    'pater-noster' => [
        'judul' => 'Pater Noster',
        'arti' => 'Bapa Kami',
        'teks' => "Pater noster, qui es in caelis, sanctificetur nomen tuum. Adveniat regnum tuum. Fiat voluntas tua, sicut in caelo et in terra.<br><br>Panem nostrum quotidianum da nobis hodie, et dimitte nobis debita nostra sicut et nos dimittimus debitoribus nostris.<br><br>Et ne nos inducas in tentationem, sed libera nos a malo. Amen."
    ],
    'ave-maria' => [
        'judul' => 'Ave Maria',
        'arti' => 'Salam Maria',
        'teks' => "Ave Maria, gratia plena, Dominus tecum. Benedicta tu in mulieribus, et benedictus fructus ventris tui, Iesus.<br><br>Sancta Maria, Mater Dei, ora pro nobis peccatoribus, nunc, et in hora mortis nostrae. Amen."
    ],
    'gloria' => [
        'judul' => 'Gloria Patri',
        'arti' => 'Kemuliaan',
        'teks' => "Gloria Patri, et Filio, et Spiritui Sancto.<br><br>Sicut erat in principio, et nunc, et semper, et in saecula saeculorum. Amen."
    ],
    'credo-apostolorum' => [
        'judul' => 'Credo (Symbolum Apostolorum)',
        'arti' => 'Aku Percaya (Syahadat Para Rasul - Singkat)',
        'teks' => "Credo in Deum Patrem omnipotentem, Creatorem caeli et terrae. Et in Iesum Christum, Filium eius unicum, Dominum nostrum: qui conceptus est de Spiritu Sancto, natus ex Maria Virgine, passus sub Pontio Pilato, crucifixus, mortuus, et sepultus: descendit ad inferos; tertia die resurrexit a mortuis; ascendit ad caelos; sedet ad dexteram Dei Patris omnipotentis: inde venturus est iudicare vivos et mortuos.<br><br>Credo in Spiritum Sanctum, sanctam Ecclesiam catholicam, Sanctorum communionem, remissionem peccatorum, carnis resurrectionem, vitam aeternam. Amen."
    ],
    'credo-nicea' => [
        'judul' => 'Credo (Symbolum Nicaenum)',
        'arti' => 'Aku Percaya (Syahadat Nicea-Konstantinopel - Lengkap/Tritunggal)',
        'teks' => "Credo in unum Deum, Patrem omnipotentem, factorem caeli et terrae, visibilium omnium et invisibilium.<br><br>Et in unum Dominum Iesum Christum, Filium Dei unigenitum, et ex Patre natum ante omnia saecula. Deum de Deo, lumen de lumine, Deum verum de Deo vero, genitum, non factum, consubstantialem Patri: per quem omnia facta sunt. Qui propter nos homines et propter nostram salutem descendit de caelis. Et incarnatus est de Spiritu Sancto ex Maria Virgine, et homo factus est. Crucifixus etiam pro nobis sub Pontio Pilato; passus et sepultus est, et resurrexit tertia die, secundum Scripturas, et ascendit in caelum, sedet ad dexteram Patris. Et iterum venturus est cum gloria, iudicare vivos et mortuos, cuius regni non erit finis.<br><br>Et in Spiritum Sanctum, Dominum et vivificantem: qui ex Patre Filioque procedit. Qui cum Patre et Filio simul adoratur et conglorificatur: qui locutus est per prophetas. Et unam, sanctam, catholicam et apostolicam Ecclesiam. Confiteor unum baptisma in remissionem peccatorum. Et exspecto resurrectionem mortuorum, et vitam venturi saeculi. Amen."
    ],
    'confiteor' => [
        'judul' => 'Confiteor',
        'arti' => 'Saya Mengaku',
        'teks' => "Confiteor Deo omnipotenti, et vobis fratres, quia peccavi nimis cogitatione, verbo, opere et omissione: mea culpa, mea culpa, mea maxima culpa. Ideo precor beatam Mariam semper Virginem, omnes Angelos et Sanctos, et vos, fratres, orare pro me ad Dominum Deum nostrum."
    ],
    'anima-christi' => [
        'judul' => 'Anima Christi',
        'arti' => 'Jiwa Kristus',
        'teks' => "Anima Christi, sanctifica me.<br>Corpus Christi, salva me.<br>Sanguis Christi, inebria me.<br>Aqua lateris Christi, lava me.<br>Passio Christi, conforta me.<br>O bone Iesu, exaudi me.<br>Intra tua vulnera absconde me.<br>Ne permittas me separari a te.<br>Ab hoste maligno defende me.<br>In hora mortis meae voca me.<br>Et iube me venire ad te,<br>ut cum Sanctis tuis laudem te,<br>in saecula saeculorum. Amen."
    ],
    'salve-regina' => [
        'judul' => 'Salve Regina',
        'arti' => 'Salam Ya Ratu',
        'teks' => "Salve, Regina, Mater misericordiae, vita, dulcedo, et spes nostra, salve. Ad te clamamus exsules filii Hevae. Ad te suspiramus, gementes et flentes in hac lacrimarum valle.<br><br>Eia, ergo, advocata nostra, illos tuos misericordes oculos ad nos converte. Et Iesum, benedictum fructum ventris tui, nobis post hoc exsilium ostende.<br><br>O clemens, O pia, O dulcis Virgo Maria."
    ]
];

// 2. Array Data Nyanyian Latin
$kumpulan_nyanyian = [
    'vidi-aquam' => [
        'judul' => 'Vidi Aquam',
        'arti' => 'Aku Melihat Air (Nyanyian Pemercikan Masa Paskah)',
        'teks' => "Vidi aquam egredientem de templo, a latere dextro, alleluia: et omnes, ad quos pervenit aqua ista, salvi facti sunt, et dicent, alleluia, alleluia.<br><br>Confitemini Domino quoniam bonus: quoniam in saeculum misericordia eius.<br>Gloria Patri, et Filio, et Spiritui Sancto. Sicut erat in principio, et nunc, et semper, et in saecula saeculorum. Amen."
    ],
    'pange-lingua' => [
        'judul' => 'Pange Lingua Gloriosi',
        'arti' => 'Madah Pujian Sakramen Mahakudus',
        'teks' => "Pange, lingua, gloriosi<br>Corporis mysterium,<br>Sanguinisque pretiosi,<br>quem in mundi pretium<br>fructus ventris generosi<br>Rex effudit Gentium.<br><br>Nobis datus, nobis natus<br>ex intacta Virgine,<br>et in mundo conversatus,<br>sparso verbi semine,<br>sui moras incolatus<br>miro clausit ordine."
    ],
    'tantum-ergo' => [
        'judul' => 'Tantum Ergo Sacramentum',
        'arti' => 'Sakramen Yang Mengagumkan (Penyembahan Sakramen Mahakudus)',
        'teks' => "Tantum ergo Sacramentum<br>veneremur cernui:<br>et antiquum documentum<br>novo cedat ritui:<br>praestet fides supplementum<br>sensuum defectui.<br><br>Genitori, Genitoque<br>laus et iubilatio,<br>salus, honor, virtus quoque<br>sit et benedictio:<br>procedenti ab utroque<br>compar sit laudatio. Amen."
    ],
    'panis-angelicus' => [
        'judul' => 'Panis Angelicus',
        'arti' => 'Roti Malaikat',
        'teks' => "Panis angelicus<br>fit panis hominum;<br>Dat panis coelicus<br>figuris terminum:<br>O res mirabilis!<br>Manducat Dominum<br>Pauper, servus et humilis.<br><br>Te trina Deitas<br>unaque poscimus:<br>Sic nos tu visita,<br>sicut te colimus;<br>Per tuas semitas<br>duc nos quo tendimus,<br>Ad lucem quam inhabitas. Amen."
    ]
];

// Menangkap parameter dari URL
$doa_aktif = isset($_GET['doa']) ? $_GET['doa'] : '';
$nyanyian_aktif = isset($_GET['nyanyian']) ? $_GET['nyanyian'] : '';
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="lg:w-2/3">
            
            <?php 
            // 1. JIKA USER KLIK SEBUAH DOA
            if(array_key_exists($doa_aktif, $kumpulan_doa)): 
                $item = $kumpulan_doa[$doa_aktif];
            ?>
                <div class="bg-white p-8 md:p-12 shadow-sm border border-gray-100 text-center rounded-xl">
                    <h3 class="font-bold text-4xl text-katedral-charcoal mb-2 font-serif"><?php echo $item['judul']; ?></h3>
                    <p class="text-gray-500 mb-8">(<?php echo $item['arti']; ?>)</p>
                    
                    <div class="p-6 md:p-10 bg-katedral-cream rounded-xl mx-auto border border-gray-200 shadow-inner text-lg md:text-xl text-gray-800 max-w-2xl leading-relaxed font-latin">
                        <?php echo $item['teks']; ?>
                    </div>

                    <div class="mt-10">
                        <a href="doa_latin.php" class="inline-flex items-center justify-center px-6 py-3 border border-katedral-charcoal text-katedral-charcoal rounded-lg hover:bg-katedral-charcoal hover:text-white transition-colors font-medium">
                            <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>

            <?php 
            // 2. JIKA USER KLIK SEBUAH NYANYIAN
            elseif(array_key_exists($nyanyian_aktif, $kumpulan_nyanyian)): 
                $item = $kumpulan_nyanyian[$nyanyian_aktif];
            ?>
                <div class="bg-white p-8 md:p-12 shadow-sm border border-gray-100 text-center rounded-xl">
                    <h3 class="font-bold text-4xl text-katedral-charcoal mb-2 font-serif"><?php echo $item['judul']; ?></h3>
                    <p class="text-gray-500 mb-8">(<?php echo $item['arti']; ?>)</p>
                    
                    <div class="p-6 md:p-10 bg-katedral-cream rounded-xl mx-auto border border-gray-200 shadow-inner text-lg md:text-xl text-gray-800 max-w-2xl leading-relaxed font-latin">
                        <?php echo $item['teks']; ?>
                    </div>

                    <div class="mt-10">
                        <a href="doa_latin.php" class="inline-flex items-center justify-center px-6 py-3 border border-katedral-charcoal text-katedral-charcoal rounded-lg hover:bg-katedral-charcoal hover:text-white transition-colors font-medium">
                            <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>

            <?php 
            // 3. JIKA USER BELUM KLIK APA-APA (TAMPILKAN DAFTAR SEMUA MENU)
            else: 
            ?>
                <!-- Search Box -->
                <div class="mb-8 relative">
                    <input type="text" id="searchDoaLatin" class="form-control w-full px-4 py-3 ps-5 border border-gray-300 rounded-xl focus:ring-katedral-gold focus:border-katedral-gold transition-colors shadow-sm" placeholder="Cari doa atau nyanyian latin...">
                    <i class="bi bi-search absolute left-4 top-3.5 text-gray-400 text-lg" style="margin-top: 3px;"></i>
                </div>

                <div id="noResultsLatin" class="hidden text-center py-10 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-200 mb-8">
                    <i class="bi bi-search text-4xl mb-3 block text-gray-300"></i>
                    <p>Doa atau nyanyian tidak ditemukan.</p>
                </div>

                <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl mb-8" id="doaListSection">
                    <h3 class="font-bold text-2xl border-b-2 border-katedral-charcoal pb-4 mb-6 font-serif text-katedral-charcoal">Kumpulan Doa Bahasa Latin</h3>
                    <p class="text-gray-600 mb-6 text-lg">Pilih salah satu doa di bawah ini untuk melihat teks mendarasnya :</p>
                    <div class="border border-gray-200 rounded-xl overflow-hidden divide-y divide-gray-200">
                        <?php foreach($kumpulan_doa as $kode => $isi): ?>
                            <a href="doa_latin.php?doa=<?php echo $kode; ?>" class="doa-latin-item block p-4 sm:px-6 hover:bg-gray-50 transition-colors group" data-type="doa">
                                <strong class="doa-title text-gray-900 group-hover:text-katedral-gold transition-colors text-lg"><?php echo $isi['judul']; ?></strong> 
                                <span class="text-gray-500 ml-2">(<?php echo $isi['arti']; ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl mb-8" id="nyanyianListSection">
                    <h3 class="font-bold text-2xl border-b-2 border-katedral-charcoal pb-4 mb-6 font-serif text-katedral-charcoal">Nyanyian Liturgi Latin</h3>
                    <p class="text-gray-600 mb-6 text-lg">Pilih salah satu madah / nyanyian di bawah ini untuk melihat liriknya :</p>
                    <div class="border border-gray-200 rounded-xl overflow-hidden divide-y divide-gray-200">
                        <?php foreach($kumpulan_nyanyian as $kode => $isi): ?>
                            <a href="doa_latin.php?nyanyian=<?php echo $kode; ?>" class="doa-latin-item block p-4 sm:px-6 hover:bg-gray-50 transition-colors group" data-type="nyanyian">
                                <strong class="doa-title text-gray-900 group-hover:text-katedral-gold transition-colors text-lg"><?php echo $isi['judul']; ?></strong> 
                                <span class="text-gray-500 ml-2">(<?php echo $isi['arti']; ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('searchDoaLatin');
                        const items = document.querySelectorAll('.doa-latin-item');
                        const noResults = document.getElementById('noResultsLatin');
                        const doaSection = document.getElementById('doaListSection');
                        const nyanyianSection = document.getElementById('nyanyianListSection');

                        if(searchInput) {
                            searchInput.addEventListener('keyup', function() {
                                const searchTerm = this.value.toLowerCase();
                                let visibleDoa = 0;
                                let visibleNyanyian = 0;

                                items.forEach(function(item) {
                                    const title = item.querySelector('.doa-title').textContent.toLowerCase();
                                    const subtitle = item.querySelector('span').textContent.toLowerCase();
                                    const type = item.getAttribute('data-type');
                                    
                                    if (title.includes(searchTerm) || subtitle.includes(searchTerm)) {
                                        item.style.display = 'block';
                                        if (type === 'doa') visibleDoa++;
                                        else visibleNyanyian++;
                                    } else {
                                        item.style.display = 'none';
                                    }
                                });

                                doaSection.style.display = visibleDoa > 0 ? 'block' : 'none';
                                nyanyianSection.style.display = visibleNyanyian > 0 ? 'block' : 'none';

                                if (visibleDoa === 0 && visibleNyanyian === 0) {
                                    noResults.classList.remove('hidden');
                                } else {
                                    noResults.classList.add('hidden');
                                }
                            });
                        }
                    });
                </script>

            <?php endif; ?>

        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <?php 
            $hide_doa_latin_sidebar = true;
            include 'includes/sidebar.php'; 
            ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>