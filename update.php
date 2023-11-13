<!DOCTYPE html>
<html>
<head>
    <title>Update CV Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar fixed-top" style="background: #003147">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: white">Curriculum Vitae</a>
        <form class="d-flex" role="search">
            <a href="logout.php" class="btn btn-primary" type="button">Logout</a>
        </form>
    </div>
</nav>

    <div class="container my-4 pt-5">
        <h1>Update CV Data</h1>
        <?php
        // Melakukan koneksi ke database
        $conn = new mysqli("localhost", "root", "", "cv");

        // Melakukan query untuk mengambil data
        $query = "SELECT * FROM cv_data WHERE id = 1"; // Ganti dengan id yang sesuai
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama_dari_database = $row["nama"];
            $alamat_dari_database = $row["alamat"];
            $telepon_dari_database = $row["telepon"];
            $email_dari_database = $row["email"];
            $website_dari_database = $row["web"];
            $pendidikan_dari_database = $row["pendidikan"];
            $keterampilan_dari_database = $row["keterampilan"];
            $foto_path_dari_database = $row["foto_path"];
            $id_dari_database = $row['id'];
            // Mengambil data lainnya
        } else {
            echo "Data CV tidak ditemukan.";
        }

        // Tutup koneksi ke database
        $conn->close();
        ?>

        <form action="process_update.php" method="post">
                <input type="hidden" class="form-control" id="id" name="id" value="1">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat"><?php echo $alamat_dari_database; ?></textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="web">Website:</label>
                <input type="text" class="form-control" id="web" name="web" value="<?php echo $website_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan:</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="keterampilan">Keterampilan:</label>
                <input type="text" class="form-control" id="keterampilan" name="keterampilan" value="<?php echo $keterampilan_dari_database; ?>">
            </div>
            <div class="form-group">
                <label for="foto_path">Foto Path:</label>
                <input type="text" class="form-control" id="foto_path" name="foto_path" value="<?php echo $foto_path_dari_database; ?>">
            </div>
            <!-- Tambahkan form untuk kolom-kolom lainnya di sini -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <footer class="bg-light text-center py-2">
        &copy; 2023 dixxyy. All rights reserved
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
