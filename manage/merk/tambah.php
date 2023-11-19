<?php
include '../../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_merk = $_POST['nama_merk'];

    $query = "INSERT INTO merk (nama_merk) VALUES ('$nama_merk')";
    
    if (mysqli_query($conn, $query)) {
        header('Location: merk.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
