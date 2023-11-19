<?php
include('../../koneksi.php');

$id_merk = $_POST['id_merk'];

$nama_merk = $_POST['nama_merk'];

$query = "UPDATE merk SET nama_merk = '$nama_merk' WHERE id_merk = $id_merk";

if (mysqli_query($conn, $query)) {
    header("location: merk.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>