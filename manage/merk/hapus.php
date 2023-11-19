<?php
include '../../koneksi.php';

$id_merk = $_POST['id_merk'];

$updateQuery = "UPDATE sepatu SET id_merk = NULL WHERE id_merk = $id_merk";

if (mysqli_query($conn, $updateQuery)) {
    $deleteQuery = "DELETE FROM merk WHERE id_merk = $id_merk";
    if (mysqli_query($conn, $deleteQuery)) {
        header("location: merk.php");
    } else {
        echo "Data Gagal Hapus!";
    }
} else {
    echo "Gagal menghapus";
}
?>