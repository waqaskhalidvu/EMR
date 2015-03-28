-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 10:24 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `email`, `gender`, `age`, `city`, `country`, `address`, `phone`, `cnic`, `branch`, `note`, `status`, `role`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Shah', '$2y$10$Nedl8PiipSS9FewHxYwAhOjSFdn0eiFO0AIDjf2Y1CqCZk5vmiAmG', 'admin@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Administrator', '2015-03-28 02:28:03', '2015-03-28 02:28:03', NULL),
(2, 'Ali', '$2y$10$ZYZDIrcBCaY0tUaeAiLXBOpevaZdfrt.NoUcv6y.FX/PUrnNMfWf.', 'doctor@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Doctor', '2015-03-28 02:28:03', '2015-03-28 02:28:03', NULL),
(3, 'Umer', '$2y$10$FDNTeNQkrmX6Ncz4xTLN6OaW1EQB5a3KtYiqzjOg5k.ITDyMSd9pO', 'accountant@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Accountant', '2015-03-28 02:28:04', '2015-03-28 02:28:04', NULL),
(4, 'Talal', '$2y$10$WbpVP3HDaLwj3sQULwf1NeoKVpk1Svf1wOhB.qmeP6/qL5KQlcHFi', 'receptionist@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Receptionist', '2015-03-28 02:28:04', '2015-03-28 02:28:04', NULL),
(5, 'Aqeel', '$2y$10$1YiyhtB282jdBpLFOB7/reOwnFrUyhBMifWVKed.p.ArFAxe1h0ra', 'lab@gmail.com', 'Male', 23, 'Lahore', 'Pakistan', '10 Down Street', '03344050495', '1234679', 'DHA', 'MBBS Qualified', 'Active', 'Lab Manager', '2015-03-28 02:28:04', '2015-03-28 02:28:04', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `gender`, `age`, `email`, `city`, `country`, `address`, `phone`, `cnic`, `note`, `patient_id`, `created_at`, `updated_at`) VALUES
(1, 'Fahad Ali', '2000-01-01', 'Male', 15, 'rock.star9722@gmail.com', 'Lahore', 'Pakistan', 'DHA', '(0092) 334-4050495', '12321-3213123-1', 'Patient want detailed checkup periodically and much careful regarding his health. But usually prefer the traditional way of cure.', 'Patient-1', '2015-03-28 02:31:19', '2015-03-28 02:31:20'),
(2, 'Ayesha Umer', '2010-02-02', 'Female', 5, 'ayesha@gmail.com', 'New York', 'United States', 'DHA', '(0092) 455-4544545', '23432-4234234-2', 'Patient is came from United States of America and wants the standard medical treatment that must be replica of the US.', 'Patient-2', '2015-03-28 02:34:23', '2015-03-28 02:34:24');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `checkupfees`
--
ALTER TABLE `checkupfees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagonosticprocedures`
--
ALTER TABLE `diagonosticprocedures`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drugusages`
--
ALTER TABLE `drugusages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dutydays`
--
ALTER TABLE `dutydays`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `familyhistories`
--
ALTER TABLE `familyhistories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `previousdiseases`
--
ALTER TABLE `previousdiseases`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surgicalhistories`
--
ALTER TABLE `surgicalhistories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
