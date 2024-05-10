<?php
session_start();

require_once 'dbkoneksi.php';

$usernameErr = $passwordErr = $authenticationErr = '';
$username = $password = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $authenticated = false;

    if (!$usernameErr && !$passwordErr) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $query = $dbh->query($sql);
        $user = $query->fetchObject();
        
        if ($user) {
            if ($user->username === $username && $user->password === $password) {
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $user->name;
                $_SESSION['role'] = $user->role;
                $authenticated = true;
            }
        }
    }

    if ($authenticated) {
        header("Location: revindex.php");
    } else {
        $authenticationErr = 'Username atau Password salah!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In || Puskesmas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
</style>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <p class="h1"><b>Masuk Akun</b></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Masuk untuk memulai Sesi Anda</p>

                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
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
                    <button type="submit" class="btn btn-danger btn-block">Masuk</button>
                    <span class="d-block text-red text-center mt-1"><?= $authenticationErr ?></span>
                </form>

                <p class="mb-0 mt-1 text-center">
                    Belum punya akun? <a href="register.php" class="text-center">Buat akun disini</a>
                </p>
            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>
</html>