-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2015 at 08:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `allergy_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `allergy_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `checkup_reason`, `date`, `time`, `status`, `checkup_fee`, `fee_note`, `timeslot_id`, `employee_id`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, '', '2015-02-02', '13:00:00', '0', 0, '', 1, 2, 1, '2015-02-27 11:45:15', '2015-02-27 11:45:15'),
(2, 'Patient has a sever pain in his backbone.', '2015-02-09', '13:00:00', '0', 0, '', 1, 2, 1, '2015-02-27 13:57:24', '2015-02-27 13:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `checkupfees`
--

CREATE TABLE IF NOT EXISTS `checkupfees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `checkup_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `diagonosticprocedures`
--

CREATE TABLE IF NOT EXISTS `diagonosticprocedures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `procedure_note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `drugusages`
--

CREATE TABLE IF NOT EXISTS `drugusages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `drug_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usage_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dutydays`
--

CREATE TABLE IF NOT EXISTS `dutydays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dutydays`
--

INSERT INTO `dutydays` (`id`, `day`, `start`, `end`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 2, '2015-02-27 11:43:26', '2015-02-27 11:43:26'),
(2, 'Monday', '13:00:00', '15:00:00', 2, '2015-02-27 11:43:26', '2015-02-27 11:43:26'),
(3, NULL, NULL, NULL, 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28'),
(4, NULL, NULL, NULL, 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28'),
(5, NULL, NULL, NULL, 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28'),
(6, NULL, NULL, NULL, 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28'),
(7, NULL, NULL, NULL, 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `email`, `gender`, `age`, `city`, `country`, `address`, `phone`, `cnic`, `branch`, `note`, `status`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Shah', '$2y$10$Mi.pbu22u0pWwvTle5PGpO52zP4Jle6WLm/8gvRZ8gC.0hR77MNte', 'admin@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Administrator', '2015-02-27 11:42:55', '2015-02-27 11:42:55', NULL),
(2, 'Ali', '$2y$10$PkcLWLUCLOapVtBPBUBMwOiyTwC2cLCVAjkseAYXDgPLYeqtKYi1C', 'doctor@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Doctor', '2015-02-27 11:42:55', '2015-02-27 11:42:55', NULL),
(3, 'Umer', '$2y$10$WwYSBjw45E/.zi2y.5PLquP7mgZe4DuZ0gjNcQLEU26nuYNvqR/Km', 'accountant@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Accountant', '2015-02-27 11:42:55', '2015-02-27 11:42:55', NULL),
(4, 'Talal', '$2y$10$5hN.amdSKJOoiEIzO4mbqOTeITekNJRMrmebMdEz1GmiEBLQvLAte', 'receptionist@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Receptionist', '2015-02-27 11:42:56', '2015-02-27 11:42:56', NULL),
(5, 'Aqeel', '$2y$10$khlEkdoBjcltb321/QUC5.ihoYjMenCV0Cg2tX0vESLX18MmwfM36', 'lab@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Lab Manager', '2015-02-27 11:42:56', '2015-02-27 11:42:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `familyhistories`
--

CREATE TABLE IF NOT EXISTS `familyhistories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patient_relation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `diesease_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE IF NOT EXISTS `labtests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_description` text COLLATE utf8_unicode_ci NOT NULL,
  `total_fee` double NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `test_results` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `gender`, `age`, `email`, `city`, `country`, `address`, `phone`, `cnic`, `note`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Fahad Ali', '2010-01-01', 'Male', 5, 'rock.star9722@gmail.com', 'Lahore', 'Pakistan', 'DHA', '03344050495', '3520241581375', 'More susceptible to health. ', 'Patient-1', '2015-02-27 11:44:48', '2015-02-27 11:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medicines` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `previousdiseases`
--

CREATE TABLE IF NOT EXISTS `previousdiseases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disease_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surgicalhistories`
--

CREATE TABLE IF NOT EXISTS `surgicalhistories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surgery_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surgery_date` date NOT NULL,
  `surgery_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testfees`
--

CREATE TABLE IF NOT EXISTS `testfees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE IF NOT EXISTS `timeslots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slot` time NOT NULL,
  `reserved` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dutyday_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `slot`, `reserved`, `dutyday_id`, `created_at`, `updated_at`) VALUES
(1, '13:00:00', 'No', 2, '2015-02-27 11:43:26', '2015-02-27 11:43:27'),
(2, '13:15:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(3, '13:30:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(4, '13:45:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(5, '14:00:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(6, '14:15:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(7, '14:30:00', 'No', 2, '2015-02-27 11:43:27', '2015-02-27 11:43:27'),
(8, '14:45:00', 'No', 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28'),
(9, '15:00:00', 'No', 2, '2015-02-27 11:43:28', '2015-02-27 11:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `vitalsigns`
--

CREATE TABLE IF NOT EXISTS `vitalsigns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
