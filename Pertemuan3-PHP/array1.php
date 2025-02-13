<?php

echo "<hr>";
echo "<center><h3>Array's Index</h3></center>";
echo "<hr>";

// 1. Definisi Array
// Index 0 = Laptop, 1 = Mouse, 2 = Keyboard
$produk = ["Laptop", "Mouse", "Keyboard"];
echo $produk[0] . "<br>";
echo $produk[1] . "<br>";
echo $produk[2] . "<br>";

// 2. Array Assosiatif
// Kunci => Nilai

echo "<hr>";
echo "<center><h3>Associative's Array</h3></center>";
echo "<hr>";

$buah = [
    "Nama" => "Apel",
    "Warna" => "Merah",
    "Rasa" => "Manis"
];

echo "<h4>First's Product List</h4>";
echo "Nama Buah : " . $buah['Nama'] . "<br>";
echo "Warna Buah : " . $buah['Warna'] . "<br>";
echo "Rasa Buah : " . $buah['Rasa'] . "<br>";
echo "<br>";

$produk2 = [
    ["Nama" => "Laptop", "Harga" => 7000000, "Stok" => 10],
    ["Nama" => "Mouse", "Harga" => 1000000, "Stok" => 5],
    ["Nama" => "Monitor", "Harga" => 15000000, "Stok" => 4]
];

echo "<h4>Second's Product List</h4>";

foreach ($produk2 as $pr){
    echo "<hr> Nama Produk : " . $pr['Nama'] . ", Harga : Rp. " . number_format ($pr['Harga'],0,",",".") . ", Stok : " . $pr['Stok'] . "<br> <hr>";
}

// Output
// Nama Produk : Laptop, Harga : Rp. 7.000.000, Stok : 10
// Nama Produk : Mouse, Harga : Rp. 1.000.000, Stok : 5
// Nama Produk : Monitor, Harga : Rp. 15.000.000, Stok : 4