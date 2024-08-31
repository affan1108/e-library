-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2022 at 03:05 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `domain`, `ip_address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Portal', 'home.widatra.com', '192.168.2.13', 'Portal', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(2, 'DMS', 'dms.widatra.com', '192.168.2.13', 'Document Management System', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(3, 'Library', 'library.widatra.com', '192.168.2.13', 'Library', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(4, 'DW', 'dw.widatra.com', '192.168.2.13', 'Document Workflow', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(5, 'Kalibrasi', 'kalibrasi.widatra.com', '192.168.2.13', 'Kalibrasi', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(6, 'Stability', 'stability.widatra.com', '192.168.2.13', 'Stability', '2017-10-19 11:55:31', '2017-10-19 11:55:31'),
(7, 'Reagensia', 'reagensia.widatra.com', '192.168.2.13', 'Reagensia', '2017-10-19 11:55:31', '2017-10-19 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_09_26_000100_create_m_area_kerjas_table', 1),
(2, '2017_09_26_000100_create_m_jabatans_table', 1),
(3, '2017_09_26_000100_create_m_kategori_beritas_table', 1),
(4, '2017_09_26_000100_create_t_pengumumans_table', 1),
(5, '2017_09_26_000101_create_m_departments_table', 1),
(6, '2017_09_26_000102_create_t_beritas_table', 1),
(7, '2017_09_26_000200_create_users_table', 1),
(8, '2017_09_26_000201_create_password_resets_table', 1),
(9, '2017_09_26_100101_alter_m_departments_table', 1),
(10, '2017_09_26_100102_alter_t_beritas_table', 1),
(11, '2017_09_26_100200_alter_users_table', 1),
(12, '2017_10_16_024911_create_sessions_table', 1),
(13, '2017_09_26_000100_create_apps_table', 2),
(14, '2017_09_26_000202_create_user_rights_table', 2),
(15, '2017_09_26_100202_alter_user_rights_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_area_kerjas`
--

CREATE TABLE `m_area_kerjas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_area_kerjas`
--

INSERT INTO `m_area_kerjas` (`id`, `nama`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Pabrik', 'Pabrik', NULL, NULL),
(2, 'HO / Cabang', 'HO / Cabang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_delay_range`
--

CREATE TABLE `m_delay_range` (
  `id` int(11) NOT NULL,
  `min` int(11) NOT NULL DEFAULT '0',
  `max` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_delay_range`
--

INSERT INTO `m_delay_range` (`id`, `min`, `max`, `created_at`, `updated_at`) VALUES
(1, 0, 10000, NULL, '2021-04-28 11:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `m_departments`
--

CREATE TABLE `m_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_kerja_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_departments`
--

INSERT INTO `m_departments` (`id`, `area_kerja_id`, `nama`, `ket`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'CM', 'Company Management', 1, '2017-10-18 23:54:46', '2019-12-19 08:15:23'),
(2, 1, 'Production', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(3, 1, 'Quality Control', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(4, 1, 'Engineering', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(5, 1, 'Technical', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(6, 1, 'Supply Chain', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(7, 1, 'Human Resources and Development', 'HO', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(8, 1, 'General Affairs', 'HO', 1, '2017-10-18 23:54:46', '2020-03-06 03:12:27'),
(9, 1, 'Finance and Accounting', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(10, 1, 'Information and Technology', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(11, 1, 'Marketing and Bussiness Development', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(12, 1, 'Legal & Compliance', NULL, 1, '2017-10-18 23:54:46', '2019-05-09 04:29:15'),
(13, 1, 'Bussiness Data Analyst and Distribution', NULL, 1, '2017-10-18 23:54:46', '2018-10-03 18:29:38'),
(14, 1, 'Quality Assurance', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(15, 1, 'Sales & Marketing', NULL, 1, '2017-10-18 23:54:46', '2020-01-24 05:56:19'),
(17, 1, 'Export', NULL, 1, '2017-10-18 23:54:46', '2019-01-21 19:56:12'),
(18, 1, 'Projects', NULL, 1, '2017-10-18 23:54:46', '2019-01-21 20:00:58'),
(19, 1, 'Medical & Pharmacovigilance', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(20, 1, 'Regulatory Affair', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(21, 1, 'Internal Auditor', '', 1, '2017-10-18 23:54:46', '2017-10-18 23:54:46'),
(22, 1, 'Quality Management System', 'All Dept User', 1, '2017-10-18 23:54:46', '2019-10-31 19:34:42'),
(23, 1, 'Admin Support & PR', 'QMS', 1, '2018-12-26 18:36:11', '2018-12-26 18:36:11'),
(25, 1, 'HRD & GA ', 'Pabrik', 1, '2019-03-28 03:01:48', '2019-03-28 03:01:48'),
(26, 1, 'Sekretriat', 'HO', 1, '2020-03-06 03:15:38', '2020-03-06 03:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `m_jabatans`
--

CREATE TABLE `m_jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_jabatans`
--

INSERT INTO `m_jabatans` (`id`, `nama`, `ket`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(2, 'Direktur', 'Direktur', 1, '2017-10-18 23:54:47', '2019-09-08 09:38:38'),
(3, 'Factory Director', 'Factory Director', 1, '2017-10-18 23:54:47', '2022-04-06 08:41:11'),
(4, 'Head Division', 'Head Division', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(5, 'Head Department', 'Head Department', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(6, 'Head Section', 'Head Section', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(7, 'Unit Head', 'Unit Head', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(8, 'Group Head', 'Group Head', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(9, 'Team Head', 'Team Head', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(10, 'Operator', 'Operator', 1, '2017-10-18 23:54:47', '2017-10-18 23:54:47'),
(11, 'Non Jabatan', 'Diluar struktur', 1, '2019-12-24 08:10:35', '2019-12-24 08:10:35'),
(12, 'FA & Admin GM', 'GM HO', 1, '2020-01-24 05:45:55', '2020-01-24 05:45:55'),
(13, 'President Director', 'Paling tinggi di widatra', 1, '2020-01-24 06:05:20', '2020-01-24 06:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori_beritas`
--

CREATE TABLE `m_kategori_beritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategori_beritas`
--

INSERT INTO `m_kategori_beritas` (`id`, `nama`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Olahraga', 'Olahraga', NULL, '2018-10-03 18:33:01'),
(2, 'Politik', 'Politik', NULL, NULL),
(3, 'Umum', 'Kategori Umum', '2017-11-05 19:16:30', '2017-11-05 19:16:30'),
(4, 'Penemuan', 'Hal Baru', '2018-05-27 23:11:43', '2018-05-27 23:12:04'),
(5, 'Science', 'Tes', '2018-11-22 21:01:07', '2018-11-22 21:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dwi@widatra.com', '$2y$10$KKt.OeDBJ5FNEmlgMnrQSO2u6NP4BZb1QQg3wGkhR9WVB/JlI8Fs.', '2019-12-21 00:03:43'),
('wahyu@widatra.com', '$2y$10$5aKQpMUtEP4XAO2usAQI/uDAtkOUdA4y7yXfEz0Xa8ij12XhMsD.S', '2020-01-24 07:51:05'),
('angga@widatra.com', '$2y$10$7zHHzwPk1O/dWdp80orxZOKy0cdOPLpjs5tlFDVC9UvcSIEgF9MRi', '2020-02-03 03:00:03'),
('zainuri@widatra.com', '$2y$10$Uai9F0m42f4OgMbMhBArq.8qD4.SPj4WlzjqZaYGXppeHvK8Pea5G', '2020-02-11 08:26:13'),
('masud@widatra.com', '$2y$10$V7kcZcbvznK4n2xEf1TBSe508tygNbJrkLcEQ7oAHbGcDRXESY/z.', '2020-06-18 02:28:09'),
('desendy@widatra.com', '$2y$10$A.loC9c2IH/EM7KG7eBPm.a4pQa.oym.enuvp9xUhC5443L6fWMWC', '2020-07-13 03:52:55'),
('diva@widatra.com', '$2y$10$bZVwXcXlUF/DbIMqZcqL.upfN0B8LTW77oFKjJkDzjE8wqPT9YVam', '2020-08-26 13:24:28'),
('rumbita@widatra.com', '$2y$10$Xe1LmCPhF6qRJXZoCpAJJew.SoaRekU5yARiAEnV4DezdEeFRKgDS', '2020-12-10 02:28:02'),
('tineng@widatra.com', '$2y$10$rISLB9P4SFd3Sf19AMNlRuFw7TTot1OL4sEyVa5kxEAxbTaOOwDqu', '2021-03-15 02:20:48'),
('anggi@widatra.com', '$2y$10$lU/jYrUsgyHh3d7We.uMI.w.bmVLyhdvM1.zuYW1XSuskZPWAuHWa', '2021-03-29 05:27:28'),
('budi@widatra.com', '$2y$10$3jRu2s8YqnLb0HYKA/J92eHuFV0jC0.DB0wLYewtXxWZ/S2bX5YfK', '2021-03-29 06:44:49'),
('benpinter612@gmail.com', '$2y$10$4kpCnAeBTMxaxtVfdehYA.zrNiTYoOmOIfqheB/6PX41XrFbXQv5a', '2021-04-12 03:20:41'),
('khasanudin@widatra.com', '$2y$10$vznYJ2mw42DhgZ8DFwWqG.ZckP98rGfmJuy.ZVtXYVzkAfPM4Bh0y', '2021-04-13 06:41:08'),
('windy@widatra.com', '$2y$10$yE2.GW0uxDWvnQbwJUm/qOKA2ubmta3fzt2c.qO5SQR4bdpnisoki', '2021-04-30 01:40:30'),
('ichbal@widatra.com', '$2y$10$rZOYze4ZLcn/0eVw2KTS7eDUqz.PhhZRToWpEWz6pKju3ouewU5fi', '2021-06-04 02:46:19'),
('dian@widatra.com', '$2y$10$I6mwt6LGOdJ12emsJra5FOUxSgozkBGE7LXRqRI6K9aVEOU/84iTG', '2021-06-24 06:45:54'),
('agustono@widatra.com', '$2y$10$sPnVw9PpZtZQ8Nc9lP2m4.q6oHI.NxzxBZbva.N07TL1souacgj7W', '2021-11-24 01:55:05'),
('administrator.qa@widatra.com', '$2y$10$EyZ5XDr9/OBiDPeUBLAVzOyq2.j4oZpLLyPSvHMS53NZycmc2Fo.q', '2021-12-15 09:07:57'),
('arfian@widatra.com', '$2y$10$RoPjtrLWQuGse8Jo5q6i1uenhen2d61xSWJF0SBT5WBDsYu6Ma9XS', '2021-12-15 09:31:43'),
('silvy@widatra.com', '$2y$10$m0zteGHodf1pfdeur.8v2OWx4JRuuyJfXGWH09zBWIgOlqXhE99Le', '2022-02-18 06:25:10'),
('yustine@widatra.com', '$2y$10$1cOEUhcR69qKCHdH.az.lOp276vTkR9l5LJSwe4.gUMzfKiWbuTwK', '2022-04-20 03:33:40'),
('Gita@widatra.com', '$2y$10$76KNAkgH/quBjpYbVMBJOeRLTvA./cz26dvd/t9v9e.JTW3hWk0my', '2022-05-10 07:15:22'),
('sena@widatra.com', '$2y$10$P7nuP/iS8pSZWoZT1fucM.xUGjAEykG0jdqy/BK3yeJYm63e5aav6', '2022-05-12 01:48:09'),
('abdullah@widatra.com', '$2y$10$422cUImhD2Tf2/B0fQgT9.vFkLWzfgHaurtgbZ0YJ0S1v3VNV0Fje', '2022-05-12 03:52:26'),
('nusandari@widatra.com', '$2y$10$5X/2GpS126Rn64RSSlLC..mzCH4uTXJjiL/lGLWEU5HniVbZtn/HS', '2022-05-20 04:10:58'),
('septiana@widatra.com', '$2y$10$BCyjgS5vD54uuzdPifSIVerA4PU.Un4rwQ22CSxbIE7MvdjlO3tPO', '2022-05-27 07:18:57'),
('surjiani@widatra.com', '$2y$10$l4aSPTYuSDzGMgD9n/Dam.DK8afZo5W3fftKIA2esBe/lI.MAgGzq', '2022-07-07 04:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_beritas`
--

CREATE TABLE `t_beritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_berita_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengumumans`
--

CREATE TABLE `t_pengumumans` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `web_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `department_id`, `jabatan_id`, `active`, `web_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@widatra.com', '$2y$10$UVHi4oTqAHUu4Ax/l7VZBueVFcutELKxgxOmZ.38oKQJ4u5PphePm', 'WSl9HnkOT0ywsOnjq0ANAzx9QDdg2GaDxobmY5j5Q3BGBM1BGLwsUb3WNGw5', 10, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3MTgwNDE4LCJleHAiOjE2NTcxODQwMTgsIm5iZiI6MTY1NzE4MDQxOCwianRpIjoiZlYzSHJaUlU2aEdRVFZPWiJ9.XsYgn4O8yx0ktI8AXQCr5cJAzcGCCf37qfe6FKPOXSQ', '2017-10-19 02:09:41', '2022-07-07 07:53:38'),
(2, 'Sena', 'sena@widatra.com', '$2y$10$9DYpN4EgjoMC8xPg591wNOmgBCHqMZrtYIm7idsvBFeZ3AfgpLYgC', '87lKbBTCpcr3edRLtwVVnniilghrUpsRn7pTOXJSs50OgSsDXjrL9aGJOy7E', 10, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3MTYyMDE5LCJleHAiOjE2NTcxNjU2MTksIm5iZiI6MTY1NzE2MjAxOSwianRpIjoiUmZpV3QwdGVNR0NVOTVlbSJ9.ravf71ipNFJHRqdOw4Tz0ebOW_11KxG0zzXPiDvmyo4', '2017-10-19 02:09:42', '2022-07-07 02:46:59'),
(3, 'Agustono', 'agustono@widatra.com', '$2y$10$Hksvqz/niTpXK9yk/Z9URe5yIBNXuBRiLCnmBrlBDpyMQufxQBMkO', 'otArwPP2KeQz44yfMeK0nuxxZqWdExunKxEPjFDVLzcu0Kd1JyzxZbrbWtdl', 3, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3MDA3NzE0LCJleHAiOjE2NTcwMTEzMTQsIm5iZiI6MTY1NzAwNzcxNCwianRpIjoiVGJ6UmhXdEdDaTBuaTVyaSJ9.0No1voFy1pgJhqpQycNTNlkyPEXHCQbgwgXBrV3Skdc', '2017-10-19 02:09:42', '2022-07-05 07:55:14'),
(6, 'Document Control', 'dc@widatra.com', '$2y$10$HE6EfNu0IEBqn1y1czxm6On4wjisod.yHITPrde8Ol7P0xVDqW9Vq', 'GbvysSIo2MFQadV1iVNgI3w8YEKKnZXzoTNH2bRDUVoweyN2CeAAxnJPJHcr', 22, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3NTIzNzU0LCJleHAiOjE2NTc1MjczNTQsIm5iZiI6MTY1NzUyMzc1NCwianRpIjoic2JRWFd0VGxtZFZNdWF2ViJ9.ULkV1B3CIg0jh_vo5B70vktcWXpVpj79HBVdYmvlzaI', '2017-10-19 02:09:45', '2022-07-11 07:15:54'),
(7, 'I Putu Wijaya Yuniartha', 'putu@widatra.com', '$2y$10$Ot2ksOsZ7z/77uRmMJaROe71RvDyD6IJ6lNCynpf634vOdFWNXBDu', 'IcjAjoNfQRKsSp3fnX0fvbdd312rFTe8l4IUPYrgSQe8eXuODy0VYAU65YDm', 2, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3NTA4MzI5LCJleHAiOjE2NTc1MTE5MjksIm5iZiI6MTY1NzUwODMyOSwianRpIjoiTzZPWHBEOFU2V2E2MFQzUyJ9.MZV17TIebp5Byqv2rblyIURn-bgIpJ7j9aX1vd2rtZA', '2017-10-19 02:09:45', '2022-07-11 02:58:49'),
(8, 'Arfian Arianto', 'arfian@widatra.com', '$2y$10$FQmvLLyBWfVb2qZfp3NS8OHZBDA0UsCNfUVx8QSQ5NOGNOPXnKm1K', '2OoVnmu45QjNNUc9hVwGyEo9FQpLxrlQGdka1y7XFyqt3pUEkfIO38fYnH1r', 14, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6Ly9ob21lLndpZGF0cmEuY29tL2xvZ2luLWNoZWNrIiwiaWF0IjoxNjU3NTA0NTM3LCJleHAiOjE2NTc1MDgxMzcsIm5iZiI6MTY1NzUwNDUzNywianRpIjoiNUlxYlZHaTFPYlRGWHZ1diJ9.J0H6wzxoazldn4QFyEyxnIfMhizjOAeslXwN3xX5IXw', '2017-10-19 02:09:46', '2022-07-11 01:55:37'),
(10, 'Dina', 'dina@widatra.com', '$2y$10$TrveErPPe6RZJNTNYqo6sunkCsxXxTjB116r6SegHOrl4xslYaMXC', '5FGWxBS4ys7PCewiRkj3D5jcL5kkEwHEKIEjRPu7IYlfBX77fbyY0hbB5CQn', 22, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU3NDI1ODQ5NywiZXhwIjoxNTc0MjYyMDk3LCJuYmYiOjE1NzQyNTg0OTcsImp0aSI6InN6SEZMVEI0UW8zUjU5Z1YifQ.XAoIFkHMWoznMvKjhjyjvfjHgawFp9iVKVK3-JQAcI0', '2017-10-19 02:09:48', '2019-12-24 07:58:54'),
(11, 'Hendri Yanto Prabowo', 'hendri@widatra.com', '$2y$10$Q2wUMbs/UnLg9CqQRZHm9.H.lGUVh5HcfyGFIFrgCaydrL5XgNPq6', 'tFNGiJ8PWePzE0dxkfk7JTLH3zQ0KtgJjcad2ECC43lxLftYhXwYjuvQYTWz', 3, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwNzMzOSwiZXhwIjoxNjU3NTEwOTM5LCJuYmYiOjE2NTc1MDczMzksImp0aSI6ImdkZHRqVHFlb2dmaW9lSHkifQ.OlnZoIxCiKjKh7owtY41Z1i5oR0dH_nb33GjiDhaPG4', '2017-10-19 02:09:49', '2022-07-11 02:42:19'),
(12, 'Budi', 'budi@widatra.com', '$2y$10$6ZS/4SLHbF6.YD0kObyLv.Lg/nqXUmSfjAyeReistHVUyn6xYA1rW', 'RVWFRdwwbYc2dDHC4XGtz5E47R269gFEMDsjsMjc22eDoLkUhppWC1NdgpJk', 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NjQ4NDM3MSwiZXhwIjoxNjU2NDg3OTcxLCJuYmYiOjE2NTY0ODQzNzEsImp0aSI6ImJONGlmOXpKWnJtTHdxN2YifQ.wbF1a9CbyncONON80hoH_P5t8mIt-XXjn_kA9te6Nq4', '2017-10-19 02:09:49', '2022-06-29 06:32:51'),
(13, 'Dwi', 'dwi@widatra.com', '$2y$10$epBYvjUvClfqjjJtPooMj.w.rCN48ha9gD5FYzmjMa7CGq5cPvCv2', 'SidL7T546NTxZwN1b4FbLT1A1Bc2kfp3uY1T1psWmMiMJtwFAPKXyx3U5UcR', 3, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzI0NDg4NSwiZXhwIjoxNjU3MjQ4NDg1LCJuYmYiOjE2NTcyNDQ4ODUsImp0aSI6IjJsUkRkN3VqZ3AwNXRLYTYifQ.zWCcT_Etj94PMoxJ_-yLxn-7CvBhSuY_Aun4h5usXwI', '2017-10-19 02:09:50', '2022-07-08 01:48:05'),
(14, 'Hariyanto', 'hariyanto@widatra.com', '$2y$10$apoFpNSrEkd7CGcAaU5yQ.S3KsqiaxH0uZyhEKo6Lc7vnQUo7XYDO', 'DlcoGSACb9Xge0zo08PLq34vkTyYj278oM5NmykUXYeahQG1tNFRyLtOhN5D', 7, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU3NzY2Nzg4OSwiZXhwIjoxNTc3NjcxNDg5LCJuYmYiOjE1Nzc2Njc4ODksImp0aSI6IkVPRHRnZlhVeDdwWm5tcGIifQ.JWqb81kDV1lRCCzpO9WbCQrwMfoglTdiHeCi9I22YV0', '2017-10-19 02:09:51', '2019-12-30 01:04:49'),
(15, 'Lukman Nurhakim', 'lukman@widatra.com', '$2y$10$wAMFJdfyUjbuiU5eEU.QtOL7Ur8brOzN15bWh.M0rIQn21R5.YBUa', 'QWXyy8XljZ0hxyLf9S8rAiCte5mbtMOAe61513UJ2Z6rdVJA6Zq95EYiS8EQ', 7, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MzYxNjgwMSwiZXhwIjoxNjUzNjIwNDAxLCJuYmYiOjE2NTM2MTY4MDEsImp0aSI6ImNDZGNQN1NsUUhiSDhlaXgifQ.gCTRYWb0-GrRcMikukZx4Ky5cQRFiRz1YIiuoMGJmyM', '2017-10-19 02:09:52', '2022-05-27 02:00:01'),
(24, 'Insan Suri', 'insan@widatra.com', '$2y$10$Jf5onYSOBdaIm8ywwph49.RL7q1z6uAYYh15EWzkY0NdStIodzDJO', 'MUk74K5heer9WJGbTd8JhXR41g2MiRRCtacL50N2hClBb5kZLn0G7UN0Z5JQ', 12, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzE4NTYzNiwiZXhwIjoxNjU3MTg5MjM2LCJuYmYiOjE2NTcxODU2MzYsImp0aSI6IkdHRkRHZk5tMmdnWTV6bmUifQ.9zBaM_nVIfy2rDul3YLLIs92x_L6RO8yBxZsCJ4BEl4', '2017-10-22 18:36:27', '2022-07-07 09:20:36'),
(25, 'khasanudin', 'khasanudin@widatra.com', '$2y$10$JB9CyAfehu1vO237MINn9ejC0P4G62jPhuqiXSW.mZNGE3GJ0lEOG', 'KK9Cp2ibgIx8ZfjppczLC93gcUj9jze5SnwsGrCxuA2XCshex5VLCBC8G9Vl', 10, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUxMjUwMywiZXhwIjoxNjU3NTE2MTAzLCJuYmYiOjE2NTc1MTI1MDMsImp0aSI6IkI0T2xINFBTdGhIWDFvMEEifQ.O7uxELsJJFB-h3SWX90Ozwwe2lT42OlLXLGGtEWY-jo', '2017-10-23 00:45:40', '2022-07-11 04:08:23'),
(28, 'Anggi Bagus Pratama', 'anggi@widatra.com', '$2y$10$VgJr4SU2yEfpnQpmEaBH5.Gj0tlSKMwSP2fiHeuzJo9Nz3cH9V4EK', '5JnHBiJXm1mfXBGdggcvE09QTiIY22APpqbns3C5agpUcshwyorTPIiFdvnS', 10, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NTE3ODc3MywiZXhwIjoxNjU1MTgyMzczLCJuYmYiOjE2NTUxNzg3NzMsImp0aSI6IjhDNU9XNTQ1VHdvSU0yYlcifQ.bS4k78tv-hYfknX2H3FapPK2ek2F6V9YsZe94iqVcuE', '2017-10-26 00:33:24', '2022-06-14 03:52:53'),
(29, 'Yustine', 'yustine@widatra.com', '$2y$10$7DUV/g4fJ/ddoY4QjNmN4ed9n4v6vG9/.HjsIMhFEvZc864ZhOG5a', '257eVNXhLwmyssopn3Uo0lAUvZ4XWe8jUHtuOY4VupUS8bSZPfWviijY8u38', 12, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MDQyNzAxMCwiZXhwIjoxNjUwNDMwNjEwLCJuYmYiOjE2NTA0MjcwMTAsImp0aSI6IjBPT011OWpTckYwcENuYXIifQ.mryul0rQP-eR3CoAHMw_pLxVi6LqR9ZpQZ--MPsDgd0', '2018-01-18 00:30:15', '2022-04-20 03:56:50'),
(30, 'Mega Ayu', 'ayu@widatra.com', '$2y$10$n1xUcDi5MydJYzbOKM0aXu0gXC60fhsLf58i.jc6l98h4DGX3rrkS', 'gayEQug3DscSbWL7pE7PDiTXcuRMxVS5nTwcvpo2FSBTO8CV4vN3g5LVIvK8', 12, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MDQyMzk2OSwiZXhwIjoxNjUwNDI3NTY5LCJuYmYiOjE2NTA0MjM5NjksImp0aSI6ImZ5akZFMXgyZVhtdk5WdG4ifQ.t9ZyXgMMycbkf1e3oQ8v3NFFelDB5Wwg4udGcw1981E', '2018-01-18 00:31:04', '2022-04-20 03:06:09'),
(31, 'Rumbita', 'rumbita@widatra.com', '$2y$10$H49UbBigcwnNhy1M95CwmuyHHOBh5ErXJz0J3jtVvGp3rFmizEujW', 'uy5F3lv6RtzsayHXTtpy35yyJTHaLSqodAUMpCF1HSDtOflvpjDHImxyvwjK', 19, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMxLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTYwNzU4NDM0OSwiZXhwIjoxNjA3NTg3OTQ5LCJuYmYiOjE2MDc1ODQzNDksImp0aSI6ImxtOVcwSDBibEhoUkVyT1MifQ.iBT5is9oR-jlP1wxQ3Am_a3deUobKI8wN5fiSY3X5aI', '2018-02-14 18:50:41', '2020-12-10 07:12:29'),
(32, 'Mega Muchzalita', 'mega@widatra.com', '$2y$10$1pRkg0jbLg1Rf94j7/wyuu.plMjfFbrG95WdD3o0YsCeQE1VrbSb6', 'at18J9T1TBPJzhOl92BjggmbQtLMkQna4CXSDCEDDNa8dINUNNoitTNfptlf', 19, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTYwNzY4NDc2NSwiZXhwIjoxNjA3Njg4MzY1LCJuYmYiOjE2MDc2ODQ3NjUsImp0aSI6ImhwSk1yR1ZqQTFtTDJUTzgifQ._on1PPBgVFUmJjaGo2lPOunvaUqSVy3JaNee4qbl-kU', '2018-02-14 18:51:54', '2020-12-11 11:06:05'),
(35, 'Gita', 'Gita@widatra.com', '$2y$10$MMRg2FaWbewVNn0GPFa3fOtxo/pTT7Xz.zHf1UR2y9Dh4iFRdnpg2', 'skLbushHwQ1Em0Szt7YstQip3ZcribjkjoS0LOWJzZrS66fgG66IV0SYTgi5', 20, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MzM1NjY2MSwiZXhwIjoxNjUzMzYwMjYxLCJuYmYiOjE2NTMzNTY2NjEsImp0aSI6Inc2WXNzRlN5Wks3VjNOa2QifQ.88t73PMY7MQad5W9d8OUoDzAdhev9st7TP0JgoK0onA', '2018-12-26 18:26:48', '2022-05-24 01:44:21'),
(37, 'Nuraini Azizah', 'nuraini.azizah@widatra.com', '$2y$10$aDNkzUnK8K2MjFOW0lLm2OlFedeIHrP.hmIKk5z3Gti0SedIwziIu', 'fjGklMPpppKU5RyzBhT3uoDR87dVWQy1RojDOuPUkuCANNrDn7YBJjlzJDFz', 18, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM3LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU2Mzg2Nzc0OSwiZXhwIjoxNTYzODcxMzQ5LCJuYmYiOjE1NjM4Njc3NDksImp0aSI6IjZ4QWJUV0w2YXlhZmhacWcifQ.LdBGQmk-KSLuwMxLk9tTcJXn7Q7z4H5PNCiqr8jVsHE', '2019-01-21 18:18:36', '2019-07-23 07:42:29'),
(38, 'Septiana Meliana', 'septiana@widatra.com', '$2y$10$41jv95B4SfdHISjSQBRpI.PxONy870fLBqMgcN2IvVk0eMwqLy9j6', 'eVZAjjbXi8Lyuka73ns1r4cRp4sNC96r5aA64kiYCzMfIXWYwA0Qb6pMAIJU', 19, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwMDY3NCwiZXhwIjoxNjU3NTA0Mjc0LCJuYmYiOjE2NTc1MDA2NzQsImp0aSI6ImdHNk5RTDRWakRBRmFWS1EifQ.eAJU_3kAJAicMLHg64_vNd83lwQvYk9kYXBgqrEhfTQ', '2019-01-21 18:19:29', '2022-07-11 00:51:14'),
(39, 'Surjiani', 'surjiani@widatra.com', '$2y$10$IRVvzyq.tdKCYMwxspXMOub2maiNHZ1vEeg9ax6XnPGg9YgdIbDOe', 'EXDHDfTWFZseMjW07ILF3x7WGNRSz467lxKRXWp9JIbYAs9vwH2HRlGdPGXa', 19, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzE3MzM0OSwiZXhwIjoxNjU3MTc2OTQ5LCJuYmYiOjE2NTcxNzMzNDksImp0aSI6IjNadThRTkJzZWJKTW9sMzEifQ.JKzYWQGqmERQMspatzAWGCMg5Z7RcauszdE02dgnPAg', '2019-01-21 20:03:24', '2022-07-07 05:55:49'),
(40, 'X', 'none@dms.com', '$2y$10$ABnOMc5jVA4kP0AZRTwDMuqH8tYLWLm6InT4/jJ0pUq33JEZFsqES', 'h4GLzr1SOVujyytiwT5HF4FbnQomE7bgMSXoq7BvRoFcUOmITak8ysEYys3b', 22, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU3OTQ0OTA2NSwiZXhwIjoxNTc5NDUyNjY1LCJuYmYiOjE1Nzk0NDkwNjUsImp0aSI6ImFsUUZ3UmpFdUZONVdZeXgifQ.hFu5AvWnYsjJx4Ea8OaYZcgABOlaeXKt6_Cdn_xg1fg', '2019-01-24 18:48:05', '2020-01-19 15:51:05'),
(43, 'Dona', 'Dona@widatra.com', '$2y$10$NSD0ypjXXmvBTHBLJonf/uT/9fLVXy9K9l80K4RkSKAgVRHSNvRuW', 'mTi46UdyAi4eXXpNd7pR2tFY6alRNpsZhO4HzPUFNSR8e6RLi9ihY9RsKd4T', 25, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQzLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0ODUzNTU0MSwiZXhwIjoxNjQ4NTM5MTQxLCJuYmYiOjE2NDg1MzU1NDEsImp0aSI6Ik9LQnBGc3FzWTZGYUFuNGQifQ.TC-Ws60jRg-RO8wVVfAk-wN0a-3vnrTXOOTr5R08ATE', '2019-01-30 02:06:35', '2022-06-20 03:00:43'),
(45, 'Naning', 'naning@widatra.com', '$2y$10$sQM4B9Gauhes1ca.KOzEiu6rv0MPjH0FqJbeKepeJRy7RW5Xwvvyu', 'ScEVI7ppB5IBfUkZhsPYiZaqLZYOXgF6wZ0OAAWp8woc0FVDGtblQwGkRGg3', 25, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUxMDMzNSwiZXhwIjoxNjU3NTEzOTM1LCJuYmYiOjE2NTc1MTAzMzUsImp0aSI6ImV4ZUpOckhxRUxpVUVwOXYifQ.VJg1FnlFUf3xhoJTXl5mRg4P60ZF12ngeIELXdHG4-k', '2019-03-28 00:54:54', '2022-07-11 03:32:15'),
(47, 'Denny', 'denny@widatra.com', '$2y$10$AmBj/PgJd2BNc6tn/BB3z.74oNvnRVw8VVnp/IxNqHR0C3nQOl7W.', NULL, 7, 7, 1, NULL, '2019-03-28 00:56:27', '2021-10-18 07:33:19'),
(49, 'Fiki', 'Fiki@widatra.com', '$2y$10$.MufBVFqU2PdxkfHK6qfveJLinLCM.ezjRzRvS2yqd6.ckUcpD69O', 'T85pAoHPc9N2Nl6bdtbJorpRkHOtmWWZkmwEv3Ms8g0iyQPzxtLLAvSj0ZVW', 6, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0NzMwOTQ5MiwiZXhwIjoxNjQ3MzEzMDkyLCJuYmYiOjE2NDczMDk0OTIsImp0aSI6Ik05c09ZWDFNWUZaVVg1aEIifQ.gL_zzUU8qFm2bUhYLM6jVlydNeIzEEIBqlfpsteBCFM', '2019-04-09 01:34:39', '2022-03-15 01:58:12'),
(50, 'Hendri Hardian', 'hardian@widatra.com', '$2y$10$WpuVNkJ8zzwOFpqX2Iya8uzPi11jzOyE3xyOE8hx7JVJhoPOnWHhW', 'g1YsDMvOKpCl9VD3zQHWOFbMQ1vXmm5HaP8CbMrqMpTaKoBQD3gXxgVo8Se6', 6, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NjA1MTQ5MywiZXhwIjoxNjU2MDU1MDkzLCJuYmYiOjE2NTYwNTE0OTMsImp0aSI6Ik41MmZIWGI0blhobzhBczYifQ.XqfWgGp-Xgvmge_eyObusvA3t2dpHPorS_hVYmHVGiU', '2019-04-09 08:02:48', '2022-06-24 06:18:13'),
(51, 'Budi Hartono', 'AdmGudang4@widatra.com', '$2y$10$CIvNvrtHX/gd5hGL5GW2A.asVA1ys7qHA5bcG4QLh2Kp1RvWkz/fy', 'LzeIvqftzf8RGgmOslpOex5ZuK2xOIGHAyNH86NknSOhF33lmTP0DLMJxLPK', 6, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUxLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwNDMyNywiZXhwIjoxNjU3NTA3OTI3LCJuYmYiOjE2NTc1MDQzMjcsImp0aSI6IlRibFgyNXJ1bUNwd0ZmbjMifQ.yvAIrTnP2xx3R00NTTRcf2sm3prLvvWtrB7NZsWDW64', '2019-04-10 04:13:24', '2022-07-11 01:52:07'),
(52, 'Sutrisno Kurniawan', 'sutrisno@widatra.com', '$2y$10$O7fdxY5lLsJ0Di7VCNtqIe3i3VN9waDX.IdwLeMp1WaYZLMkEk3z.', 'itxOXR4OLSZoOBUqA9DVh7DPmez6HrPzbWJASWgHA3ttF7HrB160bUY6AuiH', 3, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwNTU5NSwiZXhwIjoxNjU3NTA5MTk1LCJuYmYiOjE2NTc1MDU1OTUsImp0aSI6IkoxTXl2RkxadGpKUGZkZXoifQ.8OrkjgANsStSSJ16ELrDKHVu2oeWdtv5iA9Nw62outw', '2019-05-24 07:12:30', '2022-07-11 02:13:15'),
(53, 'Denta', 'denta@widatra.com', '$2y$10$Fz9YdKKYpHfxiI9nUgnSkOy/.XhQIxKjg8SJCxfiiAwq1hWP.WGEC', 'rejZ2lxgP3N5obqmcx2M18XkpfgdTsLWPvWeIrIBGcYzTMXqQnQ7aQ0FNFZx', 9, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUzLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU2NzQ4NjUwNiwiZXhwIjoxNTY3NDkwMTA2LCJuYmYiOjE1Njc0ODY1MDYsImp0aSI6ImdPYUV2aXpTa2dEWG1LOVcifQ.lV67iIwlsvhSiExxP9MK3BwJQM-qL_AYaxz6Eig4mFE', '2019-09-03 04:37:15', '2019-12-03 06:43:04'),
(54, 'Windy', 'windy@widatra.com', '$2y$10$gQbHZmX9t1aEcHRaiiJR9eI.AM8G02lPn1xVr8yOPU0HNIZClI1SS', 'EqN1hSTIUioSY6JChE7ptrTvpwbigMjmGJcrtocF3r273YUuFxvOEXd2gCzE', 20, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0NzkxMjY5MSwiZXhwIjoxNjQ3OTE2MjkxLCJuYmYiOjE2NDc5MTI2OTEsImp0aSI6IlFxdjhHN3dpc05nNmhaQTcifQ.5n43oPm2Brk4aFqjoAUaCOx-CCk4xLBD2yHAldjxOTs', '2019-10-31 05:45:31', '2022-03-22 01:31:31'),
(56, 'Johny', 'johny@widatra.com', '$2y$10$WJCracpE9MHSOn8AP40TvOgUfaHZL5TpxBHq0fGwpVIYY4t4REmnS', 'oywGan7fJyyuP07efiFcvdrg5IO9C0lcifU24H5EfDQFD8gOKfZNxVYCq4tg', 9, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU2LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzE2ODY4NywiZXhwIjoxNjU3MTcyMjg3LCJuYmYiOjE2NTcxNjg2ODcsImp0aSI6IjFyZ0ViQnpqVUtxOWZDcjEifQ.chu2ziMHX1hzGnR4vu_l0F-3pPCEz6msg7CFyhdlHRw', '2019-12-03 06:44:16', '2022-07-07 04:38:07'),
(57, 'Diva Malinda', 'diva@widatra.com', '$2y$10$06ibGm5dHtOgS06dBDD0M.8gO1BTYuhIXsO/uoX4rJogBqGjJnjtW', '0iJ5HTdxpMj5mBtZIcHQUqntJUfZeJN9QqIP7gpKAmFkIPgimqALqk4qTqoJ', 9, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU3LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NDEzMzgyNCwiZXhwIjoxNjU0MTM3NDI0LCJuYmYiOjE2NTQxMzM4MjQsImp0aSI6IkljUVhhRVdWTXN0d1RkVWEifQ.xu8kRh0rzV3QLv9CpbxjiZQ9ns8PN4vEjqxJQ1Sph2s', '2019-12-03 06:44:54', '2022-06-02 01:37:04'),
(58, 'Betty Zubaida', 'betty@widatra.com', '$2y$10$8nridcx9F0r3PB89Irdy7.6FAnGVOhWQ9R27w/n2u3akpRSVD6WX.', 'mqZBuUjMibFwq0VaUaOFB4wAiAlI4BXIc8sVRNlvDJ73avoSfAZNK0r0vggG', 1, 2, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU3OTcwMTM2NSwiZXhwIjoxNTc5NzA0OTY1LCJuYmYiOjE1Nzk3MDEzNjUsImp0aSI6IjkwandEQ3YzU21NUUVVU2cifQ.GFHslCpAvTtvGybb9h1nLagKiKik6IZz9VizZRu1eqc', '2019-12-03 07:37:50', '2020-01-22 13:56:05'),
(59, 'Samsul Arifin', 'samsul@widatra.com', '$2y$10$yyoBQ7UnI4xInwnsIYSDFuxCCrlnCJ4sU3sETZCiRw.u60usRBsXC', 'RxpFX7uyURSlAS11Ymr82tfechNhAUv5s7nS3KdkME4BQZTEqT4aUexwostq', 6, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0NzIzNDQyMSwiZXhwIjoxNjQ3MjM4MDIxLCJuYmYiOjE2NDcyMzQ0MjEsImp0aSI6IlZZSjYzMGt2Snd6bFNCSWMifQ.j1jZUA-_vGSwOV4sAUB83oQiUGsCOmL_5mbkojncZUw', '2019-12-03 07:38:40', '2022-03-14 05:07:01'),
(60, 'Bambang Djati Sasongko', 'djati@widatra.com', '$2y$10$a8qYQCwm9laPYj8A.pvWI.nrFDo9.2wBdoiHiAVZ5rxbR/x8m2DiW', 'aRZSX60jE4SpF1nTZcStR2Dnogwje0lnnLAIvj7zmnEPcOraJuKAZ4WeNsoF', 5, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU4NTcwNzg4MSwiZXhwIjoxNTg1NzExNDgxLCJuYmYiOjE1ODU3MDc4ODEsImp0aSI6ImcxRmprTUtObVc1SXdjM3kifQ.pNqaKeV-y0Q-cdGWcS6VDZggKhjVjdqCc6g2w0zpzqk', '2019-12-03 07:39:25', '2020-04-01 02:24:41'),
(61, 'Moch. Effendy Wardhana', 'effendy@widatra.com', '$2y$10$IZTuvoOeemZKYiILjILeL.boLeWyaTzs9G2sP1NX9LPMJzvTZh.gi', NULL, 4, 4, 1, NULL, '2019-12-03 07:40:27', '2019-12-12 07:27:15'),
(62, 'Rizky Bagus Kurniawan', 'rizky@widatra.com', '$2y$10$ZsEXxSgWXDHBsSzVCwMwG.InhQRYw0OuFJV/k5uxAaIKr3Td.YgPS', 'p3yDNTby54oQbbYEvwZZQ7MUBYVo6ci40KHXE0JHPmHi9AgPRNI9dnP2SR7z', 2, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NjU3ODYwMSwiZXhwIjoxNjU2NTgyMjAxLCJuYmYiOjE2NTY1Nzg2MDEsImp0aSI6Im5xZFNZOWo5MFlZdmkwWE4ifQ.Dgcy74x4HR0yTQ0IdxZ5hibxFzNEif0rzAl-7ZhDZ5A', '2019-12-03 07:45:24', '2022-06-30 08:43:21'),
(63, 'Dian Anggraeny', 'dian@widatra.com', '$2y$10$MmY2W/9.r3aLJRkwp0rDgOckRNrr/3auXMxVGmJY.KiQUerqL6vR.', '8C1qFxcpkVAYNAfSWK6sGmnubW6O4BVa3KPNptZNTdmZWwqkssMcUJeUP4Dw', 5, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYzLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzI0NjU5NCwiZXhwIjoxNjU3MjUwMTk0LCJuYmYiOjE2NTcyNDY1OTQsImp0aSI6IklDM2JnRTB6UGtaOERZa1AifQ.3Qjzak3LwwlbNYEMSpeqsq5MJEcUIHnfFZTGPvfE3K4', '2019-12-03 07:46:00', '2022-07-08 02:16:34'),
(64, 'Moch. Masud', 'masud@widatra.com', '$2y$10$A0tneoJRooOwzv8Ok/siHeOHPOi3yZJM0F.itBDW72dIVCDoeMpVm', 's99mxNVd6SmAu88anFq1S4DQQ1y5PYqAMY7cJTJNMGz66pxlk0SjTNinsV3X', 22, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1Njg5ODcyNSwiZXhwIjoxNjU2OTAyMzI1LCJuYmYiOjE2NTY4OTg3MjUsImp0aSI6IllKUUxCNWRiRkltc01COEkifQ.yD6GmBQrgg42ajQr1gZfoMAe3aQV6CuNA4-qWxPM3iA', '2019-12-03 07:47:00', '2022-07-04 01:38:45'),
(65, 'Suhartono', 'hartono@widatra.com', '$2y$10$bzS.RRXBC9fhVNBZLX7R4.SLt0dW5sFC7MsCLQQvzDpqyc22MwXcG', 'PgDrBdOtyENelR5tPtSRxn6ssWWXJ1Fq00zmdC7TvnR1KbtyR9Yrq79TNAZL', 6, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0Mjk4NzI5MywiZXhwIjoxNjQyOTkwODkzLCJuYmYiOjE2NDI5ODcyOTMsImp0aSI6IkxsZnZyYWJCbGJRSGNHU2UifQ.7FTVoSAZ1ZIUNk_-6AVnVt87jJyfGKNFj0xuAdgYz7Y', '2019-12-03 07:47:48', '2022-01-24 01:21:33'),
(66, 'Nurhuda', 'nurhuda@widatra.com', '$2y$10$yJrn9wI95B7uIYKgJ7WtnehhURRFR4VNQf75d1JRQvnh83uLp05Xe', 'T3d6FTitGZcBbN9RDG8IKmllpSmH7Qc6nk4jnK8SCszumqZzsWCOhY16LsG5', 4, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY2LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MTA0NDQ3OCwiZXhwIjoxNjUxMDQ4MDc4LCJuYmYiOjE2NTEwNDQ0NzgsImp0aSI6IkY3VkFCeXJ3TVJYOGJlR2oifQ.9cAl8lbo4m29-4MJvOdWCrWVsri0OpsLR_gVeYMdLjc', '2019-12-03 07:48:50', '2022-04-27 07:27:58'),
(67, 'Ichbal Junaidi', 'ichbal@widatra.com', '$2y$10$89aPZ6Ckov.FWjg9E6HgEus3bYeDmIy4vjjt83pmOGWb6xN/YgTde', 'mnikzg36DQOWOeLCdDJIoBOkDYYlrVJgazX3hiPXSKoxO204zXLOr3zhpQ9a', 12, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY3LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUxMDM3NSwiZXhwIjoxNjU3NTEzOTc1LCJuYmYiOjE2NTc1MTAzNzUsImp0aSI6Ims2a0ZDakx0bnF4NmhwVkEifQ.6ig1bwWFeyS5D8ll0kq-69vDQGhHF712_GDfF8AgdwY', '2019-12-03 07:49:46', '2022-07-11 03:32:55'),
(68, 'Yoyok Mardianto', 'yoyok@widatra.com', '$2y$10$anBs2NPM9.UXAg.sbdOMRO.m7Y9Y0XQNnDy3j5ebns5Xt316mIare', '5NlIiuYgKRx6C2M5qZn5DOF8fg1XRWsJAsYvVoU5g3DsB9hxuiw9DEkZa9Ur', 7, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTYzNzExMzIxMywiZXhwIjoxNjM3MTE2ODEzLCJuYmYiOjE2MzcxMTMyMTMsImp0aSI6InNRRlBZbEY0SDZVNkJLM1AifQ.qt70J3aLm26uyADDNCt5GJyEa3GaWKla62OOqc-3YnU', '2019-12-03 07:50:30', '2021-11-17 01:40:13'),
(69, 'M.Syafii (B)', 'syafii@widatra.com', '$2y$10$ktr8KlI.YBA1nfbb96FdWeT.iALP3UNL/87ZE5s/VYtkt4lZ1E9M6', NULL, 2, 6, 1, NULL, '2019-12-03 07:55:29', '2019-12-03 07:55:29'),
(70, 'Arian', 'arian@widatra.com', '$2y$10$Ip9dSzR25tPz2dyzgTFBYeAX43ZvZ6GIXDVdDDwxPaUMm.mE9Aob.', 'aOyhh1LoF6mClkIY8mtPSq87FXd0U9E7Up4RoLE43E4XIFCrdIlI8bdq03QC', 2, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTYwMzMzNzUzMywiZXhwIjoxNjAzMzQxMTMzLCJuYmYiOjE2MDMzMzc1MzMsImp0aSI6InJPQVJjVkpVYURHVlpiTHkifQ.iEKt8iu_gcM6xvORtvS2koW2njmS8U4eCn0uBi0-iUU', '2019-12-03 07:56:01', '2020-10-22 03:32:13'),
(71, 'Eka Sulistiya', 'eka@widatra.com', '$2y$10$Z1gJBOKmdDqHCdn7o9UTEu.GgS2EW3Cf09KLD3b.Q71TqxKUGbGpK', NULL, 3, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcxLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzE1NDY2NSwiZXhwIjoxNjU3MTU4MjY1LCJuYmYiOjE2NTcxNTQ2NjUsImp0aSI6IkNLdXh0d2tFdG00TnBWSHEifQ.n7wncx2WqIF_194fh-R2QhrQprvwyiRrjshY-u7kI0Y', '2019-12-03 07:59:14', '2022-07-07 00:44:25'),
(72, 'Auditya Angga Ariftama A.M.', 'angga@widatra.com', '$2y$10$Uagnbe.AbNHYEdaGNOCMDu/H.9tW.6XRfWok61WSgkfmQzsKCEivG', 'dpjmA2s4ciShJoW4Vrz4gUQGu9Cy1nlPmKbcMQ3mbkb92uckRZPwVuTI4GmQ', 5, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUyMjE4OCwiZXhwIjoxNjU3NTI1Nzg4LCJuYmYiOjE2NTc1MjIxODgsImp0aSI6Ik50MTdQMDhGUzJMQ0M4Y2wifQ.zMGwfAT2MV0jTS0V4cn-p0mON9bBaTkynagE0QSRwOE', '2019-12-03 07:59:59', '2022-07-11 06:49:48'),
(73, 'Mohammad Sokhib', 'sokhib@widatra.com', '$2y$10$/hi3Go0KYM4GmLoEXRd.w.AVcn4DeTIF0NZOqxx2/5rhkkJ1TmshW', NULL, 4, 6, 1, NULL, '2019-12-03 08:00:42', '2021-12-15 02:05:25'),
(74, 'Irawan Budi Suganda', 'irawan@widatra.com', '$2y$10$2/6ZZJkeIWcVX8DZvU4GeOM4iQX/SRstQfqWVehfgg4bM9/YZNoxu', 'gIvt2uFS85ZS5DLgOWMzl29CljtEsgs8x0TkVwxMEk7JewfmzoPQkML5Qvyi', 7, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NDY0OTE0MiwiZXhwIjoxNjU0NjUyNzQyLCJuYmYiOjE2NTQ2NDkxNDIsImp0aSI6IlpERGZZTFdpaEd4UWlxeUcifQ.O0GI3pe1kiBNUZgMZEsgmZ_hdX-yR9bw-h9-sr-1ZQs', '2019-12-03 08:01:22', '2022-06-08 00:45:42'),
(75, 'Moh. Khusen', 'khusen@widatra.com', '$2y$10$Ekt2dsP.OSUQXs3hD2NGc.arX3Pd1iajLk5PZAZwWDHUmZNiEgg9e', 'Mn1q7xfCJj1fqZHb7lHgzq587lLf8Fx5w2HCwOqzpUyfmroSYaGAdZmtuN2G', 6, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTYyNDk1MDMzMSwiZXhwIjoxNjI0OTUzOTMxLCJuYmYiOjE2MjQ5NTAzMzEsImp0aSI6Im4xZDFwY2t6QzhwZHQ1QzQifQ.qRbzOeTe9adtheO2yWFT0pFZ_KNSfQv7TYAQu5SPYfE', '2019-12-03 08:01:55', '2021-12-15 01:44:48'),
(76, 'Silvya Handayani', 'silvy@widatra.com', '$2y$10$Cwr91GvN4dawkvGvQVkBdOtEsNBNmCFhYYsJILfUSd3EEvTaqsvva', 'Q7h0X5S3n04BcNHmKn8d3SzjQDj12F4lRQJY6APkhIySQLBJZVp2d2pmXlwV', 25, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc2LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY0ODU0MzU0NiwiZXhwIjoxNjQ4NTQ3MTQ2LCJuYmYiOjE2NDg1NDM1NDYsImp0aSI6IkRKcDRjejc2dlNCb0V6TFgifQ.ihTHHRLvKw24ImjoXEJofAGWl3XHpXjantQID2146H8', '2019-12-03 08:02:50', '2022-03-29 08:45:46'),
(77, 'M. Sholeh', 'sholeh@widatra.com', '$2y$10$6jR7QzAcjFjUlumcBxg.mO52vgghJUPrXbnGbcq2ASB5WFRYhQgvq', NULL, 2, 7, 1, NULL, '2019-12-03 08:03:30', '2019-12-03 08:03:30'),
(78, 'Suharto', 'suharto@widatra.com', '$2y$10$.9/Lu/8e0KU8S9MrKiIEqu91gVgQH2CYa4J1LcHYnDAEUV2M0VGYy', NULL, 2, 7, 1, NULL, '2019-12-03 08:04:27', '2019-12-03 08:04:27'),
(79, 'Sutantono', 'sutantono@widatra.com', '$2y$10$Ejm2JwFgu9jXgNb5zNe8GuEF/aJs0O1NDDYhlVglFEOPxMc5ruQgi', NULL, 2, 6, 1, NULL, '2019-12-03 08:05:06', '2019-12-03 08:05:06'),
(80, 'Yogi Wicaksono', 'yogi@widatra.com', '$2y$10$WECPQe.z3pvN6tVEa3zCnOzPOqWKLK7IKJL7or/bAyieDcZSI7PwW', NULL, 2, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTU5Mjk4NzAxMywiZXhwIjoxNTkyOTkwNjEzLCJuYmYiOjE1OTI5ODcwMTMsImp0aSI6IjdTcFcwS2t3U3JsbFNaaE0ifQ.jbPDd8Nz79J7WeTladFpreqNazTh6mNEONX4UfDYUNA', '2019-12-03 08:05:43', '2020-06-24 08:23:33'),
(81, 'Dini', 'dini@widatra.com', '$2y$10$1Ca6q2mB0/zAIwM0Zsr4eOTJ4SGIAnLimM9JMu3tAMK2oqQ3BPtvm', 'yMIhDoRZr6iA13uZUonvxzZwjf2RZRTkCYnrcDHkbKZlwxqgK9BS4mZ30SKZ', 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgxLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzI0NTMxMiwiZXhwIjoxNjU3MjQ4OTEyLCJuYmYiOjE2NTcyNDUzMTIsImp0aSI6Im9YUncxOXhQSUtEaVFKVEYifQ.XM7YsXTtRDKdg6evdxmFpfpNvGAT3nfAAlf4llchEMs', '2019-12-03 08:06:30', '2022-07-08 01:55:12'),
(82, 'Supriadi', 'supriadi@widatra.com', '$2y$10$VrFOVwO6ZURhkuRcP1rDP.Z5YjRyhUjkM02emSzVvVvGjnU5OUZCy', 'TS04nN3KTuwQP6016dIPc82q6TUzGlJ3pAIM9X659CX2wcaWVdKgl0rZvDHu', 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NjY0MDQ1NywiZXhwIjoxNjU2NjQ0MDU3LCJuYmYiOjE2NTY2NDA0NTcsImp0aSI6Im9ZZDVQYjdJbzdyUnNRUFgifQ.Z9N-Opv1e5vRWKL3ngIJsrLUslF9NZDdOVOwy4kGIUE', '2019-12-03 08:07:03', '2022-07-01 01:54:17'),
(83, 'Jun Savrino', 'savrino@widatra.com', '$2y$10$sBKugRjV.gSJSR7Sru0n9OKOgstEnmPTjl8JaHGsOgL2y8q..OSDm', NULL, 4, 7, 1, NULL, '2019-12-03 08:09:54', '2019-12-03 08:09:54'),
(84, 'Andaru Wana Perkasa', 'andaru@widatra.com', '$2y$10$J/33I8zwWFMbTpELuIgdver4z6nvx6cYbSk6gTONx0Dm11F7XkHiO', '8Z03i7Svj2vWzSEOmGGLbDY92nKn7sjrSZrWFMiN7xdxNEp0WjjKNpjzHxmV', 7, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzAwOTA4MCwiZXhwIjoxNjU3MDEyNjgwLCJuYmYiOjE2NTcwMDkwODAsImp0aSI6ImUxcGtmb3lEYTN5eExjVm0ifQ.V1k1tGXQcWmZFNRneVyHCRlBzB9jrh2niHMhwRiVW5s', '2019-12-03 08:23:19', '2022-07-05 08:18:00'),
(85, 'Gede Wisnu', 'gede@widatra.com', '$2y$10$3n14ad5thHl2grZgBf2hPuG6scL6uWWDVfp3XO/uLE7h0cvpZM9OS', NULL, 7, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg1LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzAxMzcyMywiZXhwIjoxNjU3MDE3MzIzLCJuYmYiOjE2NTcwMTM3MjMsImp0aSI6IkpIbTJ1ZnVVVVlRVGtHck4ifQ.-oH05iEIQD1Y77V3iJr4xhLhs4uCy7t9gVJN-8bq2-w', '2019-12-03 09:09:10', '2022-07-05 09:35:23'),
(86, 'Ninik', 'ninik@widatra.com', '$2y$10$ZKkacVt9F228K29Zm9vuCOZrSUhQt7oLile2KLPEPVWoI9QppGQc2', NULL, 6, 7, 1, NULL, '2019-12-03 09:10:06', '2019-12-24 08:31:02'),
(87, 'Nurul Azizah', 'aznurul@widatra.com', '$2y$10$gSr/WQMcMQpZYpFK6O28gu3vba4F4jvniXQe7g4shJqN29B35oPAi', '992fOFUih6ciXlAa2NmG0XgKk0bvE8d4yzF81fa43O5uAGjqHGM4NvAhHX2S', 14, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg3LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwMDU2NywiZXhwIjoxNjU3NTA0MTY3LCJuYmYiOjE2NTc1MDA1NjcsImp0aSI6IjRZZFprQ2pNUFllVFhwVTgifQ.pqsw2_VQ5E_oZvsvpyRjdghB1fKAEm5oCJfh9d_IX3s', '2019-12-03 09:15:17', '2022-07-11 00:49:27'),
(88, 'Ratna Nusandari', 'nusandari@widatra.com', '$2y$10$KtBFGEWVKtRIxzMOTVmpjujV5M9i7uRcFyGRHNGoBHDnI43yP4IDK', '7kd5ylHd8WQfu36gQXb5eRDe9QqrkTEveoRydMSyh0nVv9808X8aLu7zHPiR', 14, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwNDEyMCwiZXhwIjoxNjU3NTA3NzIwLCJuYmYiOjE2NTc1MDQxMjAsImp0aSI6IlZJWktZN1NrQmgxRlRkNXYifQ.ljsjr8OgGBqP6_L2TGNrnEOUHkyJC5njjgms5FhamiQ', '2019-12-12 06:46:07', '2022-07-11 01:48:40'),
(89, 'Wahyu Sampurno', 'wahyu@widatra.com', '$2y$10$KQD753ZeL5tdsuD4B.Fy0O01KYwsQPfGbICDMcda8ACTWaEvAIv3e', 'gzrGo4Jf4oEte0IUVXsu1cQrXd6LRu5jE1i7tRVP0Bf3i89dtdBcsaqqPc4m', 2, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzE4MTg1MiwiZXhwIjoxNjU3MTg1NDUyLCJuYmYiOjE2NTcxODE4NTIsImp0aSI6IjFIaUpRT3NveFZuUlAxaGEifQ.zK6ji1qnPmL8MxXPNB339FbDvqsfeSIyKcyTzpeOdnI', '2019-12-12 06:47:07', '2022-07-07 08:17:32'),
(90, 'Ari Kartika Putri', 'arikartika@widatra.com', '$2y$10$2C1UodhdbPtCgAnFD7h6qOE5nq1yX7XICyJe2xEusIGP4ZsgTinsa', 'gf322agNX9bPrJ9QrDhGTo1OTseHyfQqDCv8fOjmveNFSwN2eXR3t4QHILzK', 4, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkwLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzI2MjE3NCwiZXhwIjoxNjU3MjY1Nzc0LCJuYmYiOjE2NTcyNjIxNzQsImp0aSI6ImdYekdJajVrYWpDTE1tU3EifQ.BJNluhJeK7dJq4CrvNprtRya7_xSWEljukwmMW0YrB8', '2019-12-12 06:47:54', '2022-07-08 06:36:14'),
(91, 'Arie Oktafiani', 'oktafiani@widatra.com', '$2y$10$iz/k2v3qUhBPSPL6FvXFzOAVjgf3Skw8s7InOlVacDeMUdC88wWFC', 'ze4dtpdItBJBA7Kr2X3cPysjqRRMSEEDEYYbSm1nP2dVHBk69mUSU9pjyrIh', 7, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkxLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NDU2NzAxMSwiZXhwIjoxNjU0NTcwNjExLCJuYmYiOjE2NTQ1NjcwMTEsImp0aSI6ImMwYlQ2U01OSWtiQ3lXUEIifQ.5z_24kQiJ8sAM5rj1ksz4sG5m79gbhR5ECpJw8Aa_DE', '2019-12-12 06:49:12', '2022-06-07 01:56:51'),
(92, 'Abdullah', 'abdullah@widatra.com', '$2y$10$CKBSBKne422yvya1YOdCAeUSNLMMLNZRqjMATdPYnilwxky04dzs6', 'Effwg7Hze8TEycgzYStuL1GNh3FWEIpMbnzZb851DhRyYshzNdR5ZOBLzrkq', 22, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkyLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1MzM1NzY4MSwiZXhwIjoxNjUzMzYxMjgxLCJuYmYiOjE2NTMzNTc2ODEsImp0aSI6Ik5FQ1hCclRERXNZcWdYWEoifQ.F_oDdHJbAuLwWA6utDzl7_5fSsaRACCOI5R3TsORe5k', '2019-12-12 06:51:01', '2022-05-24 02:01:21'),
(93, 'Renny Dwi P', 'adm.teknikal@widatra.com', '$2y$10$cgPE2ucD7daEvdNSrUTkUe3ZLjs/Vb398oQvEK1jgVWJyWNinZ92y', 'trY2OHWidw5YabwJTGPFzswOhZgrs9ahptNrlfXuhQ1cD1wGIRZfK3CVQ1Bg', 5, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkzLCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUxMTQyMywiZXhwIjoxNjU3NTE1MDIzLCJuYmYiOjE2NTc1MTE0MjMsImp0aSI6IlI2MjJ4MFRiVXlEYWd4VzUifQ.E8ZVMulEJ-fiQWjsCr9TiMFiWou75fUBLFAa5lItvjc', '2019-12-12 07:22:35', '2022-07-11 03:50:23'),
(94, 'Bismo Wahyu Firmanto', 'administrator.qa@widatra.com', '$2y$10$2kkY7/zp856JPKKbOSxa3eewpf/OPGg5rnLvk/bVBjQpenZPQF0Ti', 'ku7kQhFfmCrUnjC9Fb5oABCiW7jFikZg6LtQILrfvnAoimrpDjJX2bPj7VkR', 14, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk0LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzUwODQwMiwiZXhwIjoxNjU3NTEyMDAyLCJuYmYiOjE2NTc1MDg0MDIsImp0aSI6InYyZGt5OFZWUlVhSFFNS3AifQ.kbXvIHtowIDu_otk7Y3fv1F8EWy7CpnNnd6o0YMMUFk', '2019-12-12 07:23:48', '2022-07-11 03:00:02'),
(95, 'Puput Wahyuni', 'adminproc@widatra.com', '$2y$10$qHIL6wbQTXpYY3uXTms9AuWHntpym0pkruwy4N7dfMYxMYxJ86KAS', NULL, 6, 11, 1, NULL, '2019-12-12 07:25:10', '2019-12-24 08:31:36'),
(96, 'Sri Hidayati', 'ida@widatra.com', '$2y$10$yIB0OdtIwbdLTFAFv2JBzuA56QDWw9cDJJJttrMxRxOJ0ksLOBEnW', NULL, 2, 9, 1, NULL, '2019-12-12 07:28:15', '2019-12-24 08:40:34'),
(97, 'Mulyani Lestari', 'lestari@widatra.com', '$2y$10$xORmRksfj/eRXv8Jr4G.EOVYGc4o4hNCo/CQytEZ.AZihYqx/xUs.', 'FyjSbGP8sKT967YvXBL8K40tZN0V9jdPrL1w2ih7fQTWaYsMsVUTg51sqjpI', 6, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk3LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NjU2MjM3NSwiZXhwIjoxNjU2NTY1OTc1LCJuYmYiOjE2NTY1NjIzNzUsImp0aSI6Img4WFQ3eGlXSXZMV0hLMnUifQ.IsEJvdIKZziPUnTdku0VVLsk-YZAqGVW8qFQZh5bCqs', '2019-12-12 07:29:14', '2022-06-30 04:12:55'),
(98, 'Melody Bella Astria', 'melody@widatra.com', '$2y$10$ySnK0hjWBro5eCPxn3ZxeunBvTBrCHjFfH4/UaCJrpUwdGHu.KS6m', 'hjaleY0DcfsMzEeRFWsuHxfnkp6zVw0ySBnSylBnlHCl5iLGDPLbB1H7ktgV', 7, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk4LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NzA3NzY3NCwiZXhwIjoxNjU3MDgxMjc0LCJuYmYiOjE2NTcwNzc2NzQsImp0aSI6IkltY0ZTNGVxbkFzUGVBWjIifQ.sCddRQKcMIZ18y4UMPBkeZSXlrPL8Qm9Fe4xl2IAKYg', '2019-12-12 07:31:02', '2022-07-06 03:21:14'),
(99, 'Murti Alammah', 'mumu@widatra.com', '$2y$10$ZgOrpd00JzYSMC6BdmX88uwFJYB9rC8qM6rjvU9WMa4TDC72JA3gK', 'OGPYX2hPoX8YSmypFfdUBdRYpkb97jTcU7xK62Ji2BRkTF3Lfy1r9MXVYeFE', 4, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk5LCJpc3MiOiJodHRwOi8vaG9tZS53aWRhdHJhLmNvbS9sb2dpbi1jaGVjayIsImlhdCI6MTY1NDY0OTAxNywiZXhwIjoxNjU0NjUyNjE3LCJuYmYiOjE2NTQ2NDkwMTcsImp0aSI6IjB2YW1sUGxicU15Nk03aEsifQ.6GA455LMSiQyeOw56cSSZz2mdT6ktghPqWpw-VPMbG4', '2019-12-12 07:32:10', '2022-06-08 00:43:37'),
(100, 'Tineng Setiawati', 'tineng@widatra.com', '$2y$10$ZB/82unlIi3cvwjx4rK.8OaAjIu98WV1/BGxFq2wpYx7f/iW2dWzq', 'flfJNxSnXiqP0PbPEzogYdySlLGpFv84c12xbgdIadMD8Imx8m5H6M7BTb7D', 6, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwMCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2MzA4OTIwMTEsImV4cCI6MTYzMDg5NTYxMSwibmJmIjoxNjMwODkyMDExLCJqdGkiOiJCTFJYNmdsdmE4QUFGUGljIn0.R4W0OIASHeouEDDqlOc91_s6cb974sbp2If0zvNbO3Q', '2019-12-13 01:40:35', '2021-09-06 01:33:31'),
(101, 'Zainuri', 'zainuri@widatra.com', '$2y$10$dvdtr9ipeUxyZa7Tcs9CJeaG5ruGVq.MrQVQQWMYxJqFzAOdEwMCm', 'mXBUsoWu50wxW9hYy4KCUi37rg95sHEmJ3jJAwZWFQdqPTylzCywUeqa8mT8', 6, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwMSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDY3MDYxMzMsImV4cCI6MTY0NjcwOTczMywibmJmIjoxNjQ2NzA2MTMzLCJqdGkiOiJLVzNwZkdJS3pNY2lSc2hCIn0.gGIPHj6pDY_tKHmHgt_OnkwjsxsYjumlvMIioqapGF8', '2019-12-13 01:44:31', '2022-03-08 02:22:13'),
(102, 'admin1', 'admin1@gmail.com', '$2y$10$O7fdxY5lLsJ0Di7VCNtqIe3i3VN9waDX.IdwLeMp1WaYZLMkEk3z.', NULL, 10, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwMiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2MTk2MDc1NDQsImV4cCI6MTYxOTYxMTE0NCwibmJmIjoxNjE5NjA3NTQ0LCJqdGkiOiJMdGVUT0VoeXdhb3FWcTdWIn0.pNpPIUmMaQVvJFv3sRrMeii4btN0OXe7n4zCLyyIraQ', '2019-12-24 07:51:12', '2021-04-28 10:59:04'),
(103, 'Farah Rizni', 'farah.rizni@widatra.com', '$2y$10$i/vCsnlsPHLJsb0EHjwng.l/L8.1Aqta/qSM3Qxbl5QcBaNMNfMsy', '1Ihv6GcZAV2sBMv8MUCS7MGP7aax3rsZl0KIcxzVqHvYrUini0UemjNzZrsx', 11, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwMywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2MDc5MTYyNTcsImV4cCI6MTYwNzkxOTg1NywibmJmIjoxNjA3OTE2MjU3LCJqdGkiOiJ0eThCYU5zUWh5eGp3ckc1In0.TXJyULoesmFSnMcfxEh34Pm7vO8RV2YUyOKJ4y7U9pI', '2020-01-16 08:26:09', '2020-12-14 03:24:17'),
(104, 'Muflikhun', 'mufi@widatra.com', '$2y$10$1e/xTA98FAzHQTQNDCdEPeNmyiQrNHG8yYSONV6AeVNqBU2WwjM5i', 'Prat0cVidPtiYhD8YP9l1oe1pRcfJw4sZ2g8pfhIA71tOg1eiXcuf46ZJBRW', 15, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwNCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQzMjM2NTIsImV4cCI6MTU4NDMyNzI1MiwibmJmIjoxNTg0MzIzNjUyLCJqdGkiOiJ1VnFQbmRUNE0yWXFKdTFIIn0.H4SWFvIacmdZgYx76yXbBonhZVrlvuewrBBDnWLgSrg', '2020-01-16 08:27:50', '2020-03-16 01:54:12'),
(105, 'Arif', 'arif@widatra.com', '$2y$10$cR0LXTQDNT3Tm2CT/ybtlOo1MacIh/z8WOmlaatgn3M.A2pn2qPtm', 'aKqmCQolAEvE1Il0kFsAVPr92CGfOXmjDsXlRdYf1zSrvqAwMX3mDkB2zuVa', 15, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwNSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQzMjM0OTQsImV4cCI6MTU4NDMyNzA5NCwibmJmIjoxNTg0MzIzNDk0LCJqdGkiOiIwWldSNFFrNnZCSVRraGQ0In0.sMXmUJj035dUl5dLytDsAo89JP_gdG7H5kn5S3w5SBk', '2020-01-16 08:29:07', '2020-03-16 01:51:34'),
(106, 'Desendy Syafruddin', 'desendy@widatra.com', '$2y$10$9s1.dLaPAUHbj0EIpPtGgu4vjHXQ9Etkqdgff2sZw0W7f7IvWxz/K', 'XZfvRZTBk4JLF7WwWa2qmPgzb3oGaUcxbEv6UGFLNETgg72MmpesuJqUBnch', 11, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwNiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2MDczMjk4MjYsImV4cCI6MTYwNzMzMzQyNiwibmJmIjoxNjA3MzI5ODI2LCJqdGkiOiI4YThVR0I2c050V0NPS0MyIn0.pplsp0YQFBzcN-6T7DZ5nnEk2J7mhJMzc39msBCUNcY', '2020-01-16 08:30:33', '2020-12-07 08:30:26'),
(107, 'Product Development', 'product-dev@widatra.com', '$2y$10$yJ7SyiggKpTBRfKooh5txepw5tOVS1YYpjxP7rPEYbresGugieeva', '1ynHji4ppNO2FvXe6PZ27ys5GmI6YbQDt2BPVm1AyUgatNZlxt4HboKqmhbk', 5, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwNywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc1MDU4MzcsImV4cCI6MTY1NzUwOTQzNywibmJmIjoxNjU3NTA1ODM3LCJqdGkiOiJFa1NXeGZqcUppODNrbXJIIn0.Y5IWtCOvA-EsA6cVizVSVitxSG__Wpszz16DmaKNj6Q', '2020-01-16 08:31:37', '2022-07-11 02:17:17'),
(108, 'Technical', 'technical@widatra.com', '$2y$10$/tArq4trevNTRkDbj9w1hOSUmky3QKYLKwSqzfD5NI8uTrQ8mYjSS', 'zzzC4Hne9uYfBjPBCWxDmOCF2NMXPiuzWEt93OFmWmqLJaOYLxWi7MCxBHC4', 5, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwOCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcwOTYxMjEsImV4cCI6MTY1NzA5OTcyMSwibmJmIjoxNjU3MDk2MTIxLCJqdGkiOiJsOEp6dVRLRnpTNzM5UUZhIn0.FZTiyyqDijeS1p00DypjwnYRC8Hp0QTmqr92ijN9utY', '2020-01-16 08:32:13', '2022-07-06 08:28:41'),
(109, 'Lili Herliana', 'lili@widatra.com', '$2y$10$sASNSkvwspjp6SIe/j8FO.rMSAOo9b2VjhusOP.IgaUc1w4MJvy7O', 'UPdUC4kcdYiukZeWIiHVYsk32jKDyd08H2HOWGzcdvS8dDgiMZT1qgkLAmy7', 15, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEwOSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODAxOTM5OTIsImV4cCI6MTU4MDE5NzU5MiwibmJmIjoxNTgwMTkzOTkyLCJqdGkiOiJzNUZHaDBtQVJFZ29CSDlSIn0.PQsjTsqTcnIFHHjvtYmOW6j3u3_jhNYWwZtPa-aBIrQ', '2020-01-16 08:35:26', '2020-01-28 06:46:32'),
(110, 'Tri Laksono', 'laksono@widatra.com', '$2y$10$4FafMgGrmpQOPVfc251rM.I3YBakImCKejX6xCOqJhMn4R17oN7TC', 'r4YgwpYjDoCeRjsCpdJFvwmSUbMZZGvk7TOnrQ8qjD63wR77slokwrxoobbO', 8, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExMCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQzMjQ3NzcsImV4cCI6MTU4NDMyODM3NywibmJmIjoxNTg0MzI0Nzc3LCJqdGkiOiJWUjFTUEZhZ21uS0pFSExhIn0.Sl-SuV_dhBpMNUdegXtHDtlHIdFxAw0lEp97xqEwIjY', '2020-01-24 05:35:51', '2020-03-16 02:12:57'),
(111, 'Ade Wisnu', 'wisnu@widatra.com', '$2y$10$kW7L4hZFSUDpPHzgV/0d/eGGdGrppTCehT2.RcqCKusA/XhuTY99.', 'b4JWiKXPF5Py5rubFehpd1VBZmf38RXyqBQ3lo8bbJEyLTtJsbkPdU4Gznao', 9, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExMSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2Mzk0NDcxMDgsImV4cCI6MTYzOTQ1MDcwOCwibmJmIjoxNjM5NDQ3MTA4LCJqdGkiOiJlTVh0Wjh5aHluTWdLVXFFIn0.o5mgm38mna7k7-wCABpOuSf0o9xofW3gAGEZxPHAFhg', '2020-01-24 05:37:28', '2021-12-14 01:58:28'),
(112, 'Aropah Heri', 'aropah.heri@widatra.com', '$2y$10$Gx9GZb3DiDGFkgVXwdEsU.14iZOwqeb/V/wf4Vn0lOHuAkpZi5JOq', '0t02pbNgry6ct0HtsTJ2wgFWBkhDUlYUcKzBdq0M2BQMBqvRQC40ZjJpdeQX', 21, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExMiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQzMjM2NjcsImV4cCI6MTU4NDMyNzI2NywibmJmIjoxNTg0MzIzNjY3LCJqdGkiOiJjVjdQSDJ0VmtPS3R1c285In0.2yZbzyqKzg8ON8nhe8kabWz1VjJTdULewn1tXPPq63k', '2020-01-24 05:40:55', '2020-03-16 01:54:27'),
(113, 'Dewi HRD', 'dewi@widatra.com', '$2y$10$m7nQFnJ5hxPBT0q018G2YuXVrG5D75HlH8Mss9OH6U93jKMx6r3AK', 'xZlKIMbd2nx5G7EdkS06N9P8eGPfnBfkxKKh2FOmxnqSm5iXojIqSk4GajZl', 7, 5, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExMywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQ1MDA1MDksImV4cCI6MTU4NDUwNDEwOSwibmJmIjoxNTg0NTAwNTA5LCJqdGkiOiI0QmowdTVHendEa3RVZkp2In0._m4UZLEvynXyxwbOVVa3ul3UgKb3NIvtZwy9hsJhl1A', '2020-01-24 05:43:23', '2020-03-18 03:01:49'),
(114, 'Evalin Jayakusli', 'evalin@widatra.com', '$2y$10$d6JsmHiEP9j1iUhqjr3z3OrqY7asfedmY2eR8o0mNw8gR81KSY28G', NULL, 9, 12, 1, NULL, '2020-01-24 05:46:29', '2020-01-24 05:46:29'),
(115, 'Rana', 'rana@widatra.com', '$2y$10$gDopeQGE8laRoGX0pPOrPO41jWZb4zvwpltchQJokijSanr9PsSfC', 'SSg63sfOfrE8LPOhMmcxElRT002yfz7AizrVNZ5gPwgtQ7GXnVSqSb3eO9r9', 23, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExNSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODQzMjM1NTIsImV4cCI6MTU4NDMyNzE1MiwibmJmIjoxNTg0MzIzNTUyLCJqdGkiOiJJbFFUeWdRa0JOV3ZFa09mIn0.KS2LVjYvZP-KQWiRgtSn0UTLCCaqwknWXn8Vvhsvdmw', '2020-01-24 05:58:49', '2020-03-16 01:52:32'),
(116, 'Setiadji Sadewo', 'setiadji@widatra.com', '$2y$10$.Ggj/Zg16w6O/zA0nE39Lu.Yy/pLM2JG4Y0HqAdnLXfKfbROWnuHy', NULL, 13, 5, 1, NULL, '2020-01-24 06:02:58', '2020-01-24 06:02:58'),
(117, 'Sudiartono', 'sudiartono@widatra.com', '$2y$10$B9XBprTKbSaaBPpqm/6cDeWp4nkkmZrweRJWzGIrMD/bX9LkYdIDK', NULL, 1, 13, 1, NULL, '2020-01-24 06:06:06', '2020-01-24 06:06:06'),
(118, 'Mira Mulyani', 'mira@widatra.com', '$2y$10$K4ST7j/6Im6mzzFFy4wtqOMEFOHhc5jdCDvLFZzY97RjMM7Ny5gfW', NULL, 26, 9, 1, NULL, '2020-03-06 03:16:22', '2020-03-12 07:13:33'),
(119, 'Tiara', 'receptionist@widatra.com', '$2y$10$lvb8e.fAXNgHxghD9nulCOnZIJG4WFznGaAHlShlCukODyAR1Oa52', 'uzESvNhao1dJc4e2At2lQWGcUNt0FuIynLnylUMZBkTPiQiz2K5xjj1RQKEw', 26, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjExOSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODM5OTc1MjUsImV4cCI6MTU4NDAwMTEyNSwibmJmIjoxNTgzOTk3NTI1LCJqdGkiOiJHSEJzSG11bWt2VGR3QW5XIn0.kCefGYSOteoI8X--hwr-DP-bXwdcrflEhL3oUl0SZe0', '2020-03-06 03:17:04', '2020-03-12 07:18:45'),
(120, 'Dyah Fitri Widowati', 'dyah@widatra.com', '$2y$10$O3w/.ZXoLZaNRJ4Oti/IwOSZYJi85cgd5w.ykGfCMPcmH3gEOUtv6', 'dL7bQSUZVK3cjaSN0WtTi8nCxP9hN61DWSU1b8E4t6QrYmlwKKOMbp6x0KJX', 23, 4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyMCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE1ODcxMDQ4MjksImV4cCI6MTU4NzEwODQyOSwibmJmIjoxNTg3MTA0ODI5LCJqdGkiOiJaemtUWnpjaFlzVnF5b1RHIn0.XMJGma2vAjsO_0nB21B_8rv31ZybQ7hf56fzBxKp0_s', '2020-03-16 02:10:12', '2020-04-17 06:27:09'),
(121, 'Jakut', 'jakut@widatra.com', '$2y$10$sCG3h6YRSr1LTOjAxUxNVuL0b/iB0Ss65mzP/kTnG14i57UG7yzKu', 'CkUhBU8N4B9P6AdO0zMSrXb4sag99Gk8oFxPnZWhDXlEMBSBF6FJE5ZfK1MQ', 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyMSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTYwNTg5NTksImV4cCI6MTY1NjA2MjU1OSwibmJmIjoxNjU2MDU4OTU5LCJqdGkiOiJtN2Y5NWQzZW56M0lRZWVKIn0.W2HBy07VZ-y1TE6FFPk81RgFyn_WCOQTGzGFkJlzn6w', '2020-03-26 02:17:11', '2022-06-24 08:22:39'),
(122, 'Thoriq', 'thoriq@widatra.com', '$2y$10$L6MrOUMnjJ9TrrB.Do6p0uK2tuDUWmQzcDN9tbRs10RevK47sdaJq', 'QdTwHuiyq7TUuTBInwMIodi3gnaVLNkKtTKPZumGHU4AkjiqWzcvu37nuYPX', 5, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyMiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc1MDEyMDgsImV4cCI6MTY1NzUwNDgwOCwibmJmIjoxNjU3NTAxMjA4LCJqdGkiOiJISlR3RTI5QWVKdFVkSXNtIn0.7a9zQ95UIWbh1swdHPvVOlGiZYIunTArUAAVkXZhqh0', '2020-04-09 03:59:12', '2022-07-11 01:00:08'),
(123, 'Insanul', 'insanul@widatra.com', '$2y$10$GBx8mqOGmCiqwnTXkfGa7.hr5/MBNZn4FTjK.jBi66hMFYCjIlGxW', 'o9YWlXeN4zfXVoXg0yJPtsV9CxOwenpx7RUimi8AMLMXEI7A7avtyFHp0vGo', 14, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyMywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcwNzc4NjksImV4cCI6MTY1NzA4MTQ2OSwibmJmIjoxNjU3MDc3ODY5LCJqdGkiOiIxamlRbnZkM1lORXNZemZ2In0.TlXV8acWxo36p_3adC6NxjrYV-hqQJsZjcCmLtMNA1s', '2020-04-09 04:04:26', '2022-07-06 03:24:29'),
(124, 'Muyono', 'muyono@widatra.com', '$2y$10$eBv.v5tngulCDaC5.t7k5eM8C6e5Nzdlu7klmMbrYTms3MI3JXicC', NULL, 4, 7, 1, NULL, '2021-06-09 02:58:18', '2021-06-09 02:58:18'),
(125, 'Agung Dento L.', 'agung@widatra.com', '$2y$10$Oc7.x3d.DQdvfGwTPwJYuetlZ24INuyMKNMR6KDjxM/uRii5GtNpq', NULL, 4, 9, 1, NULL, '2021-10-18 04:53:26', '2021-12-15 02:02:08'),
(126, 'Andi Hidayat', 'andi@widatra.com', '$2y$10$u4.0pyLZQHPYrSG1LSzUXe0ccRCsRdomRzooKgUfvEkO7arT7TEUK', 'nk2Ibuj1FrPgt6Mr1qM7WuyCsalrQR91FDfbkXd104p2MtTQjSh3THXoKsnL', 2, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyNiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTIxNTQ2MDYsImV4cCI6MTY1MjE1ODIwNiwibmJmIjoxNjUyMTU0NjA2LCJqdGkiOiI1TW5sNnlTRlllOFIwREV0In0.sdkgs17zOuI7U6byIWiDfXF8P-fvGQPQ7vUURqGMbKs', '2021-10-18 04:54:45', '2022-05-10 03:50:06'),
(127, 'Aseb', 'aseb@widatra.com', '$2y$10$E3aRVAaPIPV70NDjkDNmbuqvR3ggIxBqwMMKrlEgO7TMULOgPoT4S', NULL, 4, 7, 1, NULL, '2021-10-18 04:55:49', '2021-10-18 04:55:49'),
(128, 'Basuki Rahmad', 'basuki@widatra.com', '$2y$10$r4vJZNTDSrr/AVnWabB7SunpqHBSdwxLlErbaetvNhSUMwGh054dO', NULL, 4, 7, 1, NULL, '2021-10-18 04:56:54', '2021-10-18 04:56:54'),
(129, 'Denny Satrio Nugroho', 'denny.satrio@widatra.com', '$2y$10$XYLzc1k4HYFzazoJoXSqvu/Xab3R36h9LXebCLbEIpRAn80bT3.CC', 'gzyRXGU567XnpYlNA2yOo3kzKqMfuj4Wf4THSX9YmZ5Ty5QWgvZ6Xb5uTdaJ', 4, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyOSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDA0ODc0NDgsImV4cCI6MTY0MDQ5MTA0OCwibmJmIjoxNjQwNDg3NDQ4LCJqdGkiOiJvWFprRnZOSUpXd1o5RjNhIn0.WUprah6GmWiJZ5UdCKOn0Qg3d2biSFhcwoWD3oPE6no', '2021-10-18 04:59:26', '2021-12-26 02:57:28'),
(130, 'Nopan Jainal Wahyudi', 'nopan@widatra.com', '$2y$10$ffoEzN4sMNvkumvZ23Dy..6Tvh2rKzaYS7QymvumFUdJE2JE.jdE6', NULL, 4, 11, 1, NULL, '2021-10-18 05:00:27', '2021-10-18 06:39:29'),
(131, 'Pracoyo Adi Nugroho', 'nugrohop@widatra.com', '$2y$10$voItdMTy0F6BVCJEA6B.1eSlJRDD9G6YYDlfpI7ES1Zy0JMl4/7ZK', NULL, 4, 11, 1, NULL, '2021-10-18 05:02:42', '2021-12-15 01:45:14'),
(132, 'Sofian Hadi', 'sofian@widatra.com', '$2y$10$uRjbpguaSjb2pTGlv6snXeiscznypm6eAfZCjhWdo60TudBlG6zCy', NULL, 4, 9, 1, NULL, '2021-10-18 06:40:52', '2021-10-18 06:40:52'),
(133, 'Wachroni Sulthon W', 'wachroni@widatra.com', '$2y$10$fefkbftaZtY9w8nlY6TaO.WrsLs0kDb2QSRh7SraTj.K/jeAxEUiq', NULL, 4, 9, 1, NULL, '2021-10-18 06:41:41', '2021-10-18 06:41:41'),
(134, 'Erwin Suhariyanto', 'erwin@widatra.com', '$2y$10$TFI0b/CC2dzcqexToaehUOa33nGNaWt30Xpvr1nLTFO.yPVAJ7un6', NULL, 9, 11, 1, NULL, '2021-10-18 07:19:09', '2021-12-15 01:55:44'),
(135, 'Rosaliya', 'rosaliya@widatra.com', '$2y$10$0qaw9xfmujoBwVtWPcQ9KOiUO10AtuShsvYhZBmXYu2DpXH.g4i.W', NULL, 9, 11, 1, NULL, '2021-10-18 07:20:09', '2021-12-15 01:57:30'),
(136, 'Dwi Haryanto', 'dwihar@widatra.com', '$2y$10$PLiR7OQ1Z5yNEm25WLnmc.UF6fTFKWfXGyM.qsw.JbwxsYQFwfzpe', 'qUjxrpSOOWA8iDeFyJaZnibMA0cS3njKmHEKuIv7XGgB8wmEz53QrJL72Yfc', 7, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzNiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcyNjE5OTgsImV4cCI6MTY1NzI2NTU5OCwibmJmIjoxNjU3MjYxOTk4LCJqdGkiOiI1YjNsRkc3UU1OejdHWDVqIn0.NIk5EsgLcdjino2kHeHgLjUsI8I6QZnP1sb1sBXoDvU', '2021-10-18 07:34:05', '2022-07-08 06:33:18'),
(137, 'Faruk Umar H', 'faruk@widatra.com', '$2y$10$BN/2mjkv8Iiiw6tNYB9FM.C7zbVgrLw.ZXU6vzfxWDJJsbaNOzkZO', NULL, 7, 9, 1, NULL, '2021-10-18 07:34:51', '2021-10-18 07:34:51'),
(138, 'Sugeng Riyadi', 'sugeng@widatra.com', '$2y$10$7V6EJvStCUnvpPXxsRmj0ObRkmJIiTYcJJt0GtaDOjOSZiZjPAIRe', 'mzKloqTghVAIoXn6UwE7Mk56XUjuW5CxbKLVqUmVdNY0fVkzN4jS9k3Spl98', 8, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzOCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTYyMjg5MzAsImV4cCI6MTY1NjIzMjUzMCwibmJmIjoxNjU2MjI4OTMwLCJqdGkiOiJZY1ZNdE1VdGFIa2w1UnF3In0.RdZgabqC6_M74NOsqG1Y_4zJc1joRkswc1nazL7bXKU', '2021-10-18 07:40:22', '2022-06-26 07:35:30'),
(139, 'Winaryo', 'winaryo@widatra.com', '$2y$10$hujjbf10Xy3.LIwsO9Zec.stZCFKqq9GQ5YZ55Nlgg6H7eegP0Ru2', NULL, 7, 9, 1, NULL, '2021-10-18 07:41:03', '2021-10-18 07:41:03'),
(140, 'Yolinda', 'yolinda@widatra.com', '$2y$10$S1lhotIMbOU/ZU1GFmovmu.SBOH1c193ALgrBGKmecgs0tk5/Qvsi', 'li8bV1eKoPQQl6nKp2annl4fblqDSvYLvvDfh1GRbBhEfAHsxy7yyQORnPNt', 7, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0MCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTY0NjU3MTUsImV4cCI6MTY1NjQ2OTMxNSwibmJmIjoxNjU2NDY1NzE1LCJqdGkiOiJDNzNtVkNDN2Y4cTBNV3JCIn0.mTKc9uMZGft9-hSNMU0CpcEklxMvomnvDFAhXaDiHys', '2021-10-18 07:41:40', '2022-06-29 01:21:55'),
(141, 'Ari Aditama', 'adm.qms@widatra.com', '$2y$10$YzEFyTS6YucU7kBg6GfqaejQHoSrDGKEoz8VXR2XcilKmfuT2.ipG', 'oEpDSZrNNQlSui0Pw9ggdqO6xdMmWpnDMyCdrbEfRaGg0UC34PdMuLvFpfyG', 22, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0MSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcyNjUyMDYsImV4cCI6MTY1NzI2ODgwNiwibmJmIjoxNjU3MjY1MjA2LCJqdGkiOiJqT3Z4aEFsSFZwVURsVXZTIn0.uJC1vBvSzPZgQw4yoaC4INXSVl5KA9bXYTuhrD-Og7Q', '2021-10-18 08:28:14', '2022-07-08 07:26:46'),
(142, 'Ratnaningsih', 'ratna@widatra.com', '$2y$10$6mYVneUYxJ7cWqL56CPT/uUAUjyMOBeHA5NGb9pcA4FdD7FhrEMtW', NULL, 9, 7, 1, NULL, '2021-10-18 08:33:46', '2021-12-15 01:57:17'),
(143, 'Agus Prastiyo', 'mfginspection@widatra.com', '$2y$10$bA9d8v4Hmp.WnTedhlj8JOiTOb26VSJ7bcfHfQbINEZKHdvMEXifm', 'ffyvi5XCImwDSpBMM1dvYqSd9wmwErF1wBPYXpMPCvwUeq7TpgwRlfwrI8Y5', 14, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0MywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc1MjEyNzEsImV4cCI6MTY1NzUyNDg3MSwibmJmIjoxNjU3NTIxMjcxLCJqdGkiOiJqTEYxc0FZZDNOY0NqNUpSIn0.YGMDMfiJXa4WxqiXpF_UdjaCAX1fkMW4_n5wiOc2HIg', '2021-10-18 08:35:27', '2022-07-11 06:34:31');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `department_id`, `jabatan_id`, `active`, `web_token`, `created_at`, `updated_at`) VALUES
(144, 'Akhmad Zaeni', 'Qaservice@widatra.com', '$2y$10$LV2r1sVz930exl4SKi79PeIaNmbdPttzhOzP1R1wEpPkiXosmR6I.', 'emwmPAqxnw8d9s6mgjAs71CjcrAGU083dOIEcpuS9CzWAN8T48J661OCTNqO', 14, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0NCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTY5MDQ1MTUsImV4cCI6MTY1NjkwODExNSwibmJmIjoxNjU2OTA0NTE1LCJqdGkiOiJXTmNYWjBXUjZFcnNYZGVpIn0.3YeWpGRixtovc6p6zUVrw3mSY8LZkvYPTPRglrQawkU', '2021-10-18 08:36:22', '2022-07-04 03:15:15'),
(145, 'PDGMPC', 'PDGMPC@widatra.com', '$2y$10$zUl5nPBp00tLtpEdzQzPKeRNJJ9Hn88M.iPo/UtmRRcRpGfYw1QXy', 'oP0xCrHqRn96hXmAAvofHRn8yZoEkUqv6eXKs903uejfDev6qJ7HLqEq3zNL', 2, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0NSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc1MTMyMjAsImV4cCI6MTY1NzUxNjgyMCwibmJmIjoxNjU3NTEzMjIwLCJqdGkiOiJEV2hNVWt2WkNEaVlMN0l6In0.xhid3jK152aMBgb-9CncDVti8zOdp05VKHOFwvkYSqc', '2021-10-18 08:37:16', '2022-07-11 04:20:20'),
(146, 'Andre Brian A.K', 'pqr@widatra.com', '$2y$10$ua5lX3ipw5Z8mkTaSzznmeVRRmKQ2YdeBwGgdTd0rA1todnWhvtB6', NULL, 14, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0NiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcwOTE4MDcsImV4cCI6MTY1NzA5NTQwNywibmJmIjoxNjU3MDkxODA3LCJqdGkiOiJNNVBBa1p3WHdPWm1nTlVOIn0.VRl7ITiQh3POxhuTqpa1AzNCHts60aQIR6OHjahMzIY', '2021-10-18 08:40:05', '2022-07-06 07:16:47'),
(147, 'Salman Faris', 'qaqualification@widatra.com', '$2y$10$pUYITH5ov2QUmP2LigUfl.XGyZSW9sU2CW1hyY7n21PsTUEG/gKuG', 'gPpkl7pDOt55pM1vhciZLK7M02aUDU8btT9cE4OxO1Eb7ePjbl3J0lpnDaqM', 14, 11, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0NywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc1MDgzNzIsImV4cCI6MTY1NzUxMTk3MiwibmJmIjoxNjU3NTA4MzcyLCJqdGkiOiI2Q3dXRUkzeTRYZnd3ekNIIn0.QQX4c4CnkwyKyri_39ar6U5gm3X7lsIEvlHEQcR_jTo', '2021-10-18 08:40:41', '2022-07-11 02:59:32'),
(148, 'Taufiq Hendrasno', 'Taufik@widatra.com', '$2y$10$hoaNZLrOmVv/yE6N/8FAQeK/SzcxSKvLiWmQRoonduGU44TEOcNsG', NULL, 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0OCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcwNjk5MjcsImV4cCI6MTY1NzA3MzUyNywibmJmIjoxNjU3MDY5OTI3LCJqdGkiOiJIdU5oTHdVeFRIZ2ZRcng0In0.1YfWtReYZnO01riqDSSu9sO63vpDTQ8hEkol68290aM', '2021-10-18 08:57:29', '2022-07-06 01:12:07'),
(149, 'Tech Support', 'Tech.support@widatra.com', '$2y$10$3Ma591jDAkiwnsKc2pMksOINWcimrmj05GkqMH4ZM35ZorBs8qTUK', 'F1cPxdnLxJf9dKMV3gvBJ2k5MePAkOt6Im4qF4FFangd3nGJb5ncHAVss3fQ', 3, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0OSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2Mzk0ODA4MzcsImV4cCI6MTYzOTQ4NDQzNywibmJmIjoxNjM5NDgwODM3LCJqdGkiOiJVbk4yNGxPUXVKVlNaOGwwIn0.mT5_UKzxBpClefa-6zQ1soLLkz18fAB6RHhXhybO-nI', '2021-10-18 08:58:14', '2021-12-14 11:20:37'),
(150, 'Achmad Jazuli', 'Jazuli@widatra.com', '$2y$10$wIEFFyz14fsS.npXtpRscu8/C9H3UoKxkgs5/uIWOQ5BQ4XPxnw1i', '3kd9gLjGoAUbk18eL4Y0UKPy0JW7hhEfmTn0v4vBLiLgnLvFrQbsVFvMfnz2', 3, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1MCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDk0Njk4MzIsImV4cCI6MTY0OTQ3MzQzMiwibmJmIjoxNjQ5NDY5ODMyLCJqdGkiOiJXVFBvNEZRVllwd0VxS3M5In0.b07DIZ_DAFgCTsfVgLyt9iB9KUXlyB8d60iYwYURrkA', '2021-10-18 08:58:58', '2022-04-09 02:03:52'),
(151, 'Lidyane Widhitasari', 'Lidyane@widatra.com', '$2y$10$QeFVawMMQ5zPFWoBqui8AeqHPvRTnq1486qrZnKtDl.4M0SAd5I2a', 'U3beOwbOtBE2zNuKXy05oi7fJohruH0q3dI7CCb7Nf1YNRbnn4L72vkk1CUb', 3, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1MSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTYzMDI0NzksImV4cCI6MTY1NjMwNjA3OSwibmJmIjoxNjU2MzAyNDc5LCJqdGkiOiJPSm5ZTGkyS0NBS3NDTzFkIn0.zEasPyjRA_y7uG9eLZuRmGw9MfKO8p2pao_2RQEzUis', '2021-10-18 08:59:34', '2022-06-27 04:01:19'),
(152, 'A.Nasir', 'nasir@widatra.com', '$2y$10$Wcbiw/D/3ZqDliYpuVriQuNuMgF6FuxMcsMhXtOVuvk/y25z..XSq', NULL, 3, 9, 1, NULL, '2021-10-18 09:00:05', '2021-10-18 09:00:05'),
(153, 'Rudi Kustiantono', 'Rudi.Kustiantono@widatra.com', '$2y$10$Lc5Z8ddvMvYGMmPLCduCpOiz/RNi36s4ao3y8d4dz3FV/yyCdq8JS', NULL, 3, 7, 1, NULL, '2021-10-18 09:00:49', '2021-10-18 09:00:49'),
(154, 'Hari Sukariyono', 'Hari@widatra.com', '$2y$10$VZ5Fka9mWLjixNhoK6KNG.ta7K/IVoJhWwRLMz/ZTiw.BUJQL.EpW', NULL, 3, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1NCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcyNTkwNjMsImV4cCI6MTY1NzI2MjY2MywibmJmIjoxNjU3MjU5MDYzLCJqdGkiOiJMdHNqTzl4MTFjdmJ6TVJuIn0.pE2T9UdyttZSSpVycNIK_G4WeqT2W7Tvm5STtjmdXBg', '2021-10-18 09:01:25', '2022-07-08 05:44:23'),
(155, 'Choirul Anam', 'Choirul@widatra.com', '$2y$10$U9rYAA/Zn8hR4YwV2VGwoe0fLGSPCRQVGA6wrf9tdKhzxEYaKRKFC', NULL, 3, 9, 1, NULL, '2021-10-18 09:02:12', '2021-10-18 09:02:12'),
(156, 'M.Romadon', 'romadon@widatra.com', '$2y$10$9lYliTDGHden6knI9dMBO.4bD.gJcH2ZWt5769Ybf3T1v21r6WfSW', NULL, 2, 7, 1, NULL, '2021-10-18 09:06:16', '2021-12-17 07:06:08'),
(157, 'Achmad Rifa\'i', 'rifai@widatra.com', '$2y$10$5NaZZlkSfPnUjXKaBjDjmOJhB2mGLaCJqHb9y6Xw.KaOD0k8b2EhK', NULL, 2, 7, 1, NULL, '2021-10-18 09:07:01', '2021-12-15 01:54:43'),
(158, 'Dody Dwi Purwono', 'dody@widatra.com', '$2y$10$aPw.KLSKOHSjBH8XJvg3AOKz5UfYzR33s8qSl.n285I7KM/HtLhgG', NULL, 2, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1OCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDQyMDgyOTksImV4cCI6MTY0NDIxMTg5OSwibmJmIjoxNjQ0MjA4Mjk5LCJqdGkiOiJsd2hCZlhnQU95U1VncVdCIn0.aS-vBq6JOAgtLNTnbrT1jl7uksdQ7D6vG6TICsDk6pM', '2021-10-18 09:07:35', '2022-02-07 04:31:39'),
(159, 'Adm.produksi', 'Adm.produksi@widatra.com', '$2y$10$tnmV6yq7w/hEiRlIj5jPVOCNHQg81K8.svzjGkQZpRpUkHhmNCr9e', NULL, 2, 10, 1, NULL, '2021-10-18 09:08:10', '2021-10-18 09:08:10'),
(160, 'SPV Produksi MC', 'SPV_MC@widatra.com', '$2y$10$bbT0h1GDglBQQiM0yZLoPe8Wz4gBCH3RJNYIzxQ566KKg0K2uytqW', NULL, 2, 9, 1, NULL, '2021-10-18 09:08:58', '2021-10-18 09:08:58'),
(161, 'SPV Produksi WF1U1', 'SPV_WF1U1@widatra.com', '$2y$10$fbtsKx4hfuYypYvqDUsj9.//tVpxIvX6mAU.yq4SN.Tb9M20IMriS', NULL, 2, 9, 1, NULL, '2021-10-18 09:09:34', '2021-10-18 09:09:34'),
(162, 'SPV Produksi WF1U2', 'SPV_WF1U2@widatra.com', '$2y$10$yFpvT6966IXNP6GK0OBupOcRoJtO/IkHeywB9p0sPRb/JlsFnxuaG', NULL, 2, 9, 1, NULL, '2021-10-18 09:10:08', '2021-10-18 09:10:08'),
(163, 'SPV Produksi WF1U3', 'SPV_WF1U3@widatra.com', '$2y$10$iySSMgtsOKrKw7zcLaHBIeOZIKtWi89SARWBw7cHdxxKN8DSfODSi', NULL, 2, 10, 1, NULL, '2021-10-18 09:10:40', '2021-10-18 09:10:40'),
(164, 'SPV Produksi WF2U1', 'SPV_WF2U1@widatra.com', '$2y$10$G9Mzh1UipGImyIxaOAZF.ueunf37QTd4/RYWFVoKh/JOjkXGgv/pO', NULL, 2, 10, 1, NULL, '2021-10-18 09:11:11', '2021-10-18 09:11:11'),
(165, 'SPV Produksi WF2U2', 'SPV_WF2U2@widatra.com', '$2y$10$UBRQ3GFa2KrC0YYojI6sTeDZDtRtBZaAbb/vdOmCHe3NotHZl1vLe', NULL, 2, 10, 1, NULL, '2021-10-18 09:11:42', '2021-10-18 09:11:42'),
(166, 'IPQC1', 'IPQC1@widatra.com', '$2y$10$t7XkYEiAoJI879LcUJwSsuFHJKvUX7OzlbQFzhwo3AttFrWMkNXia', 'JsK9tie31PaYtG3n26d8Eo1LCevy6EOarBJJAiqlSmXOkR8LtnmVLOYgMSm3', 3, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2NiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcxNTUxODYsImV4cCI6MTY1NzE1ODc4NiwibmJmIjoxNjU3MTU1MTg2LCJqdGkiOiI5TG9iNlJ5UzA1SWFMT3V4In0.vB21WU_fIidEQHFKLmEw33s1DZE5iGn1nN1hbwfdpJQ', '2021-10-18 09:12:24', '2022-07-07 00:53:06'),
(167, 'IPQC2', 'IPQC2@widatra.com', '$2y$10$gOID69JMQ0Ozx/Uz/dKpxugH8YPdGMTRPDqvGNFeYtnrRrj0k0ICC', NULL, 3, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2NywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTA1MjUyNjEsImV4cCI6MTY1MDUyODg2MSwibmJmIjoxNjUwNTI1MjYxLCJqdGkiOiJhT1ZSejlCWEdSaG45c0p0In0.Z8T44_3xMjJvCeX04pKjEh3Sn-YY-UoobMPCobRCmP0', '2021-10-18 09:12:54', '2022-04-21 07:14:21'),
(168, 'K3', 'K3@widatra.com', '$2y$10$Y7Fd9gzx/bl/IF7L57RiGeJrMs9MuXU1/D0EK2n2m/0LWnRPyXHlq', NULL, 7, 10, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2OCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDk4MTQ5MzksImV4cCI6MTY0OTgxODUzOSwibmJmIjoxNjQ5ODE0OTM5LCJqdGkiOiJSTWxpb1g4QnhLTTYwZDU1In0.ZWv9c53kXwLxgSMxzgyKdEvQxtOWFndHMS4ITjk7_fQ', '2021-10-18 09:14:00', '2022-04-13 01:55:39'),
(169, 'adminga', 'adminga@widatra.com', '$2y$10$ZbiqQI/v4e3PHvOZbFTzBOi9h.kWnNipZ4BGHnweQiTTHWoOtEz2q', NULL, 7, 10, 1, NULL, '2021-10-18 09:14:45', '2021-10-18 09:14:45'),
(170, 'Resepsionis', 'Resepsionis@widatra.com', '$2y$10$cSJh2ZbqXC/szkz2Nhvvf.eblpY39yD2I6XpfDSUyeYc5luGBNMUe', NULL, 7, 10, 1, NULL, '2021-10-18 09:15:14', '2021-10-18 09:15:14'),
(171, 'Dina Rahmania', 'dc.superadmin@widatra.com', '$2y$10$b06dpEy8ZcrEMqs8yB1Yhu5remHaSxmcswe8MbRhV1DQ.cKmFV9/C', 'DuzIYRQvqqWwS0EmhfUfZvtFKJMyBPUnvVCvJQ2rnLRqj3P8ThBDXyQI7ART', 22, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3MSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTQ0OTcxODMsImV4cCI6MTY1NDUwMDc4MywibmJmIjoxNjU0NDk3MTgzLCJqdGkiOiJjNEk2WjNjZjBsU2pWeEpvIn0.mBGnzeTgFRIvvPfrr6YeSijp7KJOwTbe2lMkMUT1oIg', '2021-12-13 08:37:47', '2022-06-06 06:33:03'),
(172, 'Rina Anggraini', 'rina@widatra.com', '$2y$10$jeBxqwHMkpU4BbyTaY5Q3ucF2oKknKfMvmaFk3BtmkRu1iKgjZtHW', NULL, 7, 6, 1, NULL, '2021-12-14 02:00:22', '2021-12-14 02:00:22'),
(173, 'Asep Setyo Budi', 'asep@widatra.com', '$2y$10$XCPyKH7BJJAsszm8ogm45en0JqJXCPGYBDm8SFzPVuWjmGn8cbgbq', 'tVfFFPhngL7DvJrvG9fS6Ux2z4kiFKuuXHO4jo2LbKswDW8jzENequduk31G', 4, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3MywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2Mzk1NDM0MzEsImV4cCI6MTYzOTU0NzAzMSwibmJmIjoxNjM5NTQzNDMxLCJqdGkiOiJ4VWJrNHc2NktIV1dSakxpIn0.l-WVLw9GJP7DnQMWGOJYGACt70mgCiJobabzlhXKiIQ', '2021-12-15 04:19:59', '2021-12-15 04:43:51'),
(174, 'Choirul', 'GLP@widatra.com', '$2y$10$sI2JINApx7MVUH5YGkdSueRJHPrLKtKU.qQm1H/Rn25gBoOb1kK1S', NULL, 3, 9, 1, NULL, '2021-12-15 06:21:36', '2021-12-15 06:21:36'),
(175, 'Kusmiaji', 'kusmiaji@widatra.com', '$2y$10$uiyMcyk2OP/DwyfzWrqdQOiU/Qll7c0khTuhECwuTRqXf/u.OniPe', NULL, 2, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3NSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDkzODcwNDMsImV4cCI6MTY0OTM5MDY0MywibmJmIjoxNjQ5Mzg3MDQzLCJqdGkiOiJiRzB5Z250MUNiMGhsMm5yIn0.Yo_KYFxuIhKMQa1o3H6j_3QID8ytw4ZeuTi75BRYTi8', '2021-12-17 07:03:10', '2022-04-08 03:04:03'),
(176, 'Rahmad Aditya', 'adit@widatra.com', '$2y$10$7MeTicFHXKuwr6rQth./ieJdbcnLTbnKMqSVHmw5yJOj2xYkMgFKy', 'X0WKkZAZ64NECC8IosoSjU61QoLqWEKPQQuRAZPIyOMVPS1202Giqflzcu39', 6, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3NiwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDU3NzgxMjMsImV4cCI6MTY0NTc4MTcyMywibmJmIjoxNjQ1Nzc4MTIzLCJqdGkiOiJXWWdWQ05DeWhaRExiQmRmIn0.CUJw6iSgn8f-8cRJ_ZZWXWExPQwL499DjJrI3YJAdJM', '2022-02-25 08:14:06', '2022-02-25 08:37:19'),
(177, 'Aditya Dwi Rendra', 'aditya.rendra@widatra.com', '$2y$10$FSiZrrnOkhQWJoqJcP4VVO77KuTZfj6pioQwr/1DTBv8s20KxCwOC', NULL, 7, 8, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3NywiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTcyNTI3ODMsImV4cCI6MTY1NzI1NjM4MywibmJmIjoxNjU3MjUyNzgzLCJqdGkiOiI1OFpuNzUzOVNTeHR5eURTIn0.YA4_WDrvrVfZXwNIXjXqi4An-EvwOAK-nixCjDPsr24', '2022-04-08 03:48:03', '2022-07-08 03:59:43'),
(178, 'Seksi Microbology', 'microbiology@widatra.com', '$2y$10$K7HHp/boejb/sYIJKz4st.fBRtQ7p8JfThgP3MPnsJYdpNiE5g7cy', NULL, 3, 9, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3OCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NDk0NzgyMDYsImV4cCI6MTY0OTQ4MTgwNiwibmJmIjoxNjQ5NDc4MjA2LCJqdGkiOiJzbDNxN2NIMVV3SExvUU94In0.9t7WQeeeE1J6pIHVmJnAt2Ts10MlZ4UwyHA7g-kY-zo', '2022-04-08 03:49:27', '2022-04-09 04:23:26'),
(179, 'M.yulianto', 'm.yulianto@widatra.com', '$2y$10$q7A3B4XM9z5JAX8ka01wCOlK4kMkItHq.gqiwDcCoEWZYeE24bahS', NULL, 12, 6, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3OSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTA1MDQ1OTksImV4cCI6MTY1MDUwODE5OSwibmJmIjoxNjUwNTA0NTk5LCJqdGkiOiJkR1YzeW1TbVNyd3lhWjdEIn0.f3IEpkbkwvFsM2v170cDVj09VIAzW4nPQNypyzyeN_4', '2022-04-21 01:27:34', '2022-04-21 01:29:59'),
(180, 'Kartika', 'kartika@widatra.com', '$2y$10$FBRuuONU28YinigHei8Xp.afCnyG.8.xhCKdj4q4mzPhAWCNwAjem', 'lqW2UGYLauf6p2WodSZLrSwlgVEsY5uS83FwUvW7j6evf4UhfUdRosOyVV3B', 20, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE4MCwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTc0MTM1ODEsImV4cCI6MTY1NzQxNzE4MSwibmJmIjoxNjU3NDEzNTgxLCJqdGkiOiJOOU50eGRPcVJ1OERlMEFCIn0.KkuPZCkPQycJd2n3Lzn5klC3A55_Or8UqeY5pymRibE', '2022-05-23 03:12:40', '2022-07-10 00:39:41'),
(181, 'Ninik Sri W.', 'niniks@widatra.com', '$2y$10$jDdLD.Apoa.e29mTAAaCNOEd2mXGe95i1DoNYvhJiVIXCTgCo4w6C', 'seZN2IPl9756kThdg9TkAhgFCNL0Rx3ZajH6vAN8NsufFfHv0yvWc9dXjc14', 6, 7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE4MSwiaXNzIjoiaHR0cDovL2hvbWUud2lkYXRyYS5jb20vbG9naW4tY2hlY2siLCJpYXQiOjE2NTU3MDY3MjQsImV4cCI6MTY1NTcxMDMyNCwibmJmIjoxNjU1NzA2NzI0LCJqdGkiOiJQTkN2VEhDc1ZWRFB2R3pCIn0.IjQeXMKagRWxsogHt_GYS0Pizq6gYNzkm0rjkF15Ps4', '2022-06-03 02:13:20', '2022-06-20 06:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `app_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `user_id`, `app_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(3, 1, 3, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(5, 1, 5, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(6, 1, 6, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(7, 1, 7, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(8, 2, 1, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(11, 2, 4, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(13, 2, 6, '2017-10-19 11:55:40', '2017-10-19 11:55:40'),
(16, 3, 5, '2017-10-19 21:03:56', '2017-10-19 21:03:56'),
(18, 3, 6, '2017-10-21 03:01:39', '2017-10-21 03:01:39'),
(19, 3, 7, '2017-10-21 03:09:26', '2017-10-21 03:09:26'),
(20, 24, 3, '2017-10-22 18:37:08', '2017-10-22 18:37:08'),
(26, 6, 2, '2017-10-23 20:18:29', '2017-10-23 20:18:29'),
(29, 12, 3, '2017-10-24 21:49:11', '2017-10-24 21:49:11'),
(34, 12, 5, '2017-10-30 17:22:20', '2017-10-30 17:22:20'),
(38, 13, 3, '2017-11-07 20:01:02', '2017-11-07 20:01:02'),
(44, 8, 3, '2018-01-16 19:32:53', '2018-01-16 19:32:53'),
(45, 29, 3, '2018-01-18 00:32:01', '2018-01-18 00:32:01'),
(46, 30, 3, '2018-01-18 00:32:26', '2018-01-18 00:32:26'),
(47, 2, 3, '2018-02-07 01:50:53', '2018-02-07 01:50:53'),
(52, 3, 4, '2018-05-27 23:09:02', '2018-05-27 23:09:02'),
(53, 11, 7, '2018-07-01 20:42:55', '2018-07-01 20:42:55'),
(54, 24, 4, '2018-09-24 20:44:02', '2018-09-24 20:44:02'),
(55, 3, 3, '2018-11-19 00:23:09', '2018-11-19 00:23:09'),
(56, 28, 3, '2018-11-28 19:32:54', '2018-11-28 19:32:54'),
(60, 1, 2, '2018-12-08 05:38:23', '2018-12-08 05:38:23'),
(63, 35, 3, '2018-12-26 18:41:08', '2018-12-26 18:41:08'),
(68, 38, 3, '2019-01-21 19:32:49', '2019-01-21 19:32:49'),
(69, 39, 3, '2019-01-21 20:03:41', '2019-01-21 20:03:41'),
(74, 3, 2, '2019-01-31 20:37:53', '2019-01-31 20:37:53'),
(75, 45, 3, '2019-03-28 00:57:37', '2019-03-28 00:57:37'),
(77, 47, 3, '2019-03-28 01:19:19', '2019-03-28 01:19:19'),
(78, 12, 2, '2019-04-01 03:39:40', '2019-04-01 03:39:40'),
(80, 2, 2, '2019-04-03 06:17:12', '2019-04-03 06:17:12'),
(82, 24, 2, '2019-04-07 09:33:04', '2019-04-07 09:33:04'),
(83, 29, 2, '2019-04-07 09:33:17', '2019-04-07 09:33:17'),
(85, 49, 3, '2019-04-09 01:57:55', '2019-04-09 01:57:55'),
(86, 50, 3, '2019-04-09 08:03:26', '2019-04-09 08:03:26'),
(87, 51, 3, '2019-04-10 04:13:51', '2019-04-10 04:13:51'),
(89, 7, 2, '2019-04-25 04:20:13', '2019-04-25 04:20:13'),
(90, 28, 2, '2019-04-25 04:54:42', '2019-04-25 04:54:42'),
(91, 52, 5, '2019-05-24 07:12:54', '2019-05-24 07:12:54'),
(92, 52, 6, '2019-05-24 07:13:22', '2019-05-24 07:13:22'),
(93, 52, 7, '2019-05-24 07:13:37', '2019-05-24 07:13:37'),
(96, 35, 2, '2019-07-13 04:12:50', '2019-07-13 04:12:50'),
(98, 15, 2, '2019-07-21 04:55:01', '2019-07-21 04:55:01'),
(99, 11, 2, '2019-08-29 14:22:44', '2019-08-29 14:22:44'),
(100, 53, 2, '2019-09-03 04:37:43', '2019-09-03 04:37:43'),
(101, 51, 2, '2019-09-04 02:16:50', '2019-09-04 02:16:50'),
(102, 54, 3, '2019-10-31 05:46:15', '2019-10-31 05:46:15'),
(104, 8, 2, '2019-12-03 08:51:26', '2019-12-03 08:51:26'),
(105, 13, 2, '2019-12-03 08:52:04', '2019-12-03 08:52:04'),
(107, 30, 2, '2019-12-03 08:53:03', '2019-12-03 08:53:03'),
(111, 38, 2, '2019-12-03 08:55:55', '2019-12-03 08:55:55'),
(112, 39, 2, '2019-12-03 08:57:33', '2019-12-03 08:57:33'),
(114, 45, 2, '2019-12-03 08:58:06', '2019-12-03 08:58:06'),
(115, 47, 2, '2019-12-03 08:58:28', '2019-12-03 08:58:28'),
(116, 50, 2, '2019-12-03 08:58:46', '2019-12-03 08:58:46'),
(117, 52, 2, '2019-12-03 08:59:09', '2019-12-03 08:59:09'),
(118, 54, 2, '2019-12-03 08:59:29', '2019-12-03 08:59:29'),
(119, 56, 2, '2019-12-03 08:59:57', '2019-12-03 08:59:57'),
(120, 57, 2, '2019-12-03 09:00:15', '2019-12-03 09:00:15'),
(121, 58, 2, '2019-12-03 09:00:29', '2019-12-03 09:00:29'),
(122, 59, 2, '2019-12-03 09:00:41', '2019-12-03 09:00:41'),
(123, 60, 2, '2019-12-03 09:01:07', '2019-12-03 09:01:07'),
(124, 61, 2, '2019-12-03 09:01:34', '2019-12-03 09:01:34'),
(125, 62, 2, '2019-12-03 09:01:51', '2019-12-03 09:01:51'),
(126, 63, 2, '2019-12-03 09:02:06', '2019-12-03 09:02:06'),
(127, 64, 2, '2019-12-03 09:02:18', '2019-12-03 09:02:18'),
(129, 66, 2, '2019-12-03 09:02:50', '2019-12-03 09:02:50'),
(130, 67, 2, '2019-12-03 09:03:20', '2019-12-03 09:03:20'),
(131, 68, 2, '2019-12-03 09:03:31', '2019-12-03 09:03:31'),
(132, 80, 2, '2019-12-03 09:03:46', '2019-12-03 09:03:46'),
(133, 69, 2, '2019-12-03 09:04:02', '2019-12-03 09:04:02'),
(135, 71, 2, '2019-12-03 09:04:33', '2019-12-03 09:04:33'),
(136, 72, 2, '2019-12-03 09:04:44', '2019-12-03 09:04:44'),
(137, 73, 2, '2019-12-03 09:04:54', '2019-12-03 09:04:54'),
(138, 74, 2, '2019-12-03 09:05:08', '2019-12-03 09:05:08'),
(139, 75, 2, '2019-12-03 09:05:19', '2019-12-03 09:05:19'),
(140, 76, 2, '2019-12-03 09:05:32', '2019-12-03 09:05:32'),
(141, 77, 2, '2019-12-03 09:05:42', '2019-12-03 09:05:42'),
(143, 79, 2, '2019-12-03 09:06:51', '2019-12-03 09:06:51'),
(144, 81, 2, '2019-12-03 09:07:08', '2019-12-03 09:07:08'),
(146, 83, 2, '2019-12-03 09:07:44', '2019-12-03 09:07:44'),
(147, 84, 2, '2019-12-03 09:07:57', '2019-12-03 09:07:57'),
(148, 85, 2, '2019-12-03 09:15:34', '2019-12-03 09:15:34'),
(149, 87, 2, '2019-12-03 09:16:29', '2019-12-03 09:16:29'),
(150, 92, 2, '2019-12-12 06:51:20', '2019-12-12 06:51:20'),
(151, 91, 2, '2019-12-12 06:52:38', '2019-12-12 06:52:38'),
(152, 90, 2, '2019-12-12 06:52:56', '2019-12-12 06:52:56'),
(153, 89, 2, '2019-12-12 06:53:09', '2019-12-12 06:53:09'),
(154, 88, 2, '2019-12-12 06:53:22', '2019-12-12 06:53:22'),
(155, 98, 2, '2019-12-12 07:33:54', '2019-12-12 07:33:54'),
(156, 99, 2, '2019-12-12 07:34:05', '2019-12-12 07:34:05'),
(158, 10, 2, '2019-12-12 07:34:49', '2019-12-12 07:34:49'),
(162, 49, 2, '2019-12-12 07:37:13', '2019-12-12 07:37:13'),
(163, 86, 2, '2019-12-12 07:38:48', '2019-12-12 07:38:48'),
(164, 93, 2, '2019-12-12 07:39:35', '2019-12-12 07:39:35'),
(165, 94, 2, '2019-12-12 07:39:59', '2019-12-12 07:39:59'),
(166, 95, 2, '2019-12-12 07:40:18', '2019-12-12 07:40:18'),
(167, 96, 2, '2019-12-12 07:40:27', '2019-12-12 07:40:27'),
(168, 97, 2, '2019-12-12 07:40:42', '2019-12-12 07:40:42'),
(170, 101, 2, '2019-12-13 01:44:46', '2019-12-13 01:44:46'),
(176, 107, 2, '2020-01-16 08:36:35', '2020-01-16 08:36:35'),
(177, 108, 2, '2020-01-16 08:36:47', '2020-01-16 08:36:47'),
(178, 110, 2, '2020-01-24 05:36:07', '2020-01-24 05:36:07'),
(179, 111, 2, '2020-01-24 05:37:43', '2020-01-24 05:37:43'),
(182, 114, 2, '2020-01-24 05:46:38', '2020-01-24 05:46:38'),
(187, 100, 2, '2020-01-24 08:28:28', '2020-01-24 08:28:28'),
(189, 119, 3, '2020-03-06 03:32:37', '2020-03-06 03:32:37'),
(192, 121, 2, '2020-03-26 02:17:31', '2020-03-26 02:17:31'),
(193, 25, 2, '2020-04-01 02:29:33', '2020-04-01 02:29:33'),
(194, 122, 2, '2020-04-09 03:59:29', '2020-04-09 03:59:29'),
(195, 123, 2, '2020-04-09 04:04:57', '2020-04-09 04:04:57'),
(196, 129, 2, '2021-12-13 08:28:31', '2021-12-13 08:28:31'),
(197, 129, 3, '2021-12-13 08:28:43', '2021-12-13 08:28:43'),
(198, 150, 2, '2021-12-13 08:39:48', '2021-12-13 08:39:48'),
(199, 172, 2, '2021-12-14 02:00:40', '2021-12-14 02:00:40'),
(200, 82, 2, '2021-12-15 01:32:56', '2021-12-15 01:32:56'),
(201, 146, 2, '2021-12-15 01:33:26', '2021-12-15 01:33:26'),
(202, 143, 2, '2021-12-15 01:34:04', '2021-12-15 01:34:04'),
(203, 144, 2, '2021-12-15 01:34:17', '2021-12-15 01:34:17'),
(204, 147, 2, '2021-12-15 01:34:32', '2021-12-15 01:34:32'),
(205, 173, 2, '2021-12-15 04:20:12', '2021-12-15 04:20:12'),
(206, 124, 2, '2021-12-15 04:20:50', '2021-12-15 04:20:50'),
(207, 126, 2, '2021-12-15 04:21:18', '2021-12-15 04:21:18'),
(208, 130, 2, '2021-12-15 04:22:20', '2021-12-15 04:22:20'),
(209, 125, 2, '2021-12-15 04:22:39', '2021-12-15 04:22:39'),
(210, 133, 2, '2021-12-15 04:22:56', '2021-12-15 04:22:56'),
(211, 154, 2, '2021-12-15 04:54:24', '2021-12-15 04:54:24'),
(212, 148, 2, '2021-12-15 04:55:45', '2021-12-15 04:55:45'),
(213, 149, 2, '2021-12-15 04:57:37', '2021-12-15 04:57:37'),
(214, 152, 2, '2021-12-15 04:57:48', '2021-12-15 04:57:48'),
(215, 166, 2, '2021-12-15 04:57:59', '2021-12-15 04:57:59'),
(216, 167, 2, '2021-12-15 04:58:11', '2021-12-15 04:58:11'),
(217, 153, 2, '2021-12-15 04:59:09', '2021-12-15 04:59:09'),
(218, 174, 2, '2021-12-15 06:21:49', '2021-12-15 06:21:49'),
(219, 141, 2, '2021-12-17 07:01:47', '2021-12-17 07:01:47'),
(220, 175, 2, '2021-12-17 07:03:24', '2021-12-17 07:03:24'),
(221, 158, 2, '2021-12-17 07:04:01', '2021-12-17 07:04:01'),
(222, 157, 2, '2021-12-17 07:04:15', '2021-12-17 07:04:15'),
(223, 156, 2, '2021-12-17 07:05:49', '2021-12-17 07:05:49'),
(224, 168, 2, '2021-12-17 07:06:57', '2021-12-17 07:06:57'),
(225, 138, 2, '2021-12-17 07:07:23', '2021-12-17 07:07:23'),
(226, 67, 3, '2021-12-29 06:17:31', '2021-12-29 06:17:31'),
(227, 151, 2, '2022-01-04 03:37:39', '2022-01-04 03:37:39'),
(228, 145, 2, '2022-01-10 09:20:24', '2022-01-10 09:20:24'),
(229, 6, 3, '2022-02-14 04:57:15', '2022-02-14 04:57:15'),
(230, 176, 2, '2022-02-25 08:14:35', '2022-02-25 08:14:35'),
(231, 76, 3, '2022-03-29 07:03:55', '2022-03-29 07:03:55'),
(232, 177, 2, '2022-04-08 03:50:01', '2022-04-08 03:50:01'),
(233, 178, 2, '2022-04-08 03:50:11', '2022-04-08 03:50:11'),
(234, 179, 3, '2022-04-21 01:31:05', '2022-04-21 01:31:05'),
(235, 136, 2, '2022-04-21 08:52:37', '2022-04-21 08:52:37'),
(236, 180, 3, '2022-05-23 03:14:08', '2022-05-23 03:14:08'),
(237, 180, 2, '2022-05-23 03:14:27', '2022-05-23 03:14:27'),
(238, 181, 2, '2022-06-03 02:14:04', '2022-06-03 02:14:04'),
(239, 93, 3, '2022-06-30 02:19:48', '2022-06-30 02:19:48'),
(240, 25, 3, '2022-06-30 06:52:07', '2022-06-30 06:52:07'),
(241, 93, 6, '2022-07-04 07:54:53', '2022-07-04 07:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_area_kerjas`
--
ALTER TABLE `m_area_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_delay_range`
--
ALTER TABLE `m_delay_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_departments`
--
ALTER TABLE `m_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_departments_area_kerja_id_index` (`area_kerja_id`);

--
-- Indexes for table `m_jabatans`
--
ALTER TABLE `m_jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kategori_beritas`
--
ALTER TABLE `m_kategori_beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `t_beritas`
--
ALTER TABLE `t_beritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_beritas_kategori_berita_id_index` (`kategori_berita_id`);

--
-- Indexes for table `t_pengumumans`
--
ALTER TABLE `t_pengumumans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_index` (`department_id`),
  ADD KEY `users_jabatan_id_index` (`jabatan_id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rights_user_id_index` (`user_id`),
  ADD KEY `user_rights_app_id_index` (`app_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `m_area_kerjas`
--
ALTER TABLE `m_area_kerjas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_delay_range`
--
ALTER TABLE `m_delay_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_departments`
--
ALTER TABLE `m_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `m_jabatans`
--
ALTER TABLE `m_jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `m_kategori_beritas`
--
ALTER TABLE `m_kategori_beritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_beritas`
--
ALTER TABLE `t_beritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_pengumumans`
--
ALTER TABLE `t_pengumumans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_departments`
--
ALTER TABLE `m_departments`
  ADD CONSTRAINT `m_departments_area_kerja_id_foreign` FOREIGN KEY (`area_kerja_id`) REFERENCES `m_area_kerjas` (`id`);

--
-- Constraints for table `t_beritas`
--
ALTER TABLE `t_beritas`
  ADD CONSTRAINT `t_beritas_kategori_berita_id_foreign` FOREIGN KEY (`kategori_berita_id`) REFERENCES `m_kategori_beritas` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `m_departments` (`id`),
  ADD CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `m_jabatans` (`id`);

--
-- Constraints for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD CONSTRAINT `user_rights_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `apps` (`id`),
  ADD CONSTRAINT `user_rights_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
