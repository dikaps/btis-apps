/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.13-MariaDB : Database - btis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`btis` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `btis`;

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `id_alamat` char(5) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `nomer_telp_penerima` varchar(50) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_alamat`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `alamat` */

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) DEFAULT NULL,
  `norek` varchar(150) DEFAULT NULL,
  `atas_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bank` */

/*Table structure for table `diskon` */

DROP TABLE IF EXISTS `diskon`;

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` char(20) DEFAULT NULL,
  `besar_diskon` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT 0,
  PRIMARY KEY (`id_diskon`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `diskon_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `diskon` */

insert  into `diskon`(`id_diskon`,`id_produk`,`besar_diskon`,`is_active`) values (1,'5fb4b08e41896',20,1),(2,'5fb4b06c8b76e',15,1);

/*Table structure for table `favorit` */

DROP TABLE IF EXISTS `favorit`;

CREATE TABLE `favorit` (
  `id_favorit` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` char(20) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_favorit`),
  KEY `id_user` (`id_user`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favorit_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `favorit` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values (5,'Kaos'),(6,'Tas Ransel'),(7,'Sling Bag'),(8,'Bandana'),(9,'Waist Bag'),(10,'Polo Shirt'),(11,'Cover Bag'),(12,'Emblem Bordir'),(13,'Hoodie');

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` char(20) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`),
  KEY `id_user` (`id_user`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `keranjang_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `line` varchar(100) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `kontak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kontak` */

insert  into `kontak`(`id`,`alamat`,`facebook`,`email`,`instagram`,`telepon`,`line`,`id_user`) values (1,'Jl. Sukajaya Kaler No. 44 RT.05/04 Kel. Cibabat Kec. Cimahi Utara','#','pikashop@gmail.com','#','+62 895-37732-0808','@pikapikani','5fa7963b');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` char(8) NOT NULL,
  `id_produk` char(20) DEFAULT NULL,
  `id_alamat` char(5) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `id_user` char(8) DEFAULT NULL,
  `kurir` varchar(100) DEFAULT 'J&T Express',
  `resi_pengiriman` varchar(50) DEFAULT NULL,
  `status_pengiriman` int(1) DEFAULT 0,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status_pemesanan` int(1) DEFAULT 0,
  PRIMARY KEY (`id_pesanan`),
  KEY `pesanan_ibfk_1` (`id_bank`),
  KEY `pesanan_ibfk_3` (`id_alamat`),
  KEY `pesanan_ibfk_4` (`id_user`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_alamat`) REFERENCES `alamat` (`id_alamat`),
  CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `pesanan_ibfk_5` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

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
  `terjual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `produk_ibfk_1` (`id_kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`label_produk`,`ukuran`,`stok`,`id_kategori`,`deskripsi_produk`,`harga`,`foto_produk`,`terjual`) values ('5fb3f08c6c231','Kaos Onigiri','Jepang','M,L,XL,XXL','22',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',110000,'onigiri.jpg',2),('5fb4afd571bfb','Hoodie Black Clover','Black Clover','L,XL','12',13,'<p>Hoodie ini bisa dipakai oleh pria ataupun wanita (unisex). Hoodie ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p>',240000,'hoodie.jpg',22),('5fb4b00573cd1','Kaos Anime','Anime','M,L,XL','5',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',98000,'anime.jpg',21),('5fb4b02aa530f','Kaos Elizabeth','Gintama','S,M,L,XL','5',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',98000,'gintama.jpg',55),('5fb4b06c8b76e','Kaos Happy','Fairy Tail','L,XL,XXL','5',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',98000,'hapi.jpg',54),('5fb4b08e41896','Kaos Gon','Hunter X Hunter','L,XL,XXL','23',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',98000,'gon.jpg',50),('5fb4b0d4bb9a8','Kaos God Usopp','One Piece','S,M,L,XL,XXL','10',5,'<p>Kaos ini bisa dipakai oleh pria ataupun wanita (unisex). Kaos ini terbuat dari bahan Cotton Combed 30s yang menyerap keringat, lembut, dingin dan nyaman saat dipakai. Dan menggunakan sablon Plastisol yang pastinya tidak mudah luntur dan sangat awet</p><p><br></p><p>Size Kaos :</p><p>M : 66cm x 49cm</p><p>L : 69cm x 51cm</p><p>XL : 71cm x 52cm</p><p>XXL : 74cm x 54cm</p>',98000,'hero.jpg',99);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`id`,`role`) values (1,'Admin'),(2,'Member');

/*Table structure for table `token` */

DROP TABLE IF EXISTS `token`;

CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) DEFAULT NULL,
  `token` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `token` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` char(8) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomer_telp` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT 'default.jpg',
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`email`,`password`,`nomer_telp`,`tanggal_lahir`,`foto_profil`,`role_id`,`is_active`) values ('5fa7963b','Andika Permana Sidiq','andika@gmail.com','$2y$10$4DipOGtUYRFbZQ953q6qSuQP812oYCu8v6nYhnrzVvzNZrOtf/Jau','','0000-00-00','liz.jpg',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
