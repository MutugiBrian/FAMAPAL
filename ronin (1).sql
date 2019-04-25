-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 09:55 AM
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
-- Database: `ronin`
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
(3, 'PARTNERSHIP', 0, '2018-10-08 20:27:49');

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
('FILM & FILM MAKING', 'The  industry focuses on skills and jobs related to film making and ensuring safety', 0, 1, 0, '2018-10-12 14:09:36'),
('SECURITY', 'This is a security industry', 0, 2, 0, '2018-10-12 14:09:36'),
('IT & TELECOMS', '', 0, 7, 0, '2018-10-12 14:09:36'),
('Hotel and Leisure', '', 0, 8, 0, '2018-10-12 14:09:36'),
('BUSINESS & COMMERCE', '', 0, 9, 0, '2018-10-12 15:09:54'),
('AGRICULTURE', '', 0, 10, 0, '2018-10-18 11:12:21'),
('Media', '', 0, 11, 0, '2018-11-11 11:52:15'),
('Oil and Gas', '', 0, 12, 0, '2018-11-11 12:07:48'),
('Market Research', '', 0, 13, 0, '2019-02-07 20:20:42');

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
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `uniquestr`, `name`, `title`, `description`, `pay_amount`, `pay_per`, `pay_currency`, `invoicecycle`, `vacancies`, `duration`, `industry`, `skills`, `job_lat`, `job_long`, `city`, `country`, `posted_by`, `verified`, `live`, `active`, `completed`, `edit_date`, `post_date`) VALUES
(10, '', 'SOFTWARE ENGINEER ', '', 'SOFTWARE ENGINEER ', 60000, 'MONTH', '    KES   ', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2865352203877811', '36.81807138675174', 'Nairobi', 'Kenya', 6, 0, 1, 1, 0, '2018-10-23 11:05:04', '2018-10-14 15:54:26'),
(11, '', 'Database Admin', '', 'Our company seeks for an individual who can manage, manipulate and secure our database servers,convinience with Oracle DBMS,  MySQL and Nginx servers will be an added advantage... ', 1000, 'HOUR', '    KES   ', '', 0, 0, '7', 'a:3:{i:0;s:2:\"40\";i:1;s:2:\"42\";i:2;s:2:\"43\";}', '-1.2951093653872812', '36.82629970398955', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-14 21:40:17', '2018-10-14 21:40:17'),
(12, '', 'PLUMBER', '', 'our pipes need to be fixed ASAP. We need a plumber like yesterday. A qualified and skilled one since it looks like a serious incidence. JOKERS WILL BE PROSECUTED !', 2000, 'COMPLETION', '    KES   ', '', 0, 0, '8', 'a:1:{i:0;s:2:\"29\";}', '-1.2848631898256448', '36.88471218922166', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-14 21:47:17', '2018-10-14 21:47:17'),
(13, '', 'RONIN TEST 1', '', 'This is a ronin test job...for development purposes only', 20000, 'DAY', '    KES', '', 0, 0, '7', 'a:3:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";}', '-1.2860215810954194', '36.88243154474583', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-18 12:27:21', '2018-10-18 12:27:21'),
(14, '', 'TEST JOB 2', '', 'THIS IS A JOB POSTED FOR TEST PIRPOSES ONLY', 200, 'COMPLETION', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2915133555931877', '36.89161542841282', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(15, 'OPEVJH', 'RONIN TEST 3', '', 'THIS IS A RONIN TEST JOB..THIS IS USED FOR DEVELOPMENT PURPOSESS ONLY !!!!!', 4000, 'COMPLETION', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2889390877718967', '36.89564947077122', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(16, 'AH9F02', 'RONIN TEST 4', '', 'THIS IS A RONIN TEST JOB 4..IT IS TO BE USED FOR DEVELOPMENT PURPOSES ONLYY !!!', 8000, 'MONTH', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2940018120085128', '36.89264539667454', 'Nairobi', 'Kenya', 6, 0, 1, 1, 0, '2018-10-23 11:13:35', '2018-10-22 11:26:31'),
(17, '0G2EFW', 'RONIN  TEST 5', '', 'THIS IS A RONIN TEST JOB 5 ..USE FOR DEVELOPMENT PURPOSES ONLY', 4000, 'DAY', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2948598998617773', '36.89238790460911', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-24 11:48:19', '2018-10-23 11:36:06'),
(18, 'JHC1UW', 'RONIN TEST 6', '', 'THIS IS A RONIN TEST JOB 6..USED TO TEST THE FUNCTION OF DEDICATING A JOB TO MULTIPLE CONTRACORS ', 6000, 'DAY', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2961382585372312', '36.881797992046245', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(19, 'KGJ2IQ', 'RONIN TEST 7', '', 'THIS IS A RONIN TEST JOB... CREATED TO TEST THE NOTIFICATION FUNCTION ', 8000, 'MONTH', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.281304895653664', '36.886469277760966', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(20, '0X6MNW', 'RONIN TEST 9', '', 'THIS IS RONIN TEST 9 JOB..USED TO TEST THE JOB LINK DISPLAY ON  NOTIFICATIONS', 5000, 'DAY', '    KES', '', 0, 0, '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', '-1.2803581762686178', '36.89238790460911', 'Nairobi', 'Kenya', 6, 0, 1, 0, 0, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(21, 'HRLKP6', 'Peckham Rye CS3', '', 'Scene 234/5 ', 120, 'DAY', '    GBP', '', 0, 0, '1', 'a:1:{i:0;s:1:\"0\";}', '', '', '    Nairobi', 'Kenya    ', 6, 0, 1, 0, 0, '2018-11-06 10:36:24', '2018-11-06 10:36:24'),
(22, '9OG5VW', 'Yfc', '', 'Vfc', 15, 'HOUR', '    GBP', '', 0, 0, '1', 'a:2:{i:0;s:2:\"44\";i:1;s:2:\"45\";}', '-1.280471386195139', '36.817429283201136', '    Nairobi', 'Kenya', 17, 0, 1, 0, 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(23, 'VL3FWP', 'Netflix The Crown', '', 'Managing locations', 150, 'DAY', '    GBP', '', 0, 0, '1', 'a:2:{i:0;s:2:\"44\";i:1;s:2:\"45\";}', '-1.2826959105616147', '36.813620141711226', '    Nairobi', 'Kenya', 17, 0, 1, 0, 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(24, 'DSEYQW', 'Mary Queen Of Scotts LTD', 'Carpenter', 'Random test text continue talking waiting to see what paragraph looks like Random test text continue talking waiting to see what paragraph looks like Random test text continue talking waiting to se ', 330, 'DAY', '    GBP', 'MONTH', 2, 1, '1', 'a:2:{i:0;s:2:\"44\";i:1;s:2:\"45\";}', '-1.2885046470860095', '36.81388259547043', '    Nairobi', 'Kenya', 17, 0, 1, 0, 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(25, 'VBAYPF', '', '', '', 0, 'HOUR', '    GBP', 'COMPLETION', 0, 0, '', 'N;', '', '', '    ', '    ', 17, 0, 1, 0, 0, '2018-11-11 11:24:45', '2018-11-11 11:24:45'),
(26, '2OE7ZU', '', '', '', 0, 'COMPLETION', '    GBP', 'COMPLETION', 0, 0, '1', 'N;', '', '', '    ', '    ', 17, 0, 1, 0, 0, '2018-11-11 11:29:59', '2018-11-11 11:29:59'),
(27, 'WN8BQ9', 'The Crown Season 3', 'Security', 'Blah ', 16, 'HOUR', '    GBP', 'WEEK', 4, 5, '1', 'a:2:{i:0;s:2:\"44\";i:1;s:2:\"45\";}', '-1.2881600389314503', '36.8157650576361', '    Nairobi', 'Kenya', 17, 0, 1, 0, 0, '2018-11-16 12:04:47', '2018-11-16 12:04:47'),
(28, 'GSKO3Y', 'Utility Companies Research', 'Market research Interviewers', 'Central London company requires 30 market research interviewers between June and December 2019 please add your CV along with a cover letter of any relevant experience.', 15, 'HOUR', '    GBP', 'WEEK', 35, 6, '13', 'a:1:{i:0;s:1:\"0\";}', '51.57678318855873', '-0.23183510615490377', '    Greater London', 'United Kingdom', 22, 0, 1, 0, 0, '2019-02-07 20:53:20', '2019-02-07 20:53:20');

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

--
-- Dumping data for table `job_contractors`
--

INSERT INTO `job_contractors` (`jobcont_id`, `jobstr`, `client_id`, `contractor_id`, `datecreated`, `dateupdated`) VALUES
(2, '0G2EFW', 6, 11, '2018-10-24 11:49:28', '2018-10-24 11:49:28'),
(3, 'JHC1UW', 6, 11, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(4, 'KGJ2IQ', 6, 11, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(5, '0X6MNW', 6, 11, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(6, '9OG5VW', 17, 1, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(7, '9OG5VW', 17, 8, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(8, '9OG5VW', 17, 11, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(9, '9OG5VW', 17, 12, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(10, '9OG5VW', 17, 14, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(11, '9OG5VW', 17, 15, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(12, '9OG5VW', 17, 18, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(13, 'VL3FWP', 17, 1, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(14, 'VL3FWP', 17, 8, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(15, 'VL3FWP', 17, 11, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(16, 'VL3FWP', 17, 12, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(17, 'VL3FWP', 17, 14, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(18, 'VL3FWP', 17, 15, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(19, 'VL3FWP', 17, 18, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(20, 'DSEYQW', 17, 1, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(21, 'DSEYQW', 17, 8, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(22, 'DSEYQW', 17, 11, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(23, 'DSEYQW', 17, 12, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(24, 'DSEYQW', 17, 14, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(25, 'DSEYQW', 17, 15, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(26, 'DSEYQW', 17, 18, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(27, 'WN8BQ9', 17, 15, '2018-11-16 12:04:47', '2018-11-16 12:04:47');

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

--
-- Dumping data for table `job_proposed`
--

INSERT INTO `job_proposed` (`id`, `job_id`, `staff_id`, `contractor_id`, `contractstr`, `skillscore`, `hired`, `completed`, `hiredate`, `date_proposed`) VALUES
(5, 16, 13, 11, 'HLEGN', 0, 1, 0, '2018-10-24 07:38:01', '2018-10-22 16:03:20'),
(6, 16, 16, 11, 'HLEGN', 100, 0, 0, '2018-10-23 11:37:33', '2018-10-22 16:07:04'),
(7, 17, 16, 11, 'ZU3QP', 100, 1, 0, '2018-10-23 11:50:18', '2018-10-23 11:40:45'),
(8, 17, 13, 11, 'ZU3QP', 0, 0, 0, '2018-10-23 11:40:49', '2018-10-23 11:40:49'),
(14, 20, 16, 11, '218JV', 100, 0, 0, '2018-10-25 06:12:52', '2018-10-25 06:12:52'),
(15, 20, 13, 11, '218JV', 0, 0, 0, '2018-10-25 07:12:27', '2018-10-25 07:12:27');

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
(1, '3', 5, 6, '2018-10-22 10:02:08', '2018-10-22 10:02:08'),
(2, '0', 6, 39, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(3, '0', 6, 40, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(4, '0', 6, 41, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(5, '0', 6, 42, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(6, '0', 6, 43, '2018-10-22 10:22:57', '2018-10-22 10:22:57'),
(7, '0', 6, 39, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(8, '0', 6, 40, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(9, '0', 6, 41, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(10, '0', 6, 42, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(11, '0', 6, 43, '2018-10-22 11:24:02', '2018-10-22 11:24:02'),
(12, 'AH9F02', 6, 39, '2018-10-22 11:26:31', '2018-10-22 11:26:31'),
(13, 'AH9F02', 6, 40, '2018-10-22 11:26:31', '2018-10-22 11:26:31'),
(14, 'AH9F02', 6, 41, '2018-10-22 11:26:31', '2018-10-22 11:26:31'),
(15, 'AH9F02', 6, 42, '2018-10-22 11:26:31', '2018-10-22 11:26:31'),
(16, 'AH9F02', 6, 43, '2018-10-22 11:26:31', '2018-10-22 11:26:31'),
(17, '0G2EFW', 6, 39, '2018-10-23 11:36:06', '2018-10-23 11:36:06'),
(18, '0G2EFW', 6, 40, '2018-10-23 11:36:06', '2018-10-23 11:36:06'),
(19, '0G2EFW', 6, 41, '2018-10-23 11:36:06', '2018-10-23 11:36:06'),
(20, '0G2EFW', 6, 42, '2018-10-23 11:36:06', '2018-10-23 11:36:06'),
(21, '0G2EFW', 6, 43, '2018-10-23 11:36:06', '2018-10-23 11:36:06'),
(22, 'JHC1UW', 6, 39, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(23, 'JHC1UW', 6, 40, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(24, 'JHC1UW', 6, 41, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(25, 'JHC1UW', 6, 42, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(26, 'JHC1UW', 6, 43, '2018-10-24 11:59:44', '2018-10-24 11:59:44'),
(27, 'KGJ2IQ', 6, 39, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(28, 'KGJ2IQ', 6, 40, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(29, 'KGJ2IQ', 6, 41, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(30, 'KGJ2IQ', 6, 42, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(31, 'KGJ2IQ', 6, 43, '2018-10-24 19:04:02', '2018-10-24 19:04:02'),
(32, '0X6MNW', 6, 39, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(33, '0X6MNW', 6, 40, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(34, '0X6MNW', 6, 41, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(35, '0X6MNW', 6, 42, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(36, '0X6MNW', 6, 43, '2018-10-25 04:45:46', '2018-10-25 04:45:46'),
(37, 'HRLKP6', 6, 0, '2018-11-06 10:36:24', '2018-11-06 10:36:24'),
(38, '9OG5VW', 17, 44, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(39, '9OG5VW', 17, 45, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(40, 'VL3FWP', 17, 44, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(41, 'VL3FWP', 17, 45, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(42, 'DSEYQW', 17, 44, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(43, 'DSEYQW', 17, 45, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(44, 'WN8BQ9', 17, 44, '2018-11-16 12:04:47', '2018-11-16 12:04:47'),
(45, 'WN8BQ9', 17, 45, '2018-11-16 12:04:47', '2018-11-16 12:04:47'),
(46, 'GSKO3Y', 22, 0, '2019-02-07 20:53:20', '2019-02-07 20:53:20');

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
(2, 'newjobposted', 6, 11, '', '', 'Has opened a job for you', 1549961463, '2019-02-12 08:51:03', '2018-10-24 19:04:02'),
(3, 'newjobposted', 6, 11, '', '0X6MNW', 'Has opened a job for you', 1549961463, '2019-02-12 08:51:03', '2018-10-25 04:45:46'),
(8, 'proposed', 11, 16, '20', '', 'Has proposed you for this job,stay alert', 1540998560, '2018-10-31 15:09:20', '2018-10-25 06:12:52'),
(9, 'proposed', 11, 13, '20', '', 'Has proposed you for this job,stay alert', 0, '2018-10-25 07:12:27', '2018-10-25 07:12:27'),
(10, 'proposed', 11, 6, '20', '', 'Has proposed staff for this job,kindly respond', 1550042803, '2019-02-13 07:26:43', '2018-10-25 07:12:27'),
(11, 'newjobposted', 17, 1, '', '9OG5VW', 'Has opened a job for you', 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(12, 'newjobposted', 17, 8, '', '9OG5VW', 'Has opened a job for you', 1541904716, '2018-11-11 02:51:56', '2018-11-10 15:25:26'),
(13, 'newjobposted', 17, 11, '', '9OG5VW', 'Has opened a job for you', 1549961463, '2019-02-12 08:51:03', '2018-11-10 15:25:26'),
(14, 'newjobposted', 17, 12, '', '9OG5VW', 'Has opened a job for you', 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(15, 'newjobposted', 17, 14, '', '9OG5VW', 'Has opened a job for you', 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(16, 'newjobposted', 17, 15, '', '9OG5VW', 'Has opened a job for you', 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(17, 'newjobposted', 17, 18, '', '9OG5VW', 'Has opened a job for you', 0, '2018-11-10 15:25:26', '2018-11-10 15:25:26'),
(18, 'newjobposted', 17, 1, '', 'VL3FWP', 'Has opened a job for you', 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(19, 'newjobposted', 17, 8, '', 'VL3FWP', 'Has opened a job for you', 1541904716, '2018-11-11 02:51:56', '2018-11-10 15:28:18'),
(20, 'newjobposted', 17, 11, '', 'VL3FWP', 'Has opened a job for you', 1549961463, '2019-02-12 08:51:03', '2018-11-10 15:28:18'),
(21, 'newjobposted', 17, 12, '', 'VL3FWP', 'Has opened a job for you', 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(22, 'newjobposted', 17, 14, '', 'VL3FWP', 'Has opened a job for you', 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(23, 'newjobposted', 17, 15, '', 'VL3FWP', 'Has opened a job for you', 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(24, 'newjobposted', 17, 18, '', 'VL3FWP', 'Has opened a job for you', 0, '2018-11-10 15:28:18', '2018-11-10 15:28:18'),
(25, 'newjobposted', 17, 1, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(26, 'newjobposted', 17, 8, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(27, 'newjobposted', 17, 11, '', 'DSEYQW', 'Has opened a job for you', 1549961463, '2019-02-12 08:51:03', '2018-11-11 08:59:59'),
(28, 'newjobposted', 17, 12, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(29, 'newjobposted', 17, 14, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(30, 'newjobposted', 17, 15, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(31, 'newjobposted', 17, 18, '', 'DSEYQW', 'Has opened a job for you', 0, '2018-11-11 08:59:59', '2018-11-11 08:59:59'),
(32, 'newjobposted', 17, 15, '', 'WN8BQ9', 'Has opened a job for you', 0, '2018-11-16 12:04:47', '2018-11-16 12:04:47');

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
(1, 'COMPLETION', '2018-10-14 11:10:29', '2018-10-14 11:22:45'),
(2, 'HOUR', '2018-10-14 11:10:50', '2018-10-14 11:23:00'),
(3, 'DAY', '2018-10-14 11:11:09', '2018-10-14 11:23:13'),
(4, 'MONTH', '2018-10-14 11:11:09', '2018-10-14 11:23:26'),
(5, 'YEAR', '2018-10-14 11:11:26', '2018-10-14 11:23:40'),
(6, 'WEEK', '2018-11-11 11:34:53', '2018-11-11 11:34:53');

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
('999', 6, 6, '2018-10-21 17:38:09', '2018-10-21 17:38:09', 1),
('ts1@gmail.com', 7, 39, '2018-10-21 17:51:40', '2018-10-21 17:51:40', 2),
('ts1@gmail.com', 7, 40, '2018-10-21 17:51:40', '2018-10-21 17:51:40', 3),
('ts1@gmail.com', 7, 41, '2018-10-21 17:51:40', '2018-10-21 17:51:40', 4),
('ts1@gmail.com', 7, 42, '2018-10-21 17:51:40', '2018-10-21 17:51:40', 5),
('ts1@gmail.com', 7, 43, '2018-10-21 17:51:40', '2018-10-21 17:51:40', 6);

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
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
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
(1, 3, '', '', '', '34567', 'TopTalent Contractors', '', '', 'fleek9619@gmail.com', '', '4.5', 'Kenya', 'Nairobi', 'ZKE2', '0714359693', '0714359693', '1', '', 'uploads/profileimages/1539187178me1.jpg', '', 0, '0', '2018-10-10 15:59:38', '112233', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-10-12 19:43:14', 0, 0),
(2, 2, '', '', '', '', '', 'BRIAN', 'MUTUGI', 'briantugz@gmail.com', '', '5', 'Kenya', 'Nairobi', '', '0714359693', '0712108024', '1', '2', 'uploads/profileimages/1539188485brian.jpg', '', 0, '0', '2018-10-10 16:21:25', '112233', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-10-12 22:40:02', 0, 0),
(3, 1, 'Oxygen Technologies', 'AA88A', 'COMPANY', '', '', '', '', 'oxygen@gmail.com', '', '4', 'Kenya', 'Nairobi', '', '0714359693', '0714359693', '1', '', 'uploads/profileimages/1539188988Webp.net-resizeimage (6).jpg', '', 0, '0', '2018-10-10 16:29:48', '123456', '-1.2833', '36.8167', '', 0, '2018-10-13 00:03:32', 0, 0),
(6, 1, 'BRIAN SUPER CLIENT', 'bdsa', 'COMPANY', '', '', '', '', 'briantech@gmail.com', '', '5.0', 'Kenya', 'Nairobi', '', '0714359693', '0714359693', '7', '', 'uploads/profileimages/1539326526brian.jpg', '', 0, '0', '2018-10-12 06:42:06', '123456', '-1.284906062955', '36.889126338447', '41.212.24.129', 0, '2019-03-03 04:27:30', 0, 0),
(7, 1, 'Rafifki Caterers', 'ccdsd', 'COMPANY', '', '', '', '', 'rafiki@gmail.com', '', '2.5', 'Kenya', 'Nairobi', '', '0714359693', '0714359693', '8', '', 'uploads/profileimages/1539343691RE3.JPEG', '', 0, '0', '2018-10-12 11:28:11', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-10-12 23:36:25', 0, 0),
(8, 3, '', '', '', 'ABMB22', 'XYZ CONTRACTOR', '', '', 'xyz@gmail.com', '', '3', 'Kenya', 'Nairobi', 'XTC5', '0714359693', '0714359693', '9', '', 'uploads/profileimages/1539356994online2.jpg', '', 0, '0', '2018-10-12 15:09:54', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-11-11 02:56:48', 0, 0),
(9, 2, '', '', '', '', '', 'trial', 'staff', 'ts@gmail.com', '', '3.5', 'Kenya', 'Nairobi', 'XTC5', '0714359693', '0714359693', '9', '38', 'uploads/profileimages/1539361168404.png', '', 0, '0', '2018-10-12 16:19:28', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-10-25 06:14:34', 0, 0),
(10, 2, '', '', '', '', '', 'SUPER STAFF', 'BRIAN', 'ss@gmail.com', '', '3.5', 'Kenya', 'Nairobi', 'XTC5', '+254714359696', '+254714359693', '9', 'a:5:{i:0;s:2:\"34\";i:1;s:2:\"35\";i:2;s:2:\"36\";i:3;s:2:\"37\";i:4;s:2:\"38\";}', 'uploads/profileimages/1539361868Maryanne Client 20181012_190149.jpg', '', 1539820800, '1539907200', '2018-10-12 16:31:08', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2019-02-12 08:49:22', 0, 0),
(11, 3, '', '', '', 'NCC', 'THE JOKER', '', '', 'nc@gmail.com', '', '5', 'Kenya', 'Nairobi', '8ZPI', '+254714359696', '+254714359693', '9', '', 'uploads/profileimages/1539366044GBWA-20181006175334.jpg', '', 0, '0', '2018-10-12 17:40:44', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2019-02-12 08:52:23', 0, 0),
(12, 3, '', '', '', 'FFSSSA', 'WORLDWIDE CONTRACTORS', '', '', 'ww@gmail.com', '', '3.5', 'Kenya', 'Nairobi', 'L1ZF', '0714359693', '0714359693', '8', '', 'uploads/profileimages/1539366420world.jpg', '', 0, '0', '2018-10-12 17:47:00', '123456', '-1.2833', '36.8167', '41.212.24.129', 0, '2018-10-15 18:02:27', 0, 4533),
(13, 2, '', '', '', '', '', 'JOHN', 'DOE', 'johndoes@gmail.com', '', '3.5', '', '', '8ZPI', '0714359693', '0714359693', '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', 'uploads/profileimages/1539849826RONIN Solo.png', '', 0, '0', '2018-10-18 08:03:46', 'johndoes', '-1.296686193867', '36.885707873535', '41.212.24.129', 0, '2018-10-18 08:13:17', 0, 0),
(14, 3, '', '', '', 'JOHN', 'JOHN CONTRACTORS', '', '', 'johnc@gmail.com', '', '3.5', '', '', '6CI4', '0714359693', '0714359693', '10', '', 'uploads/profileimages/1539861141Internet_technology_business_circuit_c', '', 0, '0', '2018-10-18 11:12:21', '123456', '-1.283128381673', '36.883390444946', '41.212.24.129', 0, '2018-10-18 11:31:02', 0, 0),
(15, 3, '', '', '', 'ABMB22', 'BRIAN MUTUGI', '', '', 'briancont@gmail.com', '', '3.5', '', '', 'Q7WX', '0714359693', '0714359693', '10', '', 'uploads/profileimages/1539863217brian.jpg', '', 0, '0', '2018-10-18 11:46:57', '123456', '-1.292567372491', '36.885536212158', '41.212.24.129', 0, '2018-10-18 11:46:57', 0, 0),
(16, 2, '', '', '', '', '', 'TEST', 'STAFF1', 'ts1@gmail.com', '', '3.5', '', '', '8ZPI', '+254714359696', '+254714359693', '7', 'a:5:{i:0;s:2:\"39\";i:1;s:2:\"40\";i:2;s:2:\"41\";i:3;s:2:\"42\";i:4;s:2:\"43\";}', 'uploads/profileimages/1540144300GBWA-20181013175920.jpg', '', 0, '0', '2018-10-21 17:51:40', '123456', '-1.312034991415', '36.892553135494', '41.212.24.129', 0, '2018-10-31 16:17:40', 0, 0),
(17, 1, 'SUPER CLIENT', 'SUPERBUSINESS', 'COMPANY', '', '', '', '', 'superclient@gmail.com', 'Am a super RONIN', '3.5', '', '', '', '1234567890', '', '1', '', 'uploads/profileimages/1541333686roninbg.png', '', 1541376000, '1543536000', '2018-11-04 12:14:46', 'su1234', '-1.286389127906', '36.817129153442', '196.207.130.251', 0, '2019-01-28 21:12:43', 1548709963, 0),
(18, 3, '', '', '', 'supercontractor', 'SUPER CONTRACTOR', '', '', 'supercontractor@gmail.com', 'I AM A SUPER RONIN', '3.5', '', '', 'QX9I', '1234567890', '1234567890', '1', '', 'uploads/profileimages/1541333825roninbg.png', '', 0, '99999999999', '2018-11-04 12:17:05', 'su1234', '-1.286303318848', '36.817300814819', '196.207.130.251', 0, '2018-11-04 12:17:05', 0, 0),
(19, 1, 'testbiz', 'HHZz', 'COMPANY', '', '', '', '', 'testbiz@gmail.com', 'This is a test biz.. Good luck', '3.5', '', '', '', '0714359693', '0714359693', '7', '', 'uploads/profileimages/1541333686roninbg.png', '', 0, '99999999999', '2018-11-10 11:07:04', 'testbiz123', '-1.2833', '36.8167', '196.207.130.251', 0, '2018-11-11 02:31:15', 0, 0),
(20, 1, 'Qwertyuiop', '123456789', 'COMPANY', '', '', '', '', 'Ab.clinton@outlook.com', 'Test', '3.5', '', '', '', '123456789', '123456789', '11', '', 'uploads/profileimages/1541333686roninbg.png', '', 0, '99999999999', '2018-11-11 11:52:15', '1234567890', '51.5961', '-0.2481', '79.67.160.21', 0, '2018-11-11 12:06:18', 0, 0),
(21, 1, 'Ronin', '1234567890', 'COMPANY', '', '', '', '', 'anthony.eko@outlook.com', 'Test', '3.5', '', '', '', '1234567890', '1234567890', '12', '', 'uploads/profileimages/1541333686roninbg.png', '', 0, '99999999999', '2018-11-11 12:07:48', '1234567890', '51.5961', '-0.2481', '79.67.160.21', 0, '2018-11-11 13:19:28', 0, 0),
(22, 1, 'Research Apuri', '1234567', 'COMPANY', '', '', '', '', 'pirittakateisto@yahoo.co.uk', 'Test', '3.5', '', '', '', '07923455016', '', '13', '', 'uploads/profileimages/1541333686roninbg.png', '', 0, '99999999999', '2019-02-07 20:20:42', '1234567', '51.5833', '-0.25', '79.67.175.170', 0, '2019-02-11 09:19:18', 1549876758, 0);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `job_contractors`
--
ALTER TABLE `job_contractors`
  MODIFY `jobcont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job_proposed`
--
ALTER TABLE `job_proposed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pay_periods`
--
ALTER TABLE `pay_periods`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `staff_skills`
--
ALTER TABLE `staff_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub-industries`
--
ALTER TABLE `sub-industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
