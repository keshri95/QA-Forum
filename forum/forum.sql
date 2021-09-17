-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 08:45 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CAT_INCREMENT` ()  NO SQL
SELECT COUNT(*) FROM categories$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(9, 'PROGRAMMING', 'ALL ABOUT PROGRAMMING'),
(10, 'INTERNET OF THINGS', 'ALL ABOUT IoT'),
(11, 'C#.NET', 'ALL ABOUT C# AND .NET FRAMEWORK'),
(12, 'PYTHON', 'ALL ABOUT PYTHON'),
(13, 'DATABASE MANAGEMENT SYSTEM', 'DBMS'),
(14, 'DATA STRUCTURES', 'ALL ABOUT DATA STRUCTURES'),
(15, 'UNIX & SHELL PROGRAMMING', ''),
(16, 'ANALOG & DIGITAL ELECTRONICS', ''),
(17, 'OPERATING SYSTEM', ''),
(18, 'SYSTEM SOFTWARE', ''),
(19, 'MICROPROCESSORS', ''),
(20, 'COMPUTER ORGANIZATION', ''),
(21, 'DESIGN AND ANALYSIS OF ALGORITHM', ''),
(22, 'OBJECT ORIENTED PROGRAMMING WITH JAVA', ''),
(23, 'DATA MINING', ''),
(24, 'CLOUD COMPUTING', ''),
(25, 'ARTIFICIAL INTELLIGENCE', ''),
(26, 'AUTOMATA THEORY', ''),
(27, 'COMPUTER NETWORKS', ''),
(28, 'OBJECT ORIENTED MODELLING & DESIGN', ''),
(29, 'BIG DATA & HADOOP', ''),
(30, 'MANAGEMENT & ENTREPRENEURSHIP', ''),
(31, 'C-PROGRAMMING', ''),
(34, 'HTML-HYPERTEXT MARKUP LANGUAGE', 'IT PROVIDES BASIC STRUCTURE FOR A WEBSITE'),
(35, 'CSS-CASCADING STYLE SHEETS', 'IT IS USED TO STYLE A WEBSITE'),
(36, 'JAVASCRIPT', 'IT IS USED FOR FRONT-END SCRIPTING OF A WEBSITE'),
(37, 'SQL-STRUCTURED QUERY LANGUAGE', 'IT IS USED TO CREATE THE STRUCTURE OF A WEBSITE'),
(38, 'PHP-HYPERTEXT PREPROCESSOR', 'IT IS USED FOR BACKEND SCRIPTING AND CONNECTING A WEBSITE TO ITS DATABASE'),
(39, 'BOOTSTRAP', 'USED FOR STYLING THE WEB PAGE AND MAKING IT RESPONSIVE'),
(40, 'W3.CSS', 'IT IS ALSO USED FOR STYLING THE WEB PAGE AND MAKING IT RESPONSIVE'),
(43, 'WEB DEVELOPMENT', 'You Can Ask Anything About Web Development.'),
(44, 'VIRTUAL REALITY', 'ALL ABOUT VIRTUAL REALITY');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(8) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `comment`) VALUES
(11, 'devina', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `posttime`
--

CREATE TABLE `posttime` (
  `time_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttime`
--

INSERT INTO `posttime` (`time_posted`) VALUES
('2018-11-12 03:41:41'),
('2018-11-12 05:20:42'),
('2018-11-21 17:28:27'),
('2018-11-27 13:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(8) NOT NULL,
  `topic_id` int(8) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `reply`, `user_id`) VALUES
(8, 20, 'python is a programming language', 0),
(9, 21, 'electronic device', 0),
(10, 20, 'Python is an interpreted high-level programming language for general purpose programming.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_desc` text NOT NULL,
  `topic_cat` varchar(255) NOT NULL,
  `postedby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_desc`, `topic_cat`, `postedby`) VALUES
(21, 'what is computer', 'describe', 'DATA STRUCTURES', 'devina'),
(22, 'what is html?', 'descibe in brief', 'HTML-HYPERTEXT MARKUP LANGUAGE', 'devina'),
(23, 'what is programming??', 'something', 'PROGRAMMING', 'devina'),
(20, 'what is python all about?', 'answer in brief', 'PYTHON', 'devina');

--
-- Triggers `topics`
--
DELIMITER $$
CREATE TRIGGER `posttime` BEFORE INSERT ON `topics` FOR EACH ROW INSERT INTO posttime
VALUES(now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_level`) VALUES
(6, 'devina', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'devina.becs.16@acharya.ac.in', 0),
(8, 'devina roy', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin.becs.16@acharya.ac.in', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`,`topic_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
