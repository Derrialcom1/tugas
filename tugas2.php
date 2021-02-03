<?php

$content = file_get_contents("barang.json");
$result = json_decode($content, true);

echo "<h1>Toko Online A Lagi Ada Flash Sale!!! Mampir Kuy!!</h1>";

foreach ($result as $value) {
    $hargaAsli =  $value['hargaBarang'];
    if ($value['jenisBarang'] == "Elektronik") {
        $diskonElektro = $value['hargaBarang'] * 70 / 100;
        $value['hargaBarang'] = " $hargaAsli diskon 30% menjadi $diskonElektro";
    }
    if ($value['jenisBarang'] == "Makanan") {
        $diskonMakanan = $value['hargaBarang'] * 90 / 100 - 10000;
        $value['hargaBarang'] = "$hargaAsli diskon 10% plus 10.000 menjadi $diskonMakanan";
    }
    if ($value['jenisBarang'] == "Pakaian") {
        if ($value['hargaBarang'] >= 200000) {
            $diskonPakaian = $value['hargaBarang'] * 80 / 100;
            $value['hargaBarang'] = "$hargaAsli diskon 20% menjadi $diskonPakaian";
        }
    }

    echo "Nama : " . $value['namaBarang'] . "<br>";
    echo "Id : " . $value['kodeBarang'] . "<br>";
    echo "Jenis : " . $value['jenisBarang'] . "<br>";
    echo "Harga : " . $value['hargaBarang'] . "<br>";
    echo "<hr>";
}
?>