/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.16-MariaDB : Database - csr_pemkot
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`csr_pemkot` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `csr_pemkot`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `admin_nama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`admin_id`,`users_id`,`admin_nama`,`created_at`,`updated_at`) values 
(1,1,'Harif S',NULL,'2019-03-20 13:44:37'),
(4,10,'setyono','2019-03-20 13:08:10','2019-03-20 13:08:10');

/*Table structure for table `tbl_berita` */

DROP TABLE IF EXISTS `tbl_berita`;

CREATE TABLE `tbl_berita` (
  `berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `berita_judul` varchar(500) DEFAULT NULL,
  `berita_gambar` text,
  `berita_tanggal` date DEFAULT NULL,
  `berita_isi` text,
  `berita_counter` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`berita_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_berita` */

insert  into `tbl_berita`(`berita_id`,`berita_judul`,`berita_gambar`,`berita_tanggal`,`berita_isi`,`berita_counter`,`created_at`,`updated_at`) values 
(8,'berita pertama','15535681675c9991a786ffa.png','2019-03-26','<p>deskripsi berita pertama</p>',10,'2019-03-26 16:58:58','2019-03-26 09:42:49'),
(9,'berita kedua','15535692305c9995ce6feb3.png','2019-03-26','<p>deskripsi dari berita kedua</p>',6,'2019-03-27 12:05:05','2019-03-26 10:00:31');

/*Table structure for table `tbl_bidang` */

DROP TABLE IF EXISTS `tbl_bidang`;

CREATE TABLE `tbl_bidang` (
  `bidang_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_nama` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`bidang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_bidang` */

insert  into `tbl_bidang`(`bidang_id`,`bidang_nama`,`created_at`,`updated_at`) values 
(1,'Bidang Pendidikan','2019-03-21 12:14:15','0000-00-00 00:00:00'),
(4,'Bidang Sosial Budaya','2019-03-24 17:52:04','2019-03-24 17:52:04');

/*Table structure for table `tbl_daftar_perusahaan` */

DROP TABLE IF EXISTS `tbl_daftar_perusahaan`;

CREATE TABLE `tbl_daftar_perusahaan` (
  `daftar_perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `daftar_perusahaan_nama` varchar(200) DEFAULT NULL,
  `daftar_perusahaan_alamat` varchar(500) DEFAULT NULL,
  `daftar_perusahaan_kelurahan` varchar(200) DEFAULT NULL,
  `daftar_perusahaan_tahun` date DEFAULT NULL,
  `daftar_perusahaan_kecamatan` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`daftar_perusahaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_daftar_perusahaan` */

insert  into `tbl_daftar_perusahaan`(`daftar_perusahaan_id`,`daftar_perusahaan_nama`,`daftar_perusahaan_alamat`,`daftar_perusahaan_kelurahan`,`daftar_perusahaan_tahun`,`daftar_perusahaan_kecamatan`,`created_at`,`updated_at`) values 
(1,'Gudang Rokok','Jl. Semampir - Kediri','Semampir','2019-03-25','Kecamatan Kota','2019-03-26 17:44:07','2019-03-26 17:44:07'),
(2,'CV. AG SATU','Jl Jamsaren-Kediri','Jamsaren','2019-03-26','Kecamatan Kota','2019-03-26 17:45:05','2019-03-26 17:45:05');

/*Table structure for table `tbl_file_pengajuan` */

DROP TABLE IF EXISTS `tbl_file_pengajuan`;

CREATE TABLE `tbl_file_pengajuan` (
  `file_pengajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) DEFAULT NULL,
  `file_pengajuan_nama` text,
  `file_pengajuan_path` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`file_pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_file_pengajuan` */

insert  into `tbl_file_pengajuan`(`file_pengajuan_id`,`pengajuan_id`,`file_pengajuan_nama`,`file_pengajuan_path`,`created_at`,`updated_at`) values 
(1,1,'Pengajuan 1','1553224411.pdf','2019-03-25 11:55:44','0000-00-00 00:00:00');

/*Table structure for table `tbl_file_permohonan` */

DROP TABLE IF EXISTS `tbl_file_permohonan`;

CREATE TABLE `tbl_file_permohonan` (
  `file_permohonan_id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `file_permohonan_nama` text,
  `file_permohonan_path` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`file_permohonan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_file_permohonan` */

insert  into `tbl_file_permohonan`(`file_permohonan_id`,`permohonan_id`,`file_permohonan_nama`,`file_permohonan_path`,`created_at`,`updated_at`) values 
(1,1,'Dokumen 1','1553224411.pdf',NULL,NULL),
(2,1,'Dokumen 2','1553224541.pdf',NULL,NULL),
(3,2,'16010056_HarifSetyono_TP3_5B.pdf','15544472515ca6fb93dde6f.pdf','2019-04-05 13:54:11','2019-04-05 13:54:11'),
(4,3,'16010056_HarifSetyono_TP3_5B.pdf','15544567985ca720de9e095.pdf','2019-04-05 16:33:18','2019-04-05 16:33:18');

/*Table structure for table `tbl_galeri_pelaksanaan` */

DROP TABLE IF EXISTS `tbl_galeri_pelaksanaan`;

CREATE TABLE `tbl_galeri_pelaksanaan` (
  `galeri_pelaksanaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int(11) DEFAULT NULL,
  `galeri_pelaksanaan_gb1` text,
  `galeri_pelaksanaan_gb2` text,
  `galeri_pelaksanaan_gb3` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`galeri_pelaksanaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_galeri_pelaksanaan` */

insert  into `tbl_galeri_pelaksanaan`(`galeri_pelaksanaan_id`,`pengajuan_id`,`galeri_pelaksanaan_gb1`,`galeri_pelaksanaan_gb2`,`galeri_pelaksanaan_gb3`,`created_at`,`updated_at`) values 
(1,2,'15535810105c99c3d273537.png',NULL,NULL,'2019-03-26 13:17:01','2019-03-26 13:17:01');

/*Table structure for table `tbl_kategori_award` */

DROP TABLE IF EXISTS `tbl_kategori_award`;

CREATE TABLE `tbl_kategori_award` (
  `kategori_award_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_award_nama` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`kategori_award_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori_award` */

insert  into `tbl_kategori_award`(`kategori_award_id`,`kategori_award_nama`,`created_at`,`updated_at`) values 
(1,'Pembangunan Tersukses','2019-03-22 09:57:57','0000-00-00 00:00:00'),
(3,'Pembangunan dengan biaya terbesar','2019-03-22 10:38:04','2019-03-22 10:38:04');

/*Table structure for table `tbl_kriteria_award` */

DROP TABLE IF EXISTS `tbl_kriteria_award`;

CREATE TABLE `tbl_kriteria_award` (
  `kriteria_award_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_award_id` int(11) DEFAULT NULL,
  `kriteria_award_nama` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`kriteria_award_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kriteria_award` */

insert  into `tbl_kriteria_award`(`kriteria_award_id`,`kategori_award_id`,`kriteria_award_nama`,`created_at`,`updated_at`) values 
(1,1,'Tata ruang yang hijau','2019-03-22 10:08:42','0000-00-00 00:00:00'),
(2,1,'Kebersihan sanitasi','2019-03-22 10:09:11','0000-00-00 00:00:00'),
(5,3,'Up to 1 M','2019-03-22 11:34:58','2019-03-22 11:34:58');

/*Table structure for table `tbl_opd` */

DROP TABLE IF EXISTS `tbl_opd`;

CREATE TABLE `tbl_opd` (
  `opd_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `opd_nama` varchar(200) DEFAULT NULL,
  `opd_nohp` varchar(15) DEFAULT NULL,
  `opd_alamat` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`opd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_opd` */

insert  into `tbl_opd`(`opd_id`,`users_id`,`opd_nama`,`opd_nohp`,`opd_alamat`,`created_at`,`updated_at`) values 
(1,11,'Dinas Pendidikan','087888999667','Jong Biru bro','2019-03-25 10:50:40','2019-03-20 13:47:47');

/*Table structure for table `tbl_pengajuan` */

DROP TABLE IF EXISTS `tbl_pengajuan`;

CREATE TABLE `tbl_pengajuan` (
  `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `pengajuan_nama` varchar(200) DEFAULT NULL,
  `pengajuan_estimasi_pembiayaan` int(11) DEFAULT NULL,
  `pengajuan_deskripsi` text,
  `pengajuan_status` enum('0','1','2','3','4') DEFAULT NULL,
  `pengajuan_tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pengajuan` */

insert  into `tbl_pengajuan`(`pengajuan_id`,`perusahaan_id`,`program_id`,`pengajuan_nama`,`pengajuan_estimasi_pembiayaan`,`pengajuan_deskripsi`,`pengajuan_status`,`pengajuan_tanggal`,`created_at`,`updated_at`) values 
(1,1,1,'Pengajuan 1',200000000,'Deskripsi pengajuan 1','4','2019-03-23','2019-03-24 21:44:04','2019-03-24 21:43:47'),
(2,2,1,'Pengajuan 2 ',300000000,'Deskripsi pengajuan 2','3','2019-03-22','2019-04-05 13:39:35','2019-04-05 13:39:35');

/*Table structure for table `tbl_permohonan` */

DROP TABLE IF EXISTS `tbl_permohonan`;

CREATE TABLE `tbl_permohonan` (
  `permohonan_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) DEFAULT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `permohonan_tanggal` date DEFAULT NULL,
  `permohonan_nama` varchar(500) DEFAULT NULL,
  `permohonan_estimasi_anggaran` int(11) DEFAULT NULL,
  `permohonan_deskripsi` text,
  `permohonan_status` enum('0','1','2','3') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`permohonan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_permohonan` */

insert  into `tbl_permohonan`(`permohonan_id`,`program_id`,`opd_id`,`permohonan_tanggal`,`permohonan_nama`,`permohonan_estimasi_anggaran`,`permohonan_deskripsi`,`permohonan_status`,`created_at`,`updated_at`) values 
(1,1,1,'2019-03-25','Renovasi SDN 2 Mojoroto',100000000,'Deskripsi Renovasi SDN 2 Mojoroto','1','2019-04-05 13:40:36','2019-03-25 10:58:06'),
(2,1,1,'2019-04-05','Permohonan Kedua',NULL,'<p>Deskripsi&nbsp;Permohonan Kedua</p>','1','2019-04-05 16:33:14','2019-04-05 13:53:52'),
(3,2,1,'2019-04-05','Permohonan Ketiga',120000000,'<p>Deskripsi&nbsp;Permohonan Ketiga</p>','2','2019-04-06 21:45:49','2019-04-06 21:45:49');

/*Table structure for table `tbl_perusahaan` */

DROP TABLE IF EXISTS `tbl_perusahaan`;

CREATE TABLE `tbl_perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_id` int(11) DEFAULT NULL,
  `perusahaan_nama` varchar(200) DEFAULT NULL,
  `perusahaan_alamat` varchar(200) DEFAULT NULL,
  `perusahaan_kelurahan` varchar(200) DEFAULT NULL,
  `perusahaan_kecamatan` varchar(200) DEFAULT NULL,
  `perusahaan_contact_person` char(15) DEFAULT NULL,
  `perusahaan_tahun` date DEFAULT NULL,
  `perusahaan_status` enum('1','2') DEFAULT NULL,
  `perusahaan_email` varchar(200) DEFAULT NULL,
  `perusahaan_password` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`perusahaan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_perusahaan` */

insert  into `tbl_perusahaan`(`perusahaan_id`,`bidang_id`,`perusahaan_nama`,`perusahaan_alamat`,`perusahaan_kelurahan`,`perusahaan_kecamatan`,`perusahaan_contact_person`,`perusahaan_tahun`,`perusahaan_status`,`perusahaan_email`,`perusahaan_password`,`created_at`,`updated_at`) values 
(1,1,'Gudang Rokok','Jl. Semampir - Kediri','Semampir','Kecamatan Kota','087888111999',NULL,'1','gudangrokok@gmail.com','$2y$10$XO4hqeS1TU1R.y0BYmLAgOqd.L1OgtGMU9HQZDSt9yMlGYpOEykYG',NULL,'2019-03-21 19:11:20'),
(2,1,'PT. Banana ','Jl. Mojoroto - Kediri','Mojoroto','Mojoroto','098111777111',NULL,'1','ptbanana@gmail.com','$2y$10$XO4hqeS1TU1R.y0BYmLAgOqd.L1OgtGMU9HQZDSt9yMlGYpOEykYG',NULL,'2019-03-24 17:56:14'),
(3,1,'Pt Sarah','jl mt haryono no 56','Mojoroto','Mojoroto','089676536662','2019-03-26','1','admin@sarah.com','e10adc3949ba59abbe56e057f20f883e','2019-03-26 15:34:48','2019-03-26 15:34:48'),
(7,4,'CV. AG SATU','Jl. Jamsaren','Jamsaren','Kecamatan Kota','089373838393','2019-03-26','1','agsatu@gmail.com','97ce06a0b9b12c298cf0c42f15f4aaf0','2019-03-26 17:22:19','2019-03-26 17:31:11');

/*Table structure for table `tbl_program` */

DROP TABLE IF EXISTS `tbl_program`;

CREATE TABLE `tbl_program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_id` int(11) DEFAULT NULL,
  `program_nama` varchar(200) DEFAULT NULL,
  `program_gambar` text,
  `program_estimasi_biaya` bigint(20) DEFAULT NULL,
  `program_volume_satuan` varchar(200) DEFAULT NULL,
  `program_satuan_kerja` varchar(200) DEFAULT NULL,
  `program_jenis` enum('1','2') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_program` */

insert  into `tbl_program`(`program_id`,`bidang_id`,`program_nama`,`program_gambar`,`program_estimasi_biaya`,`program_volume_satuan`,`program_satuan_kerja`,`program_jenis`,`created_at`,`updated_at`) values 
(1,1,'Program 1','1543384693.jpg',20000,'unit','satker program 1','1','2019-03-23 11:06:33','0000-00-00 00:00:00'),
(2,1,'Evaluasi Matkul Perguruan Tinggi','1553590343.png',20000000000,'1paket','kota kediri','1','2019-03-26 15:52:29','2019-03-26 15:52:29');

/*Table structure for table `tbl_slideshow` */

DROP TABLE IF EXISTS `tbl_slideshow`;

CREATE TABLE `tbl_slideshow` (
  `slideshow_id` int(11) NOT NULL AUTO_INCREMENT,
  `slideshow_gambar` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`slideshow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_slideshow` */

insert  into `tbl_slideshow`(`slideshow_id`,`slideshow_gambar`,`created_at`,`updated_at`) values 
(1,'15535972745c9a035a11101.jpg','2019-03-26 17:47:54','2019-03-26 17:47:54'),
(2,'15535972855c9a0365884b2.jpg','2019-03-26 17:48:06','2019-03-26 17:48:06'),
(3,'15536035475c9a1bdb9f0c0.jpg','2019-03-26 19:32:28','2019-03-26 19:32:28'),
(5,'15536592225c9af5569464b.jpg','2019-03-27 11:00:23','2019-03-27 11:00:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`level`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Harif S','harif@gmail.com','$2y$10$XO4hqeS1TU1R.y0BYmLAgOqd.L1OgtGMU9HQZDSt9yMlGYpOEykYG','1','du10noXVftAtQFq1P3mvtQaNyivdGfYlCHX5UDovgNz72xcXneqQsepKyGZ1',NULL,'2019-03-20 13:47:11'),
(10,'setyono','setyono@gmail.com','$2y$10$cm1oxVWX5mS8Qsw2k3HnIOJvZ4zac692Wyaxz49VkqooWJbZY4fti','1',NULL,'2019-03-20 13:08:10','2019-03-20 13:08:10'),
(11,'aden','uun@gmail.com','$2y$10$8sHs3qeliQe1Lcj67QA4IOhKXvFhD2iB0ll7eEdJiF7g7/.38ZfFy','2','0XLsxgKm2jHUeuUVn0pN5BGj4EWpi76hQkCkgpjimYJ3DuOdvn1qufWzjxtz',NULL,'2019-03-20 13:48:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
