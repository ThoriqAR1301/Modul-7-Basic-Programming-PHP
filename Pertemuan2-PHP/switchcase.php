<?php

// readline() Digunakan Untuk Membaca Input Pengguna
$warna = readline ("Masukan Warna Anda = "); // Terserah
$warna = "Merah";

switch ($warna) {
    case "Merah":
        echo "Berhenti!\n";
        break;
    case "Kuning":
        echo "Siap-Siap/Peringatan!\n";
        break;
    case "Hijau":
        echo "Jalan/Lanjutkan!\n";
        break;
    default:
        echo "Warna Tidak Valid/Dikenal!\n";
}