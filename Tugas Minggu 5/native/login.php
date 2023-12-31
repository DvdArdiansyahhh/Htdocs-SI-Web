<?php
require('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $emailCheck = mysqli_real_escape_string($koneksi, $email);
        $passCheck = mysqli_real_escape_string($koneksi, $pass);

        $query = "SELECT * FROM user_detail WHERE user_email = '$emailCheck'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_array($result);
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
            $level = $row['level'];

            if ($userVal == $emailCheck && $passVal == $passCheck) {
                session_start(); // Inisialisasi sesi di sini
                $_SESSION['user_fullname'] = $userName; // Tetapkan nama pengguna ke dalam sesi
                $_SESSION['user_level'] = $level; // Tetapkan level pengguna ke dalam sesi
                if ($level === '1') {
                    header("Location: home.php");
                } elseif ($level === '2') {
                    header("Location: home2.php");
                } else {
                    echo "Level pengguna tidak valid.";
                }
                exit; // tambahkan ini untuk menghentikan eksekusi kode setelah melakukan redirect
            } else {
                $error = 'User atau password salah!!';
            }
        } else {
            $error = 'User tidak ditemukan!!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }

    if (isset($error)) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header custom-header">Login</div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Masukkan email Anda">
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password:</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" placeholder="Masukkan password Anda">
                            </div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary mb-3" name="submit">Log In</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Belum punya akun? <a href="register.php">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>