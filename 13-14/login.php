<?php
require('koneksi.php');
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['txt_email']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['txt_pass']);

    if (!empty(trim($email)) && !empty(trim($pass))) {
        // Pilih data berdasarkan email dari database
        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_array($result);
            $passVal = $row['user_password'];

            if ($email == $row['user_email'] && $passVal == $pass) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_email'] = $email;
                $_SESSION['user_fullname'] = $row['user_fullname'];
                $_SESSION['level'] = $row['level'];
                $user_fullname = $_SESSION['user_fullname'];
                header("Location: home.php?user_fullname=$user_fullname");
                exit();
            
            } else {
                $error = 'Email atau password salah!!';
                header('Location: login.php?error=' . urlencode($error));
            }
        } else {
            $error = 'User tidak ditemukan!!';
            header('Location: login.php?error=' . urlencode($error));
        }
    } else {
        $error = 'Data tidak boleh kosong !!!';
        header('Location: login.php?error=' . urlencode($error));
    }
} elseif (isset($_POST['register'])) {
    header('Location: register.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <form action="login.php" method="post">
        <h2>Login</h2>
        <input type="text" name="txt_email" placeholder="Email">
        <input type="password" name="txt_pass" placeholder="Password">
        <button type="submit" name="submit">Sign In</button>
        <div class="register-link">
            <a href="register.php">Register</a>
        </div>
    </form>
</div>
</body>
</html>
