/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - projek_adit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projek_adit` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `projek_adit`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id`,`nama_lengkap`,`username`,`password`,`status`) values (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','admin');

/*Table structure for table `tb_aturan` */

DROP TABLE IF EXISTS `tb_aturan`;

CREATE TABLE `tb_aturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_aturan` int(11) DEFAULT NULL,
  `aturan` varchar(100) DEFAULT NULL,
  `y` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_aturan` */

insert  into `tb_aturan`(`id`,`kode_aturan`,`aturan`,`y`) values (1,1,'IF A & K & Q THEN E','E'),(2,1,'IF C & M & O THEN G\r\n','G'),(3,1,'IF K & I & THEN S\r\n','S'),(4,1,'IF M & S & K THEN Q\r\n','Q'),(5,1,'IF E & G & S & Q THEN X\r\n','X'),(6,NULL,'IF E OR G OR S OR Q THEN Y\r\n',NULL);

/*Table structure for table `tb_coba` */

DROP TABLE IF EXISTS `tb_coba`;

CREATE TABLE `tb_coba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` char(1) DEFAULT NULL,
  `B` char(1) DEFAULT NULL,
  `C` char(1) DEFAULT NULL,
  `D` char(1) DEFAULT NULL,
  `E` char(1) DEFAULT NULL,
  `F` char(1) DEFAULT NULL,
  `G` char(1) DEFAULT NULL,
  `H` char(1) DEFAULT NULL,
  `I` char(1) DEFAULT NULL,
  `J` char(1) DEFAULT NULL,
  `K` char(1) DEFAULT NULL,
  `L` char(1) DEFAULT NULL,
  `M` char(1) DEFAULT NULL,
  `N` char(1) DEFAULT NULL,
  `O` char(1) DEFAULT NULL,
  `P` char(1) DEFAULT NULL,
  `Q` char(1) DEFAULT NULL,
  `R` char(1) DEFAULT NULL,
  `S` char(1) DEFAULT NULL,
  `T` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_coba` */

insert  into `tb_coba`(`id`,`A`,`B`,`C`,`D`,`E`,`F`,`G`,`H`,`I`,`J`,`K`,`L`,`M`,`N`,`O`,`P`,`Q`,`R`,`S`,`T`) values (1,'A',NULL,'C',NULL,NULL,'F','G',NULL,'I',NULL,NULL,'L','M',NULL,'O',NULL,'Q',NULL,'S',NULL);

/*Table structure for table `tb_jawaban` */

DROP TABLE IF EXISTS `tb_jawaban`;

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(11) DEFAULT NULL,
  `jawaban` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jawaban` */

insert  into `tb_jawaban`(`id`,`id_pertanyaan`,`jawaban`) values (1,1,'tidak'),(2,2,'ya'),(3,3,'ya'),(4,4,'ya'),(5,5,'ya'),(6,6,'tidak'),(7,7,'ya'),(8,8,'ya'),(9,9,'tidak'),(10,10,'ya');

/*Table structure for table `tb_kecamatan` */

DROP TABLE IF EXISTS `tb_kecamatan`;

CREATE TABLE `tb_kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kecamatan` */

insert  into `tb_kecamatan`(`id`,`kode_kecamatan`,`kecamatan`) values (1,'KCT01','Bantargadung'),(2,'KCT02','Bojong Genteng'),(3,'KCT03','Caringin');

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(4) DEFAULT NULL,
  `kriteria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id`,`kode_kriteria`,`kriteria`) values (1,'KT01','Puskesmas'),(2,'KT02','Poliklinik'),(3,'KT03','UPTD Laboratorium'),(4,'KT04','UPTD Rumah Sakit'),(5,'KT05','Kantor BPJS'),(8,'KT06','Posyandu');

/*Table structure for table `tb_pengajuan` */

DROP TABLE IF EXISTS `tb_pengajuan`;

CREATE TABLE `tb_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `kode_kecamatan` varchar(100) DEFAULT NULL,
  `kode_kriteria` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengajuan` */

insert  into `tb_pengajuan`(`id`,`email`,`foto`,`kode_kecamatan`,`kode_kriteria`,`lokasi`,`lat`,`lng`,`deskripsi`,`keterangan`,`status`) values (1,NULL,NULL,'0','0','Tes','-6.986406533618107','106.96443156640623','tes',NULL,NULL),(2,NULL,NULL,'0','0','Tes','-7.013667625439849','106.93696574609373','tes',NULL,NULL),(3,NULL,NULL,'0','0','Tes','-6.608679626740846','106.73474864404295','s',NULL,NULL),(4,'dani46purnama@gmail.com','assets/pengajuan/1.jpeg','KCT01',NULL,'Tes','','','tes',NULL,NULL),(5,'dani46purnama@gmail.com','assets/pengajuan/2.jpeg','KCT01','KT01','Tes','-7.130872061679455','106.92872599999998','tes',NULL,NULL),(6,'dani46purnama@gmail.com','assets/pengajuan/3.jpg','KCT01','KT01','Tes','-7.109068841193351','107.03858928124998','tes',NULL,NULL),(9,'dani46purnama@gmail.com','assets/pengajuan/6.jpg','KCT01','KT04','jakarta','-6.925116527234751','106.92854360978697','tes',NULL,NULL),(10,'chairul@gmail.com','assets/pengajuan/3.jpg','KCT02','KT03','Kota Sukabumi','-6.92365273797478','106.92856909077261','Belum ada pelayanan tersebut','Layak',2);

/*Table structure for table `tb_pertanyaan` */

DROP TABLE IF EXISTS `tb_pertanyaan`;

CREATE TABLE `tb_pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_variabel` varchar(5) DEFAULT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pertanyaan` */

insert  into `tb_pertanyaan`(`id`,`kode_variabel`,`pertanyaan`) values (1,'VR01','Apakah Sudah Ada Pelayanan Tersebut?'),(2,'VR02','Apakah Ukuran Lahannya >= 1000 meter?'),(3,'VR03','Apakah Keamanannya Baik?'),(4,'VR04','Apakah Ada Akses Jalan Mobil?'),(5,'VR05','Apakah Kualitas Airnya Baik?'),(6,'VR06','Apakah 	Kualitas Udaranya Baik?'),(7,'VR07','Apakah Memungkinkan Untuk Dibangun?'),(8,'VR08','Apakah Luas Lahannya Luas?'),(9,'VR09','Apakah Aksesnya Bagus?'),(10,'VR10','Apakah Kesehatan Lingkungannya Baik?');

/*Table structure for table `tb_pesan` */

DROP TABLE IF EXISTS `tb_pesan`;

CREATE TABLE `tb_pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int(11) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pesan` */

insert  into `tb_pesan`(`id`,`id_pengajuan`,`user`,`pesan`,`date_time`) values (2,7,'admin','Kami akan memprosesnya. terima kasih','2019-09-17 16:25:37'),(3,7,'dani46purnama@gmail.com','Siap','2019-09-17 16:26:37'),(4,7,'admin','tunggu saja pada hari senin','2019-09-17 16:45:03'),(5,8,'admin','akan kami proses ke lembaga bersangkutan','2019-09-17 17:02:33'),(8,8,'dani46purnama@gmail.com','terima kasih pa','2019-09-17 12:13:56'),(10,8,'dani46purnama@gmail.com','tes','2019-09-17 17:16:10'),(11,7,'dani46purnama@gmail.com','baik pa','2019-09-17 17:21:17'),(12,9,'admin','tes','2019-09-17 20:24:51'),(13,10,'admin','baik kami akan segera proses permintaan saudara. silahkan menunggu.','2019-09-17 20:55:51'),(14,10,'chairul@gmail.com','baik pa. terima kasih','2019-09-17 20:56:29'),(15,10,'chairul@gmail.com','gimana pa, apakah sudah ada progres?\r\n','2019-09-17 20:58:46'),(16,9,'dani46purnama@gmail.com','ok','2019-09-18 13:30:27');

/*Table structure for table `tb_rule` */

DROP TABLE IF EXISTS `tb_rule`;

CREATE TABLE `tb_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rule` varchar(10) DEFAULT NULL,
  `rule` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rule` */

insert  into `tb_rule`(`id`,`kode_rule`,`rule`,`ket`,`target`) values (1,'R01','IF Belum Ada Pelayanan Publik THEN Memungkinkan Dibangun',NULL,'Layak'),(2,'R02','IF Ukuran Lahan > 1000 meter AND Kualitas Air Baik THEN Kesehatan Lingkungan Baik',NULL,'Layak'),(3,'R03','IF A THEN M',NULL,'Layak');

/*Table structure for table `tb_target` */

DROP TABLE IF EXISTS `tb_target`;

CREATE TABLE `tb_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_target` varchar(4) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_target` */

insert  into `tb_target`(`id`,`kode_target`,`target`) values (1,'TR01','Layak'),(2,'TR02','Dipertimbangkan'),(3,'TR03','Tidak Layak');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`nama_lengkap`,`email`,`password`,`status`) values (1,'Dani Purnama','dani46purnama@gmail.com','0192023a7bbd73250516f069df18b500','user'),(2,'Nita Jaroh','dani46purnam@gmail.com','4b510fdd906d739bc02a91ce7ae728c5','user'),(3,'Chairul Fauzi Maulana','chairul@gmail.com','d1f99b7409ea6ee07139a5775b712656',NULL);

/*Table structure for table `tb_variabel` */

DROP TABLE IF EXISTS `tb_variabel`;

CREATE TABLE `tb_variabel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_variabel` varchar(5) DEFAULT NULL,
  `variabel` varchar(100) DEFAULT NULL,
  `inisialisasi` varchar(2) DEFAULT NULL,
  `jawaban` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_variabel` */

insert  into `tb_variabel`(`id`,`kode_variabel`,`variabel`,`inisialisasi`,`jawaban`) values (1,'VR01','Belum Ada Pelayanan Publik','A','tidak'),(2,'VR01','Sudah Ada Pelayanan Publik','B','ya'),(3,'VR02','Ukuran Lahan <= 1000 meter','C','tidak'),(4,'VR02','Ukuran Lahan > 1000 meter','D','ya'),(5,'VR03','Keamanan Baik','E','ya'),(6,'VR03','Keamanan Buruk','F','tidak'),(7,'VR04','Akses Jalan Mobil','G','ya'),(8,'VR04','Akses Jalan Motor','H','tidak'),(9,'VR05','Kualitas Air Baik','I','ya'),(10,'VR05','Kualitas Air Buruk','J','tidak'),(11,'VR06','Kualitas Udara Baik','K','ya'),(12,'VR06','Kualitas Udara Buruk','L','tidak'),(13,'VR07','Memungkinkan Dibangun','M','ya'),(14,'VR07','Tidak Memungkinkan Dibangun','N','tidak'),(15,'VR08','Luas Lahan Luas','O','ya'),(16,'VR08','Luas lahan Kecil','P','tidak'),(17,'VR09','Akses Bagus','Q','ya'),(18,'VR09','Akses Jelek','R','tidak'),(19,'VR10','Kesehatan Lingkungan Baik','S','ya'),(20,'VR10','Kesehatan Lingkungan Buruk','T','tidak');

/*Table structure for table `tb_variabel_khusus` */

DROP TABLE IF EXISTS `tb_variabel_khusus`;

CREATE TABLE `tb_variabel_khusus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variabel` varchar(100) DEFAULT NULL,
  `inisialisasi` char(1) DEFAULT NULL,
  `jawaban` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_variabel_khusus` */

insert  into `tb_variabel_khusus`(`id`,`variabel`,`inisialisasi`,`jawaban`) values (1,'Kualitas Air Baik','U','ya'),(2,'Kualitas Air Buruk','V','tidak'),(3,'Kualitas Udara Baik','W','ya'),(4,'Kualitas Udara Buruk','X','tidak');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
