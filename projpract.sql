-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2016 at 05:37 PM
-- Server version: 5.6.26-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projpract`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`login`, `pass`) VALUES
('admin1', '1d5afc15d99fe43fb602b25f3b5d2ee0');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `text` varchar(500) NOT NULL,
  `user` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `room` int(5) NOT NULL,
  `pre_comment` int(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user` (`user`),
  KEY `room` (`room`),
  KEY `pre_user` (`pre_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Floor`
--

CREATE TABLE IF NOT EXISTS `Floor` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) DEFAULT '.\\images\\600.png',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Floor`
--

INSERT INTO `Floor` (`ID`, `img`) VALUES
(1, '.\\images\\600.png'),
(2, '.\\images\\600.png'),
(3, '.\\images\\600.png');

-- --------------------------------------------------------

--
-- Table structure for table `Moder`
--

CREATE TABLE IF NOT EXISTS `Moder` (
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE IF NOT EXISTS `Room` (
  `ID` int(5) NOT NULL,
  `floor` int(3) NOT NULL,
  `img` varchar(200) DEFAULT '.\\images\\600.png',
  `places` int(2) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `floor` (`floor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`ID`, `floor`, `img`, `places`, `info`) VALUES
(101, 1, '.\\images\\600.png', 2, NULL),
(102, 1, '.\\images\\600.png', 3, NULL),
(103, 1, '.\\images\\600.png', 4, NULL),
(104, 1, '.\\images\\600.png', 3, NULL),
(105, 1, '.\\images\\600.png', 3, NULL),
(106, 1, '.\\images\\600.png', 4, NULL),
(201, 2, '.\\images\\600.png', 4, NULL),
(202, 2, '.\\images\\600.png', 4, NULL),
(203, 2, '.\\images\\600.png', 2, NULL),
(204, 2, '.\\images\\600.png', 2, NULL),
(205, 2, '.\\images\\600.png', 4, NULL),
(301, 3, '.\\images\\600.png', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `pass` varchar(100) NOT NULL,
  `eMail` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `room` int(10) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `room` (`room`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `pass`, `eMail`, `name`, `room`, `info`) VALUES
(1, '1d5afc15d99fe43fb602b25f3b5d2ee0', 'newmail1@nure.ua', 'Azaza', 202, NULL),
(2, 'pass2', 'newmail2@nure.ua', 'Петров', 102, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `User` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`room`) REFERENCES `Room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`pre_comment`) REFERENCES `Comment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`floor`) REFERENCES `Floor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`room`) REFERENCES `Room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
