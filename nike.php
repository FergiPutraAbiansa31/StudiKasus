<?php
include 'koneksi.php';
$nikes= mysqli_query($conn, "SELECT id_sepatu, img, nama_sepatu, harga, stok 
    FROM sepatu
    JOIN merk ON sepatu.id_merk = merk.id_merk
    WHERE merk.nama_merk = 'Nike'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Shoes Shop
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage.php">Manage</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <button class="btn btn-outline-success" onclick="location.href='shop.php';">Semua</button>
                            </li>
                            <li class="list-inline-item">
                                <button class="btn btn-outline-success" onclick="location.href='pria.php';">Pria</button>
                            </li>
                            <li class="list-inline-item">
                                <button class="btn btn-outline-success" onclick="location.href='wanita.php';">Wanita</button>
                            </li>
                            <li class="list-inline-item dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" id="brandDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Brands
                                </button>
                                <div class="dropdown-menu" aria-labelledby="brandDropdown">
                                    <a class="dropdown-item link" href="nike.php">Nike</a>
                                    <a class="dropdown-item" href="adidas.php">Adidas</a>
                                    <a class="dropdown-item" href="reebok.php">Reebok</a>
                                    <a class="dropdown-item" href="newbalance.php">New Balance</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($nikes as $nike) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="image/<?= $nike['img']; ?>" width="300" height="360">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="detail.php?id=<?= $nike['id_sepatu']; ?>"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li class="text text-left">Rp <?= number_format($nike['harga'], 0, ',', '.'); ?></li>
                                    </ul>
                                    <a href="detail.php?id=<?= $nike['id_sepatu']; ?>" class="h2 text-decoration-none text-dark"><?= $nike['nama_sepatu']; ?></a>
                                    <p>Stok (<?= $nike['stok']; ?>)</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Shoes Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Jl.Lebdosari XII Semarang
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">0812227151464</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">Sshop@gmail.com</a>
                        </li>
                    </ul>
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Produk</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Sepatu Pria</a></li>
                        <li><a class="text-decoration-none" href="#">Sepatu Wanita</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Info Lanjut</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Home</a></li>
                        <li><a class="text-decoration-none" href="about.php">About</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Shop</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 Fergi Putra A.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>