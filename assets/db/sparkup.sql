-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2018 at 01:10 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparkup`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `resource_id`, `type`, `action`, `user_id`, `message`, `create_date`) VALUES
(12, 10, 'subject', 'added', 1, 'A new subject was added (News)', '2017-09-23 04:22:45'),
(13, 11, 'subject', 'added', 1, 'A new subject was added (Partners)', '2017-09-23 04:22:55'),
(14, 12, 'subject', 'added', 1, 'A new subject was added (Events)', '2017-09-23 04:25:22'),
(21, 7, 'page', 'added', 1, 'A new page was added (ECE)', '2017-09-23 16:01:57'),
(22, 0, 'page', 'updated', 1, 'A page was updated (ECES)', '2017-09-23 16:02:01'),
(23, 0, 'page', 'deleted', 1, 'A page (ECES) was deleted', '2017-09-23 16:02:02'),
(24, 1, 'page', 'added', 1, 'A new page was added (Welcome)', '2017-09-25 04:11:11'),
(25, 2, 'page', 'added', 1, 'A new page was added (About)', '2017-09-25 04:13:29'),
(26, 0, 'page', 'updated', 1, 'A page was updated (About)', '2017-09-25 04:28:01'),
(27, 0, 'page', 'updated', 1, 'A page was updated (Welcome)', '2017-09-25 04:28:11'),
(28, 0, 'page', 'updated', 1, 'A page was updated (Welcome)', '2017-09-25 04:30:56'),
(29, 0, 'page', 'updated', 1, 'A page was updated (About)', '2017-09-25 04:30:58'),
(30, 3, 'page', 'added', 1, 'A new page was added (Featured)', '2017-09-25 04:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '1',
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `in_menu` tinyint(4) NOT NULL DEFAULT '1',
  `menu_order` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `user_id`, `slug`, `title`, `body`, `is_published`, `is_featured`, `in_menu`, `menu_order`, `create_date`) VALUES
(1, 12, 1, 'welcome', 'Welcome', 'This is the home page.', 1, 0, 1, 1, '2017-09-25 04:11:11'),
(2, 11, 1, 'about', 'About', 'About us.', 1, 0, 1, 2, '2017-09-25 04:13:29'),
(3, 11, 1, 'featured', 'Featured', 'This is featured!', 1, 1, 0, 0, '2017-09-25 04:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `create_date`) VALUES
(10, 'News', '2017-09-23 04:22:45'),
(11, 'Partners', '2017-09-23 04:22:55'),
(12, 'Events', '2017-09-23 04:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `create_date`) VALUES
(1, 'justin', 'tungul', 'justin', 'justin@email.com', 'efe6398127928f1b2e9ef3207fb82663', '2017-09-25 04:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
