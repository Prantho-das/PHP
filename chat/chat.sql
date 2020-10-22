-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 01:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `frm` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `coid` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `frm`, `too`, `msg`, `coid`, `time`) VALUES
(27, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'hi shoccho', 'pra5f15efb0c188a', '2020-07-20 19:25:36'),
(28, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'hi prantho.how are you', 'pra5f15efb0c188a', '2020-07-20 19:26:14'),
(29, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'I am good prantho', 'pra5f15efb0c188a', '2020-07-20 19:27:17'),
(30, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'afasdfa', 'pra5f15fe3ddffb2', '2020-07-20 20:27:41'),
(31, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'afasdfa', 'pra5f15fe3ddffb2', '2020-07-20 20:29:08'),
(32, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'afasdfa', 'pra5f15fe3ddffb2', '2020-07-20 20:30:19'),
(33, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'afasdfa', 'pra5f15fe3ddffb2', '2020-07-20 20:32:05'),
(34, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:43:02'),
(35, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:45:15'),
(36, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:45:56'),
(37, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:46:26'),
(38, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:48:26'),
(39, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:48:38'),
(40, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:49:29'),
(41, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:49:29'),
(42, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:50:53'),
(43, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:51:11'),
(44, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:51:35'),
(45, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:52:00'),
(46, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:52:42'),
(47, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:55:35'),
(48, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 20:55:57'),
(49, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 21:00:09'),
(50, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 21:00:37'),
(51, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 21:02:34'),
(52, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 21:03:53'),
(53, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'asdfasf', 'pra5f15fe3ddffb2', '2020-07-20 21:04:37'),
(54, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'hi', 'pra5f15fe3ddffb2', '2020-07-20 21:05:01'),
(55, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'i am prantho', 'pra5f15fe3ddffb2', '2020-07-20 21:06:26'),
(56, 'shocchokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'i am prantho', 'pra5f15fe3ddffb2', '2020-07-20 21:06:56'),
(57, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'hi prantho', 'pra5f15efb0c188a', '2020-07-20 21:10:38'),
(58, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'how are you', 'pra5f15efb0c188a', '2020-07-20 21:10:51'),
(59, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'i am fine and you', 'pra5f15efb0c188a', '2020-07-20 21:11:31'),
(60, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'how are you', 'pra5f15efb0c188a', '2020-07-20 21:21:25'),
(61, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'alison tyler', 'pra5f15efb0c188a', '2020-07-20 21:25:54'),
(62, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'she is a pornstar\r\n', 'pra5f15efb0c188a', '2020-07-20 21:31:36'),
(63, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'hbjbkj', 'pra5f15efb0c188a', '2020-07-20 21:34:46'),
(64, 'shocchokumardas786@gmail.com', 'pranthokumardas786@gmail.com', 'hbjbkj', 'pra5f15efb0c188a', '2020-07-20 21:36:16'),
(65, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'fhggh', 'pra5f15efb0c188a', '2020-07-20 21:36:24'),
(66, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'hi', 'pra5f15efb0c188a', '2020-07-20 21:36:32'),
(67, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'hello hi buy buy', 'pra5f15efb0c188a', '2020-07-20 21:37:26'),
(68, 'Pranthokumardas786@gmail.com', 'shocchokumardas786@gmail.com', 'fasfsdfasf', 'pra5f15efb0c188a', '2020-07-21 18:40:16'),
(69, 'pranthokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'gdsgwdg', 'pra5f38b939d3123', '2020-08-16 04:42:33'),
(70, 'pranthokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'hdfhdfh', 'pra5f38b939d3123', '2020-08-16 04:42:38'),
(71, 'pranthokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'hdfhdfh', 'pra5f38b939d3123', '2020-08-16 04:43:20'),
(72, 'pranthokumardas786@gmail.com', 'shocchokumardas@gmail.com', 'gdsgwdg', 'pra5f38b939d3123', '2020-08-16 04:44:59'),
(73, '', 'shocchokumardas@gmail.com', 'vkllf', 'pra5f3c31d85855a', '2020-08-18 19:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `abt` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `abt`, `email`, `pass`, `status`, `time`) VALUES
(1, 'prantho', 'I am a good man', 'pranthokumardas786@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2020-07-19 18:13:05'),
(2, 'shoccho', 'I am a good boy', 'shocchokumardas786@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2020-07-19 18:13:05'),
(3, 'Surjo', 'I am a good boy', 'shocchokumardas@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2020-07-19 18:13:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
