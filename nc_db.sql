-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 08:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE `messagein` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageParts` int(11) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagein`
--

INSERT INTO `messagein` (`Id`, `SendTime`, `ReceiveTime`, `MessageFrom`, `MessageTo`, `SMSC`, `MessageText`, `MessageType`, `MessageParts`, `MessagePDU`, `Gateway`, `UserId`) VALUES
(1, '2017-11-02 05:19:29', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FB0302,870906890101C651018715060350524F585932000187070603534D415254204D4D530001C65201872F060350524F5859325F3100018720060331302E3130322E36312E343600018721068501872206034E4150475052535F320001C6530187230603383038300001010101C600015501873606037734000187070603534D4152', NULL, NULL, NULL, NULL, NULL),
(2, '2017-11-02 05:19:34', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FB0303,54204D4D5300018739060350524F585932000187340603687474703A2F2F31302E3130322E36312E3233383A383030322F00010101', NULL, NULL, NULL, NULL, NULL),
(3, '2017-11-02 05:19:14', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FA0201,6C062F1F2DB69180923646443032463643313042394231363544354242413143304143413232424334343239453236423600030B6A00C54503312E310001C6560187070603534D41525420494E5445524E4554000101C65501871106034E4150475052535F330001871006AB0187070603534D41525420494E5445524E455400', NULL, NULL, NULL, NULL, NULL),
(4, '2017-11-02 05:19:19', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FA0202,0187140187080603696E7465726E65740001870906890101C600015501873606037732000187070603534D41525420494E5445524E45540001872206034E4150475052535F330001C65901873A0603687474703A2F2F6D2E736D6172742E636F6D2E7068000187070603484F4D450001871C01010101', NULL, NULL, NULL, NULL, NULL),
(5, '2017-11-02 05:19:24', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FB0301,6D062F1F2DB69180923432373832413042464145313131463335303137323744303141433530304134373930423843334500030B6A00C54503312E310001C6560187070603534D415254204D4D53000101C65501871106034E4150475052535F320001871006AB0187070603534D415254204D4D530001870806036D6D730001', NULL, NULL, NULL, NULL, NULL),
(6, '2017-11-02 05:19:29', NULL, '211', '+639305235027', NULL, '0B05040B8423F00003FB0302,870906890101C651018715060350524F585932000187070603534D415254204D4D530001C65201872F060350524F5859325F3100018720060331302E3130322E36312E343600018721068501872206034E4150475052535F320001C6530187230603383038300001010101C600015501873606037734000187070603534D4152', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messagelog`
--

CREATE TABLE `messagelog` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(80) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessageParts` int(11) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Connector` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagelog`
--

INSERT INTO `messagelog` (`Id`, `SendTime`, `ReceiveTime`, `StatusCode`, `StatusText`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `MessageId`, `ErrorCode`, `ErrorText`, `Gateway`, `MessageParts`, `MessagePDU`, `Connector`, `UserId`, `UserInfo`) VALUES
(1, '2018-01-27 20:38:08', NULL, 300, NULL, '09305235027', 'Hello Poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2018-01-27 20:39:06', NULL, 300, NULL, '09305235027', 'Hello Poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2018-01-27 20:49:14', NULL, 300, NULL, '09305235027', 'hi poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2018-01-27 20:50:56', NULL, 300, NULL, '09508767867', 'hi poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2018-02-09 17:52:26', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2018-02-09 17:54:27', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2018-02-09 17:55:11', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2018-02-09 17:59:11', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2018-02-09 18:00:12', NULL, 200, NULL, '+639486457414', 'yes', NULL, NULL, '1:+639486457414:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2018-02-09 18:01:12', NULL, 200, NULL, '+639486457414', 'Test to send', NULL, NULL, '1:+639486457414:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2018-02-09 18:02:58', NULL, 200, NULL, '+639486457414', 'FROM JANNO : Confirmed', NULL, NULL, '1:+639486457414:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2018-02-09 18:05:22', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2018-02-09 18:08:14', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2018-02-09 18:21:41', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2018-04-01 22:17:34', NULL, 300, NULL, '09123586545', 'Your code is .6048', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2018-04-01 22:18:20', NULL, 300, NULL, '09123586545', 'Your code is .9305', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2018-04-01 22:20:15', NULL, 300, NULL, '09123586545', 'Your code is .2924', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2018-04-01 22:42:36', NULL, 300, NULL, '09123586545', 'Your code is .6938', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2018-04-02 00:40:53', NULL, 300, NULL, '9956112920', 'Your code is .7290', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2018-04-02 00:42:14', NULL, 300, NULL, '9956112920', 'Your code is .4506', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2018-04-02 00:43:46', NULL, 300, NULL, '9956112920', 'Your code is .4506', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2018-04-02 00:45:56', NULL, 300, NULL, '09956112920', 'Your code is .6988', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2018-04-02 00:47:17', NULL, 300, NULL, '09956112920', 'Your code is .4380', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2018-04-02 00:48:53', NULL, 200, NULL, '639956112920', 'Your code is .5936', NULL, NULL, '1:639956112920:129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2018-04-02 00:50:29', NULL, 200, NULL, '639956112920', 'Your code is .5349', NULL, NULL, '1:639956112920:130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2018-04-02 00:53:32', NULL, 200, NULL, '639956112920', 'Your code is', NULL, NULL, '1:639956112920:131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2018-04-02 00:54:43', NULL, 200, NULL, '639956112920', 'Your code is 3407', NULL, NULL, '1:639956112920:132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE `messageout` (
  `Id` int(11) NOT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `ValidityPeriod` int(11) DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT 0,
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messageout`
--

INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `Gateway`, `UserId`, `UserInfo`, `Priority`, `Scheduled`, `ValidityPeriod`, `IsSent`, `IsRead`) VALUES
(32, '09062064810', 'Gencarz Unlimited', 'From Urdaneta City: Your order has been Confirmed. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(33, '09062064810', 'Gencarz Unlimited', 'From Urdaneta City: Your order has been Shipped. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(34, '09062064810', 'Gencarz Unlimited', 'From Urdaneta City: Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(35, '09062064810', 'Gencarz Unlimited', 'From Urdaneta City: Your order has been Confirmed. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(36, '09062064810', 'Gencarz Unlimited', 'Your order has been Shipped. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(37, '09062064810', 'Gencarz Unlimited', 'Your order has been Shipped. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(38, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(39, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(40, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(41, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(42, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(43, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(44, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(45, '09062064810', 'Gencarz Unlimited', 'Your order has been Confirmed. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(46, '09062064810', 'Gencarz Unlimited', 'Your order has been Shipped. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(47, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 8,150.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(48, '09062064810', 'Gencarz Unlimited', 'Your order has been Confirmed. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(49, '09062064810', 'Gencarz Unlimited', 'Your order has been Shipped. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(50, '09062064810', 'Gencarz Unlimited', 'Your order has been Delivered. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(51, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(52, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(53, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(54, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(55, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(56, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(57, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(58, '09062064810', 'Gencarz Unlimited', 'Your order has been Cancelled. The amount is 9,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(59, '09062064810', 'Gencarz Unlimited', 'Sorry, it seems like you are still not verified. The amount is 8,050.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(60, '09062064810', 'Gencarz Unlimited', 'Ayaw ko na sya The amount is 43,050.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(61, '09567584985', 'Gencarz Unlimited', 'Processing The amount is 5,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(62, '09567584985', 'Gencarz Unlimited', 'Your order is on the way by our trusted Couriers. The amount is 5,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(63, '09567584985', 'Gencarz Unlimited', 'Your order has been delivered. The amount is 5,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(64, '09567584985', 'Gencarz Unlimited', 'asd The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(65, '09567584985', 'Gencarz Unlimited', 'asd The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(66, '09567584985', 'Gencarz Unlimited', 'yaw ko The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(67, '09567584985', 'Gencarz Unlimited', 'We regret to inform you that the item you ordered is currently out of stock or unavailable. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(68, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(69, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(70, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(71, '09567584985', 'Gencarz Unlimited', 'found a better deal or price for the same product elsewhere and wants to cancel the current order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(72, '09567584985', 'Gencarz Unlimited', 'found a better deal or price for the same product elsewhere and wants to cancel the current order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(73, '09567584985', 'Gencarz Unlimited', 'Your order is confirmed we are processing your order The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(74, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(75, '09567584985', 'Gencarz Unlimited', 'Your order has been cancelled as you requested. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(76, '09567584985', 'Gencarz Unlimited', 'found a better deal or price for the same product elsewhere and wants to cancel the current order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(77, '09567584985', 'Gencarz Unlimited', 'Your order has been cancelled as you requested. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(78, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(79, '09567584985', 'Gencarz Unlimited', 'Your order cannot be cancelled and the order has been confirmed. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(80, '09567584985', 'Gencarz Unlimited', 'Your order is on the way by our trusted Couriers. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(81, '09567584985', 'Gencarz Unlimited', 'Your order has been delivered. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(82, '09567584985', 'Gencarz Unlimited', 'change of mind or no longer wish to proceed with the order. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(83, '09567584985', 'Gencarz Unlimited', 'Your order cannot be cancelled and the order has been confirmed. The amount is 8,250.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(84, '09062064810', 'Gencarz Unlimited', 'Your code is 1416', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(85, '09062064810', 'Gencarz Unlimited', 'experienced significant delays in the delivery process, causing inconvenience or no longer needing the product. The amount is 8,050.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(86, '09062064810', 'Gencarz Unlimited', 'Your order cannot be cancelled and the order has been confirmed. The amount is 8,050.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(87, '09062064810', 'Gencarz Unlimited', 'found a better deal or price for the same services elsewhere and wants to cancel the current order. The estimated price is 700.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(88, '09062064810', 'Gencarz Unlimited', 'Your Service Booking Schedule is confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(89, '09062064810', 'Gencarz Unlimited', 'Your Service Booking Schedule is confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(90, '09062064810', 'Gencarz Unlimited', 'Your Service Booking Schedule is confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(91, '09062064810', 'Gencarz Unlimited', 'Your order has been cancelled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(92, '09062064810', 'Gencarz Unlimited', 'Your order has been cancelled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(93, '09062064810', 'Gencarz Unlimited', 'Your order has been cancelled', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(94, '09062064810', 'Gencarz Unlimited', 'Your order is confirmed we are processing your order The amount is 8,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(95, '09062064810', 'Gencarz Unlimited', 'Your order is on the way by our trusted Couriers. The amount is 8,550.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `iders` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`iders`, `PROID`, `rateIndex`) VALUES
(23423, 201759, 5),
(201757, 201743, 3),
(234234, 201759, 4),
(324282, 201752, 3),
(324283, 201751, 4),
(324284, 201750, 4),
(324285, 201746, 4),
(324286, 201745, 5),
(324287, 201744, 3),
(324288, 201743, 5),
(324289, 201743, 4),
(324291, 201743, 4),
(324292, 201743, 5),
(324293, 201756, 5),
(324294, 201743, 5),
(324295, 201757, 5),
(324296, 201743, 3),
(324297, 201751, 4),
(324298, 201751, 5),
(324299, 201757, 4),
(324300, 201757, 5),
(324301, 201750, 5),
(324302, 201754, 3),
(324303, 201755, 5),
(324304, 201743, 4),
(324305, 201743, 4),
(324306, 201756, 3),
(324307, 201756, 3),
(324308, 201756, 4),
(324309, 201756, 4),
(324310, 201756, 4),
(324311, 201743, 1),
(324312, 201750, 5),
(324313, 201750, 1),
(324314, 201750, 5),
(324315, 201750, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(255) NOT NULL,
  `serv_price` int(255) NOT NULL,
  `serv_ava` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `ctype_a` varchar(255) NOT NULL,
  `ctype_b` varchar(255) NOT NULL,
  `ctype_c` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `serv_name`, `serv_price`, `serv_ava`, `status`, `image`, `description`, `images`, `ctype_a`, `ctype_b`, `ctype_c`) VALUES
(202300193, 'Oil/oil filter changed', 900, '', 1, '', 'changing of the oil; plus a safety inspection that examines the oil filter, cabin filter, a check of brake pads, tires, fluids, etc.                                                                         ', 'uploaded_photos/2(1).png', '700', '800', '900'),
(202300194, 'Wiper blades replacement', 300, '', 1, '', 'Wiper blades replacement', 'uploaded_photos/3(1).png', '300', '450', '750'),
(202300195, 'Air Filter Replacement', 700, '', 1, '', 'asd                                                ', 'uploaded_photos/4(1).png', '700', '800', '900'),
(202300196, 'Scheduled maintenance', 0, '', 1, '', 'asd', 'uploaded_photos/5.png', '', '', ''),
(202300197, 'Tire Replacement', 700, '', 1, '', 'asdasdasdasdasdasd                                                          ', 'uploaded_photos/6.png', '700', '800', '900'),
(202300198, 'Battery replacement', 300, '', 1, '', 'asd                        ', 'uploaded_photos/7.png', '300', '400', '600'),
(202300199, 'Brake works', 500, '', 1, '', 'sdf                        ', 'uploaded_photos/8.png', '500', '600', '700'),
(2023001100, 'Engine tune-up', 600, '', 1, '', 'dfgd                        ', 'uploaded_photos/9.png', '600', '700', '900'),
(2023001101, 'Wheels aligned/balanced', 1000, '', 1, '', 'asd                        ', 'uploaded_photos/10.png', '1000', '1500', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `AUTOSTART`, `AUTOINC`, `AUTOEND`, `AUTOKEY`, `AUTONUM`) VALUES
(1, '2017', 1, 65, 'PROID', 10),
(2, '0', 1, 186, 'ordernumber', 0),
(3, '2023001', 1, 103, 'SERV_ID', 0),
(4, '2023', 1, 24, 'sched_id', 0),
(5, '0', 1, 120, 'SERVICENUM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGID`, `CATEGORIES`, `USERID`) VALUES
(5, 'Engine_Oil/Oil_Filter', 0),
(11, 'Tires/Mags', 0),
(12, 'Accessories ', 0),
(13, 'Lights', 0),
(14, 'Batteries', 0),
(15, 'Car_Seats', 0),
(16, 'Suspension_Utility ', 0),
(17, 'Brake_Utility', 0),
(20, 'Engine_Parts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int(11) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `CUSHOMENUM` varchar(90) NOT NULL,
  `STREETADD` text NOT NULL,
  `BRGYADD` text NOT NULL,
  `CITYADD` text NOT NULL,
  `PROVINCE` varchar(80) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `DBIRTH` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAILADD` varchar(40) NOT NULL,
  `ZIPCODE` int(6) NOT NULL,
  `CUSUNAME` varchar(255) NOT NULL,
  `CUSPASS` varchar(90) NOT NULL,
  `CUSPHOTO` varchar(255) NOT NULL,
  `TERMS` tinyint(4) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` varchar(255) NOT NULL,
  `DATEJOIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`CUSTOMERID`, `FNAME`, `LNAME`, `MNAME`, `CUSHOMENUM`, `STREETADD`, `BRGYADD`, `CITYADD`, `PROVINCE`, `COUNTRY`, `DBIRTH`, `GENDER`, `PHONE`, `EMAILADD`, `ZIPCODE`, `CUSUNAME`, `CUSPASS`, `CUSPHOTO`, `TERMS`, `code`, `status`, `DATEJOIN`) VALUES
(1, 'Walk-In Customer', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 0, '', '', '', 0, 0, '', '0000-00-00'),
(10, 'Tosh', 'Dulos', 'V', '61', 'zone 2', 'Bactad East', 'Urdaneta City', '', '', '1950-07-12', 'Male', '09062064810', 'Thentadashi@gmail.com', 2428, 'Tosh', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2021-12-02'),
(58, 'Jon jasm', 'Aragon', '', '34', 'Zone 5', 'San alejandro', 'Sta. Maria', '', '', '1954-02-03', 'Male', '09654815465', 'ajonjasm1502@gmail.com', 2440, 'Jon Jasm', '175592059f4472dac4e2f5fec798381160107aad', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-06'),
(64, 'Thenmarck', 'Dulos', '', '64', 'zone 7', 'Bactad East', 'Urdaneta City', '', '', '1954-02-04', 'Male', '0906206234', '19as0314_ms@psu.edu.ph', 2428, 'Thenmarck', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-06'),
(76, 'Alliah Angel', 'Sequerra', '', '73', 'T. Bauzon St. , Zone 2', 'Poblacion West', 'Asingan', '', '', '2002-01-05', 'Female', '09567584985', 'alliah.angel0808@gmail.com', 2439, 'Alliah Angel', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-13'),
(77, 'Mark Angelo', 'Nesperos', '', '23', 'Zone 1 B', 'San Vicente', 'Asingan', '', '', '1955-05-04', 'Male', '09273804540', 'kilongnesperos@gmail.com', 2440, 'kilong25zxc', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-14'),
(78, 'Likhamor', 'Quezon', '', '64', 'zone 7', 'Poblacion West', 'Tayug', '', '', '1998-02-21', 'Male', '09067608642', 'likhamor.quezon@lorma.edu', 2445, 'Likha_25', 'c6613efc3d167d944074824f2f884eecb201df66', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-15'),
(79, 'Kay', 'Cruz', '', '64', 'T. Bauzon St. , Zone 2', 'Poblacion West', 'Pozorrubio', '', '', '1968-07-17', 'Female', '0906206234', 'erikareic@gmail.com', 2428, 'kayTosh_23', 'e6d6cd3c058537fad9d5a6999754e6c2ceb41b55', 'customer_image/avatar.png', 1, 0, 'verified', '2022-02-24'),
(81, 'Jeric', 'Obillio', 'B', '213', 'zone 2', 'Bactad East', 'Urdaneta City', '', '', '1953-03-03', 'Male', '09273536809', 'jerecobello1@gmail.com', 2428, 'Jerec', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2022-06-25'),
(82, 'Alliah Angel', 'Sequerra', 'B', '64', 'zone 2', 'Bactad East', 'Urdaneta City', '', '', '2000-01-05', 'Male', '09273536801', 'thentadashi@gmail.com', 2428, 'alliah.angel0808@gmail.com', '9102e517ac4e8845d383cbe69dd027b7ec95d8be', 'customer_image/avatar.png', 1, 994592, 'NotVerified', '2022-06-26'),
(83, 'Jery', 'Dulos', 'Valdez', '64', '61, Zone #2, Bactad East, Urdaneta City, Pangasinan', 'Bactad East', 'San Manuel', '', '', '1953-02-03', 'Male', '09273536801', 'thentsadashi@gmail.com', 2842, 'Thentadashi', '3f78390e5e7df3c9e5d89251c57e30f19fd7b2ec', 'customer_image/avatar.png', 1, 533512, 'NotVerified', '2023-05-24'),
(85, 'Toshasdad', 'Dulos', 'B', '64', '61, Zone #2, Bactad East, Urdaneta City, Pangasinan', '', 'Aguilar', '', '', '1953-02-04', 'Male', '09273536801', 'gencarzauto@gmail.com', 2428, 'Jerec', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/avatar.png', 1, 0, 'verified', '2023-05-24'),
(86, 'Samuel', 'Bayot', 'Garcinez', '45', 'makabebe', 'pangkalawakan', 'Asingan', '', '', '1997-03-03', 'Male', '09273536801', 'sam.bayot06@gmail.com', 2428, 'Sammy', '418eab4db4e716736b402a2d0eb0ea185f77067e', 'customer_image/avatar.png', 1, 0, 'verified', '2023-05-24'),
(87, 'Thenmarck', 'Dulos', 'dfdg', '64', '61 zone 2', '', 'Urdaneta City', '', '', '1953-02-03', 'Male', '09273536845', 'thenmarckdulos@yahoo.com', 2428, 'asdasd', '4495ee5170d59d475f9d37ace72f99416647e669', 'customer_image/avatar.png', 1, 446477, 'NotVerified', '2023-05-25'),
(1003, 'Alliah Angel', 'Sequerra', 'Opina', '', 'T. Bauzon St. , Zone 2', 'Poblacion West', 'Asingan', '', '', '2002-01-05', 'Male', '09633334079', 'sequerraalliahangelopina@gmail.com', 2439, 'Alliah', '5878bb382a3e6143e68e78fa77eb21c604c93fe9', 'customer_image/sassy red.jpg', 1, 0, 'verified', '2023-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ORDERID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `ORDEREDQTY` int(11) NOT NULL,
  `ORDEREDPRICE` double NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDERID`, `PROID`, `ORDEREDQTY`, `ORDEREDPRICE`, `ORDEREDNUM`, `USERID`) VALUES
(1, 201737, 4, 476, 93, 0),
(2, 201740, 3, 447, 93, 0),
(3, 201738, 1, 199, 94, 0),
(4, 201737, 1, 119, 95, 0),
(5, 201737, 1, 119, 96, 0),
(6, 201743, 1, 20000, 97, 0),
(7, 201749, 1, 1900, 98, 0),
(8, 201743, 1, 20000, 99, 0),
(9, 201744, 1, 6500, 100, 0),
(10, 201743, 1, 20000, 102, 0),
(11, 201743, 1, 20000, 104, 0),
(12, 201755, 1, 2500, 105, 0),
(13, 201756, 1, 5000, 105, 0),
(14, 201743, 1, 20000, 105, 0),
(15, 201743, 1, 20000, 106, 0),
(16, 201750, 1, 23000, 107, 0),
(17, 201750, 1, 23000, 108, 0),
(18, 201756, 1, 5000, 109, 0),
(19, 201743, 1, 20000, 110, 0),
(20, 201743, 1, 20000, 111, 0),
(21, 201743, 1, 20000, 112, 0),
(22, 201743, 1, 20000, 113, 0),
(23, 201743, 1, 20000, 114, 0),
(24, 201743, 1, 20000, 115, 0),
(25, 201743, 1, 20000, 116, 0),
(26, 201757, 1, 8500, 117, 0),
(27, 201754, 1, 7500, 118, 0),
(28, 201757, 1, 8500, 119, 0),
(29, 201744, 1, 6500, 120, 0),
(30, 201752, 1, 9500, 120, 0),
(31, 201752, 1, 9500, 121, 0),
(32, 201743, 1, 20000, 122, 0),
(33, 201750, 1, 23000, 122, 0),
(34, 201755, 1, 2500, 124, 0),
(35, 201759, 1, 8500, 125, 0),
(36, 201743, 1, 20000, 126, 0),
(37, 201743, 14, 140000, 127, 0),
(38, 201750, 8, 184000, 127, 0),
(39, 201755, 48, 120000, 127, 0),
(40, 201743, 1, 20000, 128, 0),
(41, 201743, 1, 20000, 129, 0),
(42, 201743, 1, 20000, 130, 0),
(43, 201750, 1, 23000, 130, 0),
(44, 201743, 3, 0, 131, 0),
(45, 201750, 2, 0, 131, 0),
(46, 201743, 2, 0, 132, 0),
(47, 201750, 2, 0, 132, 0),
(48, 201743, 2, 0, 133, 0),
(49, 201750, 2, 0, 134, 0),
(50, 201743, 1, 0, 134, 0),
(51, 201743, 3, 30000, 135, 0),
(52, 201750, 1, 23000, 135, 0),
(53, 201743, 3, 30000, 136, 0),
(54, 201750, 1, 20700, 136, 0),
(55, 201755, 1, 2500, 137, 0),
(56, 201743, 1, 20000, 138, 0),
(57, 201743, 1, 20000, 139, 0),
(58, 201743, 2, 20000, 140, 0),
(59, 201743, 1, 10000, 141, 0),
(60, 201743, 1, 10000, 142, 0),
(61, 201743, 1, 10000, 143, 0),
(62, 201743, 1, 10000, 144, 0),
(63, 201744, 1, 6500, 144, 0),
(64, 201750, 1, 23000, 144, 0),
(65, 201744, 17, 88400, 145, 0),
(66, 201743, 1, 10000, 146, 0),
(67, 201743, 1, 10000, 147, 0),
(68, 201743, 1, 10000, 148, 0),
(69, 201743, 1, 10000, 149, 0),
(70, 201743, 1, 10000, 150, 0),
(71, 201743, 1, 10000, 151, 0),
(72, 201743, 1, 10000, 152, 0),
(73, 201743, 1, 10000, 153, 0),
(74, 201743, 1, 10000, 154, 0),
(75, 201743, 1, 10000, 155, 0),
(76, 201743, 1, 10000, 156, 0),
(77, 201743, 1, 10000, 157, 0),
(78, 201752, 1, 9500, 157, 0),
(79, 201755, 1, 2500, 157, 0),
(80, 201743, 1, 10000, 158, 0),
(81, 201743, 3, 24000, 159, 0),
(82, 201744, 3, 15600, 159, 0),
(83, 201751, 1, 8500, 160, 0),
(84, 201752, 1, 9500, 161, 0),
(85, 201755, 1, 2500, 162, 0),
(86, 201752, 1, 9500, 163, 0),
(87, 201743, 1, 8000, 164, 0),
(88, 201752, 1, 9500, 165, 0),
(89, 201743, 1, 8000, 166, 0),
(90, 201756, 1, 5000, 167, 0),
(91, 201743, 1, 8000, 168, 0),
(119, 201743, 1, 10000, 177, 0),
(120, 201751, 1, 8500, 177, 0),
(121, 201743, 1, 10000, 178, 0),
(122, 201743, 1, 10000, 179, 0),
(123, 201751, 1, 8500, 180, 0),
(124, 201744, 1, 5200, 181, 0),
(125, 201743, 1, 10000, 185, 0),
(126, 201744, 1, 6500, 185, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `INGREDIENTS` varchar(255) NOT NULL,
  `PROQTY` int(11) DEFAULT NULL,
  `ALERT` int(11) NOT NULL,
  `ORIGINALPRICE` double NOT NULL,
  `PROPRICE` double DEFAULT NULL,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `OWNERNAME` varchar(90) NOT NULL,
  `ratingCount` int(11) NOT NULL,
  `rateIndex` int(11) NOT NULL,
  `brand` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`PROID`, `PRODESC`, `INGREDIENTS`, `PROQTY`, `ALERT`, `ORIGINALPRICE`, `PROPRICE`, `CATEGID`, `IMAGES`, `PROSTATS`, `OWNERNAME`, `ratingCount`, `rateIndex`, `brand`) VALUES
(201743, 'Castrol® EDGE® is a full synthetic motor oil that is engineered for drivers who want only the best from their engines. Castrol EDGE with Fluid Titanium, is the natural choice for drivers who demand maximum performance and protection from their cars. Unl  ', '', 26, 20, 9000, 10000, 5, 'uploaded_photos/oil2.jpg', 'Available', 'CASTROL EDGE 5W-40', 2, 4, 'Castrol'),
(201744, 'Wide circumferential grooves with nearly vertical walls help maintain wet handling and \r\ntraction throughout the tire\'s life\r\nTriple tread radius increases the tire\'s contact with the road during cornering for \r\nenhanced traction and control              ', '', 9, 20, 7000, 6500, 5, 'uploaded_photos/oil3.jpg', 'Available', 'CASTROL MAGNATEC 5W-30', 0, 0, 'Castrol'),
(201750, 'Wide circumferential grooves with nearly vertical walls help maintain wet handling and \r\ntraction throughout the tire\'s life\r\nTriple tread radius increases the tire\'s contact with the road during cornering for \r\nenhanced traction and control\r\nJointless Ba', '', 27, 20, 23000, 23000, 11, 'uploaded_photos/tire1.webp', 'Available', 'Dunlop 185/55 R 16 83H', 0, 0, 'Dunlop'),
(201751, 'The Dueler A/T 697 is the ultimate 4WD all terrain tyre, designed and tested to withstand the harshest conditions. Its proven superior wear life and better resistance to cutting and chipping make it the number one choice for all terrain adventuring. Duele', '', 37, 10, 8500, 8500, 11, 'uploaded_photos/tire3.webp', 'Available', 'Bridgestone Dueler 245/70 R16 111S', 0, 0, 'Bridgestone'),
(201752, 'The B10 has been given a modern fresh look and although its highly technical laminate is rigid and tough, it weighs only 4.5 kg / 9.7 lbs. The seat comes complete with a Dinamica® suede covered headrest pad. The optional suede covered cushion and back pan', '', 50, 20, 9500, 9500, 15, 'uploaded_photos/tillett-b6-carbon-seat-msar.jpg', 'Available', 'Tillett B10 Carbon Racing Seat', 0, 0, 'Tillett'),
(201755, 'CHRA Quality\r\n1\\  turbine wheel \\ comperessor wheel \\ CHRA  100% balancing tested\r\n2\\  material:  K418\r\nTurbine Housing Test\r\n1\\ Contaminant testing of compressor housing\r\n2\\ Flow capacity testing of turbine housing\r\nComplete turbo test\r\n1\\ Turbo performa', '', 36, 20, 2500, 2500, 20, 'uploaded_photos/shopping.webp', 'Available', 'SA6D140 KTR110 Turbo charger', 0, 0, 'Toyota'),
(201756, 'The Mobil Brake Fluid DOT 4 is suitable for all disc, drum and anti-skid braking systems used in average to high performance vehicles requiring DOT 3 or DOT 4 level performance.                        ', '', 47, 20, 5000, 5000, 17, 'uploaded_photos/Productos_4.webp', 'Available', 'Mobil Brake Fluid DOT 4', 0, 0, 'Mobil'),
(201757, 'Aluminum Performance Radiator. AT/MT Cars.These COLD-CASE radiators are Tig welded 100 percent aluminum and absolutely beautiful. Size:24x18x2 Inch                                              ', '', 48, 20, 8500, 8500, 20, 'uploaded_photos/Hb796bd1820f34eee8cbb15275baf5612O.jpg', 'Available', 'Aluminum Radiator Universal', 0, 0, 'No brand'),
(201759, '5769757 ALLOY WHEEL MOMO REVENGE ANTRACITE OPACO 16” 6J 4x100 TOYOTA COROLLA 1995>2000                        ', '', 49, 20, 8500, 8500, 11, 'uploaded_photos/momorim.jpg', 'Available', 'IMPORTED Momo mags', 0, 0, 'Momo');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromopro`
--

CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpromopro`
--

INSERT INTO `tblpromopro` (`PROMOID`, `PROID`, `PRODISCOUNT`, `PRODISPRICE`, `PROBANNER`, `PRONEW`) VALUES
(3, 201739, 0, 289, 0, 0),
(4, 201740, 0, 149, 0, 0),
(5, 201741, 0, 89, 0, 0),
(7, 201743, 20, 8000, 1, 0),
(8, 201744, 20, 5200, 1, 0),
(9, 201745, 0, 6000, 0, 0),
(10, 201746, 0, 6000, 0, 0),
(14, 201750, 0, 23000, 1, 0),
(15, 201751, 0, 8500, 0, 0),
(16, 201752, 0, 9500, 0, 0),
(17, 201753, 0, 7500, 0, 0),
(19, 201755, 0, 2500, 0, 0),
(20, 201756, 0, 5000, 0, 0),
(21, 201757, 0, 8500, 0, 0),
(23, 201759, 0, 8500, 0, 0),
(24, 201760, 0, 123, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblschedorder`
--

CREATE TABLE `tblschedorder` (
  `sched_order_Id` int(11) NOT NULL,
  `serv_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ctype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblschedorder`
--

INSERT INTO `tblschedorder` (`sched_order_Id`, `serv_id`, `sched_id`, `price`, `ctype`) VALUES
(6, 202300193, 202312, 700, 'ctype_a'),
(7, 202300193, 202313, 700, 'ctype_a'),
(8, 202300193, 202313, 700, 'ctype_a'),
(9, 202300194, 202313, 300, 'ctype_a'),
(10, 202300194, 202313, 300, 'ctype_a'),
(11, 202300193, 202313, 700, 'ctype_a'),
(12, 202300193, 202313, 700, 'ctype_a'),
(13, 202300193, 202314, 700, 'ctype_a'),
(14, 202300193, 202314, 700, 'ctype_a'),
(15, 202300193, 202314, 700, 'ctype_a'),
(16, 202300193, 202315, 800, 'ctype_b'),
(17, 202300195, 202316, 700, 'ctype_a'),
(18, 202300193, 202317, 700, 'ctype_a'),
(19, 202300193, 202317, 700, 'ctype_a'),
(20, 202300193, 202317, 700, 'ctype_a'),
(21, 202300193, 202317, 700, 'ctype_a'),
(22, 202300193, 202317, 700, 'ctype_a'),
(23, 202300193, 202317, 900, 'ctype_c'),
(24, 202300197, 202317, 700, 'ctype_a'),
(25, 202300194, 202318, 300, 'ctype_a'),
(26, 202300198, 202318, 300, 'ctype_a'),
(27, 202300193, 202319, 700, 'ctype_a'),
(28, 202300193, 202320, 700, 'ctype_a'),
(29, 202300193, 202320, 700, 'ctype_a'),
(30, 202300193, 202320, 700, 'ctype_a'),
(31, 202300195, 202320, 900, 'ctype_c'),
(32, 202300195, 202321, 900, 'ctype_c'),
(33, 202300193, 202321, 700, 'ctype_a'),
(34, 202300194, 202322, 300, 'ctype_a'),
(35, 202300193, 202323, 700, 'ctype_a');

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `sched_id` int(11) NOT NULL,
  `USERID` varchar(255) NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `mech_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `rms` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`sched_id`, `USERID`, `CUSTOMERID`, `date`, `time`, `price`, `mech_name`, `remarks`, `rms`, `message`, `status`, `date_created`) VALUES
(202312, '236', 10, '2023-06-29', '17:00 - 18:00', 700, 'Mech1', 'Ongoing', '', '', 'Active', '2023-06-28 14:37:28'),
(202313, '236', 10, '2023-06-29', '08:00 - 09:00', 700, 'Mech1', 'Pending', '', '', 'Active', '2023-06-28 15:38:03'),
(202314, '236', 10, '2023-06-30', '13:00 - 14:00', 700, 'Mech1', 'Cancelled', 'Your order has been cancelled', 'I regret to inform you that there has been a schedule conflict that prevents us from accommodating your booking request. We sincerely apologize for any inconvenience this may cause.', 'Active', '2023-06-28 15:41:40'),
(202315, '236', 10, '2023-06-30', '14:00 - 15:00', 800, 'Mech1', 'Cancelled', 'Your order has been cancelled', 'We regret to inform you that an error has occurred while processing your booking. We sincerely apologize for any inconvenience this may have caused.', 'Active', '2023-06-28 15:42:34'),
(202316, '236', 10, '2023-06-29', '09:00 - 10:00', 700, 'Mech1', 'Pending', '', '', 'Active', '2023-06-28 15:47:03'),
(202317, '236', 10, '2023-06-30', '10:00 - 11:00', 1600, 'Mech1', 'Pending', '', '', 'Active', '2023-06-29 02:54:05'),
(202318, '236', 10, '2023-06-30', '08:00 - 09:00', 600, 'Mech1', 'Done', '', '', 'Active', '2023-06-29 02:55:47'),
(202319, '236', 10, '2023-07-07', '08:00 - 09:00', 700, 'Mech1', 'Cancelled', 'Your order has been cancelled', 'We regret to inform you that your booking is currently inactive and cannot be processed at this time. We apologize for any inconvenience this may have caused.', 'Active', '2023-06-29 05:06:42'),
(202320, '236', 10, '2023-07-03', '12:00 - 13:00', 900, 'Mech1', 'Confirmed', 'Your Service Booking Schedule is confirmed', '', 'Active', '2023-06-29 05:07:53'),
(202321, '236', 10, '2023-07-08', '08:00 - 09:00', 700, 'Mech1', 'Confirmed', 'Your Service Booking Schedule is confirmed', '', 'Active', '2023-06-29 05:10:04'),
(202322, '236', 10, '2023-07-05', '09:00 - 10:00', 300, 'Mech1', 'Confirmed', 'Your Service Booking Schedule is confirmed', '', 'Active', '2023-06-29 05:12:39'),
(202323, '236', 10, '2023-07-02', '08:00 - 09:00', 700, 'Mech1', 'Requested', 'Cancellation Initiated', 'found a better deal or price for the same services elsewhere and wants to cancel the current order.', 'Active', '2023-06-29 05:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`SETTINGID`, `PLACE`, `BRGY`, `DELPRICE`) VALUES
(3, 'Agno', '', 150),
(4, 'Aguilar', '', 50),
(5, 'Alcala', '', 50),
(6, 'Anda', '', 50),
(7, 'Asingan', '', 250),
(8, 'Balungao', '', 50),
(9, 'Basista', '', 50),
(10, 'Bautista', '', 50),
(11, 'Bayambang', '', 50),
(12, 'Binalonan', '', 50),
(13, 'Binmaley', '', 50),
(14, 'Bolinao', '', 50),
(15, 'Bugallon', '', 50),
(16, 'Burgos', '', 50),
(17, 'Calasiao', '', 50),
(18, 'Dagupan City', '', 50),
(19, 'Dasol', '', 50),
(20, 'Infanta', '', 50),
(21, 'Labrador', '', 50),
(22, 'Laoac', '', 50),
(23, 'Lingayen', '', 50),
(24, 'Mabini', '', 50),
(25, 'Malasiqui', '', 50),
(26, 'Manaoag', '', 50),
(27, 'Mangaldan', '', 50),
(28, 'Mapandan', '', 50),
(29, 'Natividad', '', 50),
(30, 'Mangatarem', '', 50),
(31, 'Mapandan', '', 50),
(32, 'Natividad', '', 50),
(33, 'Pozorrubio', '', 50),
(34, 'Rosales', '', 50),
(35, 'San Carlos City', '', 50),
(36, 'San Fabian', '', 50),
(37, 'San Jacinto', '', 50),
(38, 'San Manuel', '', 50),
(39, 'San Nicolas', '', 50),
(40, 'San Quintin', '', 50),
(41, 'Sison', '', 50),
(42, 'Sta. Barbara', '', 50),
(43, 'Sta. Maria', '', 50),
(44, 'Sto. Tomas', '', 50),
(45, 'Sual', '', 50),
(46, 'Tayug', '', 50),
(47, 'Umingan', '', 50),
(48, 'Urbiztondo', '', 50),
(49, 'Urdaneta City', '', 50),
(50, 'Villasis', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tblstockin`
--

CREATE TABLE `tblstockin` (
  `STOCKINID` int(11) NOT NULL,
  `STOCKDATE` datetime DEFAULT NULL,
  `PROID` int(11) DEFAULT NULL,
  `STOCKQTY` int(11) DEFAULT NULL,
  `STOCKPRICE` double DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `SUMMARYID` int(11) NOT NULL,
  `ORDEREDDATE` datetime NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `DELFEE` double NOT NULL,
  `PAYMENT` double NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `ORDEREDSTATS` varchar(30) NOT NULL,
  `ORDEREDREMARKS` varchar(125) NOT NULL,
  `cusmessage` varchar(255) NOT NULL,
  `CLAIMEDADTE` datetime NOT NULL,
  `HVIEW` tinyint(4) NOT NULL,
  `USERID` int(11) NOT NULL,
  `emailCount` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsummary`
--

INSERT INTO `tblsummary` (`SUMMARYID`, `ORDEREDDATE`, `CUSTOMERID`, `ORDEREDNUM`, `DELFEE`, `PAYMENT`, `PAYMENTMETHOD`, `ORDEREDSTATS`, `ORDEREDREMARKS`, `cusmessage`, `CLAIMEDADTE`, `HVIEW`, `USERID`, `emailCount`) VALUES
(5, '2021-12-02 03:33:40', 10, 96, 50, 189, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(6, '2022-01-24 05:59:18', 10, 97, 50, 20050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-01-24 00:00:00', 1, 0, 0),
(7, '2022-01-24 06:22:45', 10, 98, 50, 1900, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-01-24 00:00:00', 1, 0, 0),
(8, '2022-01-31 04:47:06', 10, 99, 0, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(9, '2022-01-31 07:10:31', 10, 100, 50, 6550, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-01 00:00:00', 1, 0, 0),
(10, '2022-02-01 07:26:36', 10, 102, 50, 20050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-03 00:00:00', 1, 0, 0),
(11, '2022-02-03 01:18:15', 24, 104, 0, 20000, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-03 00:00:00', 0, 0, 0),
(12, '2022-02-04 08:55:30', 10, 105, 150, 27650, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-04 00:00:00', 1, 0, 0),
(15, '2022-02-06 08:20:14', 10, 106, 0, 20000, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-06 00:00:00', 1, 0, 0),
(16, '2022-02-06 08:36:15', 10, 107, 50, 23000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(17, '2022-02-06 08:37:05', 10, 108, 50, 23050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(18, '2022-02-06 09:22:46', 10, 109, 50, 5050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(19, '2022-02-06 10:01:50', 64, 110, 50, 20050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(20, '2022-02-07 08:07:18', 64, 111, 0, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(21, '2022-02-07 08:15:05', 64, 112, 0, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(22, '2022-02-07 08:25:14', 64, 113, 50, 20050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(23, '2022-02-07 08:35:12', 64, 114, 0, 20000, 'Cash on Delivery', 'Cancelled', 'we need to verify your email first', '', '2022-02-07 00:00:00', 1, 0, 0),
(24, '2022-02-07 08:37:04', 64, 115, 0, 20000, 'Cash on Delivery', 'Cancelled', 'we need to verify your email first', '', '2022-02-07 00:00:00', 1, 0, 0),
(25, '2022-02-07 08:51:44', 64, 116, 50, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(26, '2022-02-07 06:46:47', 64, 117, 150, 8650, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(28, '2022-02-07 08:54:35', 64, 119, 50, 8550, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(29, '2022-02-07 11:24:28', 64, 120, 50, 16050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-07 00:00:00', 1, 0, 0),
(31, '2022-02-10 03:28:53', 10, 121, 0, 9500, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(32, '2022-02-15 10:17:17', 10, 122, 50, 43050, 'Cash on Delivery', 'Cancelled', 'Ayaw ko na sya', '', '0000-00-00 00:00:00', 0, 0, 0),
(34, '2022-02-15 10:30:47', 78, 124, 50, 2550, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-02-15 00:00:00', 0, 0, 0),
(35, '2022-02-15 10:41:12', 78, 125, 50, 8500, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-06-06 00:00:00', 0, 0, 0),
(36, '2022-02-24 02:01:26', 79, 126, 0, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(37, '2022-06-06 10:01:00', 10, 127, 50, 444050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-06-06 00:00:00', 1, 0, 0),
(40, '2022-06-06 11:32:21', 10, 128, 50, 20150, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2022-06-06 00:00:00', 1, 0, 0),
(41, '2022-06-06 03:34:43', 10, 129, 0, 10000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(42, '2022-06-06 04:19:05', 10, 130, 50, 30750, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(44, '2022-06-06 05:44:38', 10, 131, 50, 71400, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(46, '2022-06-06 06:03:33', 10, 132, 50, 61450, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(48, '2022-06-06 06:04:57', 10, 133, 50, 20050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(49, '2022-06-06 06:07:45', 10, 134, 50, 61450, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(51, '2022-06-06 06:14:46', 10, 135, 50, 53050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(53, '2022-06-06 06:16:59', 10, 136, 0, 50700, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(55, '2022-06-18 01:02:01', 10, 137, 150, 2650, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(56, '2022-10-27 12:55:53', 10, 138, 50, 20000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(57, '2022-11-12 09:52:06', 10, 139, 0, 20000, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-05-22 00:00:00', 0, 0, 0),
(58, '2023-04-26 11:38:53', 10, 140, 50, 20050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-04-26 00:00:00', 1, 0, 0),
(59, '2023-05-22 01:43:42', 10, 141, 50, 10050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-05-22 00:00:00', 0, 0, 0),
(60, '2023-05-22 02:03:38', 10, 142, 150, 10150, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-05-22 00:00:00', 1, 0, 0),
(61, '2023-05-22 02:29:50', 81, 143, 50, 10050, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-05-22 00:00:00', 1, 0, 0),
(62, '2023-05-24 04:22:01', 86, 144, 250, 39750, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-05-24 00:00:00', 1, 0, 0),
(65, '2023-05-30 10:00:35', 10, 145, 50, 88450, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(66, '2023-06-02 11:51:53', 10, 146, 0, 10000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(67, '2023-06-02 11:57:59', 10, 147, 150, 10150, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(68, '2023-06-02 12:06:17', 10, 148, 50, 10050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(69, '2023-06-02 12:09:55', 10, 149, 150, 10150, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(70, '2023-06-02 12:13:00', 10, 150, 50, 10050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(71, '2023-06-02 12:22:05', 10, 151, 150, 10000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(72, '2023-06-02 12:24:07', 10, 152, 150, 10150, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(73, '2023-06-02 12:27:12', 10, 153, 150, 10150, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(74, '2023-06-02 12:53:48', 10, 154, 50, 10050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(75, '2023-06-02 01:02:38', 10, 155, 150, 10000, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(76, '2023-06-02 01:03:55', 10, 156, 50, 10050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 0, 0, 0),
(77, '2023-06-02 01:12:26', 10, 157, 50, 22050, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(80, '2023-06-02 01:18:43', 10, 158, 150, 10150, 'Cash on Delivery', 'Cancelled', 'Your order has been cancelled due to lack of communication and incomplete information.', '', '0000-00-00 00:00:00', 1, 0, 0),
(86, '2023-06-06 09:58:13', 10, 163, 50, 9550, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-06-07 00:00:00', 1, 0, 0),
(87, '2023-06-07 10:45:05', 10, 164, 150, 8150, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-06-07 00:00:00', 1, 0, 0),
(88, '2023-06-07 11:26:03', 10, 165, 50, 9550, 'Cash on Delivery', 'Cancelled', 'reason2', '', '0000-00-00 00:00:00', 1, 0, 0),
(89, '2023-06-08 09:35:16', 10, 166, 50, 8050, 'Cash on Delivery', 'Confirmed', 'Your order cannot be cancelled and the order has been confirmed.', 'experienced significant delays in the delivery process, causing inconvenience or no longer needing the product.', '2023-06-28 00:00:00', 1, 0, 0),
(90, '2023-06-08 10:59:08', 76, 167, 250, 5250, 'Cash on Delivery', 'Delivered', 'Your order has been delivered.', '', '2023-06-08 00:00:00', 1, 0, 0),
(91, '2023-06-08 11:39:43', 76, 168, 250, 8250, 'Cash on Delivery', 'Confirmed', 'Your order cannot be cancelled and the order has been confirmed.', 'change of mind or no longer wish to proceed with the order.', '2023-06-09 00:00:00', 0, 0, 0),
(100, '2023-06-21 05:50:57', 10, 177, 0, 18500, 'Cash', 'PAID', 'PAID', '', '0000-00-00 00:00:00', 1, 0, 0),
(101, '2023-06-21 11:57:13', 1, 178, 0, 10000, 'Cash', 'PAID', 'PAID', '', '0000-00-00 00:00:00', 0, 0, 0),
(102, '2023-06-24 21:32:04', 10, 179, 0, 10000, 'Cash', 'PAID', 'PAID', '', '0000-00-00 00:00:00', 1, 0, 0),
(103, '2023-06-30 12:37:17', 10, 180, 50, 8550, 'Cash on Delivery', 'Shipped', 'Your order is on the way by our trusted Couriers.', '', '0000-00-00 00:00:00', 0, 0, 0),
(104, '2023-06-30 01:05:51', 10, 181, 50, 5250, 'Cash on Delivery', 'Pending', 'Your order is on process.', '', '0000-00-00 00:00:00', 0, 0, 0),
(108, '2023-06-30 02:35:35', 1, 185, 0, 15675, 'Cash', 'PAID', 'PAID', '', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `U_NAME` varchar(122) NOT NULL,
  `U_USERNAME` varchar(122) NOT NULL,
  `U_PASS` varchar(122) NOT NULL,
  `U_ROLE` varchar(30) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL,
  `sched` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `U_NAME`, `U_USERNAME`, `U_PASS`, `U_ROLE`, `USERIMAGE`, `sched`) VALUES
(232, 'Admin', 'Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 'Administrator', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', ''),
(233, 'Enconder1', 'Enconder1', '708bceab766f4c14b6e9e56d9b7a4c72ee50b3a7', 'Encoder', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', ''),
(234, 'Staff1', 'Staff1', 'f93ee57c270a3b968ef95cc6d8297e3852032ab6', 'Staff', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', ''),
(235, 'Staff2', 'Staff2', '353cbc6e76f2d616b5ad8fa20339686f16401dd9', 'Staff', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', ''),
(236, 'Mech1', 'Mech1', 'f6aa021fae3b54cf71cfef9a39462ae27610f57f', 'Mechanic', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', ''),
(237, 'Mech2', 'Mech2', '7b80eacab77467cf108f6cafaff9a96f9e3c8c8e', 'Mechanic', 'photos/360_F_462889752_tSWP7qDYpUIL6QRlbyIC8v68jaXwVXyx.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlist`
--

CREATE TABLE `tblwishlist` (
  `WISHLISTID` int(11) NOT NULL,
  `CUSID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `WISHDATE` date NOT NULL,
  `WISHSTATS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messagein`
--
ALTER TABLE `messagein`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `messagelog`
--
ALTER TABLE `messagelog`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_MessageId` (`MessageId`,`SendTime`);

--
-- Indexes for table `messageout`
--
ALTER TABLE `messageout`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_IsRead` (`IsRead`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`iders`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CUSTOMERID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDERID`),
  ADD KEY `USERID` (`USERID`),
  ADD KEY `PROID` (`PROID`),
  ADD KEY `ORDEREDNUM` (`ORDEREDNUM`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`PROID`),
  ADD KEY `CATEGID` (`CATEGID`);

--
-- Indexes for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  ADD PRIMARY KEY (`PROMOID`),
  ADD UNIQUE KEY `PROID` (`PROID`);

--
-- Indexes for table `tblschedorder`
--
ALTER TABLE `tblschedorder`
  ADD PRIMARY KEY (`sched_order_Id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`SETTINGID`);

--
-- Indexes for table `tblstockin`
--
ALTER TABLE `tblstockin`
  ADD PRIMARY KEY (`STOCKINID`),
  ADD KEY `PROID` (`PROID`,`USERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `ORDEREDNUM` (`ORDEREDNUM`),
  ADD KEY `CUSTOMERID` (`CUSTOMERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  ADD PRIMARY KEY (`WISHLISTID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messagein`
--
ALTER TABLE `messagein`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messagelog`
--
ALTER TABLE `messagelog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messageout`
--
ALTER TABLE `messageout`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `iders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324316;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  MODIFY `PROMOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblschedorder`
--
ALTER TABLE `tblschedorder`
  MODIFY `sched_order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202324;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `SETTINGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tblstockin`
--
ALTER TABLE `tblstockin`
  MODIFY `STOCKINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  MODIFY `WISHLISTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
