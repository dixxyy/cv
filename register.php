<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Escape input pengguna untuk keamanan
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "Registrasi berhasil!";
        // Anda dapat mengarahkan pengguna ke halaman lain setelah registrasi berhasil jika diperlukan.
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Registration Form | Dixxy.co</title>
</head>
<body>
    <div class="container-fluid">
        <div class="position-relative">
            <div class="box">
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="wrapper">
                            <div class="form-box register">
                                <div class="row text-center mb-1">
                                    <h2>Sign Up</h2>
                                </div>
                                <form method="post" action="register.php">
                                    <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Type your username" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Type your password" required />
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <p>I agree to the <a href="#" class="services">terms & conditions</a></p>
                                        </label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-outline-dark mb-2 my-button">Sign Up</button>
                                    </div>
                                    <div class="login-register">
                                        <p>Already have an account? <a href="login.php" class="register-link">Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
