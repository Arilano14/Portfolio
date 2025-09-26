<?php
session_start();

if (isset($_COOKIE['user_login']) && !isset($_SESSION['login_status'])) {
    $_SESSION['username'] = $_COOKIE['user_login'];
    $_SESSION['login_status'] = true;
    header('Location: index.php');
    exit();
}

if (isset($_SESSION['login_status'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-page-container">
        <div class="row g-0"> <div class="col-md-6 d-flex align-items-center justify-content-center p-4 left-section">
                <div class="content-wrapper">
                    <h1 class="display-4 mb-2">Hello, I am 👋</h1>
                    <h2 class="display-2 name-highlight mb-4">Arilano Excelovell Pinem</h2>

                    <div class="login-box-custom mt-5">
                        <?php
                            if(isset($_GET['error'])) {
                                echo '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>';
                            }
                        ?>
                        <form action="proses_login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username (Nama Depan)</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password (NIM)</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
                <div class="shape circle-sm green"></div>
                <div class="shape circle-md orange"></div>
                <div class="shape square-sm lightblue"></div>
                <div class="shape triangle-md blue"></div>
            </div>

            <div class="col-md-6 d-none d-md-flex align-items-end justify-content-center right-section" style="background-image: url('img/arilano.png'); background-size: cover; background-position: center;">
                <div class="shape circle-lg white"></div>
                <div class="shape square-lg pink"></div>
                <div class="shape triangle-sm yellow"></div>
            </div>
        </div>
    </div>
</body>
</html>