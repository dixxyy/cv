<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; // Ganti 'Username' dengan 'username'
    $password = $_POST['password']; // Ganti 'Password' dengan 'password'

    // Hindari SQL Injection dengan menggunakan parameterized query
    $query = "SELECT * FROM users WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika data ditemukan, set session dan redirect ke halaman lain
        $_SESSION['username'] = $username;
        header("Location: update.php"); // Ganti dengan halaman tujuan setelah login
        exit();
    } else {
        // Jika data tidak ditemukan, tampilkan pesan error
        $error_message = "Username atau password salah!";
    }

    $stmt->close(); // Tutup statement
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login Form | Dixxy.co</title>
</head>
<body>
    <!-- Header Start -->
    <header>
      <div class="container-fluid">
        <h2 class="logo">Dixxy.co</h2>
      </div>
    </header>
    <!-- Header End -->

    <!-- Form Start -->
    <div class="container-fluid">
        <div class="position-relative">
        <div class="box">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="wrapper" style="width: 450px;">
                            <div class="form-box login">
                                <div class="row text-center mb-1" style="font-weight: 300;">
                                  <h2>Login</h2>
                                </div>
                                <?php if (isset($error_message)) echo '<p>' . $error_message . '</p>'; ?>
                                <form method="post" action="login.php">
                                    <!-- Your login form fields here -->
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Type your username" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Type your password" required />
                                    </div>
                                    <div class="form-check mb-2">
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <p>Remember me</p>
                                                </label>
                                            </div>
                                            <div class="col">
                                                <p><a href="#" class="forgot-label">Forgot Password?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-outline-dark mb-2" name="login">Login</button>
                                    </div>
                                    <div class="login-register">
                                        <p>Don't have an account? <a href="register.php" class="login-link">Register</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>