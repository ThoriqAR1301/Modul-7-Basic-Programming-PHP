<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hasil Akhir Siswa</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-stone-300 flex items-center justify-center min-h-screen">

    <?php
    $bilangan1 = "";
    $bilangan2 = "";
    $hasil = "";
    $operasi = "";

    if (isset($_POST['hitung'])){
        $bilangan1 = $_POST['bil1'];
        $bilangan2 = $_POST['bil2'];
        $operasi = $_POST['operasi'];
    }

    switch ($operasi){
        case 'plus':
            $hasil = $bilangan1 + $bilangan2;
            break;
        case 'minus':
            $hasil = $bilangan1 - $bilangan2;
            break;
        case 'multi':
            $hasil = $bilangan1 * $bilangan2;
            break;
        case 'divid':
            $hasil = $bilangan1 / $bilangan2;
            break;
    }
    ?>

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center">KALKULATOR</h2>
        
        <form action="" method="POST">
            <input type="text" name="bil1" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-5" autocomplete="off" placeholder="Masukkan Bilangan Pertama" value="<?php echo $bilangan1; ?>">
            <input type="text" name="bil2" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-2" autocomplete="off" placeholder="Masukkan Bilangan Kedua" value="<?php echo $bilangan2; ?>">
            <select name="operasi" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-2">
                <option value="plus"> + </option>
                <option value="minus"> - </option>
                <option value="multi"> * </option>
                <option value="divid"> / </option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="w-full p-3 mb-4 bg-violet-500 text-white rounded-md mt-2 hover:bg-purple-500 cursor-pointer transition duration-500">
            <input type="text" name="hasil" class="w-full p-3 mb-4 border border-gray-300 rounded-md mt-2" autocomplete="off" placeholder="Hasil Bilangan" readonly value="<?php echo $hasil; ?>">
        </form>
    </div>
</body>
</html>