<?php
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
   
    $id_kategori = $_POST['id_kategori'];

    $updateQuery = "UPDATE sepatu SET id_kategori = NULL WHERE id_kategori = $id_kategori";
    if (mysqli_query($conn, $updateQuery)) {
        $deleteQuery = "DELETE FROM kategori WHERE id_kategori = $id_kategori";
        if (mysqli_query($conn, $deleteQuery)) {
            header("location: kategori.php");
        } else {
            echo "Data Gagal Hapus!";
        }
    } else {
        echo "Gagal menghapus asosiasi";
    }
} else {
    echo "Invalid request";
}
?>
