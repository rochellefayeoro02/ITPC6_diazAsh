-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2026 at 04:10 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unsec`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

DROP TABLE IF EXISTS `reg`;
CREATE TABLE IF NOT EXISTS `reg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` enum('Female','Male','Others') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `fullname`, `username`, `password`, `age`, `gender`, `address`) VALUES
(1, 'Ashley Margareth Diaz', 'ashh', '$2y$10$9ZCCyjmmuAIORI.51gPyCu566W06Amj.PkCYvGT.JBKXNnbVApsqK', 21, 'Female', 'guintas'),
(2, 'ashley', 'ashh \'OR \'1\'=\'1', '$2y$10$nl/O2qE.w.zm12r7bQ9cIuCxl09MXhzpqO28erC0vY98FfvfDu96.', 20, 'Female', 'iloilo'),
(3, 'ash', 'am', '$2y$10$Z/lTar0MXwAVXPpx42Iz9OOYM0qBR233q68URVkz4g6Cbig8dDG7.', 1, 'Female', 'Iloilo'),
(4, 'diaz', 'dm', '$2y$10$SL2D2KJPHSACclmYBz/p5OS5RZlwmfBy4CL0znVetunf1dkxB4RMq', 20, 'Female', 'leganes'),
(5, 'sling', '1ad', '$2y$10$j/bPItgsIOe.jVSc6jMpt.kLO/OR7Piure8izztd4Ii9jPTFfFviC', 20, 'Female', 'leganes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
