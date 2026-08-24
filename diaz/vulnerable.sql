-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2026 at 05:38 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: unsecure
--

-- --------------------------------------------------------

--
-- Table structure for table vulnerable
--

DROP TABLE IF EXISTS vulnerable;
CREATE TABLE IF NOT EXISTS vulnerable (
  id int NOT NULL AUTO_INCREMENT,
  fullname varchar(255) NOT NULL,
  username varchar(25) NOT NULL,
  password varchar(255) NOT NULL,
  age int NOT NULL,
  gender enum('Male','Female','Others','') CHARACTER SET utf32 COLLATE utf32_danish_ci NOT NULL,
  address varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table vulnerable
--

INSERT INTO vulnerable (id, fullname, username, password, age, gender, address) VALUES
(3, 'test', 'test', '$2y$10$cmMoGoVxw.lvs7ydmd3yk.hS2eY6Xm9G1DrwxTd/R0ViFZayovnEm', 18, 'Others', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATIOM_CONNECTION */;