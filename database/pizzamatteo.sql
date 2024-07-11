-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 01:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzamatteo`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `cart_item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `toast` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE `customer_information` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_gender` varchar(10) NOT NULL,
  `customer_birthday` date NOT NULL,
  `customer_province` varchar(255) NOT NULL,
  `customer_store` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_barangay` varchar(255) NOT NULL,
  `customer_street` varchar(255) NOT NULL,
  `customer_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`user_id`, `customer_name`, `customer_gender`, `customer_birthday`, `customer_province`, `customer_store`, `customer_city`, `customer_barangay`, `customer_street`, `customer_number`) VALUES
(22, 'Flerie Rose Palma', 'female', '2024-06-26', 'Metro Manila', '1', 'Manila', '837', 'Kwenk', '095632623596');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `order_total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_expected_completion` timestamp NULL DEFAULT NULL,
  `reseller_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_information`
--

CREATE TABLE `customer_order_information` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `toast` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purchase_type` varchar(255) NOT NULL,
  `payment_proof` blob DEFAULT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `gcash_name` varchar(255) NOT NULL,
  `gcash_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` varchar(50) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_description` text NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_base_price` decimal(10,2) NOT NULL,
  `menu_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_description`, `menu_price`, `menu_base_price`, `menu_picture`, `created_at`, `updated_at`) VALUES
('PZMT-001', 'Ham and Cheese', 'Tomato sauce, cheese and ham', 85.00, 0.00, 'ham_and_cheese.png', NULL, NULL),
('PZMT-002', 'Hawaiian Delight', 'Tomato sauce, cheese, ham, and pineapple tidbits', 90.00, 0.00, 'hawaiian_delight.png', NULL, NULL),
('PZMT-003', 'Vegetarian Delight', 'Tomato sauce, cheese, pineapple and mushroom', 90.00, 0.00, 'vegetarian_delight.png', NULL, NULL),
('PZMT-004', 'Pepperoni and Ham', 'Tomato sauce, cheese, ham, and pepperoni', 90.00, 0.00, 'pepperoni_and_ham.png', NULL, NULL),
('PZMT-005', 'Bacon and Mushroom', 'Tomato sauce, cheese, bacon, and mushroom', 95.00, 0.00, 'bacon_and_mushroom.png', NULL, NULL),
('PZMT-006', 'Beef and Mushroom', 'Tomato sauce, cheese, beef and mushroom', 95.00, 0.00, 'beef_and_mushroom.png', NULL, NULL),
('PZMT-007', 'Tuna and Mushroom', 'Tomato sauce, cheese, tuna and mushroom', 95.00, 0.00, 'tuna_and_mushroom.png', NULL, NULL),
('PZMT-008', 'Meat Overload', 'Tomato sauce, cheese, ham, pepperoni, beef and bacon', 100.00, 0.00, 'meat_overload.png', NULL, NULL),
('PZMT-009', 'Arabic Shawarma', 'Tomato sauce, cheese and beef shawarma', 100.00, 0.00, 'arabic_shawarma.png', NULL, NULL),
('PZMT-010', 'Sisig Special', 'Tomato sauce, cheese and pork sisig', 100.00, 0.00, 'sisig_special.png', NULL, NULL),
('PZMT-011', 'Creamy Spinach', 'Tomato sauce, cheese and spinach', 220.00, 0.00, 'creamy_spinach.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_information`
--

CREATE TABLE `reseller_information` (
  `reseller_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reseller_name` varchar(255) NOT NULL,
  `reseller_gender` varchar(10) DEFAULT NULL,
  `reseller_birthday` date DEFAULT NULL,
  `reseller_number` varchar(20) DEFAULT NULL,
  `store_province` varchar(255) DEFAULT NULL,
  `store_city` varchar(255) DEFAULT NULL,
  `store_full_address` varchar(255) DEFAULT NULL,
  `store_gcash_name` varchar(255) DEFAULT NULL,
  `store_gcash_number` varchar(20) DEFAULT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `store_map` text DEFAULT NULL,
  `store_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseller_information`
--

INSERT INTO `reseller_information` (`reseller_id`, `user_id`, `reseller_name`, `reseller_gender`, `reseller_birthday`, `reseller_number`, `store_province`, `store_city`, `store_full_address`, `store_gcash_name`, `store_gcash_number`, `store_name`, `store_map`, `store_status`, `created_at`, `updated_at`) VALUES
(1, 23, 'Reseller One', 'Female', '1990-01-01', '[1234567890]', 'Metro Manila', 'Manila', '[Street]', '[Gcash Name]', '[1234567890]', 'San Andres, Manila', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.477748029216!2d120.99287897580561!3d14.571831685911079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ac05e7875%3A0x6857ea19b5f6194b!2sPizza%20Matteo!5e0!3m2!1sen!2sph!4v1718423293862!', 'online', NULL, NULL),
(2, 24, 'Reseller Two', 'Male', '1990-01-01', '[1234567890]', 'Cavite', 'General Trias', '[Street]', '[Gcash Name]', '[1234567890]', 'Bacao 2, General Trias, Cavite', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.477748029216!2d120.99287897580561!3d14.571831685911079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ac05e7875%3A0x6857ea19b5f6194b!2sPizza%20Matteo!5e0!3m2!1sen!2sph!4v1718423293862!', 'offline', NULL, NULL),
(3, 25, 'Reseller Three', 'Female', '1990-01-01', '[1234567890]', 'Cavite', 'General Trias', '[Street]', '[Gcash Name]', '[1234567890]', 'St. Lucy Street, General Trias, Cavite', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.477748029216!2d120.99287897580561!3d14.571831685911079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ac05e7875%3A0x6857ea19b5f6194b!2sPizza%20Matteo!5e0!3m2!1sen!2sph!4v1718423293862!', 'offline', NULL, NULL),
(4, 27, 'Reseller Four', 'Male', '1990-01-01', '[1234567890]', 'Cavite', 'Bacoor', '[Street]', '[Gcash Name]', '[1234567890]', 'Molino 4, Bacoor, Cavite', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.477748029216!2d120.99287897580561!3d14.571831685911079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ac05e7875%3A0x6857ea19b5f6194b!2sPizza%20Matteo!5e0!3m2!1sen!2sph!4v1718423293862!', 'offline', NULL, NULL),
(5, 41, 'Reseller Five', 'Male', '1990-01-01', '[1234567890]', 'Metro Manila', 'Bacoor', '[Street]', '[Gcash Name]', '[1234567890]', 'Pandacan', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.477748029216!2d120.99287897580561!3d14.571831685911079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ac05e7875%3A0x6857ea19b5f6194b!2sPizza%20Matteo!5e0!3m2!1sen!2sph!4v1718423293862!', 'offline', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reseller_inventory`
--

CREATE TABLE `reseller_inventory` (
  `reseller_id` int(10) UNSIGNED NOT NULL,
  `stock_item_id` int(11) DEFAULT NULL,
  `menu_id` varchar(50) NOT NULL,
  `inventory_stock` int(11) NOT NULL,
  `restock_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reseller_inventory`
--

INSERT INTO `reseller_inventory` (`reseller_id`, `stock_item_id`, `menu_id`, `inventory_stock`, `restock_date`, `expiry_date`) VALUES
(1, NULL, 'PZMT-001', 48, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-003', 50, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-004', 49, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-005', 50, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-006', 50, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-009', 50, '2024-06-01', '2024-07-01'),
(1, NULL, 'PZMT-010', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-001', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-003', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-004', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-005', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-006', 50, '2024-06-01', '2024-07-01'),
(2, NULL, 'PZMT-009', 50, '2024-06-01', '2024-07-01'),
(3, NULL, 'PZMT-005', 50, '2024-06-01', '2024-07-01'),
(3, NULL, 'PZMT-006', 50, '2024-06-01', '2024-07-01'),
(3, NULL, 'PZMT-009', 50, '2024-06-01', '2024-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `reseller_order`
--

CREATE TABLE `reseller_order` (
  `order_id` int(11) NOT NULL,
  `reseller_id` int(10) UNSIGNED NOT NULL,
  `order_total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_order_details`
--

CREATE TABLE `reseller_order_details` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_proof` varchar(255) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aTKPqTuWvzctTHugdrkO6BtB4K2mJuUEW68hZQ8e', 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2M5T0hZZmFyZDBiWHdXZTdUalNPQUdJeU1xZmFuelBGREN5ZGl1MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcl9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjI7fQ==', 1719047885),
('1Lsk8tsBYw42Hcix8udIqQ8WURgywzWxOcjuTDlV', 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUp4aVd1ZFRKazBFNUpaQ2FFN0pOdDhGNUZTUWY1ZVhLdnRkY05KRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIyO30=', 1719229295);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_role`, `created_at`, `updated_at`) VALUES
(22, 'flerierosepalma@gmail.com', '$2y$12$H33Y2.qmMZ3.Wn7k4z94KuPymXFC/wQxROFhBoWpAKC4OFvlVzyP.', 'customer', NULL, NULL),
(23, 'reseller_one@gmail.com', '$2y$12$H33Y2.qmMZ3.Wn7k4z94KuPymXFC/wQxROFhBoWpAKC4OFvlVzyP.', 'reseller', NULL, NULL),
(24, 'reseller_two@gmail.com', '$2y$12$H33Y2.qmMZ3.Wn7k4z94KuPymXFC/wQxROFhBoWpAKC4OFvlVzyP.', 'reseller', NULL, NULL),
(25, 'reseller_three@gmail.com', '$2y$12$H33Y2.qmMZ3.Wn7k4z94KuPymXFC/wQxROFhBoWpAKC4OFvlVzyP.', 'reseller', NULL, NULL),
(27, 'reseller_four@gmail.com', '$2y$12$H33Y2.qmMZ3.Wn7k4z94KuPymXFC/wQxROFhBoWpAKC4OFvlVzyP.', 'reseller', NULL, NULL),
(41, 'reseller_five@gmail.com', '$2y$12$Lj5y07ewK6YCVWMbD65FYuuq9UjrqxfseqM5KnMWue3Z.F.DQ2igW', 'customer', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `customer_cart_user_id_foreign` (`user_id`),
  ADD KEY `customer_cart_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_order_user_id_foreign` (`user_id`),
  ADD KEY `fk_reseller` (`reseller_id`);

--
-- Indexes for table `customer_order_information`
--
ALTER TABLE `customer_order_information`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `customer_order_information_order_id_foreign` (`order_id`),
  ADD KEY `customer_order_information_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller_information`
--
ALTER TABLE `reseller_information`
  ADD PRIMARY KEY (`reseller_id`),
  ADD KEY `reseller_information_user_id_foreign` (`user_id`);

--
-- Indexes for table `reseller_inventory`
--
ALTER TABLE `reseller_inventory`
  ADD PRIMARY KEY (`reseller_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `reseller_order`
--
ALTER TABLE `reseller_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `reseller_id` (`reseller_id`);

--
-- Indexes for table `reseller_order_details`
--
ALTER TABLE `reseller_order_details`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `cart_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer_order_information`
--
ALTER TABLE `customer_order_information`
  MODIFY `order_item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reseller_information`
--
ALTER TABLE `reseller_information`
  MODIFY `reseller_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reseller_order`
--
ALTER TABLE `reseller_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseller_order_details`
--
ALTER TABLE `reseller_order_details`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD CONSTRAINT `customer_cart_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `customer_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD CONSTRAINT `customer_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reseller` FOREIGN KEY (`reseller_id`) REFERENCES `reseller_information` (`reseller_id`);

--
-- Constraints for table `customer_order_information`
--
ALTER TABLE `customer_order_information`
  ADD CONSTRAINT `customer_order_information_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `customer_order_information_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `customer_order` (`order_id`);

--
-- Constraints for table `reseller_information`
--
ALTER TABLE `reseller_information`
  ADD CONSTRAINT `reseller_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reseller_inventory`
--
ALTER TABLE `reseller_inventory`
  ADD CONSTRAINT `reseller_inventory_ibfk_1` FOREIGN KEY (`reseller_id`) REFERENCES `reseller_information` (`reseller_id`),
  ADD CONSTRAINT `reseller_inventory_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `reseller_order`
--
ALTER TABLE `reseller_order`
  ADD CONSTRAINT `reseller_order_ibfk_1` FOREIGN KEY (`reseller_id`) REFERENCES `reseller_information` (`reseller_id`);

--
-- Constraints for table `reseller_order_details`
--
ALTER TABLE `reseller_order_details`
  ADD CONSTRAINT `reseller_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `reseller_order` (`order_id`),
  ADD CONSTRAINT `reseller_order_details_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
