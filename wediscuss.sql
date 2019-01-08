/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 10.1.29-MariaDB : Database - wediscuss
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wediscuss` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wediscuss`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Social','2018-10-07 19:27:45','2018-10-07 19:27:45'),
(2,'Educations','2018-10-07 19:27:34','2018-10-07 19:27:34'),
(3,'Politic','2018-10-07 19:27:43','2018-10-07 19:27:43'),
(4,'Bussiness','2018-10-07 19:26:52','0000-00-00 00:00:00'),
(5,'Design','2018-10-07 19:27:40','2018-10-07 19:27:40'),
(6,'Music','2018-10-07 19:26:56','0000-00-00 00:00:00');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `thread_id` (`thread_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`description`,`thread_id`,`user_id`,`created_at`,`updated_at`) values 
(1,'woaaah.. nyimeng :)',1,2,'2018-12-30 02:08:10','0000-00-00 00:00:00'),
(2,'ini artikelnya sangat bermanfaat sob :D',1,10,'2019-01-02 06:22:26','0000-00-00 00:00:00'),
(3,'Keresahan Mahasiswa gengs :(',4,10,'2019-01-02 06:35:18','0000-00-00 00:00:00'),
(4,'ini artikel opo -___-',3,10,'2019-01-02 10:23:25','0000-00-00 00:00:00');

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `like` tinyint(4) DEFAULT '0',
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

insert  into `likes`(`id`,`like`,`thread_id`,`user_id`,`created_at`) values 
(2,0,1,2,'2019-01-02 05:45:45'),
(3,1,1,10,'2019-01-02 06:22:13'),
(4,1,4,10,'2019-01-02 06:35:05'),
(5,0,3,10,'2019-01-02 10:23:14');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`) values 
(1,'student'),
(2,'admin');

/*Table structure for table `threads` */

DROP TABLE IF EXISTS `threads`;

CREATE TABLE `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `like` int(11) DEFAULT '0',
  `dislike` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `threads` */

insert  into `threads`(`id`,`title`,`description`,`like`,`dislike`,`category_id`,`user_id`,`deleted`,`created_at`,`updated_at`) values 
(1,'The Winnner','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vestibulum pulvinar tortor vitae scelerisque. Morbi eu urna et est posuere dapibus at ut dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi tempor arcu id posuere rutrum. Nulla dictum vulputate luctus. Nunc fringilla ex sed ante imperdiet, non rhoncus magna feugiat. Suspendisse nec lobortis lectus, at suscipit dolor. Vestibulum sit amet tincidunt nunc, viverra ultricies orci.\r\n\r\nIn non mi ornare augue dictum accumsan. Nam ut nisi id mauris volutpat accumsan pretium tempor ligula. Mauris venenatis sem at urna suscipit pulvinar. Vestibulum faucibus blandit nunc in malesuada. Phasellus imperdiet diam nec sapien sagittis, vel ullamcorper libero ultrices. Maecenas varius dui nec euismod volutpat. Nam quis venenatis orci. Ut id commodo sapien.\r\n\r\nNullam finibus elit vitae purus fermentum imperdiet. Sed ultricies, neque sed consequat molestie, augue tellus semper leo, congue malesuada dui quam vitae purus. Etiam rutrum blandit lectus a rutrum. Vivamus vehicula mauris sit amet dui posuere pharetra. Curabitur eget lorem pharetra orci consectetur laoreet et id dolor. Pellentesque sed aliquam ante. Donec fermentum turpis ut congue semper. Pellentesque vulputate, magna quis fermentum placerat, lacus diam aliquet mi, eget scelerisque risus sem porta massa. Nunc aliquam velit ac condimentum maximus.',1,1,1,1,0,'2018-10-06 02:45:43','2019-01-02 06:22:13'),
(2,'Discussion 2018','<p>Once upon a time<br></p>',0,0,1,1,1,'2018-10-08 02:42:11','2019-01-02 10:36:06'),
(3,'Discussion 2016','<p>One upon a time</p>',0,1,3,2,0,'2018-10-08 02:48:41','2019-01-02 10:23:14'),
(4,'Project Akhir D:','<p>Saya mewakili keresahan seluruh mahasiswa akan banyaknya dan juga penuhnya serta bebannya hidup kami apabila ditimpa dan dihajar dengan metode yang kalau orang jawa menyebutnya adalah \"Keroyokan\". Project akhir adalah pintu gerbang terakhir menuju musim seminya para mahasiswa yang berakhir dengan liburan yang sudah kami dambakan bahkan sejak kami lahir di kampus ini.</p><p>Jujur saja, tidak usah dipungkiri, banyak hal yang kami senangi dan kami dambakan di kampus ini, namun satu hal yang paling kami inginkan adalah.. yaa.. <b>LIBURAN T-T</b> . Kami sudah berjuang hingga titik darah penghabisan meluangkan waktu, mengerahkan seluruh cucuran tenaga, hingga peluh kami menetes tiada henti-hentinya, menyelami perpustakaan setiap minggunya, bahkan kami rela menyebrangi lautan dan menyusuri samudra untuk mendapatkan sekedar nilai yang memuaskan di halaman KRS kami T-T. #plak</p><p>Salam Mahasiswa Abadi.</p>',1,0,2,10,0,'2019-01-02 06:29:42','2019-01-02 06:35:05');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`photo`,`role_id`,`created_at`,`update_at`) values 
(1,'Abdurrahman','$2y$10$Fsi/lSII4W0x7d/PEE0nEOe8pWgq.9NJhoscWOapg93uxx1dVkWtK','face1.jpg',2,'2018-10-06 09:04:18','2019-01-02 10:12:59'),
(2,'gorby','$2y$10$8XXOD.u2JvE4YvKPBhIUge6jYyWHp8zyDGK1iJ1h2VO5Wjv.DHpJu','face1.jpg',1,'2018-10-08 02:47:54','2019-01-02 10:13:00'),
(9,'Anjas','$2y$10$CGAXcJ7Mblz5OLC60ZNkxeGDmbkH3QtbAg0/qNu8xh8nm47T4bxEq','face1.jpg',2,'2018-11-01 03:32:07','2019-01-02 10:13:02'),
(10,'idham','$2y$10$83Ecujz5mhupjTj1cuZ7Pejux0.SN1x048fTcyPFvfTl9DAC208he','face14.jpg',1,'2019-01-02 06:21:43','2019-01-02 10:23:04'),
(11,'admin','$2y$10$x.nozzYDOi44mfSL34Zfi.sYz5KcoMMCQqnoOQb9Xor/X4czVt4bW','face7.jpg',2,'2019-01-02 10:26:02','2019-01-02 10:26:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
