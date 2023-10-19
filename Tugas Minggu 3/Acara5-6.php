<!-- Acara 5 -->

<!-- Menentukan Bil Terbesar -->
<!-- <?php
function bilanganTerbesar($a, $b) {
    if ($a > $b) {
        return $a;
    } else {
        return $b;
    }
}

$bilangan1 = 60;
$bilangan2 = 85;
$terbesar = bilanganTerbesar($bilangan1, $bilangan2);
echo "Bilangan terbesar antara $bilangan1 dan $bilangan2 adalah: $terbesar";
?> -->

<!-- Menampilkan Tanggal, bulan, dan Tahun sekarang dengan fungsi getdate() -->
<!-- <?php
$sekarang = getdate();
$tanggal = $sekarang["mday"];
$bulan = $sekarang["mon"];
$tahun = $sekarang["year"];

echo "Sekarang Tanggal: $tanggal-$bulan-$tahun";
?> -->

<!-- Menampilkan Tanggal, bulan dan Tahun sekarang dengan fungsi date ('d-F-Y') -->
<!-- <?php
$tanggalSekarang = date('d-F-Y');
echo "Sekarang Tanggal: $tanggalSekarang";
?> -->


<!-- Acara 6 -->
<!-- Array Basic (Matriks) -->
<?php
// Matriks A
$A = array(
    array(1, 1, 1),
    array(2, 2, 2),
    array(3, 3, 3)
);

// Matriks B
$B = array(
    array(3, 3, 3),
    array(2, 2, 2),
    array(1, 1, 1)
);

// Inisialisasi matriks hasil
$hasil = array();

// Menampilkan matriks A (array 1)
echo "Array 1 (Matriks A):<br>";
echo "<table border='1'>"; // Menambahkan garis pembatas
for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $A[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>"; // Tutup tabel

// Menampilkan matriks B (array 2)
echo "<br>Array 2 (Matriks B):<br>";
echo "<table border='1'>";
for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $B[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
// Menjumlahkan matriks A dan B
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $hasil[$i][$j] = $A[$i][$j] + $B[$i][$j];
    }
}

// Menampilkan hasil penjumlahan matriks
echo "<br>Hasil Penjumlahan Matriks A dan B:<br>";
echo "<table border='1'>"; // Tambahkan garis pembatas
for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $hasil[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>"; // Tutup tabel
?>