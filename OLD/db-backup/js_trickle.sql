-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2019 at 10:00 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `js_trickle`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getNumberOfUsers` ()  SELECT COUNT(*) AS numberOfUsers FROM users$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsers` ()  SELECT * FROM users$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUsersFromEmail` (IN `sEmail` VARCHAR(10))  SELECT name,last_name FROM users	WHERE email = sEmail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(1, 2, 13),
(2, 1, 14),
(3, 1, 39),
(4, 1, 39),
(5, 1, 39),
(6, 1, 14),
(7, 1, 14),
(8, 1, 14),
(9, 1, 14),
(10, 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` int(10) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `time`, `status`, `email`) VALUES
(1, 1550840890, 0, 'A@A.com'),
(2, 1550841116, 0, 'A@A.com'),
(3, 1550841116, 1, 'A@A.com'),
(4, 1550842465, 0, 'A@A.com'),
(5, 1550842465, 1, 'A@A.com'),
(6, 1550842479, 0, 'A@A.com'),
(7, 1550842484, 0, 'A@A.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(11) UNSIGNED NOT NULL,
  `message` varchar(140) CHARACTER SET utf8mb4 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `message`, `date`) VALUES
(14, 2, '  i\'m from firefoxxxxsadfa', '2018-10-18 11:29:32'),
(39, 1, 'weq', '2018-11-17 14:16:54'),
(40, 1, ' dafadfaskdalsfjlakfjalkfjaklf', '2018-11-17 14:16:38'),
(41, 1, 'adgadg', '2018-11-17 14:15:52'),
(42, 1, 'DAGAGA', '2018-11-17 13:46:13'),
(43, 1, 'gggg', '2018-11-17 14:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varbinary(20) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `blocked_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `blocked`, `blocked_date`) VALUES
(1, 'A@A.com', 0x313233343536, 1, 0),
(2, 'B@B.com', 0x313233343536, 1, 0),
(3, 'c@c.com', 0x313233343536, 0, 1550837892);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
