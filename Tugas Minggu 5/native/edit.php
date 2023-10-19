<?php
require('koneksi.php');
if (isset($_POST['update'])) {
    $userId = $_POST['txt_id'];
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id='$userId'";
    echo $query;
    $result = mysqli_query($koneksi, $query);

    $_SESSION['user_fullname'] = $userName;

    session_write_close();

    header('Location: home.php');
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM user_detail WHERE id='$id'";
$result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $userMail = $row['user_email'];
    $userPass = $row['user_password'];
    $userName = $row['user_fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form action="edit.php" method="POST">
            <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="txt_email">Email:</label>
                <input type="text" class="form-control" id="txt_email" name="txt_email" value="<?php echo $userMail; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="txt_pass">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="txt_pass" name="txt_pass" value="<?php echo $userPass; ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-eye-slash" id="togglePassword"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_nama">Nama:</label>
                <input type="text" class="form-control" id="txt_nama" name="txt_nama" value="<?php echo $userName; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
        <p><a href="home.php">Kembali</a></p>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordField = $('#txt_pass');
                const fieldType = passwordField.attr('type');

                if (fieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#togglePassword').removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $('#togglePassword').removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
<?php
} ?>