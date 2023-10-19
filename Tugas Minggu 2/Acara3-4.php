<!-- Autentikasi Penguuna -->
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = "user123";
    $password = "password123";

    if ($_POST['user123'] == $username && $_POST['password123'] == $password) {
        echo "Selamat datang, $username!";
    } else {
        echo "Nama pengguna atau kata sandi salah.";
    }
} else {
    echo "Form login belum diisi.";
}
?>



<!-- Diskon Belanja -->
<!-- <?php
$totalBelanja = 500000;
$diskon = 0;

if ($totalBelanja >= 500000) {
    $diskon = 10;
} elseif ($totalBelanja >= 300000) {
    $diskon = 5;
}

echo "Anda mendapatkan diskon $diskon% untuk total belanja sebesar $totalBelanja.";
?> -->


<!-- Pengelompokan Produk -->
<!-- <?php
$kategori = "Elektronik";

if ($kategori == "Elektronik") {
    echo "Lihat produk elektronik.";
} elseif ($kategori == "Pakaian") {
    echo "Lihat koleksi pakaian.";
} else {
    echo "Kategori tidak ditemukan.";
}
?> -->


<!-- Metode Pembayaran -->
<!-- <?php
$metodePembayaran = "Kartu Kredit";

if ($metodePembayaran == "Kartu Kredit") {
    echo "Pilih jenis kartu kredit.";
} elseif ($metodePembayaran == "Transfer Bank") {
    echo "Transfer pembayaran ke rekening bank kami.";
} else {
    echo "Metode pembayaran tidak valid.";
}
?> -->


<!-- Pengiriman Barang -->
<!-- <?php
$lokasiPengiriman = "Jakarta";
$beratBarang = 2; // dalam kilogram

if ($lokasiPengiriman == "Jakarta") {
    if ($beratBarang <= 1) {
        echo "Pengiriman via kurir same-day.";
    } else {
        echo "Pengiriman via kurir reguler.";
    }
} elseif ($lokasiPengiriman == "Luar Jakarta") {
    echo "Pengiriman via ekspedisi.";
} else {
    echo "Lokasi pengiriman tidak valid.";
}
?> -->
