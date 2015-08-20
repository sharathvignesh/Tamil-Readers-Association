-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2015 at 06:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tra`
--

-- --------------------------------------------------------

--
-- Table structure for table `traadmins`
--

CREATE TABLE IF NOT EXISTS `traadmins` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `logname` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `add` varchar(200) DEFAULT NULL,
  `pho` varchar(50) DEFAULT NULL,
  `emai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trausers`
--

CREATE TABLE IF NOT EXISTS `trausers` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trausers`
--

INSERT INTO `trausers` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `phone`) VALUES
(1, 'ASWIN', 'KUMAR', 'ash@gmail.com', 'ash', 'admin', '9962020163'),
(6, 'PPP', 'PPP', 'PP', 'PPP', 'PPP', 'PP'),
(7, 'ooo', 'oo', 'ooo', 'oo', 'oooo', 'oooo'),
(8, 'll', 'll', 'll', 'llj', 'jj', 'jj'),
(9, 'kk', 'kk', 'kkkk', 'kk', 'kk', 'kk'),
(10, 'jj', 'jj', 'jj', 'jj', 'jj', 'jj'),
(11, 'hh', 'hh', 'hh', 'hh', 'hh', 'hh'),
(13, 'R.ASWIN ', 'KUMAR', 'AAA', 'PPP', 'ADMIN', 'AAA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trausers`
--
ALTER TABLE `trausers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trausers`
--
ALTER TABLE `trausers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
