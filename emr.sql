-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 07:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emr`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE IF NOT EXISTS `allergies` (
`id` int(10) unsigned NOT NULL,
  `allergy_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allergy_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`id`, `allergy_name`, `allergy_note`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 'Dust Allergy', 'Patient has dust allergy. So should be treated with clean operates. ', '2015-03-25 02:11:55', '2015-03-25 02:11:55', '1');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
`id` int(10) unsigned NOT NULL,
  `checkup_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkup_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `timeslot_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `checkup_reason`, `date`, `time`, `status`, `checkup_fee`, `fee_note`, `timeslot_id`, `employee_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Patient wants detailed checkup. ', '2015-03-23', '11:00:00', '0', 0, '', 1, 2, 1, '2015-03-24 12:41:02', '2015-03-24 12:41:02'),
(2, 'Patient feels pain in backbone.', '2015-03-23', '11:15:00', '0', 0, '', 2, 2, 1, '2015-03-24 12:44:02', '2015-03-24 12:44:02'),
(3, 'Patient has severe pain in head.', '2015-03-23', '11:30:00', '0', 0, '', 3, 2, 1, '2015-03-24 13:08:37', '2015-03-24 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `checkupfees`
--

CREATE TABLE IF NOT EXISTS `checkupfees` (
`id` int(10) unsigned NOT NULL,
  `checkup_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkupfees`
--

INSERT INTO `checkupfees` (`id`, `checkup_fee`, `fee_note`, `patient_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 500, 'Patient pays fee through ATM card.', 1, 1, '2015-03-24 12:41:37', '2015-03-24 12:41:37'),
(2, 200, 'Payed through ATM.', 1, 2, '2015-03-24 13:16:46', '2015-03-24 13:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `diagonosticprocedures`
--

CREATE TABLE IF NOT EXISTS `diagonosticprocedures` (
`id` int(10) unsigned NOT NULL,
  `procedure_note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diagonosticprocedures`
--

INSERT INTO `diagonosticprocedures` (`id`, `procedure_note`, `patient_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 'Patient should be treated with great care.', 1, 3, '2015-03-25 12:24:30', '2015-03-25 12:24:30'),
(2, 'Treat patient with great care.', 1, 1, '2015-03-26 11:12:25', '2015-03-26 11:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `drugusages`
--

CREATE TABLE IF NOT EXISTS `drugusages` (
`id` int(10) unsigned NOT NULL,
  `drug_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usage_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugusages`
--

INSERT INTO `drugusages` (`id`, `drug_name`, `usage_note`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 'Alcohol', 'Patient takes 2 glasses of alcohol regularly from last 2 weeks.', '2015-03-25 02:08:48', '2015-03-25 02:08:48', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dutydays`
--

CREATE TABLE IF NOT EXISTS `dutydays` (
`id` int(10) unsigned NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dutydays`
--

INSERT INTO `dutydays` (`id`, `day`, `start`, `end`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 2, '2015-03-24 12:40:27', '2015-03-24 12:40:27'),
(2, 'Monday', '11:00:00', '13:00:00', 2, '2015-03-24 12:40:27', '2015-03-24 12:40:27'),
(3, NULL, NULL, NULL, 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(4, NULL, NULL, NULL, 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(5, NULL, NULL, NULL, 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(6, NULL, NULL, NULL, 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(7, 'Saturday', '13:00:00', '15:00:00', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `email`, `gender`, `age`, `city`, `country`, `address`, `phone`, `cnic`, `branch`, `note`, `status`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Shah', '$2y$10$RMzNT9pfmQIyPZILbUje...nJI3HobwZwq/QJ5jLEcTkgYVv57AkS', 'admin@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Administrator', '2015-03-23 02:22:31', '2015-03-23 02:22:31', NULL),
(2, 'Ali', '$2y$10$F9nWKlMh4Hn8WXEfC1z13.9LrA6v2niuqwrMgN00546h5H.AjuViy', 'doctor@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Doctor', '2015-03-23 02:22:31', '2015-03-23 02:22:31', NULL),
(3, 'Umer', '$2y$10$z6fUyCePzE/W//IgBtizousVH/FpKwNtO2yoCaRH9ad1F/XLXg.Q2', 'accountant@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Accountant', '2015-03-23 02:22:31', '2015-03-23 02:22:31', NULL),
(4, 'Talal', '$2y$10$iOvDCIJCIN7sMCGUFqyWVODljvT/tKawcaz1ry0uyNNiDFLXPvOL6', 'receptionist@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Receptionist', '2015-03-23 02:22:31', '2015-03-23 02:22:31', NULL),
(5, 'Aqeel', '$2y$10$4u4kWJFXZi.5OW7NaR4YjeeI/8z9liQneMRoGDvmLP5g7QDUHOPWu', 'lab@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Lab Manager', '2015-03-23 02:22:32', '2015-03-23 02:22:32', NULL),
(6, 'Faheem Umer', '$2y$10$dFujrDBlgevtwOXn52GI7.cIPOCEUxFnfiy5UBAHXXmW3hAAbX0yG', 'bc110201815@vu.edu.pk', 'Male', 22, 'Lahore', 'Pakistan', 'DHA', '(0092) 334-4050495', '88484-8484848-4', 'Gulberg', 'Qualified MBBS doctor.', 'Active', 'Doctor', '2015-03-27 12:43:24', '2015-03-27 12:47:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `familyhistories`
--

CREATE TABLE IF NOT EXISTS `familyhistories` (
`id` int(10) unsigned NOT NULL,
  `f_member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `diesease_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `familyhistories`
--

INSERT INTO `familyhistories` (`id`, `f_member_name`, `patient_relation`, `gender`, `age`, `diesease_note`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 'Mr. Ajmal', 'Uncle', 'Male', 50, 'Patient has fever in year 2000 that was cured by the same clinic as the currently patient is in.', '2015-03-25 01:50:29', '2015-03-25 01:50:29', '1'),
(2, 'Umer Khan', 'Father in Law', 'Male', 45, 'Patient experiences severe pain in backbone in 1999.', '2015-03-25 01:51:22', '2015-03-25 01:51:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE IF NOT EXISTS `labtests` (
`id` int(10) unsigned NOT NULL,
  `test_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_description` text COLLATE utf8_unicode_ci NOT NULL,
  `total_fee` double NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `test_results` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`id`, `test_name`, `test_description`, `total_fee`, `patient_id`, `appointment_id`, `test_results`, `created_at`, `updated_at`) VALUES
(1, 'Heart Test', 'Check all the wains of the patient''s heart.', 0, 1, 1, 'Patient Vains are good.', '2015-03-26 13:11:54', '2015-03-26 14:17:23'),
(2, 'Blood Test', 'Check the hemoglobin level in blood.', 0, 1, 2, 'Hemoglobin is in good quantity.', '2015-03-26 13:32:04', '2015-03-26 13:36:43'),
(3, 'CBC', 'Test is needed asap.', 0, 1, 2, '', '2015-03-26 13:32:18', '2015-03-26 13:32:18');

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
('2015_01_28_184838_create_employees_table', 1),
('2015_02_03_060752_create_patients_table', 1),
('2015_02_05_194923_add_remember_token_to_employees_table', 1),
('2015_02_06_062003_create_surgicalhistories_table', 1),
('2015_02_06_103433_create_familyhistories_table', 1),
('2015_02_10_120710_create_previousdiseases_table', 1),
('2015_02_11_060123_create_allergies_table', 1),
('2015_02_11_070250_create_drugusages_table', 1),
('2015_02_11_074218_create_diagonosticprocedures_table', 1),
('2015_02_11_095950_create_vitalsigns_table', 1),
('2015_02_12_084106_add_patient_id_to_allergies_table', 1),
('2015_02_12_084722_add_patient_id_to_drugusages_table', 1),
('2015_02_12_085330_add_patient_id_to_familyhistories_table', 1),
('2015_02_12_085656_add_patient_id_to_previousdiseases_table', 1),
('2015_02_12_090044_add_patient_id_to_surgicalhistories_table', 1),
('2015_02_14_110516_create_dutydays_table', 1),
('2015_02_14_111359_create_timeslots_table', 1),
('2015_02_17_060819_create_labtests_table', 1),
('2015_02_17_080659_create_appointments_table', 1),
('2015_02_18_064352_create_prescriptions_table', 1),
('2015_02_19_192700_create_password_reminders_table', 1),
('2015_02_21_053340_create_checkupfees_table', 1),
('2015_02_21_053926_create_testfees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `gender`, `age`, `email`, `city`, `country`, `address`, `phone`, `cnic`, `note`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Naeem Shah', '2000-01-01', 'Male', 16, 'rock.star9722@gmail.com', 'Lahore', 'Pakistan', 'DHA', '(0092) 334-4050495', '12211-4545454-5', 'Patient periodically want detailed checkup.', 'Patient-1', '2015-03-24 12:39:06', '2015-03-27 12:50:22'),
(2, 'Muhammad Ali', '1998-01-01', 'Male', 17, 'ali@gmail.com', 'Lahore', 'Pakistan', 'DHA', '(0092) 300-4545452', '21121-2121232-1', 'Patient wants detailed checkup routinely. ', 'Patient-2', '2015-03-27 12:51:58', '2015-03-27 12:51:59'),
(5, 'Ayesha Umer', '1994-02-01', 'Female', 21, 'ayesha@gmail.com', 'Lahore', 'Armenia', 'DHA', '(2323) 233-4434545', '54354-3532235-3', 'N/A', 'Patient-5', '2015-03-27 13:45:58', '2015-03-27 13:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
`id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medicines` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `code`, `medicines`, `note`, `patient_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(3, '123456', 'Panadol CF - 2 tablets a day.\r Ponston - 3 tablets a day.', 'Take all the aforementioned medicines till 10 day regularly.', 1, 1, '2015-03-24 13:15:28', '2015-03-24 13:15:28'),
(4, '222233', 'Ponstron - 2 times a day.\r\nRelaxin - 3 times a day.\r\nPanadol CF - 3 times a day.\r\n', 'Take all medicines regularly and come back for checkup after 10 days.', 1, 2, '2015-03-24 13:16:30', '2015-03-24 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `previousdiseases`
--

CREATE TABLE IF NOT EXISTS `previousdiseases` (
`id` int(10) unsigned NOT NULL,
  `disease_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disease_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `previousdiseases`
--

INSERT INTO `previousdiseases` (`id`, `disease_name`, `disease_notes`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 'Maleria', 'The patient was suffered by maleria in year 2005.', '2015-03-25 02:06:20', '2015-03-25 02:06:20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `surgicalhistories`
--

CREATE TABLE IF NOT EXISTS `surgicalhistories` (
`id` int(10) unsigned NOT NULL,
  `surgery_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surgery_date` date NOT NULL,
  `surgery_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surgicalhistories`
--

INSERT INTO `surgicalhistories` (`id`, `surgery_name`, `surgery_date`, `surgery_notes`, `created_at`, `updated_at`, `patient_id`) VALUES
(1, 'Skin Surgery', '2000-01-01', 'Patient faces skin problem in year 2000.', '2015-03-25 01:55:20', '2015-03-25 01:55:20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testfees`
--

CREATE TABLE IF NOT EXISTS `testfees` (
`id` int(10) unsigned NOT NULL,
  `test_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE IF NOT EXISTS `timeslots` (
`id` int(10) unsigned NOT NULL,
  `slot` time NOT NULL,
  `reserved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dutyday_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `slot`, `reserved`, `dutyday_id`, `created_at`, `updated_at`) VALUES
(1, '11:00:00', 'No', 2, '2015-03-24 12:40:27', '2015-03-24 12:40:27'),
(2, '11:15:00', 'No', 2, '2015-03-24 12:40:27', '2015-03-24 12:40:27'),
(3, '11:30:00', 'No', 2, '2015-03-24 12:40:27', '2015-03-24 12:40:27'),
(4, '11:45:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(5, '12:00:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(6, '12:15:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(7, '12:30:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(8, '12:45:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(9, '13:00:00', 'No', 2, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(10, '13:00:00', 'No', 7, '2015-03-24 12:40:28', '2015-03-24 12:40:28'),
(11, '13:15:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(12, '13:30:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(13, '13:45:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(14, '14:00:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(15, '14:15:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(16, '14:30:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(17, '14:45:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29'),
(18, '15:00:00', 'No', 7, '2015-03-24 12:40:29', '2015-03-24 12:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `vitalsigns`
--

CREATE TABLE IF NOT EXISTS `vitalsigns` (
`id` int(10) unsigned NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp_systolic` int(11) NOT NULL,
  `bp_systolic_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bp_diastolic` int(11) NOT NULL,
  `bp_diastolic_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pulse_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pulse_rate_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `respiration_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `respiration_rate_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temprature` int(11) NOT NULL,
  `temprature_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `appointment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vitalsigns`
--

INSERT INTO `vitalsigns` (`id`, `weight`, `weight_unit`, `height`, `height_unit`, `bp_systolic`, `bp_systolic_unit`, `bp_diastolic`, `bp_diastolic_unit`, `blood_group`, `pulse_rate`, `pulse_rate_unit`, `respiration_rate`, `respiration_rate_unit`, `temprature`, `temprature_unit`, `note`, `patient_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, '50', 'kg', '20', 'cm', 90, 'mmHg', 120, 'mmHg', 'AB+', '50', 'per min', '40', 'per min', 100, 'F', 'Patient health is in good condition.', '1', '1', '2015-03-24 14:05:38', '2015-03-24 14:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkupfees`
--
ALTER TABLE `checkupfees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagonosticprocedures`
--
ALTER TABLE `diagonosticprocedures`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugusages`
--
ALTER TABLE `drugusages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dutydays`
--
ALTER TABLE `dutydays`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `familyhistories`
--
ALTER TABLE `familyhistories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previousdiseases`
--
ALTER TABLE `previousdiseases`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgicalhistories`
--
ALTER TABLE `surgicalhistories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testfees`
--
ALTER TABLE `testfees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `checkupfees`
--
ALTER TABLE `checkupfees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `diagonosticprocedures`
--
ALTER TABLE `diagonosticprocedures`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drugusages`
--
ALTER TABLE `drugusages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dutydays`
--
ALTER TABLE `dutydays`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `familyhistories`
--
ALTER TABLE `familyhistories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `previousdiseases`
--
ALTER TABLE `previousdiseases`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surgicalhistories`
--
ALTER TABLE `surgicalhistories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testfees`
--
ALTER TABLE `testfees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `vitalsigns`
--
ALTER TABLE `vitalsigns`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
