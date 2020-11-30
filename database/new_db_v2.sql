-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2020 pada 17.08
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--
CREATE DATABASE /*!32312 IF NOT EXISTS*/`btis` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `btis`;

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `telepon_penerima` varchar(50) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `alamat`, `penerima`, `telepon_penerima`, `id_user`) VALUES
(1, 'Kp. Walahar 1 RT 009/003, Desa Bantarwaru, Kec. Gantar, Kab. Indramayu', 'Andika Permana Sidiq', '62 853 2187 4357', 'user9046'),
(4, 'Jl. Sukajaya Kaler No. 44 RT.05/04, Kel. Cibabat Kec. Cimahi Utara', 'Satou Kazuma', '08888888888', 'user9046'),
(8, 'ABCDEFGH', 'Andika', '12345', 'user5143');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `norek` varchar(150) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `norek`, `atas_nama`) VALUES
(1, 'BRI', '3388 - 01 - 028216 - 53 - 5', 'Pikapikani'),
(3, 'BNI', '0856577142', 'Pikapikani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` char(20) DEFAULT NULL,
  `besar_diskon` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `besar_diskon`, `is_active`) VALUES
(1, '5fb4b08e41896', 20, 1),
(2, '5fb4b06c8b76e', 15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_produk` char(20) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(5, 'Kaos'),
(6, 'Tas Ransel'),
(7, 'Sling Bag'),
(8, 'Bandana'),
(9, 'Waist Bag'),
(10, 'Polo Shirt'),
(11, 'Cover Bag'),
(12, 'Emblem Bordir'),
(13, 'Hoodie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` char(20) DEFAULT NULL,
  `ukuran` char(3) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `line` varchar(100) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `facebook`, `email`, `instagram`, `telepon`, `line`, `id_user`) VALUES
(1, 'Jl. Sukajaya Kaler No. 44 RT.05/04 Kel. Cibabat Kec. Cimahi Utara', '#', 'pikashop@gmail.com', '#', '+62 895-37732-0808', '@pikapikani', '5fa7963b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(50) NOT NULL,
  `id_produk` char(25) DEFAULT NULL,
  `id_alamat` int(11) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  `ukuran_produk` varchar(10) DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `kurir` varchar(100) DEFAULT 'J&T Express',
  `resi_pengiriman` varchar(50) DEFAULT NULL,
  `status_pengiriman` int(1) DEFAULT 0,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status_pembayaran` int(1) DEFAULT 0,
  `status_pemesanan` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(25) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `label_produk` varchar(100) DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `foto_produk` varchar(100) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `label_produk`, `ukuran`, `stok`, `id_kategori`, `deskripsi_produk`, `harga`, `foto_produk`, `terjual`) VALUES
('5fb4afd571bfb', 'Hoodie Black Clover', 'Black Clover', 'L,XL', '2', 13, '<p>Hoodie ini bisa dipakai oleh pria ataupun wanita (unisex). Hoodie ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p>', 240000, 'hoodie.jpg', 0),
('5fb4b00573cd1', 'Kaos Anime', 'Anime', 'M,L,XL', '3', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 98000, 'anime.jpg', 0),
('5fb4b02aa530f', 'Kaos Elizabeth', 'Gintama', 'S,M,L,XL', '2', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 98000, 'gintama.jpg', 0),
('5fb4b06c8b76e', 'Kaos Happy', 'Fairy Tail', 'L,XL,XXL', '5', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 98000, 'hapi.jpg', 0),
('5fb4b08e41896', 'Kaos Gon', 'Hunter X Hunter', 'L,XL,XXL', '5', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 98000, 'gon.jpg', 0),
('5fb4b0d4bb9a8', 'Kaos God Usopp', 'One Piece', 'S,M,L,XL,XXL', '10', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 98000, 'hero.jpg', 0),
('5fbd2a06e0248', 'Kaos Onigiri', 'Jepang', 'M,L,XL,XXL', '5', 5, '<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>', 110000, 'onigiri.jpg', 0),
('5fc4f3f8562fc', 'Bebas', 'Bebas', 'L,XL,XXL', '5', 5, '<p>ABCD</p>', 98000, 'anime1.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(180) DEFAULT NULL,
  `token` varchar(180) DEFAULT NULL,
  `tanggal_dibuat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(8) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomer_telp` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT 'default.jpg',
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `nomer_telp`, `tanggal_lahir`, `foto_profil`, `role_id`, `is_active`) VALUES
('5fa7963b', 'Andika Permana Sidiq', 'andika@gmail.com', '$2y$10$4DipOGtUYRFbZQ953q6qSuQP812oYCu8v6nYhnrzVvzNZrOtf/Jau', '12345', '2020-11-04', 'user1606216321.jpg', 1, 1),
('user5143', 'Andika Permana', 'andikapermanasidiq00@gmail.com', '$2y$10$LE58AXvv5LkVkkCTAMtcYeGZ21Q3BOsr15DV48xGVYzXWHVKN4faS', NULL, NULL, 'default.jpg', 2, 1),
('user9046', 'Satou Kazuma', 'dika@gmail.com', '$2y$10$7mBRJP52sI.oYrlZ4m76peN/ys2EhUGIHbqAu6J4/IW8ul515wE5O', '085321874357', '1994-01-26', 'default.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_ibfk_1` (`id_bank`),
  ADD KEY `pesanan_ibfk_4` (`id_user`),
  ADD KEY `id_keranjang` (`id_produk`),
  ADD KEY `id_alamat` (`id_alamat`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_ibfk_1` (`id_kategori`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesanan_ibfk_7` FOREIGN KEY (`id_alamat`) REFERENCES `alamat` (`id_alamat`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
