-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: mysql.mfirst.io
-- Generation Time: Apr 16, 2011 at 07:15 AM
-- Server version: 5.1.53
-- PHP Version: 5.2.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mfirst`
--

-- --------------------------------------------------------

--
-- Table structure for table `idinfo`
--

CREATE TABLE IF NOT EXISTS `idinfo` (
  `refid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `servicename` varchar(100) DEFAULT NULL,  
  `id` bigint(20) unsigned NOT NULL,  
  `action` varchar(20) NOT NULL,
  `actionBy` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,  
  PRIMARY KEY (`refid`),
  UNIQUE KEY `UK_BLM_REFID_ID` (`refid`,`id`),
  KEY `FK_BLM_ID` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `idinfo` 
(`refid`, `servicename`, `id`, `action`, `actionBy`, `createdAt`, `updatedAt`) 
VALUES
(1,  'USERS',               1001, 'add', 'mfirstadmin', '2010-08-28 00:00:00', '2010-08-28 00:00:00')
;


