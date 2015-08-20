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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `refid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id` bigint(20) unsigned NOT NULL,
  `email` varchar(100) DEFAULT NULL,  
  `username` varchar(100) DEFAULT NULL,  
  `firstname` varchar(100) DEFAULT NULL,  
  `lastname` varchar(100) DEFAULT NULL,  
  `password` varchar(100) DEFAULT NULL,  
  `gender` varchar(10) DEFAULT NULL,  
  `yearOfBirth` varchar(4) DEFAULT NULL,  
  `phone` varchar(100) DEFAULT NULL,  
  `mobile` varchar(100) DEFAULT NULL,  
  `addressLine1` varchar(100) DEFAULT NULL,  
  `addressLine2` varchar(100) DEFAULT NULL,  
  `addressCity` varchar(100) DEFAULT NULL,  
  `addressState` varchar(100) DEFAULT NULL,  
  `addressCountry` varchar(100) DEFAULT NULL,  
  `addressZipCode` varchar(100) DEFAULT NULL,  
  `photo` varchar(100) DEFAULT NULL,  
  `interests` varchar(100) DEFAULT NULL,  
  `newsletters` bigint(5) unsigned NOT NULL,  
  `lastLoginTime` datetime NOT NULL,
  `recordStatus` bigint(5) unsigned NOT NULL,
  `accountType` bigint(5) unsigned NOT NULL,    
  `isAdmin` bigint(5) unsigned NOT NULL,                        
  `isDataAdmin` bigint(5) unsigned NOT NULL,
  `geoCoordinates` varchar(100) DEFAULT NULL,  
  `facebookDetails` varchar(100) DEFAULT NULL,  
  `twitterDetails` varchar(100) DEFAULT NULL,  
  `action` varchar(20) NOT NULL,
  `actionBy` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,  
  PRIMARY KEY (`refid`),
  UNIQUE KEY `UK_BLM_REFID_ID` (`refid`,`id`),
  KEY `FK_BLM_ID` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `users` 
(`refid`, `id`, `email`, `username`, `firstname`, `lastname`, `password`, `gender`, `yearOfBirth`, `phone`, `mobile`, `addressLine1`, `addressLine2`, `addressCity`, `addressState`, `addressCountry`, `addressZipCode`, `photo`, `interests`, `newsletters`, `lastLoginTime`, `recordStatus`, `accountType`, `isAdmin`, `isDataAdmin`, `geoCoordinates`,  `facebookDetails`, `twitterDetails`,  `action`, `actionBy`, `createdAt`, `updatedAt`) 
VALUES
(1,       1001, "shiva@nasotech.com", "shiva", "Shiva", "Thirumazhusai", "b8c37e33defde51cf91e1e03e51657da", "Male", "1970", "7034930436", "7034930436", "Street Name",  "", "Herndon", "VA", "USA", "20171", "shiva.png", "reading", 1, '2010-08-28 00:00:00', 1, 1, 1, 1, 'geo', 'facebook', 'twitter', 'add', 'mfirstadmin', '2010-08-28 00:00:00', '2010-08-28 00:00:00')
;


