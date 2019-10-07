-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 11:25 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assets_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_info`
--

CREATE TABLE `address_info` (
  `id` int(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `street_info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_info`
--

INSERT INTO `address_info` (`id`, `division`, `district`, `street_info`) VALUES
(2, 'Dhaka', 'Narayongonj', '1200'),
(3, 'Chittagong', 'Chittagong', '560'),
(4, 'Chittagong', 'Feni', '3900'),
(5, 'Dhaka', 'Dhaka', '1010 /A3'),
(6, 'Rajshahi', 'Rajshahi', 'B2-03'),
(7, 'Shylet', 'Shylet', '1/14');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `f_name`, `m_name`, `address`, `email`, `password`, `branch_name`, `image`, `status`) VALUES
(21, 'ShakilAhmmed', 'Mr X', 'Mrs X', 'Kazipara', 'shakilfci@gmail.com', 'MTIzNDU2', '7', 'upload/1555791708.jpg', 'Active'),
(22, 'mukhter', 'md Shahjahan', 'hasina begum', 'mirshori,chittagong.', 'mohammadmukhter@gmail.com', 'MTIzNDU2Nzg5', '7', 'upload/1555794010.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assets_category`
--

CREATE TABLE `assets_category` (
  `id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets_category`
--

INSERT INTO `assets_category` (`id`, `category_name`, `category_description`, `status`) VALUES
(6, 'Furniture', 'Different kinds of furniture', 'Active'),
(7, 'Electrical Devices', 'Different kinds of Electric devices', 'Active'),
(8, 'Hardware Devices', 'Different kinds of Hardware devices', 'Active'),
(9, 'Software', 'software', 'Active'),
(11, 'Other', 'other assets', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assets_details`
--

CREATE TABLE `assets_details` (
  `id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `sub_category_name` varchar(20) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `asset_model` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `single_price` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets_details`
--

INSERT INTO `assets_details` (`id`, `category_name`, `sub_category_name`, `asset_name`, `asset_model`, `quantity`, `single_price`, `date`, `remarks`, `status`) VALUES
(45, '6', '11', 'Chair', 'Chair-520', '10', '490', '2019-01-01', 'New', 'Active'),
(46, '6', '11', 'Table', 'Table-5123', '12', '1260', '2019-01-02', 'old', 'Active'),
(51, '6', '12', 'wall hanger', 'WH-001', '5', '300', '2019-04-05', 'New', 'Active'),
(52, '7', '9', 'Asus Pc', 'asus-2019', '5', '50000', '2019-04-20', 'New', 'Active'),
(53, '7', '16', 'samsung', 'Samsung-2018', '10', '60000', '2019-04-20', 'New', 'Active'),
(54, '9', '14', 'account Pro', ' software v 0.0.1', '6', '10000', '2019-04-20', 'New', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assets_sub_category`
--

CREATE TABLE `assets_sub_category` (
  `id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `sub_category_name` varchar(20) NOT NULL,
  `sub_category_description` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets_sub_category`
--

INSERT INTO `assets_sub_category` (`id`, `category_name`, `sub_category_name`, `sub_category_description`, `status`) VALUES
(9, '7', 'Desktop', 'hhh', 'Active'),
(10, '6', 'Wooden Furniture', 'one kind of furniture', 'Active'),
(11, '6', 'Plastic Furniture', 'one kind of furniture', 'Active'),
(12, '6', 'Metal Furnitre', 'metal  furniture', 'Active'),
(13, '7', 'Mobile', 'mobile', 'Active'),
(14, '9', 'financial', 'hhh', 'Active'),
(15, '9', 'Academic', 'academic type software', 'Active'),
(16, '7', 'Laptop', 'Laptop Computer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `branch_info`
--

CREATE TABLE `branch_info` (
  `id` int(20) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `branch_address` varchar(200) NOT NULL,
  `branch_opening_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_info`
--

INSERT INTO `branch_info` (`id`, `branch_name`, `branch_address`, `branch_opening_date`, `status`) VALUES
(7, 'chittagong office', '3', '2019-04-06', 'Active'),
(9, 'Dhaka Office', '2', '2019-04-01', 'Active'),
(10, 'Feni Office', '4', '2019-04-17', 'Active'),
(11, 'Mirpur Branch', '5', '2019-04-01', 'Active'),
(12, 'Rajshahi Branch', '6', '2019-04-19', 'Active'),
(13, 'Shylet Branch', '7', '2019-04-12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE `distribute` (
  `distribute_id` int(20) NOT NULL,
  `branch_name` varchar(20) NOT NULL,
  `stock_id` varchar(20) NOT NULL,
  `asset_id` varchar(20) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `asset_model` varchar(20) NOT NULL,
  `asset_code` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribute`
--

INSERT INTO `distribute` (`distribute_id`, `branch_name`, `stock_id`, `asset_id`, `asset_name`, `asset_model`, `asset_code`, `date`) VALUES
(9, '9', '777', '45', 'Chair', 'Chair-520', 'Chair--1555225956', '2019-04-01'),
(10, '10', '778', '45', 'Chair', 'Chair-520', 'Chair--1555225957', '2019-04-02'),
(11, '7', '779', '45', 'Chair', 'Chair-520', 'Chair--1555225958', '2019-04-03'),
(12, '9', '780', '45', 'Chair', 'Chair-520', 'Chair--1555225959', '2019-04-03'),
(13, '7', '781', '45', 'Chair', 'Chair-520', 'Chair--1555225961', '2019-04-10'),
(14, '9', '782', '45', 'Chair', 'Chair-520', 'Chair--1555225962', '2019-04-05'),
(15, '9', '783', '45', 'Chair', 'Chair-520', 'Chair--1555225963', '2019-04-05'),
(16, '10', '784', '45', 'Chair', 'Chair-520', 'Chair--1555225964', '2019-04-13'),
(17, '10', '785', '45', 'Chair', 'Chair-520', 'Chair--1555225965', '2019-04-13'),
(18, '10', '786', '45', 'Chair', 'Chair-520', 'Chair--1555225966', '2019-04-13'),
(19, '10', '787', '46', 'Table', 'Table-5123', 'Table--1555228326', '2019-04-15'),
(20, '10', '788', '46', 'Table', 'Table-5123', 'Table--1555228327', '2019-04-16'),
(21, '7', '789', '46', 'Table', 'Table-5123', 'Table--1555228328', '2019-04-05'),
(22, '7', '829', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-20'),
(23, '13', '790', '46', 'Table', 'Table-5123', 'Table--1555228329', '2019-04-20'),
(24, '9', '830', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-20'),
(25, '11', '791', '46', 'Table', 'Table-5123', 'Table--1555228330', '2019-04-20'),
(26, '11', '792', '46', 'Table', 'Table-5123', 'Table--1555228331', '2019-04-20'),
(27, '11', '793', '46', 'Table', 'Table-5123', 'Table--1555228332', '2019-04-20'),
(28, '11', '831', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-20'),
(29, '11', '832', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-20'),
(30, '7', '834', '52', 'Asus Pc', 'asus-2019', 'Asus Pc--1555738115', '2019-04-21'),
(31, '9', '835', '52', 'Asus Pc', 'asus-2019', 'Asus Pc--1555738116', '2019-04-21'),
(32, '10', '836', '52', 'Asus Pc', 'asus-2019', 'Asus Pc--1555738117', '2019-04-21'),
(33, '11', '837', '52', 'Asus Pc', 'asus-2019', 'Asus Pc--1555738118', '2019-04-21'),
(34, '12', '838', '52', 'Asus Pc', 'asus-2019', 'Asus Pc--1555738120', '2019-04-21'),
(35, '7', '839', '53', 'samsung', 'Samsung-2018', 'samsung--1555738347', '2019-04-21'),
(36, '9', '840', '53', 'samsung', 'Samsung-2018', 'samsung--1555738348', '2019-04-21'),
(37, '10', '841', '53', 'samsung', 'Samsung-2018', 'samsung--1555738349', '2019-04-21'),
(38, '11', '842', '53', 'samsung', 'Samsung-2018', 'samsung--1555738350', '2019-04-21'),
(39, '12', '843', '53', 'samsung', 'Samsung-2018', 'samsung--1555738351', '2019-04-21'),
(40, '13', '844', '53', 'samsung', 'Samsung-2018', 'samsung--1555738352', '2019-04-21'),
(41, '9', '845', '53', 'samsung', 'Samsung-2018', 'samsung--1555738353', '2019-04-21'),
(42, '9', '846', '53', 'samsung', 'Samsung-2018', 'samsung--1555738354', '2019-04-21'),
(43, '7', '847', '53', 'samsung', 'Samsung-2018', 'samsung--1555738355', '2019-04-21'),
(44, '7', '848', '53', 'samsung', 'Samsung-2018', 'samsung--1555738356', '2019-04-21'),
(45, '7', '849', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21'),
(46, '9', '850', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21'),
(47, '10', '851', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21'),
(48, '11', '852', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21'),
(49, '12', '853', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21'),
(50, '13', '854', '54', 'account Pro', ' software v 0.0.1', 'account Pro--1555738', '2019-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `asset_id` varchar(20) NOT NULL,
  `code` varchar(50) NOT NULL,
  `stock_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `asset_id`, `code`, `stock_status`) VALUES
(777, '45', 'Chair--1555225956', 'Inactive'),
(778, '45', 'Chair--1555225957', 'Inactive'),
(779, '45', 'Chair--1555225958', 'Inactive'),
(780, '45', 'Chair--1555225959', 'Inactive'),
(781, '45', 'Chair--1555225961', 'Inactive'),
(782, '45', 'Chair--1555225962', 'Inactive'),
(783, '45', 'Chair--1555225963', 'Inactive'),
(784, '45', 'Chair--1555225964', 'Inactive'),
(785, '45', 'Chair--1555225965', 'Inactive'),
(786, '45', 'Chair--1555225966', 'Inactive'),
(787, '46', 'Table--1555228326', 'Inactive'),
(788, '46', 'Table--1555228327', 'Inactive'),
(789, '46', 'Table--1555228328', 'Inactive'),
(790, '46', 'Table--1555228329', 'Inactive'),
(791, '46', 'Table--1555228330', 'Inactive'),
(792, '46', 'Table--1555228331', 'Inactive'),
(793, '46', 'Table--1555228332', 'Inactive'),
(794, '46', 'Table--1555228333', 'Active'),
(795, '46', 'Table--1555228334', 'Active'),
(796, '46', 'Table--1555228336', 'Active'),
(797, '46', 'Table--1555228337', 'Active'),
(798, '46', 'Table--1555228338', 'Active'),
(829, '51', 'wall hanger--1555704033', 'Inactive'),
(830, '51', 'wall hanger--1555704034', 'Inactive'),
(831, '51', 'wall hanger--1555704035', 'Inactive'),
(832, '51', 'wall hanger--1555704036', 'Inactive'),
(833, '51', 'wall hanger--1555704037', 'Active'),
(834, '52', 'Asus Pc--1555738115', 'Inactive'),
(835, '52', 'Asus Pc--1555738116', 'Inactive'),
(836, '52', 'Asus Pc--1555738117', 'Inactive'),
(837, '52', 'Asus Pc--1555738118', 'Inactive'),
(838, '52', 'Asus Pc--1555738120', 'Inactive'),
(839, '53', 'samsung--1555738347', 'Inactive'),
(840, '53', 'samsung--1555738348', 'Inactive'),
(841, '53', 'samsung--1555738349', 'Inactive'),
(842, '53', 'samsung--1555738350', 'Inactive'),
(843, '53', 'samsung--1555738351', 'Inactive'),
(844, '53', 'samsung--1555738352', 'Inactive'),
(845, '53', 'samsung--1555738353', 'Inactive'),
(846, '53', 'samsung--1555738354', 'Inactive'),
(847, '53', 'samsung--1555738355', 'Inactive'),
(848, '53', 'samsung--1555738356', 'Inactive'),
(849, '54', 'account Pro--1555738660', 'Inactive'),
(850, '54', 'account Pro--1555738662', 'Inactive'),
(851, '54', 'account Pro--1555738663', 'Inactive'),
(852, '54', 'account Pro--1555738664', 'Inactive'),
(853, '54', 'account Pro--1555738665', 'Inactive'),
(854, '54', 'account Pro--1555738666', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(20) NOT NULL,
  `transfer_from` varchar(20) NOT NULL,
  `to_receive` varchar(20) NOT NULL,
  `stock_id` varchar(20) NOT NULL,
  `asset_id` varchar(20) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `asset_model` varchar(20) NOT NULL,
  `asset_code` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `transfer_from`, `to_receive`, `stock_id`, `asset_id`, `asset_name`, `asset_model`, `asset_code`, `date`) VALUES
(2, '10', '9', '777', '45', 'Chair', 'Chair-520', 'Chair--1555225956', '2019-04-15'),
(3, '7', '10', '778', '45', 'Chair', 'Chair-520', 'Chair--1555225957', '2019-04-20'),
(4, '9', '10', '777', '45', 'Chair', 'Chair-520', 'Chair--1555225956', '2019-04-02'),
(5, '7', '10', '787', '46', 'Table', 'Table-5123', 'Table--1555228326', '2019-04-26'),
(6, '7', '10', '788', '46', 'Table', 'Table-5123', 'Table--1555228327', '2019-04-19'),
(7, '10', '9', '777', '45', 'Chair', 'Chair-520', 'Chair--1555225956', '2019-04-02'),
(8, '9', '7', '789', '46', 'Table', 'Table-5123', 'Table--1555228328', '2019-04-21'),
(9, '10', '7', '829', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-21'),
(10, '13', '9', '830', '51', 'wall hanger', 'WH-001', 'wall hanger--1555704', '2019-04-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_info`
--
ALTER TABLE `address_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_category`
--
ALTER TABLE `assets_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_details`
--
ALTER TABLE `assets_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets_sub_category`
--
ALTER TABLE `assets_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_info`
--
ALTER TABLE `branch_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribute`
--
ALTER TABLE `distribute`
  ADD PRIMARY KEY (`distribute_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_info`
--
ALTER TABLE `address_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `assets_category`
--
ALTER TABLE `assets_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assets_details`
--
ALTER TABLE `assets_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `assets_sub_category`
--
ALTER TABLE `assets_sub_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `branch_info`
--
ALTER TABLE `branch_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `distribute`
--
ALTER TABLE `distribute`
  MODIFY `distribute_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=855;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
