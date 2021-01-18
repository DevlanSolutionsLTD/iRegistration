-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 12:22 PM
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
('3b5994489b47efaad5243e64c287fb480f6badb129', '', 'Registrar 002', '127654290', '740847563', 'reg002@iregstration.org', '90125 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb130', '', 'Registrar 003', '127654291', '740847564', 'reg003@iregstration.org', '90126 Machakos', 'Male', '01/19/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb131', '', 'Registrar 004', '127654292', '740847565', 'reg004@iregstration.org', '90127 Machakos', 'Male', '01/20/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb132', '', 'Registrar 005', '127654293', '740847566', 'reg005@iregstration.org', '90128 Machakos', 'Male', '01/21/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb133', '', 'Registrar 006', '127654294', '740847567', 'reg006@iregstration.org', '90129 Machakos', 'Male', '01/22/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb134', '', 'Registrar 007', '127654295', '740847568', 'reg007@iregstration.org', '90130 Machakos', 'Male', '01/23/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb135', '', 'Registrar 008', '127654296', '740847569', 'reg008@iregstration.org', '90131 Machakos', 'Male', '01/24/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb136', '', 'Registrar 009', '127654297', '740847570', 'reg009@iregstration.org', '90132 Machakos', 'Male', '01/25/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb137', '', 'Registrar 010', '127654298', '740847571', 'reg010@iregstration.org', '90133 Machakos', 'Male', '01/26/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb138', '', 'Registrar 011', '127654299', '740847572', 'reg011@iregstration.org', '90134 Machakos', 'Male', '01/27/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb139', '', 'Registrar 012', '127654300', '740847573', 'reg012@iregstration.org', '90135 Machakos', 'Male', '01/28/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb140', '', 'Registrar 013', '127654301', '740847574', 'reg013@iregstration.org', '90136 Machakos', 'Male', '01/29/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb141', '', 'Registrar 014', '127654302', '740847575', 'reg014@iregstration.org', '90137 Machakos', 'Male', '01/30/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb142', '', 'Registrar 015', '127654303', '740847576', 'reg015@iregstration.org', '90138 Machakos', 'Male', '01/31/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb143', '', 'Registrar 016', '127654304', '740847577', 'reg016@iregstration.org', '90139 Machakos', 'Male', '02/01/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb144', '', 'Registrar 017', '127654305', '740847578', 'reg017@iregstration.org', '90140 Machakos', 'Male', '02/02/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb145', '', 'Registrar 018', '127654306', '740847579', 'reg018@iregstration.org', '90141 Machakos', 'Male', '02/03/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb146', '', 'Registrar 019', '127654307', '740847580', 'reg019@iregstration.org', '90142 Machakos', 'Female', '02/04/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb147', '', 'Registrar 020', '127654308', '740847581', 'reg020@iregstration.org', '90143 Machakos', 'Female', '02/05/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb148', '', 'Registrar 021', '127654309', '740847582', 'reg021@iregstration.org', '90144 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb149', '', 'Registrar 022', '127654310', '740847583', 'reg022@iregstration.org', '90145 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb150', '', 'Registrar 023', '127654311', '740847584', 'reg023@iregstration.org', '90146 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb151', '', 'Registrar 024', '127654312', '740847585', 'reg024@iregstration.org', '90147 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb152', '', 'Registrar 025', '127654313', '740847586', 'reg025@iregstration.org', '90148 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb153', '', 'Registrar 026', '127654314', '740847587', 'reg026@iregstration.org', '90149 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb154', '', 'Registrar 027', '127654315', '740847588', 'reg027@iregstration.org', '90150 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb155', '', 'Registrar 028', '127654316', '740847589', 'reg028@iregstration.org', '90151 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb156', '', 'Registrar 029', '127654317', '740847590', 'reg029@iregstration.org', '90152 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb157', '', 'Registrar 030', '127654318', '740847591', 'reg030@iregstration.org', '90153 Makueni ', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb158', '', 'Registrar 031', '127654319', '740847592', 'reg031@iregstration.org', '90154 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb159', '', 'Registrar 032', '127654320', '740847593', 'reg032@iregstration.org', '90155 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb160', '', 'Registrar 033', '127654321', '740847594', 'reg033@iregstration.org', '90156 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb161', '', 'Registrar 034', '127654322', '740847595', 'reg034@iregstration.org', '90157 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb162', '', 'Registrar 035', '127654323', '740847596', 'reg035@iregstration.org', '90158 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb163', '', 'Registrar 036', '127654324', '740847597', 'reg036@iregstration.org', '90159 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb164', '', 'Registrar 037', '127654325', '740847598', 'reg037@iregstration.org', '90160 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb165', '', 'Registrar 038', '127654326', '740847599', 'reg038@iregstration.org', '90161 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb166', '', 'Registrar 039', '127654327', '740847600', 'reg039@iregstration.org', '90162 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb167', '', 'Registrar 040', '127654328', '740847601', 'reg040@iregstration.org', '90163 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb168', '', 'Registrar 041', '127654329', '740847602', 'reg041@iregstration.org', '90164 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb169', '', 'Registrar 042', '127654330', '740847603', 'reg042@iregstration.org', '90165 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb170', '', 'Registrar 043', '127654331', '740847604', 'reg043@iregstration.org', '90130 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb171', '', 'Registrar 044', '127654332', '740847605', 'reg044@iregstration.org', '90131 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb172', '', 'Registrar 045', '127654333', '740847606', 'reg045@iregstration.org', '90132 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb173', '', 'Registrar 046', '127654334', '740847607', 'reg046@iregstration.org', '90133 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb174', '', 'Registrar 047', '127654335', '740847608', 'reg047@iregstration.org', '90134 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb175', '', 'Registrar 048', '127654336', '740847609', 'reg048@iregstration.org', '90135 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb176', '', 'Registrar 049', '127654337', '740847610', 'reg049@iregstration.org', '90136 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb177', '', 'Registrar 050', '127654338', '740847611', 'reg050@iregstration.org', '90137 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb178', '', 'Registrar 051', '127654339', '740847612', 'reg051@iregstration.org', '90138 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb179', '', 'Registrar 052', '127654340', '740847613', 'reg052@iregstration.org', '90139 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb180', '', 'Registrar 053', '127654341', '740847614', 'reg053@iregstration.org', '90140 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb181', '', 'Registrar 054', '127654342', '740847615', 'reg054@iregstration.org', '90141 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb182', '', 'Registrar 055', '127654343', '740847616', 'reg055@iregstration.org', '90142 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb183', '', 'Registrar 056', '127654344', '740847617', 'reg056@iregstration.org', '90143 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb184', '', 'Registrar 057', '127654345', '740847618', 'reg057@iregstration.org', '90144 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb185', '', 'Registrar 058', '127654346', '740847619', 'reg058@iregstration.org', '90145 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb186', '', 'Registrar 059', '127654347', '740847620', 'reg059@iregstration.org', '90146 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb187', '', 'Registrar 060', '127654348', '740847621', 'reg060@iregstration.org', '90147 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb188', '', 'Registrar 061', '127654349', '740847622', 'reg061@iregstration.org', '90148 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb189', '', 'Registrar 062', '127654350', '740847623', 'reg062@iregstration.org', '90149 Machakos', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb190', '', 'Registrar 063', '127654351', '740847624', 'reg063@iregstration.org', '90150 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb191', '', 'Registrar 064', '127654352', '740847625', 'reg064@iregstration.org', '90151 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb192', '', 'Registrar 065', '127654353', '740847626', 'reg065@iregstration.org', '90152 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb193', '', 'Registrar 066', '127654354', '740847627', 'reg066@iregstration.org', '90153 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb194', '', 'Registrar 067', '127654355', '740847628', 'reg067@iregstration.org', '90154 Machakos', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb195', '', 'Registrar 068', '127654356', '740847629', 'reg068@iregstration.org', '90160 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb196', '', 'Registrar 069', '127654357', '740847630', 'reg069@iregstration.org', '90161 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb197', '', 'Registrar 070', '127654358', '740847631', 'reg070@iregstration.org', '90162 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb198', '', 'Registrar 071', '127654359', '740847632', 'reg071@iregstration.org', '90163 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb199', '', 'Registrar 072', '127654360', '740847633', 'reg072@iregstration.org', '90164 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb200', '', 'Registrar 073', '127654361', '740847634', 'reg073@iregstration.org', '90165 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb201', '', 'Registrar 074', '127654362', '740847635', 'reg074@iregstration.org', '90166 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb202', '', 'Registrar 075', '127654363', '740847636', 'reg075@iregstration.org', '90167 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb203', '', 'Registrar 076', '127654364', '740847637', 'reg076@iregstration.org', '90168 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb204', '', 'Registrar 077', '127654365', '740847638', 'reg077@iregstration.org', '90169 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb205', '', 'Registrar 078', '127654366', '740847639', 'reg078@iregstration.org', '90170 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb206', '', 'Registrar 079', '127654367', '740847640', 'reg079@iregstration.org', '90171 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb207', '', 'Registrar 080', '127654368', '740847641', 'reg080@iregstration.org', '90172 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb208', '', 'Registrar 081', '127654369', '740847642', 'reg081@iregstration.org', '90173 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb209', '', 'Registrar 082', '127654370', '740847643', 'reg082@iregstration.org', '90174 Makueni', 'Male', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb210', '', 'Registrar 083', '127654371', '740847644', 'reg083@iregstration.org', '90175 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb211', '', 'Registrar 084', '127654372', '740847645', 'reg084@iregstration.org', '90156 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb212', '', 'Registrar 085', '127654373', '740847646', 'reg085@iregstration.org', '90157 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb213', '', 'Registrar 086', '127654374', '740847647', 'reg086@iregstration.org', '90158 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb214', '', 'Registrar 087', '127654375', '740847648', 'reg087@iregstration.org', '90159 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb215', '', 'Registrar 088', '127654376', '740847649', 'reg088@iregstration.org', '90160 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb216', '', 'Registrar 089', '127654377', '740847650', 'reg089@iregstration.org', '90161 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb217', '', 'Registrar 090', '127654378', '740847651', 'reg090@iregstration.org', '90162 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb218', '', 'Registrar 091', '127654379', '740847652', 'reg091@iregstration.org', '90163 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb219', '', 'Registrar 092', '127654380', '740847653', 'reg092@iregstration.org', '90164 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb220', '', 'Registrar 093', '127654381', '740847654', 'reg093@iregstration.org', '90165 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb221', '', 'Registrar 094', '127654382', '740847655', 'reg094@iregstration.org', '90166 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb222', '', 'Registrar 095', '127654383', '740847656', 'reg095@iregstration.org', '90167 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb223', '', 'Registrar 096', '127654384', '740847657', 'reg096@iregstration.org', '90168 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb224', '', 'Registrar 097', '127654385', '740847658', 'reg097@iregstration.org', '90169 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb225', '', 'Registrar 098', '127654386', '740847659', 'reg098@iregstration.org', '90170 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb226', '', 'Registrar 099', '127654387', '740847660', 'reg099@iregstration.org', '90171 Makueni', 'Female', '01/18/21', '', ''),
('3b5994489b47efaad5243e64c287fb480f6badb227', '', 'Registrar 100', '127654388', '740847661', 'reg100@iregstration.org', '90172 Makueni', 'Male', '01/18/21', '18 Jan 2021', ''),
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
  ADD PRIMARY KEY (`id`);

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
