-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2020 at 10:29 AM
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
(1, 1, 6000000, 'Paid', NULL, 1599300987, 1599300951, NULL, 1599300987);

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
(1, 1, 'Lorem Ipsum', '123456789', 'loremipsum@example.com', '136 Park avenue|Los Angles|CA|90015|USA', 1, 6000000, 'Success', 1599300951, 0, 1599300987);

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
(1, 1, 'IP6S', 'iPhone 6S', 6000000, 1, 'Pcs', 6000000);

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
(1, 1, 1, 'IP6S', 'iPhone 6S', 'iphone.png', 6000000, 'iPhone 6S New', 9, 10, 'Pcs', 1, 1599299673, NULL, 1599300820);

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
(1, 1, 1, 'IP6S', 'iPhone 6S', 6000000, 10, 'Pcs', 60000000, 1599299673, NULL);

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
(5, 'John Doe', 'johndoe@employee.com', '$2y$10$5vvySto5ogiTvBF7f8GT.uCylfc3VL4Y1d7xSSdjKttJpMnEjJMKC', 769824000, '12054758010', '155 Silicon Valley Dr', 'San Jose', 'CA', '90050', 'USA', 2, 1589552000, 1599295991, NULL);

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
(1, 1, 'Add new product', 1599299673),
(2, 1, 'Update product data', 1599300820),
(3, 1, 'Add new order', 1599300951),
(4, 1, 'Update invoice status', 1599300987);

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
(1, 1, '127.0.0.1', 'activate.navicat.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36 Edg/85.0.564.44', 1599295345),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
