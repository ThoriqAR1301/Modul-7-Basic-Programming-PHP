<?php

$uts = 100;
$uas = 100;
$tugas = 75;

$status = ""; // Lulus Atau Perbaikan
$grade = ""; // A, B, C

$rata = ($uts + $uas + $tugas) / 3;

if ($rata >= 70 && $rata <= 79) {
    $status = "Perbaikan";
    $grade = "C 😭";
} else if ($rata >= 80 && $rata <= 89) {
    $status = "Lulus";
    $grade = "B 😐";
} else if ($rata >= 90 && $rata <= 100) {
    $status = "Lulus";
    $grade = "A 😍";
} else {
    $status = "-";
    $grade = "-";
}

echo "Nilai UTS = " . $uts . "<br>";
echo "Nilai UAS = " . $uas . "<br>";
echo "Nilai Tugas = " . $tugas . "<br><br>";

echo "Rata-Rata Nilai = " . $rata . "<br>";
echo "Status = " . $status . "<br>";
echo "Grade = " . $grade . "<br>";