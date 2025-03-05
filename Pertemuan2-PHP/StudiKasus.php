<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studi Kasus</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-stone-300 flex items-center justify-center min-h-screen">

<?php

$nama = "";
$jabatan = "";
$jam_kerja = "";

session_start();

if (!isset($_SESSION['jabatanList'])){
    $_SESSION['jabatanList'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['nama_karyawan']) && ($_POST['jabatan']) && isset($_POST['jam_kerja'])){

        $nama = $_POST['nama_karyawan'];
        $jabatan = $_POST['jabatan'];
        $jam_kerja = $_POST['jam_kerja'];

        if ($jabatan == "Manager"){
            $jabatan = "Manager";
            $gaji_pokok = 7000000;
        } elseif ($jabatan == "Supervisor"){
            $jabatan = "Supervisor";
            $gaji_pokok = 5000000;
        } elseif ($jabatan == "Staff"){
            $jabatan = "Staff";
            $gaji_pokok = 3000000;
        }

        if ($gaji_pokok <= 3000000){
            $pajak = 5;
        } elseif ($gaji_pokok >= 3000000 && $gaji_pokok <= 5000000){
            $pajak = 10;
        } elseif ($gaji_pokok >= 5000000){
            $pajak = 15;
        }

        if ($jam_kerja > 200){
            $bonus = ($jam_kerja - 200) * 20000;
        } else {
            $bonus = 0;
        }

        $persen = $pajak / 100;
        $potongan_pajak = $gaji_pokok * $persen;
        $gaji_bersih = $gaji_pokok - $potongan_pajak + $bonus;

        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka, 2, ',','.');
            return $hasil_rupiah;
        }
    }
}

$_SESSION['jabatanList'][] = [
    'nama_karyawan' => $nama,
    'jabatan' => $jabatan,
    'jam_kerja' => $jam_kerja,
];

if (isset($_POST['hapus_data'])){
    session_destroy();
    session_start();
    $_SESSION['jabatanList'] = [];
}

?>

    <div class="container flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-semibold text-center mb-5">Sistem Perhitungan Gaji Karyawan</h2>

            <form action="" method="POST">
                <label class="text-lg font-semibold text-left">Nama Karyawan</label><input type="text" name="nama_siswa" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <label class="text-lg font-semibold text-left">Jabatan</label><input type="text" name="nama_siswa" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <label class="text-lg font-semibold text-left">Jam Kerja</label><input type="" name="nilai_tugas" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-1" autocomplete="off">
                <input type="submit" name="hitung_nilai" value="Kategorikan" class="w-full p-3 mb-4 bg-blue-500 text-white text-md rounded-md mt-2 hover:bg-blue-200 cursor-pointer transition duration-500 hover:text-black">
            </form>
        </div>
        <div class="container2">
            <div class="bg-white p-8 rounded-lg shadow-lg w-175 ml-5">
                <h2 class="text-2xl font-semibold text-center mb-5">Hitung Gaji</h2>

                <table class="border-collapse border border-gray-400 w-full text-center p-10">
                    <thead>
                        <tr>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Nama</td>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Jabatan</td>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Jam Kerja</td>
                            <td class="bg-black text-white border-gray-300 text-lg p-5">Gaji</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Memanggil isi array -->
                        <?php foreach($_SESSION['jabatanList'] as $List): ?>
                        <tr>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['nama_karyawan']) ?></td>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['jabatan']) ?></td>
                            <td class="border border-gray-500 p-5 text-md"><?= ($List['jam_kerja']); ?></td>
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