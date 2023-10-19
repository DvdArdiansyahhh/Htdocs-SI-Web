<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="register.php" method="POST">
                            <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" class="form-control" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_pass">Password:</label>
                                <input type="password" class="form-control" id="txt_pass" name="txt_pass" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_nama">Nama:</label>
                                <input type="text" class="form-control" id="txt_nama" name="txt_nama" required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary" name="register">Register</button>
                                <p class="mb-0"><a href="login.php">Sudah punya akun? Login di sini.</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center"> <!-- Mengubah "justify-content-start" menjadi "justify-content-center" -->
            <div class="col-md-6">
                <p class="mt-3 ml-4"><a href="home.php">Back</a></p> <!-- Mengubah "mt-3 mr-3" menjadi "mt-0" -->
            </div>
        </div>
    </div>
</body>
</html>