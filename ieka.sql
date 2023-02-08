-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 11:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `addres` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `residence_state` varchar(25) NOT NULL,
  `residence_country` varchar(25) NOT NULL,
  `country_of_origin` varchar(25) NOT NULL,
  `gender` text NOT NULL,
  `state_of_origin` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `addres`, `phone`, `email`, `residence_state`, `residence_country`, `country_of_origin`, `gender`, `state_of_origin`, `password`, `created_at`, `modified_at`) VALUES
(3, 'john', 'udo', 'imo', '6646', 'john@gmail.com', 'gombe', 'nigeria', 'nigeria', 'male', 'enugu', 'poil', '2022-12-15 01:12:53', '2022-12-15 01:12:53'),
(4, 'john', 'ike', 'imo', '07056473432', 'ike8@gmail.com', 'gombe', 'nigeria', 'nigeria', 'male', 'anambra', 'sedt', '2021-10-22 08:16:25', '2021-10-22 08:16:25'),
(5, 'kes', 'yu', 'china', '09123457988', 'ji@gmail.com', 'alaska', 'china', 'nigeria', 'male', 'ebonyi', 'poip', '2021-10-22 08:18:24', '2021-10-22 08:18:24'),
(6, 'mel', 'ui', 'canada', '8907654323', 'ui@gmail.com', 'ontario', 'canada', 'nigeria', 'male', 'enugu', 'iugh', '2021-10-22 08:21:55', '2021-10-22 08:21:55'),
(7, 'tony', 'udoku', 'abakaliki', '8096543124', 'tonero@gmail.com', 'rivers', 'nigeria', 'nigeria', 'male', 'Ebonyi', 'julk', '2021-11-26 10:42:33', '2021-11-26 10:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `residence_state` varchar(20) NOT NULL,
  `residence_country` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `unique_id`, `first_name`, `last_name`, `address`, `email`, `password`, `phone`, `gender`, `residence_state`, `residence_country`, `picture`, `status`, `created_at`, `modified_at`) VALUES
(2, 30, 'Tony', 'Nonso', 'igboukwu', 'joynwofia9@gmail.com', 'high', '760', 'female', 'ebonyi', 'nigeria', 'nigeria', 'Active', '2022-12-08 14:48:40', '2022-12-08 14:48:40'),
(3, 0, 'anthony', 'nonso', 'funai', 'ninijay@gmail.com', 'gum', '0808765905', 'male', 'ebonyi', 'nigeria', 'nigeria', '', '2021-11-26 08:24:22', '2021-11-26 08:24:22'),
(4, 0, 'emelda', 'mel', 'ebsu', 'nenye@gmail.com', 'hope', '0876542345', 'female', 'enugu', 'nigeria', 'nigeria', '', '2021-11-26 08:27:30', '2021-11-26 08:27:30'),
(5, 0, 'emelda', 'uche', 'ebsu', 'nenye@gmail.com', 'hugh', '786540985', 'female', 'ebonyi', 'nigeria', 'nigeria', '', '2021-11-26 08:29:41', '2021-11-26 08:29:41'),
(6, 0, 'tony', 'udoku', 'amike aba', 'tonero@gmail.com', 'git', '789043561', 'male', 'ebonyi', 'nigeria', 'nigeria', '', '2021-11-26 08:36:41', '2021-11-26 08:36:41'),
(7, 0, 'excel', 'nwachukwu', 'dline', 'xel@gmail.com', 'excel', '0975432719', 'male', 'ebonyi', 'nigeria', 'nigeria', '', '2021-11-26 08:39:20', '2021-11-26 08:39:20'),
(8, 0, 'darlinton', 'okeke', '49 igboukwu', 'darl@gmail.com', 'frud', '3789', 'male', 'rivers', 'nigeria', '1642755259IMG_20171119_142429.jpg', 'Active', '2022-01-21 09:54:19', '2022-01-21 09:54:19'),
(9, 44, 'Heiley', 'odimma', 'no 5 tanson street, ngwo', 'tanson@gmail.com', 'this', '67853', 'female', 'awka', 'nigeria', '1645652983Screenshot (2).png', 'Active', '2022-02-23 10:49:43', '2022-02-23 10:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account_issues`
--

CREATE TABLE `customer_account_issues` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `account_issue` varchar(1000) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_couriers`
--

CREATE TABLE `customer_couriers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `farmer_id` int(10) NOT NULL,
  `delivery_address` varchar(1000) NOT NULL,
  `delivery_country` varchar(50) NOT NULL,
  `delivery_state` varchar(20) NOT NULL,
  `recipient_name` varchar(50) NOT NULL,
  `recipient_phone` varchar(20) NOT NULL,
  `courier` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `reference` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliverers`
--

CREATE TABLE `deliverers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `residential_state` varchar(20) NOT NULL,
  `residential_country` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `delivery_means` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `delivery_address` varchar(30) NOT NULL,
  `delivery_state` varchar(30) NOT NULL,
  `deliverer` varchar(20) NOT NULL,
  `agro` varchar(500) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `deliverer_phone` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `desk_offices`
--

CREATE TABLE `desk_offices` (
  `id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `administrator` varchar(20) NOT NULL,
  `location_state` varchar(10) NOT NULL,
  `location_country` varchar(20) NOT NULL,
  `officers` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unique_id` int(100) NOT NULL,
  `portfolio` varchar(12) NOT NULL,
  `enquiry` varchar(1000) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `state_of_origin` varchar(20) NOT NULL,
  `residence_state` varchar(20) NOT NULL,
  `residence_country` varchar(20) NOT NULL,
  `country_of_origin` varchar(50) NOT NULL,
  `farm_id` varchar(10) NOT NULL,
  `farm_state` varchar(20) NOT NULL,
  `farm_address` varchar(50) NOT NULL,
  `farm_country` varchar(20) NOT NULL,
  `agro_products` varchar(500) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `gender`, `state_of_origin`, `residence_state`, `residence_country`, `country_of_origin`, `farm_id`, `farm_state`, `farm_address`, `farm_country`, `agro_products`, `picture`, `status`, `created_at`, `modified_at`) VALUES
(2, 'clinton', 'ogayi', 'choba, ph', '5537', 'clintonemeka15@gmail.com', 'meka', 'male', 'ebonyi', 'rivers', 'nigeria', '', '132', 'ebonyi', 'mboagbaja ', 'nigeria', 'chicken, dogs', '', '', '2022-12-15 00:55:05', '2022-12-15 00:55:05'),
(3, 'nenye', 'ogayi', 'anyigor okorie', '09156475429', 'emeldachinenye@gmail.com', 'nenye', 'female', 'ebonyi', 'ebonyi', 'Nigeria', 'nigeria', '', 'ebonyi', 'ndiaboishiagu', 'nigeria', 'snails', '', '', '2021-10-20 10:35:04', '2021-10-20 10:35:04'),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-10-20 10:36:45', '2021-10-20 10:36:45'),
(5, 'young', 'sick', 'abuja', '907659342', 'young@gmail.com', 'ikul', 'male', 'alaska', 'abuja', 'nigeria', 'united States of america', '', 'abuja', 'gwagwalada', 'nigeria', 'geese', '', '', '2021-10-22 08:44:56', '2021-10-22 08:44:56'),
(6, 'tony', 'udoku', 'abakaliki', '0654389076', 'tonero@gmail.com', 'hulk', 'male', 'Ebonyi', 'rivers', 'nigeria', 'nigeria', '', 'ebonyi', 'democracy estate', 'nigeria', 'cows, rabbit', '', '', '2021-11-26 11:20:48', '2021-11-26 11:20:48'),
(7, 'angel', 'okorie', '7 igboukwu street', '903567', 'cangel@gmail.com', 'angel', 'female', 'ebonyi', 'ebonyi', 'nigeria', 'nigeria', 'ID12813212', 'texas', 'kes estate, texas', 'united states of ame', 'chicken feed', '', '', '2022-01-16 09:21:25', '2022-01-16 09:21:25'),
(8, 'angel', 'okorie', '7 igboukwu street', '331509', 'cangel@gmail.com', 'angel', 'female', 'ebonyi', 'ebonyi', 'nigeria', 'nigeria', 'ID20472958', 'texas', 'kes estate, texas', 'united states of ame', 'chicken feed', '', '', '2022-01-16 09:24:45', '2022-01-16 09:24:45'),
(9, 'angel', 'okoye', '7 igboukwu street', '220917', 'cangel@gmail.com', 'angel', 'female', 'ebonyi', 'ebonyi', 'nigeria', 'nigeria', 'ID399', 'texas', 'kes estate, texas', 'united states of ame', 'chicken feed', '', '', '2022-01-16 09:28:25', '2022-01-16 09:28:25'),
(10, 'hanson', 'guru', '5 kilimanjaro street, ph', '4567', 'emeka@gmail.com', 'suhg', 'female', 'enugu', 'enugu', 'australia', 'canada', '599', 'sydney', '5 macaulay avenue', 'australia', 'horses, parrots, ', '1642718079IMG_20171104_004730.jpg', 'Active', '2022-02-24 01:02:06', '2022-02-24 01:02:06'),
(11, 'Ada', 'Nne', 'Presco', '7865', 'ada@gmail.com', 'adan', 'female', 'ebonyi', 'ebonyi', 'nigeria', 'nigeria', '172', 'ebonyi', 'ishieke', 'nigeria', 'yams', '1643366084IMG_20171104_004730.jpg', 'Active', '2022-02-24 01:02:57', '2022-02-24 01:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_account_issues`
--

CREATE TABLE `farmer_account_issues` (
  `id` int(11) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `account_issue` varchar(1000) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `stake(%)` int(10) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `residential_country` varchar(20) NOT NULL,
  `residential_state` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(5) NOT NULL,
  `receiver` int(5) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `created_at`, `modified_at`) VALUES
(68, 2, 172, 'How are you?', '2022-02-22 10:21:49', '2022-02-22 10:21:49'),
(69, 2, 172, 'I know i can meet you here', '2022-02-22 11:20:54', '2022-02-22 11:20:54'),
(70, 2, 172, 'This is a great opportunity to make real money', '2022-02-22 11:38:59', '2022-02-22 11:38:59'),
(71, 2, 172, 'I am sure you will like it', '2022-02-23 07:26:58', '2022-02-23 07:26:58'),
(72, 172, 2, 'I will be open to the idea if it is legit like you said', '2022-02-23 07:45:06', '2022-02-23 07:45:06'),
(73, 2, 172, 'Before i state the idea, are you someone that loves entrepreneurship?', '2022-02-23 07:48:15', '2022-02-23 07:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `message_store`
--

CREATE TABLE `message_store` (
  `id` int(11) NOT NULL,
  `sender` int(10) NOT NULL,
  `receiver` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unique_id` int(50) NOT NULL,
  `portfolio` varchar(15) NOT NULL,
  `report` varchar(1000) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `location` varchar(20) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `transaction_reference` varchar(20) NOT NULL,
  `farm_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `transaction_reference`, `farm_id`, `customer_id`, `status`, `amount`, `modified_at`) VALUES
(1, 4019805, '6398672332ed1', 132, 2, 'successful', '100.00', '2022-12-13 04:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `residential_state` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residential_country` varchar(20) NOT NULL,
  `created-at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified-at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account_issues`
--
ALTER TABLE `customer_account_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_couriers`
--
ALTER TABLE `customer_couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverers`
--
ALTER TABLE `deliverers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desk_offices`
--
ALTER TABLE `desk_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_account_issues`
--
ALTER TABLE `farmer_account_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_store`
--
ALTER TABLE `message_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_account_issues`
--
ALTER TABLE `customer_account_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_couriers`
--
ALTER TABLE `customer_couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverers`
--
ALTER TABLE `deliverers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desk_offices`
--
ALTER TABLE `desk_offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `farmer_account_issues`
--
ALTER TABLE `farmer_account_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `message_store`
--
ALTER TABLE `message_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
