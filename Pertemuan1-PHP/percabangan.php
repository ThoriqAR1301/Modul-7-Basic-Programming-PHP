<?php

$total_belanja = 500;

// Jika Belanja Lebih Dari 1000, Maka Selamat Anda Mendapat Diskon 500
// Selainnya Anda : Tidak Dapat Diskon

echo "Total Belanja Anda : $total_belanja <br>";

if($total_belanja >= 1000){
    echo "Selamat Anda Mendapat Diskon Rp. 500";
} else {
    echo "Maaf, Anda Tidak Mendapat Diskon <br><br>";
}

// ====================================================================

// Senin : Putih Abu
// Selasa : Pramuka
// Rabu : Produktif
// Kamis : Batik
// Jum'at : Gamis

$hari = "Minggu";
if ($hari == "Senin"){
    echo "Senin : <br>";
    echo "Hari Ini, Silahkan Mengenakan Seragam Putih Abu";
} else if ($hari == "Selasa"){
    echo "Selasa : <br>";
    echo " Hari Ini, Silahkan Mengenakan Seragam Pramuka";
} else if ($hari == "Rabu"){
    echo "Rabu : <br>";
    echo "Hari Ini, Silahkan Mengenakan Seragam Produktif";
} else if ($hari == "Kamis"){
    echo "Kamis : <br>";
    echo "Hari Ini, Silahkan Mengenakan Seragam Batik";
} else if ($hari == "Jum'at"){
    echo "Jum'at : <br>";
    echo "Hari Ini, Silahkan Mengenakan Seragam Gamis";
} else if ($hari == "Sabtu"){
    echo "Sabtu : <br>";
    echo "Hari Ini Libur";
} else if ($hari == "Minggu"){
    echo "Minggu : <br>";
    echo "Hari Ini Masih Libur";
}