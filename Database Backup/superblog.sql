/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - superblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`superblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `superblog`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`image`,`created_at`,`updated_at`) values 
(1,'Bangladesh','bangladesh','bangladesh-2021-01-21-6008ffd258526.jpg','2021-01-21 04:15:14','2021-01-21 04:15:14'),
(2,'USA','usa','usa-2021-01-21-6009020bdb3d1.jpg','2021-01-21 04:24:44','2021-01-21 04:24:44'),
(4,'Turkey','turkey','turkey-2021-01-25-600e0fb034a94.jpg','2021-01-25 00:24:16','2021-01-25 00:24:16'),
(5,'UK','uk','uk-2021-01-25-600e0fcadfa86.jpg','2021-01-25 00:24:43','2021-01-25 00:24:43'),
(6,'China','china','china-2021-01-25-600e0fe68cb9a.jpg','2021-01-25 00:25:10','2021-01-25 00:25:10'),
(7,'Japan','japan','japan-2021-01-25-600e0ff5a56db.jpg','2021-01-25 00:25:26','2021-01-25 00:25:26');

/*Table structure for table `category_post` */

DROP TABLE IF EXISTS `category_post`;

CREATE TABLE `category_post` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `category_post` */

insert  into `category_post`(`id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(1,1,1,'2021-01-23 03:10:18','2021-01-23 03:10:18'),
(2,1,2,'2021-01-23 03:10:18','2021-01-23 03:10:18'),
(3,2,1,'2021-01-23 03:22:52','2021-01-23 03:22:52'),
(8,5,1,'2021-01-23 22:40:00','2021-01-23 22:40:00'),
(9,5,2,'2021-01-23 22:40:00','2021-01-23 22:40:00'),
(11,7,1,'2021-01-23 23:32:27','2021-01-23 23:32:27'),
(12,7,2,'2021-01-23 23:32:27','2021-01-23 23:32:27'),
(13,8,2,'2021-01-24 06:58:58','2021-01-24 06:58:58'),
(15,11,1,'2021-01-24 08:21:36','2021-01-24 08:21:36'),
(16,11,2,'2021-01-24 08:21:36','2021-01-24 08:21:36'),
(17,12,1,'2021-01-24 08:26:46','2021-01-24 08:26:46'),
(18,13,2,'2021-01-24 22:33:27','2021-01-24 22:33:27');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2021_01_12_224150_create_roles_table',1),
(4,'2021_01_18_225055_create_tags_table',2),
(5,'2021_01_21_010317_create_categories_table',3),
(6,'2021_01_22_022207_create_posts_table',4),
(7,'2021_01_22_023148_create_category_post_table',4),
(8,'2021_01_22_023333_create_post_tag_table',4),
(9,'2021_01_24_024044_create_subscribers_table',5),
(10,'2021_01_24_220747_create_jobs_table',6),
(11,'2021_01_27_225011_create_post_user_table',7);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `post_tag` */

DROP TABLE IF EXISTS `post_tag`;

CREATE TABLE `post_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_tag` */

insert  into `post_tag`(`id`,`post_id`,`tag_id`,`created_at`,`updated_at`) values 
(1,1,1,'2021-01-23 03:10:18','2021-01-23 03:10:18'),
(2,1,10,'2021-01-23 03:10:18','2021-01-23 03:10:18'),
(3,2,11,'2021-01-23 03:22:52','2021-01-23 03:22:52'),
(4,2,12,'2021-01-23 03:22:52','2021-01-23 03:22:52'),
(8,5,1,'2021-01-23 22:40:01','2021-01-23 22:40:01'),
(9,5,10,'2021-01-23 22:40:01','2021-01-23 22:40:01'),
(10,5,12,'2021-01-23 22:40:01','2021-01-23 22:40:01'),
(11,5,11,'2021-01-23 22:53:50','2021-01-23 22:53:50'),
(14,7,11,'2021-01-23 23:32:27','2021-01-23 23:32:27'),
(15,7,12,'2021-01-23 23:32:27','2021-01-23 23:32:27'),
(16,7,13,'2021-01-23 23:32:27','2021-01-23 23:32:27'),
(17,8,1,'2021-01-24 06:58:58','2021-01-24 06:58:58'),
(18,8,10,'2021-01-24 06:58:58','2021-01-24 06:58:58'),
(21,11,1,'2021-01-24 08:21:36','2021-01-24 08:21:36'),
(22,11,10,'2021-01-24 08:21:36','2021-01-24 08:21:36'),
(23,11,12,'2021-01-24 08:21:36','2021-01-24 08:21:36'),
(24,12,1,'2021-01-24 08:26:46','2021-01-24 08:26:46'),
(25,13,12,'2021-01-24 22:33:27','2021-01-24 22:33:27'),
(26,13,13,'2021-01-24 22:33:27','2021-01-24 22:33:27');

/*Table structure for table `post_user` */

DROP TABLE IF EXISTS `post_user`;

CREATE TABLE `post_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user_post_id_foreign` (`post_id`),
  CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_user` */

insert  into `post_user`(`id`,`post_id`,`user_id`,`created_at`,`updated_at`) values 
(2,12,1,'2021-01-28 01:10:54','2021-01-28 01:10:54'),
(5,7,1,'2021-01-28 01:37:58','2021-01-28 01:37:58'),
(6,13,2,'2021-01-28 02:37:19','2021-01-28 02:37:19'),
(8,7,2,'2021-01-28 02:37:41','2021-01-28 02:37:41');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`user_id`,`title`,`slug`,`image`,`body`,`view_count`,`status`,`is_approved`,`created_at`,`updated_at`) values 
(1,1,'Laravel Tutorial','laravel-tutorial','laravel-tutorial-2021-01-23-600b9398c3803.jpg','<p>This is first post about Laravel Tutorial&nbsp;<img src=\"/assets/backend/plugins/tinymce/plugins/emoticons/img/smiley-cool.gif\" alt=\"cool\" /></p>',0,1,1,'2021-01-23 03:10:17','2021-01-23 03:10:17'),
(2,1,'Codeigniter Tutorial','codeigniter-tutorial','codeigniter-tutorial-2021-01-23-600b968b8577a.jpg','<p>this is the first post of Codeigniter&nbsp;<img src=\"/assets/backend/plugins/tinymce/plugins/emoticons/img/smiley-laughing.gif\" alt=\"laughing\" />&nbsp;<strong>hello world</strong></p>',0,0,1,'2021-01-23 03:22:52','2021-01-23 03:22:52'),
(5,2,'Author Post Update','author-post-update','author-post-2021-01-23-600ca5be6d164.jpg','<p>Test Post from Author <strong>Updated</strong></p>',0,1,1,'2021-01-23 22:40:00','2021-01-24 01:34:45'),
(7,2,'Delete This','delete-this','delete-this-2021-01-23-600cb20a9b3f3.jpg','<p>time to delete this post....</p>\r\n<p><img src=\"https://storage.googleapis.com/website-production/uploads/2018/11/facebook-link-format-770x384.jpg\" alt=\"facebook\" width=\"373\" height=\"186\" /></p>',0,1,1,'2021-01-23 23:32:27','2021-01-24 08:32:09'),
(8,2,'Post About Notification','post-about-notification','post-about-notification-2021-01-24-600d1ab13121b.jpg','<p>Testing for notification....</p>',0,1,1,'2021-01-24 06:58:57','2021-01-24 07:40:17'),
(11,1,'Admin Post','admin-post','admin-post-2021-01-24-600d2e10491e7.png','<p>sending mail to subscribers</p>',0,1,1,'2021-01-24 08:21:36','2021-01-24 08:22:38'),
(12,1,'BMW','bmw','bmw-2021-01-24-600d2f45bafaf.jpg','<p>addj;dkalsd;asda</p>',0,1,1,'2021-01-24 08:26:46','2021-01-24 08:26:46'),
(13,1,'html 5','html-5','html-5-2021-01-24-600df5b71fb71.jpg','<p>Queue Notification</p>',0,1,1,'2021-01-24 22:33:27','2021-01-24 22:33:27');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Admin','admin',NULL,NULL),
(2,'Author','author',NULL,NULL);

/*Table structure for table `subscribers` */

DROP TABLE IF EXISTS `subscribers`;

CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscribers` */

insert  into `subscribers`(`id`,`email`,`created_at`,`updated_at`) values 
(1,'adib@gmail.com','2021-01-24 03:16:00','2021-01-24 03:16:00'),
(2,'araf@gmail.com','2021-01-24 03:27:10','2021-01-24 03:27:10'),
(4,'author@gmail.com','2021-01-24 04:49:05','2021-01-24 04:49:05');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Laravel','laravel','2021-01-19 01:07:03','2021-01-19 01:07:03'),
(10,'Vue js','vue-js','2021-01-21 00:36:47','2021-01-21 00:36:47'),
(11,'Codeigniter','codeigniter','2021-01-21 00:37:17','2021-01-21 00:37:17'),
(12,'Wordpress','wordpress','2021-01-21 00:37:32','2021-01-21 00:37:32'),
(13,'Drupal','drupal','2021-01-21 00:37:49','2021-01-21 00:37:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`name`,`username`,`email`,`email_verified_at`,`password`,`image`,`about`,`remember_token`,`created_at`,`updated_at`) values 
(1,1,'Md. Admin','admin','mazhar.rony@gmail.com',NULL,'$2y$10$8c52uegf8RB9hUM78b3eau6y/j54oC0yP60sCT5IuYw4/IMNRXq1m','md-admin-2021-01-25-600e51db16543.jpg','Here is your Admin',NULL,NULL,'2021-01-25 06:29:02'),
(2,2,'Md. Author','author','imran@gmail.com',NULL,'$2y$10$R4he6vmBEvwEWS77baNuh.qTsK7zVpaQR9bWosO/ZdKWrQr.UNCM6','md-author-imran-2021-01-27-6011e8052e42a.jpg','Imran Hossain Adib',NULL,NULL,'2021-01-27 22:35:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
