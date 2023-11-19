-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2023 pada 06.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Sepatu Pria'),
(2, 'Sepatu Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'New Balance'),
(4, 'Reebok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `nama_sepatu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `img`, `nama_sepatu`, `harga`, `deskripsi`, `stok`, `id_kategori`, `id_merk`, `id_ukuran`) VALUES
(1, 'adidas_ub_light.jpg', 'Adidas Ultra Boost', 1000000, 'Adidas Ultra Boost ', 20, 1, 1, 3),
(2, 'samba.jpg', 'Adidas Samba', 1500000, 'Adidas Samba', 20, 2, 1, 2),
(3, 'af_one.jpg', 'Air Force One', 1500000, 'Nike Air Force One', 10, 1, 2, 2),
(4, 'nike_court.jpg', 'Court Legacy', 1500000, 'Nike Court Legacy', 15, 2, 2, 2),
(5, 'reebok_bb4000.jpg', 'BB 4000', 1500000, 'Reebok BB 4000', 20, 1, 4, 3),
(6, 'reebok_glide.jpg', 'Glide Ripple', 1500000, 'Reebok Glide Ripple', 20, 2, 4, 4),
(7, 'nb_574.jpg', 'New Balance 574', 2000000, 'New Balance 574', 10, 1, 3, 5),
(8, 'reebokclub.jpg', 'Reebok Club', 2000000, 'Reebok Club', 10, 1, 4, 2),
(9, 'ultraboost.jpg', 'Adidas Ultra Boost', 2000000, 'Adidas Ultra Boost', 50, 2, 1, 1),
(12, 'zoom_pegasus.jpg', 'Adidas Ultra Boost', 2500000, 'Adidas Ultra Boost', 20, 1, 1, 7),
(13, 'nike_court.jpg', 'Nike Court', 950000, 'Nike Court', 60, 2, 2, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `no_ukuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `no_ukuran`) VALUES
(1, 39),
(2, 40),
(3, 41),
(4, 42),
(5, 43),
(7, 44),
(8, 45);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `sepatu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `sepatu_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `sepatu_ibfk_3` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
