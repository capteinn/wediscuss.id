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
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

/*Table structure for table `threads` */

DROP TABLE IF EXISTS `threads`;

CREATE TABLE `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `threads` */

insert  into `threads`(`id`,`title`,`description`,`category_id`,`user_id`,`created_at`,`updated_at`) values 
(1,'The Winnner','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vestibulum pulvinar tortor vitae scelerisque. Morbi eu urna et est posuere dapibus at ut dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi tempor arcu id posuere rutrum. Nulla dictum vulputate luctus. Nunc fringilla ex sed ante imperdiet, non rhoncus magna feugiat. Suspendisse nec lobortis lectus, at suscipit dolor. Vestibulum sit amet tincidunt nunc, viverra ultricies orci.\r\n\r\nIn non mi ornare augue dictum accumsan. Nam ut nisi id mauris volutpat accumsan pretium tempor ligula. Mauris venenatis sem at urna suscipit pulvinar. Vestibulum faucibus blandit nunc in malesuada. Phasellus imperdiet diam nec sapien sagittis, vel ullamcorper libero ultrices. Maecenas varius dui nec euismod volutpat. Nam quis venenatis orci. Ut id commodo sapien.\r\n\r\nNullam finibus elit vitae purus fermentum imperdiet. Sed ultricies, neque sed consequat molestie, augue tellus semper leo, congue malesuada dui quam vitae purus. Etiam rutrum blandit lectus a rutrum. Vivamus vehicula mauris sit amet dui posuere pharetra. Curabitur eget lorem pharetra orci consectetur laoreet et id dolor. Pellentesque sed aliquam ante. Donec fermentum turpis ut congue semper. Pellentesque vulputate, magna quis fermentum placerat, lacus diam aliquet mi, eget scelerisque risus sem porta massa. Nunc aliquam velit ac condimentum maximus.',1,1,'2018-10-06 02:45:43','2018-10-08 03:09:25'),
(2,'Discussion 2018','<p>Once upon a time<br></p>',1,1,'2018-10-08 02:42:11','0000-00-00 00:00:00'),
(3,'Discussion 2016','<p>One upon a time</p>',3,2,'2018-10-08 02:48:41','2018-10-08 03:12:57');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`photo`,`role_id`,`created_at`,`update_at`) values 
(1,'Abdurrahman','$2y$10$Fsi/lSII4W0x7d/PEE0nEOe8pWgq.9NJhoscWOapg93uxx1dVkWtK',NULL,NULL,'2018-10-06 09:04:18','2018-10-08 03:12:52'),
(2,'Muhammad Gorby ','$2y$10$Fsi/lSII4W0x7d/PEE0nEOe8pWgq.9NJhoscWOapg93uxx1dVkWtK',NULL,NULL,'2018-10-08 02:47:54','2018-10-08 03:12:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
