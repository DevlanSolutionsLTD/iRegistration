-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 10:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iRegistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `auth_id` varchar(200) NOT NULL,
  `auth_permission` int(20) NOT NULL,
  `auth_email` varchar(200) NOT NULL,
  `auth_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`auth_id`, `auth_permission`, `auth_email`, `auth_password`, `created_at`) VALUES
('a69681bcf334ae130217fea4505fd3c994f5683f', 1, 'sysadmin@mail.com', 'adcd7048512e64b48da55b027577886ee5a36350', '2021-01-18 06:15:18.770217');

-- --------------------------------------------------------

--
-- Table structure for table `births_registration`
--

CREATE TABLE `births_registration` (
  `id` varchar(200) NOT NULL,
  `registrar_id` varchar(200) NOT NULL,
  `registrar_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `fathers_name` varchar(200) NOT NULL,
  `mothers_name` varchar(200) NOT NULL,
  `place_of_birth` varchar(200) NOT NULL,
  `month_reg` varchar(200) NOT NULL,
  `year_reg` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deaths_registration`
--

CREATE TABLE `deaths_registration` (
  `id` varchar(200) NOT NULL,
  `registrar_id` varchar(200) NOT NULL,
  `registrar_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `place_of_death` varchar(200) NOT NULL,
  `tribe` varchar(200) NOT NULL,
  `month_reg` varchar(200) NOT NULL,
  `year_reg` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(200) NOT NULL,
  `auth_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `national_idno` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `auth_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `auth_id`, `name`, `national_idno`, `phone`, `email`, `addr`, `sex`, `created_at`, `updated_at`, `auth_status`) VALUES
('3b5994489b47efaad5243e64c287fb480f6badb462', '', 'Registrar 1', '127001', '+25412896442', 'reg1@iregistration.org', '127 Localhost', 'Male', '18 Jan 2021', '', ''),
('c76daa9fadc4b42551bb52ebd399916edfe554fa', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'System Administrator', '127992', '+3548995432', 'sysadmin@mail.com', '239-9-9 Localhost', 'Male', '12 Dec 2020', '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `births_registration`
--
ALTER TABLE `births_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrar_id` (`registrar_id`);

--
-- Indexes for table `deaths_registration`
--
ALTER TABLE `deaths_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_id` (`auth_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `births_registration`
--
ALTER TABLE `births_registration`
  ADD CONSTRAINT `RegistrarConsrait` FOREIGN KEY (`registrar_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
