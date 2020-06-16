-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2020 at 08:56 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `isActive` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category`, `isActive`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(1, 1, 'Electronic', 1, 1589728986, NULL, NULL),
(2, 1, 'Furnitur', 1, 1589729995, NULL, 1589733420),
(3, 1, 'Food', 0, 1589733526, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `postcode` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `city`, `state`, `postcode`, `country`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(1, 'John Doe', 'johndoe@example.com', '+ 1 234 567 890', '155 Silicon Valley Dr', 'San Jose', 'CA', '90050', 'USA', 1589794073, NULL, 1589794858);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status` varchar(128) NOT NULL,
  `notes` text,
  `paidAt` int(11) DEFAULT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `total_amount`, `status`, `notes`, `paidAt`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(7, 9, 50000, 'Paid', NULL, 1591880536, 1591772918, NULL, 1591880536),
(8, 10, 30000, 'Paid', NULL, 1591954009, 1591794656, NULL, 1591954009),
(10, 12, 75000, 'Paid', NULL, 1592070225, 1591964522, NULL, 1592070225),
(11, 13, 75000, 'Paid', NULL, 1592070238, 1591965012, NULL, 1592070238),
(12, 14, 70000, 'Unpaid', NULL, NULL, 1592232598, NULL, NULL),
(13, 15, 155000, 'Paid', NULL, 1592295996, 1592295947, NULL, 1592295996);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `customer_email` varchar(128) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `status` varchar(128) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `total_item`, `total_price`, `status`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(9, 1, 'Meidhy Kismawan', '08123075819', 'test@test.com', 'jl.dukuh v gg.h,tabah no.44|jakarta timur|CA|13550|Indonesia', 1, 50000, 'Success', 1591772918, 0, 1591880536),
(10, 1, 'Betsy Hosler', '2054758010', 'test@test.com', '79 E Emerson St|Los Angeles|California|90012|USA', 1, 30000, 'Success', 1591794656, 0, 1591954009),
(12, 1, 'John Doe', '12054758010', 'johndoe@employee.com', '155 Silicon Valley Dr|San Jose|CA|90050|USA', 1, 75000, 'Success', 1591964522, 0, 1592070225),
(13, 1, 'Mark Sanders', '2627517301', 'mark@email.com', '08 Oxford Rd|WAUKESHA|Wisconsin|53186|USA', 2, 75000, 'Success', 1591965012, 0, 1592070238),
(14, 3, 'Meidhy Krismawan', '6035542213', 'test@test.com', '1365 Park Ave|Los Angles|California|90012|USA', 2, 70000, 'Processing', 1592232598, 0, 0),
(15, 1, 'Betsy Hosler', '2054758010', 'test@test.com', '79 E Emerson St|Los Angeles|California|90012|USA', 3, 155000, 'Success', 1592295947, 0, 1592295996);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_code` varchar(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(128) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_code`, `product_name`, `price`, `quantity`, `unit`, `subtotal`) VALUES
(9, 9, 'P01', 'Product 1', 10000, 5, 'Box', 50000),
(10, 10, 'P01', 'Product 1', 10000, 3, 'Box', 30000),
(11, 11, 'P02', 'Product 2', 15000, 5, 'Pcs', 75000),
(12, 12, 'P02', 'Product 2', 15000, 5, 'Pcs', 75000),
(13, 13, 'P01', 'Product 1', 10000, 3, 'Box', 30000),
(14, 13, 'P02', 'Product 2', 15000, 3, 'Pcs', 45000),
(15, 14, 'P01', 'Product 1', 10000, 4, 'Box', 40000),
(16, 14, 'P02', 'Product 2', 15000, 2, 'Pcs', 30000),
(17, 15, 'P01', 'Product 1', 10000, 5, 'Box', 50000),
(18, 15, 'P02', 'Product 2', 15000, 4, 'Pcs', 60000),
(19, 15, 'P03', 'Product 3', 15000, 3, 'Box', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_code` varchar(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `qty_stock` int(11) NOT NULL,
  `incoming` int(11) NOT NULL,
  `unit` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `supplier_id`, `product_code`, `product_name`, `image`, `price`, `description`, `qty_stock`, `incoming`, `unit`, `category_id`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(8, 1, 1, 'P01', 'Product 1', 'nopic.png', 10000, 'Test', 20, 40, 'Box', 1, 1591756536, NULL, NULL),
(10, 1, 2, 'P02', 'Product 2', 'nopic2.png', 15000, 'Test product 2', 6, 20, 'Pcs', 2, 1591964177, NULL, NULL),
(11, 1, 1, 'P03', 'Product 3', 'no_image_ava.png', 15000, 'test', 27, 30, 'Box', 2, 1592295802, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_code` varchar(128) NOT NULL,
  `product` varchar(128) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(128) NOT NULL,
  `total_price` double NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `supplier_id`, `product_code`, `product`, `price`, `qty`, `unit`, `total_price`, `createdAt`, `deletedAt`) VALUES
(6, 1, 1, 'P01', 'Product 1', 10000, 30, 'Box', 300000, 1591756536, NULL),
(7, 1, 2, 'P01', 'Product 1', 10000, 10, 'Box', 100000, 1591777569, NULL),
(9, 1, 2, 'P02', 'Product 2', 15000, 20, 'Pcs', 300000, 1591964177, NULL),
(10, 1, 1, 'P03', 'Product 3', 15000, 30, 'Box', 450000, 1592295802, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `code` varchar(128) NOT NULL,
  `supplier_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `postcode` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `code`, `supplier_name`, `email`, `phone`, `address`, `city`, `state`, `postcode`, `country`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(1, 'JD001', 'John Doe, Ltd.', 'johndoe@company.com', '+ 1 234 567 890', '1365 Park Avenue', 'Los Angleses', 'CA', '90012', 'USA', 1589747963, NULL, 1589749838),
(2, 'TBC01', 'The Best Company LLC', 'company@company.com', '+ 1 234 567 890', '155 Silicon Valley Dr', 'San Jose', 'CA', '90050', 'USA', 1589751987, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount_in` double NOT NULL,
  `status` varchar(128) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deleteAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `dob` int(11) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `postcode` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL,
  `deletedAt` int(11) DEFAULT NULL,
  `updatedAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `phone`, `address`, `city`, `state`, `postcode`, `country`, `role_id`, `createdAt`, `deletedAt`, `updatedAt`) VALUES
(1, 'Alyssa Alcantar', 'admin@admin.com', '$2y$10$3u8IMADK36RYhJFWrX9yLuJjMA/4//LJY6rTSmTdGIKr6OmeMm/NW', 1589303750, '+1 234 567 890', '1365 Park Ave', 'Los Angeles', 'CA', '90005', 'USA', 1, 1589303750, NULL, NULL),
(3, 'Betsy Hosler VII', 'employee@employe.com', '$2y$10$DN7pI2XySQCc0x/TgZADh.nQzZ0lzVLJWdZG11DhA018A/cqzevoy', 1589303750, '+1 234 567 890', '1365 Park Cr', 'New Jersey', 'NJ', '12001', 'USA', 2, 1589464156, NULL, NULL),
(5, 'John Doe', 'johndoe@employee.com', '$2y$10$5vvySto5ogiTvBF7f8GT.uCylfc3VL4Y1d7xSSdjKttJpMnEjJMKC', 769824000, '12054758010', '155 Silicon Valley Dr', 'San Jose', 'CA', '90050', 'USA', 2, 1589552000, NULL, NULL),
(6, 'pegawai', 'test@test.com', '$2y$10$pXsI55YQirna1EmnJ786bezSM4GwhvzYogmltlZaMfjkbRLfP3MbS', 641692800, '6035542213', '1365 Park Ave', 'Los Angles', 'California', '90012', 'USA', 2, 1592295490, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `createdAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `user_id`, `activity`, `createdAt`) VALUES
(1, 1, 'Add new product', 1591964177),
(2, 1, 'Add new order', 1591964522),
(3, 1, 'Add new order', 1591965012),
(4, 3, 'Add new order', 1592232598),
(5, 1, 'Created new user', 1592295614),
(6, 1, 'Add new product', 1592295802),
(7, 1, 'Add new order', 1592295947);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `host` varchar(128) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `ip_address`, `host`, `user_agent`, `last_login`) VALUES
(1, 1, '127.0.0.1', 'activate.navicat.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1592295371),
(2, 3, '127.0.0.1', 'activate.navicat.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1592297162);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `createdAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
