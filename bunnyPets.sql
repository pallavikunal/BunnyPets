-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2015 at 04:47 PM
-- Server version: 5.6.22
-- PHP Version: 5.4.42-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bunnyPets`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_08_18_125854_create_pet_service_types', 1),
('2015_08_18_131043_create_pet_type', 1),
('2015_08_19_082518_create_pet_service', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pet_service_types`
--

CREATE TABLE IF NOT EXISTS `pet_service_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pet_service_types_service_name_unique` (`service_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pet_service_types`
--

INSERT INTO `pet_service_types` (`id`, `service_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Washing', 'Washing service', 1, '2015-08-18 18:30:00', '2015-08-18 18:30:00'),
(3, 'Pedicure', 'Pedicure service', 1, '2015-08-18 18:30:00', '2015-08-18 18:30:00'),
(4, 'Manicure', 'Manicure service', 1, '2015-08-18 18:30:00', '2015-08-19 02:01:34'),
(5, 'Polishing', 'Polishing service', 1, '2015-08-18 18:30:00', '2015-08-18 18:30:00'),
(20, 'pet name', 'pet namepet name', 1, '2015-08-19 02:19:35', '2015-08-19 02:19:35'),
(23, 'pet nameh', 'pet nameh', 1, '2015-08-19 02:46:31', '2015-08-19 02:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `pet_type`
--

CREATE TABLE IF NOT EXISTS `pet_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pet_type_pet_name_unique` (`pet_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pet_type`
--

INSERT INTO `pet_type` (`id`, `pet_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cats', 'Cats details', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dogs', 'Dogs details', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Rabbits', 'Rabbits details', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tortoises', 'Tortoises details', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'pet snakes', 'pet snakes details', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'test cat', 'sdfsdf', 1, '2015-08-19 03:35:58', '2015-08-19 03:35:58'),
(8, 'abc pet', 'abc petabc pet', 1, '2015-08-19 03:36:12', '2015-08-19 03:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `services_for_pets`
--

CREATE TABLE IF NOT EXISTS `services_for_pets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pet_type_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pet_service_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `services_for_pets`
--

INSERT INTO `services_for_pets` (`id`, `pet_type_id`, `pet_service_id`, `status`, `created_at`, `updated_at`) VALUES
(13, '1', '1', 1, '2015-08-19 04:13:04', '2015-08-19 04:13:04'),
(14, '1', '4', 1, '2015-08-19 04:13:04', '2015-08-19 04:13:04'),
(15, '1', '5', 1, '2015-08-19 04:13:04', '2015-08-19 04:13:04'),
(16, '1', '20', 1, '2015-08-19 04:13:04', '2015-08-19 04:13:04'),
(17, '1', '23', 1, '2015-08-19 04:13:04', '2015-08-19 04:13:04'),
(20, '7', '3', 1, '2015-08-19 04:23:59', '2015-08-19 04:23:59'),
(21, '7', '4', 1, '2015-08-19 04:23:59', '2015-08-19 04:23:59'),
(22, '7', '20', 1, '2015-08-19 04:23:59', '2015-08-19 04:23:59'),
(27, '8', '1', 1, '2015-08-19 04:27:29', '2015-08-19 04:27:29'),
(28, '8', '23', 1, '2015-08-19 04:27:29', '2015-08-19 04:27:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
