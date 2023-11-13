<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CV Page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
    background: lightblue;
}

#cv {
  background: lightblue;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding-top: 120px;
  padding-bottom: 20px;
}

#cv .container {
  position: relative;
  width: 100%;
  max-width: 1000px;
  min-height: 1000px;
  background: #fff;
  display: grid;
  grid-template-columns: 1fr 2fr;
}

#cv .container .left_side {
  position: relative;
  background: #003147;
  padding: 40px;
}

#cv .container .right_side {
  position: relative;
  background: #fff;
  padding: 40px;
}

.profileText {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.imgCuy {
  width: 100%;
  height: auto;
  max-width: 100%;
  border-radius: 50%;
}

.profileText h2 {
  color: white;
  font-size: 1.5em;
  margin-top: 20px;
  text-transform: uppercase;
  text-align: center;
  font-weight: 600;
  line-height: 1.4em;
}

.about h2 {
  color: #003147;
  font-size: 2.5em;
  font-weight: 600;
}

.titleBio {
  font-weight: 600;
}

footer {
  background-color: lightblue;
}

footer .row {
  justify-content: center;
  font-weight: 600;
  text-align: center;
}

    </style>

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
</head>
<body style="background-color: lightblue">

<nav class="navbar bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: white">Curriculum Vitae</a>
        <form class="d-flex" role="search">
            <a href="login.php" class="btn btn-primary" type="button">Login</a>
        </form>
    </div>
</nav>

<section id="cv">
    <div class="container">
        <?php
include 'config.php';

        // Ambil data dari database
        $query = "SELECT * FROM cv_data";
        $result = mysqli_query($conn, $query);

        // Tampilkan data
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="left_side">
                <div class="profileText">
                    <div class="imgBx">
                        <img src="<?php echo $row['foto_path']; ?>" alt="profil" class="imgCuy"/>
                    </div>
                    <h2>
                        <?php echo $row['nama']; ?><br/>
                    </h2>
                </div>
            </div>
            <div class="right_side">
                <div class="about">
                    <h2 class="aboutProfile">Profile</h2>
                </div>
                <div class="biodata pt-3">
                    <h5 class="titleBio">Alamat</h5>
                    <p><?php echo $row['alamat']; ?></p>

                    <h5 class="titleBio">Telepon</h5>
                    <p><?php echo $row['telepon']; ?></p>

                    <h5 class="titleBio">Email</h5>
                    <p><?php echo $row['email']; ?></p>

                    <h5 class="titleBio">Website</h5>
                    <p><?php echo $row['web']; ?></p>

                    <h5 class="titleBio">Pendidikan</h5>
                    <p><?php echo $row['pendidikan']; ?></p>

                    <h5 class="titleBio">Keterampilan</h5>
                    <p><?php echo $row['keterampilan']; ?></p>

                    <!-- Tambahkan bagian PHP untuk bagian-bagian lainnya sesuai kebutuhan -->
                </div>
            </div>
            <?php
        }

        // Tutup koneksi database
        mysqli_close($conn);
        ?>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
