-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 11:15 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `status` enum('pending','in progress','completed','canceled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_gateway` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `original_amount` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `discount_percent` double NOT NULL,
  `tax_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_percent` double(8,2) DEFAULT NULL,
  `tax_amount` double(8,2) DEFAULT NULL,
  `amount_to_pay` double(8,2) NOT NULL,
  `payment_status` enum('pending','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `source` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pos',
  `additional_notes` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `business_id`, `employee_id`, `user_id`, `date_time`, `status`, `payment_gateway`, `original_amount`, `discount`, `discount_percent`, `tax_name`, `tax_percent`, `tax_amount`, `amount_to_pay`, `payment_status`, `source`, `additional_notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 2, 1, 2, '2019-11-15 11:09:33', 'in progress', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 1, 2, 3, '2019-11-15 11:09:33', 'completed', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 2, 2, 4, '2019-11-15 11:09:33', 'canceled', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 3, 3, 5, '2019-11-15 11:09:33', 'completed', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 4, 2, 6, '2019-11-15 11:09:33', 'canceled', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 5, 3, 7, '2019-11-15 11:09:33', 'completed', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 3, 3, 8, '2019-11-15 11:09:33', 'completed', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(10, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(11, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(12, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(13, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(14, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(15, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(16, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(17, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(18, 1, 1, 1, '2019-11-15 11:09:33', 'pending', '', 0.00, 0.00, 0, NULL, NULL, NULL, 0.00, '', '', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `booking_items`
--

CREATE TABLE `booking_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `business_service_id` int(10) UNSIGNED NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `unit_price` double NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_items`
--

INSERT INTO `booking_items` (`id`, `booking_id`, `business_service_id`, `quantity`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 25, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 2, 2, 35, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 3, 3, 25, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 4, 4, 35, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 5, 5, 45, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 6, 6, 55, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 7, 7, 65, 5, 25, '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `booking_times`
--

CREATE TABLE `booking_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `day` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `multiple_booking` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `status` enum('enabled','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enabled',
  `slot_duration` int(11) NOT NULL DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_times`
--

INSERT INTO `booking_times` (`id`, `business_id`, `booking_id`, `day`, `start_time`, `end_time`, `multiple_booking`, `status`, `slot_duration`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'monday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(2, NULL, NULL, 'tuesday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(3, NULL, NULL, 'wednesday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(4, NULL, NULL, 'thursday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(5, NULL, NULL, 'friday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(6, NULL, NULL, 'saturday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(7, NULL, NULL, 'sunday', '04:30:00', '14:30:00', 'yes', 'enabled', 30, NULL, '2020-02-07 02:09:43'),
(8, 1, 1, 'monday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 2, 2, 'tuesday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(10, 1, 3, 'wednesday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(11, 2, 4, 'thursday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(12, 3, 5, 'friday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(13, 4, 6, 'thursday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(14, 5, 7, 'friday', '04:30:00', '14:30:00', '', '', 0, '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Food Business', 'food-business', '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(2, 'Shirt Business', 'shirt-business', '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(3, 'Technology Business', 'technology-business', '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(4, 'House Business', 'house-business', '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(5, 'Cars Business', 'cars-business', '2019-11-14 03:09:33', '2019-11-14 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `business_services`
--

CREATE TABLE `business_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `time` double(8,2) NOT NULL,
  `time_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `discount_type` enum('percent','fixed') COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `location_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_services`
--

INSERT INTO `business_services` (`id`, `name`, `slug`, `description`, `price`, `time`, `time_type`, `discount`, `discount_type`, `category_id`, `location_id`, `business_id`, `booking_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Burger King', 'burger-king', 'Fast Food Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 1, 2, 1, 1, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(2, 'Louis Vuitton', 'louis-vuitton', 'Accessories Company Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 2, 3, 2, 2, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(3, 'Mc Donald', 'mc-donald', 'Fast Food Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 8, 4, 1, 1, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(4, 'Dunkin Donuts', 'dunkin-donuts', 'Fast Food Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 3, 2, 1, 3, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(5, 'Lacoste Shirt', 'lacoste-shirt', 'Clothing Company Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 4, 5, 2, 4, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(6, 'Google Company', 'google-company', 'Tech-Company Service', 25.00, 5.00, 'minutes', 5.00, 'percent', 5, 6, 3, 5, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(7, 'Camella Homes', 'camella-homes', 'Real State Property', 25.00, 5.00, 'minutes', 5.00, 'percent', 6, 7, 4, 6, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33'),
(8, 'Honda Motorcycle', 'honda-motorcycle', 'Motorcycle Replacement Services', 25.00, 5.00, 'minutes', 5.00, 'percent', 7, 8, 5, 7, NULL, 'active', '2019-12-20 03:09:33', '2019-12-20 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `business_user`
--

CREATE TABLE `business_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_user`
--

INSERT INTO `business_user` (`id`, `user_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(2, 2, 2, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(3, 3, 1, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(4, 4, 2, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(5, 5, 3, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(6, 6, 4, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(7, 7, 5, '2019-11-14 03:09:33', '2019-11-14 03:09:34'),
(8, 8, 3, '2019-11-14 03:09:33', '2019-11-14 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `business_id`, `booking_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Food', 'food', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 2, 2, 'Accessories', 'accessories', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 1, 3, 'Snack', 'snack', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 2, 4, 'Clothing', 'clothing', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 3, 5, 'Techonolgy', 'techonolgy', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 4, 6, 'Real State', 'real-state', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 5, 7, 'Cars', 'cars', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 1, 3, 'Beverage', 'beverage', NULL, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `company_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supported_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `business_id`, `booking_id`, `company_name`, `company_email`, `company_phone`, `logo`, `address`, `website`, `timezone`, `locale`, `latitude`, `longitude`, `currency_id`, `created_at`, `updated_at`, `purchase_code`, `supported_until`) VALUES
(1, NULL, NULL, 'Froiden Technologies Pvt Ltd', 'company@example.com', '1234512345', NULL, 'Jaipur, India', 'http://www.xyz.com', 'Asia/Kolkata', 'en', '26.91243360', '75.78727090', 1, NULL, '2020-02-07 02:09:41', 'envato-dev', NULL),
(2, 1, 1, 'Food Business', 'foodBusiness@example.com', '639088184445', NULL, 'Manila / Philippines', 'http://www.food_Business.com', 'Asia/Manila', 'en', '26.91243360', '75.78727090', 1, NULL, NULL, 'envato-dev', NULL),
(3, 2, 1, 'Shirt Business', 'shirtBusiness@example.com', '639088184446', NULL, 'Tokyo / Japan', 'http://www.shirt_Business.com', 'Asia/Tokyo', 'en', '26.91243360', '75.78727090', 1, NULL, NULL, 'envato-dev', NULL),
(4, 3, 1, 'Technology Business', 'technologyBusinesss@example.com', '639088184447', NULL, 'Kuala Lumpur / Malaysia', 'http://www.street_Businesss.com', 'Asia/Kuala Lumpur', 'en', '26.91243360', '75.78727090', 1, NULL, NULL, 'envato-dev', NULL),
(5, 4, 1, 'House Business', 'houseBusiness@example.com', '639088184448', NULL, 'Bangkok / Thailand', 'http://www.house_Business.com', 'Asia/Bangkok', 'en', '26.91243360', '75.78727090', 1, NULL, NULL, 'envato-dev', NULL),
(6, 5, 1, 'Cars Business', 'carsBusiness@example.com', '639088184449', NULL, 'Seoul / South Korea', 'http://www.cars_Business.com', 'Asia/Seoul', 'en', '26.91243360', '75.78727090', 1, NULL, NULL, 'envato-dev', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_symbol`, `currency_code`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates Dirham', 'AED', 'AED', '2020-02-07 02:09:13', '2020-02-07 02:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee_groups`
--

CREATE TABLE `employee_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_groups`
--

INSERT INTO `employee_groups` (`id`, `business_id`, `booking_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Epic Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 2, 2, 'Origin Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 1, 3, 'Epic Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 2, 4, 'Origin Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 3, 5, 'Steam Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 4, 6, 'Blizzard Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 5, 7, 'Ubisoft Games', 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `front_theme_settings`
--

CREATE TABLE `front_theme_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `primary_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `front_theme_settings`
--

INSERT INTO `front_theme_settings` (`id`, `business_id`, `booking_id`, `primary_color`, `secondary_color`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '#414552', '#788AE2', NULL, NULL, NULL),
(2, 1, 1, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 2, 2, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 1, 3, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 2, 4, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 3, 5, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 4, 6, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 5, 7, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 3, 8, '#414552', '#788AE2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `language_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('enabled','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_code`, `language_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'es', 'Spanish', 'disabled', '2020-02-07 02:09:19', '2020-02-07 02:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `business_id`, `booking_id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Jaipur, India', '2020-02-07 02:09:49', '2020-02-07 02:09:49'),
(2, 1, 1, 'Manila / Philippines', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 2, 2, 'Tokyo / Japan', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 1, 3, 'Beijing / China', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 2, 4, 'Taipei / Taiwan', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 3, 5, 'Kuala Lumpur / Malaysia', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 4, 6, 'Bangkok / Thailand', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 5, 7, 'Seoul / South Korea', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 3, 8, 'Seoul / South Korea', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `business_id`, `booking_id`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Epic Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 2, 2, 'Origin Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 1, 3, 'Epic Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 2, 4, 'Origin Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 3, 5, 'Steam Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 4, 6, 'Blizzard Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 5, 7, 'Ubisoft Games', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_09_06_071923_create_categories_table', 1),
(5, '2018_09_11_093015_create_business_services_table', 1),
(6, '2018_09_11_173520_create_bookings_table', 1),
(7, '2018_09_11_174709_add_discount_column_serices_table', 1),
(8, '2018_09_11_184348_create_tax_settings_table', 1),
(9, '2018_09_12_151158_create_booking_times_table', 1),
(10, '2018_09_18_064516_add_mobile_column_users_table', 1),
(11, '2018_09_19_095300_add_status_column_categories_table', 1),
(12, '2018_09_19_095530_add_status_column_booking_services_table', 1),
(13, '2018_09_20_130124_create_currencies_table', 1),
(14, '2018_09_20_131417_create_company_settings_table', 1),
(15, '2018_09_25_112040_create_booking_items_table', 1),
(16, '2018_09_28_074544_add_columns_bookings_table', 1),
(17, '2018_10_03_182207_create_languages_table', 1),
(18, '2018_10_04_100225_add_spanish_language', 1),
(19, '2018_10_04_112244_create_smtp_settings_table', 1),
(20, '2018_10_08_122033_add_image_users_table', 1),
(21, '2018_10_09_121006_create_theme_settings_table', 1),
(22, '2018_10_15_123811_add_time_slot_duration_booing_times_table', 1),
(23, '2018_11_01_091108_add_is_admin_column_users_table', 1),
(24, '2018_11_02_052534_add_topbar_textcolor_column_theme_settings', 1),
(25, '2018_12_03_104905_change_tax_column_nullable_bookings_table', 1),
(26, '2018_12_19_192042_add_source_column_bookings_table', 1),
(27, '2018_12_20_115707_allow_soft_delete_user', 1),
(28, '2018_12_27_053940_create_payment_gateway_credential_table', 1),
(29, '2018_12_27_064431_create_payments_table', 1),
(30, '2019_01_03_192042_alter_credential_table', 1),
(31, '2019_01_31_111812_add_multiple_booking_column_booking_times_table', 1),
(32, '2019_02_10_075422_add_addition_notes_column_bookings_table', 1),
(33, '2019_04_08_053940_create_employee_groups_table', 1),
(34, '2019_04_08_075422_alter_user_employee_table', 1),
(35, '2019_04_08_085422_alter_booking_group_table', 1),
(36, '2019_08_06_104829_create_media_table', 1),
(37, '2019_08_08_071516_create_locations_table', 1),
(38, '2019_08_08_095010_add_location_id_column_in_business_services_table', 1),
(39, '2019_08_13_073129_update_settings_add_envato_key', 1),
(40, '2019_08_13_073129_update_settings_add_support_key', 1),
(41, '2019_08_14_093126_alter_booking_times_and_bookings_table', 1),
(42, '2019_08_14_121322_create_front_theme_settings_table', 1),
(43, '2019_08_27_043810_create_pages_table', 1),
(44, '2019_08_28_081847_update_smtp_setting_verified', 1),
(45, '2019_09_03_110646_add_slug_field_in_categories_and_business_services_table', 1),
(46, '2019_09_17_083105_create_sms_settings_table', 1),
(47, '2019_09_18_115145_add_mobile_verified_column_in_users_table', 1),
(48, '2019_09_23_064129_create_universal_search_table', 1),
(49, '2019_10_07_073041_add_status_column_in_languages_table', 1),
(50, '2019_10_14_084220_alter_foreign_key_in_business_services_table', 1),
(51, '2019_11_13_055043_create_businesses_table', 1),
(52, '2019_11_14_022157_insert_businessess_table', 1),
(53, '2019_11_14_053010_insert_user_table', 1),
(54, '2019_11_14_070828_create_business_user_table', 1),
(55, '2019_11_14_071035_insert_business_user_table', 1),
(56, '2019_11_14_082706_add_booking_id_column', 1),
(57, '2019_11_14_092840_add_business_id_column', 1),
(58, '2019_11_15_032515_insert_bookings_table', 1),
(59, '2019_11_15_033308_insert_booking_times_table', 1),
(60, '2019_11_15_055817_insert_categories_table', 1),
(61, '2019_11_15_060319_insert_locations_table', 1),
(62, '2019_11_15_060855_insert_business_services_table', 1),
(63, '2019_11_15_181634_insert_booking_items_table', 1),
(64, '2019_11_15_182156_insert_employee_groups_table', 1),
(65, '2019_11_15_182612_insert_front_theme_settings_table', 1),
(66, '2019_11_15_182833_insert_media_table', 1),
(67, '2019_11_15_184006_insert_pages_table', 1),
(68, '2019_11_15_185102_insert_payments_table', 1),
(69, '2019_11_15_185600_insert_sms_settings_table', 1),
(70, '2019_11_15_190001_insert_smtp_settings_table', 1),
(71, '2019_11_15_190733_insert_tax_settings_table', 1),
(72, '2019_11_15_190939_insert_theme_settings_table', 1),
(73, '2019_11_18_092248_insert_purchase_code_in_company_settings_table', 1),
(74, '2019_11_22_072625_insert_company_settings_table', 1),
(75, '2019_12_01_123824_update_payment_gateway_credentials_record', 1),
(76, '2019_12_09_081447_create_plan_table', 1),
(77, '2019_12_10_022900_create_subscription_table', 1),
(78, '2019_12_10_051343_insert_super_admin_data', 1),
(79, '2019_12_10_090732_create_payment_history_table', 1),
(80, '2019_12_13_065728_create_payment_card_table', 1),
(81, '2020_01_13_081601_create_payment_subscription_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `business_id`, `booking_id`, `title`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'About Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2020-02-07 02:09:49', '2020-02-07 02:09:49'),
(2, NULL, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2020-02-07 02:09:49', '2020-02-07 02:09:49'),
(3, NULL, NULL, 'How It Works', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2020-02-07 02:09:50', '2020-02-07 02:09:50'),
(4, NULL, NULL, 'Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2020-02-07 02:09:50', '2020-02-07 02:09:50'),
(5, 1, NULL, 'About Us', '(Food Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 1, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 1, NULL, 'How It Works', '(Food Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 1, NULL, 'Privacy Policy', '(Food Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 2, NULL, 'About Us', '(Shirt Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(10, 2, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(11, 2, NULL, 'How It Works', '(Shirt Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(12, 2, NULL, 'Privacy Policy', '(Shirt Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(13, 3, NULL, 'About Us', '(Technology Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(14, 3, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(15, 3, NULL, 'How It Works', '(Technology Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(16, 3, NULL, 'Privacy Policy', '(Technology Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(17, 4, NULL, 'About Us', '(House Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(18, 4, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(19, 4, NULL, 'How It Works', '(House Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(20, 4, NULL, 'Privacy Policy', '(House Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(21, 5, NULL, 'About Us', '(Cars Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'about-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(22, 5, NULL, 'Contact Us', '<h2>Contact Us</h2>\r\n\r\n                <p>How can we help you? We will try to get back to you as soon as possible.</p>', 'contact-us', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(23, 5, NULL, 'How It Works', '(Cars Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'how-it-works', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(24, 5, NULL, 'Privacy Policy', '(Cars Business) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy-policy', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `gateway` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('complete','pending') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_on` datetime DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `currency_id`, `booking_id`, `amount`, `gateway`, `transaction_id`, `status`, `paid_on`, `customer_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, NULL, '', '2019-11-14 11:09:33', '1', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(2, 1, 2, 5, NULL, NULL, '', '2019-11-14 11:09:33', '2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 1, 3, 5, NULL, NULL, '', '2019-11-14 11:09:33', '1', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 1, 4, 5, NULL, NULL, '', '2019-11-14 11:09:33', '2', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 1, 5, 5, NULL, NULL, '', '2019-11-14 11:09:33', '3', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 1, 6, 5, NULL, NULL, '', '2019-11-14 11:09:33', '4', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 1, 7, 5, NULL, NULL, '', '2019-11-14 11:09:33', '5', NULL, '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `account_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pt_invoice_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_card`
--

INSERT INTO `payment_card` (`id`, `user_id`, `account_name`, `card_number`, `pt_invoice_id`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(2, 2, '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(3, 8, '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_credentials`
--

CREATE TABLE `payment_gateway_credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `paypal_client_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_secret` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_client_id` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_secret` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_webhook_secret` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'deactive',
  `paypal_status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'deactive',
  `offline_payment` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_gateway_credentials`
--

INSERT INTO `payment_gateway_credentials` (`id`, `paypal_client_id`, `paypal_secret`, `stripe_client_id`, `stripe_secret`, `stripe_webhook_secret`, `stripe_status`, `paypal_status`, `offline_payment`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'deactive', 'deactive', '1', '2020-02-07 02:09:30', '2020-02-07 02:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pt_invoice_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `card_last_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `business_id`, `plan_id`, `user_id`, `amount`, `currency`, `transaction_id`, `order_id`, `pt_invoice_id`, `card_last_number`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(2, 2, 2, 2, '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(3, 3, 1, 8, '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_subscription`
--

CREATE TABLE `payment_subscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `references_no` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pt_token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pt_customer_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pt_customer_password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `cc_first_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `cc_last_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address_billing` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `state_billing` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `city_billing` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code_billing` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `country_billing` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address_shipping` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `city_shipping` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `state_shipping` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code_shipping` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `country_shipping` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_subscription`
--

INSERT INTO `payment_subscription` (`id`, `subscription_id`, `invoice_id`, `references_no`, `transaction_id`, `pt_token`, `pt_customer_email`, `pt_customer_password`, `title`, `cc_first_name`, `cc_last_name`, `order_id`, `product_name`, `customer_email`, `phone_number`, `amount`, `currency`, `address_billing`, `state_billing`, `city_billing`, `postal_code_billing`, `country_billing`, `address_shipping`, `city_shipping`, `state_shipping`, `postal_code_shipping`, `country_shipping`, `created_at`, `updated_at`) VALUES
(1, 1, 373661, 'ABC-123', '423428', 'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5', 'sample@gmail.com', 'wrLpdt5i26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(2, 2, 373321, 'ABC-123', '423428', 'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5', 'sample@gmail.com', 'wrLpdt5i26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34'),
(3, 3, 373316, 'ABC-123', '423428', 'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5', '423428', 'wrLpdt5i26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-12-11 03:09:34', '2019-12-11 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `monthly` double(8,2) NOT NULL,
  `annual` double(8,2) NOT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `services_limit` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `bookings_limit` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_name`, `monthly`, `annual`, `description`, `services_limit`, `bookings_limit`, `created_at`, `updated_at`) VALUES
(1, 'Free', 0.00, 0.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '5', '5', '2019-12-09 03:09:34', '2019-12-09 03:09:34'),
(2, 'Standard', 5.00, 55.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '10', '10', '2019-12-09 03:09:34', '2019-12-09 03:09:34'),
(3, 'Professional', 15.00, 155.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '50', '100', '2019-12-09 03:09:34', '2019-12-09 03:09:34'),
(4, 'Advance', 25.00, 200.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Unlimited', 'Unlimited', '2019-12-09 03:09:34', '2019-12-09 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `nexmo_status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'deactive',
  `nexmo_key` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nexmo_secret` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nexmo_from` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'NEXMO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `business_id`, `booking_id`, `nexmo_status`, `nexmo_key`, `nexmo_secret`, `nexmo_from`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'deactive', NULL, NULL, 'NEXMO', '2020-02-07 02:09:48', '2020-02-07 02:09:48'),
(2, 1, 1, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 2, 2, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 1, 3, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 2, 4, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 3, 5, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 4, 6, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 5, 7, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 3, 8, 'deactive', NULL, NULL, 'NEXMO', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `mail_driver` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_host` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_port` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_username` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_from_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_from_email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mail_encryption` enum('none','tls','ssl') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `business_id`, `booking_id`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_from_name`, `mail_from_email`, `mail_encryption`, `created_at`, `updated_at`, `verified`) VALUES
(1, NULL, NULL, 'mail', 'smtp.gmail.com', '587', 'myemail@gmail.com', 'mypassword', 'Appointo', 'myemail@gmail.com', 'none', '2020-02-07 02:09:19', '2020-02-07 02:09:19', 0),
(2, 1, 1, 'mail', 'one_smtp.gmail.com', '587', 'one_myemail@gmail.com', 'mypassword', 'Appointo', 'one_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(3, 2, 2, 'mail', 'two_smtp.gmail.com', '587', 'two_myemail@gmail.com', 'mypassword', 'Appointo', 'two_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(4, 1, 3, 'mail', 'one_smtp.gmail.com', '587', 'one_myemail@gmail.com', 'mypassword', 'Appointo', 'one_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(5, 2, 4, 'mail', 'two_smtp.gmail.com', '587', 'two_myemail@gmail.com', 'mypassword', 'Appointo', 'two_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(6, 3, 5, 'mail', 'three_smtp.gmail.com', '587', 'three_myemail@gmail.com', 'mypassword', 'Appointo', 'three_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(7, 4, 6, 'mail', 'four_smtp.gmail.com', '587', 'four_myemail@gmail.com', 'mypassword', 'Appointo', 'four_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(8, 5, 7, 'mail', 'five_smtp.gmail.com', '587', 'five_myemail@gmail.com', 'mypassword', 'Appointo', 'five_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0),
(9, 3, 8, 'mail', 'five_smtp.gmail.com', '587', 'five_myemail@gmail.com', 'mypassword', 'Appointo', 'five_myemail@gmail.com', 'none', '2019-11-14 03:09:33', '2019-11-14 03:09:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `last_payment` datetime NOT NULL,
  `next_payment` datetime NOT NULL,
  `recuring_payment` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `business_id`, `plan_id`, `user_id`, `last_payment`, `next_payment`, `recuring_payment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2019-12-09 11:09:34', '2020-01-09 11:09:34', 'Monthly', '2019-12-09 03:09:34', '2019-12-09 03:09:34'),
(2, 2, 2, 2, '2019-12-09 11:09:34', '2020-01-09 11:09:34', 'Monthly', '2019-12-09 03:09:34', '2019-12-09 03:09:34'),
(3, 3, 1, 8, '2019-12-09 11:09:34', '2020-01-09 11:09:34', 'Monthly', '2019-12-09 03:09:34', '2019-12-09 03:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `tax_settings`
--

CREATE TABLE `tax_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `percent` double(8,2) NOT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_settings`
--

INSERT INTO `tax_settings` (`id`, `business_id`, `booking_id`, `tax_name`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'GST', 18.00, 'active', '2020-02-07 02:09:09', '2020-02-07 02:09:09'),
(2, 1, 1, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(3, 2, 2, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(4, 1, 3, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(5, 2, 4, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(6, 3, 5, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(7, 4, 6, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(8, 5, 7, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33'),
(9, 3, 8, 'VAT', 5.00, 'active', '2019-11-14 03:09:33', '2019-11-14 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE `theme_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `business_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `primary_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar_bg_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `sidebar_text_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `topbar_text_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theme_settings`
--

INSERT INTO `theme_settings` (`id`, `business_id`, `booking_id`, `primary_color`, `secondary_color`, `sidebar_bg_color`, `sidebar_text_color`, `topbar_text_color`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(2, 1, 1, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(3, 2, 2, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(4, 1, 3, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(5, 2, 4, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(6, 3, 5, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(7, 4, 6, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(8, 5, 7, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL),
(9, 3, 8, '#414552', '#788AE2', '#FFFFFF', '#5C5C62', '#FFFFFF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universal_searches`
--

CREATE TABLE `universal_searches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `searchable_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `searchable_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `universal_searches`
--

INSERT INTO `universal_searches` (`id`, `searchable_id`, `searchable_type`, `title`, `route_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Location', 'Jaipur, India', 'admin.locations.edit', '2020-02-07 02:09:49', '2020-02-07 02:09:49'),
(2, 'about-us', 'Page', 'About Us', 'admin.pages.edit', '2020-02-07 02:09:49', '2020-02-07 02:09:49'),
(3, 'contact-us', 'Page', 'Contact Us', 'admin.pages.edit', '2020-02-07 02:09:50', '2020-02-07 02:09:50'),
(4, 'how-it-works', 'Page', 'How It Works', 'admin.pages.edit', '2020-02-07 02:09:50', '2020-02-07 02:09:50'),
(5, 'privacy-policy', 'Page', 'Privacy Policy', 'admin.pages.edit', '2020-02-07 02:09:50', '2020-02-07 02:09:50'),
(6, '1', 'Service', 'Burger King', 'admin.business-services.edit', '2020-02-07 02:11:37', '2020-02-07 02:11:37'),
(7, '2', 'Service', 'Louis Vuitton', 'admin.business-services.edit', '2020-02-07 02:11:37', '2020-02-07 02:11:37'),
(8, '3', 'Service', 'Mc Donald', 'admin.business-services.edit', '2020-02-07 02:11:37', '2020-02-07 02:11:37'),
(9, '4', 'Service', 'Dunkin Donuts', 'admin.business-services.edit', '2020-02-07 02:11:37', '2020-02-07 02:11:37'),
(10, '5', 'Service', 'Lacoste Shirt', 'admin.business-services.edit', '2020-02-07 02:11:37', '2020-02-07 02:11:37'),
(11, '6', 'Service', 'Google Company', 'admin.business-services.edit', '2020-02-07 02:11:38', '2020-02-07 02:11:38'),
(12, '7', 'Service', 'Camella Homes', 'admin.business-services.edit', '2020-02-07 02:11:38', '2020-02-07 02:11:38'),
(13, '8', 'Service', 'Honda Motorcycle', 'admin.business-services.edit', '2020-02-07 02:11:38', '2020-02-07 02:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `calling_code` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `is_employee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `email`, `calling_code`, `mobile`, `mobile_verified`, `password`, `image`, `remember_token`, `is_admin`, `is_employee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'M.S.Dhoni', 'admin@example.com', NULL, '1919191919', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, 'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf', 1, 0, '2019-11-14 03:09:33', NULL, NULL),
(2, NULL, 'Robert A. Reno', 'RobertAReno_admin@gmail.com', NULL, '1919191911', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, 'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf', 1, 0, '2019-11-14 03:09:33', NULL, NULL),
(3, 1, 'Bryan A. Sheffield', 'BryanASheffield@gmail.com', '+63', '9088184444', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, NULL, 0, 1, '2019-11-14 03:09:33', NULL, NULL),
(4, 2, 'Jessica N. Roehl', 'JessicaNRoehl@gmail.com', '+63', '9088184445', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, NULL, 0, 1, '2019-11-14 03:09:33', NULL, NULL),
(5, 3, 'Helen S. Johnson', 'HelenSJohnson@gmail.com', '+63', '9088184446', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, NULL, 0, 1, '2019-11-14 03:09:33', NULL, NULL),
(6, 4, 'David E. Darling', 'DavidEDarling@gmail.com', '+63', '9088184447', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, NULL, 0, 1, '2019-11-14 03:09:33', NULL, NULL),
(7, 5, 'Gordon K. Shifflett', 'GordonKShifflett@gmail.com', '+63', '9088184448', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, NULL, 0, 1, '2019-11-14 03:09:33', NULL, NULL),
(8, NULL, 'Julieta W. Yates', 'JulietaWYates_admin@gmail.com', NULL, '1919191911', 0, '$2y$10$6Hqf.yISteTz6uNophja0OZjmsfAV6bYKVE0imYKhKRE3AwK/.Yiu', NULL, 'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf', 1, 0, '2019-11-14 03:09:33', NULL, NULL),
(9, NULL, 'Super Admin', 'superadmin@example.com', NULL, '999999999', 0, '$2y$10$r2q90LXnSUmMnNrbcq/fKO44G.h11UmOg2Qxql6r7CURv5ed.xTO.', NULL, NULL, 2, 0, '2019-11-14 03:09:33', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_business_id_foreign` (`business_id`);

--
-- Indexes for table `booking_items`
--
ALTER TABLE `booking_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_items_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_items_business_service_id_foreign` (`business_service_id`);

--
-- Indexes for table `booking_times`
--
ALTER TABLE `booking_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_times_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_times_business_id_foreign` (`business_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_services`
--
ALTER TABLE `business_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_services_category_id_foreign` (`category_id`),
  ADD KEY `business_services_location_id_foreign` (`location_id`),
  ADD KEY `business_services_booking_id_foreign` (`booking_id`),
  ADD KEY `business_services_business_id_foreign` (`business_id`);

--
-- Indexes for table `business_user`
--
ALTER TABLE `business_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_user_user_id_foreign` (`user_id`),
  ADD KEY `business_user_business_id_foreign` (`business_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_booking_id_foreign` (`booking_id`),
  ADD KEY `categories_business_id_foreign` (`business_id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_settings_currency_id_foreign` (`currency_id`),
  ADD KEY `company_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `company_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_groups`
--
ALTER TABLE `employee_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_groups_booking_id_foreign` (`booking_id`),
  ADD KEY `employee_groups_business_id_foreign` (`business_id`);

--
-- Indexes for table `front_theme_settings`
--
ALTER TABLE `front_theme_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_theme_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `front_theme_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_booking_id_foreign` (`booking_id`),
  ADD KEY `locations_business_id_foreign` (`business_id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_booking_id_foreign` (`booking_id`),
  ADD KEY `media_business_id_foreign` (`business_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_booking_id_foreign` (`booking_id`),
  ADD KEY `pages_business_id_foreign` (`business_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`),
  ADD UNIQUE KEY `payments_event_id_unique` (`event_id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_card_user_id_foreign` (`user_id`);

--
-- Indexes for table `payment_gateway_credentials`
--
ALTER TABLE `payment_gateway_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_history_business_id_foreign` (`business_id`),
  ADD KEY `payment_history_plan_id_foreign` (`plan_id`),
  ADD KEY `payment_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `payment_subscription`
--
ALTER TABLE `payment_subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_subscription_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `sms_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smtp_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `smtp_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_business_id_foreign` (`business_id`),
  ADD KEY `subscription_plan_id_foreign` (`plan_id`),
  ADD KEY `subscription_user_id_foreign` (`user_id`);

--
-- Indexes for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `tax_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_settings_booking_id_foreign` (`booking_id`),
  ADD KEY `theme_settings_business_id_foreign` (`business_id`);

--
-- Indexes for table `universal_searches`
--
ALTER TABLE `universal_searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_items`
--
ALTER TABLE `booking_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking_times`
--
ALTER TABLE `booking_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_services`
--
ALTER TABLE `business_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `business_user`
--
ALTER TABLE `business_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_groups`
--
ALTER TABLE `employee_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `front_theme_settings`
--
ALTER TABLE `front_theme_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_gateway_credentials`
--
ALTER TABLE `payment_gateway_credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_subscription`
--
ALTER TABLE `payment_subscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tax_settings`
--
ALTER TABLE `tax_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theme_settings`
--
ALTER TABLE `theme_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `universal_searches`
--
ALTER TABLE `universal_searches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_items`
--
ALTER TABLE `booking_items`
  ADD CONSTRAINT `booking_items_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_items_business_service_id_foreign` FOREIGN KEY (`business_service_id`) REFERENCES `business_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_times`
--
ALTER TABLE `booking_times`
  ADD CONSTRAINT `booking_times_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_times_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_services`
--
ALTER TABLE `business_services`
  ADD CONSTRAINT `business_services_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_services_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_services_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_user`
--
ALTER TABLE `business_user`
  ADD CONSTRAINT `business_user_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD CONSTRAINT `company_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_settings_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_groups`
--
ALTER TABLE `employee_groups`
  ADD CONSTRAINT `employee_groups_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_groups_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `front_theme_settings`
--
ALTER TABLE `front_theme_settings`
  ADD CONSTRAINT `front_theme_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `front_theme_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pages_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD CONSTRAINT `payment_card_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_history_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_subscription`
--
ALTER TABLE `payment_subscription`
  ADD CONSTRAINT `payment_subscription_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD CONSTRAINT `sms_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sms_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD CONSTRAINT `smtp_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `smtp_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD CONSTRAINT `tax_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD CONSTRAINT `theme_settings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `theme_settings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
