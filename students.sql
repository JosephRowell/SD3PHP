-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 07:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `cwid` int(9) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `accomodations` enum('Yes','No') NOT NULL,
  `dinepref` enum('Yes','No','No Preference') NOT NULL,
  `dormname` varchar(40) NOT NULL,
  `confcode` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`cwid`, `firstname`, `lastname`, `email`, `password`, `gender`, `accomodations`, `dinepref`, `dormname`, `confcode`, `reg_date`) VALUES
(123456789, 'joe', 'smoe', 'rowelljoey@yahoo.com', 'qwerty', 'male', 'No', 'Yes', 'Leo', '8448t3r98jgjgfdi', '2015-05-10 01:23:04'),
(152648295, 'kdfjdkjf', 'kdjfkldjf', 'poop4@aol.com', '3917c2c76f806cb89696a63083b1c655ff5f6dadc3fe832d5a', 'male', 'Yes', 'Yes', '', '', '2015-05-13 16:11:29'),
(265482158, 'oijeroii', 'sdfs', 'poop3@aol.com', '8233e3ddce4f2e48c53681cb7ce51f444fb3534bedec63ff7e', 'male', 'Yes', 'Yes', '', '', '2015-05-13 00:52:11'),
(838383838, 'ffff', 'llll', 'poop@aol.com', 'a797616511d9e98a63f59b593885ea69113d34b98067119fde', 'male', 'Yes', 'Yes', '', '', '2015-05-10 06:31:30'),
(888822233, 'aaa', 'bbb', 'poop2@aol.com', 'ab4bc7765e67a3097b10f9876df64acf7a52f1b277e2cec31c', 'male', 'Yes', 'Yes', '', '', '2015-05-10 06:40:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD UNIQUE KEY `cwid` (`cwid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
