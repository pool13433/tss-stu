-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2014 at 07:55 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `album_nameth` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `album_nameeng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `album_createdate` date NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_nameth`, `album_nameeng`, `album_createdate`) VALUES
(46, 'แต่งงาน', 'wedding', '2014-07-25'),
(47, 'แฟชั่น', 'fashion', '2014-07-25'),
(48, 'ชุดไทย', 'thai', '2014-07-25'),
(49, 'ครอบครัว', 'family', '2014-07-25'),
(52, 'สัญลักษณ์เครื่องมือ', 'tools', '2014-07-25'),
(51, 'ตกแต่ง', 'decorations', '2014-07-25'),
(53, 'สินค้าตามความต้องการ', 'product_request', '2014-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `album_file`
--

CREATE TABLE IF NOT EXISTS `album_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `album_file`
--

INSERT INTO `album_file` (`file_id`, `album_id`, `file_name`) VALUES
(25, 18, '4EmODx6FDJ.png'),
(26, 18, 'pLGZBARvx6.png'),
(27, 18, 'LZyLtHuyCj.png'),
(36, 21, 'CEzID6533L.png'),
(37, 21, 'eaHCBKW8i2.png'),
(102, 46, 'vVuZVgg21L.jpg'),
(103, 46, 'yVRFdD2FAB.jpg'),
(104, 46, 'GZvQlnkM90.jpg'),
(105, 46, 'SqGDwc1s67.jpg'),
(106, 46, 'MbWC24TGoO.jpg'),
(107, 46, 'jMXC1Rieoq.jpg'),
(108, 46, 'wQfpdcWjuv.jpg'),
(109, 46, 'i4UuGbBlWB.jpg'),
(110, 46, '8PpOB7VLCX.jpg'),
(111, 46, 'PVgzZh8EIh.jpg'),
(112, 46, 'krSUqEODwv.jpg'),
(113, 46, 'mpeISJDubx.jpg'),
(114, 46, 'jzEjoa61qZ.jpg'),
(115, 46, 'S8xgQCjHjX.jpg'),
(116, 46, 'Qxa5ItIv2K.jpg'),
(117, 46, 'Pbo3QzSDAD.jpg'),
(118, 46, '5bpR7WaczC.jpg'),
(119, 46, 'c9wrlEz7Wb.jpg'),
(120, 46, 'ORQHQppHKY.jpg'),
(121, 46, 'r78gks5vSF.jpg'),
(122, 46, 'cqsdzdT4ND.jpg'),
(123, 46, 'xIXRf6FElH.jpg'),
(124, 46, 'ZbGuydBWqW.jpg'),
(125, 46, 'X0d55a0SOn.jpg'),
(126, 46, 'p1v8uK0nRK.jpg'),
(127, 47, 'EAChiJl2gh.jpg'),
(128, 47, '8fpdBD5YOp.jpg'),
(129, 47, '7ynhRpou9w.jpg'),
(130, 47, 'rJllCfhQvK.jpg'),
(131, 47, 'iverfim3sF.jpg'),
(132, 47, '0ONCJqAzF7.jpg'),
(133, 47, 'FxnBpYZ5EQ.jpg'),
(134, 47, '3kICHvsgvm.jpg'),
(135, 47, 'dfy5QxtrGC.jpg'),
(136, 47, 'jCzrHkRtJO.jpg'),
(137, 47, 'nIYMuAxr25.jpg'),
(138, 47, '0wlGufglzk.jpg'),
(139, 47, '9wlZQdpWFR.jpg'),
(140, 48, 'Qpurg6ErKf.jpg'),
(141, 48, 'ZNTzQ0Nh41.jpg'),
(142, 48, '35ZjKetRtq.jpg'),
(143, 48, 'R7lSY4Vjba.jpg'),
(144, 48, 'lWjo9uIctb.jpg'),
(145, 48, 'fzUJdYwmvn.jpg'),
(146, 48, 'VMqfddQyYn.jpg'),
(147, 48, '6Liv1QNhYg.jpg'),
(148, 48, 'xXN08fOwFm.jpg'),
(149, 48, 'TMK0mgsq5V.jpg'),
(150, 48, 'oknfDW6bNX.jpg'),
(151, 48, 'BdYCIjJDMV.jpg'),
(152, 48, 'ceF3W7G84w.jpg'),
(153, 48, 'Haba2Amfyo.jpg'),
(154, 48, 'bvB2M91uIU.jpg'),
(155, 48, '8d6YOcw6nT.jpg'),
(156, 48, '4uGhlR4Orr.jpg'),
(157, 48, 'otWVZJXyGx.jpg'),
(158, 48, '42RnnBkdtX.jpg'),
(159, 48, 'rwrk2gTrtV.gif'),
(160, 49, 'DH6xTy2IpZ.jpg'),
(161, 49, 'u23Z2da1Ms.jpg'),
(162, 49, 'z3jvCxIzat.jpg'),
(163, 49, 'Bmxi36A0Fw.jpg'),
(164, 49, 'F3xOBqgJLy.jpg'),
(165, 49, 'VsXr8KyyXM.jpg'),
(166, 49, 'pP1jPMoxGl.jpg'),
(167, 49, 'Gbi0YtxIS7.jpg'),
(168, 49, 'JYskJIkQSq.jpg'),
(169, 49, 'AS04O8u87Q.jpg'),
(170, 49, '8y4JiPM0PU.jpg'),
(171, 49, 'Qn5gm5SRUP.jpg'),
(172, 49, 'zbAQ0cYQwm.jpg'),
(173, 49, 'c2XDP9GwYp.jpg'),
(174, 49, 'vXcwNqDHoT.jpg'),
(175, 51, 'vGFQ277aG7.gif'),
(176, 51, 'FkN9pAcaWD.gif'),
(177, 51, 'fFlGNBeuaq.png'),
(178, 51, 'Ged8iDibaW.jpg'),
(179, 51, 'exTQoGyAAz.jpg'),
(180, 51, 'LRbFAU1XEr.jpg'),
(181, 51, 'rU1FitjjV8.jpg'),
(182, 51, 'BBaQuem65s.JPG'),
(183, 51, 'mQXYvyd0Dc.JPG'),
(184, 51, 'rg6fJYLGHR.JPG'),
(185, 51, 'VWp7s1tvHn.jpg'),
(186, 51, 'ZdvZwXcjcY.jpg'),
(187, 51, 'CjBX8tPaAL.jpg'),
(188, 51, 'shiDAx85PE.jpg'),
(189, 51, 'qygP10tOgW.jpg'),
(190, 51, 'zOZj9xyAid.jpg'),
(191, 51, 'NJAz3d9Ob0.jpg'),
(192, 51, 'yEwAUkUUNy.jpg'),
(193, 51, 'HskxJb4Zky.jpg'),
(194, 51, '89ny6KbE5Y.jpg'),
(195, 51, 'BOFyZvWHbG.jpg'),
(196, 51, 'v9wPr7QVmk.jpg'),
(197, 51, 'uplYkgZNGY.JPG'),
(198, 51, 'oZpu9jQhlX.jpg'),
(199, 51, 'PkzDH5WAkx.jpg'),
(200, 51, '1w18VEFRfI.jpg'),
(201, 51, 'za4UA20X3W.jpg'),
(202, 51, '74QQ10gdOW.jpg'),
(203, 51, 'b14BWJTdmj.jpg'),
(204, 51, 'TvOe8G8tet.jpg'),
(205, 52, 'Eug4efQede.gif'),
(206, 52, '39qouyddeE.gif'),
(207, 52, 'rETbrbzl3M.gif'),
(208, 52, 'PRDTNX0w2l.gif'),
(209, 52, 'w6Ff2DhnSy.gif'),
(210, 52, 'WYURhIr0nR.gif'),
(211, 52, 'mXO7YbHH9F.gif'),
(212, 52, 'CkdRFd1Kr5.jpg'),
(213, 52, 'UM29JW29PH.gif'),
(214, 53, 'yh20agHlYk.jpg'),
(215, 53, 'FGzbhu23oK.jpg'),
(216, 53, 'ZEkTvdWUbr.jpg'),
(217, 53, 'Ag7y5WThNo.jpg'),
(218, 53, 'CPyATUI0MM.jpg'),
(219, 53, '7BU76Rl9wK.jpg'),
(220, 53, 'GCII2IvK0a.jpg'),
(221, 53, 'giEcPmAwxo.jpg'),
(222, 53, 'UmelcrgIyX.jpg'),
(223, 53, 'tszEd2lJjq.jpg'),
(224, 53, 'tV753rt0E0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(3) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_detail`) VALUES
(61, 'ทหารไทย', ''),
(54, 'กสิกรไทย', 'กสิกรไทย'),
(55, 'กรุงเทพ', ''),
(56, 'ไทยพาณิชย์', ''),
(57, 'กรุงศรีอยุธยา', ''),
(58, 'กรุงไทย', ''),
(59, 'TMB', ''),
(60, 'บัวหลวง', ''),
(62, 'นครหลวง', ''),
(63, 'ธกศ', ''),
(64, 'เกียตนาคิน', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `loc_name`, `loc_price`, `loc_createdate`) VALUES
(1, 'ระยอง', 5000.00, '2013-10-27'),
(2, 'สระแก้ว', 9999.99, '2013-11-07'),
(3, 'จันทบุรี', 1000.00, '2013-11-18'),
(4, 'รังสิต', 10.00, '2013-11-13'),
(5, 'ลาดพร้าว', 100.00, '2013-11-14'),
(9, 'พัทลุง', 999.00, '2014-01-11'),
(10, 'ยะลา', 1000.00, '2014-01-11'),
(12, 'กรุงเทพ', 9999.99, '2014-01-18'),
(13, 'จันทบุรี', 950.00, '2014-01-18'),
(14, 'เชียงใหม่', 450.00, '2014-01-18'),
(15, 'ปทุมธานี', 350.00, '2014-01-18'),
(16, 'อุบลราชธานี', 250.00, '2014-01-18');

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
  `order_payment_datetime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'วัน เวลา จ่ายเงิน',
  `order_approve_status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะ การอนุมัติ 0 = ยัง,1 = แล้ว,2 = error',
  `order_createdate` datetime NOT NULL,
  `order_success` int(11) NOT NULL COMMENT 'สถานะของตะกร้า 0= ยังไม่สำเร็จ 1=สำเร็จแล้ว 2 = ยกเลิก 3 = ถ่าย เสร็จเรียบร้อยแล้ว',
  `order_takephoto` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะ การถ่ายภาพ 0= ยัง,1 = ถ่ายแล้ว',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`order_id`, `pers_id`, `order_date`, `order_time`, `order_number_fermale`, `order_number_male`, `order_totalprice`, `order_deposit`, `order_status`, `order_payment_datetime`, `order_approve_status`, `order_createdate`, `order_success`, `order_takephoto`) VALUES
(42, 35, '2014-07-01', '11:11-12:33', 10, 5, 340.00, 10.00, 1, NULL, 0, '2014-07-25 20:01:23', 1, 0),
(39, 35, '2014-07-01', '10.00-12.00', 2, 1, 6609.00, 1000.00, 1, NULL, 1, '2014-07-25 00:48:17', 1, 1),
(51, 35, '2014-07-03', '11:12-03:34', 2, 1, 7925.00, 3.00, 0, NULL, 0, '2014-07-25 23:26:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_location`
--

CREATE TABLE IF NOT EXISTS `order_location` (
  `order_lo_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `order_lo_createdate` date NOT NULL,
  PRIMARY KEY (`order_lo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `order_location`
--

INSERT INTO `order_location` (`order_lo_id`, `order_id`, `loc_id`, `order_lo_createdate`) VALUES
(182, 26, 1, '2014-07-20'),
(183, 26, 1, '2014-07-20'),
(184, 26, 1, '2014-07-20'),
(185, 26, 1, '2014-07-20'),
(186, 26, 1, '2014-07-20'),
(187, 26, 2, '2014-07-20'),
(188, 26, 2, '2014-07-20'),
(189, 26, 2, '2014-07-20'),
(190, 27, 3, '2014-07-20'),
(191, 28, 1, '2014-07-21'),
(192, 28, 2, '2014-07-21'),
(193, 28, 3, '2014-07-21'),
(194, 28, 4, '2014-07-21'),
(195, 29, 1, '2014-07-21'),
(196, 29, 2, '2014-07-21'),
(197, 29, 3, '2014-07-21'),
(198, 30, 1, '2014-07-21'),
(199, 30, 2, '2014-07-21'),
(200, 31, 1, '2014-07-22'),
(201, 31, 16, '2014-07-22'),
(202, 39, 1, '2014-07-25'),
(203, 39, 4, '2014-07-25'),
(204, 39, 5, '2014-07-25'),
(205, 39, 9, '2014-07-25'),
(206, 42, 16, '2014-07-25'),
(207, 51, 1, '2014-07-25'),
(208, 51, 3, '2014-07-25'),
(209, 51, 10, '2014-07-25'),
(210, 51, 15, '2014-07-25');

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
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `order_package`
--

INSERT INTO `order_package` (`temp_id`, `cart_id`, `pers_id`, `pack_id`, `temp_createdate`) VALUES
(51, 51, 35, 17, '2014-07-25'),
(48, 45, 35, 17, '2014-07-25'),
(45, 39, 35, 18, '2014-07-25'),
(44, 37, 35, 17, '2014-07-25');

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
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`temp_id`, `cart_id`, `pers_id`, `prod_id`, `temp_createdate`) VALUES
(88, 47, 35, 50, '2014-07-25'),
(87, 46, 35, 47, '2014-07-25'),
(85, 42, 35, 39, '2014-07-25'),
(83, 38, 35, 39, '2014-07-25'),
(82, 36, 35, 39, '2014-07-25'),
(79, 33, 35, 39, '2014-07-25'),
(78, 33, 35, 39, '2014-07-25'),
(77, 33, 35, 39, '2014-07-25'),
(92, 51, 35, 47, '2014-07-25');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pac_id`, `pac_name`, `pac_img`, `pac_createdate`) VALUES
(25, 'แต่งงาน', 'JEoPIXRDNr.jpg', '2014-07-25'),
(26, 'แฟชั่น', '8EO2Pz5e2E.jpg', '2014-07-25'),
(27, 'ไทย', 'uYkzkKPzux.jpg', '2014-07-25'),
(28, 'ครอบครัว', 'QGDOXGmbwp.jpg', '2014-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `package_set`
--

CREATE TABLE IF NOT EXISTS `package_set` (
  `pacset_id` int(11) NOT NULL AUTO_INCREMENT,
  `pac_id` int(11) NOT NULL,
  `pacset_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pacset_price` double(8,2) NOT NULL,
  `pacset_remark` text COLLATE utf8_unicode_ci NOT NULL,
  `pacset_createdate` date NOT NULL,
  PRIMARY KEY (`pacset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `package_set`
--

INSERT INTO `package_set` (`pacset_id`, `pac_id`, `pacset_name`, `pacset_price`, `pacset_remark`, `pacset_createdate`) VALUES
(15, 9, 'เที่ยว เขาดิน', 99999.00, 'เที่ยว เขาดิน', '2014-07-21'),
(3, 14, 'ย่อยเที่ยวป่าชายเลน', 1999.00, '', '2014-01-11'),
(7, 9, 'ย่อยเที่ยวไทย', 10000.00, '22222', '2014-01-11'),
(6, 12, 'ย่อยเที่ยวภูเขา', 9999.00, '', '2014-01-11'),
(10, 12, 'ย่อยเที่ยวทะเล', 10000.00, '', '2014-01-11'),
(11, 9, 'เที่ยว ภูกระดึง', 50000.00, 'เที่ยว ภูกระดึง เที่ยว ภูกระดึง', '2014-07-21'),
(13, 9, 'เที่ยว มั่งก็ได้', 44444.00, '4444444', '2014-07-21'),
(14, 9, 'เที่ยว เขายายพริ้ง', 50000.00, 'เที่ยว เขายายพริ้ง', '2014-07-21'),
(16, 9, 'New set', 11111.00, 'New set', '2014-07-22'),
(17, 25, 'งานแต่งงาน 1', 500.00, '', '2014-07-25'),
(18, 26, 'แฟชั่น1', 1500.00, '1500', '2014-07-25'),
(19, 27, 'ไทย1', 19000.00, '', '2014-07-25'),
(20, 28, 'ครอบครัว1', 999.00, '', '2014-07-25');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `package_set_detail`
--

INSERT INTO `package_set_detail` (`setd_id`, `pacset_id`, `setd_imgsize`, `setd_number`, `setd_createdate`) VALUES
(64, 17, '1', 5, '2014-07-25'),
(65, 17, '5', 2, '2014-07-25'),
(66, 18, '1', 5, '2014-07-25'),
(67, 18, '5', 1, '2014-07-25'),
(68, 18, '3', 2, '2014-07-25'),
(69, 18, '2', 3, '2014-07-25'),
(70, 19, '2', 22, '2014-07-25'),
(71, 19, '4', 33, '2014-07-25'),
(72, 19, '3', 44, '2014-07-25'),
(73, 20, '1', 22, '2014-07-25'),
(74, 20, '3', 33, '2014-07-25'),
(75, 20, '2', 44, '2014-07-25'),
(76, 20, '4', 5, '2014-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(3) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pay_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `pay_createdate` date NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `bank_id`, `order_id`, `pay_date`, `pay_time`, `pay_file`, `pay_comment`, `pay_createdate`) VALUES
(30, 56, 42, '2014-07-02', '11:11', 'CW1DThpi9y.gif', '', '2014-07-25'),
(28, 62, 39, '2014-07-01', '11:11', '1%20(20).jpg', '11', '2014-07-25');

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
  `pers_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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
  `pers_active` enum('active','nonactive') COLLATE utf8_unicode_ci NOT NULL,
  `pers_createdate` date NOT NULL,
  PRIMARY KEY (`pers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pers_id`, `pref_id`, `prov_id`, `persta_id`, `pers_username`, `pers_password`, `pers_fname`, `pers_lname`, `pers_idcard`, `pers_birthday`, `pers_address`, `pers_alley`, `pers_district`, `pers_prefecture`, `pers_postcode`, `pers_phone`, `pers_email`, `pers_active`, `pers_createdate`) VALUES
(1, 1, 1, 1, 'admin', '1234', 'admin', 'admin', '111-111-111111-11', '2013-10-27', '191', '1', '1', '1', '11111', '0878356866', 'admin@hotmail.com', 'active', '2013-10-27'),
(35, 0, 64, 2, 'user', '1234', '11111111', '11111111', '11111111', '2014-07-01', '11111111', '11111111', '11111111', '11111111', '11111', '11111111', 'poon_mp@hotmail.com', 'nonactive', '2014-07-20'),
(37, 3, 64, 2, 'pool', 'poolpool', 'pool', 'pool', '1111111111111', '2014-07-01', 'pool', 'pool', 'pool', 'pool', 'pool', '0870000000', 'poon_mp@hotmail.com', 'nonactive', '2014-07-25'),
(32, 2, 64, 2, '1234', '1234', '11111111', '11111111', '11111111', '2014-07-01', '11111111', '11111111', '11111111', '11111111', '11111', '11111111', 'poon_mp@hotmail.com', 'nonactive', '2014-07-17'),
(33, 2, 64, 1, '22222222', '22222222', '22222222', '22222222', '22222222', '2014-07-02', '22222222', '22222222', '22222222', '22222222', '22222', '22222222', 'poon_mp@hotmail.com', 'nonactive', '2014-07-17'),
(34, 1, 64, 2, 'user', '1234', '11111111', '11111111', '11111111', '2014-07-01', '11111111', '11111111', '11111111', '11111111', '11111', '11111111', 'poon_mp@hotmail.com', 'nonactive', '2014-07-20');

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
-- Table structure for table `photo_size`
--

CREATE TABLE IF NOT EXISTS `photo_size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(50) NOT NULL,
  `size_unit` varchar(25) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `photo_size`
--

INSERT INTO `photo_size` (`size_id`, `size_name`, `size_unit`) VALUES
(1, '11x11', 'centimate'),
(2, '2x2', 'centimate'),
(3, '1x1', 'centimate'),
(4, '99x99', 'inches'),
(5, '1212x1212', 'inches');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE IF NOT EXISTS `prefix` (
  `pref_id` int(11) NOT NULL AUTO_INCREMENT,
  `pref_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pref_descrition` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`pref_id`, `pref_name`, `pref_descrition`) VALUES
(1, 'Mr', 'นาย'),
(2, 'Miss', 'นางสาว'),
(3, 'Mrs', 'นาง'),
(4, 'Dr', 'ด๊อกเตอร์'),
(11, 'ด.ช.', 'เด็กชาย'),
(12, 'ด.ญ.', 'เด็กหญิง'),
(13, 'ว่าที่ ร.ต.', 'ว่าที่ ร้อยตรี');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `prod_price`, `prod_img`, `prod_createdate`) VALUES
(50, 'อภิญ', 'พูลสวัสดิ์', 9999.99, 'selectproduct.png', '2014-01-11'),
(39, 'ทดสอบ', 'ทดสอบ', 100.00, 'WaBhoHsCtZ.PNG', '2014-01-11'),
(47, '78', '78', 78.00, 'service.png', '2014-01-11'),
(46, '4', '4', 4.00, 'ZejhUfLic4.PNG', '2014-01-11'),
(49, 'bag', 'กระเป๋า', 100.00, 'order.png', '2014-01-11'),
(55, 'Picture', 'Picture', 1111.00, 's1u60BuUoX.PNG', '2014-07-19'),
(56, 'THB', 'ทดสอบ', 100.00, 'bBz8mmITDh.png', '2014-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prom_file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prom_startdate` date NOT NULL,
  `prom_enddate` date NOT NULL,
  `prom_createdate` date NOT NULL,
  PRIMARY KEY (`prom_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_name`, `prom_file`, `prom_startdate`, `prom_enddate`, `prom_createdate`) VALUES
(17, 'ลด ราคา เฉพาะ', '6ncqsOSroL.jpg', '2014-08-03', '2014-08-12', '2014-07-26'),
(15, 'ซื้อ 2 แถม 1', 'bZKLQ4PE1Q.jpg', '2014-07-26', '2014-08-30', '2014-07-26'),
(16, 'ซื้อ 3 แถม 1', 'ulIUramlUZ.jpg', '2014-08-01', '2014-08-29', '2014-07-26'),
(14, 'ซื้อ 1 แถม 1', '7c0XL0RIK3.gif', '2014-08-03', '2014-08-30', '2014-07-26');

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
