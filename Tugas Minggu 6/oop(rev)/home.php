<?php
require('query.php');
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
$crud = new crud(); // Buat objek crud

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <div>
        <h1>Selamat Datang <?php echo $sesName; ?></h1>
        <table border='10'>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Fitur</th>
            </tr>
            <?php
            $data = $crud->lihatData(); // Panggil metode lihatData()
            $no = 1;
            if ($data->rowCount() > 0) {
                while ($row = $data->fetch(PDO::FETCH_ASSOC)) {  ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['user_fullname']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                            <input type="button" value="edit" <?php echo $dis; ?>></a>
                        <a href="hapus.php?id=<?php echo $row['id']; ?>">
                            <input type="button" value="hapus" <?php echo $dis; ?>></a>
                    </td>
                </tr>
                <?php
                $no++;
            }
            } ?>
            </table>
            <p><a href="logout.php">logout</p>
        </div>
    </body>
    </html>