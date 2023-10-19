<?php
// Kelas Kalkulator untuk melakukan perhitungan
class Kalkulator {
    public function tambah($angka1, $angka2) {
        return $angka1 + $angka2;
    }

    public function kurang($angka1, $angka2) {
        return $angka1 - $angka2;
    }

    public function kali($angka1, $angka2) {
        return $angka1 * $angka2;
    }

    public function bagi($angka1, $angka2) {
        if ($angka2 == 0) {
            return "Tidak dapat dibagi oleh nol.";
        }
        return $angka1 / $angka2;
    }
}

// Kelas AntarmukaKalkulator untuk menampilkan antarmuka pengguna
class AntarmukaKalkulator {
    public function tampilkanForm() {
        echo '<form method="post" action="">';
        echo 'Pilih operasi:<br>';
        echo '<input type="radio" name="operasi" value="tambah"> Penjumlahan<br>';
        echo '<input type="radio" name="operasi" value="kurang"> Pengurangan<br>';
        echo '<input type="radio" name="operasi" value="kali"> Perkalian<br>';
        echo '<input type="radio" name="operasi" value="bagi"> Pembagian<br>';
        echo 'Masukkan angka pertama: <input type="text" name="angka1"><br>';
        echo 'Masukkan angka kedua: <input type="text" name="angka2"><br>';
        echo '<input type="submit" value="Hitung">';
        echo '</form>';
    }

    public function tampilkanHasil($hasil, $operasi) {
        echo "Hasil $operasi adalah: $hasil\n";
    }
}

// Membuat objek kelas Kalkulator
$kalkulator = new Kalkulator();

// Membuat objek kelas AntarmukaKalkulator
$antarmuka = new AntarmukaKalkulator();

// Menampilkan form operasi
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $antarmuka->tampilkanForm();
}

// Menangani input dan perhitungan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operasi = $_POST["operasi"];
    $angka1 = $_POST["angka1"];
    $angka2 = $_POST["angka2"];

    switch ($operasi) {
        case "tambah":
            $hasil = $kalkulator->tambah($angka1, $angka2);
            break;
        case "kurang":
            $hasil = $kalkulator->kurang($angka1, $angka2);
            break;
        case "kali":
            $hasil = $kalkulator->kali($angka1, $angka2);
            break;
        case "bagi":
            $hasil = $kalkulator->bagi($angka1, $angka2);
            break;
        default:
            $hasil = "Pilihan tidak valid.";
            break;
    }

    // Menampilkan hasil perhitungan
    $antarmuka->tampilkanHasil($hasil, $operasi);
}
?>