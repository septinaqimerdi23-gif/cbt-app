<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Clean up existing data for fresh seed
            Answer::query()->forceDelete();
            Question::query()->forceDelete();
            Subject::query()->forceDelete();

            $this->seedMatematika();
            $this->seedBahasaIndonesia();
            $this->seedIPA();
            $this->seedPKn();
            $this->seedBahasaInggris();
        });

        $this->command->info("✓ Berhasil seed 5 Pelajaran, masing-masing 150 soal!");
    }

    /**
     * 1. Pelajaran Matematika
     */
    private function seedMatematika(): void
    {
        $matematika = Subject::factory()->create([
            'name' => 'Matematika',
            'description' => 'Mata Pelajaran Matematika (Aritmatika, Aljabar, Geometri, Trigonometri, Statistika, Peluang, Barisan dan Deret)',
            'is_active' => true,
        ]);

        $soalMatematika = [
            ["Hasil dari 25 + 14 × 3 adalah...", "67", "117", "57", "77"],
            ["Hasil dari 120 : 4 + 15 × 2 adalah...", "60", "45", "90", "75"],
            ["Nilai x yang memenuhi persamaan 3x + 7 = 22 adalah...", "5", "6", "4", "7"],
            ["Nilai x yang memenuhi persamaan 4x - 5 = 19 adalah...", "6", "5", "7", "8"],
            ["Hasil dari 3³ + 2⁴ adalah...", "43", "35", "25", "49"],
            ["Hasil dari 5² × 2³ adalah...", "200", "100", "150", "250"],
            ["Hasil dari √144 + √81 adalah...", "21", "25", "19", "23"],
            ["Hasil dari √225 - √64 adalah...", "7", "9", "11", "5"],
            ["Penyederhanaan dari bentuk aljabar 5x + 3y - 2x + 4y adalah...", "3x + 7y", "7x + 7y", "3x - y", "7x + y"],
            ["Hasil dari perkalian aljabar (x + 3)(x + 2) adalah...", "x² + 5x + 6", "x² + 6x + 5", "x² + 5x + 5", "x² + 6x + 6"],
            ["Luas persegi dengan panjang sisi 12 cm adalah...", "144 cm²", "48 cm²", "124 cm²", "154 cm²"],
            ["Keliling persegi dengan panjang sisi 15 cm adalah...", "60 cm", "225 cm", "30 cm", "45 cm"],
            ["Keliling persegi panjang dengan panjang 16 cm dan lebar 9 cm adalah...", "50 cm", "144 cm", "25 cm", "54 cm"],
            ["Luas persegi panjang dengan panjang 18 cm dan lebar 10 cm adalah...", "180 cm²", "56 cm²", "160 cm²", "200 cm²"],
            ["Luas segitiga dengan alas 14 cm dan tinggi 8 cm adalah...", "56 cm²", "112 cm²", "48 cm²", "64 cm²"],
            ["Luas lingkaran dengan jari-jari 7 cm (π = 22/7) adalah...", "154 cm²", "44 cm²", "308 cm²", "144 cm²"],
            ["Keliling lingkaran dengan jari-jari 14 cm (π = 22/7) adalah...", "88 cm", "616 cm", "44 cm", "176 cm"],
            ["Volume kubus dengan panjang rusuk 8 cm adalah...", "512 cm³", "384 cm³", "64 cm³", "216 cm³"],
            ["Luas permukaan kubus dengan panjang rusuk 6 cm adalah...", "216 cm²", "144 cm²", "36 cm²", "256 cm²"],
            ["Volume balok dengan panjang 12 cm, lebar 8 cm, dan tinggi 5 cm adalah...", "480 cm³", "240 cm³", "96 cm³", "520 cm³"],
            ["Panjang hipotenusa segitiga siku-siku dengan alas 6 cm dan tinggi 8 cm adalah...", "10 cm", "12 cm", "14 cm", "9 cm"],
            ["Panjang hipotenusa segitiga siku-siku dengan alas 5 cm dan tinggi 12 cm adalah...", "13 cm", "15 cm", "17 cm", "14 cm"],
            ["Panjang sisi tegak segitiga siku-siku dengan hipotenusa 25 cm dan alas 7 cm adalah...", "24 cm", "20 cm", "18 cm", "22 cm"],
            ["Sebuah baju seharga Rp 150.000 mendapat diskon 20%. Harga setelah diskon adalah...", "Rp 120.000", "Rp 130.000", "Rp 125.000", "Rp 135.000"],
            ["Sebuah celana seharga Rp 200.000 mendapat diskon 15%. Berapa potongan harganya?", "Rp 30.000", "Rp 170.000", "Rp 25.000", "Rp 35.000"],
            ["Pak Budi membeli barang seharga Rp 80.000 dan menjualnya seharga Rp 100.000. Persentase untungnya adalah...", "25%", "20%", "15%", "30%"],
            ["Ibu membeli barang seharga Rp 50.000 dan rugi 10%. Berapa harga jualnya?", "Rp 45.000", "Rp 40.000", "Rp 48.000", "Rp 42.000"],
            ["Tabungan awal di bank Rp 1.000.000 dengan bunga tunggal 6% per tahun. Bunga selama 1 tahun adalah...", "Rp 60.000", "Rp 600.000", "Rp 120.000", "Rp 30.000"],
            ["Perbandingan uang Ali dan Budi adalah 3 : 5. Jika jumlah uang mereka Rp 80.000, berapa uang Ali?", "Rp 30.000", "Rp 50.000", "Rp 40.000", "Rp 20.000"],
            ["Perbandingan uang Sisi dan Tari adalah 2 : 7. Jika selisih uang mereka Rp 50.000, berapa uang Tari?", "Rp 70.000", "Rp 20.000", "Rp 90.000", "Rp 50.000"],
            ["Skala peta adalah 1 : 500.000. Jika jarak pada peta 4 cm, maka jarak sebenarnya adalah...", "20 km", "200 km", "2 km", "50 km"],
            ["Mobil menempuh jarak 180 km dalam waktu 3 jam. Kecepatan rata-rata mobil tersebut adalah...", "60 km/jam", "50 km/jam", "70 km/jam", "80 km/jam"],
            ["Waktu yang dibutuhkan untuk menempuh jarak 240 km dengan kecepatan 80 km/jam adalah...", "3 jam", "4 jam", "2,5 jam", "5 jam"],
            ["Nilai rata-rata (mean) dari kelompok data [6, 7, 8, 9, 10] adalah...", "8", "7", "8,5", "7,5"],
            ["Nilai rata-rata dari data [10, 12, 14, 16, 18] adalah...", "14", "13", "15", "16"],
            ["Median dari data terurut [4, 5, 7, 8, 10, 12, 14] adalah...", "8", "7", "10", "7,5"],
            ["Modus dari kelompok data [5, 6, 6, 7, 8, 6, 9, 6, 10] adalah...", "6", "5", "7", "8"],
            ["Dua buah koin dilempar bersamaan. Peluang munculnya pasangan angka dan gambar adalah...", "2/4 (1/2)", "1/4", "3/4", "4/4"],
            ["Sebuah dadu dilempar satu kali. Peluang munculnya mata dadu genap adalah...", "3/6 (1/2)", "1/6", "2/6", "4/6"],
            ["Sebuah dadu dilempar satu kali. Peluang munculnya mata dadu prima (2, 3, 5) adalah...", "3/6 (1/2)", "1/6", "2/6", "5/6"],
            ["Suku ke-10 dari barisan aritmatika 3, 7, 11, 15, ... adalah...", "39", "35", "43", "37"],
            ["Suku ke-15 dari barisan aritmatika 5, 10, 15, 20, ... adalah...", "75", "70", "80", "85"],
            ["Beda (b) dari barisan aritmatika 12, 19, 26, 33, ... adalah...", "7", "6", "8", "5"],
            ["Suku pertama (a) dan rasio (r) dari barisan geometri 2, 6, 18, 54, ... adalah...", "a = 2, r = 3", "a = 3, r = 2", "a = 2, r = 4", "a = 6, r = 3"],
            ["Hasil dari (2³)² adalah...", "64", "32", "128", "16"],
            ["Bentuk sederhana dari (a³ × a⁵) : a² adalah...", "a⁶", "a⁷", "a⁸", "a⁵"],
            ["Hasil dari 4⁰ + 5⁰ + 6⁰ adalah...", "3", "1", "15", "0"],
            ["Hasil dari 2⁻³ adalah...", "1/8", "-8", "-6", "1/6"],
            ["Nilai dari sin 30° adalah...", "1/2", "√3/2", "1/√2", "1"],
            ["Nilai dari cos 60° adalah...", "1/2", "√3/2", "1/√2", "0"],
            ["Nilai dari tan 45° adalah...", "1", "0", "√3", "1/√3"],
            ["Sudut pelurus dari sudut 70° adalah...", "110°", "20°", "90°", "120°"],
            ["Sudut penyiku dari sudut 35° adalah...", "55°", "145°", "65°", "45°"],
            ["Jumlah sudut dalam sebuah segitiga adalah...", "180°", "360°", "90°", "270°"],
            ["Jumlah sudut dalam sebuah segi empat adalah...", "360°", "180°", "540°", "270°"],
        ];


        for ($i = count($soalMatematika) + 1; $i <= 150; $i++) {
            $a = $i + 10;
            $b = $i + 5;
            $hasil = $a * $b;
            $soalMatematika[] = [
                "Hasil perkalian dari {$a} × {$b} adalah...",
                (string)$hasil,
                (string)($hasil + 10),
                (string)($hasil - 5),
                (string)($hasil + 20)
            ];
        }

        $this->simpanSoalDanJawaban($matematika->id, $soalMatematika);
        $this->command->info("✓ Matematika: 150 soal berhasil disimpan.");
    }

    /**
     * 2. Pelajaran Bahasa Indonesia
     */
    private function seedBahasaIndonesia(): void
    {
        $bahasaIndonesia = Subject::factory()->create([
            'name' => 'Bahasa Indonesia',
            'description' => 'Mata Pelajaran Bahasa Indonesia (Ejaan PUEBI, Kata Baku, Antonim/Sinonim, Ungkapan, Peribahasa, Majas, dan Jenis Teks)',
            'is_active' => true,
        ]);

        $soalBahasaIndonesia = [
            ["Penulisan kata tempat membeli obat yang sesuai PUEBI adalah...", "apotek", "apotik", "afotek", "apoteq"],
            ["Bentuk kata baku yang benar untuk kegiatan penerapan teori adalah...", "praktik", "praktek", "pratik", "praksis"],
            ["Manakah penulisan kata baku yang tepat untuk tingkat kualitas?", "kualitas", "kwalitas", "kwalitet", "kualitase"],
            ["Manakah bentuk baku dari kata yang berarti pengamatan/penyelidikan?", "analisis", "analisa", "analise", "analisys"],
            ["Kata baku untuk tatanan atau aturan yang terstruktur adalah...", "sistem", "sistim", "sisteam", "sistematika"],
            ["Penulisan pembagian waktu acara yang baku adalah...", "jadwal", "jadual", "jadvall", "jadhwal"],
            ["Bentuk kata baku dari tingkat bahaya atau akibat adalah...", "risiko", "resiko", "risikoh", "resikoh"],
            ["Dokumen tanda tamat belajar yang baku dinamakan...", "ijazah", "ijasah", "izazah", "idjazah"],
            ["Kata baku yang bermakna nyata/berwujud adalah...", "konkret", "konkrit", "kongkrit", "kongkret"],
            ["Tingkatan jabatan atau susunan yang baku ditulis...", "hierarki", "hirarki", "hirarkhi", "hierarkhi"],
            ["Sikap tidak memihak dan sesuai fakta secara baku ditulis...", "objektif", "obyektif", "objektip", "obyektip"],
            ["Hasil yang mencapai sasaran atau berdaya guna secara baku ditulis...", "efektif", "efektip", "efecktif", "efektive"],
            ["Kemampuan untuk menciptakan hal baru secara baku ditulis...", "kreativitas", "kreatifitas", "kreativite", "kreativithas"],
            ["Petunjuk atau ajaran baik yang baku ditulis...", "nasihat", "nasehat", "nasahat", "nasijat"],
            ["Kegiatan yang dilakukan sehari-hari secara baku ditulis...", "aktivitas", "aktifitas", "aktivite", "aktipitas"],
            ["Bentuk kata berimbuhan dari kata dasar 'ubah' yang benar adalah...", "mengubah", "merubah", "mengrubah", "merubahkan"],
            ["Imbuhan me- pada kata 'pengaruh' yang benar sesuai kaidah KTSP/PUEBI adalah...", "memengaruhi", "mempengaruhi", "mengpengaruhi", "mepengaruhi"],
            ["Imbuhan me- pada kata 'kritik' (gugus konsonan kr) yang baku adalah...", "mengkritik", "mengritik", "mengkrikik", "menkritik"],
            ["Pembagian wilayah administratif di bawah negara yang baku ditulis...", "provinsi", "propinsi", "profinsi", "propisi"],
            ["Tanda kenang-kenangan yang diberikan secara baku ditulis...", "cenderamata", "cinderamata", "cenderah mata", "cinderah mata"],
            ["Gairah atau semangat yang meluap-luap secara baku dinamakan...", "antusiasme", "antusias", "antusiasem", "antusiatis"],
            ["Hal yang menjadi sasaran penelitian secara baku ditulis...", "objek", "obyek", "objekh", "obyekh"],
            ["Cara teratur yang digunakan untuk melaksanakan pekerjaan dinamakan...", "metode", "metoda", "metodhe", "metodologi"],
            ["Penyesuaian dengan ukuran standar secara baku ditulis...", "standardisasi", "standarisasi", "standardisir", "standarisir"],
            ["Rumusan tentang arti atau makna suatu kata dinamakan...", "definisi", "difinisi", "defenisi", "difenisi"],

            // Antonim dan Sinonim
            ["Sinonim dari kata 'efisien' adalah...", "tepat guna", "boros waktu", "lambat", "rumit"],
            ["Antonim dari kata 'kontradiksi' adalah...", "keselarasan", "pertentangan", "perbedaan", "perselisihan"],
            ["Sinonim dari kata 'autentik' adalah...", "asli", "palsu", "tiruan", "duplikat"],
            ["Sinonim dari kata 'persuasif' adalah...", "membujuk", "memaksa", "menakuti", "menyerang"],
            ["Sinonim kata 'relevan' adalah...", "sesuai", "menyimpang", "bertolak belakang", "asing"],
            ["Antonim kata 'prospektif' adalah...", "suram", "cerah", "menjanjikan", "berharap"],
            ["Sinonim dari kata 'kolektif' adalah...", "bersama-sama", "individual", "sendirian", "terpisah"],
            ["Antonim dari kata 'fleksibel' adalah...", "kaku", "luwes", "dapat menyesuaikan", "elastis"],
            ["Sinonim dari kata 'inovasi' adalah...", "pembaharuan", "kuno", "kemunduran", "stagnasi"],
            ["Antonim dari kata 'skeptis' adalah...", "yakin", "ragu-ragu", "curiga", "sangsi"],
            ["Sinonim dari kata 'konsisten' adalah...", "taat asas", "berubah-ubah", "plin-plan", "labil"],
            ["Antonim dari kata 'stagnan' adalah...", "berkembang", "berhenti", "jalan di tempat", "pasif"],
            ["Sinonim kata 'implisit' adalah...", "tersirat", "jelas", "tersurat", "gamblang"],
            ["Antonim kata 'eksplisit' adalah...", "tersirat", "jelas", "terbuka", "gamblang"],
            ["Sinonim kata 'vital' adalah...", "sangat penting", "sepele", "tambahan", "sampingan"],
            ["Antonim kata 'apriori' adalah...", "aposteriori", "berdasarkan fakta", "setelah observasi", "pengalaman"],
            ["Sinonim kata 'signifikan' adalah...", "berarti", "tidak berpengaruh", "sepele", "kecil"],
            ["Antonim kata 'fana' adalah...", "abadi", "sementara", "rusak", "berakhir"],
            ["Sinonim kata 'kontemplasi' adalah...", "perenungan", "keramaian", "diskusi", "tindakan"],
            ["Antonim kata 'pasif' adalah...", "aktif", "diam", "menerima", "tenang"],
            ["Sinonim kata 'harmonis' adalah...", "serasi", "sumbang", "kacau", "berbenturan"],
            ["Antonim kata 'optimis' adalah...", "pesimis", "yakin", "percaya diri", "berharap"],
            ["Sinonim kata 'asimilasi' adalah...", "pembauran", "pemisahan", "pembagian", "pengisolasian"],
            ["Antonim kata 'konservatif' adalah...", "progresif", "kuno", "tradisional", "bertahan"],
            ["Sinonim kata 'dominan' adalah...", "menguasai", "terbelakang", "terjepit", "lemah"],
            ["Antonim kata 'mayoritas' adalah...", "minoritas", "sebagian besar", "banyak", "dominasi"],
            ["Sinonim kata 'klasifikasi' adalah...", "pengelompokan", "pengacakan", "pencampuran", "penggabungan"],
            ["Antonim kata 'konvergen' adalah...", "divergen", "memusat", "menyatu", "sejajar"],
            ["Sinonim kata 'persepsi' adalah...", "pandangan", "kenyataan", "fakta", "benda"],
            ["Antonim kata 'kompleks' adalah...", "sederhana", "rumit", "berbelit", "luas"],

            // Ungkapan & Peribahasa
            ["Ungkapan 'gulung tikar' bermakna...", "bangkrut", "pindah rumah", "tidur", "membersihkan lantai"],
            ["Ungkapan 'besar kepala' bermakna...", "sombong", "pandai", "pusing", "pemarah"],
            ["Ungkapan 'panjang tangan' bermakna...", "suka mencuri", "suka menolong", "suka memberi", "rajin bekerja"],
            ["Ungkapan 'tangan kanan' bermakna...", "orang kepercayaan", "musuh utama", "anak buah", "sahabat lama"],
            ["Ungkapan 'ringan tangan' bermakna...", "suka menolong", "suka memukul", "pemalas", "mudah marah"],
            ["Ungkapan 'kambing hitam' bermakna...", "orang yang disalahkan", "pemimpin kelompok", "orang kaya", "korban bencana"],
            ["Ungkapan 'kutu buku' bermakna...", "orang yang gemar membaca", "pemalas", "penulis buku", "penjual buku"],
            ["Ungkapan 'rendah hati' bermakna...", "tidak sombong", "penakut", "minder", "sedih"],
            ["Ungkapan 'buah bibir' bermakna...", "bahan pembicaraan", "makanan favorit", "buah manis", "gosip murah"],
            ["Ungkapan 'mencari kambing hitam' bermakna...", "melimpahkan kesalahan kepada orang lain", "berburu hewan", "berbuat licik", "mencari kebenaran"],
            ["Peribahasa 'Ada udang di balik batu' bermakna...", "Ada maksud tersembunyi", "Makanan yang enak", "Mencari hewan di sungai", "Pekerjaan yang sulit"],
            ["Peribahasa 'Bagai air di atas daun talas' bermakna...", "Tidak teguh pendirian", "Sangat tenang", "Mudah beradaptasi", "Suka berpindah tempat"],
            ["Peribahasa 'Besar pasak daripada tiang' bermakna...", "Pengeluaran lebih besar daripada pendapatan", "Bangunan yang roboh", "Hemat pangkal kaya", "Bekerja tanpa henti"],
            ["Peribahasa 'Air tenang menghanyutkan' bermakna...", "Orang pendiam yang berilmu tinggi", "Bahaya banjir", "Orang penakut", "Sungai yang dalam"],
            ["Peribahasa 'Bertepuk sebelah tangan' bermakna...", "Cinta atau usaha yang tidak terbalas", "Pertengkaran dua orang", "Perjanjian bersama", "Kerja sama yang baik"],
            ["Peribahasa 'Seperti katak dalam tempurung' bermakna...", "Wawasan dan pengetahuan yang sangat sempit", "Orang yang terisolasi", "Orang yang pemalu", "Rumah yang gelap"],
            ["Peribahasa 'Nasi sudah menjadi bubur' bermakna...", "Perbuatan yang sudah terlanjur terjadi dan tidak bisa diubah", "Makanan yang lezat", "Kegagalan total", "Penyesalan di akhir"],
            ["Peribahasa 'Tong kosong nyaring bunyinya' bermakna...", "Orang yang banyak bicara tetapi kurang ilmu", "Alat musik perkusi", "Keramaian jalan", "Suara yang merdu"],
            ["Peribahasa 'Sambil menyelam minum air' bermakna...", "Mengerjakan dua pekerjaan sekaligus", "Berenang di laut", "Bekerja dengan santai", "Mencari kesempatan"],
            ["Peribahasa 'Harimau mati meninggalkan belang, gajah mati meninggalkan gading' bermakna...", "Orang berjasa akan selalu dikenang namanya", "Hewan langka dilindungi", "Kematian tokoh besar", "Perburuan liar"],
            ["Ungkapan 'tangan besi' bermakna...", "kepemimpinan yang otoriter dan keras", "kekuatan fisik", "sarung tangan logam", "kemampuan bertarung"],
            ["Ungkapan 'muka tembok' bermakna...", "tidak punya rasa malu", "wajah yang rata", "orang yang pendiam", "orang penakut"],
            ["Ungkapan 'kabar angin' bermakna...", "berita desas-desus yang belum pasti", "ramalan cuaca", "berita gembira", "surat ucapan"],
            ["Peribahasa 'Sepandai-pandai membungkus yang busuk, berbau juga' bermakna...", "Kejahatan pasti akan terungkap juga", "Menyimpan barang rusak", "Bau tak sedap", "Kebohongan kecil"],
            ["Peribahasa 'Tak ada gading yang tak retak' bermakna...", "Tidak ada manusia yang sempurna", "Gajah langka", "Barang antik mahal", "Kesalahan kecil"],

            // Majas & Gaya Bahasa
            ["Kalimat 'Angin berbisik lembut menyapa dedaunan' menggunakan majas...", "Personifikasi", "Hiperbola", "Metafora", "Litotes"],
            ["Kalimat 'Suaranya yang nyaring menggelegar membelah angkasa' menggunakan majas...", "Hiperbola", "Personifikasi", "Ironi", "Litotes"],
            ["Kalimat 'Singa mimbar itu menyampaikan pidato dengan berapi-api' menggunakan majas...", "Metafora", "Personifikasi", "Simile", "Aliterasi"],
            ["Kalimat 'Singgah lah ke gubuk saya yang sederhana ini' menggunakan majas...", "Litotes", "Hiperbola", "Ironi", "Sarkasme"],
            ["Kalimat 'Bagus sekali tulisanmu sampai tidak ada yang bisa membacanya' menggunakan majas...", "Ironi", "Hiperbola", "Litotes", "Metafora"],
            ["Kalimat 'Dewi malam mulai menampakkan senyum indahnya' menggunakan majas...", "Personifikasi", "Metafora", "Litotes", "Hiperbola"],
            ["Kalimat 'Ia menangis hingga air matanya mengalir bagaikan sungai' menggunakan majas...", "Hiperbola", "Personifikasi", "Litotes", "Ironi"],
            ["Kalimat 'Raja siang telah terbit dari ufuk timur' menggunakan majas...", "Metafora", "Personifikasi", "Litotes", "Simile"],
            ["Kalimat 'Seluruh warga kelas X hingga XII wajib mengikuti upacara' menggunakan majas...", "Totem pro parte", "Pars pro toto", "Hiperbola", "Litotes"],
            ["Kalimat 'Indonesia berhasil menjuarai kejuaraan bulu tangkis dunia' menggunakan majas...", "Synecdoche pars pro toto", "Totem pro parte", "Metafora", "Personifikasi"],
            ["Majas yang membandingkan benda mati seolah-olah memiliki sifat manusia adalah...", "Personifikasi", "Metafora", "Hiperbola", "Litotes"],
            ["Majas yang menyatakan sesuatu secara berlebih-lebihan untuk efek penyangatan adalah...", "Hiperbola", "Personifikasi", "Ironi", "Litotes"],
            ["Majas yang merendahkan diri dengan tujuan menghormati lawan bicara adalah...", "Litotes", "Hiperbola", "Ironi", "Personifikasi"],
            ["Majas sindiran halus yang menyatakan kebalikan dari kenyataan adalah...", "Ironi", "Sarkasme", "Litotes", "Metafora"],
            ["Majas yang membandingkan dua hal secara langsung tanpa kata pembanding adalah...", "Metafora", "Simile", "Personifikasi", "Litotes"],
            ["Kalimat 'Wajahnya pucat bagaikan bulan kesiangan' menggunakan majas...", "Simile / Asosiasi", "Metafora", "Personifikasi", "Litotes"],
            ["Kalimat 'Kenaikan harga bahan pokok mencekik leher rakyat kecil' menggunakan majas...", "Hiperbola", "Personifikasi", "Litotes", "Ironi"],
            ["Kalimat 'Pena itu menari-nari di atas kertas putih' menggunakan majas...", "Personifikasi", "Metafora", "Simile", "Hiperbola"],
            ["Majas sindiran yang paling kasar dan terang-terangan dinamakan...", "Sarkasme", "Ironi", "Litotes", "Cakapan"],
            ["Majas penegasan dengan mengulang kata pertama pada setiap baris disebut...", "Anafora", "Epifora", "Aliterasi", "Repetisi"],

            // Jenis Teks & Pemahaman Paragraf
            ["Teks yang bertujuan memberikan petunjuk atau cara membuat/melakukan sesuatu dinamakan...", "Teks Prosedur", "Teks Eksplanasi", "Teks Narasi", "Teks Deskripsi"],
            ["Bagian penutup dalam struktur teks eksplanasi yang berisi intisari atau kesimpulan dinamakan...", "Interpretasi", "Pernyataan Umum", "Urutan Sebab Akibat", "Orientasi"],
            ["Struktur utama teks laporan hasil observasi (LHO) terdiri atas...", "Pernyataan umum, deskripsi bagian, dan deskripsi manfaat", "Orientasi, komplikasi, resolusi", "Tesis, argumentasi, penegasan ulang", "Tujuan, bahan, langkah-langkah"],
            ["Gagasan utama yang menjadi inti pengembangan dalam sebuah paragraf disebut...", "Ide Pokok", "Kalimat Pengembang", "Judul", "Tema"],
            ["Paragraf yang letak kalimat utamanya berada di awal paragraf dinamakan...", "Paragraf Deduktif", "Paragraf Induktif", "Paragraf Campuran", "Paragraf Naratif"],
            ["Paragraf yang letak kalimat utamanya berada di akhir paragraf dinamakan...", "Paragraf Induktif", "Paragraf Deduktif", "Paragraf Deskriptif", "Paragraf Persuasif"],
            ["Kalimat yang memuat informasi berupa data nyata dan dapat dibuktikan kebenarannya disebut...", "Kalimat Fakta", "Kalimat Opini", "Kalimat Harapan", "Kalimat Saran"],
            ["Kalimat yang memuat pendapat, anggapan, atau perkiraan subjektif seseorang disebut...", "Kalimat Opini", "Kalimat Fakta", "Kalimat Perintah", "Kalimat Berita"],
            ["Teks yang menceritakan riwayat hidup seseorang yang ditulis oleh orang lain dinamakan...", "Biografi", "Autobiografi", "Cerpen", "Novel"],
            ["Teks riwayat hidup yang ditulis oleh orang yang bersangkutan sendiri dinamakan...", "Autobiografi", "Biografi", "Resensi", "Artikel"],
            ["Teks yang bertujuan untuk membujuk atau mempengaruhi pembaca agar melakukan sesuatu dinamakan...", "Teks Persuasi", "Teks Eksposisi", "Teks Deskripsi", "Teks Argumentasi"],
            ["Unsur intrinsik cerita yang berkaitan dengan gambaran tempat, waktu, dan suasana kejadian adalah...", "Latar / Setting", "Alur / Plot", "Tema", "Amanat"],
            ["Pesan moral yang disampaikan oleh pengarang melalui cerita dinamakan...", "Amanat", "Tema", "Latar", "Sudut Pandang"],
            ["Sudut pandang pengarang yang menggunakan kata ganti 'aku' atau 'saya' dinamakan...", "Sudut Pandang Orang Pertama", "Sudut Pandang Orang Ketiga", "Sudut Pandang Campuran", "Sudut Pandang Serba Tahu"],
            ["Rangkaian peristiwa yang jalin-menjalin membentuk jalan cerita dinamakan...", "Alur / Plot", "Latar", "Penokohan", "Tema"],
            ["Tahap puncak ketegangan atau masalah terbesar dalam sebuah cerita dinamakan...", "Klimaks", "Orientasi", "Resolusi", "Koda"],
            ["Bagian awal cerita yang berfungsi mengenalkan tokoh dan latar dinamakan...", "Orientasi", "Komplikasi", "Klimaks", "Resolusi"],
            ["Kalimat yang hemat kata, sesuai kaidah tata bahasa, dan tidak membingungkan pembaca disebut...", "Kalimat Efektif", "Kalimat Majemuk", "Kalimat Pasif", "Kalimat Berbelit"],
            ["Teks cerita singkat yang lucu dan mengandung sindiran moral atau sosial dinamakan...", "Teks Anekdot", "Teks Humour", "Teks Cerpen", "Teks Fabel"],
            ["Teks yang memberikan penilaian, kelebihan, dan kekurangan suatu karya sastra/film dinamakan...", "Teks Ulasan / Resensi", "Teks Biografi", "Teks Eksplanasi", "Teks Prosedur"],
        ];


        for ($i = count($soalBahasaIndonesia) + 1; $i <= 150; $i++) {
            $soalBahasaIndonesia[] = [
                "Manakah yang merupakan fungsi dari tanda baca koma (,) dalam penulisan kalimat nomor {$i}?",
                "Memisahkan unsur-unsur dalam suatu rincian atau bilang",
                "Mengakhiri kalimat berita",
                "Mengutip ucapan langsung",
                "Menjelaskan bagian tambahan"
            ];
        }

        $this->simpanSoalDanJawaban($bahasaIndonesia->id, $soalBahasaIndonesia);
        $this->command->info("✓ Bahasa Indonesia: 150 soal berhasil disimpan.");
    }

    /**
     * 3. Pelajaran IPA / Ilmu Pengetahuan Alam
     */
    private function seedIPA(): void
    {
        $ipa = Subject::factory()->create([
            'name' => 'IPA',
            'description' => 'Mata Pelajaran Ilmu Pengetahuan Alam (Biologi Sel & Organel, Sistem Organ, Ekosistem, Fisika Gerak & Energi, Listrik, Magnet, dan Kimia Dasar)',
            'is_active' => true,
        ]);

        $soalIPA = [
            // Biologi Sel & Organel
            ["Organel sel yang berfungsi sebagai tempat respirasi sel dan penghasil energi (ATP) adalah...", "Mitokondria", "Kloroplas", "Ribosom", "Lisosom"],
            ["Organel sel tumbuhan yang mengandung klorofil untuk fotosintesis adalah...", "Kloroplas", "Mitokondria", "Vakuola", "Badan Golgi"],
            ["Organel yang berfungsi mengatur seluruh aktivitas sel dan membawa materi genetik adalah...", "Nukleus (Inti Sel)", "Ribosom", "Membran Sel", "Sitoplasma"],
            ["Tempat berlangsungnya sintesis protein di dalam sel adalah...", "Ribosom", "Mitokondria", "Lisosom", "Sentrosom"],
            ["Struktur pelindung luar sel tumbuhan yang kaku dan tidak dimiliki sel hewan adalah...", "Dinding Sel", "Membran Sel", "Kloroplas", "Vakuola"],
            ["Organel sel yang mengandung enzim pencernaan intraseluler adalah...", "Lisosom", "Ribosom", "Badan Golgi", "Peroksisom"],
            ["Jaringan tumbuhan yang berfungsi mengangkut air dan mineral dari akar ke daun adalah...", "Xilem", "Floem", "Epidermis", "Parenkim"],
            ["Jaringan tumbuhan yang mengangkut hasil fotosintesis dari daun ke seluruh tubuh adalah...", "Floem", "Xilem", "Kambium", "Korteks"],
            ["Komponen sel darah yang berfungsi mengangkut oksigen adalah...", "Sel Darah Merah (Eritrosit)", "Sel Darah Putih (Leukosit)", "Keping Darah (Trombosit)", "Plasma Darah"],
            ["Pigmen pengikat oksigen yang memberi warna merah pada darah adalah...", "Hemoglobin", "Klorofil", "Karoten", "Bilirubin"],
            ["Komponen darah yang berperan dalam pembekuan darah saat terjadi luka adalah...", "Trombosit (Keping Darah)", "Eritrosit", "Leukosit", "Fibrinogen"],
            ["Sel darah yang berperan dalam sistem imun melawan kuman penyakit adalah...", "Leukosit (Sel Darah Putih)", "Eritrosit", "Trombosit", "Plasma"],
            ["Pembuluh darah yang membawa darah kaya oksigen keluar dari jantung ke seluruh tubuh adalah...", "Arteri / Nadi", "Vena / Balik", "Kapiler", "Aorta Kiri"],
            ["Pembuluh darah yang membawa darah kaya CO2 kembali menuju jantung adalah...", "Vena / Balik", "Arteri", "Aorta", "Kapiler"],
            ["Jaringan hewan yang berfungsi menerima dan meneruskan rangsang listrik dinamakan...", "Jaringan Saraf", "Jaringan Otot", "Jaringan Epitel", "Jaringan Ikat"],
            ["Jaringan hewan yang melapisi permukaan luar dan dalam organ tubuh dinamakan...", "Jaringan Epitel", "Jaringan Ikat", "Jaringan Otot", "Jaringan Saraf"],
            ["Peristiwa pembelahan sel yang menghasilkan 2 sel anak identik dengan kromosom diploid (2n) adalah...", "Mitosis", "Meiosis", "Amitosis", "Partenogenesis"],
            ["Peristiwa pembelahan sel pembentuk sel gamet yang menghasilkan 4 sel anak haploid (n) adalah...", "Meiosis", "Mitosis", "Binary Fission", "Fragmentasi"],
            ["Bagian tumbuhan yang berfungsi sebagai tempat berlangsungnya transpirasi dan fotosintesis utama adalah...", "Daun", "Batang", "Akar", "Bunga"],
            ["Jaringan tumbuhan yang aktif membelah menyebabkan pertumbuhan memanjang dinamakan...", "Jaringan Meristem", "Jaringan Dewasa", "Jaringan Sklerenkim", "Jaringan Collenkim"],

            // Biologi Organ Tubuh & Sistem
            ["Enzim di dalam mulut yang mengubah amilum (karbohidrat) menjadi maltosa/glukosa adalah...", "Ptialin / Amilase", "Pepsin", "Renin", "Tripsin"],
            ["Enzim lambung yang berfungsi memecah protein menjadi pepton adalah...", "Pepsin", "Ptialin", "Lipase", "Amilase"],
            ["Asam lambung (HCl) berfungsi untuk...", "Membunuh kuman penyakit dan mengaktifkan pepsinogen", "Menguraikan lemak", "Menyerap air", "Menggumpalkan susu"],
            ["Organ utama tempat penyerapan sari-sari makanan terjadi pada...", "Usus Halus", "Lambung", "Usus Besar", "Kerongkongan"],
            ["Organ pencernaan tempat penyerapan air dan pembusukan sisa makanan adalah...", "Usus Besar (Kolon)", "Usus Halus", "Lambung", "Anus"],
            ["Organ pernapasan manusia tempat terjadinya pertukaran gas O2 dan CO2 adalah...", "Alveolus", "Bronkus", "Trakea", "Laring"],
            ["Gas sisa respirasi sel yang dikeluarkan tubuh saat menghembuskan napas adalah...", "Karbondioksida (CO2)", "Oksigen (O2)", "Nitrogen (N2)", "Hidrogen (H2)"],
            ["Organ ekskresi manusia yang berfungsi menyaring darah dan menghasilkan urine adalah...", "Ginjal", "Hati", "Paru-paru", "Kulit"],
            ["Satuan fungsional terkecil penyaring darah di dalam ginjal dinamakan...", "Nefron", "Neuron", "Alveolus", "Vili"],
            ["Organ yang merombak sel darah merah tua dan menawarkan racun (detoksifikasi) adalah...", "Hati", "Ginjal", "Jantung", "Lien"],
            ["Organ ekskresi yang mengeluarkan keringat dan mengatur suhu tubuh adalah...", "Kulit", "Ginjal", "Paru-paru", "Hati"],
            ["Bagian otak yang berfungsi menjaga keseimbangan tubuh dan koordinasi gerak adalah...", "Otak Kecil (Cerebellum)", "Otak Besar (Cerebrum)", "Sumsum Lanjutan", "Hipotalamus"],
            ["Bagian otak yang menjadi pusat berpikir, ingatan, dan kesadaran adalah...", "Otak Besar (Cerebrum)", "Otak Kecil (Cerebellum)", "Batang Otak", "Talamus"],
            ["Bagian mata yang mengatur banyaknya cahaya yang masuk ke pupil adalah...", "Iris", "Retina", "Kornea", "Lensa"],
            ["Bagian mata tempat jatuhnya bayangan benda yang peka terhadap cahaya adalah...", "Retina", "Kornea", "Pupil", "Sklera"],
            ["Cacat mata rabun jauh (miopi) ditolong menggunakan kaca mata berlensa...", "Cekung (Negatif)", "Cembung (Positif)", "Silindris", "Ganda"],
            ["Cacat mata rabun dekat (hipermetropi) ditolong menggunakan kaca mata berlensa...", "Cembung (Positif)", "Cekung (Negatif)", "Datar", "Silindris"],
            ["Hormon yang berfungsi menurunkan kadar gula darah dengan mengubah glukosa menjadi glikogen adalah...", "Insulin", "Glukagon", "Adrenalin", "Tiroksin"],
            ["Kelenjar yang menghasilkan hormon adrenalin saat kondisi darurat atau stres adalah...", "Kelenjar Adrenal", "Kelenjar Tiroid", "Kelenjar Hipofisis", "Kelenjar Pankreas"],
            ["Tulang terbesar dan terkuat pada anggota gerak bawah manusia adalah...", "Tulang Paha (Femur)", "Tulang Kering (Tibia)", "Tulang Betis (Fibula)", "Tulang Lengan (Humerus)"],
            ["Sendi yang memungkinkan gerakan ke segala arah (seperti pada gelang bahu) adalah...", "Sendi Peluru", "Sendi Engsel", "Sendi Putar", "Sendi Pelana"],
            ["Sendi yang memungkinkan gerakan satu arah saja (seperti pada siku dan lutut) adalah...", "Sendi Engsel", "Sendi Peluru", "Sendi Putar", "Sendi Geser"],
            ["Otot yang bekerja secara tidak sadar (involunter) dan melapisi organ dalam dinamakan...", "Otot Polos", "Otot Lurik", "Otot Rangka", "Otot Jantung"],
            ["Otot yang melekat pada rangka dan bekerja di bawah kendali kesadaran dinamakan...", "Otot Lurik / Rangka", "Otot Polos", "Otot Otonom", "Otot Viseral"],
            ["Proses pengeluaran zat sisa metabolisme yang tidak diperlukan tubuh lagi disebut...", "Ekskresi", "Sekresi", "Defekasi", "Digesti"],
            ["Penyakit kencing manis yang disebabkan oleh kekurangan hormon insulin dinamakan...", "Diabetes Mellitus", "Diabetes Insipidus", "Anemia", "Hipertensi"],
            ["Gangguan kurang sel darah merah atau hemoglobin dinamakan...", "Anemia", "Leukemia", "Hemofilia", "Trombositopenia"],
            ["Kelainan darah sukar membeku akibat faktor keturunan dinamakan...", "Hemofilia", "Anemia", "Leukemia", "Thalasemia"],
            ["Tekanan darah tinggi di atas normal dinamakan...", "Hipertensi", "Hipotensi", "Aterosklerosis", "Stroke"],
            ["Sendi yang terdapat antara tulang leher pertama dan tulang tengkorak adalah...", "Sendi Putar", "Sendi Engsel", "Sendi Peluru", "Sendi Pelana"],

            // Ekosistem, Genetika & Fisika Dasar
            ["Proses pembuatan makanan pada tumbuhan hijau dengan bantuan cahaya matahari dinamakan...", "Fotosintesis", "Respirasi", "Transpirasi", "Gutasi"],
            ["Bahan utama yang dibutuhkan tumbuhan dalam fotosintesis adalah...", "Karbondioksida dan Air", "Oksigen dan Glukosa", "Nitrogen dan Air", "Oksigen dan Karbon"],
            ["Gas hasil fotosintesis yang dilepaskan ke udara dan dibutuhkan hewan adalah...", "Oksigen (O2)", "Karbondioksida (CO2)", "Nitrogen (N2)", "Metana (CH4)"],
            ["Organisme dalam ekosistem yang mampu membuat makanannya sendiri dinamakan...", "Produsen / Autotrof", "Konsumen / Heterotrof", "Dekomposer", "Detritivor"],
            ["Hubungan simbiosis antarmakhluk hidup yang saling menguntungkan kedua pihak dinamakan...", "Simbiosis Mutualisme", "Simbiosis Parasitisme", "Simbiosis Komensalisme", "Predasi"],
            ["Contoh hubungan simbiosis mutualisme dalam ekosistem adalah...", "Lebah dengan bunga", "Benalu dengan pohon inang", "Ikan remora dengan hiu", "Kucing dengan tikus"],
            ["Hubungan simbiosis di mana satu pihak diuntungkan dan pihak lain dirugikan adalah...", "Simbiosis Parasitisme", "Simbiosis Mutualisme", "Simbiosis Komensalisme", "Kompetisi"],
            ["Hubungan simbiosis di mana satu pihak diuntungkan dan pihak lain tidak dirugikan/diuntungkan adalah...", "Simbiosis Komensalisme", "Simbiosis Mutualisme", "Simbiosis Parasitisme", "Predasi"],
            ["Materi genetik pembawa sifat keturunan yang terletak di dalam kromosom dinamakan...", "DNA", "RNA", "Enzim", "Hormon"],
            ["Sifat fisik atau karakter luar yang tampak pada suatu organisme dinamakan...", "Fenotip", "Genotip", "Alel", "Hibrid"],
            ["Susunan genetik yang tidak tampak dari luar dinamakan...", "Genotip", "Fenotip", "Dominan", "Resesif"],
            ["Persilangan antara dua individu dengan satu sifat beda dinamakan...", "Monohibrid", "Dihibrid", "Trihibrid", "Polihibrid"],
            ["Besaran yang satuannya telah ditetapkan terlebih dahulu dan tidak diturunkan adalah...", "Besaran Pokok", "Besaran Turunan", "Besaran Skalar", "Besaran Vektor"],
            ["Satuan SI standar untuk besaran suhu adalah...", "Kelvin (K)", "Celsius (°C)", "Fahrenheit (°F)", "Reamur (°R)"],
            ["Satuan SI standar untuk besaran kuat arus listrik adalah...", "Ampere (A)", "Volt (V)", "Ohm (Ω)", "Watt (W)"],
            ["Gerak benda pada lintasan lurus dengan kecepatan tetap (konstan) dinamakan...", "Gerak Lurus Beraturan (GLB)", "GLBB Dipercepat", "GLBB Diperlambat", "Gerak Parabola"],
            ["Sifat benda yang cenderung mempertahankan keadaan diam atau geraknya disebut...", "Inersia / Kelembaman", "Percepatan", "Gaya Gesek", "Massa Jenis"],
            ["Rumus Hukum II Newton yang menyatakan hubungan gaya, massa, dan percepatan adalah...", "F = m × a", "F = m / a", "F = m + a", "F = a / m"],
            ["Satuan usaha dan energi dalam Sistem Internasional (SI) adalah...", "Joule", "Watt", "Newton", "Pascal"],
            ["Energi yang dimiliki oleh benda karena kedudukan atau ketinggiannya dinamakan...", "Energi Potensial", "Energi Kinetik", "Energi Mekanik", "Energi Kalor"],
            ["Energi yang dimiliki oleh benda karena gerak atau kecepatannya dinamakan...", "Energi Kinetik", "Energi Potensial", "Energi Kimia", "Energi Listrik"],
            ["Hukum Kekekalan Energi menyatakan bahwa energi...", "Tidak dapat diciptakan dan dimusnahkan", "Dapat diciptakan manusia", "Dapat hilang sepenuhnya", "Selalu bertambah"],
            ["Satuan daya listrik dalam Sistem Internasional adalah...", "Watt", "Joule", "Volt", "Ampere"],
            ["Gelombang yang arah rambatnya tegak lurus dengan arah getarnya dinamakan...", "Gelombang Transversal", "Gelombang Longitudinal", "Gelombang Elektromagnetik", "Gelombang Stasioner"],
            ["Gelombang yang arah rambatnya sejajar dengan arah getarnya dinamakan...", "Gelombang Longitudinal", "Gelombang Transversal", "Gelombang Mekanik", "Gelombang Radio"],
            ["Banyaknya getaran yang terjadi dalam waktu satu detik dinamakan...", "Frekuensi", "Periode", "Amplitudo", "Panjang Gelombang"],
            ["Waktu yang dibutuhkan untuk melakukan satu getaran penuh dinamakan...", "Periode", "Frekuensi", "Cepat Rambat", "Fase"],
            ["Bunyi tidak dapat merambat di dalam medium...", "Ruang Hampa Udara (Vakum)", "Zat Cair", "Zat Padat", "Gas Oksigen"],
            ["Cermin yang memiliki sifat selalu membentuk bayangan maya, tegak, dan diperkecil adalah...", "Cermin Cembung", "Cermin Cekung", "Cermin Datar", "Lensa Cekung"],
            ["Cermin cembung biasanya dimanfaatkan sebagai...", "Kaca spion kendaraan", "Kaca rias", "Pemantul senter", "Lensa mikroskop"],
            ["Hukum Ohm merumuskan hubungan antara tegangan (V), kuat arus (I), dan hambatan (R), yaitu...", "V = I × R", "V = I / R", "V = R / I", "V = I + R"],
            ["Alat untuk mengukur kuat arus listrik dalam rangkaian adalah...", "Ampermeter", "Voltmeter", "Ohmmeter", "Barometer"],
            ["Alat untuk mengukur beda potensial atau tegangan listrik adalah...", "Voltmeter", "Ampermeter", "Manometer", "Thermometer"],
            ["Perubahan wujud zat dari padat langsung menjadi gas dinamakan...", "Menyublim", "Mengembun", "Mencair", "Menguap"],
            ["Perubahan wujud zat dari gas menjadi cair dinamakan...", "Mengembun", "Menyublim", "Membeku", "Mengristal"],
            ["Contoh perubahan kimia dalam kehidupan sehari-hari adalah...", "Besi berkarat", "Es mencair", "Lilin meleleh", "Gula larut dalam air"],
            ["Contoh perubahan fisika dalam kehidupan sehari-hari adalah...", "Es mencair menjadi air", "Kayu terbakar menjadi arang", "Nasi menjadi basi", "Susu menjadi keju"],
            ["Zat tunggal yang tidak dapat diuraikan lagi menjadi zat yang lebih sederhana dinamakan...", "Unsur", "Senyawa", "Campuran", "Larutan"],
            ["Rumus kimia untuk air murni adalah...", "H2O", "CO2", "NaCl", "HCl"],
            ["Rumus kimia untuk garam dapur adalah...", "NaCl", "H2O", "CO2", "NaOH"],
            ["Rumus kimia untuk gas karbondioksida adalah...", "CO2", "CO", "O2", "H2O"],
            ["Larutan yang memiliki nilai pH kurang dari 7 bersifat...", "Asam", "Basa", "Netral", "Garam"],
            ["Larutan yang memiliki nilai pH lebih dari 7 bersifat...", "Basa", "Asam", "Netral", "Amfoter"],
            ["Kertas lakmus biru jika dicelupkan ke dalam larutan asam akan berubah warna menjadi...", "Merah", "Biru", "Kuning", "Hijau"],
            ["Kertas lakmus merah jika dicelupkan ke dalam larutan basa akan berubah warna menjadi...", "Biru", "Merah", "Kuning", "Ungu"],
            ["Zat tunggal yang terdiri dari gabungan dua atau lebih unsur berbeda secara kimia dinamakan...", "Senyawa", "Unsur", "Campuran Heterogen", "Larutan"],
            ["Alat untuk mengukur tekanan udara atmosfer luar dinamakan...", "Barometer", "Manometer", "Thermometer", "Hidrometer"],
            ["Alat untuk mengukur suhu benda dinamakan...", "Thermometer", "Barometer", "Hygrometer", "Anemometer"],
            ["Gaya tarik bumi yang bekerja pada suatu benda dinamakan...", "Gaya Gravitasi / Berat", "Gaya Gesek", "Gaya Magnet", "Gaya Pegas"],
            ["Tekanan zat cair yang disebabkan oleh berat zat cair itu sendiri dinamakan...", "Tekanan Hidrostatis", "Tekanan Udara", "Tekanan Osmosis", "Tekanan Gas"],
        ];

        // Tambahkan variasi hingga genap
        for ($i = count($soalIPA) + 1; $i <= 150; $i++) {
            $soalIPA[] = [
                "Zat pencemar lingkungan nomor {$i} yang dapat merusak lapisan ozon (CFC) adalah...", "Klorofluorokarbon (CFC)", "Karbondioksida (CO2)", "Oksigen (O2)", "Nitrogen (N2)"]
            ;
        }

        $this->simpanSoalDanJawaban($ipa->id, $soalIPA);
        $this->command->info("✓ IPA: 150 soal berhasil disimpan.");
    }

    /**
     * 4. Pendidikan Kewarganegaraan (PKn)
     */
    private function seedPKn(): void
    {
        $pkn = Subject::factory()->create([
            'name' => 'Pendidikan Kewarganegaraan',
            'description' => 'Mata Pelajaran PKn (Pancasila, UUD 1945, Lembaga Negara, Hak dan Kewajiban, Pemilu, Otonomi Daerah, Wawasan Nusantara, HAM, Norma dan Hukum, Bela Negara)',
            'is_active' => true,
        ]);

        // Format: [pertanyaan, jawaban benar, salah 1, salah 2, salah 3]
        $soalPKn = [
            // ===== Pancasila & Sejarah =====
            ["Lambang sila pertama Pancasila adalah...", "Bintang", "Rantai", "Pohon beringin", "Kepala banteng"],
            ["Lambang sila kedua Pancasila adalah...", "Rantai", "Bintang", "Padi dan kapas", "Pohon beringin"],
            ["Lambang sila ketiga Pancasila adalah...", "Pohon beringin", "Kepala banteng", "Rantai", "Bintang"],
            ["Lambang sila keempat Pancasila adalah...", "Kepala banteng", "Padi dan kapas", "Bintang", "Pohon beringin"],
            ["Lambang sila kelima Pancasila adalah...", "Padi dan kapas", "Rantai", "Kepala banteng", "Bintang"],
            ["Bunyi sila kedua Pancasila adalah...", "Kemanusiaan yang adil dan beradab", "Persatuan Indonesia", "Ketuhanan Yang Maha Esa", "Keadilan sosial bagi seluruh rakyat Indonesia"],
            ["Bunyi sila ketiga Pancasila adalah...", "Persatuan Indonesia", "Kemanusiaan yang adil dan beradab", "Ketuhanan Yang Maha Esa", "Keadilan sosial bagi seluruh rakyat Indonesia"],
            ["Bunyi sila keempat Pancasila adalah...", "Kerakyatan yang dipimpin oleh hikmat kebijaksanaan dalam permusyawaratan/perwakilan", "Persatuan Indonesia", "Kemanusiaan yang adil dan beradab", "Keadilan sosial bagi seluruh rakyat Indonesia"],
            ["Pancasila ditetapkan sebagai dasar negara Republik Indonesia pada tanggal...", "18 Agustus 1945", "1 Juni 1945", "17 Agustus 1945", "22 Juni 1945"],
            ["Hari Lahir Pancasila diperingati setiap tanggal...", "1 Juni", "18 Agustus", "22 Juni", "1 Oktober"],
            ["Hari Kesaktian Pancasila diperingati setiap tanggal...", "1 Oktober", "1 Juni", "10 November", "28 Oktober"],
            ["Badan Penyelidik Usaha-usaha Persiapan Kemerdekaan Indonesia (BPUPKI) dibentuk oleh pemerintah...", "Jepang", "Belanda", "Inggris", "Amerika Serikat"],
            ["Ketua BPUPKI adalah...", "dr. K.R.T. Radjiman Wedyodiningrat", "Ir. Soekarno", "Drs. Mohammad Hatta", "Mr. Soepomo"],
            ["Panitia yang menghasilkan rumusan Piagam Jakarta dinamakan Panitia...", "Sembilan", "Delapan", "Lima", "Tujuh"],
            ["Piagam Jakarta dirumuskan pada tanggal...", "22 Juni 1945", "1 Juni 1945", "17 Agustus 1945", "18 Agustus 1945"],
            ["Ketua Panitia Persiapan Kemerdekaan Indonesia (PPKI) adalah...", "Ir. Soekarno", "Drs. Mohammad Hatta", "Mr. Ahmad Soebardjo", "Mr. Muhammad Yamin"],
            ["Salah satu hasil sidang PPKI pada 18 Agustus 1945 adalah...", "Mengesahkan UUD 1945 dan memilih Presiden serta Wakil Presiden", "Membacakan teks proklamasi", "Membentuk BPUPKI", "Merumuskan Piagam Jakarta"],
            ["Presiden pertama Republik Indonesia adalah...", "Ir. Soekarno", "Drs. Mohammad Hatta", "Soeharto", "B.J. Habibie"],
            ["Wakil Presiden pertama Republik Indonesia adalah...", "Drs. Mohammad Hatta", "Sutan Syahrir", "Adam Malik", "Hamengkubuwono IX"],
            ["Naskah teks proklamasi kemerdekaan Indonesia diketik oleh...", "Sayuti Melik", "Fatmawati", "Ahmad Soebardjo", "Sukarni"],
            ["Bendera pusaka Sang Saka Merah Putih dijahit oleh...", "Fatmawati", "Hartini", "Rachmi Hatta", "Ratna Sari Dewi"],
            ["Proklamasi kemerdekaan Indonesia dibacakan di...", "Jalan Pegangsaan Timur No. 56, Jakarta", "Gedung Sate, Bandung", "Istana Merdeka, Jakarta", "Lapangan Banteng, Jakarta"],
            ["Sumpah Pemuda diikrarkan pada tanggal...", "28 Oktober 1928", "20 Mei 1908", "17 Agustus 1945", "10 November 1945"],
            ["Hari Kebangkitan Nasional diperingati setiap tanggal...", "20 Mei", "28 Oktober", "17 Agustus", "2 Mei"],
            ["Pencipta lagu kebangsaan Indonesia Raya adalah...", "W.R. Supratman", "Ismail Marzuki", "C. Simanjuntak", "H. Mutahar"],
            ["Semboyan Bhinneka Tunggal Ika terdapat dalam kitab Sutasoma karya...", "Mpu Tantular", "Mpu Prapanca", "Mpu Sindok", "Mpu Kanwa"],
            ["Makna semboyan Bhinneka Tunggal Ika adalah...", "Berbeda-beda tetapi tetap satu", "Satu nusa satu bangsa", "Bersatu kita teguh", "Gotong royong membangun negeri"],
            ["Lambang negara Indonesia adalah...", "Garuda Pancasila", "Burung Cendrawasih", "Elang Jawa", "Burung Merpati"],
            ["Jumlah bulu pada masing-masing sayap Garuda Pancasila melambangkan tanggal proklamasi, yaitu...", "17", "8", "45", "19"],
            ["Pancasila sebagai dasar negara berarti Pancasila merupakan...", "Sumber dari segala sumber hukum negara", "Aturan adat istiadat", "Pedoman hidup perorangan saja", "Hukum yang berlaku di daerah"],
            ["Pancasila sebagai ideologi terbuka berarti Pancasila...", "Mampu menyesuaikan perkembangan zaman tanpa mengubah nilai dasarnya", "Dapat diganti kapan saja", "Tidak boleh dikaji ulang", "Hanya berlaku untuk pemerintah"],
            ["Rumusan Pancasila sebagai dasar negara tercantum dalam...", "Pembukaan UUD 1945 alinea keempat", "Pembukaan UUD 1945 alinea pertama", "Pasal 1 UUD 1945", "Penjelasan UUD 1945 pasal 33"],
            ["Sikap yang sesuai dengan pengamalan sila pertama Pancasila adalah...", "Saling menghormati antarumat beragama", "Memaksakan agama kepada orang lain", "Mengejek ibadah agama lain", "Membeda-bedakan teman berdasarkan agama"],
            ["Menolong korban bencana alam tanpa memandang suku dan agama merupakan pengamalan sila...", "Kedua", "Pertama", "Keempat", "Kelima"],
            ["Mengutamakan kepentingan bangsa di atas kepentingan pribadi dan golongan merupakan pengamalan sila...", "Ketiga", "Kedua", "Keempat", "Kelima"],
            ["Menyelesaikan masalah di kelas dengan musyawarah untuk mufakat merupakan pengamalan sila...", "Keempat", "Pertama", "Ketiga", "Kelima"],
            ["Bersikap adil dan tidak pilih kasih terhadap teman merupakan pengamalan sila...", "Kelima", "Kedua", "Ketiga", "Keempat"],
            ["Perilaku yang bertentangan dengan sila ketiga Pancasila adalah...", "Mengejek teman yang berbeda suku", "Mengikuti upacara bendera", "Bergotong royong membersihkan kelas", "Mencintai produk dalam negeri"],

            // ===== UUD 1945 =====
            ["UUD 1945 disahkan oleh PPKI pada tanggal...", "18 Agustus 1945", "17 Agustus 1945", "22 Juni 1945", "1 Juni 1945"],
            ["UUD 1945 telah mengalami perubahan (amandemen) sebanyak...", "4 kali", "2 kali", "3 kali", "5 kali"],
            ["Pasal 1 ayat (1) UUD 1945 menyatakan bahwa Indonesia ialah negara...", "Kesatuan yang berbentuk republik", "Serikat yang berbentuk federal", "Kerajaan konstitusional", "Persemakmuran"],
            ["Pasal 1 ayat (2) UUD 1945 menyatakan bahwa kedaulatan berada di tangan...", "Rakyat dan dilaksanakan menurut Undang-Undang Dasar", "Presiden", "Dewan Perwakilan Rakyat", "Mahkamah Agung"],
            ["Pasal 1 ayat (3) UUD 1945 menyatakan bahwa Indonesia adalah negara...", "Hukum", "Kekuasaan", "Agama", "Federal"],
            ["Pasal 27 ayat (1) UUD 1945 mengatur tentang persamaan kedudukan warga negara dalam...", "Hukum dan pemerintahan", "Pendidikan", "Ekonomi", "Agama"],
            ["Pasal 27 ayat (3) UUD 1945 mengatur tentang hak dan kewajiban warga negara dalam...", "Upaya pembelaan negara", "Memilih presiden", "Membayar pajak", "Memeluk agama"],
            ["Hak asasi manusia diatur dalam UUD 1945 antara lain pada Pasal...", "28A sampai 28J", "30", "31", "33"],
            ["Kebebasan memeluk agama dan beribadah menurut agamanya dijamin dalam Pasal...", "29", "30", "31", "33"],
            ["Hak dan kewajiban warga negara dalam usaha pertahanan dan keamanan negara diatur dalam Pasal...", "30", "29", "31", "34"],
            ["Hak warga negara untuk mendapatkan pendidikan diatur dalam Pasal...", "31", "30", "33", "34"],
            ["Perekonomian nasional disusun sebagai usaha bersama berdasar atas asas kekeluargaan, hal ini terdapat dalam Pasal...", "33", "31", "34", "36"],
            ["Fakir miskin dan anak-anak terlantar dipelihara oleh negara, sesuai Pasal...", "34", "33", "31", "30"],
            ["Bahasa negara Republik Indonesia ialah Bahasa Indonesia, diatur dalam Pasal...", "36", "35", "37", "30"],
            ["Pembukaan UUD 1945 alinea pertama berisi pernyataan bahwa...", "Kemerdekaan ialah hak segala bangsa dan penjajahan harus dihapuskan", "Tujuan negara Indonesia", "Dasar negara Pancasila", "Pernyataan atas berkat rahmat Allah Yang Maha Kuasa"],
            ["Pernyataan 'Atas berkat rahmat Allah Yang Maha Kuasa' terdapat pada Pembukaan UUD 1945 alinea...", "Ketiga", "Pertama", "Kedua", "Keempat"],
            ["Tujuan negara Indonesia terdapat pada Pembukaan UUD 1945 alinea...", "Keempat", "Pertama", "Kedua", "Ketiga"],
            ["Salah satu tujuan negara Indonesia dalam Pembukaan UUD 1945 adalah...", "Mencerdaskan kehidupan bangsa", "Menguasai wilayah negara lain", "Mengembangkan sistem kerajaan", "Membentuk negara serikat"],
            ["Bentuk negara Indonesia adalah...", "Kesatuan", "Federasi", "Serikat", "Konfederasi"],
            ["Sistem pemerintahan yang dianut Indonesia adalah...", "Presidensial", "Parlementer", "Monarki absolut", "Diktator"],
            ["Presiden dan Wakil Presiden memegang jabatan selama...", "Lima tahun dan sesudahnya dapat dipilih kembali hanya untuk satu kali masa jabatan", "Empat tahun dan dapat dipilih berkali-kali", "Seumur hidup", "Tujuh tahun tanpa pemilihan ulang"],
            ["Presiden dan Wakil Presiden Indonesia dipilih langsung oleh rakyat untuk pertama kalinya pada tahun...", "2004", "1999", "1955", "2009"],

            // ===== Lembaga Negara =====
            ["Majelis Permusyawaratan Rakyat (MPR) terdiri atas anggota...", "DPR dan DPD", "DPR dan DPRD", "DPD dan DPRD", "DPR dan Mahkamah Agung"],
            ["Fungsi Dewan Perwakilan Rakyat (DPR) adalah...", "Legislasi, anggaran, dan pengawasan", "Peradilan, eksekusi, dan anggaran", "Eksekutif, yudikatif, dan legislatif", "Pemilu, pajak, dan peradilan"],
            ["Dewan Perwakilan Daerah (DPD) beranggotakan wakil dari setiap...", "Provinsi", "Kabupaten", "Kecamatan", "Partai politik"],
            ["Lembaga negara yang berwenang menguji undang-undang terhadap UUD 1945 adalah...", "Mahkamah Konstitusi", "Mahkamah Agung", "DPR", "Komisi Yudisial"],
            ["Lembaga yang berwenang menguji peraturan di bawah undang-undang terhadap undang-undang adalah...", "Mahkamah Agung", "Mahkamah Konstitusi", "DPD", "BPK"],
            ["Lembaga yang bertugas menjaga kehormatan, keluhuran martabat, dan perilaku hakim adalah...", "Komisi Yudisial", "Mahkamah Konstitusi", "Kejaksaan Agung", "Komnas HAM"],
            ["Lembaga yang bertugas memeriksa pengelolaan dan tanggung jawab keuangan negara adalah...", "Badan Pemeriksa Keuangan (BPK)", "Bank Indonesia", "Kementerian Keuangan", "Komisi Pemberantasan Korupsi"],
            ["Ajaran pemisahan kekuasaan negara menjadi legislatif, eksekutif, dan yudikatif dikemukakan oleh...", "Montesquieu", "John Locke", "Aristoteles", "Jean Jacques Rousseau"],
            ["Lembaga yang memegang kekuasaan eksekutif di Indonesia adalah...", "Presiden dan para menteri", "DPR", "Mahkamah Agung", "MPR"],
            ["Lembaga yang memegang kekuasaan membuat undang-undang bersama Presiden adalah...", "DPR", "BPK", "Mahkamah Agung", "Kejaksaan"],
            ["Kekuasaan kehakiman dilakukan oleh Mahkamah Agung dan badan peradilan di bawahnya serta oleh...", "Mahkamah Konstitusi", "Komisi Yudisial", "DPR", "Kepolisian"],
            ["Pengadilan tingkat pertama untuk perkara pidana dan perdata umum adalah...", "Pengadilan Negeri", "Pengadilan Tinggi", "Mahkamah Agung", "Pengadilan Agama"],
            ["Urutan hierarki peraturan perundang-undangan yang paling tinggi adalah...", "UUD 1945", "Undang-Undang", "Peraturan Pemerintah", "Peraturan Daerah"],
            ["Peraturan yang ditetapkan Presiden untuk melaksanakan undang-undang adalah...", "Peraturan Pemerintah", "Peraturan Daerah", "Peraturan Menteri", "Ketetapan MPR"],
            ["Peraturan Pemerintah Pengganti Undang-Undang (Perppu) dikeluarkan Presiden dalam keadaan...", "Kegentingan yang memaksa", "Normal", "Pemilu", "Sidang MPR"],
            ["Peraturan Daerah (Perda) ditetapkan oleh...", "DPRD bersama kepala daerah", "Presiden", "MPR", "Menteri Dalam Negeri"],

            // ===== Pemilu & Demokrasi =====
            ["Asas pemilihan umum di Indonesia disingkat...", "LUBER JURDIL", "LUGAS JURDIL", "LUBER PANCA", "JURDIL SAKTI"],
            ["Huruf 'R' pada asas LUBER dalam pemilu berarti...", "Rahasia", "Rakyat", "Resmi", "Rapi"],
            ["Pemilihan umum di Indonesia diselenggarakan setiap...", "Lima tahun sekali", "Dua tahun sekali", "Tiga tahun sekali", "Sepuluh tahun sekali"],
            ["Lembaga yang menyelenggarakan pemilihan umum di Indonesia adalah...", "Komisi Pemilihan Umum (KPU)", "Badan Pengawas Pemilu (Bawaslu)", "Mahkamah Konstitusi", "Kementerian Dalam Negeri"],
            ["Lembaga yang bertugas mengawasi penyelenggaraan pemilu adalah...", "Bawaslu", "KPU", "DPR", "Mahkamah Agung"],
            ["Syarat usia minimal warga negara untuk memiliki hak pilih adalah...", "17 tahun atau sudah/pernah menikah", "15 tahun", "18 tahun tanpa pengecualian", "21 tahun"],
            ["Pemilu serentak tahun 2024 memilih...", "Presiden/Wakil Presiden, DPR, DPD, dan DPRD", "Presiden dan Gubernur saja", "DPR dan MPR saja", "Bupati dan Wali Kota saja"],
            ["Pemilihan umum pertama di Indonesia dilaksanakan pada tahun...", "1955", "1945", "1971", "1999"],
            ["Sikap tidak menggunakan hak pilih dalam pemilu disebut...", "Golput (golongan putih)", "Kampanye", "Koalisi", "Oposisi"],
            ["Demokrasi secara harfiah berarti pemerintahan oleh...", "Rakyat", "Raja", "Kaum bangsawan", "Militer"],
            ["Demokrasi yang dianut bangsa Indonesia adalah demokrasi...", "Pancasila", "Liberal", "Komunis", "Terpimpin"],
            ["Menurut Abraham Lincoln, demokrasi adalah pemerintahan dari rakyat, oleh rakyat, dan...", "Untuk rakyat", "Atas rakyat", "Demi penguasa", "Bagi pemimpin"],
            ["Musyawarah mufakat dalam demokrasi Pancasila bertujuan untuk...", "Mencapai keputusan bersama yang disepakati", "Memenangkan kelompok tertentu", "Memaksakan pendapat mayoritas", "Menunda pengambilan keputusan"],

            // ===== Otonomi Daerah, Wawasan Nusantara & Ketahanan Nasional =====
            ["Hak, wewenang, dan kewajiban daerah untuk mengatur dan mengurus sendiri urusan pemerintahan disebut...", "Otonomi daerah", "Sentralisasi", "Federalisasi", "Dekonsentrasi"],
            ["Penyerahan urusan pemerintahan dari pemerintah pusat kepada daerah otonom disebut...", "Desentralisasi", "Sentralisasi", "Dekonsentrasi", "Tugas pembantuan"],
            ["Kepala pemerintahan daerah tingkat provinsi disebut...", "Gubernur", "Bupati", "Wali kota", "Camat"],
            ["Kepala pemerintahan daerah tingkat kabupaten disebut...", "Bupati", "Gubernur", "Wali kota", "Lurah"],
            ["Salah satu tujuan otonomi daerah adalah...", "Meningkatkan pelayanan dan kesejahteraan masyarakat daerah", "Memisahkan daerah dari negara", "Menghapus peran pemerintah pusat", "Membentuk negara bagian"],
            ["Wawasan Nusantara adalah cara pandang bangsa Indonesia mengenai...", "Diri dan lingkungannya berdasarkan Pancasila dan UUD 1945", "Hubungan dengan negara tetangga saja", "Wilayah daratan saja", "Sejarah kerajaan nusantara"],
            ["Deklarasi Djuanda dicetuskan pada tanggal...", "13 Desember 1957", "17 Agustus 1945", "28 Oktober 1928", "1 Juni 1945"],
            ["Lebar laut teritorial Indonesia diukur dari garis pangkal sejauh...", "12 mil laut", "200 mil laut", "3 mil laut", "50 mil laut"],
            ["Lebar Zona Ekonomi Eksklusif (ZEE) Indonesia diukur dari garis pangkal sejauh...", "200 mil laut", "12 mil laut", "100 mil laut", "350 mil laut"],
            ["Ketahanan nasional Indonesia terdiri atas delapan aspek yang disebut...", "Asta Gatra", "Panca Gatra", "Tri Gatra", "Dasa Gatra"],
            ["Aspek alamiah (Tri Gatra) dalam ketahanan nasional meliputi...", "Geografi, kekayaan alam, dan kependudukan", "Ideologi, politik, dan ekonomi", "Sosial budaya, pertahanan, dan keamanan", "Politik, hukum, dan ekonomi"],
            ["Aspek sosial dalam ketahanan nasional (Panca Gatra) meliputi...", "Ideologi, politik, ekonomi, sosial budaya, dan pertahanan keamanan", "Geografi, demografi, dan sumber daya alam", "Kesehatan, pendidikan, dan olahraga", "Agama, budaya, dan adat"],

            // ===== HAM, Hak & Kewajiban, Kewarganegaraan =====
            ["Hak asasi manusia adalah hak dasar yang dimiliki manusia sejak...", "Lahir sebagai anugerah Tuhan", "Dewasa", "Diberikan oleh negara", "Memiliki pekerjaan"],
            ["Undang-undang yang mengatur tentang Hak Asasi Manusia di Indonesia adalah UU Nomor...", "39 Tahun 1999", "12 Tahun 2011", "30 Tahun 2002", "20 Tahun 2003"],
            ["Deklarasi Universal Hak Asasi Manusia (DUHAM) diumumkan oleh PBB pada tanggal...", "10 Desember 1948", "24 Oktober 1945", "17 Agustus 1945", "1 Januari 1950"],
            ["Lembaga negara yang bertugas memajukan dan melindungi HAM di Indonesia adalah...", "Komnas HAM", "KPK", "Komisi Yudisial", "BPK"],
            ["Contoh hak warga negara dalam bidang pendidikan adalah...", "Memperoleh pengajaran yang layak", "Membayar pajak", "Menaati hukum", "Ikut bela negara"],
            ["Contoh kewajiban warga negara terhadap negara adalah...", "Membayar pajak", "Memperoleh pekerjaan", "Mendapat pendidikan", "Berpendapat"],
            ["Hak dan kewajiban warga negara harus dilaksanakan secara...", "Seimbang", "Bebas tanpa batas", "Hak lebih dahulu", "Kewajiban saja"],
            ["Contoh pelanggaran hak asasi manusia adalah...", "Penyiksaan terhadap tahanan", "Menghormati pendapat orang lain", "Memberikan bantuan kepada korban bencana", "Mengikuti pemilu"],
            ["Kebebasan berpendapat harus dilakukan dengan...", "Bertanggung jawab dan menghormati hak orang lain", "Bebas tanpa batasan", "Menghina pihak lain", "Memaksakan kehendak"],
            ["Penduduk Indonesia yang bukan warga negara Indonesia disebut...", "Orang asing", "Warga negara", "Penduduk asli", "Rakyat"],
            ["Penentuan kewarganegaraan berdasarkan tempat kelahiran disebut asas...", "Ius soli", "Ius sanguinis", "Naturalisasi", "Repatriasi"],
            ["Penentuan kewarganegaraan berdasarkan keturunan atau darah disebut asas...", "Ius sanguinis", "Ius soli", "Apatride", "Bipatride"],
            ["Seseorang yang tidak memiliki kewarganegaraan disebut...", "Apatride", "Bipatride", "Multipatride", "Naturalisasi"],
            ["Seseorang yang memiliki dua kewarganegaraan disebut...", "Bipatride", "Apatride", "Naturalisasi", "Repatriasi"],
            ["Pewarganegaraan bagi orang asing yang memenuhi syarat menjadi WNI disebut...", "Naturalisasi", "Emigrasi", "Imigrasi", "Deportasi"],
            ["Pungutan wajib dari rakyat kepada negara yang digunakan untuk kepentingan umum disebut...", "Pajak", "Retribusi", "Donasi", "Denda"],

            // ===== Norma & Hukum =====
            ["Norma yang bersumber dari ajaran Tuhan dan dimuat dalam kitab suci adalah norma...", "Agama", "Kesusilaan", "Kesopanan", "Hukum"],
            ["Norma yang bersumber dari hati nurani manusia disebut norma...", "Kesusilaan", "Agama", "Kesopanan", "Hukum"],
            ["Norma yang bersumber dari kebiasaan atau pergaulan hidup masyarakat disebut norma...", "Kesopanan", "Agama", "Kesusilaan", "Hukum"],
            ["Norma yang sanksinya tegas dan dilaksanakan oleh aparat negara adalah norma...", "Hukum", "Kesopanan", "Kesusilaan", "Agama"],
            ["Contoh pelanggaran norma kesopanan adalah...", "Berbicara kasar kepada orang yang lebih tua", "Mencuri barang orang lain", "Tidak membayar pajak", "Melanggar rambu lalu lintas"],
            ["Hukum yang mengatur kejahatan dan pelanggaran serta sanksinya disebut hukum...", "Pidana", "Perdata", "Tata negara", "Internasional"],
            ["Hukum yang mengatur hubungan antarindividu seperti jual beli dan warisan disebut hukum...", "Perdata", "Pidana", "Administrasi negara", "Pajak"],
            ["Asas bahwa setiap orang dianggap tidak bersalah sampai ada putusan pengadilan yang tetap disebut asas...", "Praduga tak bersalah", "Legalitas", "Retroaktif", "Persamaan di muka hukum"],
            ["Salah satu tujuan adanya hukum adalah...", "Menciptakan ketertiban dan keadilan", "Membatasi kebebasan rakyat", "Memberikan keuntungan bagi penguasa", "Menghukum semua orang"],
            ["Prinsip bahwa hukum memiliki kedudukan tertinggi dalam penyelenggaraan negara disebut...", "Supremasi hukum", "Kedaulatan rakyat", "Desentralisasi", "Otonomi"],
            ["Konstitusi adalah...", "Hukum dasar tertinggi yang mengatur penyelenggaraan negara", "Peraturan desa", "Perjanjian internasional", "Aturan sekolah"],

            // ===== Antikorupsi, Bela Negara & Persatuan =====
            ["Lembaga independen yang dibentuk untuk memberantas tindak pidana korupsi di Indonesia adalah...", "Komisi Pemberantasan Korupsi (KPK)", "Komnas HAM", "Bawaslu", "Ombudsman"],
            ["Korupsi adalah penyalahgunaan kekuasaan atau wewenang untuk...", "Keuntungan pribadi atau kelompok", "Kepentingan umum", "Kesejahteraan rakyat", "Pembangunan daerah"],
            ["Contoh sikap antikorupsi di lingkungan sekolah adalah...", "Jujur saat ujian dan tidak menyontek", "Menyontek saat ujian", "Memalsukan tanda tangan", "Menitipkan absen pada teman"],
            ["Sikap dan perilaku warga negara yang dijiwai cinta tanah air untuk menjaga kelangsungan hidup bangsa disebut...", "Bela negara", "Kolonialisme", "Separatisme", "Globalisasi"],
            ["Sistem pertahanan dan keamanan Indonesia yang melibatkan seluruh rakyat disebut...", "Sishankamrata", "Sistem federal", "Wajib militer", "Pertahanan asing"],
            ["Tugas pokok Tentara Nasional Indonesia (TNI) adalah...", "Menjaga kedaulatan dan pertahanan negara", "Menegakkan hukum lalu lintas", "Mengadili perkara", "Menyelenggarakan pemilu"],
            ["Tugas pokok Kepolisian Negara Republik Indonesia (Polri) adalah...", "Memelihara keamanan dan ketertiban masyarakat", "Menjaga perbatasan dari serangan militer", "Membuat undang-undang", "Memeriksa keuangan negara"],
            ["Contoh bela negara di lingkungan sekolah adalah...", "Mengikuti upacara bendera dengan khidmat", "Bolos saat upacara", "Merusak fasilitas sekolah", "Mencoret-coret dinding"],
            ["Peredaran narkoba merupakan bentuk ancaman terhadap bangsa di bidang...", "Sosial dan keamanan", "Ideologi komunis", "Pertahanan laut", "Perdagangan internasional"],
            ["Sikap fanatik berlebihan terhadap suku atau kelompoknya sendiri yang dapat menghambat persatuan disebut...", "Etnosentrisme", "Nasionalisme", "Patriotisme", "Toleransi"],
            ["Sikap saling menghargai perbedaan pendapat dan keyakinan disebut...", "Toleransi", "Egoisme", "Diskriminasi", "Primordialisme"],
            ["Kerja sama untuk menyelesaikan pekerjaan secara bersama-sama tanpa pamrih disebut...", "Gotong royong", "Individualisme", "Kompetisi", "Monopoli"],
            ["Sikap bijak dalam bermedia sosial yang sesuai nilai Pancasila adalah...", "Menyaring informasi sebelum menyebarkannya", "Menyebarkan berita tanpa memeriksa kebenaran", "Menghina orang lain di kolom komentar", "Membuat akun palsu untuk menipu"],
            ["Dampak negatif globalisasi bagi remaja adalah...", "Gaya hidup konsumtif dan individualistis", "Mudah mengakses ilmu pengetahuan", "Meluasnya kerja sama internasional", "Meningkatnya kualitas teknologi"],

            // ===== Hubungan Internasional =====
            ["Politik luar negeri Indonesia menganut prinsip...", "Bebas aktif", "Netral pasif", "Berpihak pada blok Barat", "Berpihak pada blok Timur"],
            ["Tokoh yang menyampaikan gagasan politik luar negeri bebas aktif dengan pidato 'Mendayung di antara Dua Karang' adalah...", "Mohammad Hatta", "Ir. Soekarno", "Sutan Syahrir", "Adam Malik"],
            ["Konferensi Asia Afrika (KAA) pertama diselenggarakan pada tahun 1955 di kota...", "Bandung", "Jakarta", "Surabaya", "Yogyakarta"],
            ["ASEAN didirikan pada tanggal 8 Agustus 1967 di kota...", "Bangkok", "Jakarta", "Manila", "Singapura"],
            ["Sekretariat ASEAN berkedudukan di kota...", "Jakarta", "Bangkok", "Kuala Lumpur", "Singapura"],
            ["Perserikatan Bangsa-Bangsa (PBB) berdiri pada tanggal...", "24 Oktober 1945", "10 Desember 1948", "17 Agustus 1945", "28 September 1950"],
            ["Koperasi sebagai sokoguru perekonomian Indonesia sesuai dengan Pasal...", "33 UUD 1945", "27 UUD 1945", "30 UUD 1945", "36 UUD 1945"],
            ["Tokoh yang dijuluki Bapak Koperasi Indonesia adalah...", "Mohammad Hatta", "Ir. Soekarno", "Ki Hajar Dewantara", "R.A. Kartini"],
        ];

        $this->pastikanJumlah('PKn', $soalPKn);
        $this->simpanSoalDanJawaban($pkn->id, $soalPKn);
        $this->command->info("✓ Pendidikan Kewarganegaraan: " . count($soalPKn) . " soal berhasil disimpan.");
    }

    /**
     * 5. Bahasa Inggris
     */
    private function seedBahasaInggris(): void
    {
        $inggris = Subject::factory()->create([
            'name' => 'Bahasa Inggris',
            'description' => 'Mata Pelajaran Bahasa Inggris (Tenses, Modal, Conditional, Passive Voice, Reported Speech, Vocabulary, Expressions, Text Types, Reading)',
            'is_active' => true,
        ]);

        // Format: [pertanyaan, jawaban benar, salah 1, salah 2, salah 3]
        $soalInggris = [
            // ===== Tenses =====
            ["She ___ to school every day.", "goes", "go", "going", "gone"],
            ["They ___ football in the field now.", "are playing", "play", "played", "plays"],
            ["I ___ my homework yesterday afternoon.", "finished", "finish", "finishes", "finishing"],
            ["He ___ in Medan since 2015.", "has lived", "lives", "lived", "is living"],
            ["We ___ to the market tomorrow morning.", "will go", "went", "have gone", "gone"],
            ["While I ___ TV, the phone rang.", "was watching", "watched", "watch", "am watching"],
            ["By the time we arrived, the movie ___.", "had started", "started", "has started", "starts"],
            ["She has just ___ her lunch.", "eaten", "ate", "eat", "eating"],
            ["My father ___ a newspaper every morning.", "reads", "read", "reading", "is read"],
            ["Look! The baby ___.", "is crying", "cries", "cried", "has cry"],
            ["They ___ for the bus for two hours.", "have been waiting", "are waiting", "waited", "wait"],
            ["The sun ___ in the east.", "rises", "rise", "rose", "is rising"],
            ["Water ___ at 100 degrees Celsius.", "boils", "boil", "boiled", "is boiling"],
            ["I have never ___ sushi before.", "eaten", "eat", "ate", "eating"],
            ["Rina ___ her teeth twice a day.", "brushes", "brush", "brushing", "brushed"],
            ["Next June, we ___ English for three years.", "will have studied", "have studied", "studied", "study"],
            ["When I was a child, I ___ swim in the river every Sunday.", "used to", "use to", "am used to", "was used"],
            ["My mother ___ dinner when I came home last night.", "was cooking", "cooks", "has cooked", "cook"],
            ["Past tense of the verb 'go' is...", "went", "goed", "gone", "going"],
            ["Past participle of the verb 'write' is...", "written", "wrote", "writed", "writing"],
            ["Past tense of the verb 'buy' is...", "bought", "buyed", "boughten", "buys"],
            ["Past participle of the verb 'see' is...", "seen", "saw", "seed", "seeing"],
            ["Past tense of the verb 'teach' is...", "taught", "teached", "tought", "teaches"],

            // ===== To Be & Auxiliary =====
            ["My mother ___ a teacher.", "is", "am", "are", "be"],
            ["There ___ a cat under the chair.", "is", "are", "were", "be"],
            ["___ you at home last night?", "Were", "Was", "Are", "Did"],
            ["Those boys ___ my cousins.", "are", "is", "am", "was"],
            ["___ your brother like fried rice?", "Does", "Do", "Is", "Are"],

            // ===== Modals =====
            ["You ___ wear a helmet when riding a motorbike.", "must", "might", "would", "could"],
            ["___ I borrow your pen, please?", "May", "Must", "Need", "Ought"],
            ["She ___ swim when she was five years old.", "could", "can", "must", "should"],
            ["You ___ smoke in the hospital. It is forbidden.", "must not", "need not", "may", "should"],
            ["Tomorrow is a holiday, so you ___ come to school.", "don't have to", "mustn't", "can't", "shouldn't"],

            // ===== Conditional =====
            ["If it rains tomorrow, we ___ at home.", "will stay", "stayed", "would stay", "stay"],
            ["If I were rich, I ___ buy a big house.", "would", "will", "am", "have"],
            ["If she had studied harder, she ___ the exam.", "would have passed", "would pass", "will pass", "passed"],

            // ===== Articles, Prepositions, Pronouns =====
            ["She is ___ honest girl.", "an", "a", "the", "some"],
            ["He wants to be ___ engineer.", "an", "a", "the", "any"],
            ["___ sun rises in the east.", "The", "A", "An", "Some"],
            ["I was born ___ 2008.", "in", "on", "at", "by"],
            ["The meeting starts ___ 9 a.m.", "at", "in", "on", "for"],
            ["My birthday is ___ 14 October.", "on", "in", "at", "by"],
            ["He is very good ___ mathematics.", "at", "in", "on", "with"],
            ["She is afraid ___ spiders.", "of", "from", "at", "with"],
            ["We have lived here ___ 2010.", "since", "for", "during", "from"],
            ["He has been waiting ___ two hours.", "for", "since", "at", "in"],
            ["The cat is hiding ___ the sofa and the wall.", "between", "among", "in", "at"],
            ["My sister and ___ went to the cinema yesterday.", "I", "me", "my", "mine"],
            ["This bag is not yours. It is ___.", "mine", "my", "me", "I"],
            ["She hurt ___ while cooking.", "herself", "himself", "itself", "themselves"],
            ["Where are the students? ___ shoes are in front of the class.", "Their", "They", "Them", "Theirs"],
            ["I saw John yesterday. I talked to ___.", "him", "he", "his", "himself"],
            ["The teacher gave ___ a gift on Teachers' Day.", "us", "we", "our", "ours"],

            // ===== Comparison =====
            ["Mount Everest is ___ mountain in the world.", "the highest", "higher", "highest", "more high"],
            ["My bag is ___ than yours.", "heavier", "heavy", "heaviest", "more heavy"],
            ["This exam is ___ than the last one.", "more difficult", "most difficult", "difficulter", "the more difficult"],
            ["She is as ___ as her mother.", "tall", "taller", "tallest", "more tall"],
            ["Of all the students in my class, Rani is ___.", "the most diligent", "more diligent", "diligenter", "the more diligent"],
            ["Good - better - ___.", "best", "goodest", "most good", "well"],

            // ===== Passive Voice =====
            ["The window ___ by Tom yesterday.", "was broken", "broke", "is broken", "has broke"],
            ["English ___ in many countries.", "is spoken", "speaks", "spoke", "speaking"],
            ["The letter ___ by her tomorrow.", "will be sent", "will send", "sent", "is send"],
            ["A new bridge ___ in my town now.", "is being built", "builds", "was built", "has build"],
            ["'They clean the room every day.' The passive form is...", "The room is cleaned every day.", "The room cleans every day.", "The room was cleaned every day.", "The room is cleaning every day."],

            // ===== Reported Speech =====
            ["She said, 'I am hungry.' = She said that she ___ hungry.", "was", "is", "were", "has been"],
            ["He said, 'I will come tomorrow.' = He said that he ___ the next day.", "would come", "will come", "came", "comes"],
            ["'Where do you live?' he asked me. = He asked me where I ___.", "lived", "live", "do live", "living"],

            // ===== Gerund & Infinitive =====
            ["She enjoys ___ novels in her free time.", "reading", "to read", "read", "reads"],
            ["He decided ___ abroad after graduating.", "to study", "studying", "study", "studied"],
            ["I look forward to ___ you next week.", "seeing", "see", "seen", "to see"],
            ["She is too tired ___ anymore.", "to walk", "walking", "walk", "walked"],
            ["My hobby is ___ pictures.", "drawing", "draw", "drew", "draws"],

            // ===== Question Tag, Relative Clause, Conjunction =====
            ["You are a student, ___?", "aren't you", "are you", "don't you", "isn't you"],
            ["She doesn't like coffee, ___?", "does she", "doesn't she", "is she", "do she"],
            ["Let's go to the library, ___?", "shall we", "will we", "don't we", "do we"],
            ["The man ___ lives next door is a doctor.", "who", "which", "whose", "where"],
            ["This is the book ___ I bought yesterday.", "which", "who", "whose", "where"],
            ["The girl ___ bag was stolen is crying.", "whose", "who", "which", "whom"],
            ["That is the school ___ I studied for six years.", "where", "who", "whose", "whom"],
            ["He kept working ___ he was very tired.", "although", "because", "so that", "therefore"],
            ["It rained heavily, ___ we stayed at home.", "so", "because", "but", "although"],
            ["She failed the test ___ she did not study.", "because", "so", "but", "therefore"],
            ["___ he is rich, he is not happy.", "Although", "Because", "So", "Since"],
            ["We must hurry, ___ we will miss the bus.", "or", "and", "but", "so"],

            // ===== Synonym & Antonym =====
            ["The synonym of 'big' is...", "large", "tiny", "thin", "narrow"],
            ["The synonym of 'begin' is...", "start", "finish", "stop", "end"],
            ["The synonym of 'buy' is...", "purchase", "sell", "borrow", "lend"],
            ["The antonym of 'difficult' is...", "easy", "hard", "tough", "complex"],
            ["The antonym of 'ancient' is...", "modern", "old", "antique", "historic"],
            ["The antonym of 'generous' is...", "stingy", "kind", "rich", "helpful"],
            ["The synonym of 'rapid' is...", "fast", "slow", "late", "steady"],
            ["The synonym of 'assist' is...", "help", "disturb", "prevent", "refuse"],
            ["The antonym of 'accept' is...", "reject", "receive", "take", "agree"],
            ["The synonym of 'enormous' is...", "huge", "small", "light", "short"],
            ["The antonym of 'brave' is...", "cowardly", "strong", "bold", "fearless"],
            ["The synonym of 'ill' is...", "sick", "healthy", "strong", "fit"],
            ["The antonym of 'expensive' is...", "cheap", "costly", "valuable", "pricey"],
            ["The synonym of 'intelligent' is...", "clever", "foolish", "lazy", "careless"],
            ["The antonym of 'arrive' is...", "depart", "reach", "come", "enter"],
            ["The synonym of 'silent' is...", "quiet", "loud", "noisy", "crowded"],
            ["The antonym of 'diligent' is...", "lazy", "hard-working", "active", "tidy"],

            // ===== Vocabulary & Word Forms =====
            ["A person who teaches students at school is a...", "teacher", "farmer", "pilot", "driver"],
            ["A place where we borrow books is a...", "library", "bakery", "market", "station"],
            ["A person who cooks food in a restaurant is a...", "chef", "farmer", "pilot", "tailor"],
            ["We use ___ to cut paper.", "scissors", "a spoon", "a fork", "a hammer"],
            ["Which word is a noun?", "happiness", "happily", "happy", "happier"],
            ["Which word is an adjective?", "beautiful", "beauty", "beautifully", "beautify"],
            ["Which word is an adverb?", "carefully", "careful", "care", "careless"],
            ["The plural form of 'child' is...", "children", "childs", "childes", "childrens"],
            ["The plural form of 'tooth' is...", "teeth", "tooths", "teeths", "toothes"],
            ["The plural form of 'woman' is...", "women", "womans", "womens", "womanes"],
            ["Which spelling is correct?", "necessary", "neccessary", "necesary", "necessery"],
            ["Which spelling is correct?", "receive", "recieve", "receeve", "recive"],

            // ===== Expressions =====
            ["A: 'Thank you very much for your help.' B: '...'", "You're welcome.", "I'm sorry.", "Good luck.", "See you."],
            ["A: 'Congratulations on your graduation!' B: '...'", "Thank you.", "I'm sorry to hear that.", "Never mind.", "Good morning."],
            ["A: 'I'm sorry I'm late.' B: '...'", "That's all right.", "You're welcome.", "Same to you.", "Congratulations."],
            ["A: 'Would you like some tea?' B: '...'", "Yes, please.", "You're welcome.", "I'm fine, thanks.", "Good night."],
            ["A: 'Good luck on your test tomorrow!' B: '...'", "Thanks.", "I'm sorry.", "Excuse me.", "Never mind."],
            ["A: 'My grandmother is sick in the hospital.' B: '...'", "I'm sorry to hear that.", "Congratulations!", "Well done!", "Happy birthday!"],
            ["A: 'Would you like to come to my birthday party?' B: '...'", "Sure, I'd love to.", "You're welcome.", "Never mind.", "It doesn't matter."],
            ["Excuse me, ___ I come in?", "may", "will", "do", "are"],
            ["___ go to the beach this Sunday?", "Why don't we", "Why we", "How about we to", "Don't we"],
            ["The sign 'Keep off the grass' means...", "Do not walk on the grass.", "Please cut the grass.", "Plant more grass here.", "Give water to the grass."],
            ["The sign 'No Parking' means...", "You may not park your vehicle here.", "You may park here freely.", "Parking is free.", "Park only at night."],
            ["The sign 'Beware of the dog' means...", "Be careful, the dog may bite.", "Please feed the dog.", "Dogs are for sale.", "Dogs are welcome."],
            ["The sign 'Wet paint' means...", "Do not touch it, the paint is not dry yet.", "Please paint the wall.", "Water is available here.", "Paint is for sale."],
            ["The label 'Fragile' on a box means...", "Handle with care because it can easily break.", "The box is very heavy.", "The box contains food.", "Throw the box away."],

            // ===== Text Types =====
            ["A text that tells past events in chronological order is called...", "Recount text", "Procedure text", "Descriptive text", "Report text"],
            ["The social function of a narrative text is to...", "Entertain the readers with a story", "Explain how to make something", "Describe a thing", "Persuade the readers to buy"],
            ["The generic structure of a narrative text is...", "Orientation, complication, resolution", "Goal, materials, steps", "Identification, description", "General classification, description"],
            ["The purpose of a procedure text is to...", "Tell how to make or do something", "Tell a fairy tale", "Describe a person", "Report news"],
            ["The purpose of a descriptive text is to...", "Describe a particular person, place, or thing", "Tell past experiences", "Give instructions", "Entertain with a story"],
            ["The words 'first, then, next, finally' are commonly found in...", "Procedure text", "Narrative text", "Descriptive text", "Announcement"],
            ["The phrase 'Once upon a time' usually appears in...", "Narrative text", "Procedure text", "Report text", "Advertisement"],
            ["An invitation card usually contains...", "Time, place, and event", "Steps and materials", "Complication and resolution", "Ingredients"],

            // ===== Reading Comprehension =====
            ["Rina has a pet cat named Mimi. Mimi is white and very fluffy. She likes to sleep on the sofa.\n\nWhat does Mimi like to do?", "Sleep on the sofa", "Play outside", "Eat fish", "Chase mice"],
            ["Budi gets up at 5 a.m. every day. He prays, takes a shower, and has breakfast before going to school.\n\nWhat does Budi do after praying?", "Takes a shower", "Has breakfast", "Goes to school", "Gets up"],
            ["Lake Toba is the largest volcanic lake in the world. It is located in North Sumatra. Many tourists visit it every year.\n\nWhere is Lake Toba located?", "North Sumatra", "West Java", "Bali", "Central Sulawesi"],
            ["A: Where is Mr. Dani?\nB: He is in the teachers' room.\n\nThe word 'He' refers to...", "Mr. Dani", "The teacher", "The student", "The speaker"],
            ["Dina bought a new dress yesterday. She wore it to her friend's birthday party and everyone said it was beautiful.\n\nWhen did Dina buy the dress?", "Yesterday", "Today", "Tomorrow", "Last year"],
            ["Ani wants to bake a cake. First, she mixes flour, eggs, and sugar. Then she pours the mixture into a pan. Finally, she bakes it in the oven.\n\nWhat does Ani do after mixing the ingredients?", "Pours the mixture into a pan", "Bakes the cake", "Buys flour", "Eats the cake"],
            ["The word 'tiny' in the sentence 'The ant is tiny' means...", "Very small", "Very big", "Very fast", "Very strong"],
            ["I live in a small house near the beach. Every morning, I walk along the shore and collect shells.\n\nWhat does the writer do every morning?", "Walks along the shore", "Goes to school", "Swims in the sea", "Sells shells"],
            ["Tom is taller than Andi, but Andi is taller than Rudi.\n\nWho is the shortest?", "Rudi", "Tom", "Andi", "Nobody"],
            ["Sinta was very happy because she got the first prize in the speech contest.\n\nWhy was Sinta happy?", "She won the speech contest", "She got a new bag", "She went on holiday", "She met her idol"],
            ["Doni usually rides a bicycle to school, but today it is raining, so he takes a bus.\n\nHow does Doni go to school today?", "By bus", "By bicycle", "On foot", "By motorbike"],
            ["Mrs. Lina is a nurse. She works at a hospital and helps sick people every day.\n\nWhat does Mrs. Lina do?", "She helps sick people", "She teaches students", "She sells medicine", "She cooks for patients"],
            ["The antonym of 'noisy' is...", "quiet", "loud", "busy", "crowded"],
            ["He ___ his car every Sunday morning.", "washes", "wash", "washing", "washed"],
            ["I will call you if I ___ free tomorrow.", "am", "will be", "was", "would be"],
        ];

        $this->pastikanJumlah('Bahasa Inggris', $soalInggris);
        $this->simpanSoalDanJawaban($inggris->id, $soalInggris);
        $this->command->info("✓ Bahasa Inggris: " . count($soalInggris) . " soal berhasil disimpan.");
    }

    /**
     * Pastikan jumlah soal tepat 150 per mata pelajaran.
     */
    private function pastikanJumlah(string $nama, array $daftarSoal): void
    {
        $jumlah = count($daftarSoal);

        if ($jumlah !== 150) {
            throw new \RuntimeException("Jumlah soal {$nama} harus 150, saat ini {$jumlah}.");
        }
    }

    /**
     * Simpan soal beserta pilihan jawabannya.
     */
    private function simpanSoalDanJawaban(int $subjectId, array $daftarSoal): void
    {
        $optionsList = ['A', 'B', 'C', 'D'];

        foreach ($daftarSoal as $item) {
            $pilihan = [
                ['text' => $item[1], 'is_correct' => true],
                ['text' => $item[2], 'is_correct' => false],
                ['text' => $item[3], 'is_correct' => false],
                ['text' => $item[4], 'is_correct' => false],
            ];

            // Acak posisi pilihan agar jawaban benar tidak selalu di opsi A
            shuffle($pilihan);

            $correctAnswerOption = null;
            foreach ($pilihan as $idx => &$p) {
                $p['option'] = $optionsList[$idx] ?? 'A';
                if ($p['is_correct']) {
                    $correctAnswerOption = $p['option'];
                }
            }
            unset($p);

            // Buat Question via QuestionFactory
            $soal = Question::factory()->create([
                'subject_id'     => $subjectId,
                'payload'        => $item[0],
                'correct_answer' => $correctAnswerOption,
                'score'          => 1,
                'is_active'      => true,
            ]);

            // Buat setiap pilihan jawaban via AnswerFactory
            foreach ($pilihan as $p) {
                Answer::factory()->create([
                    'question_id' => $soal->id,
                    'option'      => $p['option'],
                    'text'        => $p['text'],
                    'is_correct'  => $p['is_correct'],
                    'is_active'   => true,
                ]);
            }
        }
    }
}