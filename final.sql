-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2021 at 12:30 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `evote_user`
--

DROP TABLE IF EXISTS `evote_user`;
CREATE TABLE IF NOT EXISTS `evote_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `acode` int(50) DEFAULT NULL,
  `vote` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evote_user`
--

INSERT INTO `evote_user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `reg_date`, `status`, `acode`, `vote`) VALUES
(1, 'Shravan', 'kumar', 'shshravan0001@gmail.com', 'shshravan0001@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-01-10 16:00:04', 'Active', 212659, ''),
(2, 'Shravan', 'Kumar', 'shshravan@gmail.com', 'shshravan000@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2021-01-10 16:21:31', 'Active', 438528, '');

-- --------------------------------------------------------

--
-- Table structure for table `own_vote`
--

DROP TABLE IF EXISTS `own_vote`;
CREATE TABLE IF NOT EXISTS `own_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hfirst` varchar(50) DEFAULT NULL,
  `hsecond` varchar(100) DEFAULT NULL,
  `ftext` varchar(100) DEFAULT NULL,
  `ffile` varchar(100) DEFAULT NULL,
  `stext` varchar(150) DEFAULT NULL,
  `sfile` varchar(150) DEFAULT NULL,
  `ttext` varchar(150) DEFAULT NULL,
  `tfile` varchar(150) DEFAULT NULL,
  `fotext` varchar(150) DEFAULT NULL,
  `fofile` varchar(150) DEFAULT NULL,
  `own_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(150) DEFAULT NULL,
  `vote_date` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `own_vote`
--

INSERT INTO `own_vote` (`id`, `hfirst`, `hsecond`, `ftext`, `ffile`, `stext`, `sfile`, `ttext`, `tfile`, `fotext`, `fofile`, `own_date`, `status`, `vote_date`, `email`) VALUES
(14, 'Raj', 'leader', 'Gmail', 'gmail.png', 'twitter', 'twitter.png', 'Instagram', 'Instagram-Icon.png', 'pppppp', 'pt.png', '2021-01-11 19:31:30', NULL, NULL, 'raj@gmail.com'),
(13, 'Shravan kumar', 'Leader', 'Symbol', 'om.png', 'LOGO', 'logo.png', 'sh', 'shinds.png', 'untitled', 'Untitled.png', '2021-01-11 18:55:03', NULL, NULL, 'shshravan0001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_number` bigint(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'pending',
  `curr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `age`, `gender`, `phone`, `address`, `state`, `city`, `pincode`, `id_type`, `id_number`, `email`, `password`, `type`, `curr_date`, `acode`) VALUES
(1, 'Shravan', 'kumar', 20, 'male', 9576949564, 'Atka', 'Jharkhand', 'Giridih', 825322, 'Aadhaar Card', 520628678787, 'shshravan0001@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'pending', '2020-12-27 18:42:29', 626280),
(2, 'Raj', 'Kumar', 18, 'female', 8210450336, 'Atka bagodar', 'Jharkhand', 'Giridih', 825322, 'Aadhaar Card', 546656326356, 'raj@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'pending', '2021-01-11 19:24:04', 759435);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voter_name` varchar(150) DEFAULT NULL,
  `voter_email` varchar(150) DEFAULT NULL,
  `voter_id` int(15) DEFAULT NULL,
  `candidate_name` varchar(150) DEFAULT NULL,
  `candidate_email` varchar(150) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `vote_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `voter_name`, `voter_email`, `voter_id`, `candidate_name`, `candidate_email`, `candidate_id`, `vote_date`) VALUES
(1, 'Shravan kumar', 'shshravan0001@gmail.com', 1, 'Raj', 'raj@gmail.com', 14, '2021-01-11 19:49:50'),
(2, 'Shravan kumar', 'shshravan0001@gmail.com', 1, 'Raj', 'raj@gmail.com', 14, '2021-01-11 19:52:00'),
(3, 'Shravan kumar', 'shshravan0001@gmail.com', 1, 'Shravan kumar', 'shshravan0001@gmail.com', 13, '2021-01-11 19:52:09'),
(4, 'Shravan kumar', 'shshravan@gmail.com', 1, 'Raj', 'raj@gmail.com', 14, '2021-01-11 19:49:50'),
(5, 'Shravan kumar', 'shshravan0@gmail.com', 1, 'Shravan kumar', 'shshravan0001@gmail.com', 13, '2021-01-11 19:52:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
