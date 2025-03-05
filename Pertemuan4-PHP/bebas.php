<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Akhir Siswa</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-stone-300 flex items-center justify-center min-h-screen">

    <?php
    $nama_siswa = "";
    $nilai_tugas = "";
    $nilai_uts = "";
    $nilai_uas = "";
    $predikat = "";
    $hasil = "";
    
    // isset() Memeriksa apakah variabel ada atau tidak bernilai null
    // Mengembalikan true jika variabel ada dan tidak null

    // !isset() Memeriksa apakah variabel tidak ada atau bernilai null
    // Mengembalikan true jika variabel tidak ada atau null

    // session : Digunakan untuk menyimpan data sementara yang dapat diakses oleh pengguna selama periode tertentu

    // Inisialisasi sesi untuk menyimpan data siswa
    session_start();

    // Memeriksa apakah $_SESSION['siswaList'] sudah ada dalam sesi atau belum
    if (!isset($_SESSION['siswaList'])){ // True
        $_SESSION['siswaList'] = []; // Jika kondisi true, maka akan dibuatkan array kosong
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Cek apakah inputan form ada dan tidak kosong
        if(isset($_POST['nama_siswa']) && isset($_POST['nilai_tugas']) && isset($_POST['nilai_uts']) && isset($_POST['nilai_uas'])){

            // Ambil imputan dari form
            $nama_siswa = $_POST['nama_siswa'];
            $nilai_tugas = $_POST['nilai_tugas'];
            $nilai_uts = $_POST['nilai_uts'];
            $nilai_uas = $_POST['nilai_uas'];

            // Hitung nilai akhir
            $hasil = ((30 / 100) * $nilai_tugas) + ((30 / 100) * $nilai_uts) + ((40 / 100) * $nilai_uas);

            // Tentukan kategori nilai
            switch ($hasil){
                case $hasil >= 85:
                    $predikat = "A";
                    break;
                case $hasil >= 70:
                    $predikat = "B";
                    break;
                case $hasil >= 60:
                    $predikat = "C";
                    break;
                case $hasil >= 50:
                    $predikat = "D";
                    break;
                default:
                    $predikat = "E";
                    break;
            }

            // Simpan data ke dalam sesi
            $_SESSION['siswaList'][] = [
                'nama_siswa' => $nama_siswa,
                'hasil' => $hasil, // Sesuaikan dengan var masing-masing
                'predikat' => $predikat, // Sesuaikan dengan var masing-masing
            ];
        }
    }

    if (isset($_POST['hitung_nilai'])){
        $nama_siswa = $_POST['nama_siswa'];
        $nilai_tugas = $_POST['nilai_tugas'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $hasil = ((30 / 100) * $nilai_tugas) + ((30 / 100) * $nilai_uts) + ((40 / 100) * $nilai_uas);
    }

    switch ($hasil){
        case $hasil >= 85:
            $predikat = "A";
            break;
        case $hasil >= 70:
            $predikat = "B";
            break;
        case $hasil >= 60:
            $predikat = "C";
            break;
        case $hasil >= 50:
            $predikat = "D";
            break;
        case $hasil = 0:
            $predikat = "E";
            break;
    }

    // Cek jika tombol hapus data di klik, maka sesia akan dihancurkan
    if (isset($_POST['hapus_data'])){
        session_destroy(); // Hapus seluruh data sesi
        session_start();
        $_SESSION['siswaList'] = [];
    }

    ?>

    <div class="container flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-semibold text-center mb-5">Form Input Nilai Siswa</h2>

            <form action="" method="POST">
                <label class="text-lg font-semibold text-left">Nama Siswa</label><input type="text" name="nama_siswa" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <label class="text-lg font-semibold text-left">Nilai Tugas</label><input type="number" name="nilai_tugas" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <label class="text-lg font-semibold text-left">Nilai UTS</label><input type="number" name="nilai_uts" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <label class="text-lg font-semibold text-left">Nilai UAS</label><input type="number" name="nilai_uas" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <input type="submit" name="hitung_nilai" value="Hitung Nilai" class="w-full p-3 mb-4 bg-blue-500 text-white text-md rounded-md mt-2 hover:bg-blue-200 cursor-pointer transition duration-500 hover:text-black">
            </form>
        </div>
        <div class="container2">
            <div class="bg-white p-8 rounded-lg shadow-lg w-175 ml-5">
                <h2 class="text-2xl font-semibold text-center mb-5">Hasil Penilaian</h2>

                <table class="border-collapse border border-gray-400 w-full text-center p-10">
                    <thead>
                        <tr>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Nama</td>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Nilai Akhir</td>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Kategori</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Memanggil isi array -->
                        <?php foreach($_SESSION['siswaList'] as $List): ?>
                        <tr>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['nama_siswa']) ?></td>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['hasil']); ?></td>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['predikat']) ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            
            <!-- Tombol untuk menghapus data sesi -->
            <form method="POST">
                <button type="submit" name="hapus_data" class="ml-5 w-175 p-3 mb-4 bg-red-500 text-white text-md rounded-md mt-5 hover:bg-red-200 cursor-pointer transition duration-500 text-center hover:text-black">Hapus Semua Data</button>
            </form>
        </div>
    </div>
</body>
</html>