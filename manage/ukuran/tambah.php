<?php
include '../../koneksi.php';

if (isset($_POST['tambah'])) {
    $no_ukuran = $_POST['no_ukuran'];

    $query = "INSERT INTO ukuran (no_ukuran) VALUES ($no_ukuran)";
    
    if (mysqli_query($conn, $query)) {
        header('Location: ukuran.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
