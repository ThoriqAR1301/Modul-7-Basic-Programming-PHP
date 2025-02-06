<?php

echo "Studi Kasus 2";
echo "<hr>";

$belanja = 1500000; // Terserah
$status = ""; // Member Gold, Member Silver, & Non-Member

if ($belanja <= 1000000) {
    $diskon = 10;
} else if ($belanja >= 1000000 && $belanja <= 1499999) {
    $diskon = 15;
} else if ($belanja >= 1500000) {
    $diskon = 20;
}

if ($status == "Member Gold"){
    $diskon = $diskon + 5;
} else {
    $pajak = $pajak + 0;
}