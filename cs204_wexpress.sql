-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2022 at 08:58 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs204_wexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `shipper_id` bigint(20) DEFAULT NULL,
  `sender_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipient_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipient_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recipient_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parcel_name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipper_id`, `sender_name`, `sender_address`, `sender_tel`, `recipient_name`, `recipient_address`, `recipient_tel`, `parcel_name`, `weight`, `status`, `date_created`) VALUES
(56, 18, 19, 'QT', '648 Vo Van Kiet', '445468', 'Pie', '634 Le Duan', '4454', 'Love', 3, 2, '2022-07-13 15:46:57'),
(55, 13, NULL, 'Khanh', '64 Bui Vien', '54646', 'Tran', '468 Lac Long Quan', '468468', 'Sach vo', 1, 1, '2022-07-13 15:44:52'),
(54, 12, NULL, 'Quan', '646 Kim Dong', '468468', 'Mom', '45 Thai Phien', '18454', 'Letter', 1, 1, '2022-07-13 14:48:30'),
(53, 12, 16, 'Quan', '45 Hong Bang', '468464', 'Minh Anh', '198 Nguyen Thi Nho', '5684684', 'Quan ao', 1, 3, '2022-07-13 14:47:37'),
(52, 14, NULL, 'Hien', '19 Nguyen Dinh Chieu', '1548664', 'Someone', '784 Nguyen Van  Cu', '684464', 'Something', 3, 1, '2022-07-13 14:46:40'),
(51, 14, NULL, 'Hien', '484 Vinh Vien', '18545', 'Khanh', '468 Nguyen Tri Phuong', '184846', 'Do an', 4, 1, '2022-07-13 14:45:28'),
(50, 14, NULL, 'Hien', '13 Nguyen Thi Minh Khai', '35168', 'Quan', '784 Nguyen Trai', '46846', 'Album', 1, 1, '2022-07-13 14:44:23'),
(49, 13, 17, 'Khanh', '468 Le Dai Hanh', '16168486', 'ITEC', '220 An Duong Vuong', '46848', 'Ho so', 3, 3, '2022-07-13 12:57:35'),
(48, 13, 17, 'Khanh', '45 Ly Chinh Thang', '1645', 'Hien', '78 Tran Phu', '468546', 'Tien', 1, 2, '2022-07-13 12:55:54'),
(47, 13, 19, 'Khanh', '78 An Duong Vuong', '1978', 'Quan', '4 Tran Binh Trong', '1230', 'Tai lieu', 5, 2, '2022-07-13 12:55:08'),
(45, 12, 17, 'Quan', '728 Ho Chi Minh', '090', 'Hien', '258 Pasteur', '1900', 'Det Lai', 1, 2, '2022-07-13 12:51:14'),
(46, 12, 16, 'Quan', '28 Ta Quang Buu', '9256', 'Khanh', '12 Le Hong Phong', '254845', 'Bai Tap', 2, 2, '2022-07-13 12:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `verified` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `role`, `verified`, `date_created`) VALUES
(19, 'sam123', 'sam@gmail.com', '$2y$10$vXVWZNNHOnhqy2F9sNg50eFxrBBkkNyAIlhF.vlvtGc0trAfPJNLy', 1, 1, '2022-07-13 15:47:27'),
(18, 'qtpie', 'qtp@gmail.com', '$2y$10$e7psAGXhMtAINDYVklXgr.XwQoGkWMUrbY0EHm0XygU2suDQWA24y', 2, 1, '2022-07-13 15:46:17'),
(17, 'phuotthu', 'phuotthu@gmail.com', '$2y$10$RPMSLIBNIkESMEQ6xLrdp.GziepdEk6JtLexiS.t/6X9qEz8wFXOK', 1, 1, '2022-07-13 15:00:19'),
(16, 'Biker', 'biker@gmail.com', '$2y$10$ET.ZVxhm6BTOZ4CEOdlGsOn6yC.hD5oNUSqzRiBSAGgUDgW2PezbC', 1, 1, '2022-07-13 14:59:40'),
(8, 'admin', 'admin@gmail.com', '$2y$10$j1ZL1TmSdc3.SIMRw6CQDOGEoggCcYUcGSLeUk9rbVUqTNbtEQ7LW', 0, 1, '2022-07-10 17:27:59'),
(13, 'ngkhn', 'ngkhn@gmail.com', '$2y$10$RoZavyifEYvzoXcfSxz9J.SCgTOa6SZ4V1JrxMPe7Z1jCDVbzahh.', 2, 1, '2022-07-13 12:54:17'),
(14, 'Hien', 'hien258@gmail.com', '$2y$10$vo8JoTRaTGnSn68vBbfbse2kBBqzFA42s5IfWEdaD0/Pn6gOZrgYW', 2, 1, '2022-07-13 14:42:14'),
(12, 'Quan', 'qnv@gmail.com', '$2y$10$FAiBxtr7jk6AfSGqBGzZ0u2QYsP3Tet4mEeFajsxDm5V38qTT.pq.', 2, 1, '2022-07-13 12:47:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
