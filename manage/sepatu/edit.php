<?php
include '../../koneksi.php';

if (isset($_POST['tambah'])) {
    // Retrieve data from the form
    $id_sepatu = $_POST['id_sepatu'];
    $nama_sepatu = $_POST['nama_sepatu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];
    $id_merk = $_POST['id_merk'];
    $id_ukuran = $_POST['id_ukuran'];

    // File upload handling
    $img = $_FILES['img'];
    $img_name = $img['name'];
    $img_tmp = $img['tmp_name'];
    $img_size = $img['size'];
    $img_error = $img['error'];

    // Check if the image file is selected
    if ($img_error === 0) {
        $img_destination = "../../image/" . $img_name;
        move_uploaded_file($img_tmp, $img_destination);
    }

    // Update the data in the database
    $update_query = "UPDATE sepatu SET
                        nama_sepatu = '$nama_sepatu',
                        harga = '$harga',
                        deskripsi = '$deskripsi',
                        stok = '$stok',
                        id_kategori = '$id_kategori',
                        id_merk = '$id_merk',
                        id_ukuran = '$id_ukuran',
                        img = '$img_name'
                    WHERE id_sepatu = $id_sepatu";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        // Data updated successfully
        header("Location: sepatu.php");
        exit();
    } else {
        // Error in updating data
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
