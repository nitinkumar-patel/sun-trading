-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 02:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ranjit`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `address`, `mobile`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'fdsafdsa', 'er.np.patel@gmail.com', 'Chirala', '4844477008', '01', '1493974213', '1493984405'),
(2, 'Nitin', 'er.np.patel@gmail.com', 'vizag', '4844477034', '01', '1493974345', NULL),
(3, 'fdsafdsa', 'er.np.patel@gmail.com', 'California', '4844477008', '01', '1493980780', '1493984417'),
(4, 'Nitin', 'er.np.patel@gmail.com', 'vizag', '4844477034', '01', '1493980780', '1493984012'),
(5, 'fdsafds', 'fsda@gmail.com', 'VIZAG, bharath towers', '4844477008', '01', '1493984901', NULL),
(6, 'fdsafds', 'fsda@gmail.com', 'VIZAG, bharath towers', '4844477008', '01', '1493986865', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
