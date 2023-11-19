<?php
include '../../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_sepatu = $_POST['nama_sepatu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];
    $id_merk = $_POST['id_merk'];
    $id_ukuran = $_POST['id_ukuran'];

    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];
    $img_type = $_FILES['img']['type'];

    $img_path = "../../image/" . $img;

    if (strpos($img_type, 'image') !== false) {
        move_uploaded_file($img_tmp, $img_path);

        $query = "INSERT INTO sepatu (nama_sepatu, harga, deskripsi, stok, id_kategori, id_merk, id_ukuran, img) 
                  VALUES ('$nama_sepatu', $harga, '$deskripsi', $stok, $id_kategori, $id_merk, $id_ukuran, '$img')";

        if (mysqli_query($conn, $query)) {
            header('Location: sepatu.php');
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Invalid file type. Please upload an image.";
    }
}

mysqli_close($conn);
?>
