<?php
include('../../koneksi.php');

$id_kategori = $_POST['id_kategori'];

$kategori = $_POST['kategori'];

$query = "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = $id_kategori";

if (mysqli_query($conn, $query)) {
    header("location: kategori.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>