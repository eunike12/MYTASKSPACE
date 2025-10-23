-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `selesai` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `judul`, `keterangan`, `selesai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(2, 'design', 'design bagian atas', 1, '2025-10-24', '2025-10-22 21:31:53', '2025-10-22 21:32:27'),
(3, 'belajar piano', 'belajar piano lagu \"River Flows in You\"', 0, '2025-11-30', '2025-10-22 21:39:39', '2025-10-22 21:39:39'),
(4, 'Masak', 'memasak masakan manado', 1, '2025-10-24', '2025-10-22 21:41:28', '2025-10-22 21:41:43'),
(5, 'membuat lagu', 'membuat lagu dari awal hingga akhir', 0, '2025-10-23', '2025-10-22 23:04:07', '2025-10-22 23:04:07'),
(6, 'belajar gitar', 'harus bisa fingerstyle', 0, '2025-12-23', '2025-10-22 23:06:09', '2025-10-22 23:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
