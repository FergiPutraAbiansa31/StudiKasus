<?php
include '../../koneksi.php';

$id_ukuran = $_POST['id_ukuran'];

$updateQuery = "UPDATE sepatu SET id_ukuran = NULL WHERE id_ukuran = $id_ukuran";

if (mysqli_query($conn, $updateQuery)) {
    $deleteQuery = "DELETE FROM ukuran WHERE id_ukuran = $id_ukuran";
    if (mysqli_query($conn, $deleteQuery)) {
        header("location: ukuran.php");
    } else {
        echo "Data Gagal Hapus!";
    }
} else {
    echo "Gagal menghapus";
}
?>