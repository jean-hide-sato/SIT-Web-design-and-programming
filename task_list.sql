-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 10:30 AM
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
-- Database: `task_list`
--
CREATE DATABASE IF NOT EXISTS `task_list` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `task_list`;

-- --------------------------------------------------------

--
-- Table structure for table `task_to_sort`
--

DROP TABLE IF EXISTS `task_to_sort`;
CREATE TABLE IF NOT EXISTS `task_to_sort` (
  `taskID` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(255) NOT NULL,
  `checkbox` tinyint(1) NOT NULL,
  `taskDate` date NOT NULL,
  `taskPriority` int(10) UNSIGNED NOT NULL,
  `calculatedPriority` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`taskID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_to_sort`
--

INSERT INTO `task_to_sort` (`taskID`, `taskName`, `checkbox`, `taskDate`, `taskPriority`, `calculatedPriority`) VALUES
(8, 'test1', 0, '2021-07-31', 1, 34),
(9, 'test5', 0, '2021-12-31', 5, 60),
(12, 'test7', 0, '2021-07-16', 1, 14),
(18, 'test6', 0, '2021-07-19', 4, 21),
(19, 'test2', 0, '2021-07-18', 3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

DROP TABLE IF EXISTS `to_do_list`;
CREATE TABLE IF NOT EXISTS `to_do_list` (
  `taskID` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(255) NOT NULL,
  `checkbox` tinyint(1) NOT NULL,
  PRIMARY KEY (`taskID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `to_do_list`
--

INSERT INTO `to_do_list` (`taskID`, `taskName`, `checkbox`) VALUES
(6, 'task3', 0),
(10, 'test', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
