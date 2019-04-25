-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 10:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesstypes`
--

CREATE TABLE `businesstypes` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `businesses_no` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesstypes`
--

INSERT INTO `businesstypes` (`id`, `name`, `businesses_no`, `datecreated`) VALUES
(1, 'COMPANY', 0, '2018-10-08 20:26:57'),
(2, 'CORPORATION', 0, '2018-10-08 20:27:49'),
(3, 'PARTNERSHIP', 0, '2018-10-08 20:27:49'),
(4, 'INDIVIDUAL', 0, '2019-04-10 20:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `name` varchar(300) NOT NULL,
  `country_id` int(3) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`name`, `country_id`, `id`) VALUES
('LONDON', 1, 1),
('BIRMINGHAM', 1, 2),
('NAIROBI', 2, 3),
('MOMBASA', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contstr` varchar(5) NOT NULL,
  `contractor_id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(120) NOT NULL,
  `contcut` varchar(30) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contstr`, `contractor_id`, `job_id`, `name`, `description`, `contcut`, `datecreated`, `dateupdated`) VALUES
(1, '', 6, 11, 'PHOTOGRAPHY', 'vgbhnjmk,l', '0.2', '2018-10-22 13:38:33', '2018-10-22 13:38:33'),
(4, 'HLEGN', 11, 16, '    RONIN TEST 4    ', '    THIS IS A RONIN TEST JOB 4..IT IS TO BE USED FOR DEVELOPMENT PURPOSES ONLYY !!!    ', '0.2', '2018-10-22 14:10:41', '2018-10-22 14:10:41'),
(5, 'ZU3QP', 11, 17, '   A GOOD JOB   ', '    THIS IS A RONIN TEST JOB 5 ..USE FOR DEVELOPMENT PURPOSES ONLY    ', '0.2', '2018-10-23 11:39:13', '2018-10-23 11:39:13'),
(6, '218JV', 11, 20, '    RONIN TEST 9    ', '    THIS IS RONIN TEST 9 JOB..USED TO TEST THE JOB LINK DISPLAY ON  NOTIFICATIONS    ', '4000', '2018-10-25 05:53:54', '2018-10-25 05:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `name` varchar(30) NOT NULL,
  `telcode` varchar(4) NOT NULL,
  `image` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`name`, `telcode`, `image`, `id`) VALUES
('United Kingdom', '+44', 'uk.jpg', 1),
('Republic of Kenya', '+254', 'kicon.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

CREATE TABLE `hired` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `hiredate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employerid` int(11) NOT NULL,
  `checkedin` int(1) NOT NULL DEFAULT '0',
  `rated` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hired`
--

INSERT INTO `hired` (`id`, `jobid`, `employeeid`, `completed`, `hiredate`, `employerid`, `checkedin`, `rated`) VALUES
(3, 1, 14, 1, '2019-04-12 15:36:26', 15, 0, 0),
(4, 1, 17, 1, '2019-04-12 15:36:27', 15, 0, 0),
(5, 2, 18, 1, '2019-04-14 05:10:27', 15, 0, 0),
(6, 2, 14, 1, '2019-04-15 07:40:28', 15, 1, 1),
(7, 3, 18, 1, '2019-04-14 05:48:45', 15, 0, 0),
(8, 3, 17, 1, '2019-04-14 05:48:42', 15, 0, 0),
(9, 4, 18, 1, '2019-04-14 05:54:18', 15, 0, 0),
(10, 4, 17, 1, '2019-04-14 05:54:16', 15, 0, 0),
(11, 5, 18, 1, '2019-04-14 05:57:20', 15, 0, 0),
(12, 6, 18, 0, '2019-04-14 05:58:41', 15, 0, 0),
(13, 6, 17, 0, '2019-04-14 05:58:59', 15, 0, 0),
(14, 6, 14, 0, '2019-04-14 11:27:35', 15, 0, 0),
(15, 7, 17, 1, '2019-04-14 17:31:38', 19, 0, 0),
(16, 7, 18, 1, '2019-04-14 17:31:42', 19, 1, 0),
(17, 7, 14, 1, '2019-04-14 17:31:34', 19, 0, 0),
(18, 8, 18, 0, '2019-04-14 17:59:57', 19, 1, 0),
(19, 8, 14, 0, '2019-04-14 19:23:29', 19, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `jobs` int(3) NOT NULL,
  `id` int(11) NOT NULL,
  `createdby` int(4) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`name`, `description`, `jobs`, `id`, `createdby`, `createdon`) VALUES
('FOOD CROPS e.g maize', 'E. MAIZE', 0, 16, 0, '2019-04-25 18:53:31'),
('CASH CROP e.g coffe', 'e.g coffee', 0, 17, 0, '2019-04-25 18:54:03'),
('FRUITS & VEGETABLES', 'e.g mango', 0, 18, 0, '2019-04-25 18:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `uniquestr` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cimage` varchar(80) NOT NULL,
  `pay_amount` int(20) NOT NULL,
  `pay_per` varchar(10) NOT NULL,
  `pay_currency` varchar(10) NOT NULL,
  `invoicecycle` varchar(25) NOT NULL,
  `vacancies` int(3) NOT NULL,
  `duration` int(6) NOT NULL,
  `industry` varchar(10) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `job_lat` varchar(30) NOT NULL,
  `job_long` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `live` int(1) NOT NULL DEFAULT '1',
  `active` int(1) NOT NULL DEFAULT '0',
  `completed` int(1) NOT NULL DEFAULT '0',
  `edit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `startdate` int(25) NOT NULL,
  `rating` int(11) NOT NULL,
  `enddate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uniquestr`, `name`, `title`, `description`, `cimage`, `pay_amount`, `pay_per`, `pay_currency`, `invoicecycle`, `vacancies`, `duration`, `industry`, `skills`, `job_lat`, `job_long`, `city`, `country`, `posted_by`, `verified`, `live`, `active`, `completed`, `edit_date`, `post_date`, `startdate`, `rating`, `enddate`) VALUES
(1, 'YGE4CR', 'COMPUTER FIXING', '', 'I NEED MY COMPUTER FIXED..FAST', '', 1000, 'HOUR', '    Kshs', '', 1, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.284994', '36.889132499999995', '    Nairobi', 'Kenya', 15, 0, 1, 0, 1, '2019-04-12 15:36:26', '2019-04-12 12:49:01', 1555083299, 4, 1555083386),
(2, '7TMGOD', 'TEST JOB', '', 'TEST JOB', '', 1000, 'HOUR', '    Kshs', '', 4, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 15, 0, 1, 0, 1, '2019-04-14 05:10:24', '2019-04-13 19:29:45', 1555217879, 5, 1555218624),
(3, 'F7485D', 'NEW JOB', '', 'A NEW JOB', '', 1000, 'HOUR', '    Kshs', '', 12, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 15, 0, 1, 0, 1, '2019-04-14 05:48:42', '2019-04-14 05:10:01', 1555219466, 5, 1555220922),
(4, 'SYQRGW', 'timer', '', 'test timer', '', 1000, 'HOUR', '    Kshs', '', 234, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 15, 0, 1, 0, 1, '2019-04-14 05:54:16', '2019-04-14 05:46:58', 2147483647, 4, 1555221256),
(5, 'Y0IW7N', 'gg', '', 'dff', '', 1000, 'HOUR', '    Kshs', '', 343, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 15, 0, 1, 0, 1, '2019-04-14 05:57:20', '2019-04-14 05:53:30', 1555221298, 5, 1555221440),
(6, '5QP07H', 'jjhgfd', '', 'ljkhgf', '', 1000, 'HOUR', '    Kshs', '', 234, 0, '1', 'a:5:{i:0;s:2:\"44\";i:1;s:2:\"45\";i:2;s:2:\"46\";i:3;s:2:\"47\";i:4;s:2:\"48\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 15, 0, 1, 1, 0, '2019-04-14 05:59:08', '2019-04-14 05:57:59', 1555225148, 0, 0),
(7, 'REYC5Z', 'SOFTWARE INSTALLATION', '', 'I BNEDED HBHBCBDHC', '', 500, 'DAY', '    Kshs', '', 23, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 19, 0, 1, 0, 1, '2019-04-14 17:31:34', '2019-04-14 14:30:21', 1555264895, 5, 1555263094),
(8, 'M2CRHI', 'nttt', '', 'nttt', '', 1000, 'DAY', '    Kshs', '', 4, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2824849999999999', '36.8842066', '    Nairobi', 'Kenya', 19, 0, 1, 0, 0, '2019-04-14 17:56:37', '2019-04-14 17:56:37', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_contractors`
--

CREATE TABLE `job_contractors` (
  `jobcont_id` int(11) NOT NULL,
  `jobstr` varchar(6) NOT NULL,
  `client_id` int(3) NOT NULL,
  `contractor_id` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_proposed`
--

CREATE TABLE `job_proposed` (
  `id` int(11) NOT NULL,
  `job_id` int(3) NOT NULL,
  `staff_id` int(3) NOT NULL,
  `contractor_id` int(3) NOT NULL,
  `contractstr` varchar(5) NOT NULL,
  `skillscore` int(3) NOT NULL,
  `hired` int(1) NOT NULL,
  `completed` int(1) NOT NULL,
  `hiredate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_proposed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` int(11) NOT NULL,
  `jobstr` varchar(6) NOT NULL,
  `client_id` int(3) NOT NULL,
  `skill_id` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `jobstr`, `client_id`, `skill_id`, `datecreated`, `dateupdated`) VALUES
(1, 'YGE4CR', 15, 39, '2019-04-12 12:49:01', '2019-04-12 12:49:01'),
(2, 'YGE4CR', 15, 40, '2019-04-12 12:49:01', '2019-04-12 12:49:01'),
(3, 'YGE4CR', 15, 41, '2019-04-12 12:49:01', '2019-04-12 12:49:01'),
(4, 'YGE4CR', 15, 42, '2019-04-12 12:49:01', '2019-04-12 12:49:01'),
(5, 'YGE4CR', 15, 43, '2019-04-12 12:49:01', '2019-04-12 12:49:01'),
(6, '7TMGOD', 15, 39, '2019-04-13 19:29:45', '2019-04-13 19:29:45'),
(7, '7TMGOD', 15, 40, '2019-04-13 19:29:45', '2019-04-13 19:29:45'),
(8, '7TMGOD', 15, 41, '2019-04-13 19:29:45', '2019-04-13 19:29:45'),
(9, '7TMGOD', 15, 42, '2019-04-13 19:29:45', '2019-04-13 19:29:45'),
(10, '7TMGOD', 15, 43, '2019-04-13 19:29:45', '2019-04-13 19:29:45'),
(11, 'F7485D', 15, 39, '2019-04-14 05:10:01', '2019-04-14 05:10:01'),
(12, 'F7485D', 15, 40, '2019-04-14 05:10:02', '2019-04-14 05:10:02'),
(13, 'F7485D', 15, 41, '2019-04-14 05:10:02', '2019-04-14 05:10:02'),
(14, 'F7485D', 15, 42, '2019-04-14 05:10:02', '2019-04-14 05:10:02'),
(15, 'F7485D', 15, 43, '2019-04-14 05:10:02', '2019-04-14 05:10:02'),
(16, 'SYQRGW', 15, 39, '2019-04-14 05:46:58', '2019-04-14 05:46:58'),
(17, 'SYQRGW', 15, 40, '2019-04-14 05:46:58', '2019-04-14 05:46:58'),
(18, 'SYQRGW', 15, 41, '2019-04-14 05:46:58', '2019-04-14 05:46:58'),
(19, 'SYQRGW', 15, 42, '2019-04-14 05:46:58', '2019-04-14 05:46:58'),
(20, 'SYQRGW', 15, 43, '2019-04-14 05:46:58', '2019-04-14 05:46:58'),
(21, 'Y0IW7N', 15, 39, '2019-04-14 05:53:30', '2019-04-14 05:53:30'),
(22, 'Y0IW7N', 15, 40, '2019-04-14 05:53:30', '2019-04-14 05:53:30'),
(23, 'Y0IW7N', 15, 41, '2019-04-14 05:53:30', '2019-04-14 05:53:30'),
(24, 'Y0IW7N', 15, 42, '2019-04-14 05:53:30', '2019-04-14 05:53:30'),
(25, 'Y0IW7N', 15, 43, '2019-04-14 05:53:30', '2019-04-14 05:53:30'),
(26, '5QP07H', 15, 44, '2019-04-14 05:57:59', '2019-04-14 05:57:59'),
(27, '5QP07H', 15, 45, '2019-04-14 05:57:59', '2019-04-14 05:57:59'),
(28, '5QP07H', 15, 46, '2019-04-14 05:57:59', '2019-04-14 05:57:59'),
(29, '5QP07H', 15, 47, '2019-04-14 05:57:59', '2019-04-14 05:57:59'),
(30, '5QP07H', 15, 48, '2019-04-14 05:57:59', '2019-04-14 05:57:59'),
(31, 'REYC5Z', 19, 39, '2019-04-14 14:30:22', '2019-04-14 14:30:22'),
(32, 'REYC5Z', 19, 40, '2019-04-14 14:30:22', '2019-04-14 14:30:22'),
(33, 'REYC5Z', 19, 41, '2019-04-14 14:30:22', '2019-04-14 14:30:22'),
(34, 'REYC5Z', 19, 42, '2019-04-14 14:30:22', '2019-04-14 14:30:22'),
(35, 'REYC5Z', 19, 43, '2019-04-14 14:30:23', '2019-04-14 14:30:23'),
(36, 'M2CRHI', 19, 39, '2019-04-14 17:56:37', '2019-04-14 17:56:37'),
(37, 'M2CRHI', 19, 40, '2019-04-14 17:56:38', '2019-04-14 17:56:38'),
(38, 'M2CRHI', 19, 41, '2019-04-14 17:56:38', '2019-04-14 17:56:38'),
(39, 'M2CRHI', 19, 42, '2019-04-14 17:56:38', '2019-04-14 17:56:38'),
(40, 'M2CRHI', 19, 43, '2019-04-14 17:56:38', '2019-04-14 17:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_type` varchar(60) NOT NULL,
  `source_id` int(3) NOT NULL,
  `target_id` int(11) NOT NULL,
  `job_id` varchar(3) NOT NULL,
  `jobstr` varchar(6) NOT NULL,
  `notification_text` varchar(150) NOT NULL,
  `readat` int(20) NOT NULL DEFAULT '0',
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_type`, `source_id`, `target_id`, `job_id`, `jobstr`, `notification_text`, `readat`, `updatedat`, `createdat`) VALUES
(1, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 05:49:34', '2019-04-12 05:49:34'),
(2, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 06:05:50', '2019-04-12 06:05:50'),
(3, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 06:32:18', '2019-04-12 06:32:18'),
(4, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 06:37:04', '2019-04-12 06:37:04'),
(5, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 06:47:46', '2019-04-12 06:47:46'),
(6, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 06:58:57', '2019-04-12 06:58:57'),
(7, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 07:10:01', '2019-04-12 07:10:01'),
(8, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 07:34:21', '2019-04-12 07:34:21'),
(9, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 08:26:20', '2019-04-12 08:26:20'),
(10, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 10:36:19', '2019-04-12 10:36:19'),
(11, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 10:42:30', '2019-04-12 10:42:30'),
(12, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 11:02:50', '2019-04-12 11:02:50'),
(13, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 12:39:54', '2019-04-12 12:39:54'),
(14, 'newjobposted', 15, 14, '', 'YGE4CR', 'Has posted a COMPUTER FIXING job', 1555317091, '2019-04-15 08:31:31', '2019-04-12 12:49:02'),
(15, 'hired', 15, 14, '1', '', 'Has hired you for this job', 1555317091, '2019-04-15 08:31:31', '2019-04-12 14:43:28'),
(16, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-12 15:33:02', '2019-04-12 15:33:02'),
(17, 'hired', 15, 17, '1', '', 'Has hired you for this job', 0, '2019-04-12 15:35:00', '2019-04-12 15:35:00'),
(18, 'job completed', 15, 14, '1', '', 'Has ended this job you were hired for ', 1555317091, '2019-04-15 08:31:31', '2019-04-12 15:36:27'),
(19, 'job completed', 15, 17, '1', '', 'Has ended this job you were hired for ', 0, '2019-04-12 15:36:30', '2019-04-12 15:36:30'),
(20, 'newstaffundercontractor', 0, 0, '', '', 'Has signed up using your contractor id', 0, '2019-04-13 19:15:50', '2019-04-13 19:15:50'),
(21, 'newjobposted', 15, 14, '', '7TMGOD', 'Has posted a TEST JOB job', 1555317091, '2019-04-15 08:31:31', '2019-04-13 19:29:47'),
(22, 'newjobposted', 15, 17, '', '7TMGOD', 'Has posted a TEST JOB job', 0, '2019-04-13 19:29:49', '2019-04-13 19:29:49'),
(23, 'newjobposted', 15, 18, '', '7TMGOD', 'Has posted a TEST JOB job', 1555266879, '2019-04-14 18:34:39', '2019-04-13 19:29:52'),
(24, 'hired', 15, 14, '2', '', 'Has hired you for this job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 04:17:33'),
(25, 'newjobposted', 15, 14, '', 'F7485D', 'Has posted a NEW JOB job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 05:10:03'),
(26, 'newjobposted', 15, 17, '', 'F7485D', 'Has posted a NEW JOB job', 0, '2019-04-14 05:10:05', '2019-04-14 05:10:05'),
(27, 'newjobposted', 15, 18, '', 'F7485D', 'Has posted a NEW JOB job', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:10:06'),
(28, 'job completed', 15, 14, '2', '', 'Has ended this job you were hired for ', 1555317091, '2019-04-15 08:31:31', '2019-04-14 05:10:27'),
(29, 'job completed', 15, 18, '2', '', 'Has ended this job you were hired for ', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:10:29'),
(30, 'newjobposted', 15, 14, '', 'SYQRGW', 'Has posted a timer job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 05:47:00'),
(31, 'newjobposted', 15, 17, '', 'SYQRGW', 'Has posted a timer job', 0, '2019-04-14 05:47:01', '2019-04-14 05:47:01'),
(32, 'newjobposted', 15, 18, '', 'SYQRGW', 'Has posted a timer job', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:47:03'),
(33, 'job completed', 15, 17, '3', '', 'Has ended this job you were hired for ', 0, '2019-04-14 05:48:45', '2019-04-14 05:48:45'),
(34, 'job completed', 15, 18, '3', '', 'Has ended this job you were hired for ', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:48:47'),
(35, 'newjobposted', 15, 14, '', 'Y0IW7N', 'Has posted a gg job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 05:53:31'),
(36, 'newjobposted', 15, 17, '', 'Y0IW7N', 'Has posted a gg job', 0, '2019-04-14 05:53:33', '2019-04-14 05:53:33'),
(37, 'newjobposted', 15, 18, '', 'Y0IW7N', 'Has posted a gg job', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:53:35'),
(38, 'job completed', 15, 17, '4', '', 'Has ended this job you were hired for ', 0, '2019-04-14 05:54:18', '2019-04-14 05:54:18'),
(39, 'job completed', 15, 18, '4', '', 'Has ended this job you were hired for ', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:54:21'),
(40, 'job completed', 15, 18, '5', '', 'Has ended this job you were hired for ', 1555266879, '2019-04-14 18:34:39', '2019-04-14 05:57:22'),
(41, 'newjobposted', 19, 14, '', 'REYC5Z', 'Has posted a SOFTWARE INSTALLATION job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 14:30:25'),
(42, 'newjobposted', 19, 17, '', 'REYC5Z', 'Has posted a SOFTWARE INSTALLATION job', 0, '2019-04-14 14:30:27', '2019-04-14 14:30:27'),
(43, 'newjobposted', 19, 18, '', 'REYC5Z', 'Has posted a SOFTWARE INSTALLATION job', 1555266879, '2019-04-14 18:34:39', '2019-04-14 14:30:29'),
(44, 'job completed', 19, 14, '7', '', 'Has ended this job you were hired for ', 1555317091, '2019-04-15 08:31:31', '2019-04-14 17:31:38'),
(45, 'job completed', 19, 17, '7', '', 'Has ended this job you were hired for ', 0, '2019-04-14 17:31:42', '2019-04-14 17:31:42'),
(46, 'job completed', 19, 18, '7', '', 'Has ended this job you were hired for ', 1555266879, '2019-04-14 18:34:39', '2019-04-14 17:31:45'),
(47, 'newjobposted', 19, 14, '', 'M2CRHI', 'Has posted a nttt job', 1555317091, '2019-04-15 08:31:31', '2019-04-14 17:56:40'),
(48, 'newjobposted', 19, 17, '', 'M2CRHI', 'Has posted a nttt job', 0, '2019-04-14 17:56:43', '2019-04-14 17:56:43'),
(49, 'newjobposted', 19, 18, '', 'M2CRHI', 'Has posted a nttt job', 1555266879, '2019-04-14 18:34:39', '2019-04-14 17:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `pay_periods`
--

CREATE TABLE `pay_periods` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_periods`
--

INSERT INTO `pay_periods` (`id`, `name`, `created_on`, `updated_on`) VALUES
(1, 'KG', '2018-10-14 11:10:29', '2019-04-25 19:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `employee` int(11) NOT NULL,
  `employer` int(11) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`employee`, `employer`, `datecreated`, `id`, `deleted`) VALUES
(18, 15, '2019-04-15 06:25:34', 14, 0),
(18, 19, '2019-04-15 06:25:45', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `name` varchar(20) NOT NULL,
  `industry_id` int(3) NOT NULL,
  `ronins` int(4) NOT NULL,
  `id` int(11) NOT NULL,
  `createdby` int(4) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`name`, `industry_id`, `ronins`, `id`, `createdby`, `createdon`) VALUES
('CUSTOMER SERVICE', 8, 0, 29, 7, '2018-10-12 14:51:32'),
('COMMUNICATION', 8, 0, 30, 7, '2018-10-12 14:51:32'),
('CULTURAL AWARENESS', 8, 0, 31, 7, '2018-10-12 14:51:32'),
('COMMITMENT', 8, 0, 32, 7, '2018-10-12 14:51:32'),
('ORGANIZATION', 8, 0, 33, 7, '2018-10-12 14:51:32'),
('MARKETING', 9, 0, 34, 8, '2018-10-12 15:12:44'),
('ACCOUNTING', 9, 0, 35, 8, '2018-10-12 15:12:44'),
('ENTREPRENUERSHIP', 9, 0, 36, 8, '2018-10-12 15:12:44'),
('COMMUNICATION', 9, 0, 37, 8, '2018-10-12 15:12:44'),
('MANAGEMENT', 9, 0, 38, 8, '2018-10-12 15:12:44'),
('WEB DESIGN & DEVELOP', 7, 0, 39, 6, '2018-10-12 17:30:43'),
('ANDROID DEVELOPMENT', 7, 0, 40, 6, '2018-10-12 17:30:43'),
('IOS DEVELOPMENT', 7, 0, 41, 6, '2018-10-12 17:30:43'),
('PROGRAMMING', 7, 0, 42, 6, '2018-10-12 17:30:43'),
('NETWORKING', 7, 0, 43, 6, '2018-10-12 17:30:43'),
('Locations', 1, 0, 44, 17, '2018-11-06 11:11:08'),
('Unit manager', 1, 0, 45, 17, '2018-11-06 11:11:08'),
('Ryv', 1, 0, 46, 17, '2018-11-06 11:11:08'),
('Ghv', 1, 0, 47, 17, '2018-11-06 11:11:08'),
('Fhv', 1, 0, 48, 17, '2018-11-06 11:11:08'),
('Test ', 11, 0, 49, 20, '2018-11-11 11:56:26'),
('Test ', 11, 0, 50, 20, '2018-11-11 11:56:26'),
('Test ', 11, 0, 51, 20, '2018-11-11 11:56:26'),
('Test', 11, 0, 52, 20, '2018-11-11 11:56:26'),
('Test', 11, 0, 53, 20, '2018-11-11 11:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `staff_skills`
--

CREATE TABLE `staff_skills` (
  `staff_email` varchar(60) NOT NULL,
  `industry_id` int(3) NOT NULL,
  `skill_id` int(3) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_skills`
--

INSERT INTO `staff_skills` (`staff_email`, `industry_id`, `skill_id`, `datecreated`, `dateupdated`, `id`) VALUES
('Bhh@hg.mmm', 7, 39, '2019-04-12 05:49:34', '2019-04-12 05:49:34', 1),
('Bhh@hg.mmm', 7, 40, '2019-04-12 05:49:34', '2019-04-12 05:49:34', 2),
('Bhh@hg.mmm', 7, 41, '2019-04-12 05:49:34', '2019-04-12 05:49:34', 3),
('Bhh@hg.mmm', 7, 42, '2019-04-12 05:49:34', '2019-04-12 05:49:34', 4),
('Bhh@hg.mmm', 7, 43, '2019-04-12 05:49:34', '2019-04-12 05:49:34', 5),
('brianemployee@gmail.com', 7, 39, '2019-04-12 06:05:50', '2019-04-12 06:05:50', 6),
('brianemployee@gmail.com', 7, 40, '2019-04-12 06:05:50', '2019-04-12 06:05:50', 7),
('brianemployee@gmail.com', 7, 41, '2019-04-12 06:05:50', '2019-04-12 06:05:50', 8),
('brianemployee@gmail.com', 7, 42, '2019-04-12 06:05:50', '2019-04-12 06:05:50', 9),
('brianemployee@gmail.com', 7, 43, '2019-04-12 06:05:50', '2019-04-12 06:05:50', 10),
('bb@gmail.com', 7, 39, '2019-04-12 06:32:18', '2019-04-12 06:32:18', 11),
('bb@gmail.com', 7, 40, '2019-04-12 06:32:18', '2019-04-12 06:32:18', 12),
('bb@gmail.com', 7, 41, '2019-04-12 06:32:18', '2019-04-12 06:32:18', 13),
('bb@gmail.com', 7, 42, '2019-04-12 06:32:18', '2019-04-12 06:32:18', 14),
('bb@gmail.com', 7, 43, '2019-04-12 06:32:18', '2019-04-12 06:32:18', 15),
('mm@gmail.com', 7, 39, '2019-04-12 06:37:04', '2019-04-12 06:37:04', 16),
('mm@gmail.com', 7, 40, '2019-04-12 06:37:04', '2019-04-12 06:37:04', 17),
('mm@gmail.com', 7, 41, '2019-04-12 06:37:04', '2019-04-12 06:37:04', 18),
('mm@gmail.com', 7, 42, '2019-04-12 06:37:04', '2019-04-12 06:37:04', 19),
('mm@gmail.com', 7, 43, '2019-04-12 06:37:04', '2019-04-12 06:37:04', 20),
('emp@gmail.com', 7, 39, '2019-04-12 06:47:45', '2019-04-12 06:47:45', 21),
('emp@gmail.com', 7, 40, '2019-04-12 06:47:46', '2019-04-12 06:47:46', 22),
('emp@gmail.com', 7, 41, '2019-04-12 06:47:46', '2019-04-12 06:47:46', 23),
('emp@gmail.com', 7, 42, '2019-04-12 06:47:46', '2019-04-12 06:47:46', 24),
('emp@gmail.com', 7, 43, '2019-04-12 06:47:46', '2019-04-12 06:47:46', 25),
('brian@gmail.com', 7, 39, '2019-04-12 06:58:57', '2019-04-12 06:58:57', 26),
('brian@gmail.com', 7, 40, '2019-04-12 06:58:57', '2019-04-12 06:58:57', 27),
('brian@gmail.com', 7, 41, '2019-04-12 06:58:57', '2019-04-12 06:58:57', 28),
('brian@gmail.com', 7, 42, '2019-04-12 06:58:57', '2019-04-12 06:58:57', 29),
('brian@gmail.com', 7, 43, '2019-04-12 06:58:57', '2019-04-12 06:58:57', 30),
('xx@gmail.com', 7, 39, '2019-04-12 07:10:01', '2019-04-12 07:10:01', 31),
('xx@gmail.com', 7, 40, '2019-04-12 07:10:01', '2019-04-12 07:10:01', 32),
('xx@gmail.com', 7, 41, '2019-04-12 07:10:01', '2019-04-12 07:10:01', 33),
('xx@gmail.com', 7, 42, '2019-04-12 07:10:01', '2019-04-12 07:10:01', 34),
('xx@gmail.com', 7, 43, '2019-04-12 07:10:01', '2019-04-12 07:10:01', 35),
('cc@gmail.com', 7, 39, '2019-04-12 07:34:21', '2019-04-12 07:34:21', 36),
('cc@gmail.com', 7, 40, '2019-04-12 07:34:21', '2019-04-12 07:34:21', 37),
('cc@gmail.com', 7, 41, '2019-04-12 07:34:21', '2019-04-12 07:34:21', 38),
('cc@gmail.com', 7, 42, '2019-04-12 07:34:21', '2019-04-12 07:34:21', 39),
('cc@gmail.com', 7, 43, '2019-04-12 07:34:21', '2019-04-12 07:34:21', 40),
('gg@gmail.com', 7, 39, '2019-04-12 08:26:20', '2019-04-12 08:26:20', 41),
('gg@gmail.com', 7, 40, '2019-04-12 08:26:20', '2019-04-12 08:26:20', 42),
('gg@gmail.com', 7, 41, '2019-04-12 08:26:20', '2019-04-12 08:26:20', 43),
('gg@gmail.com', 7, 42, '2019-04-12 08:26:20', '2019-04-12 08:26:20', 44),
('gg@gmail.com', 7, 43, '2019-04-12 08:26:20', '2019-04-12 08:26:20', 45),
('fs@gmail.com', 7, 39, '2019-04-12 10:36:19', '2019-04-12 10:36:19', 46),
('fs@gmail.com', 7, 40, '2019-04-12 10:36:19', '2019-04-12 10:36:19', 47),
('fs@gmail.com', 7, 41, '2019-04-12 10:36:19', '2019-04-12 10:36:19', 48),
('fs@gmail.com', 7, 42, '2019-04-12 10:36:19', '2019-04-12 10:36:19', 49),
('fs@gmail.com', 7, 43, '2019-04-12 10:36:19', '2019-04-12 10:36:19', 50),
('mutugi@gmail.com', 7, 39, '2019-04-12 10:42:27', '2019-04-12 10:42:27', 51),
('mutugi@gmail.com', 7, 40, '2019-04-12 10:42:27', '2019-04-12 10:42:27', 52),
('mutugi@gmail.com', 7, 41, '2019-04-12 10:42:27', '2019-04-12 10:42:27', 53),
('mutugi@gmail.com', 7, 42, '2019-04-12 10:42:27', '2019-04-12 10:42:27', 54),
('mutugi@gmail.com', 7, 43, '2019-04-12 10:42:27', '2019-04-12 10:42:27', 55),
('p@gmail.com', 7, 39, '2019-04-12 11:02:48', '2019-04-12 11:02:48', 56),
('p@gmail.com', 7, 40, '2019-04-12 11:02:48', '2019-04-12 11:02:48', 57),
('p@gmail.com', 7, 41, '2019-04-12 11:02:48', '2019-04-12 11:02:48', 58),
('p@gmail.com', 7, 42, '2019-04-12 11:02:48', '2019-04-12 11:02:48', 59),
('p@gmail.com', 7, 43, '2019-04-12 11:02:48', '2019-04-12 11:02:48', 60),
('brian@gmail.com', 7, 39, '2019-04-12 12:39:51', '2019-04-12 12:39:51', 61),
('brian@gmail.com', 7, 40, '2019-04-12 12:39:51', '2019-04-12 12:39:51', 62),
('brian@gmail.com', 7, 41, '2019-04-12 12:39:51', '2019-04-12 12:39:51', 63),
('brian@gmail.com', 7, 42, '2019-04-12 12:39:51', '2019-04-12 12:39:51', 64),
('brian@gmail.com', 7, 43, '2019-04-12 12:39:51', '2019-04-12 12:39:51', 65),
('prof@gmail.com', 7, 39, '2019-04-12 15:33:00', '2019-04-12 15:33:00', 66),
('prof@gmail.com', 7, 40, '2019-04-12 15:33:00', '2019-04-12 15:33:00', 67),
('prof@gmail.com', 7, 41, '2019-04-12 15:33:00', '2019-04-12 15:33:00', 68),
('prof@gmail.com', 7, 42, '2019-04-12 15:33:00', '2019-04-12 15:33:00', 69),
('prof@gmail.com', 7, 43, '2019-04-12 15:33:00', '2019-04-12 15:33:00', 70),
('t1@gmail.com', 7, 39, '2019-04-13 19:15:43', '2019-04-13 19:15:43', 71),
('t1@gmail.com', 7, 40, '2019-04-13 19:15:43', '2019-04-13 19:15:43', 72),
('t1@gmail.com', 7, 41, '2019-04-13 19:15:43', '2019-04-13 19:15:43', 73),
('t1@gmail.com', 7, 42, '2019-04-13 19:15:43', '2019-04-13 19:15:43', 74),
('t1@gmail.com', 7, 43, '2019-04-13 19:15:43', '2019-04-13 19:15:43', 75);

-- --------------------------------------------------------

--
-- Table structure for table `sub-industries`
--

CREATE TABLE `sub-industries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `industryid` int(4) NOT NULL,
  `clients` int(4) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `type` int(4) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bnumber` varchar(20) NOT NULL,
  `btype` varchar(60) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `cname` varchar(70) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` varchar(200) NOT NULL,
  `rating` varchar(4) NOT NULL DEFAULT '3.5',
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `cid` varchar(4) NOT NULL,
  `p1` varchar(15) NOT NULL,
  `p2` varchar(15) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `image` varchar(120) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `avstart` int(12) NOT NULL,
  `avend` varchar(12) NOT NULL DEFAULT '99999999999',
  `datejoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(60) NOT NULL,
  `reg_lat` varchar(15) NOT NULL,
  `reg_long` varchar(15) NOT NULL,
  `reg_ip` varchar(18) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `lastseen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lsts` int(50) NOT NULL,
  `lspj` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `bname`, `bnumber`, `btype`, `cnumber`, `cname`, `fname`, `lname`, `email`, `about`, `rating`, `country`, `city`, `cid`, `p1`, `p2`, `industry`, `skills`, `image`, `resume`, `avstart`, `avend`, `datejoined`, `password`, `reg_lat`, `reg_long`, `reg_ip`, `verified`, `lastseen`, `lsts`, `lspj`) VALUES
(14, 2, '', '', '', '', '', 'BRIAN', 'EMPLOYEE', 'brian@gmail.com', 'A valued employee at BIDII', '4.5', 'Kenya', 'Nairobi', '', '714359693', '', '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', 'uploads/profileimages/155507279137358750_1306445279490952_7754574198936174592_n.jpg', '', 0, '99999999999', '2019-04-12 12:39:51', 'e10adc3949ba59abbe56e057f20f883e', '-1.282484999999', '36.8842066', '197.237.193.68', 0, '2019-04-15 09:15:43', 0, 0),
(15, 1, 'BRIAN  EMPLOYER', 'K', 'INDIVIDUAL', '', '', '', '', 'test@gmail.com', 'TEST EMPLOYER', '4', 'Kenya', 'Nairobi', '', '714359693', '714359693', '7', '', 'uploads/profileimages/155507291837358750_1306445279490952_7754574198936174592_n.jpg', '', 0, '99999999999', '2019-04-12 12:41:58', 'e10adc3949ba59abbe56e057f20f883e', '-1.284994', '36.889132499999', '197.237.193.68', 0, '2019-04-15 07:40:28', 0, 0),
(16, 1, 'mutugi', 'mutugi', 'INDIVIDUAL', '', '', '', '', 'mutugi@gmail.com', 'super employer', '3.5', '<br />\r\n<b>Warning</b>:  file_get_contents(https://ipfind.co/?ip=197.237.193.68&auth=83a4ac34-126a-47bb-b06c-9c75f61eb740): failed to open stream: HTT', '<br />\r\n<b>Warning</b>:  file_get_contents(https://ipfind.co/?ip=197.237.193.68&auth=83a4ac34-126a-47bb-b06c-9c75f61eb740): failed to open stream: HTT', '', '714359693', '714359693', '7', '', 'uploads/profileimages/155507949837358750_1306445279490952_7754574198936174592_n.jpg', '', 0, '99999999999', '2019-04-12 14:31:38', 'e10adc3949ba59abbe56e057f20f883e', '-1.282484999999', '36.8842066', '197.237.193.68', 0, '2019-04-12 14:42:49', 0, 0),
(17, 2, '', '', '', '', '', 'Professor', '.', 'prof@gmail.com', 'A valued employee at BIDII', '4.5', 'Kenya', 'Nairobi', '', '714359693', '', '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', 'uploads/profileimages/1555083180juma helb 20190405_193224.jpg', '', 0, '99999999999', '2019-04-12 15:33:00', 'e10adc3949ba59abbe56e057f20f883e', '-1.2848209', '36.8888245', '197.237.193.68', 0, '2019-04-14 17:31:38', 0, 0),
(18, 2, '', '', '', '', '', 'test', 't1', 't1@gmail.com', 'A valued employee at BIDII', '4.5', 'Kenya', 'Nairobi', '', '714359693', '', '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', 'uploads/profileimages/155518294337358750_1306445279490952_7754574198936174592_n.jpg', '', 0, '99999999999', '2019-04-13 19:15:43', 'e7c25556a04b5fd51e7d9ffa02930656', '-1.282484999999', '36.8842066', '197.237.193.68', 0, '2019-04-15 06:39:34', 0, 0),
(19, 1, 'BIDII EMPLOYERS', 'TUGI', 'COMPANY', '', '', '', '', 'b@gmail.com', 'WE ARE A DEDICATED COMPANY', '3.5', 'Kenya', 'Nairobi', '', '714359693', '714359693', '7', '', 'uploads/profileimages/1555251931BIDII (5).png', '', 0, '99999999999', '2019-04-14 14:25:31', 'fb2485da4920d1dc76e0150eee133cab', '-1.282484999999', '36.8842066', '', 0, '2019-04-15 06:53:51', 0, 0),
(20, 1, 'FARMER 1', '', '', '', '', '', '', 'fm@gmail.com', '', '3.5', 'Kenya', 'Nairobi', '', '714359693', '', '15', '', 'uploads/profileimages/1556215273fama.jpg', '', 0, '99999999999', '2019-04-25 18:01:14', '61184738467084b5dc223dcbfa36acf0', '-1.2849561', '36.889027999999', '197.237.193.68', 0, '2019-04-25 20:30:33', 1556224233, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesstypes`
--
ALTER TABLE `businesstypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_contractors`
--
ALTER TABLE `job_contractors`
  ADD PRIMARY KEY (`jobcont_id`);

--
-- Indexes for table `job_proposed`
--
ALTER TABLE `job_proposed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `pay_periods`
--
ALTER TABLE `pay_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_skills`
--
ALTER TABLE `staff_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub-industries`
--
ALTER TABLE `sub-industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesstypes`
--
ALTER TABLE `businesstypes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hired`
--
ALTER TABLE `hired`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_contractors`
--
ALTER TABLE `job_contractors`
  MODIFY `jobcont_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_proposed`
--
ALTER TABLE `job_proposed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pay_periods`
--
ALTER TABLE `pay_periods`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `staff_skills`
--
ALTER TABLE `staff_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sub-industries`
--
ALTER TABLE `sub-industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
