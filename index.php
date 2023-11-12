<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Curriculum Vitae</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CV App</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a type="button" href="login.php" class="btn btn-primary" >
                    Login
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center">Curriculum Vitae</h1>
    <?php
    // Sambungkan ke database
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "cv";
    $conn = mysqli_connect($host, $user, $password, $db_name);

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil data dari database
    $query = "SELECT * FROM cv_data";
    $result = mysqli_query($conn, $query);

    // Tampilkan data
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card mt-4">
            <div class="card-header">
                <img src="<?php echo $row['foto_path']; ?>" alt="Foto" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                <h2 class="mt-2"><?php echo $row['nama']; ?></h2>
            </div>
            <div class="card-body">
                <h5>Alamat:</h5>
                <p><?php echo $row['alamat']; ?></p>

                <h5>Telepon:</h5>
                <p><?php echo $row['telepon']; ?></p>

                <h5>Email:</h5>
                <p><?php echo $row['email']; ?></p>

                <h5>Website:</h5>
                <p><?php echo $row['web']; ?></p>

                <h5>Pendidikan:</h5>
                <p><?php echo $row['pendidikan']; ?></p>

                <h5>Keterampilan:</h5>
                <p><?php echo $row['keterampilan']; ?></p>
            </div>
        </div>
        <?php
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
