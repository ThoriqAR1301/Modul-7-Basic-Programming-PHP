<?php

echo "Studi Kasus 1";
echo "<hr>";

$gaji_bulanan = "12000000"; // Terserah
$status = "Tetap"; // Tetap Atau Sambilan

if ($gaji_bulanan <= 5000000) {
    $pajak = 5;
} else if ($gaji_bulanan >= 5000000 && $gaji_bulanan <= 10000000) {
    $pajak = 10;
} else if ($gaji_bulanan >= 10000000 && $gaji_bulanan <= 15000000) {
    $pajak = 15;
} else if ($gaji_bulanan >= 15000000) {
    $pajak = 20;
}

if ($status == "Tetap"){
    $pajak = $pajak + 5;
} else {
    $pajak = $pajak + 0;
}

$persen = $pajak / 100;
$potongan_pajak = $gaji_bulanan * $persen; // Hasil Dari Potongan Pajak
$gaji_bersih = $gaji_bulanan - $potongan_pajak; // Pendapatan Gaji Bersih Setelah Potongan Pajak

echo "Gaji Bulanan = Rp. " . $gaji_bulanan . "<br>";
echo "Status Pegawai = " . $status . "<br>";
echo "Pajak = " . $pajak . "%<br>";
echo "Potongan Pajak = Rp. " . $potongan_pajak . "<br>";
echo "Gaji Bersih = Rp. " . $gaji_bersih . "<br>";