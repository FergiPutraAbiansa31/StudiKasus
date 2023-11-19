<?php
include '../../koneksi.php';

if (isset($_POST['tambah'])) {
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO kategori (kategori) VALUES ('$kategori')";
    
    if (mysqli_query($conn, $query)) {
        header('Location: kategori.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
