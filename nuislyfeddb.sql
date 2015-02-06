-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05.02.2015 klo 09:54
-- Palvelimen versio: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nuislyfeddb`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `nf_comments`
--

CREATE TABLE IF NOT EXISTS `nf_comments` (
  `commnumber` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(350) DEFAULT NULL,
  `nimi` varchar(40) DEFAULT NULL,
  `sahkoposti` varchar(50) DEFAULT NULL,
  `arvosana` char(1) DEFAULT NULL,
  PRIMARY KEY (`commnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Vedos taulusta `nf_comments`
--

INSERT INTO `nf_comments` (`commnumber`, `comment`, `nimi`, `sahkoposti`, `arvosana`) VALUES
(1, 'nuis', 'sebastian Nuis', 'sahkoposti@minä.fi', '5'),
(6, 'kinkku pekoni pasta oli hyvää', 'nuis', 'asd', '2'),
(7, 'moi roni', 'nuisss', 'njgfdr', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
