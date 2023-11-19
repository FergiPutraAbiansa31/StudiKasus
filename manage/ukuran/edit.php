<?php
include('../../koneksi.php');

$id_ukuran = $_POST['id_ukuran'];

$no_ukuran = $_POST['no_ukuran'];

$query = "UPDATE ukuran SET no_ukuran = '$no_ukuran' WHERE id_ukuran = $id_ukuran";

if (mysqli_query($conn, $query)) {
    header("location: ukuran.php");
} else {
    echo "Data Gagal Diupdate!";
}
?>