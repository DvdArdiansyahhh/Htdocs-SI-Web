<?php
session_start();
require ('koneksi.php');

// Periksa apakah pengguna telah login sebelumnya
if (!isset($_SESSION['user_fullname'])) {
    header("Location: login.php");
    exit;
}

$userLevel = $_SESSION['user_level'];

// Periksa level pengguna dan arahkan sesuai level
if ($userLevel === '1') {
    $email = $_SESSION['user_fullname'];
} elseif ($userLevel === '2') {
    header("Location: home2.php");
} else {
    echo "Level pengguna tidak valid.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary 
        sidebar sidebar-dark accordion" id="accordionSidebar">
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light 
                bg-white topbar mb-4 static-top shadow">
                    <!-- Tambahkan konten navbar di sini -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Selamat Datang
                        <?php echo $_SESSION['user_fullname']; ?></h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Email</th>
                                <th>Nama</th>
                                <th>Action</th> <!-- Kolom untuk tombol Edit dan Hapus -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM user_detail";
                            $result = mysqli_query($koneksi, $query);
                            $no = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $userMail = $row['user_email'];
                                $userName = $row['user_fullname'];
                            ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $no; ?></td>
                                    <td><?php echo $userMail; ?></td>
                                    <td><?php echo $userName; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-primary btn-sm">Edit</a>
                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" 
                                        class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script Bootstrap di sini (JQuery, Popper.js, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>