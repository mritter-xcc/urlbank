-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 05:00 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `url_bank`
--
CREATE DATABASE IF NOT EXISTS `url_bank` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `url_bank`;

-- --------------------------------------------------------

--
-- Table structure for table `url_list`
--

CREATE TABLE IF NOT EXISTS `url_list` (
  `urlID` int(5) NOT NULL,
  `siteName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dateAdded` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `person` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `url_list`
--

INSERT INTO `url_list` (`urlID`, `siteName`, `address`, `dateAdded`, `category`, `person`, `description`) VALUES
(1, 'Cricket Australia', 'http://www.cricket.com.au', '2016-03-08', 'Sport', NULL, 'The website of Cricket Australia'),
(2, 'Bureau of Meteorology', 'http://www.bom.gov.au/', '2016-03-08', 'Weather', 'Sharon', 'The BOM website. Good for getting weather forecasts and information'),
(3, 'Major League Baseball', 'http://www.mlb.com/', '2016-03-08', 'Sport', 'Frank', 'All of the scores and team news around the Major Leagues.'),
(4, 'News.com.au', 'https://news.com.au', '2016-03-08', 'News', 'Frank', 'Latest news and updates from Australia and internationally.'),
(5, 'Internet Movie Database', 'http://www.imdb.com', '2016-03-08', 'Entertainment', 'Sarah', 'Information about movies and TV shows.'),
(6, 'Weather Zone', 'http://www.weatherzone.com.au/', '2016-05-19', 'Weather', 'Miles', 'Australian weather forecasts.'),
(7, 'NRL Website', 'http://www.nrl.com/', '2016-05-22', 'Sport', 'Joe', 'Website of the National Rugby League.'),
(8, 'TMZ', 'http://www.tmz.com/', '2016-05-01', 'Entertainment', 'Joe', 'News and gossip from the entertainment world.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_list`
--
ALTER TABLE `url_list`
  ADD PRIMARY KEY (`urlID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url_list`
--
ALTER TABLE `url_list`
  MODIFY `urlID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
