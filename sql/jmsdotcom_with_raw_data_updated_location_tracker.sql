-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2018 at 08:00 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmsdotcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `filename`, `createdin`, `updatedin`) VALUES
(1, 'carousel_1.png', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'carousel_2.png', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'carousel_3.png', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'carousel_4.png', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `contacted`
--

CREATE TABLE `contacted` (
  `id` bigint(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timecreated` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacted`
--

INSERT INTO `contacted` (`id`, `name`, `email`, `message`, `timecreated`) VALUES
(15, 'Jyotirmay Senapati', 'senapati.jyotirmay@gmail.com', 'nn', 1514515951);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter` bigint(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter`) VALUES
(237);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(10) NOT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `start` varchar(100) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `degree`, `start`, `end`, `school`, `url`, `address`, `description`, `createdin`, `updatedin`) VALUES
(1, 'Masters of Science in Computer Science', '2017', 'Present', 'Technical University of Munich.', 'http://www.tum.de', 'Munich, Germany', '<p>Continuing with Major in Machine Learning and Computer Vision.</p>', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Bachelor of Technology', '2009', '2013', 'Gandhi Institute of Engineering and Tech. Gunupur.', 'http://www.giet.edu', 'Odisha, India', '<p>Completed Bachelors under Biju Patnaik University of Technology. <a href=\"http://www.bput.ac.in/\" target=\"_blank\">(BPUT)</a>.</p>\r\n                                            <p>Secured 8.26 CGPA out of 10.</p>', '0000-00-00 00:00:00.000000', '2017-12-30 23:16:03.330309'),
(3, 'Intermediate', '2007', '2009', 'Maharaja Purna Chandra Junior College.', 'http://www.mpcautocollege.org.in/', 'Baripada, Odisha, India', '<p>Completed Intermediate in Science(PCMB) with first division.</p>', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Schooling & Matriculation', '2002', '2007', 'Jawahar Navodaya Vidyalaya.', 'http://www.jnvmayurbhanj.org/', 'Salbani, Odisha, India', '<p>Completed Schooling and Matriculation in JNV and secured 87.6%.</p>', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `start` varchar(100) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `designation`, `start`, `end`, `company`, `url`, `address`, `description`, `createdin`, `updatedin`) VALUES
(1, 'Student Intern', '2017', 'Present', 'Wirecard', 'https://www.wirecard.com/', 'Ascheim, Germany', '<p>Log based analysis using python, pandas and numpy.</p>\r\n                                            <p>Various business plot using matplotlib for enhanced performance testing.</p>', '0000-00-00 00:00:00.000000', '2017-12-30 02:53:07.452497'),
(2, 'Technical Solutions Engineer ', '2016', '2017', 'PegaSystems Worldwide India Ltd.', 'https://www.pega.com/', 'Bangalore, India', '<p>	Provide UI specialized consultancy as system architecture consultant to Pega system customers.</p>\r\n                                            <p>Member of Pega technical recruitment panel. </p>\r\n                                            <p>Train new team members on Pega UI Technologies like  JavaScript, HTML5 and CSS3. </p>', '0000-00-00 00:00:00.000000', '2017-12-30 21:23:20.901319'),
(3, 'System Engineer', '2014', '2016', 'Tata Consultancy Services Ltd.', 'http://www.tcs.com/', 'Bangalore, India', '<p>Developed hybrid and web mobile applications for TCS-Qualcomm internal employees using MEAN stack.</p>\r\n                                            <p>Analyzed around 150+ database tables for data migration of 20 lakhs+ business data.</p>\r\n                                            <p>Developed Learning Management System for Qualcomm using Moodle framework.</p>', '0000-00-00 00:00:00.000000', '2017-12-30 23:08:46.957861');

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `name`, `level`, `createdin`, `updatedin`) VALUES
(1, 'Playing Badminton', 75, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Cooking', 80, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Travelling', 85, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Reading', 61, '0000-00-00 00:00:00.000000', '2017-12-30 23:08:46.964153');

-- --------------------------------------------------------

--
-- Table structure for table `ide`
--

CREATE TABLE `ide` (
  `id` bigint(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ide`
--

INSERT INTO `ide` (`id`, `name`, `level`, `createdin`, `updatedin`) VALUES
(1, 'Jupyter Notebook', 65, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Eclipse', 80, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Visual Studio', 75, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `level`, `createdin`, `updatedin`) VALUES
(1, 'English', 75, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Odia', 90, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Hindi', 85, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Bengali', 50, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'German', 20, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `location_tracker`
--

CREATE TABLE `location_tracker` (
  `id` int(10) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `countryCode` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `regionName` varchar(255) DEFAULT NULL,
  `regionCode` varchar(255) DEFAULT NULL,
  `continentCode` varchar(255) DEFAULT NULL,
  `currencyCode` varchar(255) DEFAULT NULL,
  `currencySymbol` varchar(255) DEFAULT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `time` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_tracker`
--

INSERT INTO `location_tracker` (`id`, `country`, `countryCode`, `ip`, `regionName`, `regionCode`, `continentCode`, `currencyCode`, `currencySymbol`, `latitude`, `longitude`, `time`) VALUES
(98, 'Germany', 'DE', '62.216.207.126', 'Bavaria', '02', 'EU', 'EUR', '&#8364;', 48.1388, 11.5341, 1514962611),
(99, 'Germany', 'DE', '62.216.207.126', 'Bavaria', '02', 'EU', 'EUR', '&#8364;', 48.1388, 11.5341, 1514962678),
(100, 'Germany', 'DE', '62.216.207.126', 'Bavaria', '02', 'EU', 'EUR', '&#8364;', 48.1388, 11.5341, 1514962742);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `name`, `level`, `createdin`, `updatedin`) VALUES
(1, 'MS Excel', 65, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'MS Word', 65, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'PowerPoint', 70, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(10) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `majorabout` varchar(1000) DEFAULT NULL,
  `minorabout` varchar(1000) DEFAULT NULL,
  `currentrole` varchar(50) DEFAULT NULL,
  `currentrolein` varchar(50) DEFAULT NULL,
  `majorcommonabout` varchar(1000) DEFAULT NULL,
  `minorcommonabout` varchar(1000) DEFAULT NULL,
  `fblink` varchar(100) DEFAULT NULL,
  `twitterlink` varchar(100) DEFAULT NULL,
  `linkedinlink` varchar(100) DEFAULT NULL,
  `githublink` varchar(100) DEFAULT NULL,
  `stackoverflowlink` varchar(100) DEFAULT NULL,
  `profilepic1` varchar(100) DEFAULT NULL,
  `profilepic2` varchar(100) DEFAULT NULL,
  `profilepic3` varchar(100) DEFAULT NULL,
  `profilepic4` varchar(100) DEFAULT NULL,
  `profilepic5` varchar(100) DEFAULT NULL,
  `profilepic6` varchar(100) DEFAULT NULL,
  `mainpic` varchar(100) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `skypeid` varchar(100) DEFAULT NULL,
  `gdriveid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `firstname`, `lastname`, `dob`, `address`, `email`, `phone`, `website`, `majorabout`, `minorabout`, `currentrole`, `currentrolein`, `majorcommonabout`, `minorcommonabout`, `fblink`, `twitterlink`, `linkedinlink`, `githublink`, `stackoverflowlink`, `profilepic1`, `profilepic2`, `profilepic3`, `profilepic4`, `profilepic5`, `profilepic6`, `mainpic`, `createdin`, `updatedin`, `skypeid`, `gdriveid`) VALUES
(1, 'Jyotirmay', 'Senapati', 'February 13, 1992', 'Munich, Germany', 'contact@jyotirmays.com', '+49-1729475837', 'www.jyotirmays.com', 'Hey guys, I am Jyotirmay, fondly called as \'JJ\' by my close ones. Born and brought up in Baripada, a small town in Mayurbhanj district of Odisha, India. Currently, I am pursuing Masters in Munich, Germany. Playing around with python now a days.', 'Love to get into deep learning and computer vision related stuff. Also intersted in make use of machine learning algos for data analytics.', 'Masters in Informatik', 'Technical University of Munich', 'Enthusiast of ML and Computer Vision applications. Worked on XAMPP and MEAN stack based applications.', 'Love to code, cook and play badminton. An optimist, extrovert by heart.', 'https://www.facebook.com/Shaan.Exile', 'https://twitter.com/Shaan_143', 'https://www.linkedin.com/in/jyotirmay-senapati-jj-30615421/', 'https://github.com/jyotirmay123', 'https://stackoverflow.com/users/3861545/jyotirmay', 'me_1.png', 'me_2.png', 'me_3.png', 'me_4.png', NULL, NULL, '1609767_243680899152720_2567536551007501434_n.jpg', '2017-12-28 22:00:00.000000', '2017-12-28 22:00:00.000000', 'jyotirmay9', 'senapati.jyotirmay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `programming`
--

CREATE TABLE `programming` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programming`
--

INSERT INTO `programming` (`id`, `name`, `level`, `createdin`, `updatedin`) VALUES
(1, 'Python', 50, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'C,C++', 50, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'PHP', 70, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 'JavaScript', 70, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'MySQL', 75, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `hostedurl` varchar(1000) DEFAULT NULL,
  `codeurl` varchar(1000) DEFAULT NULL,
  `iconfile` varchar(1000) DEFAULT NULL,
  `filter` int(10) NOT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `hostedurl`, `codeurl`, `iconfile`, `filter`, `createdin`, `updatedin`) VALUES
(1, 'Productfeed', '<p>A project to transfer data in .csv and .json file into MySQL database.</p>', 'https://www.productfeed.jyotirmays.com', 'https://github.com/jyotirmay123/php_productfeed', 'productfeed.jpg', 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'My Blog', '<p>An Angular2 and Typescript based BLOG engine.</p>', 'https://www.blog.jyotirmays.com', 'https://github.com/jyotirmay123/myblog_1.0', 'myblog.jpg', 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Moodle', '<p>A learning management system built on top of PHP moodle framework.</p>', NULL, 'https://github.com/jyotirmay123/moodle', 'moodle.jpg', 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Associate Portal - Client', '<p>Client part of Associate Portal app.</p>', NULL, 'https://github.com/jyotirmay123/aportalweb', 'aportalweb.jpg', 2, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Associate Portal - Server', '<p>Service layer of Associate Portal app.</p>', NULL, 'https://github.com/jyotirmay123/aportal', 'aportal.jpg', 2, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 'Emotion Detection', '<p>A Deep learning proj on Human emotion detection.</p>', 'https://www.emotiondetection.jyotirmays.com', NULL, 'emotiondetection.jpg', 3, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'Log Anaysis', '<p>Log analysis using pandas and python for log file of 360K entries.</p>', NULL, 'https://github.com/jyotirmay123/Python-Work/tree/master/wirecard/log_analysis', 'loganalysis.jpg', 4, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, 'Cloud Computing', '<p>Exercise solutions of Cloud Computing class (TUM). </p>', NULL, 'https://github.com/jyotirmay123/CloudComputing', 'cloudcomputing_ex.jpg', 5, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 'Deep Learning for Computer Vision', '<p>Exercise solutions of DL4CV class (TUM). </p>', NULL, 'https://github.com/jyotirmay123/DL4CV', 'dl4cv_ex.jpg', 3, '2017-12-30 03:54:14.362781', '2017-12-30 03:54:14.362781'),
(10, 'Machine Learning', '<p>Exercise solutions of ML class (TUM). </p>', NULL, 'https://github.com/jyotirmay123/Machine-Learning', 'ml_ex.jpg', 5, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(11, 'Cryptography', '<p>Cryptographic algos implementation (TUM). </p>', NULL, 'https://github.com/jyotirmay123/Cryptography', 'cryptography.jpg', 5, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, 'jmsdotcom!', '<p>My personal website: www.jyotirmays.com </p>', 'https://www.jyotirmays.com', 'https://github.com/jyotirmay123/jmsdotcom', 'jmsdotcom.jpg', 1, '2017-12-30 03:54:45.183911', '2017-12-30 03:54:45.183911'),
(13, 'Compiler Construction', '<p>Compiler construction using python (TUM). </p>', NULL, 'https://github.com/jyotirmay123/Compiler', 'compiler_ex.jpg', 5, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(14, 'Augmented Reality', '<p>Exercise solutions of Augmented Reality class (TUM). </p>', NULL, 'https://github.com/jyotirmay123/AR', 'ar_ex.jpg', 3, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `projtypes`
--

CREATE TABLE `projtypes` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `filter` varchar(100) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projtypes`
--

INSERT INTO `projtypes` (`id`, `type`, `filter`, `createdin`, `updatedin`) VALUES
(1, 'Web Development', 'web', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Mobile Applications', 'mobile', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Computer Vision', 'vision', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Analytics', 'analytics', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Others', 'others', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(10) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `createdin` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updatedin` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `filename`, `createdin`, `updatedin`) VALUES
(1, 'jsr_updated.pdf', '0000-00-00 00:00:00.000000', '2017-12-30 23:30:25.512682');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacted`
--
ALTER TABLE `contacted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ide`
--
ALTER TABLE `ide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_tracker`
--
ALTER TABLE `location_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming`
--
ALTER TABLE `programming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projtypes`
--
ALTER TABLE `projtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacted`
--
ALTER TABLE `contacted`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ide`
--
ALTER TABLE `ide`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location_tracker`
--
ALTER TABLE `location_tracker`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programming`
--
ALTER TABLE `programming`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `projtypes`
--
ALTER TABLE `projtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
