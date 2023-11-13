<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $website = $_POST['web'];
    $pendidikan = $_POST['pendidikan'];
    $keterampilan = $_POST['keterampilan'];
    $foto_path = $_POST['foto_path'];

    // Tambahkan field lainnya sesuai kebutuhan

    // Prepare the statement
    $query = $conn->prepare("UPDATE cv_data SET 
    nama=?, 
    alamat=?, 
    telepon=?, 
    email=?, 
    web=?, 
    pendidikan=?, 
    keterampilan=?,
    foto_path=?
    WHERE id=?");

// Bind parameters
    $query->bind_param("ssssssssi", $nama, $alamat, $telepon, $email, $website, $pendidikan, $keterampilan, $foto_path, $id);

    // Execute the statement
    if ($query->execute()) {
        // Tambahkan parameter update ke URL
        header("Location: index.php?update=success");
    } else {
        echo "Error: " . $query->error;
    }

    // Close the statement
    $query->close();
} else {
    echo "Invalid request.";
}

// Close the connection
$conn->close();
?>
