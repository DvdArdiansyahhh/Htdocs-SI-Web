<?php
require('koneksi.php');
require('query.php');
$obj = new crud;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>
<body>
    <div>
        <h1>Selamat Datang</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Fitur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $obj->lihatData();
                $no = 1;
                if ($data->rowCount() > 0) {
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['user_fullname']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                <?php
                        $no++;
                    }
                } ?>
            </tbody>
        </table>
        <a href="login.php">Logout</a>
    </div>
</body>

</html>