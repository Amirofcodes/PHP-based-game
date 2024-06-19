-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2024 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fight_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `fight_results`
--

CREATE TABLE `fight_results` (
  `id` int(11) NOT NULL,
  `winner` varchar(255) NOT NULL,
  `loser` varchar(255) NOT NULL,
  `fight_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Hero_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fight_results`
--

INSERT INTO `fight_results` (`id`, `winner`, `loser`, `fight_date`, `Hero_level`) VALUES
(1, 'Naruto', 'Natsu Dragneel', '2024-06-19 11:53:35', 0),
(2, 'Naruto', 'Natsu Dragneel', '2024-06-19 11:53:49', 0),
(3, 'Goku', 'Thor', '2024-06-19 11:53:57', 0),
(4, 'Goku', 'Captain America', '2024-06-19 11:54:23', 0),
(5, 'Goku', 'Black Panther', '2024-06-19 11:54:32', 0),
(6, 'Goku', 'Sasuke', '2024-06-19 11:54:40', 0),
(7, 'Vegeta', 'Luffy', '2024-06-19 11:56:41', 0),
(8, 'Hulk', 'Iron Man', '2024-06-19 11:57:56', 0),
(9, 'Goku', 'Captain America', '2024-06-19 12:01:11', 0),
(10, 'Goku', 'Captain America', '2024-06-19 12:01:20', 0),
(11, 'Zatanna', 'Natsu Dragneel', '2024-06-19 12:02:34', 0),
(12, 'Hulk', 'Iron Man', '2024-06-19 12:04:15', 0),
(13, 'Natsu Dragneel', 'Zatanna', '2024-06-19 12:04:27', 0),
(14, 'Goku', 'Thor', '2024-06-19 12:04:35', 0),
(15, 'Captain America', 'Raven', '2024-06-19 12:06:11', 0),
(17, 'Hulk', 'Raven', '2024-06-19 12:12:59', 0),
(18, 'Hulk', 'Goku', '2024-06-19 12:14:58', 0),
(19, 'Hulk', 'Vegeta', '2024-06-19 12:15:42', 0),
(20, 'Vegeta', 'Loki', '2024-06-19 12:15:48', 0),
(21, 'Vegeta', 'Zatanna', '2024-06-19 12:15:59', 0),
(22, 'Vegeta', 'Zatanna', '2024-06-19 12:19:03', 0),
(23, 'Black Panther', 'Raven', '2024-06-19 12:19:10', 0),
(24, 'Naruto', 'Zatanna', '2024-06-19 12:20:08', 0),
(25, 'Naruto', 'Zatanna', '2024-06-19 12:22:15', 0),
(26, 'Iron Man', 'Scarlet Witch', '2024-06-19 12:22:21', 0),
(27, 'Goku', 'Thor', '2024-06-19 12:26:06', 0),
(28, 'Zatanna', 'Doctor Strange', '2024-06-19 12:32:44', 0),
(29, 'Natsu Dragneel', 'Erza Scarlet', '2024-06-19 12:34:58', 0),
(30, 'Loki', 'Sasuke', '2024-06-19 12:41:29', 2),
(31, 'Loki', 'Sasuke', '2024-06-19 12:41:41', 2),
(32, 'Black Panther', 'Loki', '2024-06-19 12:41:52', 2),
(33, 'Captain America', 'Luffy', '2024-06-19 12:42:00', 2),
(34, 'Captain America', 'Luffy', '2024-06-19 12:42:06', 2),
(35, 'Captain America', 'Zatanna', '2024-06-19 12:42:35', 2),
(36, 'Sasuke', 'Erza Scarlet', '2024-06-19 12:53:54', 2),
(37, 'Goku', 'Naruto', '2024-06-19 12:56:06', 2),
(38, 'Goku', 'Naruto', '2024-06-19 12:56:34', 2),
(39, 'Goku', 'Naruto', '2024-06-19 12:56:58', 2),
(40, 'Goku', 'Thor', '2024-06-19 13:00:55', 2),
(41, 'Goku', 'Thor', '2024-06-19 13:01:23', 2),
(42, 'Naruto', 'Zatanna', '2024-06-19 13:07:35', 2),
(43, 'Goku', 'Raven', '2024-06-19 13:13:52', 2),
(44, 'Goku', 'Scarlet Witch', '2024-06-19 13:14:59', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fight_results`
--
ALTER TABLE `fight_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fight_results`
--
ALTER TABLE `fight_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
