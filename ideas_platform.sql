-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 09:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideas_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `idea_number` int(11) NOT NULL COMMENT 'Idea number',
  `title` varchar(100) NOT NULL COMMENT 'title of the idea',
  `abstract` varchar(500) NOT NULL COMMENT 'Abstract of the idea',
  `published_on` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'created date',
  `expires_on` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'expiry date',
  `content` varchar(5000) NOT NULL COMMENT 'detailed description',
  `risk` int(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'risk rating ',
  `product_type` varchar(500) NOT NULL COMMENT 'product type',
  `instruments` varchar(20) NOT NULL COMMENT 'instruments',
  `currency` varchar(20) NOT NULL COMMENT 'currency',
  `major_sector` varchar(500) NOT NULL COMMENT 'major sector',
  `minor_sector` varchar(20) NOT NULL COMMENT 'minor sector',
  `region` varchar(20) NOT NULL COMMENT 'region',
  `country` varchar(20) NOT NULL COMMENT 'country'
) ;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`idea_number`, `title`, `abstract`, `published_on`, `expires_on`, `content`, `risk`, `product_type`, `instruments`, `currency`, `major_sector`, `minor_sector`, `region`, `country`) VALUES
(1, 'tess', 'abaedeaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaabaedeaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa', '2023-07-26 12:31:30', '2023-07-26 12:31:30', 'afeea', 0, 'fwaffe', 'afew', 'wefa', 'fwae', 'afwe', 'afwe', 'afw'),
(2, 'tess', 'abaede', '2023-07-26 12:31:42', '2023-07-26 12:31:42', 'afeea', 0, 'fwaffe', 'afew', 'wefa', 'fwae', 'afwe', 'afwe', 'afw');

-- --------------------------------------------------------

--
-- Table structure for table `investorprefs`
--

CREATE TABLE `investorprefs` (
  `investor_id` int(11) NOT NULL COMMENT 'Investor id',
  `name` varchar(100) NOT NULL COMMENT 'Name of investor',
  `key_terms` varchar(500) DEFAULT NULL COMMENT 'summary of interests',
  `expires_on` datetime DEFAULT current_timestamp() COMMENT 'expiry date',
  `preferences` varchar(5000) DEFAULT NULL COMMENT 'detailed description of preferences',
  `risk` int(2) UNSIGNED DEFAULT 0 COMMENT 'risk rating ',
  `product_type` varchar(500) DEFAULT NULL COMMENT 'product type',
  `instruments` varchar(20) DEFAULT NULL COMMENT 'instruments',
  `currency` varchar(20) DEFAULT NULL COMMENT 'currency',
  `major_sector` varchar(500) DEFAULT NULL COMMENT 'major sector',
  `minor_sector` varchar(20) DEFAULT NULL COMMENT 'minor sector',
  `region` varchar(20) DEFAULT NULL COMMENT 'region',
  `country` varchar(20) DEFAULT NULL COMMENT 'country'
) ;

--
-- Dumping data for table `investorprefs`
--

INSERT INTO `investorprefs` (`investor_id`, `name`, `key_terms`, `expires_on`, `preferences`, `risk`, `product_type`, `instruments`, `currency`, `major_sector`, `minor_sector`, `region`, `country`) VALUES
(3, 'dboss', 'dsfasdfds', '2023-07-14 00:00:00', 'adffsss', 0, 'afdaads', 'adfe', 'ssssssssssssss', 'aaaaaaassssssssssss', 'feaef', 'aefefaf', 'aefefaef'),
(4, 'Testing Investor', 'NFTS and the like', '2023-06-17 14:55:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ligula rhoncus dapibus dapibus. Aliquam mauris sem, molestie sed massa sed, eleifend semper ante. Vivamus vel nibh elementum, mattis massa nec, rhoncus arcu. Proin non lacus porttitor, dignissim sapien eget, efficitur orci. ', 5, 'Bonds', 'IGS', 'GBP', 'Finance', 'Banking', 'Europe', 'UK'),
(6, 'da tester', 'aaaaaaaaaaaaaine', '2023-07-08 00:00:00', '', 5, 'afdaads', 'adfe', '', '', '', '', ''),
(7, 'zeeeeee', '', '0000-00-00 00:00:00', '', 5, '', 'adfe', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL COMMENT 'Identification number',
  `user_type` enum('RM','C') NOT NULL DEFAULT 'C' COMMENT 'Role type',
  `first_name` varchar(20) NOT NULL COMMENT 'First name',
  `last_name` varchar(20) NOT NULL COMMENT 'Last name',
  `email` varchar(50) NOT NULL COMMENT 'email id',
  `password` varchar(255) NOT NULL COMMENT 'the password',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'created date',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'details updated date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_type`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'RM', 'Tester', 'Alpha', 'tester1@email.com', '$2y$10$.NEeimnC82WGg0822dYq.eyYjQu4ocMXedPVaIGXoFuNWokVmdICi', '2023-02-18 13:15:15', '2023-02-18 13:15:15'),
(3, 'C', 'Tester', 'Gamma', 'tester3@email.com', '$2y$10$hx/.7iotMTN1Q2UNrbAdk.PLZo63/mEtN9cA9jIvGh.d0uesw0RAO', '2023-02-18 13:16:18', '2023-02-18 13:16:18'),
(4, 'C', 'Investor', 'Test', 'aaa@email.com', 'login', '2023-04-23 14:55:42', '2023-04-23 14:55:42'),
(5, 'C', 'Tester4', 'Gamma', 'tester2@email.com', '$2y$10$/jTN9OjPTZQVo3UD4sA3zu8u8a1aGeL3Um2axD63cZ46A4gD5/Fb2', '2023-07-26 12:22:47', '2023-07-26 13:22:47'),
(6, 'C', 'tata', 'bye bye', 'and@email.com', '$2y$10$uR6T28pJfu7pOSzz7TFIQuAb.9rY6Qwe7SzKnKpZnzCfS7sC0ycMS', '2023-07-26 13:28:13', '2023-07-26 14:28:13'),
(7, 'C', 'Tester', 'bye bye', 'testerzee@email.com', '$2y$10$YO7CS5uA5jRuDrCCmj2uw.1OUM2smXbeFy6yb3yTkSo/e4vQF/iCG', '2023-07-26 13:28:48', '2023-07-26 14:28:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`idea_number`);

--
-- Indexes for table `investorprefs`
--
ALTER TABLE `investorprefs`
  ADD PRIMARY KEY (`investor_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `idea_number` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Idea number';

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identification number', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investorprefs`
--
ALTER TABLE `investorprefs`
  ADD CONSTRAINT `investorprefs_investor_id_foreign` FOREIGN KEY (`investor_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
