<?php
include '../../koneksi.php';

if (isset($_POST['hapus'])) {
    $id_sepatu = $_POST['id_sepatu'];

    // Delete data from the database
    $delete_query = mysqli_query($conn, "DELETE FROM sepatu WHERE id_sepatu = '$id_sepatu'");

    if ($delete_query) {
        // Redirect to the manage.php page after successful deletion
        header("Location: sepatu.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
