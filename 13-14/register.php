<?php
require ('koneksi.php');
if (isset($_POST['register'])){
    $userMail    = $_POST['txt_email'];
    $userName    = $_POST['txt_nama'];
    $userPass    = $_POST['txt_pass'];

    $query  = "INSERT INTO user_detail VALUES ('', $userMail, $userPass, $userName, 2)";
    $result = mysqli_query($koneksi, $query);

    if($result){
        header('Location: login.php');
    } else {
        echo 'Registrasi Gagal!';
    }
    
}
?>

<html>
<head>
  <title>Halaman Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <form action="register.php" method="post">
        <h2>Register</h2>
        <input type="text" name="txt_email" placeholder="Email">
        <input type="password" name="txt_pass" placeholder="Password">
        <input type="text" name="txt_nama" placeholder="Nama">
        <button type="submit" name="register">Register</button>
        <div class="register-link">
            <a href="login.php">Login</a>
        </div>
    </form>
</div>
</body>
</html>