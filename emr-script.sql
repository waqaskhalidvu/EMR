-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2015 at 05:17 PM
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
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkup_fee` double NOT NULL,
  `fee_note` text COLLATE utf8_unicode_ci NOT NULL,
  `timeslot_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `email`, `gender`, `age`, `city`, `country`, `address`, `phone`, `cnic`, `branch`, `note`, `status`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Shah', '$2y$10$6Rt5ASqHqPDjgAfvCTuzmeUVquWYEZk7pCAsuQNMy9P8H7HBmLx2u', 'admin@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Administrator', '2015-02-27 00:46:30', '2015-02-27 00:46:30', NULL),
(2, 'Ali', '$2y$10$mAVmk5XLKirOasKDzRYNc.UI95clYvv.o7GY3OkDmZTK2Spvc9Hfm', 'doctor@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Doctor', '2015-02-27 00:46:30', '2015-02-27 00:46:30', NULL),
(3, 'Umer', '$2y$10$QgkZr0sDvzrdOKC7q87NWO6IREjnoGlaoQY5PpsSFxInk/1kK2Kgy', 'accountant@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Accountant', '2015-02-27 00:46:31', '2015-02-27 00:46:31', NULL),
(4, 'Talal', '$2y$10$3p64eiMAqjJ4N797KO/REOYRvTC/rbBAGZMAlXxl9H4gNdpAAswa.', 'receptionist@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Receptionist', '2015-02-27 00:46:31', '2015-02-27 00:46:31', NULL),
(5, 'Aqeel', '$2y$10$9kWCf98M3C6ljz22V22voO9fYyiDMj5LW5F7ZHgOjVMx1X06MWSoy', 'lab@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Lab Manager', '2015-02-27 00:46:31', '2015-02-27 00:46:31', NULL),
(6, 'Fahad Ali', '$2y$10$VxE5NVb0IzfO22xho4uMz.9aK7a7OM4aOX9fE0XUaUF0ZY/eTJ3p2', 'bc100402138@vu.edu.pk', 'Male', 23, 'Lahore', 'Pakistan', '139 lahore', '092033365458833', '332232322323', 'N/A', 'A physician is a professional who practices medicine, which is concerned with promoting, maintaining or restoring human health through the study, diagnosis, and treatment of disease, injury, and other physical and mental impairments. They may focus their practice on certain disease categories, types of patients, or methods of treatment – known as specialist medical practitioners – or assume responsibility for the provision of continuing and comprehensive medical care to individuals, families, and communities.', 'Active', 'Doctor', '2015-02-27 02:33:04', '2015-02-27 02:35:39', NULL);

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
('2015_02_14_110516_create_dutydays_table', 2),
('2015_02_14_111359_create_timeslots_table', 2),
('2015_02_17_060819_create_labtests_table', 2),
('2015_02_17_080659_create_appointments_table', 2),
('2015_02_18_064352_create_prescriptions_table', 2),
('2015_02_19_192700_create_password_reminders_table', 2),
('2015_02_21_053340_create_checkupfees_table', 2),
('2015_02_21_053926_create_testfees_table', 2);

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
(1, 'Ahmed Raza', '2000-01-01', 'Male', 15, 'rock.star9722@gmail.com', 'Lahore', 'Pakistan', 'DHA, Phase 5', '03344050495', '2323234434', 'Patient has much conscious about his health. So treat the patient with much care in the inpatient ward of the hospital. ', 'Patient-1', '2015-02-27 02:23:20', '2015-02-27 02:27:13');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'fahad', '123456');
--
-- Database: `prayerlogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarms`
--

CREATE TABLE IF NOT EXISTS `alarms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prayer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `repeat` tinyint(1) NOT NULL,
  `repeat_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
('2015_01_28_113736_create_prayerlogs_table', 1),
('2015_01_28_122036_create_users_table', 1),
('2015_01_28_133551_create_mosques_table', 1),
('2015_01_28_135523_create_alarms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mosques`
--

CREATE TABLE IF NOT EXISTS `mosques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mosque_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prayerlogs`
--

CREATE TABLE IF NOT EXISTS `prayerlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offered` tinyint(1) NOT NULL,
  `prayer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prayer_date` date NOT NULL,
  `prayer_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offered_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acctive` tinyint(1) NOT NULL,
  `calculation_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `juristic_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
