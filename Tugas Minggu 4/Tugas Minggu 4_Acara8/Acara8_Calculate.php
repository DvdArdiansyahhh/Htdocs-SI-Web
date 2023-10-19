<?php
// Kelas Calculator untuk melakukan perhitungan
class Calculator {
    public function add($num1, $num2) {
        return $num1 + $num2;
    }

    public function subtract($num1, $num2) {
        return $num1 - $num2;
    }

    public function multiply($num1, $num2) {
        return $num1 * $num2;
    }

    public function divide($num1, $num2) {
        if ($num2 == 0) {
            return "Tidak dapat dibagi oleh nol.";
        }
        return $num1 / $num2;
    }
}

// Kelas CalculatorUI untuk menampilkan antarmuka pengguna
class CalculatorUI {
    public function displayForm() {
        echo '<form method="post" action="">';
        echo 'Pilih operasi:<br>';
        echo '<input type="radio" name="operation" value="add"> Penjumlahan<br>';
        echo '<input type="radio" name="operation" value="subtract"> Pengurangan<br>';
        echo '<input type="radio" name="operation" value="multiply"> Perkalian<br>';
        echo '<input type="radio" name="operation" value="divide"> Pembagian<br>';
        echo 'Masukkan angka pertama: <input type="text" name="num1"><br>';
        echo 'Masukkan angka kedua: <input type="text" name="num2"><br>';
        echo '<input type="submit" value="Hitung">';
        echo '</form>';
    }

    public function displayResult($result, $operation) {
        echo "Hasil $operation adalah: $result\n";
    }
}

// Membuat objek kelas Calculator
$calculator = new Calculator();

// Membuat objek kelas CalculatorUI
$ui = new CalculatorUI();

// Menampilkan form operasi
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ui->displayForm();
}

// Menangani input dan perhitungan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation = $_POST["operation"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    switch ($operation) {
        case "add":
            $result = $calculator->add($num1, $num2);
            break;
        case "subtract":
            $result = $calculator->subtract($num1, $num2);
            break;
        case "multiply":
            $result = $calculator->multiply($num1, $num2);
            break;
        case "divide":
            $result = $calculator->divide($num1, $num2);
            break;
        default:
            $result = "Pilihan tidak valid.";
            break;
    }

    // Menampilkan hasil perhitungan
    $ui->displayResult($result, $operation);
}
?>