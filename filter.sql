-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 08:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5985248_nobby`
--

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `tanggal`, `name`, `keterangan`, `nama_kategori`, `created`, `updated`) VALUES
(1, '2023-01-02', 'tes', 'tes', 'XIOMI', '2023-01-02 02:50:06', '2023-01-02 02:50:06'),
(2, '2022-12-01', 'tessaja', 'tessaja', '', '2023-01-02 02:51:38', '2023-01-02 02:51:38'),
(3, '2022-11-01', 'testtt', 'testtt', '', '2023-01-02 04:11:26', '2023-01-02 04:11:26'),
(4, '2023-02-01', 'dsdsdsdsd', 'dsdsdsdsd', '', '2023-01-02 04:11:26', '2023-01-02 04:11:26'),
(5, '2022-12-01', 'tessaja22', 'tessaja', '', '2023-01-02 02:51:38', '2023-01-02 02:51:38'),
(6, '2022-03-01', 'sdsdsds', 'sdsdsdsd', '', '2023-01-02 04:13:45', '2023-01-02 04:13:45'),
(7, '2022-04-01', 'fdfdfdfd', 'fdfdfdf', '', '2023-01-02 04:13:45', '2023-01-02 04:13:45'),
(8, '2022-07-01', 'hjhjhjh', 'hjhjhjhjh', '', '2023-01-02 04:14:33', '2023-01-02 04:14:33'),
(9, '2023-06-01', 'nmnmn', 'nmnmnmn', '', '2023-01-02 04:15:23', '2023-01-02 04:15:23'),
(10, '2023-08-01', 'mnmnm', 'nmnmn', '', '2023-01-02 04:15:23', '2023-01-02 04:15:23'),
(11, '2022-09-01', 'uyuyu', 'yuyuyu', '', '2023-01-02 04:16:22', '2023-01-02 04:16:22'),
(12, '2022-10-02', 'dsdsd', 'dsds', '', '2023-01-02 04:16:22', '2023-01-02 04:16:22'),
(13, '2022-05-01', 'fdfdgytu', 'jkjljljl', '', '2023-01-02 04:17:19', '2023-01-02 04:17:19'),
(14, '2023-01-01', 'sdsds', 'dsd', '', '2023-01-02 06:11:17', '2023-01-02 06:11:17'),
(15, '2023-01-03', 'vbvbv', 'bvbvbvbv', '', '2023-01-02 06:11:17', '2023-01-02 06:11:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
