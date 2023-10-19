<?php
session_start();
require ('koneksi.php');

if (!isset($_SESSION['user_fullname'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['user_fullname'];

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home2.css">
    <title>Home</title>
</head>
<body>
    <div class="content-container">
    <div class="atom">
        <div class="line line-1"></div>
        <div class="line line-2"></div>
        <div class="line line-3"></div>
    </div>
    <h1 class="welcome">Selamat Datang <?php echo $email; ?> !!! </h1>
    <form method="post">
        <button class="logout-btn" type="submit" name="logout">Logout</button>
    </form>
    </div>
</body>
</html>