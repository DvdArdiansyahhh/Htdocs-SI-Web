<html>
<head>
    <title>Halaman Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <?php
    require('koneksi.php');

    if (isset($_POST['update'])) {
        $userId   = $_POST['txt_id'];
        $userMail = $_POST['txt_email'];
        $userName = $_POST['txt_nama'];
        $userPass = $_POST['txt_pass'];

        $query  = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE user_id='$userId'";
        $result = mysqli_query($koneksi, $query);
    
        if ($result) {
            header("Location: home.php?user_fullname=$userName");
            exit;
        } else {
            echo 'Update Gagal!';
        };
    }

    $id     = $_GET['id'];
    $query  = "SELECT * FROM user_detail WHERE user_id='$id'";
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    while ($row = mysqli_fetch_array($result)) {
        $id       = $row['user_id'];
        $userMail = $row['user_email'];
        $userName = $row['user_fullname'];
        $userPass = $row['user_password'];
        ?>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <h2>Edit Profile</h2>
            <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
            <input type="text" name="txt_email" placeholder="Username" value="<?php echo $userMail; ?>"readonly>
            <input type="password" name="txt_pass" placeholder="Password" value="<?php echo $userPass; ?>">
            <input type="text" name="txt_nama" placeholder="Nama" value="<?php echo $userName; ?>">
            <button type="submit" name="update">Update</button>
        </form>
        <?php
    }
    ?>
    <p><a href="home.php">Kembali</a></p>
</div>
</body>
</html>
