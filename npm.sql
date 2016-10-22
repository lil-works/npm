-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2016 at 02:28 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `npm`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `id` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `start` datetime DEFAULT NULL,
  `stop` datetime DEFAULT NULL,
  `notFinished` tinyint(1) DEFAULT NULL,
  `closed` tinyint(1) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`id`, `creator`, `created`, `start`, `stop`, `notFinished`, `closed`, `description`) VALUES
(1, NULL, '2016-09-10 04:35:30', '2016-04-14 17:00:00', '2016-04-14 18:30:00', 0, 1, '<p class="p1"><span class="s1">jeudi 14-apr-2016</span></p>\r\n<p class="p1"><span class="s1">!</span></p>\r\n<p class="p1"><span class="s1">! Comment in observe-all + alarm nor ringing</span></p>\r\n<p class="p1"><span class="s1">!</span></p>\r\n<p class="p1"><span class="s1">16h00 UT : go in OBS to start observations</span></p>\r\n<p class="p1"><span class="s1">no alarm</span></p>\r\n<p class="p1"><span class="s1">17h00 UT : observations didn''t start beacause of PAUSE in observe-all at the beginning</span></p>\r\n<p class="p1"><span class="s1">18h30 --&gt; 19h08 : focus_source_1 (and 2) not defined in setup : OBS pause</span></p>\r\n<p class="p1"><span class="s1">no alarm</span></p>'),
(2, NULL, '2016-09-10 05:07:27', '2016-05-03 23:00:00', '2016-05-03 23:29:00', 0, 1, NULL),
(3, NULL, '2016-09-10 06:01:52', '2016-05-05 00:10:00', '2016-05-06 08:00:00', 0, 1, NULL),
(4, NULL, '2016-09-10 06:40:03', '2016-06-01 02:00:00', '2016-06-01 08:00:00', 0, 1, NULL),
(5, NULL, '2016-09-10 06:51:50', '2016-06-02 02:00:00', '2016-06-02 08:00:00', 0, 1, NULL),
(6, NULL, '2016-09-10 07:16:02', '2016-06-16 05:00:00', '2016-06-16 15:00:00', 0, 1, '<p class="p1"><span class="s2">05:00 Pb with ant 2 subreflector : Antenna off the array . Investigation during the day </span></p>'),
(7, NULL, '2016-09-10 07:35:02', '2016-06-28 03:40:00', '2016-06-28 08:00:00', 0, 1, '<p>Mardi 28-JUN-2016&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br /><br />03:40 Pb ant8 : WarmIF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />reboot a distance I2C , micro recepteur &amp; vme =&gt; pas mieux&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />Ant 8 off&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>'),
(8, NULL, '2016-09-10 10:20:18', '2016-06-02 02:00:00', '2016-06-02 08:00:00', 0, 1, '<p>Jeudi 02-JUN-2016&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />02:00 Probleme An8 Lo1ref refB en alarm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>'),
(9, NULL, '2016-09-10 10:22:31', '2016-06-16 05:00:00', '2016-06-16 13:00:00', 0, 1, '<p>05:00 Pb with ant 2 subreflector : Antenna off the array . Investigation during the day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>'),
(10, NULL, '2016-09-10 10:27:02', '2016-06-28 03:40:00', '2016-06-28 08:00:00', 0, 1, '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />03:40 Pb ant8 : WarmIF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />reboot a distance I2C , micro recepteur &amp; vme =&gt; pas mieux&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />Ant 8 off&nbsp;&nbsp;&nbsp;</p>'),
(11, NULL, '2016-09-10 14:24:02', '2016-07-29 02:00:00', '2016-07-29 08:00:00', 0, 1, '<p>Vendredi 29-JUL-2016&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />Microcoupures la veille jeudi apr&egrave;s-midi et soir.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />02:00 Ant 2 bloqu&eacute;e en Az El &agrave; 2h00 ==&gt; OFF de l''interf&eacute;ro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />DJ2 et DJ3 baie 3 (AZ/EL) OFF : r&eacute;arm&eacute;s OK.</p>'),
(12, NULL, '2016-09-10 14:27:29', '2016-08-01 02:00:00', '2016-08-01 08:00:00', 0, 1, '<p>Microcoupure la veille dans l''apr&egrave;s-midi ou le soir.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />02:00 Ant 2 bloqu&eacute;e en Az El &agrave; 2h00 ==&gt; OFF de l''interf&eacute;ro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />DJ3 baie 3 (AZ/EL) OFF : r&eacute;arm&eacute; OK.&nbsp;</p>'),
(13, NULL, '2016-09-10 14:31:45', '2016-08-02 04:05:00', '2016-08-02 08:00:00', 0, 1, '<p>Mardi 02-AUG-2016&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />04:05 DJ track OFF (pb degivrage) A4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />Antenne sur groupe jusqu''&agrave; 8h00&nbsp;</p>'),
(14, NULL, '2016-09-11 05:53:05', '2016-09-11 05:46:00', '2016-09-11 06:00:00', 0, 1, NULL),
(15, NULL, '2016-10-02 21:56:40', '2011-01-01 00:00:00', NULL, 0, 0, NULL),
(16, NULL, '2016-10-02 22:29:13', '2016-10-01 22:28:00', '2016-10-02 22:28:00', 0, 1, '<p>subreflector stuck. Looks like an encoder reading problem. Solved by itself.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `breakdowns_descriptors`
--

CREATE TABLE `breakdowns_descriptors` (
  `breakdown_id` int(11) NOT NULL,
  `descriptor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breakdowns_descriptors`
--

INSERT INTO `breakdowns_descriptors` (`breakdown_id`, `descriptor_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 5),
(2, 10),
(2, 11),
(2, 12),
(3, 10),
(3, 14),
(3, 15),
(3, 16),
(4, 10),
(4, 15),
(4, 18),
(5, 10),
(5, 19),
(5, 22),
(5, 23),
(6, 5),
(6, 24),
(6, 25),
(6, 26),
(7, 5),
(7, 8),
(7, 10),
(7, 15),
(7, 27),
(8, 5),
(8, 10),
(8, 19),
(8, 22),
(9, 5),
(9, 15),
(9, 24),
(9, 25),
(9, 26),
(10, 5),
(10, 10),
(10, 27),
(11, 5),
(11, 15),
(11, 18),
(11, 24),
(11, 32),
(11, 33),
(11, 34),
(12, 5),
(12, 15),
(12, 18),
(12, 24),
(12, 32),
(12, 33),
(12, 34),
(13, 5),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(14, 5),
(14, 8),
(14, 38),
(14, 39),
(15, 41),
(16, 5),
(16, 15),
(16, 25),
(16, 42),
(16, 43),
(16, 44),
(16, 45);

-- --------------------------------------------------------

--
-- Table structure for table `breakdowns_interferos`
--

CREATE TABLE `breakdowns_interferos` (
  `id` int(11) NOT NULL,
  `breakdown` int(11) NOT NULL,
  `interfero` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breakdowns_interferos`
--

INSERT INTO `breakdowns_interferos` (`id`, `breakdown`, `interfero`, `status`) VALUES
(1, 1, '1_1', 0),
(2, 1, '1_2', 0),
(3, 1, '1_3', 0),
(4, 1, '2_1', 0),
(5, 1, '2_2', 0),
(6, 1, '2_3', 0),
(7, 1, '3_1', 0),
(8, 1, '3_2', 0),
(9, 1, '3_3', 0),
(10, 1, '4_1', 0),
(11, 1, '4_2', 0),
(12, 1, '4_3', 0),
(13, 1, '4_4', 0),
(14, 1, '5_1', 0),
(15, 1, '5_2', 0),
(16, 1, '5_3', 0),
(17, 1, '5_4', 0),
(18, 1, '6_1', 0),
(19, 1, '6_2', 0),
(20, 1, '6_3', 0),
(21, 1, '6_4', 0),
(22, 1, '7_1', 0),
(23, 1, '7_2', 0),
(24, 1, '7_3', 0),
(25, 1, '7_4', 0),
(26, 1, '8_1', 0),
(27, 1, '8_2', 0),
(28, 1, '8_3', 0),
(29, 2, '1_1', 0),
(30, 2, '1_2', 0),
(31, 2, '1_3', 0),
(32, 2, '2_1', 0),
(33, 2, '2_2', 0),
(34, 2, '2_3', 0),
(35, 2, '3_1', 0),
(36, 2, '3_2', 0),
(37, 2, '3_3', 0),
(38, 2, '4_1', 0),
(39, 2, '4_2', 0),
(40, 2, '4_3', 0),
(41, 2, '4_4', 0),
(42, 2, '5_1', 0),
(43, 2, '5_2', 0),
(44, 2, '5_3', 0),
(45, 2, '5_4', 0),
(46, 2, '6_1', 0),
(47, 2, '6_2', 0),
(48, 2, '6_3', 0),
(49, 2, '6_4', 0),
(50, 2, '7_1', 0),
(51, 2, '7_2', 0),
(52, 2, '7_3', 0),
(53, 2, '7_4', 0),
(54, 2, '8_1', 0),
(55, 2, '8_2', 0),
(56, 2, '8_3', 0),
(57, 3, '1_1', 1),
(58, 3, '1_2', 1),
(59, 3, '1_3', 1),
(60, 3, '2_1', 1),
(61, 3, '2_2', 1),
(62, 3, '2_3', 1),
(63, 3, '3_1', 1),
(64, 3, '3_2', 1),
(65, 3, '3_3', 1),
(66, 3, '4_1', 1),
(67, 3, '4_2', 1),
(68, 3, '4_3', 1),
(69, 3, '4_4', 1),
(70, 3, '5_1', 1),
(71, 3, '5_2', 1),
(72, 3, '5_3', 1),
(73, 3, '5_4', 1),
(74, 3, '6_1', 1),
(75, 3, '6_2', 1),
(76, 3, '6_3', 1),
(77, 3, '6_4', 1),
(78, 3, '7_1', 1),
(79, 3, '7_2', 1),
(80, 3, '7_3', 1),
(81, 3, '7_4', 1),
(82, 3, '8_1', 0),
(83, 3, '8_2', 0),
(84, 3, '8_3', 0),
(85, 4, '1_1', 1),
(86, 4, '1_2', 1),
(87, 4, '1_3', 1),
(88, 4, '2_1', 1),
(89, 4, '2_2', 1),
(90, 4, '2_3', 1),
(91, 4, '3_1', 1),
(92, 4, '3_2', 1),
(93, 4, '3_3', 1),
(94, 4, '4_1', 1),
(95, 4, '4_2', 1),
(96, 4, '4_3', 1),
(97, 4, '4_4', 1),
(98, 4, '5_1', 1),
(99, 4, '5_2', 1),
(100, 4, '5_3', 1),
(101, 4, '5_4', 1),
(102, 4, '6_1', 1),
(103, 4, '6_2', 1),
(104, 4, '6_3', 1),
(105, 4, '6_4', 1),
(106, 4, '7_1', 1),
(107, 4, '7_2', 1),
(108, 4, '7_3', 1),
(109, 4, '7_4', 1),
(110, 4, '8_1', 0),
(111, 4, '8_2', 0),
(112, 4, '8_3', 0),
(113, 5, '1_1', 1),
(114, 5, '1_2', 1),
(115, 5, '1_3', 1),
(116, 5, '2_1', 1),
(117, 5, '2_2', 1),
(118, 5, '2_3', 1),
(119, 5, '3_1', 1),
(120, 5, '3_2', 1),
(121, 5, '3_3', 1),
(122, 5, '4_1', 1),
(123, 5, '4_2', 1),
(124, 5, '4_3', 1),
(125, 5, '4_4', 1),
(126, 5, '5_1', 1),
(127, 5, '5_2', 1),
(128, 5, '5_3', 1),
(129, 5, '5_4', 1),
(130, 5, '6_1', 1),
(131, 5, '6_2', 1),
(132, 5, '6_3', 1),
(133, 5, '6_4', 1),
(134, 5, '7_1', 1),
(135, 5, '7_2', 1),
(136, 5, '7_3', 1),
(137, 5, '7_4', 1),
(138, 5, '8_1', 0),
(139, 5, '8_2', 0),
(140, 5, '8_3', 0),
(141, 6, '1_1', 1),
(142, 6, '1_2', 1),
(143, 6, '1_3', 1),
(144, 6, '2_1', 0),
(145, 6, '2_2', 0),
(146, 6, '2_3', 0),
(147, 6, '3_1', 1),
(148, 6, '3_2', 1),
(149, 6, '3_3', 1),
(150, 6, '4_1', 1),
(151, 6, '4_2', 1),
(152, 6, '4_3', 1),
(153, 6, '4_4', 1),
(154, 6, '5_1', 1),
(155, 6, '5_2', 1),
(156, 6, '5_3', 1),
(157, 6, '5_4', 1),
(158, 6, '6_1', 1),
(159, 6, '6_2', 1),
(160, 6, '6_3', 1),
(161, 6, '6_4', 1),
(162, 6, '7_1', 1),
(163, 6, '7_2', 1),
(164, 6, '7_3', 1),
(165, 6, '7_4', 1),
(166, 6, '8_1', 1),
(167, 6, '8_2', 1),
(168, 6, '8_3', 1),
(169, 7, '1_1', 1),
(170, 7, '1_2', 1),
(171, 7, '1_3', 1),
(172, 7, '2_1', 1),
(173, 7, '2_2', 1),
(174, 7, '2_3', 1),
(175, 7, '3_1', 1),
(176, 7, '3_2', 1),
(177, 7, '3_3', 1),
(178, 7, '4_1', 1),
(179, 7, '4_2', 1),
(180, 7, '4_3', 1),
(181, 7, '4_4', 1),
(182, 7, '5_1', 1),
(183, 7, '5_2', 1),
(184, 7, '5_3', 1),
(185, 7, '5_4', 1),
(186, 7, '6_1', 1),
(187, 7, '6_2', 1),
(188, 7, '6_3', 1),
(189, 7, '6_4', 1),
(190, 7, '7_1', 1),
(191, 7, '7_2', 1),
(192, 7, '7_3', 1),
(193, 7, '7_4', 1),
(194, 7, '8_1', 0),
(195, 7, '8_2', 0),
(196, 7, '8_3', 0),
(197, 8, '1_1', 1),
(198, 8, '1_2', 1),
(199, 8, '1_3', 1),
(200, 8, '2_1', 1),
(201, 8, '2_2', 1),
(202, 8, '2_3', 1),
(203, 8, '3_1', 1),
(204, 8, '3_2', 1),
(205, 8, '3_3', 1),
(206, 8, '4_1', 1),
(207, 8, '4_2', 1),
(208, 8, '4_3', 1),
(209, 8, '4_4', 1),
(210, 8, '5_1', 1),
(211, 8, '5_2', 1),
(212, 8, '5_3', 1),
(213, 8, '5_4', 1),
(214, 8, '6_1', 1),
(215, 8, '6_2', 1),
(216, 8, '6_3', 1),
(217, 8, '6_4', 1),
(218, 8, '7_1', 1),
(219, 8, '7_2', 1),
(220, 8, '7_3', 1),
(221, 8, '7_4', 1),
(222, 8, '8_1', 0),
(223, 8, '8_2', 0),
(224, 8, '8_3', 0),
(225, 9, '1_1', 1),
(226, 9, '1_2', 1),
(227, 9, '1_3', 1),
(228, 9, '2_1', 0),
(229, 9, '2_2', 0),
(230, 9, '2_3', 0),
(231, 9, '3_1', 1),
(232, 9, '3_2', 1),
(233, 9, '3_3', 1),
(234, 9, '4_1', 1),
(235, 9, '4_2', 1),
(236, 9, '4_3', 1),
(237, 9, '4_4', 1),
(238, 9, '5_1', 1),
(239, 9, '5_2', 1),
(240, 9, '5_3', 1),
(241, 9, '5_4', 1),
(242, 9, '6_1', 1),
(243, 9, '6_2', 1),
(244, 9, '6_3', 1),
(245, 9, '6_4', 1),
(246, 9, '7_1', 1),
(247, 9, '7_2', 1),
(248, 9, '7_3', 1),
(249, 9, '7_4', 1),
(250, 9, '8_1', 1),
(251, 9, '8_2', 1),
(252, 9, '8_3', 1),
(253, 10, '1_1', 1),
(254, 10, '1_2', 1),
(255, 10, '1_3', 1),
(256, 10, '2_1', 1),
(257, 10, '2_2', 1),
(258, 10, '2_3', 1),
(259, 10, '3_1', 1),
(260, 10, '3_2', 1),
(261, 10, '3_3', 1),
(262, 10, '4_1', 1),
(263, 10, '4_2', 1),
(264, 10, '4_3', 1),
(265, 10, '4_4', 1),
(266, 10, '5_1', 1),
(267, 10, '5_2', 1),
(268, 10, '5_3', 1),
(269, 10, '5_4', 1),
(270, 10, '6_1', 1),
(271, 10, '6_2', 1),
(272, 10, '6_3', 1),
(273, 10, '6_4', 1),
(274, 10, '7_1', 1),
(275, 10, '7_2', 1),
(276, 10, '7_3', 1),
(277, 10, '7_4', 1),
(278, 10, '8_1', 0),
(279, 10, '8_2', 0),
(280, 10, '8_3', 0),
(281, 11, '1_1', 1),
(282, 11, '1_2', 1),
(283, 11, '1_3', 1),
(284, 11, '2_1', 0),
(285, 11, '2_2', 0),
(286, 11, '2_3', 0),
(287, 11, '3_1', 1),
(288, 11, '3_2', 1),
(289, 11, '3_3', 1),
(290, 11, '4_1', 1),
(291, 11, '4_2', 1),
(292, 11, '4_3', 1),
(293, 11, '4_4', 1),
(294, 11, '5_1', 1),
(295, 11, '5_2', 1),
(296, 11, '5_3', 1),
(297, 11, '5_4', 1),
(298, 11, '6_1', 1),
(299, 11, '6_2', 1),
(300, 11, '6_3', 1),
(301, 11, '6_4', 1),
(302, 11, '7_1', 1),
(303, 11, '7_2', 1),
(304, 11, '7_3', 1),
(305, 11, '7_4', 1),
(306, 11, '8_1', 1),
(307, 11, '8_2', 1),
(308, 11, '8_3', 1),
(309, 12, '1_1', 1),
(310, 12, '1_2', 1),
(311, 12, '1_3', 1),
(312, 12, '2_1', 0),
(313, 12, '2_2', 0),
(314, 12, '2_3', 0),
(315, 12, '3_1', 1),
(316, 12, '3_2', 1),
(317, 12, '3_3', 1),
(318, 12, '4_1', 1),
(319, 12, '4_2', 1),
(320, 12, '4_3', 1),
(321, 12, '4_4', 1),
(322, 12, '5_1', 1),
(323, 12, '5_2', 1),
(324, 12, '5_3', 1),
(325, 12, '5_4', 1),
(326, 12, '6_1', 1),
(327, 12, '6_2', 1),
(328, 12, '6_3', 1),
(329, 12, '6_4', 1),
(330, 12, '7_1', 1),
(331, 12, '7_2', 1),
(332, 12, '7_3', 1),
(333, 12, '7_4', 1),
(334, 12, '8_1', 1),
(335, 12, '8_2', 1),
(336, 12, '8_3', 1),
(337, 13, '1_1', 1),
(338, 13, '1_2', 1),
(339, 13, '1_3', 1),
(340, 13, '2_1', 1),
(341, 13, '2_2', 1),
(342, 13, '2_3', 1),
(343, 13, '3_1', 1),
(344, 13, '3_2', 1),
(345, 13, '3_3', 1),
(346, 13, '4_1', 0),
(347, 13, '4_2', 0),
(348, 13, '4_3', 0),
(349, 13, '4_4', 0),
(350, 13, '5_1', 1),
(351, 13, '5_2', 1),
(352, 13, '5_3', 1),
(353, 13, '5_4', 1),
(354, 13, '6_1', 1),
(355, 13, '6_2', 1),
(356, 13, '6_3', 1),
(357, 13, '6_4', 1),
(358, 13, '7_1', 1),
(359, 13, '7_2', 1),
(360, 13, '7_3', 1),
(361, 13, '7_4', 1),
(362, 13, '8_1', 1),
(363, 13, '8_2', 1),
(364, 13, '8_3', 1),
(365, 14, '1_1', 0),
(366, 14, '1_2', 0),
(367, 14, '1_3', 0),
(368, 14, '2_1', 0),
(369, 14, '2_2', 0),
(370, 14, '2_3', 0),
(371, 14, '3_1', 0),
(372, 14, '3_2', 0),
(373, 14, '3_3', 0),
(374, 14, '4_1', 0),
(375, 14, '4_2', 0),
(376, 14, '4_3', 0),
(377, 14, '4_4', 0),
(378, 14, '5_1', 0),
(379, 14, '5_2', 0),
(380, 14, '5_3', 0),
(381, 14, '5_4', 0),
(382, 14, '6_1', 0),
(383, 14, '6_2', 0),
(384, 14, '6_3', 0),
(385, 14, '6_4', 0),
(386, 14, '7_1', 0),
(387, 14, '7_2', 0),
(388, 14, '7_3', 0),
(389, 14, '7_4', 0),
(390, 14, '8_1', 0),
(391, 14, '8_2', 0),
(392, 14, '8_3', 0),
(393, 15, '1_1', 1),
(394, 15, '1_2', 1),
(395, 15, '1_3', 1),
(396, 15, '2_1', 1),
(397, 15, '2_2', 1),
(398, 15, '2_3', 1),
(399, 15, '3_1', 1),
(400, 15, '3_2', 1),
(401, 15, '3_3', 1),
(402, 15, '4_1', 1),
(403, 15, '4_2', 1),
(404, 15, '4_3', 1),
(405, 15, '4_4', 1),
(406, 15, '5_1', 1),
(407, 15, '5_2', 1),
(408, 15, '5_3', 1),
(409, 15, '5_4', 1),
(410, 15, '6_1', 1),
(411, 15, '6_2', 1),
(412, 15, '6_3', 1),
(413, 15, '6_4', 1),
(414, 15, '7_1', 1),
(415, 15, '7_2', 1),
(416, 15, '7_3', 1),
(417, 15, '7_4', 1),
(418, 15, '8_1', 1),
(419, 15, '8_2', 1),
(420, 15, '8_3', 1),
(421, 16, '1_1', 1),
(422, 16, '1_2', 1),
(423, 16, '1_3', 1),
(424, 16, '2_1', 1),
(425, 16, '2_2', 1),
(426, 16, '2_3', 1),
(427, 16, '3_1', 1),
(428, 16, '3_2', 1),
(429, 16, '3_3', 1),
(430, 16, '4_1', 1),
(431, 16, '4_2', 1),
(432, 16, '4_3', 1),
(433, 16, '4_4', 1),
(434, 16, '5_1', 1),
(435, 16, '5_2', 1),
(436, 16, '5_3', 1),
(437, 16, '5_4', 1),
(438, 16, '6_1', 0),
(439, 16, '6_2', 0),
(440, 16, '6_3', 0),
(441, 16, '6_4', 0),
(442, 16, '7_1', 1),
(443, 16, '7_2', 1),
(444, 16, '7_3', 1),
(445, 16, '7_4', 1),
(446, 16, '8_1', 1),
(447, 16, '8_2', 1),
(448, 16, '8_3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `descriptor`
--

CREATE TABLE `descriptor` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `descriptor`
--

INSERT INTO `descriptor` (`id`, `category`, `label`, `tag`) VALUES
(1, 1, 'alarm', 'alarm'),
(2, 1, 'observation software', 'observationsoftware'),
(3, 1, 'observe-all', 'observeall'),
(5, 4, 'operator', 'operator'),
(6, 2, 'stopped', 'stopped'),
(7, 3, 'correct', 'correct'),
(8, 3, 'restart', 'restart'),
(10, 1, 'antenna 8', 'antenna8'),
(11, 1, 'mixer box', 'mixerbox'),
(12, 4, 'patrice serre', 'patriceserre'),
(14, 1, 'rack laser', 'racklaser'),
(15, 2, 'stuck', 'stuck'),
(16, 3, 'on/off', 'onoff'),
(18, 1, 'elevation axis', 'elevationaxis'),
(19, 1, 'lo1ref B', 'lo1refb'),
(22, 2, 'lock alarm', 'lockalarm'),
(23, 3, 'changed', 'changed'),
(24, 1, 'antenna 2', 'antenna2'),
(25, 1, 'subreflector', 'subreflector'),
(26, 4, 'bure tech', 'buretech'),
(27, 1, 'i2c', 'i2c'),
(28, 3, 'reboot', 'reboot'),
(31, 1, 'test', 'test'),
(32, 1, 'azimut axis', 'azimutaxis'),
(33, 1, 'Baie 3', 'baie3'),
(34, 3, 'reset circuit breaker', 'resetcircuitbreaker'),
(35, 1, 'antenna 4', 'antenna4'),
(36, 1, 'DJ track', 'djtrack'),
(37, 2, 'off', 'off'),
(38, 1, 'widex', 'widex'),
(39, 2, 'disappear', 'disappear'),
(41, 1, 'ksfldjsdjkf', 'ksfldjsdjkf'),
(42, 1, 'A6', 'a6'),
(43, 1, 'encoder', 'encoder'),
(44, 3, 'subref_check', 'subrefcheck'),
(45, 4, 'masnada', 'masnada');

-- --------------------------------------------------------

--
-- Table structure for table `descriptor_category`
--

CREATE TABLE `descriptor_category` (
  `id` int(11) NOT NULL,
  `label` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pos` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `descriptor_category`
--

INSERT INTO `descriptor_category` (`id`, `label`, `pos`, `color`) VALUES
(1, 'element', 1, '#BB7777'),
(2, 'status', 2, '#77BB77'),
(3, 'action', 3, '#7777BB '),
(4, 'contributor', 4, '#BBBB77');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interfero`
--

CREATE TABLE `interfero` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `antenna` int(11) NOT NULL,
  `band` int(11) NOT NULL,
  `available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interfero`
--

INSERT INTO `interfero` (`id`, `antenna`, `band`, `available`) VALUES
('1_1', 1, 1, 1),
('1_2', 1, 2, 1),
('1_3', 1, 3, 1),
('1_4', 1, 4, 0),
('2_1', 2, 1, 1),
('2_2', 2, 2, 1),
('2_3', 2, 3, 1),
('2_4', 2, 4, 0),
('3_1', 3, 1, 1),
('3_2', 3, 2, 1),
('3_3', 3, 3, 1),
('3_4', 3, 4, 0),
('4_1', 4, 1, 1),
('4_2', 4, 2, 1),
('4_3', 4, 3, 1),
('4_4', 4, 4, 1),
('5_1', 5, 1, 1),
('5_2', 5, 2, 1),
('5_3', 5, 3, 1),
('5_4', 5, 4, 1),
('6_1', 6, 1, 1),
('6_2', 6, 2, 1),
('6_3', 6, 3, 1),
('6_4', 6, 4, 1),
('7_1', 7, 1, 1),
('7_2', 7, 2, 1),
('7_3', 7, 3, 1),
('7_4', 7, 4, 1),
('8_1', 8, 1, 1),
('8_2', 8, 2, 1),
('8_3', 8, 3, 1),
('8_4', 8, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `synonym`
--

CREATE TABLE `synonym` (
  `id` int(11) NOT NULL,
  `descriptor` int(11) DEFAULT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `synonym`
--

INSERT INTO `synonym` (`id`, `descriptor`, `label`) VALUES
(1, 5, 'oper'),
(2, 5, 'operateur'),
(3, 10, 'ant8'),
(4, 10, 'ant 8'),
(5, 10, 'antenne 8'),
(6, 10, 'antenne8'),
(7, 25, 'subref'),
(8, 25, 'subreflecteur'),
(9, 24, 'ant2'),
(10, 24, 'ant 2'),
(11, 24, 'antenne 2'),
(12, 24, 'antenne2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3969DA7BC06EA63` (`creator`);

--
-- Indexes for table `breakdowns_descriptors`
--
ALTER TABLE `breakdowns_descriptors`
  ADD PRIMARY KEY (`breakdown_id`,`descriptor_id`),
  ADD KEY `IDX_1055FE6D67F54C40` (`breakdown_id`),
  ADD KEY `IDX_1055FE6D2A13D45` (`descriptor_id`);

--
-- Indexes for table `breakdowns_interferos`
--
ALTER TABLE `breakdowns_interferos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_84D12D9B3969DA7` (`breakdown`),
  ADD KEY `IDX_84D12D980F18E0F` (`interfero`);

--
-- Indexes for table `descriptor`
--
ALTER TABLE `descriptor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryTag` (`category`,`tag`),
  ADD KEY `IDX_392760264C19C1` (`category`);

--
-- Indexes for table `descriptor_category`
--
ALTER TABLE `descriptor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indexes for table `interfero`
--
ALTER TABLE `interfero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synonym`
--
ALTER TABLE `synonym`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A6315EC8EA750E8` (`label`),
  ADD KEY `IDX_A6315EC83927602` (`descriptor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `breakdowns_interferos`
--
ALTER TABLE `breakdowns_interferos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=449;
--
-- AUTO_INCREMENT for table `descriptor`
--
ALTER TABLE `descriptor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `descriptor_category`
--
ALTER TABLE `descriptor_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `synonym`
--
ALTER TABLE `synonym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD CONSTRAINT `FK_B3969DA7BC06EA63` FOREIGN KEY (`creator`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `breakdowns_descriptors`
--
ALTER TABLE `breakdowns_descriptors`
  ADD CONSTRAINT `FK_1055FE6D2A13D45` FOREIGN KEY (`descriptor_id`) REFERENCES `descriptor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1055FE6D67F54C40` FOREIGN KEY (`breakdown_id`) REFERENCES `breakdown` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `breakdowns_interferos`
--
ALTER TABLE `breakdowns_interferos`
  ADD CONSTRAINT `FK_84D12D980F18E0F` FOREIGN KEY (`interfero`) REFERENCES `interfero` (`id`),
  ADD CONSTRAINT `FK_84D12D9B3969DA7` FOREIGN KEY (`breakdown`) REFERENCES `breakdown` (`id`);

--
-- Constraints for table `descriptor`
--
ALTER TABLE `descriptor`
  ADD CONSTRAINT `FK_392760264C19C1` FOREIGN KEY (`category`) REFERENCES `descriptor_category` (`id`);

--
-- Constraints for table `synonym`
--
ALTER TABLE `synonym`
  ADD CONSTRAINT `FK_A6315EC83927602` FOREIGN KEY (`descriptor`) REFERENCES `descriptor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
