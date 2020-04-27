-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 06:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipd19_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_info`
--

CREATE TABLE `tbl_contact_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `tbl_quiz_contents`
--

CREATE TABLE `tbl_quiz_contents` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `optionA` varchar(250) NOT NULL,
  `optionB` varchar(250) NOT NULL,
  `optionC` varchar(250) NOT NULL,
  `optionD` varchar(250) NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quiz_contents`
--

INSERT INTO `tbl_quiz_contents` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`) VALUES
(1, 'Which of the following differences are valid between PHP 4 and PHP 5?', 'Built-in native support for SQLite\r\n', 'Support for inheritance', 'improved MySQL support', 'Both a and c', 'd'),
(2, 'Which superglobal variable holds information about headers, paths, and script locations?', '$_SESSION', '$_SERVER  ', '$_GLOBALS', '$_GET', 'b'),
(3, 'What is the correct way to open the file \"time.txt\" as readable?', 'fopen(\"time.txt\",\"r+\");', 'open(\"time.txt\");', 'fopen(\"time.txt\",\"r\");  ', 'open(\"time.txt\",\"read\");', 'c'),
(4, 'Which of the following is used to declare a constant ?', 'const', 'constant', 'define', 'def', 'a'),
(5, 'Which of the following is the way to create comments in PHP?', '// commented code to end of line', '/* commented code here */', '# commented code to end of line', 'all of the above', 'd'),
(6, 'What does PHP stand for?', 'Personal Hypertext Processor', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'Private Home Page', 'c'),
(7, 'How do you create a cookie in PHP?', 'setcookie() ', 'makecookie()', 'createcookie', 'getcookie()', 'a'),
(8, 'How can you declare a variable in twig?', '{% define myVariable = \'My Text\' %}', '{% set myVariable %}My Text{% endset %}', '{% set myVariable = \'My Text\' %}', '{% set myVariable %}{{ \'My Text\' }}{% endset %}', 'c'),
(9, 'From following which one is correct way to install Twig is via Composer?\r\n\r\n', 'composer install \"twig/twig:^3.0\"', 'composer require \"twig/twig:^3.0\"', 'composer update \"twig/twig:^3.0\"', 'composer require twig/twig', 'b'),
(10, 'Which of the following statement is true ?', 'A Fat-Free Framework is a powerful yet easy-to-use PHP micro-framework designed to help you build dynamic and robust web applications.', 'F3 supports SQL, but it does not support NoSQL database.', 'Twig is the flexible, fast, and secure template engine for PHP.', 'Both a and c', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_results`
--

CREATE TABLE `tbl_quiz_results` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quizNo` int(1) NOT NULL,
  `score` int(3) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact_info`
--
ALTER TABLE `tbl_contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quiz_contents`
--
ALTER TABLE `tbl_quiz_contents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `tbl_contact_info`
--
ALTER TABLE `tbl_contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_quiz_contents`
--
ALTER TABLE `tbl_quiz_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_quiz_results`
--
ALTER TABLE `tbl_quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
