-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 05:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mehedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_desc` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_cover` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_one` varchar(15) NOT NULL,
  `phone_two` varchar(15) NOT NULL,
  `active_status` enum('1','0') NOT NULL DEFAULT '1',
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `location` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `booking_status` enum('1','0','2','3') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `ref_code` int(11) NOT NULL,
  `dis_per` int(11) NOT NULL,
  `dis_price` varchar(255) NOT NULL,
  `booking_price` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `pay_trx` varchar(255) NOT NULL,
  `pay_phone` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `re_code` varchar(15) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_id` varchar(255) NOT NULL,
  `referral_code` varchar(15) NOT NULL,
  `dis_per` int(11) NOT NULL,
  `dis_price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `shipping_date` date NOT NULL,
  `pay_trx` varchar(255) NOT NULL,
  `pay_phone` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_list`
--

CREATE TABLE `ordered_list` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `booking_order` enum('1','0') NOT NULL DEFAULT '1',
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `status` enum('2','1','0') NOT NULL DEFAULT '0',
  `booking_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_ammount` int(11) NOT NULL,
  `pay_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `type` enum('1','0') NOT NULL DEFAULT '1',
  `pay_title` varchar(55) NOT NULL,
  `pay_phone` varchar(15) NOT NULL,
  `account_num` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_details` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `price` varchar(255) NOT NULL,
  `pro_type` varchar(50) NOT NULL,
  `dis_per` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `available` enum('0','1','2') NOT NULL DEFAULT '1',
  `book_order` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `img_location` varchar(512) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `pro_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rating_count` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_code`
--

CREATE TABLE `referral_code` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `referral_code` varchar(15) NOT NULL,
  `percentage` int(11) NOT NULL,
  `min_price` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `service_details` varchar(255) NOT NULL,
  `service_title` varchar(55) NOT NULL,
  `service_type_id` varchar(255) NOT NULL,
  `active_status` enum('0','1') NOT NULL DEFAULT '1',
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `type` varchar(55) NOT NULL,
  `details` varchar(255) NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `active_status` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `profile_id` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_list`
--
ALTER TABLE `ordered_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_code`
--
ALTER TABLE `referral_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordered_list`
--
ALTER TABLE `ordered_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_code`
--
ALTER TABLE `referral_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
