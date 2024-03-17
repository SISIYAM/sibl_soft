-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2022 at 03:39 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19441427_sibl_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ac_num` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `dps` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `clint` varchar(255) NOT NULL,
  `coustomer_id` varchar(255) NOT NULL,
  `fixed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `mobile`, `address`, `gender`, `ac_num`, `type`, `date`, `dps`, `description`, `author`, `status`, `clint`, `coustomer_id`, `fixed`) VALUES
(32, 'MD Saymum Islam Siyam', '01722146631', 'Bonpara, Natore', '1', '9901310003907', '14', '21/05/2019', '123435', 'jhyfjy', 'siyam', '1', '1', '1507390', '12456'),
(35, 'MST Lipi Khatun', '01722810929', 'Natunbazare', '2', '990', '12', '21/04/2019', '990', '', 'siyam', '1', '0', '', ''),
(36, 'MD Abdus Salam', '01714504433', 'Natunbazare, Bonpara, Natore', '1', '9902100262677', '11', '23/08/2022', '', '', 'siyam', '1', '1', '1500185', ''),
(44, 'Shimanto Ahmed Nion', '01790920112', 'Bonpara', '1', '9901310136466', '14', '16/09/2022', '', '', 'abdussalam', '1', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL DEFAULT '0',
  `last_login` bigint(20) NOT NULL DEFAULT 0,
  `last_logout` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `cpassword`, `status`, `main`, `code`, `last_login`, `last_logout`) VALUES
(2, 'siyam', 'si31siyam@gmail.com', '$2y$10$i5dLS6BBtpTcJ.q7m./JJuORSdGu55gI/zAVudDWWKLBI0EdtLmOy', '$2y$10$KXwyv6s6jnNVSOsfxFQn1ekV8H1MXIais/yWx1Di2CIFCrRLZKfTu', '1', '1', '0', 1663749909, '2022-09-21 14:45:04'),
(4, 'admin', 'admin@gmail.com', '$2y$10$kIh20ODmJuudW7OyotW//uWew54QsEEgHttMQ1V0YF6Q9SO9Nmc.a', '$2y$10$iUjusCUoTrkorWX7Gh7I2OQ0RxDEmqRFF6lfXopPT38u6NDevnkyq', '1', '0', '0', 1663748194, '2022-09-21 14:16:29'),
(48, 'siyam2', 'contact.simoviezone@gmail.com', '$2y$10$.aM0h2D6Hup16q1q/FPR2uUGdBv6fxL8raVbA3bbelqB/jqRg3rXi', '$2y$10$m0.QS.SCyP1l2evRAUKYNu3/1SqmkIK3v93kgVi18s00f1OHAmMDG', '1', '0', '0', 1663748042, '2022-09-21 14:13:57'),
(51, 'evan', 'purificationevan04@gmail.com', '$2y$10$sW0WqybX3DLkT.NOaYHlSuMv0QrwvDFyWj5xsZKBKPq80IaVjKv4O', '$2y$10$Z8GbFHuQCbV5CkN.uY0gFOmuGWbbfzkBt484h7emcxtPvXkg/hkJi', '1', '1', '0', 1663427416, '2022-09-18 09:40:00'),
(52, 'abdussalam', 'as14504433@gmail.com', '$2y$10$Osgeb8xUuvYM9yU14TchquCFgq8FXOhEjtk94VXbtdOb7nXR3az52', '$2y$10$1CzLx8.oRbklPvJu90og0.5pAHDGOOje4MYiZxRfOBQtTv3v/533m', '1', '1', '0', 1663682824, '2022-09-20 20:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `calculator`
--

CREATE TABLE `calculator` (
  `id` int(11) NOT NULL,
  `money` varchar(255) NOT NULL,
  `stamp` varchar(255) NOT NULL,
  `deposit` varchar(255) NOT NULL,
  `withdraw` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `remitance` varchar(255) NOT NULL,
  `bill` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `ac_dew` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `borrow` varchar(255) NOT NULL DEFAULT '0',
  `bank_deposit` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calculator`
--

INSERT INTO `calculator` (`id`, `money`, `stamp`, `deposit`, `withdraw`, `date`, `remitance`, `bill`, `extra`, `ac_dew`, `commission`, `borrow`, `bank_deposit`, `user`) VALUES
(54, '264000', '230', '187000', '100000', '08/01/2022', '110756', '32368', '0', '0', '112', '0', '0', 'siyam'),
(55, '267000', '500', '178410', '124500', '08/02/2022', '75536', '54723', '0', '300', '90', '0', '30000', 'siyam'),
(56, '208600', '320', '143210', '119200', '08/03/2022', '0', '45579', '0', '0', '40', '0', '0', 'siyam'),
(57, '354600', '210', '389850', '470000', '08/08/2022', '160808', '233307', '0', '70510', '0', '0', '0', 'siyam'),
(58, '360200', '600', '442180', '244500', '08/10/2022', '225064', '73317', '0', '0', '100', '0', '0', 'siyam'),
(59, '181500', '280', '500476', '278800', '08/11/2022', '118071', '45071', '0', '0', '370', '0', '60', 'siyam'),
(60, '382000', '320', '301250', '290500', '08/14/2022', '69722', '32672', '0', '1530', '0', '0', '0', 'siyam'),
(61, '287500                                                                                                                                                                                                                                      ', '60', '139680', '180200', '08/16/2022', '123089', '13142', '0', '0', '80', '0', '0', 'siyam'),
(62, '137000', '60', '84620', '202500', '08/17/2022', '9007', '6652', '85', '2020', '80', '0', '0', 'siyam'),
(67, '324100', '200', '443800', '450000', '2022-09-08', '176555', '20203', '0', '0', '0', '36500', '0', 'siyam');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(11, 'AWCD হিসাব'),
(12, 'সুপার সেভিংস হিসাব'),
(13, 'Student হিসাব'),
(14, 'Young Star হিসাব'),
(15, 'নোফিল হিসাব'),
(16, 'হজ্জ স্কিম হিসাব'),
(17, 'যাকাত সঞ্চয়ী হিসাব');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculator`
--
ALTER TABLE `calculator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `calculator`
--
ALTER TABLE `calculator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
