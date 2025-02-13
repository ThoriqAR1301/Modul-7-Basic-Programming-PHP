<?php

echo "<hr>";
echo "<center><h3>Array's Task</h3></center>";
echo "<hr>";

$siswa = [
    ["Nama" => "Thoriq", "Nilai" => 85],
    ["Nama" => "Reza", "Nilai" => 60],
    ["Nama" => "Sandi", "Nilai" => 45],
    ["Nama" => "Remi", "Nilai" => 72],
    ["Nama" => "Ringga", "Nilai" => 0]
];

echo "<center><h4>Daftar Nilai Siswa</h4></center";
echo "<center><table border = '1' cellpadding = '5' cellspacing = '0'></center>";
echo "<tr><th>Nama</th><th>Nilai</th><th>Status</th></tr>";

foreach ($siswa as $s){
    echo "<tr>";
    echo "<td>" . $s['Nama'] . "</td>";
    echo "<td>" . $s['Nilai'] . "</td>";

    if ($s ['Nilai'] >= 70){
        $status = "<span style ='color:Green;'>Lulus</span>";
    } elseif ($s ['Nilai'] >= 50){
        $status = "<span style ='color:Orange;'>Remedial</span>";
    } elseif ($s ['Nilai'] >= 0 && $s ['Nilai'] <= 50){
        $status = "<span style ='color:Red;'>Tidak Lulus</span>";
    } elseif ($s ['Nilai'] == 0){
        $status = "<span style ='color:Black;'>Alpa</span>";
    }

    echo "<td>" . $status . "</td>";
    echo "</tr>";
}

echo "</table>";