<?php

echo "<hr>";
echo "<center><h3>Sistem Perhitungan Gaji Karyawan</h3></center>";
echo "<hr>";

// readline() Digunakan Untuk Membaca Input Pengguna
$jabatan = readline ("Masukan Jabatan Anda = ");
$jabatan = 1; // Manager (1) / Supervisor (2) / Staff (3)
$jam_kerja = 300; // 200 Jam/Bulan / Lebih = Bonus, Kurang = Tidak Bonus

if ($jabatan == 1){
    $jabatan = "Manager";
    $gaji_pokok = 7000000;
} elseif ($jabatan == 2){
    $jabatan = "Supervisor";
    $gaji_pokok = 5000000;
} elseif ($jabatan == 3){
    $jabatan = "Staff";
    $gaji_pokok = 3000000;
}

if ($gaji_pokok <= 3000000){
    $pajak = 5;
    $ucapanpajak = "Anda Mendapatkan Potongan Pajak 5%";
} elseif ($gaji_pokok >= 3000000 && $gaji_pokok <= 5000000){
    $pajak = 10;
    $ucapanpajak = "Anda Mendapatkan Potongan Pajak 10%";
} elseif ($gaji_pokok >= 5000000){
    $pajak = 15;
    $ucapanpajak = "Anda Mendapatkan Potongan Pajak 15%";
}

if ($jam_kerja > 200){
    $bonus = ($jam_kerja - 200) * 20000;
    $ucapanbonus = "Anda Mendapatkan Bonus Karena Anda Bekerja Lebih Dari 200 Jam/Bulan";
} else {
    $bonus = 0;
    $ucapanbonus = "Maaf, Anda Tidak Mendapatkan Bonus Karena Bekerja Kurang Dari 200 Jam/Bulan";
}

$persen = $pajak / 100;
$potongan_pajak = $gaji_pokok * $persen;
$gaji_bersih = $gaji_pokok - $potongan_pajak + $bonus;

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',','.');
    return $hasil_rupiah;
}

echo "Jabatan = " . $jabatan . "<br>";
echo "<br>";
echo "Gaji Pokok = " . rupiah ($gaji_pokok) . "<br>";
echo "<br>";
echo "Pajak = " . rupiah ($potongan_pajak) . "<br>";
echo "Note = " . $ucapanpajak . "<br>";
echo "<br>";
echo "Bonus = " . rupiah ($bonus) . "<br>";
echo "Note = ". $ucapanbonus . "<br>";
echo "<br>";
echo "Gaji Bersih = " . rupiah ($gaji_bersih) . "<br>";