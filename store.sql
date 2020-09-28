-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Sep 28, 2020 at 10:44 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `user_id`, `image`) VALUES
(13, 'Wristwatch', 1000, 8, 'watch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `user_type`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar,east near vijya bank, bhilai C.G.', 2),
(8, 'Vendor', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '09876525654', 'Kaduna', '11 Herenow Street', 1),
(9, 'Admin', 'admin@kasuvendors.com', '14e1b600b1fd579f47433b88e8d85291', '123456', 'Kaduna', 'Kaduna', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL,
  `vendor_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`, `vendor_id`) VALUES
(24, 8, 13, 'Confirmed', NULL),
(25, 8, 13, 'Confirmed', NULL),
(27, 5, 13, 'Added to cart', NULL),
(28, 5, 13, 'Added to cart', NULL),
(30, 5, 13, 'Added to cart', NULL),
(31, 5, 13, 'Added to cart', NULL),
(32, 5, 13, 'Added to cart', NULL),
(33, 5, 13, 'Added to cart', NULL),
(34, 5, 13, 'Added to cart', NULL),
(35, 5, 13, 'Added to cart', NULL),
(39, 5, 13, 'Added to cart', NULL),
(43, 5, 12, 'Added to cart', 5),
(44, 5, 13, 'Added to cart', 8),
(45, 5, 13, 'Added to cart', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
