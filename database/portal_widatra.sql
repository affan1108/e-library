/*
Navicat MariaDB Data Transfer

Source Server         : aa
Source Server Version : 100029
Source Host           : localhost:3306
Source Database       : portal_widatra

Target Server Type    : MariaDB
Target Server Version : 100029
File Encoding         : 65001

Date: 2017-08-02 21:57:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for m_area_kerjas
-- ----------------------------
DROP TABLE IF EXISTS `m_area_kerjas`;
CREATE TABLE `m_area_kerjas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `ket` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of m_area_kerjas
-- ----------------------------
INSERT INTO `m_area_kerjas` VALUES ('1', 'HO / Cabang', 'Head Office', null, null);
INSERT INTO `m_area_kerjas` VALUES ('2', 'Pabrik', 'Pabrik', null, null);

-- ----------------------------
-- Table structure for m_departments
-- ----------------------------
DROP TABLE IF EXISTS `m_departments`;
CREATE TABLE `m_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_kerja_id` int(11) DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_user_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of m_departments
-- ----------------------------
INSERT INTO `m_departments` VALUES ('1', '1', 'HRD', null, null, '2017-05-22 04:44:44', '2', '1');
INSERT INTO `m_departments` VALUES ('2', '1', 'GA', 'a', null, '2017-07-25 01:19:01', null, '1');
INSERT INTO `m_departments` VALUES ('3', '1', 'Legal', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('4', '1', 'Sales & Marketing', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('5', '1', 'BDA & Distribution', '', null, '2017-07-30 14:12:03', null, '1');
INSERT INTO `m_departments` VALUES ('6', '1', 'Finance & Accounting', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('7', '1', 'Medical & Scientific', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('8', '1', 'Internal Audit', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('9', '2', 'Finance& Accounting', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('10', '2', 'HRD & GA', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('11', '2', 'IT', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('12', '2', 'Production', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('13', '2', 'Engineering', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('14', '2', 'Technical', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('15', '2', 'Project Management', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('16', '2', 'Quality Contol', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('17', '2', 'Quality Assurance', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('18', '2', 'Suply Chain', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('19', '2', 'Regulatory & PV', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('20', '2', 'Export', '', null, null, null, '1');
INSERT INTO `m_departments` VALUES ('21', '1', 'aaa', null, '2017-07-30 13:36:18', '2017-07-30 14:07:22', null, '0');

-- ----------------------------
-- Table structure for m_jabatans
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatans`;
CREATE TABLE `m_jabatans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of m_jabatans
-- ----------------------------
INSERT INTO `m_jabatans` VALUES ('1', 'Super Admin', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('2', 'Vice Precident', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('3', 'Direktur', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('4', 'Head Department', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('5', 'Head Section', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('6', 'Staff', '', null, null, '1');
INSERT INTO `m_jabatans` VALUES ('8', 'asdf', 'sd', '2017-05-22 07:13:17', '2017-07-30 14:20:04', '0');

-- ----------------------------
-- Table structure for m_kategori_beritas
-- ----------------------------
DROP TABLE IF EXISTS `m_kategori_beritas`;
CREATE TABLE `m_kategori_beritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `ket` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of m_kategori_beritas
-- ----------------------------
INSERT INTO `m_kategori_beritas` VALUES ('2', 'satu', null, '2017-05-23 16:45:36', '2017-05-23 16:45:36');
INSERT INTO `m_kategori_beritas` VALUES ('3', 'dua', 's', '2017-05-23 16:45:43', '2017-07-25 01:19:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_09_073022_create_jabatans_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_09_073306_create_departments_table', '1');
INSERT INTO `migrations` VALUES ('3', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('4', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('5', '2017_05_12_073522_alter_users_add_jabatan_and_department', '1');
INSERT INTO `migrations` VALUES ('6', '2017_06_01_085815_create_sessions_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('8irqh52wLzH3GRIdHYo84xYTgdiamLTpZqKNVMlc', '2', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiNmhmZEhraGtMSXVUZjVmNVRFUjE3VG9Gam5PblVza1NuMldSeVNDNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', '1501655439');
INSERT INTO `sessions` VALUES ('GuQMx5VVmPXL8ixePVB1XxzVvkPpZUD3ifXwuQZA', '2', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickFSd210Nlo4SVRRYTJmU0lPTURzT0g3VGw1YWQ0YmVjcmVNdm1HMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9kdy53aWRhdHJhLmNvbS9wZW5nYWp1YW4vNS9jb25maXJtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', '1501651890');
INSERT INTO `sessions` VALUES ('L9VS2rHjYco2DugT811pk2cKFXCzthLIBXZZR31V', '10', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXhyTmJPeVZUZUtjWlpOcTRXN29yQXgzUW4yVXpUUHNlaFN1U3FXWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==', '1501685754');
INSERT INTO `sessions` VALUES ('x98zNyUcob4FXfQcA8tNQB8aXIDXxKHrufqifeTs', '2', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiTzZsQkhndWdkTG1jRUwwalBtR1JtOEZoQjI3MXk4R1BTRUlSME1kQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9kbXMud2lkYXRyYS5jb20vaG9tZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', '1501655353');

-- ----------------------------
-- Table structure for t_beritas
-- ----------------------------
DROP TABLE IF EXISTS `t_beritas`;
CREATE TABLE `t_beritas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_berita_id` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `body` text,
  `featured_img` varchar(255) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_beritas
-- ----------------------------
INSERT INTO `t_beritas` VALUES ('1', '2', 'sd', 'safd', '<p>sfadfadsfasd</p><p>ga</p><p>af</p><p>af</p><p>gasd</p><p>gfasgasgsaf</p>', 'phpoj51bu.png', '2017-07-04', '2017-07-04 16:07:06', '2017-07-04 16:07:06');

-- ----------------------------
-- Table structure for t_pengumumans
-- ----------------------------
DROP TABLE IF EXISTS `t_pengumumans`;
CREATE TABLE `t_pengumumans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `body` text,
  `featured_img` varchar(255) DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_pengumumans
-- ----------------------------
INSERT INTO `t_pengumumans` VALUES ('1', 'asdf', '<p>asd</p>', 'phpA5BrRk.jpg', '2017-05-13', '2017-05-23 18:24:45', '2017-05-23 18:26:41');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@app.com', '$2y$10$.splbTTc.b9dBbsBUtnHGOcr.hnjmW9tNNylMSlruPsQx3UIsa6YS', '8Wa9GjNBpyLEYquSASILMRpvvHiBrGfmslw4uXcWzpIOKuXLy7W0OHMksJW2', null, null, null, '1', '1');
INSERT INTO `users` VALUES ('2', 'Amin', 'amin@app.com', '$2y$10$QIsGs3ciwZ/WpiRge3sf4uwWmfGLuZkY85RVvIkkvnF0k8MGhOn9a', 'isXJ2tW9mCnbFWgQCZJCI8uJNGOem6CmVobfSIjshg9cYMifq61cc4SupJ6X', null, '2017-05-23 03:34:26', '5', '3', '1');
INSERT INTO `users` VALUES ('6', 'Bulyan', 'bulyan@app.com', '$2y$10$Gd9R3c.nEX6wMSbVH9BoTet/GRyRDv4SGSGwDNMWu7xvfyt8MtP76', 'JBdOjJDkwoQMQeUzOrBjBJOaOq8UPF8wS8Ci46ttgJrmlCUyx7jT2UVRkyqh', '2017-05-22 13:47:12', '2017-05-23 03:33:34', '1', '6', '1');
INSERT INTO `users` VALUES ('7', 'Dina', 'dina@app.com', '$2y$10$bRKYDmtwleADSB0UVeSNzuHJCkGsyciQZg9NxSfVjRh5c1NrriDWi', 'WjnD5ECJDKRtfP9jCjxFmbkeUPNYour0TyY7OV4dZIxg9tUWVuSkc8EUBRr5', '2017-05-22 13:49:00', '2017-07-30 13:56:48', '2', '6', '1');
INSERT INTO `users` VALUES ('8', 'Theresia', 'theresia@app.com', '$2y$10$B1UsdH8g2Zj3Alexd3BMKeQgcw7hSLaEc6TwVFnZlYq2FtTgWElmC', '1JTG9sKXNWQJPYZpU1JSAMf7AEU891WPzDEtez8NecntNusDBopFkbYcTyKZ', '2017-05-23 03:35:36', '2017-05-23 03:35:36', '2', '4', '1');
INSERT INTO `users` VALUES ('9', 'Sonif', 'sonif@app.com', '$2y$10$FCEY1dDsoe0Xl7MR9EylCOgBG/782c0yISgubQ2N39nfOpkC8vi4e', 'OueI9TAs5Ls5S4frAl0SpvRqCXiwUBmhgNmxhepCHjIzpRIYGSFYM65V40A2', '2017-05-23 03:36:25', '2017-05-23 03:36:25', '1', '4', '1');
INSERT INTO `users` VALUES ('10', 'Jarot', 'jarot@app.com', '$2y$10$GLVe.P.R54f4FVvooRl4.OTCSGIV88.SslFrYiSXDZXJwvFc23C7y', 'H5pHPg3lmyuX9dTHG4WPGJ9nzYiaeUpVyQ1exOZ7N76enonBoDsLXB6iKsFf', '2017-05-23 03:36:50', '2017-07-25 01:15:49', '1', '6', '1');
INSERT INTO `users` VALUES ('11', 'Nurul', 'nurul@app.com', '$2y$10$i8iCLaa/3QdjRkAEtOkwzONZEmMjGD/F4hF4SqgBT1T9Q2gKGDLAO', null, '2017-05-23 03:37:22', '2017-05-23 03:37:22', '3', '4', '1');
INSERT INTO `users` VALUES ('12', 'Zendy', 'zendy@app.com', '$2y$10$1meJY8hKrNcdaQCL8ic5jeDVFqEjTIp4WKUwqpUH4BUCwNGjy799K', 'NT1V45rnbS1YFWgITtadp0GF8PNcYirAq1MjaGvl0Ed2yRLXT46GEqKJ5VdP', '2017-05-23 03:38:48', '2017-05-23 03:38:48', '2', '5', '1');
INSERT INTO `users` VALUES ('15', 'Putu', 'putu@app.com', '$2y$10$f4OSxzwa9jKiDzPPoIPgLedaJdgrLDx2pFBvjfjj4hV2XtgG6cJTW', null, '2017-05-23 03:40:22', '2017-07-30 14:46:14', '2', '5', '1');
SET FOREIGN_KEY_CHECKS=1;
