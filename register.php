<?php
session_start();
require_once 'dbkoneksi.php';

$nameErr = $usernameErr = $passwordErr = $konfPassErr = $authenticationErr = '';
$name = $username = $password = $konfPass = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = 'nama tidak boleh kosong!';
    } else {
        $name = test_input($_POST['name']);
    }
    if (empty($_POST['username'])) {
        $usernameErr = 'Username tidak boleh kosong!';
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password tidak boleh kosong!';
    } else {
        $password = md5(test_input($_POST['password']));
    }
    if (empty($_POST['konfirmasi-password'])) {
        $konfPassErr = 'Konfirmasi Password tidak boleh kosong!';
    } else {
        $konfPass = test_input($_POST['konfirmasi-password']);
        if ($password !== md5($konfPass)) {
            $konfPassErr = 'Konfirmasi password harus sesuai';
        }
    }

    if (!$nameErr && !$usernameErr && !$passwordErr && !$konfPassErr) {
        $sql = "SELECT * FROM user WHERE username = ?";
        $query = $dbh->prepare($sql);
        $query->execute([$username]);
        $user = $query->fetchObject();

        if ($user) {
            $authenticationErr = 'Username sudah dipakai';
        } else {
            $sql = "INSERT INTO user (username, name, password) VALUES (?, ?, ?)";
            $query = $dbh->prepare($sql);
            $query->execute([$username, $name, $password]);
            header("location: login.php");
            exit();
        }
    } else {
        $authenticationErr = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi || Puskesmas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
</style>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <p class="h1"><b>Registrasi Akun Puskesmas</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Buat Akun Puskesmas Anda!</p>

                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="mb-3">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $nameErr ?></span>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $usernameErr ?></span>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $passwordErr ?></span>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input name="konfirmasi-password" type="password" class="form-control" placeholder="Konfirmasi Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $konfPassErr ?></span>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Buat Akun</button>
                    <span class="d-block text-red text-center mt-1"><?= $authenticationErr ?></span>
                </form>

                <p class="mb-0 mt-1 text-center">
                    <a href="login.php" class="d-block text-center mt-1">Masuk ke Akun yang Sudah Ada</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>