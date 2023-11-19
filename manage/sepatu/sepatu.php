<?php
include '../../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM sepatu 
    LEFT JOIN ukuran ON sepatu.id_ukuran = ukuran.id_ukuran
    LEFT JOIN merk ON sepatu.id_merk = merk.id_merk
    LEFT JOIN kategori ON sepatu.id_kategori = kategori.id_kategori");
$kategoris = mysqli_query($conn, "SELECT * FROM kategori");
$merks = mysqli_query($conn, "SELECT * FROM merk");
$ukurans = mysqli_query($conn, "SELECT * FROM ukuran");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="stylesheet" href="../../assets/css/style.css">


    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../../assets/css/fontawesome.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="../../index.php">
                Shoes Shop
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../manage.php">Manage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row" style="height: 1600px;">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block  sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="../../manage.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sepatu.php">
                                Sepatu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../merk/merk.php">
                                Merk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../kategori/kategori.php">
                                Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ukuran/ukuran.php">
                                Ukuran
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page Content  -->
            <main class="col-md-12 ms-sm-auto col-lg-10">
                <div class="container-fluid" style="margin-top: 50px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    DATA SEPATU
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah" style="margin-bottom: 10px">TAMBAH DATA</button>
                                    <table class="table table-bordered text-center" id="myTable" >
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th scope="col">GAMBAR</th>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">HARGA</th>
                                                <th scope="col">DESKRIPSI</th>
                                                <th scope="col">STOK</th>
                                                <th scope="col">KATEGORI</th>
                                                <th scope="col">MERK</th>
                                                <th scope="col">NO</th>
                                                <th scope="col">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><img src="../../image/<?php echo $row['img']; ?>" class="img-thumbnail" alt="Sepatu Image" style="max-width: 100px;"></td>
                                                    <td><?php echo $row['nama_sepatu'] ?></td>
                                                    <td>Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                                    <td><?php echo $row['deskripsi'] ?></td>
                                                    <td><?php echo $row['stok'] ?></td>
                                                    <td><?php echo $row['kategori'] ?></td>
                                                    <td><?php echo $row['nama_merk'] ?></td>
                                                    <td><?php echo $row['no_ukuran'] ?></td>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" name="edit" data-target="#edit<?= $no ?>">EDIT</a>
                                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" name="hapus" data-target="#hapus<?= $no ?>">HAPUS</a>
                                                    </td>
                                                </tr>
                                                <!-- Modal Edit -->
                                                <div id="edit<?= $no ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Data Sepatu</h5>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <form action="edit.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_sepatu" value="<?= $row['id_sepatu'] ?>">
                                                                <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="nama_sepatu">Nama Sepatu</label>
                                                                        <input type="text" name="nama_sepatu" class="form-control" id="nama_sepatu" value="<?= $row['nama_sepatu'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="harga">Harga</label>
                                                                        <input type="number" name="harga" class="form-control" id="harga" value="<?= $row['harga'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="deskripsi">Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi" rows="4" required><?php echo $row['deskripsi']; ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="stok">Stok</label>
                                                                        <input type="number" name="stok" class="form-control" id="stok" value="<?= $row['stok'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="id_kategori">Kategori</label>
                                                                        <select class="form-control" name="id_kategori">
                                                                            <?php foreach ($kategoris as $kategori) { ?>
                                                                                <option value="<?php echo $kategori['id_kategori'] ?>" <?php if ($kategori['id_kategori'] == $row['id_kategori']) echo 'selected'; ?>>
                                                                                    <?php echo $kategori['kategori'] ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="id_merk">Merk</label>
                                                                        <select class="form-control" name="id_merk">
                                                                            <?php foreach ($merks as $merk) { ?>
                                                                                <option value="<?php echo $merk['id_merk'] ?>" <?php if ($merk['id_merk'] == $row['id_merk']) echo 'selected'; ?>>
                                                                                    <?php echo $merk['nama_merk'] ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="id_ukuran">No Ukuran</label>
                                                                        <select class="form-control" name="id_ukuran">
                                                                            <?php foreach ($ukurans as $ukuran) { ?>
                                                                                <option value="<?php echo $ukuran['id_ukuran'] ?>" <?php if ($ukuran['id_ukuran'] == $row['id_ukuran']) echo 'selected'; ?>>
                                                                                    <?php echo $ukuran['no_ukuran'] ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="img">Gambar</label>
                                                                        <input type="file" name="img" class="form-control-file" id="img" accept="image/*" name="img" value="<?php echo $row['img']?>">
                                                                        <small class="form-text text-muted">Upload an image for the sepatu.</small>
                                                                        <div id="image-preview" class="mt-2" style="display: none;">
                                                                            <img id="preview" class="img-thumbnail" alt="Image Preview">
                                                                            <p id="image-name"></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                                        <input type="submit" class="btn btn-success" name="tambah" value="simpan"></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Edit Akhir -->
                                                <!-- Modal Hapus -->
                                                <div id="hapus<?= $no ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data Merk</h5>
                                                            </div>
                                                            <form action="hapus.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_sepatu" value="<?= $row['id_sepatu'] ?>">
                                                                <div class="modal-body">
                                                                    <h5 class="text-center"> Apakah Anda Yakin Akan Hapus <br>
                                                                        <span class="text-danger"><?= $row['nama_sepatu'] ?></span>
                                                                    </h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Keluar</button>
                                                                </div>
                                                            </form>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus Akhir -->
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <footer class="footer mt-auto bg-black py-3">
        <div class="container">
            <span class="text-muted">Copyright &copy; 2023 Fergi Putra A.</span>
        </div>
    </footer>

    <!-- Modal Tambah -->
    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Sepatu</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <div class="form-group">
                            <label class="control-label" for="nama_sepatu">Nama sepatu</label>
                            <input type="text" name="nama_sepatu" class="form-control" id="nama_sepatu" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" id="stok" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_kategori">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                <option selected>Pilih Kategori</option>
                                <?php foreach ($kategoris as $kategori) { ?>
                                    <option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_merk">Merk</label>
                            <select class="form-control" name="id_merk">
                                <option selected>Pilih Merk</option>
                                <?php foreach ($merks as $merk) { ?>
                                    <option value="<?php echo $merk['id_merk'] ?>"><?php echo $merk['nama_merk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_ukuran">No Ukuran</label>
                            <select class="form-control" name="id_ukuran">
                                <option selected>Pilih Ukuran</option>
                                <?php foreach ($ukurans as $ukuran) { ?>
                                    <option value="<?php echo $ukuran['id_ukuran'] ?>"><?php echo $ukuran['no_ukuran'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="img">Gambar</label>
                            <input type="file" name="img" class="form-control-file" id="img" accept="image/*" required>
                            <small class="form-text text-muted">Upload an image for the sepatu.</small>
                            <div id="image-preview" class="mt-2" style="display: none;">
                                <img id="preview" class="img-thumbnail" alt="Image Preview">
                                <p id="image-name"></p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-success" name="tambah" value="simpan"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Akhir -->


    <!-- Start Script -->
    <script src="../../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/templatemo.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- End Script -->
</body>

</html>