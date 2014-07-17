-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2014 at 12:06 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `album_createdate` date NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_createdate`) VALUES
(1, 'ชุดไทย', '2013-10-26'),
(2, 'ชุดจีน', '2013-10-26'),
(4, 'ชุดใหญ่', '2013-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(3) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(61, 'ทหารไทย'),
(54, 'กสิกรไทย'),
(55, 'กรุงเทพ'),
(56, 'ไทยพาณิชย์'),
(57, 'กรุงศรีอยุธยา'),
(58, 'กรุงไทย'),
(59, 'TMB'),
(60, 'บัวหลวง'),
(62, 'นครหลวง'),
(63, 'ธกศ'),
(64, 'เกียตนาคิน');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `img_img` text COLLATE utf8_unicode_ci NOT NULL,
  `img_createdate` date NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `album_id`, `img_img`, `img_createdate`) VALUES
(11, 1, 'images/img_img_/23_20130630_061852.PNG', '2013-10-27'),
(12, 1, 'images/img_img_/22_20130722_072447.png', '2013-11-08'),
(5, 1, 'images/img_img_/11_20130625_214059.jpg', '2013-10-27'),
(10, 1, 'images/img_img_/21_20130703_093310.jpg', '2013-10-27'),
(8, 1, 'images/img_img_/22_20130722_072447.png', '2013-10-27'),
(9, 2, 'images/img_img_/23_20130630_072215.PNG', '2013-10-27'),
(25, 4, 'images/img_img_/service.png', '2014-01-06'),
(24, 1, 'images/img_img_/selectproduct.png', '2014-01-06'),
(26, 1, 'images/img_img_/logout.png', '2014-01-06'),
(27, 2, 'images/img_img_/editprofile.png', '2014-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `loc_id` int(5) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loc_price` double(6,2) NOT NULL,
  `loc_createdate` date NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`, `loc_price`, `loc_createdate`) VALUES
(1, 'ระยอง', 5000.00, '2013-10-27'),
(2, 'สระแก้ว', 9999.99, '2013-11-07'),
(3, 'จันทบุรี', 1000.00, '2013-11-18'),
(4, 'รังสิต', 10.00, '2013-11-13'),
(5, 'ลาดพร้าว', 100.00, '2013-11-14'),
(8, 'ยะลา', 1000.00, '2014-01-11'),
(9, 'พัทลุง', 999.00, '2014-01-11'),
(10, 'ยะลา', 1000.00, '2014-01-11'),
(11, 'ยะลา', 1000.00, '2014-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE IF NOT EXISTS `order_header` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `pers_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number_fermale` int(3) DEFAULT NULL,
  `order_number_male` int(3) DEFAULT NULL,
  `order_totalprice` double(10,2) DEFAULT NULL,
  `order_deposit` double(10,2) DEFAULT NULL,
  `order_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = ยังไม่จ่าย,1 = จ่ายแล้ว,2=fail',
  `order_approve_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = ยัง,1 = แล้ว,2 = error',
  `order_createdate` datetime NOT NULL,
  `order_success` enum('F','T') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F' COMMENT 'สถานะของตะกร้า F= ยังไม่สำเร็จ T=สำเร็จแล้ว',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`order_id`, `pers_id`, `order_date`, `order_time`, `order_number_fermale`, `order_number_male`, `order_totalprice`, `order_deposit`, `order_status`, `order_approve_status`, `order_createdate`, `order_success`) VALUES
(1, 18, '2013-12-22', '14:12', 0, 3, 9999.99, 0.00, 2, 2, '2013-12-22 00:00:00', 'T'),
(2, 16, '0000-00-00', '', 0, 0, 0.00, 0.00, 0, 0, '2014-01-14 21:40:47', 'F'),
(3, 16, '0000-00-00', '', 0, 0, 0.00, 0.00, 0, 0, '2014-01-16 23:58:10', 'F'),
(4, 16, '0000-00-00', '', 0, 0, 0.00, 0.00, 0, 0, '2014-01-17 00:05:25', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `order_location`
--

CREATE TABLE IF NOT EXISTS `order_location` (
  `order_lo_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `order_lo_createdate` date NOT NULL,
  `order_remark` text,
  PRIMARY KEY (`order_lo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `order_location`
--

INSERT INTO `order_location` (`order_lo_id`, `order_id`, `loc_id`, `order_lo_createdate`, `order_remark`) VALUES
(24, 5, 1, '2013-12-22', NULL),
(23, 5, 5, '2013-12-22', NULL),
(22, 5, 4, '2013-12-22', NULL),
(21, 5, 2, '2013-12-22', NULL),
(20, 5, 1, '2013-12-22', NULL),
(19, 5, 5, '2013-12-22', NULL),
(18, 5, 2, '2013-12-22', NULL),
(17, 5, 1, '2013-12-22', NULL),
(25, 5, 2, '2013-12-22', NULL),
(26, 5, 5, '2013-12-22', NULL),
(27, 5, 1, '2013-12-22', NULL),
(28, 5, 1, '2013-12-22', NULL),
(29, 5, 1, '2013-12-22', NULL),
(30, 5, 4, '2013-12-22', NULL),
(31, 5, 1, '2013-12-22', NULL),
(32, 5, 4, '2013-12-22', NULL),
(33, 5, 1, '2013-12-22', NULL),
(34, 5, 2, '2013-12-22', NULL),
(35, 5, 5, '2013-12-22', NULL),
(36, 5, 1, '2013-12-22', NULL),
(37, 5, 4, '2013-12-22', NULL),
(38, 5, 5, '2013-12-22', NULL),
(39, 5, 1, '2013-12-22', NULL),
(40, 5, 4, '2013-12-22', NULL),
(41, 5, 5, '2013-12-22', NULL),
(42, 5, 1, '2013-12-22', NULL),
(43, 5, 4, '2013-12-22', NULL),
(44, 5, 5, '2013-12-22', NULL),
(45, 5, 1, '2013-12-22', NULL),
(46, 5, 4, '2013-12-22', NULL),
(47, 5, 1, '2013-12-22', NULL),
(48, 5, 4, '2013-12-22', NULL),
(49, 5, 1, '2013-12-22', NULL),
(50, 5, 4, '2013-12-22', NULL),
(51, 5, 1, '2013-12-22', NULL),
(52, 5, 4, '2013-12-22', NULL),
(53, 5, 1, '2013-12-22', NULL),
(54, 5, 4, '2013-12-22', NULL),
(55, 5, 1, '2013-12-22', NULL),
(56, 5, 4, '2013-12-22', NULL),
(57, 5, 1, '2013-12-22', NULL),
(58, 5, 4, '2013-12-22', NULL),
(59, 5, 1, '2013-12-22', NULL),
(60, 5, 2, '2013-12-22', NULL),
(61, 5, 5, '2013-12-22', NULL),
(62, 5, 1, '2013-12-22', NULL),
(63, 5, 2, '2013-12-22', NULL),
(64, 5, 5, '2013-12-22', NULL),
(65, 5, 1, '2013-12-22', NULL),
(66, 5, 2, '2013-12-22', NULL),
(67, 5, 5, '2013-12-22', NULL),
(68, 5, 1, '2013-12-22', NULL),
(69, 5, 2, '2013-12-22', NULL),
(70, 5, 3, '2013-12-22', NULL),
(71, 5, 1, '2013-12-22', NULL),
(72, 5, 2, '2013-12-22', NULL),
(73, 5, 1, '2013-12-22', NULL),
(74, 5, 2, '2013-12-22', NULL),
(75, 5, 5, '2013-12-22', NULL),
(76, 7, 1, '2013-12-29', NULL),
(77, 7, 2, '2013-12-29', NULL),
(78, 7, 5, '2013-12-29', NULL),
(79, 8, 3, '2013-12-29', NULL),
(80, 8, 4, '2013-12-29', NULL),
(81, 8, 5, '2013-12-29', NULL),
(82, 9, 1, '2013-12-30', NULL),
(83, 9, 4, '2013-12-30', NULL),
(84, 10, 1, '2013-12-30', NULL),
(85, 10, 4, '2013-12-30', NULL),
(86, 10, 5, '2013-12-30', NULL),
(87, 11, 1, '2013-12-30', NULL),
(88, 11, 3, '2013-12-30', NULL),
(89, 11, 5, '2013-12-30', NULL),
(90, 12, 1, '2013-12-30', NULL),
(91, 12, 2, '2013-12-30', NULL),
(92, 12, 3, '2013-12-30', NULL),
(93, 13, 1, '2013-12-30', NULL),
(94, 13, 2, '2013-12-30', NULL),
(95, 13, 3, '2013-12-30', NULL),
(96, 14, 1, '2013-12-30', NULL),
(97, 14, 2, '2013-12-30', NULL),
(98, 14, 3, '2013-12-30', NULL),
(99, 15, 1, '2013-12-30', NULL),
(100, 15, 2, '2013-12-30', NULL),
(101, 15, 4, '2013-12-30', NULL),
(102, 15, 5, '2013-12-30', NULL),
(103, 16, 2, '2013-12-30', NULL),
(104, 16, 3, '2013-12-30', NULL),
(105, 16, 4, '2013-12-30', NULL),
(106, 16, 5, '2013-12-30', NULL),
(107, 16, 1, '2013-12-30', NULL),
(108, 16, 2, '2013-12-30', NULL),
(109, 16, 3, '2013-12-30', NULL),
(110, 16, 4, '2013-12-30', NULL),
(111, 16, 5, '2013-12-30', NULL),
(112, 17, 1, '2013-12-31', NULL),
(113, 17, 2, '2013-12-31', NULL),
(114, 17, 3, '2013-12-31', NULL),
(115, 17, 4, '2013-12-31', NULL),
(116, 17, 5, '2013-12-31', NULL),
(117, 18, 1, '2013-12-31', NULL),
(118, 18, 2, '2013-12-31', NULL),
(119, 18, 3, '2013-12-31', NULL),
(120, 19, 1, '2013-12-31', NULL),
(121, 19, 2, '2013-12-31', NULL),
(122, 19, 5, '2013-12-31', NULL),
(123, 19, 1, '2013-12-31', NULL),
(124, 19, 4, '2013-12-31', NULL),
(125, 19, 1, '2013-12-31', NULL),
(126, 19, 4, '2013-12-31', NULL),
(127, 19, 1, '2013-12-31', NULL),
(128, 19, 4, '2013-12-31', NULL),
(129, 19, 1, '2013-12-31', NULL),
(130, 19, 4, '2013-12-31', NULL),
(131, 19, 1, '2013-12-31', NULL),
(132, 19, 2, '2013-12-31', NULL),
(133, 19, 4, '2013-12-31', NULL),
(134, 19, 5, '2013-12-31', NULL),
(135, 20, 1, '2014-01-03', NULL),
(136, 20, 4, '2014-01-03', NULL),
(137, 20, 5, '2014-01-03', NULL),
(138, 20, 7, '2014-01-03', NULL),
(139, 37, 1, '2014-01-04', NULL),
(140, 37, 4, '2014-01-04', NULL),
(141, 37, 7, '2014-01-04', NULL),
(142, 38, 1, '2014-01-04', NULL),
(143, 38, 2, '2014-01-04', NULL),
(144, 38, 5, '2014-01-04', NULL),
(145, 38, 7, '2014-01-04', NULL),
(146, 40, 1, '2014-01-04', NULL),
(147, 40, 2, '2014-01-04', NULL),
(148, 40, 4, '2014-01-04', NULL),
(149, 40, 5, '2014-01-04', NULL),
(150, 41, 1, '2014-01-04', NULL),
(151, 41, 2, '2014-01-04', NULL),
(152, 41, 5, '2014-01-04', NULL),
(153, 43, 1, '2014-01-05', NULL),
(154, 43, 2, '2014-01-05', NULL),
(155, 43, 3, '2014-01-05', NULL),
(156, 43, 6, '2014-01-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_package`
--

CREATE TABLE IF NOT EXISTS `order_package` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `pers_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `temp_createdate` date NOT NULL,
  `temp_status` enum('T','F') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order_package`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `pers_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `temp_createdate` date NOT NULL,
  `temp_status` enum('T','F') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`temp_id`, `cart_id`, `pers_id`, `prod_id`, `temp_createdate`, `temp_status`) VALUES
(23, 2, 16, 49, '2014-01-14', 'F'),
(24, 2, 16, 49, '2014-01-14', 'F'),
(22, 2, 16, 50, '2014-01-14', 'F'),
(21, 2, 16, 47, '2014-01-14', 'F'),
(20, 2, 16, 49, '2014-01-14', 'F'),
(18, 2, 16, 50, '2014-01-14', 'F'),
(19, 2, 16, 39, '2014-01-14', 'F'),
(26, 3, 16, 49, '2014-01-16', 'F'),
(27, 3, 16, 39, '2014-01-16', 'F'),
(28, 3, 16, 46, '2014-01-16', 'F'),
(30, 4, 16, 49, '2014-01-17', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `pac_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `pac_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pac_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pac_createdate` date NOT NULL,
  PRIMARY KEY (`pac_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pac_id`, `pac_name`, `pac_img`, `pac_createdate`) VALUES
(15, 'ป่าดงดิบ', '../../images/package/logout.png', '2014-01-11'),
(9, 'ชุดเที่ยวระยอง', '../../images/package/cart.png', '2014-01-11'),
(10, 'พูลล', '../../images/package/payment.png', '2014-01-11'),
(12, 'ท่องเที่ยวภูเขา', '../../images/package/logout.png', '2014-01-11'),
(13, 'เที่ยวทะเละยอง', '../../images/package/payment.png', '2014-01-11'),
(14, 'ป่าชายเลน', '../../images/package/payment.png', '2014-01-11'),
(16, 'ทั่วเที่ยวไทย', '../../images/package/logout.png', '2014-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `package_set`
--

CREATE TABLE IF NOT EXISTS `package_set` (
  `pacset_id` int(11) NOT NULL AUTO_INCREMENT,
  `pac_id` int(11) NOT NULL,
  `pacset_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pacset_price` double(8,2) NOT NULL,
  `pacset_createdate` date NOT NULL,
  PRIMARY KEY (`pacset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `package_set`
--

INSERT INTO `package_set` (`pacset_id`, `pac_id`, `pacset_name`, `pacset_price`, `pacset_createdate`) VALUES
(14, 13, 'ทดสอบ', 1000.00, '2014-01-12'),
(3, 14, 'ย่อยเที่ยวป่าชายเลน', 1999.00, '2014-01-11'),
(7, 9, 'ย่อยเที่ยวไทย', 10000.00, '2014-01-11'),
(6, 12, 'ย่อยเที่ยวภูเขา', 9999.00, '2014-01-11'),
(10, 13, 'ย่อยเที่ยวทะเล', 10000.00, '2014-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `package_set_detail`
--

CREATE TABLE IF NOT EXISTS `package_set_detail` (
  `setd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pacset_id` int(11) NOT NULL,
  `setd_imgsize` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `setd_number` int(11) NOT NULL,
  `setd_createdate` date NOT NULL,
  PRIMARY KEY (`setd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `package_set_detail`
--

INSERT INTO `package_set_detail` (`setd_id`, `pacset_id`, `setd_imgsize`, `setd_number`, `setd_createdate`) VALUES
(1, 7, '1X1', 1, '2014-01-12'),
(2, 7, '2X2', 1, '2014-01-12'),
(3, 10, '3X3', 2, '2014-01-12'),
(4, 10, '4X4', 1, '2014-01-12'),
(5, 10, '5X5', 0, '2014-01-12'),
(6, 14, '6X6', 1, '2014-01-12'),
(7, 14, '8X9', 0, '2014-01-12'),
(9, 3, '1X1', 1, '2014-01-16'),
(10, 14, '99X99', 1, '2014-01-16'),
(11, 14, '99X99', 2, '2014-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(3) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `pay_priceamount` double(6,2) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pay_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` enum('T','F') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `pay_createdate` date NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `bank_id`, `cart_id`, `pay_priceamount`, `pay_date`, `pay_time`, `pay_img`, `pay_comment`, `pay_status`, `pay_createdate`) VALUES
(1, 2, 11, 111.00, '0000-00-00', '11:11', 'images/img_payment_/20_20130629_045726.PNG', '-', '', '2013-10-27'),
(2, 3, 11, 11.00, '0000-00-00', '11:11', 'images/img_payment_/11_20130625_231235.jpg', '-', '', '2013-10-27'),
(3, 2, 7, 4999.00, '0000-00-00', '10:10', 'images/img_payment_/readme.txt', '', 'F', '2013-12-30'),
(4, 2, 7, 4999.00, '0000-00-00', '10:10', 'images/img_payment_/ACmilan_1.jpg', '', 'F', '2013-12-30'),
(5, 2, 7, 4999.00, '0000-00-00', '10:10', 'images/img_payment_/Inter_2.jpg', '', 'F', '2013-12-30'),
(6, 2, 7, 4999.00, '0000-00-00', '10:10', 'images/img_payment_/Inter_2.jpg', '', 'F', '2013-12-30'),
(7, 2, 7, 4999.00, '0000-00-00', '10:10', 'images/img_payment_/Inter_2.jpg', '', 'F', '2013-12-30'),
(8, 4, 8, 0.00, '0000-00-00', '10:10', 'images/img_payment_/Manci_2.jpg', '', 'F', '2013-12-30'),
(9, 4, 13, 3434.00, '0000-00-00', '34:11', 'images/img_payment_/Mad_2.jpg', '', 'F', '2013-12-30'),
(10, 4, 16, 8056.00, '0000-00-00', '10:10', 'images/img_payment_/tfg1.png', '', 'F', '2013-12-30'),
(11, 3, 19, 9999.99, '0000-00-00', '10:10', 'images/img_payment_/shelaea_2.jpg', '', 'F', '2013-12-31'),
(12, 1, 43, 9999.99, '0000-00-00', '10:10', 'images/img_payment_/1506693_648292175232552_115707997_n.jpg', '', 'F', '2014-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `pers_id` int(11) NOT NULL AUTO_INCREMENT,
  `pref_id` int(2) NOT NULL,
  `prov_id` int(3) NOT NULL,
  `persta_id` int(3) NOT NULL COMMENT '1=admin,2=customer',
  `pers_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pres_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_idcard` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pers_birthday` date NOT NULL,
  `pers_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pers_alley` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_prefecture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pers_postcode` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `pers_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pers_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pres_active` enum('active','nonactive') COLLATE utf8_unicode_ci NOT NULL,
  `pers_createdate` date NOT NULL,
  PRIMARY KEY (`pers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pers_id`, `pref_id`, `prov_id`, `persta_id`, `pers_username`, `pres_password`, `pers_fname`, `pers_lname`, `pers_idcard`, `pers_birthday`, `pers_address`, `pers_alley`, `pers_district`, `pers_prefecture`, `pers_postcode`, `pers_phone`, `pers_email`, `pres_active`, `pers_createdate`) VALUES
(18, 1, 1, 2, 'test', 'test1234', 'test', 'test', '2222222222222', '2013-10-01', '11111111111', '1', '11', '1', '11111', '2222222222', '222', 'nonactive', '2014-01-05'),
(17, 1, 3, 2, 'user', 'user1234', 'user', 'user', '11111111111', '2013-10-01', '11', '11', '11', '11', '11', '1111111111', '11', 'nonactive', '2013-10-28'),
(16, 1, 1, 2, '8', '8', '8', '8', '8', '2013-10-18', '8', '8', '8', '8', '8', '8', '8', 'nonactive', '2013-10-27'),
(1, 1, 1, 1, 'admin', '1234', 'admin', 'admin', '111-111-111111-11', '2013-10-27', '191', '1', '1', '1', '11111', '0878356866', 'admin@hotmail.com', 'active', '2013-10-27'),
(19, 2, 1, 2, 'u', 'uuuuyyyy', 'u', 'u', '1111111111111', '2013-12-29', '1', '1', '1', '1', '1', '1111111111', '1', 'nonactive', '2013-12-31'),
(20, 2, 1, 2, 'd', 'dddddddd', 'd', 'd', '3333333333333', '2013-12-10', 'd', 'd', 'd', 'd', 'd', '2222222222', 'd', 'nonactive', '2013-12-29'),
(21, 4, 1, 2, 'f', 'f', 'f', 'f', '4444444444444', '2013-12-24', '44', '44', '4', '4', '4', '4444444444', '44', 'nonactive', '2013-12-29'),
(22, 1, 11, 2, 'poolsawat', 'poolsawat', 'poolsawat', 'poolsawat', '11111111122', '2014-01-05', '11111111111', '1', '11', '1', '11111', '2222222222', '222@tfg.co.th', 'nonactive', '2014-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `person_status`
--

CREATE TABLE IF NOT EXISTS `person_status` (
  `pers_id` int(3) NOT NULL AUTO_INCREMENT,
  `pers_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=admin,2=customer',
  PRIMARY KEY (`pers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `person_status`
--

INSERT INTO `person_status` (`pers_id`, `pers_name`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE IF NOT EXISTS `prefix` (
  `pref_id` int(11) NOT NULL AUTO_INCREMENT,
  `pref_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pref_descrition` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`pref_id`, `pref_name`, `pref_descrition`) VALUES
(1, 'Mr', 'นาย'),
(2, 'Miss', 'นางสาว'),
(3, 'Mrs', 'นาง'),
(4, 'Dr', 'ด๊อกเตอร์');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prod_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prod_price` double(6,2) NOT NULL,
  `prod_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prod_createdate` date NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `prod_price`, `prod_img`, `prod_createdate`) VALUES
(50, 'อภิญ', 'พูลสวัสดิ์', 9999.99, '../../images/product/selectproduct.png', '2014-01-11'),
(39, 'ทดสอบ', 'ทดสอบ', 100.00, '../../images/product/selectproduct.png', '2014-01-11'),
(47, '78', '78', 78.00, '../../images/product/service.png', '2014-01-11'),
(46, '4', '4', 4.00, '../../images/product/logout.png', '2014-01-11'),
(49, 'bag', 'กระเป๋า', 100.00, '../../images/product/order.png', '2014-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prom_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prom_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prom_createdate` date NOT NULL,
  PRIMARY KEY (`prom_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_code`, `prom_name`, `prom_img`, `prom_createdate`) VALUES
(13, '4', '4', 'images/img_promotion_/22_20130722_072447.png', '2013-10-27'),
(11, 'rr', 'rr', 'images/img_promotion_/', '2013-10-27'),
(12, '4', '4', 'images/img_promotion_/', '2013-10-27'),
(10, 'ProMo001', 'ProMo001', 'images/img_promotion_/11_20130625_205924.jpg', '2013-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `prov_id` int(5) NOT NULL AUTO_INCREMENT,
  `prov_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`prov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`prov_id`, `prov_name`) VALUES
(1, 'กรุงเทพมหานคร   '),
(2, 'สมุทรปราการ   '),
(3, 'นนทบุรี   '),
(4, 'ปทุมธานี   '),
(5, 'พระนครศรีอยุธยา   '),
(6, 'อ่างทอง   '),
(7, 'ลพบุรี   '),
(8, 'สิงห์บุรี   '),
(9, 'ชัยนาท   '),
(10, 'สระบุรี'),
(11, 'ชลบุรี   '),
(12, 'ระยอง   '),
(13, 'จันทบุรี   '),
(14, 'ตราด   '),
(15, 'ฉะเชิงเทรา   '),
(16, 'ปราจีนบุรี   '),
(17, 'นครนายก   '),
(18, 'สระแก้ว   '),
(19, 'นครราชสีมา   '),
(20, 'บุรีรัมย์   '),
(21, 'สุรินทร์   '),
(22, 'ศรีสะเกษ   '),
(23, 'อุบลราชธานี   '),
(24, 'ยโสธร   '),
(25, 'ชัยภูมิ   '),
(26, 'อำนาจเจริญ   '),
(27, 'หนองบัวลำภู   '),
(28, 'ขอนแก่น   '),
(29, 'อุดรธานี   '),
(30, 'เลย   '),
(31, 'หนองคาย   '),
(32, 'มหาสารคาม   '),
(33, 'ร้อยเอ็ด   '),
(34, 'กาฬสินธุ์   '),
(35, 'สกลนคร   '),
(36, 'นครพนม   '),
(37, 'มุกดาหาร   '),
(38, 'เชียงใหม่   '),
(39, 'ลำพูน   '),
(40, 'ลำปาง   '),
(41, 'อุตรดิตถ์   '),
(42, 'แพร่   '),
(43, 'น่าน   '),
(44, 'พะเยา   '),
(45, 'เชียงราย   '),
(46, 'แม่ฮ่องสอน   '),
(47, 'นครสวรรค์   '),
(48, 'อุทัยธานี   '),
(49, 'กำแพงเพชร   '),
(50, 'ตาก   '),
(51, 'สุโขทัย   '),
(52, 'พิษณุโลก   '),
(53, 'พิจิตร   '),
(54, 'เพชรบูรณ์   '),
(55, 'ราชบุรี   '),
(56, 'กาญจนบุรี   '),
(57, 'สุพรรณบุรี   '),
(58, 'นครปฐม   '),
(59, 'สมุทรสาคร   '),
(60, 'สมุทรสงคราม   '),
(61, 'เพชรบุรี   '),
(62, 'ประจวบคีรีขันธ์   '),
(63, 'นครศรีธรรมราช   '),
(64, 'กระบี่   '),
(65, 'พังงา   '),
(66, 'ภูเก็ต   '),
(67, 'สุราษฎร์ธานี   '),
(68, 'ระนอง   '),
(69, 'ชุมพร   '),
(70, 'สงขลา   '),
(71, 'สตูล   '),
(72, 'ตรัง   '),
(73, 'พัทลุง   '),
(74, 'ปัตตานี   '),
(75, 'ยะลา   '),
(76, 'นราธิวาส   '),
(77, 'บึงกาฬ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
