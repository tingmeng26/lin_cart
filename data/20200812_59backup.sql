-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020-08-12 04:36:22
-- 伺服器版本： 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hayashi20`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `mid` varchar(80) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_backup` varchar(50) NOT NULL,
  `pic` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info` text NOT NULL,
  `r_id` int(11) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `factory` varchar(100) DEFAULT NULL,
  `work` varchar(100) NOT NULL,
  `ispublic` tinyint(4) NOT NULL,
  `isadmin` tinyint(4) NOT NULL,
  `forgetcode` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgetcode_time` datetime NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loginout_time` int(11) NOT NULL,
  `system_notice` varchar(30) NOT NULL,
  `mail_notice` varchar(30) NOT NULL,
  `admin` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logintime` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `mid`, `username`, `password`, `name`, `email`, `email_backup`, `pic`, `info`, `r_id`, `company`, `factory`, `work`, `ispublic`, `isadmin`, `forgetcode`, `forgetcode_time`, `ip`, `loginout_time`, `system_notice`, `mail_notice`, `admin`, `logintime`, `createtime`, `updatetime`) VALUES
(1, '7souioxkhlskjh867517ceb20a2fcbd61597057118rtgki5qskrfqbr1kdlgqirg', 'admin', '8450eca01665516d9aeb5317764902b78495502637c96192c81b1683d32d691a0965cf037feca8b9ed9ee6fc6ab8f27fce8f77c4fd9b4a442a00fc317b8237e6', '管理者', 'admin@gmail.com', '', '1490757979.JPG', '最高管理員', 2, '1', '1', '1', 1, 1, NULL, '0000-00-00 00:00:00', '192.168.1.1', 3, '1,2,3,4', '', 'admin', '2020-08-10 18:58:38', '0000-00-00 00:00:00', '2018-10-02 13:10:45'),
(2, 'dcfcc24b89f30f826483df550cce55c61536742066mk5ocpuu9coi94ltnbptqtd', 'jessica', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'ライトニング', 'jessica@coder.com.tw', '', '1490757967.jpg', 'test ????', 7, '5', '8', '16', 1, 0, NULL, '0000-00-00 00:00:00', '::1', 3, '', '', 'admin', '2018-09-12 16:47:46', '2016-02-16 15:27:26', '2018-10-02 13:06:10'),
(3, '4d1bf982d05c9d336871f892fd1934a6', 'genie', '8450eca01665516d9aeb5317764902b78495502637c96192c81b1683d32d691a0965cf037feca8b9ed9ee6fc6ab8f27fce8f77c4fd9b4a442a00fc317b8237e6', 'Genie', 'genie@ivplus.com.tw', 'genie@ivplus.com.tw', '1596783174ZL2fYi.png', '', 6, NULL, NULL, '', 1, 1, NULL, '0000-00-00 00:00:00', '', 0, '', '', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-08-07 14:52:57');

-- --------------------------------------------------------

--
-- 資料表結構 `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `main_key` int(11) NOT NULL,
  `fun_key` int(11) NOT NULL,
  `descript` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL,
  `ip` char(15) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `admin_log`
--

INSERT INTO `admin_log` (`id`, `username`, `main_key`, `fun_key`, `descript`, `createtime`, `ip`, `action`) VALUES
(150, 'admin', 0, 0, 'admin登入成功', '2020-07-29 11:52:20', '192.168.1.1', 1),
(151, 'admin', 3, 1, '產品分類大類 id:3', '2020-07-29 11:55:56', '192.168.1.1', 8),
(152, 'admin', 3, 1, '產品分類大類 id:5', '2020-07-29 11:56:25', '192.168.1.1', 8),
(153, 'admin', 3, 1, '產品分類大類 id:4', '2020-07-29 11:56:44', '192.168.1.1', 8),
(154, 'admin', 3, 3, '產品管理 id:6', '2020-07-29 11:59:12', '192.168.1.1', 8),
(155, 'admin', 3, 3, '產品管理 id:6', '2020-07-29 12:25:47', '192.168.1.1', 8),
(156, 'admin', 3, 3, '產品管理 id:6', '2020-07-29 12:26:29', '192.168.1.1', 8),
(157, 'admin', 0, 0, 'admin登入成功', '2020-07-29 14:14:34', '192.168.1.1', 1),
(158, 'admin', 0, 0, 'admin登入成功', '2020-07-30 17:49:01', '117.19.196.4', 1),
(159, 'admin', 0, 0, 'admin登入成功', '2020-07-31 11:23:32', '192.168.1.1', 1),
(160, 'admin', 0, 0, 'admin登入成功', '2020-07-31 11:30:03', '192.168.1.1', 1),
(161, 'admin', 0, 0, 'admin登入成功', '2020-07-31 11:30:39', '192.168.1.1', 1),
(162, 'admin', 3, 1, '產品分類大類 id:', '2020-07-31 11:38:47', '192.168.1.1', 4),
(163, 'admin', 0, 0, 'admin登入成功', '2020-07-31 11:44:22', '36.238.52.138', 1),
(164, 'admin', 3, 2, '產品分類細項 id:', '2020-07-31 11:52:17', '192.168.1.1', 4),
(165, 'admin', 3, 3, '產品管理 id:', '2020-07-31 11:57:05', '192.168.1.1', 4),
(166, 'admin', 3, 3, '產品管理 id:9', '2020-07-31 11:57:22', '192.168.1.1', 8),
(167, 'admin', 3, 3, '產品管理 id:', '2020-07-31 11:58:03', '192.168.1.1', 4),
(168, 'admin', 3, 3, '產品管理 id:9', '2020-07-31 12:07:43', '192.168.1.1', 8),
(169, 'admin', 4, 1, ' id:12', '2020-07-31 12:54:48', '192.168.1.1', 8),
(170, 'admin', 0, 0, 'admin登入成功', '2020-08-03 16:09:31', '192.168.1.1', 1),
(171, 'admin', 0, 0, 'admin登入成功', '2020-08-04 10:53:34', '192.168.1.1', 1),
(172, 'admin', 0, 0, 'admin登入成功', '2020-08-04 12:41:20', '192.168.1.1', 1),
(173, 'admin', 3, 3, '產品管理 id:', '2020-08-04 12:49:10', '192.168.1.1', 4),
(174, 'admin', 3, 2, '產品分類細項 id:8', '2020-08-04 13:18:06', '192.168.1.1', 8),
(175, 'admin', 3, 2, '產品分類細項 id:8', '2020-08-04 13:18:20', '192.168.1.1', 8),
(176, 'admin', 3, 2, '產品分類細項 id:8', '2020-08-04 13:31:36', '192.168.1.1', 8),
(177, 'admin', 3, 2, '產品分類細項 id:8', '2020-08-04 13:31:58', '192.168.1.1', 8),
(178, 'admin', 3, 2, '產品分類細項 id:', '2020-08-04 15:48:12', '192.168.1.1', 4),
(179, 'admin', 3, 3, '產品管理 id:', '2020-08-04 15:49:19', '192.168.1.1', 4),
(180, 'admin', 3, 2, '1筆資料(\'22\')', '2020-08-04 15:49:26', '192.168.1.1', 16),
(181, 'admin', 3, 1, '產品分類大類 id:', '2020-08-04 15:53:53', '192.168.1.1', 4),
(182, 'admin', 3, 2, '產品分類細項 id:', '2020-08-04 16:01:06', '192.168.1.1', 4),
(183, 'admin', 3, 3, '產品管理 id:', '2020-08-04 17:11:53', '192.168.1.1', 4),
(184, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:14:29', '192.168.1.1', 8),
(185, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:24:39', '192.168.1.1', 8),
(186, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:28:00', '192.168.1.1', 8),
(187, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:28:22', '192.168.1.1', 8),
(188, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:28:51', '192.168.1.1', 8),
(189, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:30:04', '192.168.1.1', 8),
(190, 'admin', 2, 2, '語系字典列表 id:1548', '2020-08-04 17:31:39', '192.168.1.1', 4),
(191, 'admin', 2, 2, '語系字典列表 id:1548', '2020-08-04 17:35:59', '192.168.1.1', 8),
(192, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:41:55', '192.168.1.1', 8),
(193, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:44:08', '192.168.1.1', 8),
(194, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:45:40', '192.168.1.1', 8),
(195, 'admin', 3, 3, '產品管理 id:11', '2020-08-04 17:46:07', '192.168.1.1', 8),
(196, 'admin', 3, 3, '產品管理 id:', '2020-08-04 17:52:58', '192.168.1.1', 4),
(197, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:54:40', '192.168.1.1', 8),
(198, 'admin', 3, 3, '產品管理 id:13', '2020-08-04 17:57:49', '192.168.1.1', 8),
(199, 'admin', 0, 0, 'admin登入成功', '2020-08-05 11:14:32', '192.168.1.1', 1),
(200, 'admin', 3, 3, '產品管理 id:11', '2020-08-05 11:28:22', '192.168.1.1', 8),
(201, 'admin', 3, 1, '產品分類大類 id:6', '2020-08-05 16:16:27', '192.168.1.1', 8),
(202, 'admin', 3, 1, '產品分類大類 id:6', '2020-08-05 16:51:43', '192.168.1.1', 8),
(203, 'admin', 3, 2, '產品分類細項 id:21', '2020-08-05 16:51:56', '192.168.1.1', 8),
(204, 'admin', 3, 3, '產品管理 id:', '2020-08-05 16:53:44', '192.168.1.1', 4),
(205, 'admin', 3, 3, '產品管理 id:15', '2020-08-05 16:57:25', '192.168.1.1', 8),
(206, 'admin', 3, 3, '產品管理 id:15', '2020-08-05 16:58:44', '192.168.1.1', 8),
(207, 'admin', 3, 3, '產品管理 id:13', '2020-08-05 17:23:11', '192.168.1.1', 8),
(208, 'admin', 3, 3, '產品管理 id:', '2020-08-05 17:37:55', '192.168.1.1', 4),
(209, 'admin', 3, 3, '產品管理 id:16', '2020-08-05 17:58:03', '192.168.1.1', 8),
(210, 'admin', 3, 3, '產品管理 id:16', '2020-08-05 18:03:29', '192.168.1.1', 8),
(211, 'admin', 3, 3, '產品管理 id:16', '2020-08-05 18:04:12', '192.168.1.1', 8),
(212, 'admin', 3, 3, '產品管理 id:', '2020-08-05 18:33:37', '192.168.1.1', 4),
(213, 'admin', 0, 0, 'admin登入成功', '2020-08-06 12:06:37', '192.168.1.1', 1),
(214, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-08-06 12:23:31', '192.168.1.1', 4),
(215, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-08-06 12:29:03', '192.168.1.1', 4),
(216, 'admin', 3, 3, '產品管理 id:14', '2020-08-06 13:08:50', '192.168.1.1', 8),
(217, 'admin', 3, 3, '產品管理 id:14', '2020-08-06 13:10:07', '192.168.1.1', 8),
(218, 'admin', 3, 3, '產品管理 id:13', '2020-08-06 13:15:26', '192.168.1.1', 8),
(219, 'admin', 3, 3, '產品管理 id:13', '2020-08-06 13:17:48', '192.168.1.1', 8),
(220, 'admin', 3, 3, '產品管理 id:13', '2020-08-06 13:27:23', '192.168.1.1', 8),
(221, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-08-06 16:36:56', '192.168.1.1', 4),
(222, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-08-06 19:15:40', '192.168.1.1', 4),
(223, 'admin', 2, 2, '語系字典列表 id:1855', '2020-08-06 19:19:01', '192.168.1.1', 8),
(224, 'admin', 2, 2, '語系字典列表 id:1548', '2020-08-06 19:19:06', '192.168.1.1', 8),
(225, 'admin', 2, 2, '語系字典列表 id:1852', '2020-08-06 19:21:55', '192.168.1.1', 8),
(226, 'admin', 2, 2, '語系字典列表 id:1853', '2020-08-06 19:23:15', '192.168.1.1', 8),
(227, 'admin', 2, 2, '語系字典列表 id:1853', '2020-08-06 19:23:34', '192.168.1.1', 8),
(228, 'admin', 3, 2, '產品分類細項 id:23', '2020-08-06 19:31:22', '192.168.1.1', 8),
(229, 'admin', 3, 1, '產品分類大類 id:7', '2020-08-06 19:31:40', '192.168.1.1', 8),
(230, 'admin', 2, 2, '語系字典列表 id:1525', '2020-08-06 19:56:23', '192.168.1.1', 8),
(231, 'admin', 2, 2, '語系字典列表 id:1840', '2020-08-06 19:56:52', '192.168.1.1', 8),
(232, 'admin', 2, 2, '語系字典列表 id:1571', '2020-08-06 19:57:04', '192.168.1.1', 8),
(233, 'admin', 2, 2, '語系字典列表 id:1839', '2020-08-06 19:57:36', '192.168.1.1', 8),
(234, 'admin', 0, 0, 'admin登入成功', '2020-08-06 20:12:33', '192.168.1.1', 1),
(235, 'admin', 3, 3, '產品管理 id:13', '2020-08-06 21:03:41', '192.168.1.1', 8),
(236, 'admin', 0, 0, 'admin登入成功', '2020-08-07 11:23:53', '192.168.1.1', 1),
(237, 'admin', 0, 0, 'admin登入成功', '2020-08-07 11:43:13', '192.168.1.1', 1),
(238, 'admin', 3, 1, '產品分類大類 id:6', '2020-08-07 11:54:00', '192.168.1.1', 8),
(239, 'admin', 3, 3, '1筆資料(\'15\')', '2020-08-07 11:54:18', '192.168.1.1', 16),
(240, 'admin', 3, 2, '1筆資料(\'23\')', '2020-08-07 11:54:29', '192.168.1.1', 16),
(241, 'admin', 3, 1, '1筆資料(\'7\')', '2020-08-07 11:54:32', '192.168.1.1', 16),
(242, 'admin', 0, 0, 'admin登入成功', '2020-08-07 12:22:38', '192.168.1.1', 1),
(243, 'admin', 2, 2, '語系字典列表 id:1994', '2020-08-07 12:23:04', '192.168.1.1', 4),
(244, 'admin', 3, 3, '產品管理 id:11', '2020-08-07 12:30:52', '192.168.1.1', 8),
(245, 'admin', 3, 3, '產品管理 id:11', '2020-08-07 12:31:02', '192.168.1.1', 8),
(246, 'admin', 3, 3, '產品管理 id:', '2020-08-07 12:32:09', '192.168.1.1', 4),
(247, 'admin', 3, 1, '產品分類大類 id:3', '2020-08-07 12:32:47', '192.168.1.1', 8),
(248, 'admin', 3, 1, '產品分類大類 id:4', '2020-08-07 12:33:10', '192.168.1.1', 8),
(249, 'admin', 3, 1, '產品分類大類 id:5', '2020-08-07 12:33:41', '192.168.1.1', 8),
(250, 'admin', 3, 2, '產品分類細項 id:20', '2020-08-07 12:36:01', '192.168.1.1', 8),
(251, 'admin', 3, 2, '產品分類細項 id:18', '2020-08-07 12:36:13', '192.168.1.1', 8),
(252, 'admin', 3, 2, '產品分類細項 id:17', '2020-08-07 12:36:25', '192.168.1.1', 8),
(253, 'admin', 3, 2, '產品分類細項 id:16', '2020-08-07 12:36:37', '192.168.1.1', 8),
(254, 'admin', 3, 2, '產品分類細項 id:15', '2020-08-07 12:39:24', '192.168.1.1', 8),
(255, 'admin', 3, 2, '產品分類細項 id:14', '2020-08-07 12:39:35', '192.168.1.1', 8),
(256, 'admin', 3, 2, '產品分類細項 id:13', '2020-08-07 12:39:45', '192.168.1.1', 8),
(257, 'admin', 3, 2, '產品分類細項 id:12', '2020-08-07 12:39:59', '192.168.1.1', 8),
(258, 'admin', 3, 2, '產品分類細項 id:11', '2020-08-07 12:40:15', '192.168.1.1', 8),
(259, 'admin', 3, 2, '產品分類細項 id:10', '2020-08-07 12:40:35', '192.168.1.1', 8),
(260, 'admin', 3, 2, '產品分類細項 id:20', '2020-08-07 12:52:45', '192.168.1.1', 8),
(261, 'admin', 3, 2, '產品分類細項 id:18', '2020-08-07 12:52:57', '192.168.1.1', 8),
(262, 'admin', 3, 2, '產品分類細項 id:17', '2020-08-07 12:53:10', '192.168.1.1', 8),
(263, 'admin', 3, 2, '產品分類細項 id:16', '2020-08-07 12:53:20', '192.168.1.1', 8),
(264, 'admin', 3, 2, '產品分類細項 id:15', '2020-08-07 12:53:31', '192.168.1.1', 8),
(265, 'admin', 3, 2, '產品分類細項 id:14', '2020-08-07 12:53:44', '192.168.1.1', 8),
(266, 'admin', 3, 2, '產品分類細項 id:13', '2020-08-07 12:53:59', '192.168.1.1', 8),
(267, 'admin', 3, 2, '產品分類細項 id:12', '2020-08-07 12:55:28', '192.168.1.1', 8),
(268, 'admin', 3, 2, '產品分類細項 id:11', '2020-08-07 12:55:40', '192.168.1.1', 8),
(269, 'admin', 3, 2, '產品分類細項 id:10', '2020-08-07 12:56:09', '192.168.1.1', 8),
(270, 'admin', 3, 2, '產品分類細項 id:9', '2020-08-07 12:56:23', '192.168.1.1', 8),
(271, 'admin', 3, 2, '產品分類細項 id:9', '2020-08-07 12:56:42', '192.168.1.1', 8),
(272, 'admin', 3, 2, '產品分類細項 id:8', '2020-08-07 12:56:54', '192.168.1.1', 8),
(273, 'admin', 3, 3, '產品管理 id:18', '2020-08-07 13:02:51', '192.168.1.1', 8),
(274, 'admin', 3, 3, '產品管理 id:17', '2020-08-07 13:03:12', '192.168.1.1', 8),
(275, 'admin', 3, 3, '產品管理 id:16', '2020-08-07 13:03:32', '192.168.1.1', 8),
(276, 'admin', 3, 3, '產品管理 id:14', '2020-08-07 13:07:28', '192.168.1.1', 8),
(277, 'admin', 3, 3, '產品管理 id:18', '2020-08-07 13:11:00', '192.168.1.1', 8),
(278, 'admin', 3, 3, '產品管理 id:17', '2020-08-07 13:11:30', '192.168.1.1', 8),
(279, 'admin', 3, 3, '產品管理 id:16', '2020-08-07 13:11:49', '192.168.1.1', 8),
(280, 'admin', 3, 3, '產品管理 id:14', '2020-08-07 13:12:12', '192.168.1.1', 8),
(281, 'admin', 3, 3, '產品管理 id:11', '2020-08-07 13:12:32', '192.168.1.1', 8),
(282, 'admin', 3, 3, '產品管理 id:8', '2020-08-07 13:12:57', '192.168.1.1', 8),
(283, 'admin', 3, 3, '產品管理 id:7', '2020-08-07 13:13:20', '192.168.1.1', 8),
(284, 'admin', 3, 3, '產品管理 id:6', '2020-08-07 13:13:38', '192.168.1.1', 8),
(285, 'admin', 0, 0, 'admin登入成功', '2020-08-07 14:44:34', '114.47.109.55', 1),
(286, 'admin', 1, 1, 'genie', '2020-08-07 14:52:57', '114.47.109.55', 4),
(287, 'admin', 2, 2, '語系字典列表 id:1995', '2020-08-07 15:42:04', '192.168.1.1', 4),
(288, 'admin', 2, 2, '語系字典列表 id:1996', '2020-08-07 15:42:29', '192.168.1.1', 4),
(289, 'admin', 3, 1, '產品分類大類 id:', '2020-08-07 18:16:54', '192.168.1.1', 4),
(290, 'admin', 3, 2, '產品分類細項 id:', '2020-08-07 18:17:14', '192.168.1.1', 4),
(291, 'admin', 3, 3, '產品管理 id:', '2020-08-07 18:19:44', '192.168.1.1', 4),
(292, 'admin', 4, 1, ' id:21', '2020-08-07 18:24:48', '192.168.1.1', 8),
(293, 'admin', 3, 1, '產品分類大類 id:8', '2020-08-07 18:27:54', '192.168.1.1', 8),
(294, 'admin', 0, 0, 'admin登入成功', '2020-08-10 15:50:15', '192.168.1.1', 1),
(295, 'admin', 2, 2, '語系字典列表 id:1997', '2020-08-10 15:50:36', '192.168.1.1', 4),
(296, 'admin', 2, 2, '語系字典列表 id:1998', '2020-08-10 15:50:45', '192.168.1.1', 4),
(297, 'admin', 2, 2, '語系字典列表 id:1999', '2020-08-10 15:50:55', '192.168.1.1', 4),
(298, 'admin', 4, 1, ' id:20', '2020-08-10 16:01:58', '192.168.1.1', 8),
(299, 'admin', 0, 0, 'admin登入成功', '2020-08-10 18:58:38', '192.168.1.1', 1),
(300, 'admin', 4, 1, ' id:19', '2020-08-10 18:58:58', '192.168.1.1', 8);

-- --------------------------------------------------------

--
-- 資料表結構 `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_type` tinyint(4) NOT NULL COMMENT '1=OEM・ODM生產專用 2=既有產品專用',
  `product_id` int(11) NOT NULL COMMENT 'fk product id contact_type = 2 才有',
  `contact_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_content` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_reply` int(11) NOT NULL COMMENT '0 未處理 1已回覆',
  `contact_notice` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_createtime` datetime NOT NULL,
  `contact_updatetime` datetime NOT NULL,
  `contact_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_type`, `product_id`, `contact_name`, `contact_company`, `contact_address`, `contact_phone`, `contact_email`, `contact_content`, `contact_reply`, `contact_notice`, `contact_createtime`, `contact_updatetime`, `contact_admin`) VALUES
(11, 1, 0, 'odm', 'odm', 'odm', 'odm', 'odm@test', 'odm', 0, '', '2020-07-29 11:51:51', '2020-07-29 11:51:51', ''),
(12, 1, 0, 'kuan hsiung wang', '頭好壯壯', '青島路', '0963595978', 'alan@coder.com.tw', '青島路', 1, 'ˋㄉˇ', '2020-07-31 12:43:54', '2020-07-31 12:54:48', 'admin'),
(13, 2, 9, 'kuan hsiung wang', '頭好壯壯', '青島路', '0963595978', 'alan@coder.com.tw', '青島路', 0, '', '2020-07-31 12:55:34', '2020-07-31 12:55:34', ''),
(14, 2, 15, '王海欣', '誠智數位有限公司', '永隆路125號3樓', '0929455906', 'cully@coder.com.tw', '測試測試', 0, '', '2020-08-06 15:49:33', '2020-08-06 15:49:33', ''),
(15, 1, 0, 'aaaaa', 'bbbbb', '永隆路125號3樓', 'sf dsf dsa dsfsdfsf sf', 'khai@coder.com.tw', 'dsf dsf af adsf adsfa dsf sf', 0, '', '2020-08-06 15:53:50', '2020-08-06 15:53:50', ''),
(16, 1, 0, '聯絡我們', '聯絡我們', '聯絡我們', '聯絡我們', 'test@test', 'test@test', 0, '', '2020-08-06 20:12:21', '2020-08-06 20:12:21', ''),
(17, 2, 15, '產品a', '產品a', '產品a', '123', 'test@test', 'test@test', 0, '', '2020-08-06 20:13:06', '2020-08-06 20:13:06', ''),
(18, 2, 6, '商品連結', '商品連結', '商品連結', '商品連結', 'test@test', 'test', 0, '', '2020-08-06 20:20:25', '2020-08-06 20:20:25', ''),
(19, 2, 6, 'mark', '', 'mark', '', 'mark@test', 'mark', 1, 'OK', '2020-08-07 12:40:42', '2020-08-10 18:58:58', 'admin'),
(20, 2, 6, 'test', '', 'test', '', 'aaa@test', 'test', 1, 'test', '2020-08-07 15:43:53', '2020-08-10 16:01:58', 'admin'),
(21, 1, 0, 'mark', 'coder', 'coder address', '0988888888', 'mark@coder.com.tw', 'marmark', 1, 'test', '2020-08-07 18:24:31', '2020-08-07 18:24:48', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `lang_data`
--

CREATE TABLE `lang_data` (
  `ld_id` int(11) NOT NULL,
  `ld_lang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ld_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ld_remark` text COLLATE utf8_unicode_ci NOT NULL,
  `ld_ispublic` int(11) NOT NULL,
  `ld_ind` int(11) NOT NULL,
  `ld_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ld_updatetime` datetime NOT NULL,
  `ld_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 傾印資料表的資料 `lang_data`
--

INSERT INTO `lang_data` (`ld_id`, `ld_lang`, `ld_name`, `ld_remark`, `ld_ispublic`, `ld_ind`, `ld_admin`, `ld_updatetime`, `ld_createtime`) VALUES
(36, 'zh-cht', '繁體中文', '繁體中文', 1, 2, 'jessica', '2018-04-25 18:40:12', '2018-04-02 10:28:22'),
(39, 'jp', '日文', '日文', 1, 3, 'admin', '2020-07-07 20:47:08', '2020-07-07 20:47:08'),
(40, 'en', '英文', '英文', 1, 4, 'admin', '2020-07-07 20:47:08', '2020-07-07 20:47:08');

-- --------------------------------------------------------

--
-- 資料表結構 `lang_dictionary`
--

CREATE TABLE `lang_dictionary` (
  `ldic_id` int(11) NOT NULL,
  `ldic_ld_lang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ldic_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ldic_english` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ldic_val` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ldic_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ldic_updatetime` datetime NOT NULL,
  `ldic_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 傾印資料表的資料 `lang_dictionary`
--

INSERT INTO `lang_dictionary` (`ldic_id`, `ldic_ld_lang`, `ldic_key`, `ldic_english`, `ldic_val`, `ldic_admin`, `ldic_updatetime`, `ldic_createtime`) VALUES
(1, 'zh-cht', 'lang', 'language system', '語系', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(2, 'zh-cht', 'alertdiv', 'Signing in... please wait', '<strong>登入中...</strong>請稍候', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(3, 'zh-cht', 'actype', 'Please choose your identity', '請選擇身份', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(4, 'zh-cht', 'username', 'Please enter your account here', '請在此輸入您的帳號', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(5, 'zh-cht', 'password', 'Please enter your password here', '請在此輸入您的密碼', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(6, 'zh-cht', 'code', 'Right figure', '右圖數字', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(7, 'zh-cht', 'codeimg1', 'Can\'t see clearly?', '看不清楚嗎?', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(8, 'zh-cht', 'codeimg2', 'I can get a new set of verification pictures again.', '點我就可以重新取得一組新的驗證圖片!', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(9, 'zh-cht', 'remember', 'remember me', '記住我', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(10, 'zh-cht', 'formbtn', 'Sign in', '登入', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(11, 'zh-cht', 'forgot', 'Verification...', '驗證中...', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(12, 'zh-cht', 'forgot2', 'Please wait', '請稍候', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(13, 'zh-cht', 'forgot3', 'Please enter your email here', '請在此輸入您的Email', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(14, 'zh-cht', 'forgot4', 'Send verification letter', '寄出驗證信', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(15, 'zh-cht', 'forgot5', '← Back to login page', '← 回登入頁', '', '2018-03-31 00:00:00', '2018-03-31 00:00:00'),
(32, 'zh-cht', 'manage_title', 'Back office management system', '後台管理系統-Neptunus', '', '2018-04-02 00:00:00', '2018-04-02 00:00:00'),
(33, 'zh-cht', 'forgetpwd', 'forget password', '忘記密碼', '', '2018-04-02 00:00:00', '2018-04-02 00:00:00'),
(36, 'zh-cht', 'backpwd', 'Get back your password', '取得密碼', 'admin', '2018-04-02 18:19:24', '2018-04-02 00:00:00'),
(37, 'zh-cht', 'edit', 'edit', '編輯', 'admin', '2018-04-02 18:38:33', '2018-04-02 18:38:33'),
(39, 'zh-cht', 'add', 'add', '新增', 'admin', '2018-04-02 18:40:09', '2018-04-02 18:40:09'),
(41, 'zh-cht', 'delmsg1', 'Unknown error, please contact system administrator', '未知錯誤,請聯絡系統管理員', 'admin', '2018-04-02 18:46:58', '2018-04-02 18:46:58'),
(43, 'zh-cht', 'delmsg2', 'Information', '筆資料', 'admin', '2018-04-02 18:51:53', '2018-04-02 18:49:29'),
(46, 'zh-cht', 'delmsg3', 'Check deleted data', '查無刪除資料', 'admin', '2018-04-02 18:52:59', '2018-04-02 18:52:33'),
(47, 'zh-cht', 'delmsg4', 'Did not select delete data', '未選取刪除資料', 'admin', '2018-04-02 18:53:51', '2018-04-02 18:53:51'),
(49, 'zh-cht', 'configmsg1', 'You can view all data here, or add, modify, delete, etc.', '您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。', 'admin', '2018-04-02 19:01:58', '2018-04-02 19:01:58'),
(51, 'zh-cht', 'configmsg2', 'management', '管理', 'admin', '2018-04-02 19:04:06', '2018-04-02 19:04:06'),
(53, 'zh-cht', 'manage4', 'System Information', '系統資訊', 'admin', '2018-04-03 10:55:47', '2018-04-03 10:49:14'),
(55, 'zh-cht', 'manage1', 'Manager', '管理員', 'admin', '2018-04-03 12:04:22', '2018-04-03 10:57:09'),
(58, 'zh-cht', 'manage2', 'Establishing time', '建立時間', 'admin', '2018-04-03 10:58:31', '2018-04-03 10:58:31'),
(59, 'zh-cht', 'manage3', 'Last modified', '上次修改時間', 'admin', '2018-04-03 10:59:00', '2018-04-03 10:59:00'),
(61, 'zh-cht', 'manage5', 'complete', '完成', 'admin', '2018-04-03 11:08:43', '2018-04-03 11:08:43'),
(62, 'zh-cht', 'manage6', 'click Cancel', '確定要取消', 'admin', '2018-04-03 11:09:28', '2018-04-03 11:09:28'),
(63, 'zh-cht', 'manage7', 'cancel', '取消', 'admin', '2018-04-03 11:10:22', '2018-04-03 11:10:22'),
(68, 'zh-cht', 'langdatajs1', 'This country code has already been used. Please re-enter!', '此語系代碼已被使用,請重新輸入!', 'admin', '2018-04-09 11:43:32', '2018-04-03 11:18:55'),
(69, 'zh-cht', 'langdictionaryjs1', 'This country code Key has been used, please re-enter!', '此語系代碼Key已被使用，請重新輸入!', 'admin', '2018-04-09 11:43:27', '2018-04-03 11:21:11'),
(71, 'zh-cht', 'index1', 'Last update time', '最後更新時間', 'admin', '2018-04-03 12:01:58', '2018-04-03 12:01:58'),
(73, 'zh-cht', 'index2', 'Enable', '啟用', 'admin', '2018-04-03 12:06:11', '2018-04-03 12:06:11'),
(75, 'zh-cht', 'filter1', 'Last modified date', '最後修改日期', 'admin', '2018-04-03 12:17:00', '2018-04-03 12:17:00'),
(76, 'zh-cht', 'filter2', 'Date of establishment', '建立日期', 'admin', '2018-04-03 12:17:32', '2018-04-03 12:17:32'),
(77, 'zh-cht', 'filter3', 'Keywords', '關鍵字', 'admin', '2018-04-03 12:17:52', '2018-04-03 12:17:52'),
(81, 'zh-cht', 'coderadmin1', 'system', '系統', 'admin', '2018-04-03 15:45:25', '2018-04-03 15:45:25'),
(83, 'zh-cht', 'coderadmin1_1', 'Member management', '成員管理', 'admin', '2018-04-03 15:46:47', '2018-04-03 15:46:47'),
(85, 'zh-cht', 'coderadmin1_2', 'authority management', '權限管理', 'admin', '2018-04-03 15:47:51', '2018-04-03 15:47:51'),
(87, 'zh-cht', 'coderadmin1_3', 'History record', '歷程記錄', 'admin', '2018-04-03 15:51:35', '2018-04-03 15:51:35'),
(89, 'zh-cht', 'coderadmin2', 'Language family', '語系', 'admin', '2018-04-03 15:52:43', '2018-04-03 15:52:43'),
(91, 'zh-cht', 'coderadmin2_1', 'Language List', '語系列表', 'admin', '2018-04-03 15:54:00', '2018-04-03 15:54:00'),
(92, 'zh-cht', 'coderadmin2_2', 'Language dictionary list', '語系字典列表', 'admin', '2018-04-03 15:54:23', '2018-04-03 15:54:23'),
(95, 'zh-cht', 'coderadmin_home', 'Home', '首頁', 'admin', '2018-04-03 16:07:49', '2018-04-03 16:07:49'),
(97, 'zh-cht', 'langdata1', 'country code', '語系代碼', 'admin', '2018-04-09 11:43:23', '2018-04-03 16:12:36'),
(98, 'zh-cht', 'langdata2', 'name', '名稱', 'admin', '2018-04-03 16:12:53', '2018-04-03 16:12:53'),
(99, 'zh-cht', 'langdata3', 'Language dictionary number', '語系字典數量', 'admin', '2018-04-03 16:13:07', '2018-04-03 16:13:07'),
(103, 'zh-cht', 'langdata4', 'Remark', '備註', 'admin', '2018-04-03 16:18:07', '2018-04-03 16:18:07'),
(105, 'zh-cht', 'langdata4_1', 'Please enter a note', '請輸入備註', 'admin', '2018-04-03 16:22:28', '2018-04-03 16:22:28'),
(106, 'zh-cht', 'langdata1_1', 'Please enter country code', '請輸入語系代碼', 'admin', '2018-04-09 11:43:19', '2018-04-03 16:22:49'),
(107, 'zh-cht', 'langdata2_1', 'Please enter a name', '請輸入名稱', 'admin', '2018-04-03 16:23:14', '2018-04-03 16:23:14'),
(111, 'zh-cht', 'langdictionary1', 'English description', '英文描述', 'admin', '2018-04-03 16:37:59', '2018-04-03 16:37:59'),
(112, 'zh-cht', 'langdictionary2', 'key', 'key', 'admin', '2018-04-03 16:38:12', '2018-04-03 16:38:12'),
(113, 'zh-cht', 'langdictionary3', 'translation', '翻譯', 'admin', '2018-04-03 16:38:34', '2018-04-03 16:38:34'),
(117, 'zh-cht', 'langdictionary1_1', 'Please enter the English description', '請輸入英文描述', 'admin', '2018-04-03 16:44:11', '2018-04-03 16:44:11'),
(118, 'zh-cht', 'langdictionary2_1', 'Please enter the key', '請輸入key', 'admin', '2018-04-03 16:44:33', '2018-04-03 16:44:33'),
(119, 'zh-cht', 'langdictionary3_1', 'Please enter a translation', '請輸入翻譯', 'admin', '2018-04-03 16:44:52', '2018-04-03 16:44:52'),
(123, 'zh-cht', 'coderlisthelp1', 'Sorting', '排序', 'admin', '2018-04-03 16:53:19', '2018-04-03 16:52:54'),
(124, 'zh-cht', 'coderlisthelp2', 'operating', '操作', 'admin', '2018-04-03 16:53:35', '2018-04-03 16:53:35'),
(127, 'zh-cht', 'view', 'view', '瀏覽', 'admin', '2018-04-03 17:54:43', '2018-04-03 17:54:43'),
(130, 'zh-cht', 'del', 'delete', '刪除', 'admin', '2018-04-03 17:55:55', '2018-04-03 17:55:55'),
(131, 'zh-cht', 'copy', 'copy', '複製', 'admin', '2018-04-03 17:56:10', '2018-04-03 17:56:10'),
(134, 'zh-cht', 'import', 'import', '匯入', 'admin', '2018-04-03 17:56:52', '2018-04-03 17:56:52'),
(135, 'zh-cht', 'export', 'export', '匯出', 'admin', '2018-04-03 17:57:00', '2018-04-03 17:57:00'),
(138, 'zh-cht', 'send', 'send', '寄出', 'admin', '2018-04-03 17:57:46', '2018-04-03 17:57:46'),
(139, 'zh-cht', 'coderadminall', 'select all', '全選', 'admin', '2018-04-10 15:09:25', '2018-04-03 18:03:07'),
(140, 'zh-cht', 'coderadminone', 'project', '項目', 'admin', '2018-04-10 15:09:31', '2018-04-03 18:03:19'),
(143, 'zh-cht', 'coderfilterhelp1', 'Search criteria', '搜尋條件', 'admin', '2018-04-03 18:06:14', '2018-04-03 18:06:14'),
(145, 'zh-cht', 'coderfilterhelp2', 'please choose', '請選擇', 'admin', '2018-04-03 18:09:40', '2018-04-03 18:09:40'),
(148, 'zh-cht', 'coderfilterhelp3', 'Any', '不限', 'admin', '2018-04-03 18:10:34', '2018-04-03 18:10:34'),
(149, 'zh-cht', 'configmsg3', 'Super administrator', '超級管理員', 'admin', '2018-04-03 18:13:38', '2018-04-03 18:13:38'),
(151, 'zh-cht', 'help1', 'Super administrator has the highest privilege and can use all features', '超級管理員具有最高權限,可以使用所有功能', 'admin', '2018-04-03 18:20:50', '2018-04-03 18:20:50'),
(153, 'zh-cht', 'authrules1', 'Narrative', '敘述', 'admin', '2018-04-03 18:22:46', '2018-04-03 18:22:46'),
(155, 'zh-cht', 'authrules1_1', 'Please enter a description', '請輸入敘述', 'admin', '2018-04-03 18:23:27', '2018-04-03 18:23:27'),
(157, 'zh-cht', 'authrules2', 'Permission setting', '權限設定', 'admin', '2018-04-03 18:26:04', '2018-04-03 18:26:04'),
(159, 'zh-cht', 'authrules3', 'Number of members', '成員數量', 'admin', '2018-04-03 18:35:57', '2018-04-03 18:35:57'),
(161, 'zh-cht', 'adminlog1', 'Operation history record', '操作歷程記錄', 'admin', '2018-04-03 18:44:14', '2018-04-03 18:44:14'),
(163, 'zh-cht', 'adminlog2', 'The background user operates the record list. This area cannot add/modify/delete actions.', '後台使用者操作記錄列表,此區不能進行新增/修改/刪除的動作。', 'admin', '2018-04-03 18:45:09', '2018-04-03 18:45:09'),
(165, 'zh-cht', 'adminlog3', 'Operation record browsing', '操作記錄瀏覽', 'admin', '2018-04-03 18:45:58', '2018-04-03 18:45:58'),
(167, 'zh-cht', 'adminlog4', 'Login account', '登入帳號', 'admin', '2018-04-03 18:46:38', '2018-04-03 18:46:38'),
(169, 'zh-cht', 'adminlog5', 'Operation date', '操作日期', 'admin', '2018-04-03 18:47:30', '2018-04-03 18:47:30'),
(171, 'zh-cht', 'account', 'account', '帳號', 'admin', '2018-04-03 18:52:42', '2018-04-03 18:52:42'),
(173, 'zh-cht', 'adminlog6', 'Module', '模組', 'admin', '2018-04-03 18:53:11', '2018-04-03 18:53:11'),
(175, 'zh-cht', 'adminlog7', 'Information', '資訊', 'admin', '2018-04-03 18:53:57', '2018-04-03 18:53:57'),
(177, 'zh-cht', 'oops1', 'Back to login page', '回到登入頁', 'admin', '2018-04-09 10:50:02', '2018-04-09 10:50:02'),
(179, 'zh-cht', 'oops2', '← Back to previous page', '← 回到前一頁', 'admin', '2018-04-09 10:51:15', '2018-04-09 10:51:15'),
(181, 'zh-cht', 'loginpage1', 'Login overtime', '登入逾時', 'admin', '2018-04-09 11:20:19', '2018-04-09 11:20:19'),
(182, 'zh-cht', 'loginpage2', 'You have not logged in or exceeded your login period &lt;br&gt;&lt;br&gt; To ensure security, please click the link below to log in again.', '您尚未登入或超過登入期限&lt;br&gt;為了確保安全性&lt;br&gt;請按下方連結重新登入。', 'admin', '2018-04-09 11:21:17', '2018-04-09 11:21:17'),
(185, 'zh-cht', 'home1', 'Home information', '首頁資訊', 'LMF', '2018-05-08 17:14:08', '2018-04-09 12:36:10'),
(187, 'zh-cht', 'home2', 'Welcome to use this system', '歡迎使用本系統', 'admin', '2018-04-09 12:36:58', '2018-04-09 12:36:58'),
(190, 'zh-cht', 'home3', 'Your login time is', '您本次登入時間為', 'admin', '2018-04-09 12:38:25', '2018-04-09 12:38:25'),
(191, 'zh-cht', 'navbar1', 'Login time', '登入時間', 'admin', '2018-04-09 15:19:55', '2018-04-09 15:19:55'),
(193, 'zh-cht', 'navbar2', 'modify personal information', '修改個人資料', 'admin', '2018-04-09 15:21:12', '2018-04-09 15:21:12'),
(195, 'zh-cht', 'navbar3', 'Sign out', '登出', 'admin', '2018-04-09 15:22:01', '2018-04-09 15:22:01'),
(209, 'zh-cht', 'admin11', 'Repeat, please re-enter a group of accounts', '重覆,請重新輸入一組帳號', 'admin', '2018-04-11 13:04:26', '2018-04-11 13:04:26'),
(211, 'zh-cht', 'manage8', 'Last login IP', '最後登入IP', 'admin', '2018-04-11 15:22:02', '2018-04-11 15:22:02'),
(213, 'zh-cht', 'adminjs1', 'This account has been used. Please re-enter!', '此帳號己被使用,請重新輸入!', 'admin', '2018-04-11 15:51:47', '2018-04-11 15:51:47'),
(216, 'zh-cht', 'adminjs2', 'Please upload pictures!', '請上傳圖片!', 'admin', '2018-04-11 15:54:41', '2018-04-11 15:54:41'),
(218, 'zh-cht', 'admin12', 'Please enter the administrator account', '請輸入管理員帳號', 'admin', '2018-04-12 16:06:02', '2018-04-12 16:06:02'),
(219, 'zh-cht', 'adminhelp1', 'This account number is the login account of the system and cannot be duplicated.', '此帳密為登入系統之帳號,不能重覆。', 'admin', '2018-04-12 16:06:54', '2018-04-12 16:06:54'),
(221, 'zh-cht', 'admin13', 'password', '密碼', 'admin', '2018-04-12 16:07:28', '2018-04-12 16:07:28'),
(224, 'zh-cht', 'admin13_1', 'Please enter the administrator password', '請輸入管理員密碼', 'admin', '2018-04-12 16:08:07', '2018-04-12 16:08:07'),
(226, 'zh-cht', 'adminhelp2', 'Login system password.', '登入系統之密碼。', 'admin', '2018-04-12 16:09:03', '2018-04-12 16:09:03'),
(227, 'zh-cht', 'admin14', 'Password Confirmation', '密碼確認', 'admin', '2018-04-12 16:09:39', '2018-04-12 16:09:39'),
(230, 'zh-cht', 'admin14_1', 'Please re-enter the administrator password', '請重新輸入管理員密碼', 'admin', '2018-04-12 16:10:34', '2018-04-12 16:10:34'),
(232, 'zh-cht', 'adminhelp3', 'In order to confirm the correct password, you have to enter it again.', '為了確認密碼是否確,麻煩您再輸入一次。', 'admin', '2018-04-12 16:11:11', '2018-04-12 16:11:11'),
(234, 'zh-cht', 'admin15', 'first name', '名字', 'admin', '2018-04-12 16:11:56', '2018-04-12 16:11:56'),
(236, 'zh-cht', 'admin15_1', 'Please enter the name', '請輸入名字', 'admin', '2018-04-12 16:12:38', '2018-04-12 16:12:38'),
(238, 'zh-cht', 'admin16', 'Email', 'Email', 'admin', '2018-04-12 16:12:54', '2018-04-12 16:12:54'),
(240, 'zh-cht', 'admin16_1', 'Please enter email', '請輸入Email', 'admin', '2018-04-12 16:13:45', '2018-04-12 16:13:45'),
(242, 'zh-cht', 'admin17', 'Backup Email', '備用Email', 'admin', '2018-04-12 16:14:24', '2018-04-12 16:14:24'),
(244, 'zh-cht', 'admin17_1', 'Please enter Email', '請輸入Email', 'admin', '2018-04-12 16:15:12', '2018-04-12 16:15:12'),
(246, 'zh-cht', 'admin18', 'Authority', '權限', 'admin', '2018-04-12 16:22:59', '2018-04-12 16:22:59'),
(248, 'zh-cht', 'admin19', 'image', '圖片', 'admin', '2018-04-12 16:23:45', '2018-04-12 16:23:45'),
(250, 'zh-cht', 'admin20', 'personal information', '個人資料', 'admin', '2018-04-12 16:24:59', '2018-04-12 16:24:59'),
(252, 'zh-cht', 'admin20_1', 'Please enter personal information', '請輸入個人資料', 'admin', '2018-04-12 16:25:37', '2018-04-12 16:25:37'),
(254, 'zh-cht', 'admin21', 'Excel file', 'Excel檔案', 'admin', '2018-04-12 16:26:33', '2018-04-12 16:26:33'),
(256, 'zh-cht', 'admin22', 'Administrator account', '管理員帳號', 'admin', '2018-04-12 17:35:12', '2018-04-12 17:35:12'),
(272, 'zh-cht', 'langdata5', 'Country', '國別', 'admin', '2018-04-19 18:03:03', '2018-04-19 18:03:03'),
(274, 'zh-cht', 'langdata5_1', 'Please enter the country', '請輸入國別', 'admin', '2018-04-19 18:03:28', '2018-04-19 18:03:28'),
(276, 'zh-cht', 'langdata6', 'Abbreviation', '簡稱', 'admin', '2018-04-19 18:12:11', '2018-04-19 18:12:11'),
(278, 'zh-cht', 'langdata6_1', 'Please enter abbreviation', '請輸入簡稱', 'admin', '2018-04-19 18:12:46', '2018-04-19 18:12:46'),
(280, 'zh-cht', 'langdata7', 'area', '地區', 'admin', '2018-04-19 18:13:18', '2018-04-19 18:13:18'),
(281, 'zh-cht', 'langdata7_1', 'Please enter the region', '請輸入地區', 'admin', '2018-04-19 18:13:54', '2018-04-19 18:13:54'),
(284, 'zh-cht', 'langdata8', 'address', '地址', 'admin', '2018-04-19 18:14:32', '2018-04-19 18:14:32'),
(286, 'zh-cht', 'langdata8_1', 'Please enter the address', '請輸入地址', 'admin', '2018-04-19 18:14:58', '2018-04-19 18:14:58'),
(288, 'zh-cht', 'langdata9', 'phone', '電話', 'admin', '2018-04-19 18:15:23', '2018-04-19 18:15:23'),
(290, 'zh-cht', 'langdata9_1', 'Please enter the phone', '請輸入電話', 'admin', '2018-04-19 18:15:56', '2018-04-19 18:15:56'),
(292, 'zh-cht', 'langdata10', 'website', '網站', 'admin', '2018-04-19 18:16:20', '2018-04-19 18:16:20'),
(294, 'zh-cht', 'langdata10_1', 'Please enter the website', '請輸入網站', 'admin', '2018-04-19 18:16:45', '2018-04-19 18:16:45'),
(316, 'zh-cht', 'copytext', 'One copy is a copy', '※一列為拷貝一筆', 'admin', '2018-04-20 12:53:33', '2018-04-20 12:53:18'),
(390, 'zh-cht', 'code2', 'code', '碼', 'admin', '2018-04-23 14:20:37', '2018-04-23 14:20:37'),
(456, 'zh-cht', 'domsg1', 'please enter', '請輸入', 'admin', '2018-04-24 16:31:51', '2018-04-24 16:31:51'),
(476, 'zh-cht', 'Excel1', 'Not required', '(非必填)', 'admin', '2018-04-30 11:16:37', '2018-04-30 11:16:06'),
(478, 'zh-cht', 'Excel2', 'Excel import', 'Excel匯入', 'admin', '2018-04-30 11:31:18', '2018-04-30 11:31:18'),
(480, 'zh-cht', 'Excel3', 'OK to send', '確定送出', 'admin', '2018-04-30 11:31:48', '2018-04-30 11:31:48'),
(482, 'zh-cht', 'Excel4', 'Download the import sample file', '下載匯入範例檔', 'admin', '2018-04-30 11:32:26', '2018-04-30 11:32:26'),
(484, 'zh-cht', 'Excel5', 'Preview Excel content (Please confirm below that the imported data content is correct)', '預覽Excel內容(請在下方確認匯入的資料內容是否正確)', 'admin', '2018-04-30 11:33:31', '2018-04-30 11:33:31'),
(486, 'zh-cht', 'Excel6', 'Please upload file first', '請先上傳檔案', 'admin', '2018-04-30 11:34:02', '2018-04-30 11:34:02'),
(488, 'zh-cht', 'Excel7', 'Unsuccessful import', '未匯入成功', 'admin', '2018-04-30 11:34:30', '2018-04-30 11:34:30'),
(490, 'zh-cht', 'Excel8', 'Import completed', '匯入完成', 'admin', '2018-04-30 11:35:25', '2018-04-30 11:35:25'),
(492, 'zh-cht', 'Excel9', 'You have successfully imported', '您己成功匯入了', 'admin', '2018-04-30 11:36:00', '2018-04-30 11:36:00'),
(494, 'zh-cht', 'Excel10', 'Archives', '的檔案', 'admin', '2018-04-30 11:36:29', '2018-04-30 11:36:29'),
(496, 'zh-cht', 'Excel11', 'Failed to import', '匯入失敗', 'admin', '2018-04-30 11:36:58', '2018-04-30 11:36:58'),
(498, 'zh-cht', 'Excel12', 'modify', '修改', 'admin', '2018-04-30 11:37:24', '2018-04-30 11:37:24'),
(500, 'zh-cht', 'Excel14', 'Website page management', '網站頁面管理', 'admin', '2018-04-30 11:37:50', '2018-04-30 11:37:50'),
(502, 'zh-cht', 'Excel15', 'An error occurred in the system. Please contact your system administrator', '系統發生錯誤,請聯絡系統管理員', 'admin', '2018-04-30 11:38:23', '2018-04-30 11:38:23'),
(504, 'zh-cht', 'Excel16', 'New failed', '新增失敗', 'admin', '2018-04-30 11:52:45', '2018-04-30 11:52:45'),
(506, 'zh-cht', 'Excel17', 'The first', '第', 'admin', '2018-04-30 12:00:00', '2018-04-30 12:00:00'),
(508, 'zh-cht', 'Excel18', 'Columns', '列', 'admin', '2018-04-30 12:00:35', '2018-04-30 12:00:35'),
(510, 'zh-cht', 'Excel19', 'column', '欄', 'admin', '2018-04-30 12:01:05', '2018-04-30 12:01:05'),
(521, 'zh-cht', 'default', 'default', '預設', 'admin', '2018-05-07 18:03:21', '2018-05-07 18:03:21'),
(1058, 'zh-cht', 'copynum', 'Copy quantity', '拷貝數量', 'admin', '2018-05-15 17:58:52', '2018-05-15 17:58:52'),
(1060, 'zh-cht', 'copynum_1', 'Please enter the number of copies', '請輸入拷貝數量', 'admin', '2018-05-15 17:58:52', '2018-05-15 17:58:52'),
(1167, 'zh-cht', 'jquery1', 'Please enter the content.', '請輸入內容.', 'admin', '2018-06-01 18:12:06', '2018-06-01 18:12:06'),
(1169, 'zh-cht', 'jquery2', 'Please enter email format.', '請輸入Email格式.', 'admin', '2018-06-01 18:12:06', '2018-06-01 18:12:06'),
(1171, 'zh-cht', 'jquery3', 'Please enter Url format.', '請輸入Url格式.', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1173, 'zh-cht', 'jquery4', 'Please enter the date format yyyy-mm-dd.', '請輸入日期格式yyyy-mm-dd.', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1175, 'zh-cht', 'jquery5', 'Please enter the number.', '請輸入數字.', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1177, 'zh-cht', 'configmsg4', 'You can click here to view', '您可以按這裡檢視', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1179, 'zh-cht', 'configmsg5', 'data', '資料', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1181, 'zh-cht', 'jquery6', 'Click on my upload file', '點我上傳檔案', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1183, 'zh-cht', 'jquery7', 'Click me to remove the file', '點我移除檔案', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1185, 'zh-cht', 'jquery8', 'Upload job completed', '上傳作業完成', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1187, 'zh-cht', 'jquery9', 'You have successfully uploaded the file.', '您己成功上傳檔案。', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1189, 'zh-cht', 'jquery10', 'Click me to browse the file', '點我瀏覽檔案', 'admin', '2018-06-01 18:12:07', '2018-06-01 18:12:07'),
(1270, 'zh-cht', 'admin8_1', 'Please enter a company', '請輸入公司別', 'admin', '2018-10-26 12:24:17', '2018-10-26 12:24:17'),
(1342, 'zh-cht', 'error1', 'Check no data', '查無資料', 'admin', '2018-10-26 12:24:17', '2018-10-26 12:24:17'),
(1350, 'zh-cht', 'coderadmin3', 'Products', '產品管理', 'admin', '2020-07-09 20:00:12', '2020-07-09 20:00:12'),
(1351, 'zh-cht', 'coderadmin3_class1', 'Product Classification L1', '產品分類大類', 'admin', '2020-07-09 20:05:03', '2020-07-09 20:01:13'),
(1352, 'zh-cht', 'coderadmin3_class2', 'Product Classification L2', '產品分類細項', 'admin', '2020-07-09 20:02:24', '2020-07-09 20:02:24'),
(1353, 'zh-cht', 'coderadmin3_list', 'Product List', '產品列表', 'admin', '2020-07-09 20:02:46', '2020-07-09 20:02:46'),
(1355, 'zh-cht', 'coderadmin3_class2', 'Product Classification L2', 'Product Sub Class', 'admin', '2020-07-09 20:02:24', '2020-07-09 20:02:24'),
(1358, 'jp', 'coderadmin3_list', 'Product List', '商品リスト', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1359, 'jp', 'coderadmin3_class2', 'Product Classification L2', 'サブ-カテゴリ一覧', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1360, 'jp', 'coderadmin3_class1', 'Product Classification L1', 'カテゴリ一覧', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1361, 'jp', 'coderadmin3', 'Products', '商品リスト', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1362, 'zh-cht', 'coderadmin3_class', 'Product Classification ', '產品分類', 'admin', '2020-07-09 20:05:03', '2020-07-09 20:01:13'),
(1364, 'jp', 'coderadmin3_class', 'Product Classification', '既製品専用', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1365, 'jp', 'coderadmin1_3', 'History record', '歷程記錄', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1366, 'jp', 'coderadmin1_2', 'authority management', '權限管理', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1367, 'jp', 'coderadmin1_1', 'Member management', '成員管理', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1368, 'jp', 'coderadmin1', 'system', '系統', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1369, 'jp', 'coderadmin2_2', 'Language dictionary list', '語系字典列表', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1370, 'jp', 'coderadmin2_1', 'Language List', '語系列表', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1371, 'jp', 'coderadmin2', 'Language family', '語系', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1372, 'jp', 'coderadmin_home', 'Home', '首頁', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1373, 'jp', 'coderadminall', 'select all', '全選', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1374, 'jp', 'coderadminone', 'project', '項目', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1375, 'zh-cht', 'coderadmin4', 'contact us', '聯絡我們', 'admin', '2020-07-09 21:16:35', '2020-07-09 21:16:35'),
(1376, 'zh-cht', 'coderadmin4_oemodm', 'OEM・ODM', 'OEM・ODM生產專用', 'admin', '2020-07-09 21:17:21', '2020-07-09 21:17:21'),
(1377, 'zh-cht', 'coderadmin4_product', 'contact us by product', '既有產品専用', 'admin', '2020-07-09 21:17:53', '2020-07-09 21:17:53'),
(1378, 'jp', 'coderadmin4_product', 'contact us by product', '既製品専用', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1379, 'jp', 'coderadmin4_oemodm', 'OEM・ODM', 'OEM・ODM生産専用', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1380, 'jp', 'coderadmin4', 'contact us', 'お問合わせ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1381, 'jp', 'Excel12', 'modify', '修改', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1382, 'jp', 'navbar2', 'modify personal information', '修改個人資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1383, 'jp', 'adminlog2', 'The background user operates the record list. This area cannot add/modify/delete actions.', '後台使用者操作記錄列表,此區不能進行新增/修改/刪除的動作。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1384, 'jp', 'filter1', 'Last modified date', '最後修改日期', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1385, 'jp', 'manage3', 'Last modified', '上次修改時間', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1386, 'jp', 'configmsg1', 'You can view all data here, or add, modify, delete, etc.', '您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1387, 'jp', 'navbar3', 'Sign out', '登出', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1388, 'jp', 'navbar1', 'Login time', '登入時間', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1389, 'jp', 'coderfilterhelp3', 'Any', '不限', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1390, 'jp', 'coderfilterhelp2', 'please choose', '請選擇', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1391, 'jp', 'coderfilterhelp1', 'Search criteria', '搜尋條件', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1392, 'jp', 'filter3', 'Keywords', '關鍵字', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1393, 'jp', 'filter2', 'Date of establishment', '建立日期', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1394, 'jp', 'coderlisthelp2', 'operating', '操作', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1395, 'jp', 'coderlisthelp1', 'Sorting', '排序', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1396, 'jp', 'langdata1_1', 'Please enter country code', '請輸入語系代碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1397, 'jp', 'langdata1', 'country code', '語系代碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1398, 'jp', 'langdictionaryjs1', 'This country code Key has been used, please re-enter!', '此語系代碼Key已被使用，請重新輸入!', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1399, 'jp', 'langdatajs1', 'This country code has already been used. Please re-enter!', '此語系代碼已被使用,請重新輸入!', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1400, 'jp', 'langdata10_1', 'Please enter the website', '請輸入網站', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1401, 'jp', 'langdata10', 'website', '網站', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1402, 'jp', 'langdata9_1', 'Please enter the phone', '請輸入電話', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1403, 'jp', 'langdata9', 'phone', '電話', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1404, 'jp', 'langdata8_1', 'Please enter the address', '請輸入地址', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1405, 'jp', 'langdata8', 'address', '地址', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1406, 'jp', 'langdata7_1', 'Please enter the region', '請輸入地區', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1407, 'jp', 'langdata7', 'area', '地區', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1408, 'jp', 'langdata6_1', 'Please enter abbreviation', '請輸入簡稱', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1409, 'jp', 'langdata6', 'Abbreviation', '簡稱', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1410, 'jp', 'langdata5_1', 'Please enter the country', '請輸入國別', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1411, 'jp', 'langdata5', 'Country', '國別', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1412, 'jp', 'langdata2_1', 'Please enter a name', '請輸入名稱', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1413, 'jp', 'langdata4_1', 'Please enter a note', '請輸入備註', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1414, 'jp', 'langdata4', 'Remark', '備註', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1415, 'jp', 'langdata3', 'Language dictionary number', '語系字典數量', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1416, 'jp', 'langdata2', 'name', '名稱', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1417, 'jp', 'langdictionary1', 'English description', '英文描述', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1418, 'jp', 'langdictionary2', 'key', 'key', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1419, 'jp', 'langdictionary3_1', 'Please enter a translation', '請輸入翻譯', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1420, 'jp', 'langdictionary1_1', 'Please enter the English description', '請輸入英文描述', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1421, 'jp', 'langdictionary2_1', 'Please enter the key', '請輸入key', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1422, 'jp', 'langdictionary3', 'translation', '翻譯', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1423, 'zh-cht', 'type', 'type', '類別', 'admin', '2020-07-20 15:15:07', '2020-07-20 15:15:07'),
(1424, 'jp', 'type', 'type', 'カテゴリー', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1425, 'zh-cht', 'subtype', 'subtype', '子類別', 'admin', '2020-07-20 15:18:37', '2020-07-20 15:18:37'),
(1426, 'jp', 'subtype', 'subtype', '子類別', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1427, 'zh-cht', 'public', 'public', '公開', 'admin', '2020-07-20 15:20:04', '2020-07-20 15:20:04'),
(1428, 'jp', 'public', 'public', '公衆', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1429, 'zh-cht', 'Thumbnail', 'Thumbnail', '縮圖', 'admin', '2020-07-20 15:22:34', '2020-07-20 15:22:34'),
(1430, 'jp', 'Thumbnail', 'Thumbnail', 'サムネイル', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1431, 'zh-cht', 'sno', 'sno', '料號', 'admin', '2020-07-20 15:24:16', '2020-07-20 15:24:16'),
(1432, 'jp', 'sno', 'sno', '番号', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1433, 'zh-cht', 'tag', 'tag', '標籤', 'admin', '2020-07-20 15:25:24', '2020-07-20 15:25:24'),
(1434, 'jp', 'tag', 'tag', 'ラベル', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1435, 'zh-cht', 'description', 'description', '產品描述', 'admin', '2020-07-20 15:31:36', '2020-07-20 15:31:36'),
(1436, 'jp', 'description', 'description', '製品説明', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1437, 'zh-cht', 'indexPic', 'index image', '列表圖片', 'admin', '2020-07-20 15:33:22', '2020-07-20 15:33:22'),
(1438, 'jp', 'indexPic', 'index image', 'リストマップ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1439, 'zh-cht', 'size', 'size', '尺寸', 'admin', '2020-07-20 15:34:24', '2020-07-20 15:34:24'),
(1440, 'jp', 'size', 'size', 'サイズ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1441, 'zh-cht', 'material', 'material', '材質', 'admin', '2020-07-20 15:36:01', '2020-07-20 15:35:47'),
(1442, 'jp', 'material', 'material', '主要材質', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1443, 'zh-cht', 'heavy', 'heavy', '耐重', 'admin', '2020-07-20 15:38:31', '2020-07-20 15:38:31'),
(1444, 'jp', 'heavy', 'heavy', '耐荷重', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1445, 'zh-cht', 'color', 'color', '顏色', 'admin', '2020-07-20 15:39:19', '2020-07-20 15:39:19'),
(1446, 'jp', 'color', 'color', '色', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1447, 'zh-cht', 'capacity', 'capacity', '容量', 'admin', '2020-07-20 15:40:11', '2020-07-20 15:40:11'),
(1448, 'jp', 'capacity', 'capacity', 'ストレージ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1449, 'zh-cht', 'comment', 'comment', '備考', 'admin', '2020-07-20 15:43:06', '2020-07-20 15:43:06'),
(1450, 'jp', 'comment', 'comment', '備考', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1451, 'zh-cht', 'status', 'status', '商品狀態', 'admin', '2020-07-20 15:44:05', '2020-07-20 15:44:05'),
(1452, 'jp', 'status', 'status', '商品状態', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1453, 'zh-cht', 'link', 'link', '購買連結', 'admin', '2020-07-20 15:45:19', '2020-07-20 15:45:19'),
(1454, 'jp', 'link', 'link', '購入する', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1455, 'zh-cht', 'pic', 'pic', '介紹圖', 'admin', '2020-07-20 15:52:45', '2020-07-20 15:52:45'),
(1456, 'jp', 'pic', 'pic', '前書き', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1457, 'zh-cht', 'productIndroduction', 'productIndroduction', '產品介紹', 'admin', '2020-07-20 15:55:32', '2020-07-20 15:55:32'),
(1458, 'jp', 'productIndroduction', 'productIndroduction', '商品情報', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1459, 'zh-cht', 'productContent', 'product content', '商品情報', 'admin', '2020-07-20 16:04:32', '2020-07-20 16:04:32'),
(1460, 'jp', 'productContent', 'product content', '商品情報', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1461, 'zh-cht', 'pics', 'pics', '產品圖片', 'admin', '2020-07-20 16:05:56', '2020-07-20 16:05:56'),
(1462, 'jp', 'pics', 'pics', '図', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1463, 'zh-cht', 'sizePic', 'size pic', '產品尺寸圖', 'admin', '2020-07-20 16:06:57', '2020-07-20 16:06:57'),
(1464, 'jp', 'sizePic', 'size pic', '寸法図', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1465, 'jp', 'error1', 'Check no data', '情報が見つかりません', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1466, 'jp', 'manage4', 'System Information', '系統資訊', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1467, 'zh-cht', 'file', 'file', '檔案', 'admin', '2020-07-20 16:20:49', '2020-07-20 16:20:49'),
(1468, 'jp', 'file', 'file', 'ファイル', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1469, 'jp', 'manage5', 'complete', '完成', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1470, 'jp', 'manage6', 'click Cancel', '確定要取消', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1471, 'zh-cht', 'quantityOfSubtype', 'quantity of subtype', '子分類數量', 'admin', '2020-07-20 16:54:36', '2020-07-20 16:54:36'),
(1472, 'jp', 'quantityOfSubtype', 'quantity of subtype', 'サブカテゴリーの数', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1473, 'zh-cht', 'quantityOfProduct', 'quantity of product', '產品數量', 'admin', '2020-07-20 16:55:28', '2020-07-20 16:55:28'),
(1474, 'jp', 'quantityOfProduct', 'quantity of product', '量', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1475, 'zh-cht', 'company', 'company', '公司', 'admin', '2020-07-20 17:29:29', '2020-07-20 17:29:29'),
(1476, 'jp', 'company', 'company', '会社', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1477, 'zh-cht', 'productName', 'product name', '商品名稱', 'admin', '2020-07-20 17:32:07', '2020-07-20 17:32:07'),
(1478, 'jp', 'product name', 'product name', '商品名', 'admin', '2020-07-20 17:32:18', '2020-07-20 17:32:18'),
(1479, 'zh-cht', 'content', 'content', '內容', 'admin', '2020-07-20 17:32:59', '2020-07-20 17:32:59'),
(1480, 'jp', 'content', 'content', 'コンテンツ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1481, 'zh-cht', 'reply', 'reply', '回覆狀態', 'admin', '2020-07-20 17:34:47', '2020-07-20 17:34:47'),
(1482, 'jp', 'reply', 'reply', '返信ステータス', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1483, 'zh-cht', 'notice', 'notice', '回覆內容', 'admin', '2020-07-20 17:35:47', '2020-07-20 17:35:47'),
(1484, 'jp', 'notice', 'notice', '返信コンテンツ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1485, 'zh-cht', 'home', 'home', '首頁', 'admin', '2020-07-23 17:12:49', '2020-07-23 11:41:46'),
(1486, 'en', 'home', 'home', 'Home', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1487, 'jp', 'home', 'home', 'ホーム', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1488, 'zh-cht', 'menu_name', 'menu_name', 'ODM/OEM製造　日本林製作所', 'admin', '2020-07-29 10:25:49', '2020-07-29 10:10:15'),
(1489, 'zh-cht', 'menu_home', 'menu_home', '首頁', 'admin', '2020-07-29 10:12:52', '2020-07-29 10:12:52'),
(1490, 'zh-cht', 'menu_odmoem', 'menu_odmoem', '產品開發', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1491, 'zh-cht', 'menu_products', 'menu_products', '商品一覽', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1492, 'zh-cht', 'menu_intro', 'menu_intro', '企業介紹', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1493, 'zh-cht', 'menu_csr', 'menu_csr', '社會責任', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1494, 'zh-cht', 'menu_company', 'menu_company', '公司概要', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1495, 'zh-cht', 'menu_contact', 'menu_contact', '聯絡我們', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1496, 'zh-cht', 'menu_contact_customize', 'menu_contact_customize', 'OEM・ODM生產專用', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1497, 'zh-cht', 'menu_contact_rmade', 'menu_contact_rmade', '既有產品專用', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1498, 'zh-cht', 'menu_ec', 'menu_ec', '線上商店', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1499, 'zh-cht', 'menu_ec_jp', 'menu_ec_jp', '日本樂天', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1500, 'zh-cht', 'menu_ec_tw', 'menu_ec_tw', '台灣商城', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1501, 'zh-cht', 'menu_txt_taipei', 'menu_txt_taipei', '台北分店', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1502, 'zh-cht', 'menu_txt_search', 'menu_txt_search', '商品搜尋', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1503, 'zh-cht', 'menu_lang_en', 'menu_lang_en', 'English', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1504, 'zh-cht', 'menu_lang_jp', 'menu_lang_jp', '日本語', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1505, 'zh-cht', 'menu_lang_tw', 'menu_lang_tw', '繁中', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1506, 'zh-cht', 'web_title', 'web_title', '林製作所', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1507, 'zh-cht', 'web_product_tag1', 'web_product_tag1', '新上市', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1508, 'zh-cht', 'web_product_tag2', 'web_product_tag2', '販售中', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1509, 'zh-cht', 'web_product_tag3', 'web_product_tag3', '下訂生產', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1510, 'zh-cht', 'web_product_tag4', 'web_product_tag4', '生產結束', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1511, 'zh-cht', 'web_txt_shopping', 'web_txt_shopping', '購買', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1512, 'zh-cht', 'web_txt_download_pdf', 'web_txt_download_pdf', '組裝說明書PDF下載', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1513, 'zh-cht', 'web_txt_contactus', 'web_txt_contactus', '聯絡我們', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1514, 'zh-cht', 'web_product_spec_size', 'web_product_spec_size', '尺寸', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1515, 'zh-cht', 'web_product_spec_size_pic', 'web_product_spec_size_pic', '尺寸圖', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1516, 'zh-cht', 'web_product_spec_material', 'web_product_spec_material', '主要材質', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1517, 'zh-cht', 'web_product_spec_weight', 'web_product_spec_weight', '耐重', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1518, 'zh-cht', 'web_product_spec_color', 'web_product_spec_color', '色', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1519, 'zh-cht', 'web_product_spec_capacity', 'web_product_spec_capacity', '容量', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1520, 'zh-cht', 'web_product_spec_note', 'web_product_spec_note', '備考', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1521, 'zh-cht', 'web_product_spec_status', 'web_product_spec_status', '商品狀態', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1522, 'zh-cht', 'web_product_spec_introduct', 'web_product_spec_introduct', '商品介紹', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1523, 'zh-cht', 'web_product_spec_info', 'web_product_spec_info', '商品情報', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1524, 'zh-cht', 'web_product_spec_relate', 'web_product_spec_relate', '相關商品', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1525, 'zh-cht', 'web_product_odm_t1', 'web_product_odm_t1', 'ODM・OEM&lt;br&gt;&amp;&lt;br&gt;CONTRACT MANUFACTURING SERVICES', 'admin', '2020-08-06 19:56:23', '2020-07-29 10:15:32'),
(1526, 'zh-cht', 'web_product_odm_t2', 'web_product_odm_t2', '從無到有的商品發想\n天馬行空的創意無限\n為您實現夢想中的商品', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1527, 'zh-cht', 'web_txt_contact_now', 'web_txt_contact_now', '立即洽詢', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1528, 'zh-cht', 'web_txt_contact_w_odm', 'web_txt_contact_w_odm', 'ODM/OEM是什麼？', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1529, 'zh-cht', 'web_txt_contact_t1', 'web_txt_contact_t1', '歡迎使用以下表格進行既有產品的報價詢問', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1530, 'zh-cht', 'web_txt_contact_t2', 'web_txt_contact_t2', '若寄信時間為平日的早上9:00~下午17:00，一般於當日便會進行回覆。 在此時間外寄信的話，也會盡量於24小時內回覆。 (上述的狀況不包含星期六日以及國定假日)', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1531, 'zh-cht', 'web_txt_contact_t3', 'web_txt_contact_t3', '請填寫好內容後按下『確認發送』按鈕', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1532, 'zh-cht', 'web_txt_contact_t4', 'web_txt_contact_t4', '＊為必填項目。', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1533, 'zh-cht', 'web_txt_contact_name', 'web_txt_contact_name', '姓名', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1534, 'zh-cht', 'web_txt_contact_company', 'web_txt_contact_company', '公司', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1535, 'zh-cht', 'web_txt_contact_address', 'web_txt_contact_address', '地址', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1536, 'zh-cht', 'web_txt_contact_phone', 'web_txt_contact_phone', '電話號碼', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1537, 'zh-cht', 'web_txt_contact_email', 'web_txt_contact_email', 'E-mail', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1538, 'zh-cht', 'web_txt_contact_email_r', 'web_txt_contact_email_r', '(再次輸入)', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1539, 'zh-cht', 'web_txt_contact_product', 'web_txt_contact_product', '品號/品名', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1540, 'zh-cht', 'web_txt_contact_note', 'web_txt_contact_note', '内容（希望商品・數量・出貨地址等資料）', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1541, 'zh-cht', 'web_txt_contact_submit', 'web_txt_contact_submit', '確認發送', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1542, 'zh-cht', 'web_txt_contact_tel', 'web_txt_contact_tel', '聯絡電話', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1543, 'zh-cht', 'web_txt_contact_tel_jp', 'web_txt_contact_tel_jp', '+81-72-960-0500(日本)', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1544, 'zh-cht', 'web_txt_contact_tel_tw', 'web_txt_contact_tel_tw', '02-2521-2285（台灣分店）', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1545, 'zh-cht', 'web_txt_contact_tel_note', 'web_txt_contact_tel_note', '（9:00～17:00｜不包含星期六日以及國定假日）', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1546, 'zh-cht', 'web_txt_contact_subject_odm', 'web_txt_contact_subject_odm', '信件通知標題_odm', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1547, 'zh-cht', 'web_txt_contact_subject_customize', 'web_txt_contact_subject_customize', '信件通知標題_客製', 'admin', '2020-07-29 10:15:32', '2020-07-29 10:15:32'),
(1548, 'jp', 'web_product_tag3', 'web_product_tag3', '受注生産', 'admin', '2020-08-06 19:19:06', '2020-08-06 19:15:39'),
(1549, 'en', 'web_txt_contact_subject_customize', 'web_txt_contact_subject_customize', 'The Customize Message from WebSite', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1550, 'en', 'web_txt_contact_subject_odm', 'web_txt_contact_subject_odm', 'The odm.oem. Message from WebSite', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1551, 'en', 'web_txt_contact_tel_note', 'web_txt_contact_tel_note', '(9:00～17:00｜Not including Saturdays, Sundays and national holidays)', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1552, 'en', 'web_txt_contact_tel_tw', 'web_txt_contact_tel_tw', '02-2521-2285（Taiwan）', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1553, 'en', 'web_txt_contact_tel_jp', 'web_txt_contact_tel_jp', '+81-72-960-0500 (Japan)', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1554, 'en', 'web_txt_contact_tel', 'web_txt_contact_tel', 'TEL', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1555, 'en', 'web_txt_contact_submit', 'web_txt_contact_submit', 'Submit', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1556, 'en', 'web_txt_contact_note', 'web_txt_contact_note', 'Contents (desired product, quantity, shipping address, etc.)', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1557, 'en', 'web_txt_contact_product', 'web_txt_contact_product', 'Item No./Name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1558, 'en', 'web_txt_contact_email_r', 'web_txt_contact_email_r', '(re-enter)', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1559, 'en', 'web_txt_contact_email', 'web_txt_contact_email', 'E-mail', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1560, 'en', 'web_txt_contact_phone', 'web_txt_contact_phone', 'phone', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1561, 'en', 'web_txt_contact_address', 'web_txt_contact_address', 'address', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1562, 'en', 'web_txt_contact_company', 'web_txt_contact_company', 'company', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1563, 'en', 'web_txt_contact_name', 'web_txt_contact_name', 'name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1564, 'en', 'web_txt_contact_t4', 'web_txt_contact_t4', '＊Required。', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1565, 'en', 'web_txt_contact_t3', 'web_txt_contact_t3', 'Please fill in the content and press the \"Confirm Send\" button', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1566, 'en', 'web_txt_contact_t2', 'web_txt_contact_t2', 'If the mailing time is from 9:00 a.m. to 17:00 p.m. on weekdays, a reply will usually be made on the same day. If you send a letter outside this time, we will try our best to reply within 24 hours. (The above situation does not include Saturdays, Sundays ', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1567, 'en', 'web_txt_contact_t1', 'web_txt_contact_t1', 'Welcome to use the form below for quotation inquiries for existing products', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1568, 'en', 'web_txt_contact_w_odm', 'web_txt_contact_w_odm', 'Whiat is ODM/OEM', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1569, 'en', 'web_txt_contact_now', 'web_txt_contact_now', 'Contact Now', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1570, 'en', 'web_product_odm_t2', 'web_product_odm_t2', 'Thoughts on products from scratch', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1571, 'en', 'web_product_odm_t1', 'web_product_odm_t1', 'ODM・OEM&lt;br&gt;&amp;&lt;br&gt;CONTRACT MANUFACTURING SERVICES', 'admin', '2020-08-06 19:57:04', '2020-08-06 16:36:56'),
(1572, 'en', 'web_product_spec_relate', 'web_product_spec_relate', 'Related Product', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1573, 'en', 'web_product_spec_info', 'web_product_spec_info', 'Information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1574, 'en', 'web_product_spec_introduct', 'web_product_spec_introduct', 'Information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1575, 'en', 'web_product_spec_status', 'web_product_spec_status', 'Status', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1576, 'en', 'web_product_spec_note', 'web_product_spec_note', 'Note', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1577, 'en', 'web_product_spec_capacity', 'web_product_spec_capacity', 'Capacity', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1578, 'en', 'web_product_spec_color', 'web_product_spec_color', 'Color', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1579, 'en', 'web_product_spec_weight', 'web_product_spec_weight', 'Weight', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1580, 'en', 'web_product_spec_material', 'web_product_spec_material', 'Material', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1581, 'en', 'web_product_spec_size_pic', 'web_product_spec_size_pic', 'Size Pic', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1582, 'en', 'web_product_spec_size', 'web_product_spec_size', 'Size', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1583, 'en', 'web_txt_contactus', 'web_txt_contactus', 'Contact US', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1584, 'en', 'web_txt_download_pdf', 'web_txt_download_pdf', 'Download pdf', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1585, 'en', 'web_txt_shopping', 'web_txt_shopping', 'Shpping', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1586, 'en', 'web_product_tag4', 'web_product_tag4', 'Discontinued', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1587, 'en', 'web_product_tag3', 'web_product_tag3', 'Customerized', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1588, 'en', 'web_product_tag2', 'web_product_tag2', 'On Sell', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1589, 'en', 'web_product_tag1', 'web_product_tag1', 'New', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1590, 'en', 'web_title', 'web_title', 'Hayashi kagu', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1591, 'en', 'menu_lang_tw', 'menu_lang_tw', '繁中', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1592, 'en', 'menu_lang_jp', 'menu_lang_jp', '日本語', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1593, 'en', 'menu_lang_en', 'menu_lang_en', 'English', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1594, 'en', 'menu_txt_search', 'menu_txt_search', 'Search', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1595, 'en', 'menu_txt_taipei', 'menu_txt_taipei', 'Taipei', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1596, 'en', 'menu_ec_tw', 'menu_ec_tw', 'EC of Taiwan', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1597, 'en', 'menu_ec_jp', 'menu_ec_jp', 'Rakuten', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1598, 'en', 'menu_ec', 'menu_ec', 'EC', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1599, 'en', 'menu_contact_rmade', 'menu_contact_rmade', 'For existing products', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1600, 'en', 'menu_contact_customize', 'menu_contact_customize', 'For OEM・ODM', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1601, 'en', 'menu_contact', 'menu_contact', 'Contact Us', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1602, 'en', 'menu_company', 'menu_company', 'Company Info', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1603, 'en', 'menu_csr', 'menu_csr', 'CSR', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56');
INSERT INTO `lang_dictionary` (`ldic_id`, `ldic_ld_lang`, `ldic_key`, `ldic_english`, `ldic_val`, `ldic_admin`, `ldic_updatetime`, `ldic_createtime`) VALUES
(1604, 'en', 'menu_intro', 'menu_intro', 'Introduction', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1605, 'en', 'menu_products', 'menu_products', 'Products', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1606, 'en', 'menu_odmoem', 'menu_odmoem', 'ODM.OEM.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1607, 'en', 'menu_home', 'menu_home', 'HOME', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1608, 'en', 'menu_name', 'menu_name', 'ODM/OEM Hayashi-Kagu', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1609, 'en', 'notice', 'notice', 'notice', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1610, 'en', 'reply', 'reply', 'reply', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1611, 'en', 'content', 'content', 'content', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1612, 'en', 'productName', 'product name', 'product name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1613, 'en', 'company', 'company', 'company', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1614, 'en', 'quantityOfProduct', 'quantity of product', 'Quantity', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1615, 'en', 'quantityOfSubtype', 'quantity of subtype', 'Quantity of subtype', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1616, 'en', 'file', 'file', 'File', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1617, 'en', 'sizePic', 'size pic', 'Size Photo', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1618, 'en', 'pics', 'pics', 'Pics', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1619, 'en', 'productContent', 'product content', 'information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1620, 'en', 'productIndroduction', 'productIndroduction', 'Introduction', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1621, 'en', 'pic', 'pic', 'Pics', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1622, 'en', 'link', 'link', 'Link', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1623, 'en', 'status', 'status', 'Status', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1624, 'en', 'comment', 'comment', 'Comment', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1625, 'en', 'capacity', 'capacity', 'Capacity', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1626, 'en', 'color', 'color', 'Color', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1627, 'en', 'heavy', 'heavy', 'Heavy', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1628, 'en', 'material', 'material', 'Material', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1629, 'en', 'size', 'size', 'Size', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1630, 'en', 'indexPic', 'index image', 'IndexPic', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1631, 'en', 'description', 'description', 'Description', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1632, 'en', 'tag', 'tag', 'Tag', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1633, 'en', 'sno', 'sno', 'NO', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1634, 'en', 'Thumbnail', 'Thumbnail', 'Thumbnail', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1635, 'en', 'public', 'public', 'Public', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1636, 'en', 'subtype', 'subtype', 'Sub Type', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1637, 'en', 'type', 'type', 'Type', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1638, 'en', 'coderadmin4_product', 'contact us by product', 'FOR Product', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1639, 'en', 'coderadmin4_oemodm', 'OEM・ODM', 'FOR OEM・ODM', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1640, 'en', 'coderadmin4', 'contact us', 'Contacts', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1641, 'en', 'coderadmin3_class', 'Product Classification', 'Product Class', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1642, 'en', 'coderadmin3_class2', 'Product Classification L2', 'Product Sub Class', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1643, 'en', 'coderadmin3_list', 'Product List', 'Products', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1644, 'en', 'coderadmin3_class1', 'Product Classification L1', 'Product Class', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1645, 'en', 'coderadmin3', 'Products', 'Products', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1646, 'en', 'error1', 'Check no data', 'no data', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1647, 'en', 'admin8_1', 'Please enter a company', 'Please Enter Company Info.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1648, 'en', 'jquery10', 'Click me to browse the file', 'Click me to browse the file', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1649, 'en', 'jquery9', 'You have successfully uploaded the file.', 'You have successfully uploaded the file.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1650, 'en', 'jquery8', 'Upload job completed', 'Upload  completed', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1651, 'en', 'jquery7', 'Click me  to remove the file', 'Click  to remove the file', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1652, 'en', 'jquery6', 'Click on my upload file', 'Click  to upload the file', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1653, 'en', 'configmsg5', 'data', 'data', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1654, 'en', 'configmsg4', 'You can click here to view', 'Click to view', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1655, 'en', 'jquery5', 'Please enter the number.', 'Please enter the number.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1656, 'en', 'jquery4', 'Please enter the date format yyyy-mm-dd.', 'Please enter the date format yyyy-mm-dd.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1657, 'en', 'jquery3', 'Please enter Url format.', 'Please enter Url format.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1658, 'en', 'jquery2', 'Please enter email format.', 'Please enter email format.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1659, 'en', 'jquery1', 'Please enter the content.', 'Please enter the content.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1660, 'en', 'copynum_1', 'Please enter the number of copies', 'Please enter the number of copies', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1661, 'en', 'copynum', 'Copy quantity', 'Copy quantity', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1662, 'en', 'default', 'default', 'default', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1663, 'en', 'Excel19', 'column', 'column', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1664, 'en', 'Excel18', 'rows', 'rows', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1665, 'en', 'Excel17', 'The first', 'The first', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1666, 'en', 'Excel16', 'New failed', 'process failed', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1667, 'en', 'Excel15', 'An error occurred in the system. Please contact your system administrator', 'An error occurred in the system. Please contact your system administrator', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1668, 'en', 'Excel14', 'Website page management', 'Website page management', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1669, 'en', 'Excel12', 'modify', 'modify', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1670, 'en', 'Excel11', 'Failed to import', 'Failed to import', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1671, 'en', 'Excel10', 'Archives', 'Archives', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1672, 'en', 'Excel9', 'You have successfully imported', 'You have successfully imported', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1673, 'en', 'Excel8', 'Import completed', 'Import completed', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1674, 'en', 'Excel7', 'Unsuccessful import', 'Unsuccessful import', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1675, 'en', 'Excel6', 'Please upload file first', 'Please upload file first', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1676, 'en', 'Excel5', 'Preview Excel content (Please confirm below that the imported data content is correct)', 'Preview Excel content (Please confirm below that the imported data content is correct)', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1677, 'en', 'Excel4', 'Download the import sample file', 'Download the import sample file', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1678, 'en', 'Excel3', 'OK to send', 'OK to send', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1679, 'en', 'Excel2', 'Excel import', 'Excel import', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1680, 'en', 'Excel1', 'Not required', 'Not required', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1681, 'en', 'domsg1', 'please enter', 'please enter', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1682, 'en', 'code2', 'code', 'code', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1683, 'en', 'copytext', 'One copy is a copy', 'One copy is a copy', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1684, 'en', 'langdata10_1', 'Please enter the website', 'Please enter the website', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1685, 'en', 'langdata10', 'website', 'website', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1686, 'en', 'langdata9_1', 'Please enter the phone', 'Please enter the phone', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1687, 'en', 'langdata9', 'phone', 'phone', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1688, 'en', 'langdata8_1', 'Please enter the address', 'Please enter the address', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1689, 'en', 'langdata8', 'address', 'address', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1690, 'en', 'langdata7_1', 'Please enter the region', 'Please enter the region', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1691, 'en', 'langdata7', 'area', 'area', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1692, 'en', 'langdata6_1', 'Please enter abbreviation', 'Please enter abbreviation', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1693, 'en', 'langdata6', 'Abbreviation', 'Abbreviation', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1694, 'en', 'langdata5_1', 'Please enter the country', 'Please enter the country', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1695, 'en', 'langdata5', 'Country', 'Country', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1696, 'en', 'admin22', 'Administrator account', 'Administrator account', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1697, 'en', 'admin21', 'Excel file', 'Excel file', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1698, 'en', 'admin20_1', 'Please enter personal information', 'Please enter personal information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1699, 'en', 'admin20', 'personal information', 'personal information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1700, 'en', 'admin19', 'image', 'image', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1701, 'en', 'admin18', 'Authority', 'Authority', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1702, 'en', 'admin17_1', 'Please enter Email', 'Please enter Email', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1703, 'en', 'admin17', 'Backup Email', 'Backup Email', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1704, 'en', 'admin16_1', 'Please enter email', 'Please enter email', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1705, 'en', 'admin16', 'Email', 'Email', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1706, 'en', 'admin15_1', 'Please enter the name', 'Please enter the name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1707, 'en', 'admin15', 'first name', 'first name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1708, 'en', 'adminhelp3', 'In order to confirm the correct password, you have to enter it again.', 'In order to confirm the correct password, you have to enter it again.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1709, 'en', 'admin14_1', 'Please re-enter the administrator password', 'Please re-enter the administrator password', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1710, 'en', 'admin14', 'Password Confirmation', 'Password Confirmation', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1711, 'en', 'adminhelp2', 'Login system password.', 'Login system password.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1712, 'en', 'admin13_1', 'Please enter the administrator password', 'Please enter the administrator password', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1713, 'en', 'admin13', 'password', 'password', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1714, 'en', 'adminhelp1', 'This account number is the login account of the system and cannot be duplicated.', 'This account number is the login account of the system and cannot be duplicated.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1715, 'en', 'admin12', 'Please enter the administrator account', 'Please enter the administrator account', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1716, 'en', 'adminjs2', 'Please upload pictures!', 'Please upload pictures!', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1717, 'en', 'adminjs1', 'This account has been used. Please re-enter!', 'This account has been used. Please re-enter!', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1718, 'en', 'manage8', 'Last login IP', 'Last login IP', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1719, 'en', 'admin11', 'Repeat, please re-enter a group of accounts', 'Repeat, please re-enter a group of accounts', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1720, 'en', 'navbar3', 'Sign out', 'Sign out', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1721, 'en', 'navbar2', 'modify personal information', 'modify personal information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1722, 'en', 'navbar1', 'Login time', 'Login time', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1723, 'en', 'home3', 'Your login time is', 'Your login time is', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1724, 'en', 'home2', 'Welcome to use this system', 'Welcome to use this system', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1725, 'en', 'home1', 'Home information', 'Home information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1726, 'en', 'loginpage2', 'You have not logged in or exceeded your login period &lt;br&gt;&lt;br&gt; To ensure security, please click the link below to log in again.', 'You have not logged in or exceeded your login period &lt;br&gt;&lt;br&gt; To ensure security, please click the link below to log in again.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1727, 'en', 'loginpage1', 'Login overtime', 'Login overtime', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1728, 'en', 'oops2', '← Back to previous page', '← Back to previous page', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1729, 'en', 'oops1', 'Back to login page', 'Back to login page', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1730, 'en', 'adminlog7', 'Information', 'Information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1731, 'en', 'adminlog6', 'Module', 'Module', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1732, 'en', 'account', 'account', 'account', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1733, 'en', 'adminlog5', 'Operation date', 'Operation date', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1734, 'en', 'adminlog4', 'Login account', 'Login account', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1735, 'en', 'adminlog3', 'Operation record browsing', 'Operation record browsing', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1736, 'en', 'adminlog2', 'The background user operates the record list. This area cannot add/modify/delete actions.', 'The background user operates the record list. This area cannot add/modify/delete actions.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1737, 'en', 'adminlog1', 'Operation history record', 'Operation history record', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1738, 'en', 'authrules3', 'Number of members', 'Number of members', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1739, 'en', 'authrules2', 'Permission setting', 'Permission setting', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1740, 'en', 'authrules1_1', 'Please enter a description', 'Please enter a description', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1741, 'en', 'authrules1', 'Narrative', 'Narrative', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1742, 'en', 'help1', 'Super administrator has the highest privilege and can use all features', 'Super administrator has the highest privilege and can use all features', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1743, 'en', 'configmsg3', 'Super administrator', 'Super administrator', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1744, 'en', 'coderfilterhelp3', 'Any', 'Any', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1745, 'en', 'coderfilterhelp2', 'please choose', 'please choose', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1746, 'en', 'coderfilterhelp1', 'Search criteria', 'Search criteria', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1747, 'en', 'coderadminone', 'project', 'project', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1748, 'en', 'coderadminall', 'select all', 'select all', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1749, 'en', 'send', 'send', 'send', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1750, 'en', 'export', 'export', 'export', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1751, 'en', 'import', 'import', 'import', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1752, 'en', 'copy', 'copy', 'copy', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1753, 'en', 'del', 'delete', 'delete', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1754, 'en', 'view', 'view', 'view', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1755, 'en', 'coderlisthelp2', 'operating', 'operating', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1756, 'en', 'coderlisthelp1', 'Sorting', 'Sorting', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1757, 'en', 'langdictionary3_1', 'Please enter a translation', 'Please enter a translation', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1758, 'en', 'langdictionary2_1', 'Please enter the key', 'Please enter the key', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1759, 'en', 'langdictionary1_1', 'Please enter the English description', 'Please enter the English description', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1760, 'en', 'langdictionary3', 'translation', 'translation', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1761, 'en', 'langdictionary2', 'key', 'key', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1762, 'en', 'langdictionary1', 'English description', 'English description', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1763, 'en', 'langdata2_1', 'Please enter a name', 'Please enter a name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1764, 'en', 'langdata1_1', 'Please enter country code', 'Please enter country code', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1765, 'en', 'langdata4_1', 'Please enter a note', 'Please enter a note', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1766, 'en', 'langdata4', 'Remark', 'Remark', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1767, 'en', 'langdata3', 'Language dictionary number', 'Language dictionary number', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1768, 'en', 'langdata2', 'name', 'name', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1769, 'en', 'langdata1', 'country code', 'country code', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1770, 'en', 'coderadmin_home', 'Home', 'Home', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1771, 'en', 'coderadmin2_2', 'Language dictionary list', 'Language dictionary list', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1772, 'en', 'coderadmin2_1', 'Language List', 'Language List', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1773, 'en', 'coderadmin2', 'Language family', 'Language family', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1774, 'en', 'coderadmin1_3', 'History record', 'History record', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1775, 'en', 'coderadmin1_2', 'authority management', 'authority management', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1776, 'en', 'coderadmin1_1', 'Member management', 'Member management', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1777, 'en', 'coderadmin1', 'system', 'system', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1778, 'en', 'filter3', 'Keywords', 'Keywords', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1779, 'en', 'filter2', 'Date of establishment', 'Date of establishment', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1780, 'en', 'filter1', 'Last modified date', 'Last modified date', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1781, 'en', 'index2', 'Enable', 'Enable', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1782, 'en', 'index1', 'Last update time', 'Last update time', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1783, 'en', 'langdictionaryjs1', 'This country code Key has been used, please re-enter!', 'This country code Key has been used, please re-enter!', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1784, 'en', 'langdatajs1', 'This country code has already been used. Please re-enter!', 'This country code has already been used. Please re-enter!', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1785, 'en', 'manage7', 'cancel', 'cancel', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1786, 'en', 'manage6', 'click Cancel', 'click Cancel', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1787, 'en', 'manage5', 'complete', 'complete', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1788, 'en', 'manage3', 'Last modified', 'Last modified', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1789, 'en', 'manage2', 'Establishing time', 'Establishing time', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1790, 'en', 'manage1', 'Manager', 'Manager', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1791, 'en', 'manage4', 'System Information', 'System Information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1792, 'en', 'configmsg2', 'management', 'management', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1793, 'en', 'configmsg1', 'You can view all data here, or add, modify, delete, etc.', 'You can view all data here, or add, modify, delete, etc.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1794, 'en', 'delmsg4', 'Did not select delete data', 'Did not select delete data', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1795, 'en', 'delmsg3', 'Check deleted data', 'Check deleted data', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1796, 'en', 'delmsg2', 'Information', 'Information', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1797, 'en', 'delmsg1', 'Unknown error, please contact system administrator', 'Unknown error, please contact system administrator', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1798, 'en', 'add', 'add', 'add', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1799, 'en', 'edit', 'edit', 'edit', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1800, 'en', 'backpwd', 'Get back your password', 'Get back your password', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1801, 'en', 'forgetpwd', 'forget password', 'forget password', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1802, 'en', 'manage_title', 'Back office management system', 'Back office management system', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1803, 'en', 'forgot5', '← Back to login page', '← Back to login page', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1804, 'en', 'forgot4', 'Send verification letter', 'Send verification letter', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1805, 'en', 'forgot3', 'Please enter your email here', 'Please enter your email here', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1806, 'en', 'forgot2', 'Please wait', 'Please wait', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1807, 'en', 'forgot', 'Verification...', 'Verification...', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1808, 'en', 'formbtn', 'Sign in', 'Sign in', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1809, 'en', 'remember', 'remember me', 'remember me', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1810, 'en', 'codeimg2', 'I can get a new set of verification pictures again.', 'I can get a new set of verification pictures again.', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1811, 'en', 'codeimg1', 'Can\'t see clearly?', 'Can\'t see clearly?', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1812, 'en', 'code', 'Right figure', 'Right figure', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1813, 'en', 'password', 'Please enter your password here', 'Please enter your password here', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1814, 'en', 'username', 'Please enter your account here', 'Please enter your account here', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1815, 'en', 'actype', 'Please choose your identity', 'Please choose your identity', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1816, 'en', 'alertdiv', 'Signing in... please wait', 'Logining... please wait', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1817, 'en', 'lang', 'language system', 'language system', 'admin', '2020-08-06 16:36:56', '2020-08-06 16:36:56'),
(1818, 'jp', 'web_txt_contact_subject_customize', 'web_txt_contact_subject_customize', '既製品専用通知メッセージ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1819, 'jp', 'web_txt_contact_subject_odm', 'web_txt_contact_subject_odm', 'OEM・ODM生産専用通知メッセージ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1820, 'jp', 'web_txt_contact_tel_note', 'web_txt_contact_tel_note', '（9：00〜17：00 ｜土日祝を除く）', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1821, 'jp', 'web_txt_contact_tel_tw', 'web_txt_contact_tel_tw', '02-2521-2285（台湾支店）', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1822, 'jp', 'web_txt_contact_tel_jp', 'web_txt_contact_tel_jp', '+81-72-960-0500(日本)', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1823, 'jp', 'web_txt_contact_tel', 'web_txt_contact_tel', 'お問い合わせ番号', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1824, 'jp', 'web_txt_contact_submit', 'web_txt_contact_submit', '送信することを確認', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1825, 'jp', 'web_txt_contact_note', 'web_txt_contact_note', 'ご依頼内容（ご希望商品・数量・納品先情報等）', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1826, 'jp', 'web_txt_contact_product', 'web_txt_contact_product', 'アイテム番号/名前', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1827, 'jp', 'web_txt_contact_email_r', 'web_txt_contact_email_r', '（再入力）', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1828, 'jp', 'web_txt_contact_email', 'web_txt_contact_email', 'E-mail', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1829, 'jp', 'web_txt_contact_phone', 'web_txt_contact_phone', '電話番号', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1830, 'jp', 'web_txt_contact_address', 'web_txt_contact_address', 'ご住所', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1831, 'jp', 'web_txt_contact_company', 'web_txt_contact_company', '会社名', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1832, 'jp', 'web_txt_contact_name', 'web_txt_contact_name', 'お名前', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1833, 'jp', 'web_txt_contact_t4', 'web_txt_contact_t4', '＊は必須事項です。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1834, 'jp', 'web_txt_contact_t3', 'web_txt_contact_t3', '以下の内容をご記入の上、送信ボタンを押してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1835, 'jp', 'web_txt_contact_t2', 'web_txt_contact_t2', '平日の9時~17時までのお問い合わせに関しましては、基本的に当日ご連絡を差し上げます。それ以外の時間帯からのお問い合わせに関しましては、24時間以内に返信いたします。 (土・日・祝日は除きます。)', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1836, 'jp', 'web_txt_contact_t1', 'web_txt_contact_t1', '既製品のお見積りをご希望のお客様は以下より専用フォームをご利用ください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1837, 'jp', 'web_txt_contact_w_odm', 'web_txt_contact_w_odm', 'ODM/OEMとは？', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1838, 'jp', 'web_txt_contact_now', 'web_txt_contact_now', 'ご相談はこちら', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1839, 'jp', 'web_product_odm_t2', 'web_product_odm_t2', 'ものづくりの楽しみは無限大&lt;br&gt;だから、商品企画に終わりはありません&lt;br&gt;お客様のご希望に寄り添います', 'admin', '2020-08-06 19:57:36', '2020-08-06 19:15:39'),
(1840, 'jp', 'web_product_odm_t1', 'web_product_odm_t1', 'ODM・OEM&lt;br&gt;&amp;&lt;br&gt;CONTRACT MANUFACTURING SERVICES', 'admin', '2020-08-06 19:56:52', '2020-08-06 19:15:39'),
(1841, 'jp', 'web_product_spec_relate', 'web_product_spec_relate', '関連商品', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1842, 'jp', 'web_product_spec_info', 'web_product_spec_info', '商品情報', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1843, 'jp', 'web_product_spec_introduct', 'web_product_spec_introduct', '商品介紹', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1844, 'jp', 'web_product_spec_status', 'web_product_spec_status', '商品狀態', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1845, 'jp', 'web_product_spec_note', 'web_product_spec_note', '備考', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1846, 'jp', 'web_product_spec_capacity', 'web_product_spec_capacity', 'ストレージ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1847, 'jp', 'web_product_spec_color', 'web_product_spec_color', '色', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1848, 'jp', 'web_product_spec_weight', 'web_product_spec_weight', '耐荷重', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1849, 'jp', 'web_product_spec_material', 'web_product_spec_material', '主要材質', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1850, 'jp', 'web_product_spec_size_pic', 'web_product_spec_size_pic', '寸法図', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1851, 'jp', 'web_product_spec_size', 'web_product_spec_size', 'サイズ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1852, 'jp', 'web_txt_contactus', 'web_txt_contactus', 'お問合わせ', 'admin', '2020-08-06 19:21:55', '2020-08-06 19:15:39'),
(1853, 'jp', 'web_txt_download_pdf', 'web_txt_download_pdf', '組立説明書PDF&lt;br&gt; ダウンロード', 'admin', '2020-08-06 19:23:34', '2020-08-06 19:15:39'),
(1854, 'jp', 'web_txt_shopping', 'web_txt_shopping', '購入する', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1855, 'jp', 'web_product_tag4', 'web_product_tag4', '生產終了', 'admin', '2020-08-06 19:19:01', '2020-08-06 19:15:39'),
(1856, 'jp', 'web_product_tag2', 'web_product_tag2', '販売中', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1857, 'jp', 'web_product_tag1', 'web_product_tag1', '新発売', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1858, 'jp', 'web_title', 'web_title', '林製作所', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1859, 'jp', 'menu_lang_tw', 'menu_lang_tw', '繁體中文', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1860, 'jp', 'menu_lang_jp', 'menu_lang_jp', '日本語', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1861, 'jp', 'menu_lang_en', 'menu_lang_en', 'English', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1862, 'jp', 'menu_txt_search', 'menu_txt_search', 'サイト内検索', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1863, 'jp', 'menu_txt_taipei', 'menu_txt_taipei', '台北支店', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1864, 'jp', 'menu_ec_tw', 'menu_ec_tw', '台灣商城', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1865, 'jp', 'menu_ec_jp', 'menu_ec_jp', '楽天', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1866, 'jp', 'menu_ec', 'menu_ec', 'オンラインストア', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1867, 'jp', 'menu_contact_rmade', 'menu_contact_rmade', '既有產品專用', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1868, 'jp', 'menu_contact_customize', 'menu_contact_customize', '既製品専用', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1869, 'jp', 'menu_contact', 'menu_contact', 'お問合わせ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1870, 'jp', 'menu_company', 'menu_company', '会社概要', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1871, 'jp', 'menu_csr', 'menu_csr', '社会責任', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1872, 'jp', 'menu_intro', 'menu_intro', '企業情報', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1873, 'jp', 'menu_products', 'menu_products', '製品情報', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1874, 'jp', 'menu_odmoem', 'menu_odmoem', 'ODM・OEM事業', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1875, 'jp', 'menu_home', 'menu_home', 'ホーム', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1876, 'jp', 'menu_name', 'menu_name', 'ODM/OEM製造　日本林製作所', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1877, 'jp', 'productName', 'product name', '商品名', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1878, 'jp', 'admin8_1', 'Please enter a company', '会社を入力してください', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1879, 'jp', 'jquery10', 'Click me to browse the file', '私をクリックしてファイルを参照してください', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1880, 'jp', 'jquery9', 'You have successfully uploaded the file.', 'ファイルが正常にアップロードされました。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1881, 'jp', 'jquery8', 'Upload job completed', 'アップロードジョブが完了しました', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1882, 'jp', 'jquery7', 'Click me to remove the file', 'ファイルを削除するには私をクリックしてください', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1883, 'jp', 'jquery6', 'Click on my upload file', '私をクリックしてファイルをアップロード', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1884, 'jp', 'configmsg5', 'data', 'データ', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1885, 'jp', 'configmsg4', 'You can click here to view', 'ここをクリックして表示できます', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1886, 'jp', 'jquery5', 'Please enter the number.', '番号を入力してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1887, 'jp', 'jquery4', 'Please enter the date format yyyy-mm-dd.', '日付形式yyyy-mm-ddを入力してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1888, 'jp', 'jquery3', 'Please enter Url format.', 'URL形式を入力してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1889, 'jp', 'jquery2', 'Please enter email format.', 'メール形式を入力してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1890, 'jp', 'jquery1', 'Please enter the content.', 'コンテンツを入力してください。', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1891, 'jp', 'copynum_1', 'Please enter the number of copies', '部数を入力してください', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1892, 'jp', 'copynum', 'Copy quantity', '部数', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1893, 'jp', 'default', 'default', 'プリセット', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1894, 'jp', 'Excel19', 'column', 'カラム', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1895, 'jp', 'Excel18', 'Columns', 'カラム', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1896, 'jp', 'Excel17', 'The first', '番目', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1897, 'jp', 'Excel16', 'New failed', '追加できませんでした', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1898, 'jp', 'Excel15', 'An error occurred in the system. Please contact your system administrator', '系統發生錯誤,請聯絡系統管理員', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1899, 'jp', 'Excel14', 'Website page management', '網站頁面管理', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1900, 'jp', 'Excel11', 'Failed to import', '匯入失敗', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1901, 'jp', 'Excel10', 'Archives', '的檔案', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1902, 'jp', 'Excel9', 'You have successfully imported', '您己成功匯入了', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1903, 'jp', 'Excel8', 'Import completed', '匯入完成', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1904, 'jp', 'Excel7', 'Unsuccessful import', '未匯入成功', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1905, 'jp', 'Excel6', 'Please upload file first', '請先上傳檔案', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1906, 'jp', 'Excel5', 'Preview Excel content (Please confirm below that the imported data content is correct)', '預覽Excel內容(請在下方確認匯入的資料內容是否正確)', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1907, 'jp', 'Excel4', 'Download the import sample file', '下載匯入範例檔', 'admin', '2020-08-06 19:15:39', '2020-08-06 19:15:39'),
(1908, 'jp', 'Excel3', 'OK to send', '確定送出', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1909, 'jp', 'Excel2', 'Excel import', 'Excel匯入', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1910, 'jp', 'Excel1', 'Not required', '(非必填)', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1911, 'jp', 'domsg1', 'please enter', '請輸入', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1912, 'jp', 'code2', 'code', '碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1913, 'jp', 'copytext', 'One copy is a copy', '※一列為拷貝一筆', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1914, 'jp', 'admin22', 'Administrator account', '管理員帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1915, 'jp', 'admin21', 'Excel file', 'Excel檔案', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1916, 'jp', 'admin20_1', 'Please enter personal information', '請輸入個人資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1917, 'jp', 'admin20', 'personal information', '個人資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1918, 'jp', 'admin19', 'image', '圖片', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1919, 'jp', 'admin18', 'Authority', '權限', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1920, 'jp', 'admin17_1', 'Please enter Email', '請輸入Email', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1921, 'jp', 'admin17', 'Backup Email', '備用Email', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1922, 'jp', 'admin16_1', 'Please enter email', '請輸入Email', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1923, 'jp', 'admin16', 'Email', 'Email', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1924, 'jp', 'admin15_1', 'Please enter the name', '請輸入名字', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1925, 'jp', 'admin15', 'first name', '名字', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1926, 'jp', 'adminhelp3', 'In order to confirm the correct password, you have to enter it again.', '為了確認密碼是否確,麻煩您再輸入一次。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1927, 'jp', 'admin14_1', 'Please re-enter the administrator password', '請重新輸入管理員密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1928, 'jp', 'admin14', 'Password Confirmation', '密碼確認', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1929, 'jp', 'adminhelp2', 'Login system password.', '登入系統之密碼。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1930, 'jp', 'admin13_1', 'Please enter the administrator password', '請輸入管理員密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1931, 'jp', 'admin13', 'password', '密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1932, 'jp', 'adminhelp1', 'This account number is the login account of the system and cannot be duplicated.', '此帳密為登入系統之帳號,不能重覆。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1933, 'jp', 'admin12', 'Please enter the administrator account', '請輸入管理員帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1934, 'jp', 'adminjs2', 'Please upload pictures!', '請上傳圖片!', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1935, 'jp', 'adminjs1', 'This account has been used. Please re-enter!', '此帳號己被使用,請重新輸入!', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1936, 'jp', 'manage8', 'Last login IP', '最後登入IP', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1937, 'jp', 'admin11', 'Repeat, please re-enter a group of accounts', '重覆,請重新輸入一組帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1938, 'jp', 'home3', 'Your login time is', '您本次登入時間為', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1939, 'jp', 'home2', 'Welcome to use this system', '歡迎使用本系統', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1940, 'jp', 'home1', 'Home information', '首頁資訊', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1941, 'jp', 'loginpage2', 'You have not logged in or exceeded your login period &lt;br&gt;&lt;br&gt; To ensure security, please click the link below to log in again.', '您尚未登入或超過登入期限&lt;br&gt;為了確保安全性&lt;br&gt;請按下方連結重新登入。', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1942, 'jp', 'loginpage1', 'Login overtime', '登入逾時', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1943, 'jp', 'oops2', '← Back to previous page', '← 回到前一頁', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1944, 'jp', 'oops1', 'Back to login page', '回到登入頁', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1945, 'jp', 'adminlog7', 'Information', '資訊', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1946, 'jp', 'adminlog6', 'Module', '模組', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1947, 'jp', 'account', 'account', '帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1948, 'jp', 'adminlog5', 'Operation date', '操作日期', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1949, 'jp', 'adminlog4', 'Login account', '登入帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1950, 'jp', 'adminlog3', 'Operation record browsing', '操作記錄瀏覽', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1951, 'jp', 'adminlog1', 'Operation history record', '操作歷程記錄', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1952, 'jp', 'authrules3', 'Number of members', '成員數量', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1953, 'jp', 'authrules2', 'Permission setting', '權限設定', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1954, 'jp', 'authrules1_1', 'Please enter a description', '請輸入敘述', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1955, 'jp', 'authrules1', 'Narrative', '敘述', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1956, 'jp', 'help1', 'Super administrator has the highest privilege and can use all features', '超級管理員具有最高權限,可以使用所有功能', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1957, 'jp', 'configmsg3', 'Super administrator', '超級管理員', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1958, 'jp', 'send', 'send', '寄出', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1959, 'jp', 'export', 'export', '匯出', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1960, 'jp', 'import', 'import', '匯入', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1961, 'jp', 'copy', 'copy', '複製', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1962, 'jp', 'del', 'delete', '刪除', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1963, 'jp', 'view', 'view', '瀏覽', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1964, 'jp', 'index2', 'Enable', '啟用', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1965, 'jp', 'index1', 'Last update time', '最後更新時間', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1966, 'jp', 'manage7', 'cancel', '取消', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1967, 'jp', 'manage2', 'Establishing time', '建立時間', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1968, 'jp', 'manage1', 'Manager', '管理員', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1969, 'jp', 'configmsg2', 'management', '管理', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1970, 'jp', 'delmsg4', 'Did not select delete data', '未選取刪除資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1971, 'jp', 'delmsg3', 'Check deleted data', '查無刪除資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1972, 'jp', 'delmsg2', 'Information', '筆資料', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1973, 'jp', 'delmsg1', 'Unknown error, please contact system administrator', '未知錯誤,請聯絡系統管理員', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1974, 'jp', 'add', 'add', '新增', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1975, 'jp', 'edit', 'edit', '編輯', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1976, 'jp', 'backpwd', 'Get back your password', '取得密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1977, 'jp', 'forgetpwd', 'forget password', '忘記密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1978, 'jp', 'manage_title', 'Back office management system', '後台管理系統-Neptunus', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1979, 'jp', 'forgot5', '← Back to login page', '← 回登入頁', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1980, 'jp', 'forgot4', 'Send verification letter', '寄出驗證信', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1981, 'jp', 'forgot3', 'Please enter your email here', '請在此輸入您的Email', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1982, 'jp', 'forgot2', 'Please wait', '請稍候', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1983, 'jp', 'forgot', 'Verification...', '驗證中...', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1984, 'jp', 'formbtn', 'Sign in', '登入', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1985, 'jp', 'remember', 'remember me', '記住我', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1986, 'jp', 'codeimg2', 'I can get a new set of verification pictures again.', '點我就可以重新取得一組新的驗證圖片!', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1987, 'jp', 'codeimg1', 'Can\'t see clearly?', '看不清楚嗎?', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1988, 'jp', 'code', 'Right figure', '右圖數字', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1989, 'jp', 'password', 'Please enter your password here', '請在此輸入您的密碼', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1990, 'jp', 'username', 'Please enter your account here', '請在此輸入您的帳號', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1991, 'jp', 'actype', 'Please choose your identity', '請選擇身份', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1992, 'jp', 'alertdiv', 'Signing in... please wait', '<strong>登入中...</strong>請稍候', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1993, 'jp', 'lang', 'language system', '語系', 'admin', '2020-08-06 19:15:40', '2020-08-06 19:15:40'),
(1994, 'zh-cht', 'submitMessage', 'submitMessage', '您的訊息己送出,請靜候通知', 'admin', '2020-08-07 12:23:04', '2020-08-07 12:23:04'),
(1995, 'zh-cht', 'coderadmin4_oemodm_noreply', 'coderadmin4_oemodm_noreply', 'OEM・ODM生產專用未回覆列表', 'admin', '2020-08-07 15:42:04', '2020-08-07 15:42:04'),
(1996, 'zh-cht', 'coderadmin4_product_noreply', 'coderadmin4_product_noreply', '既有產品専用未回覆列表', 'admin', '2020-08-07 15:42:29', '2020-08-07 15:42:29'),
(1997, 'zh-cht', 'result', 'result', '筆的搜尋結果', 'admin', '2020-08-10 15:50:36', '2020-08-10 15:50:36'),
(1998, 'zh-cht', 'search', 'search', '搜尋', 'admin', '2020-08-10 15:50:45', '2020-08-10 15:50:45'),
(1999, 'zh-cht', 'total', 'total', '共有', 'admin', '2020-08-10 15:50:55', '2020-08-10 15:50:55');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_ind` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL COMMENT 'fk product subtype id',
  `pt_id` int(11) NOT NULL COMMENT 'fk product type id',
  `product_tag` int(11) NOT NULL COMMENT '產品標籤 0=無  1=新上市  2=販售中  3=下訂生產  4=生產結束',
  `product_sno` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品料號',
  `product_name_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱(日)',
  `product_name_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱(英)',
  `product_name_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱(中)',
  `product_description_jp` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品描述(日)',
  `product_description_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品描述(英)',
  `product_description_tw` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品描述(中)',
  `product_pics` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品圖片',
  `product_pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '列表圖片',
  `product_size_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺寸(日)',
  `product_size_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺寸(英)',
  `product_size_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺寸(中)',
  `product_material_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '材質(日)',
  `product_material_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '材質(英)',
  `product_material_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '材質(中)',
  `product_heavy_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '重量(日)',
  `product_heavy_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '重量(英)',
  `product_heavy_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '重量(中)',
  `product_color_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '顏色(日)',
  `product_color_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '顏色(英)',
  `product_color_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '顏色(中)',
  `product_capacity_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '容量(日)',
  `product_capacity_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '容量(英)',
  `product_capacity_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '容量(中)',
  `product_comment_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '備考(日)',
  `product_comment_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '備考(英)',
  `product_comment_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '備考(中)',
  `product_status_jp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品狀態(日)',
  `product_status_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品狀態(英)',
  `product_status_tw` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品狀態(中)',
  `product_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '購買連結',
  `product_file` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '使用說明書檔名',
  `product_content_pic1` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹圖1',
  `product_content_pic2` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹圖2',
  `product_content_pic3` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹圖3',
  `product_content_pic4` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹圖4',
  `product_content_text1_jp` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹1(日)',
  `product_content_text2_jp` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹2(日)',
  `product_content_text3_jp` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹3(日)',
  `product_content_text4_jp` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹4(日)',
  `product_content_text1_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹1(英)',
  `product_content_text2_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹2(英)',
  `product_content_text3_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹3(英)',
  `product_content_text4_en` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹4(英)',
  `product_content_text1_tw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹1(中)',
  `product_content_text2_tw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹2(中)',
  `product_content_text3_tw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹3(中)',
  `product_content_text4_tw` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '產品介紹4(中)',
  `product_size_pic` text COLLATE utf8_unicode_ci NOT NULL COMMENT '產品尺寸圖',
  `product_content_jp` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '產品說明(日)',
  `product_content_en` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '產品說明(日)',
  `product_content_tw` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '產品說明(日)',
  `product_is_show` int(11) NOT NULL COMMENT '是否顯示 1=是,0=否',
  `product_create_time` datetime NOT NULL,
  `product_update_time` datetime NOT NULL,
  `product_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`product_id`, `product_ind`, `ps_id`, `pt_id`, `product_tag`, `product_sno`, `product_name_jp`, `product_name_en`, `product_name_tw`, `product_description_jp`, `product_description_en`, `product_description_tw`, `product_pics`, `product_pic`, `product_size_jp`, `product_size_en`, `product_size_tw`, `product_material_jp`, `product_material_en`, `product_material_tw`, `product_heavy_jp`, `product_heavy_en`, `product_heavy_tw`, `product_color_jp`, `product_color_en`, `product_color_tw`, `product_capacity_jp`, `product_capacity_en`, `product_capacity_tw`, `product_comment_jp`, `product_comment_en`, `product_comment_tw`, `product_status_jp`, `product_status_en`, `product_status_tw`, `product_link`, `product_file`, `product_content_pic1`, `product_content_pic2`, `product_content_pic3`, `product_content_pic4`, `product_content_text1_jp`, `product_content_text2_jp`, `product_content_text3_jp`, `product_content_text4_jp`, `product_content_text1_en`, `product_content_text2_en`, `product_content_text3_en`, `product_content_text4_en`, `product_content_text1_tw`, `product_content_text2_tw`, `product_content_text3_tw`, `product_content_text4_tw`, `product_size_pic`, `product_content_jp`, `product_content_en`, `product_content_tw`, `product_is_show`, `product_create_time`, `product_update_time`, `product_admin`) VALUES
(6, 9, 15, 5, 1, 'YSK-016', '推車, 銀色jp', '推車, 銀色en', '推車, 銀色', '文件推車en文件推車en文件推車jp', '文件推車en文件推車en文件推車en', '文件推車文件推車文件推車', '[{\"product_pics_pic\":\"1596777212uUWn48.jpg\"},{\"product_pics_pic\":\"15967772165cZdGT.jpg\"}]', '1595995100Zuw2nQ.jpg', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '等分步15kg/層', '等分步15kg/層', '等分步15kg/層', '銀色', '銀色', '銀色', 'A4適用jp', 'A4適用', 'A4適用', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '(無輸入時不顯示)', '(無輸入時不顯示)', '(無輸入時不顯示)', 'https://www.google.com', '1595996789.sql', '1595995144TDHsEj.jpg', '1595995148xi5qfR.jpg', '', '', '介紹jp', '介紹jp', '', '', '說明1', '說明2', '', '', '說明1', '說明2', '', '', '[{\"product_size_pic_pic\":\"1595995133pJLzjD.jpg\"}]', '', '123', '123', 1, '2020-07-24 10:57:50', '2020-08-07 13:13:38', 'admin'),
(7, 10, 15, 5, 2, 'YSK-017', '推車, 黑色jp', '推車, 黑色en', '推車, 黑色', '', '', '', '[{\"product_pics_pic\":\"1596777199i5nA9R.jpg\"}]', '1595995100Zuw2nQ.jpg', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '等分步15kg/層', '等分步15kg/層', '等分步15kg/層', '銀色', '銀色', '銀色', 'A4適用jp', 'A4適用', 'A4適用', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '(無輸入時不顯示)', '(無輸入時不顯示)', '(無輸入時不顯示)', 'https://www.google.com', '', '1595995144TDHsEj.jpg', '1595995148xi5qfR.jpg', '', '', '介紹jp', '介紹jp', '', '', '說明1', '說明2', '', '', '說明1', '說明2', '', '', '[{\"product_size_pic_pic\":\"1595995133pJLzjD.jpg\"}]', '', '123', '123', 1, '2020-07-24 10:57:50', '2020-08-07 13:13:20', 'admin'),
(8, 11, 15, 5, 3, 'YSK-018', '推車, 紅色jp', '推車, 紅色en', '推車, 紅色', '文件推車en文件推車en文件推車jp', '文件推車en文件推車en文件推車en', '文件推車文件推車文件推車', '[{\"product_pics_pic\":\"1596777168VpKTkz.jpg\"},{\"product_pics_pic\":\"15967771746QEVEa.jpg\"}]', '1595995100Zuw2nQ.jpg', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '長度:	40,5 公分 寬度:	32 公分 高度:	74,5 公分', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層聚丙烯塑膠, 鋼質, 鍍鋅 框架/ 層板: 鋼質, 粉末塗層', '等分步15kg/層', '等分步15kg/層', '等分步15kg/層', '銀色', '銀色', '銀色', 'A4適用jp', 'A4適用', 'A4適用', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '請勿專門使用於重物、長距離搬運，容易造成腳輪損傷', '(無輸入時不顯示)', '(無輸入時不顯示)', '(無輸入時不顯示)', 'https://www.google.com', '', '1595995144TDHsEj.jpg', '1595995148xi5qfR.jpg', '', '', '介紹jp', '介紹jp', '', '', '說明1', '說明2', '', '', '說明1', '說明2', '', '', '[{\"product_size_pic_pic\":\"1595995133pJLzjD.jpg\"}]', '', '123', '123', 1, '2020-07-24 10:57:50', '2020-08-07 13:12:57', 'admin'),
(19, 64, 24, 8, 2, 'testtest', '產品測試jp', '產品測試en', '產品測試', '描述jp', '描述en', '產品測試描述', '[{\"product_pics_pic\":\"1596795491u9VxPL.jpg\"},{\"product_pics_pic\":\"1596795497Yib3pK.jpg\"}]', '1596795450sVgZMX.jpg', '尺寸jp', '尺寸en', '產品測試尺寸', '材質jp', '材質en', '產品測試材質', '耐重jp', '耐重en', '產品測試耐重', '顏色jp', '顏色en', '產品測試顏色', '容量jp', '容量en', '產品測試容', '備考jp', '備考en', '產品測試備考', '狀態jp', '狀態en', '產品測試狀態<br/>換行', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-07 18:19:44', '2020-08-07 18:19:44', 'admin'),
(9, 14, 21, 6, 1, '12312', 'baiku', 'superbike', '一台車', 'モタード', 'superbike', '一台機車', '[{\"product_pics_pic\":\"15961684592bSCnm.JPG\"}]', '1596167835dxkP7Z.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-07-31 11:57:05', '2020-07-31 12:07:43', 'admin'),
(10, 19, 21, 6, 1, '12312', 'モタード', 'superbike', '另外一台車', 'モタード', 'superbike', '另外一台機車', '[{\"product_pics_pic\":\"15961684592bSCnm.JPG\"}]', '1596167835dxkP7Z.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-07-31 11:58:03', '2020-07-31 11:58:03', 'admin'),
(11, 24, 20, 5, 3, 'AA555', 'キッチン収納', 'kitchen storage', '廚房收納廚房收納', 'キッチン収納のヘルパー', 'Good helper for kitchen storage', '廚房收納好幫手廚房收納好幫手', '[{\"product_pics_pic\":\"1596777147G6AL9y.jpg\"},{\"product_pics_pic\":\"1596777150iJiHqM.jpg\"}]', '1596516448jQasY2.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-04 12:49:10', '2020-08-07 13:12:32', 'admin'),
(12, 29, 22, 6, 2, 'aa1213', '12312', '1312', '123', '213', '123', '123', '[{\"product_pics_pic\":\"1596527354S8ubxc.jpg\"}]', '1596527330ITZsnX.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-04 15:49:19', '2020-08-04 15:49:19', 'admin'),
(13, 34, 20, 5, 3, 'AA556', 'デスク収納', 'Desk storage', '桌邊收納', 'デスク収納234', 'Desk storage 123', '桌邊收納123桌邊 收<br/>納123桌邊收納123桌邊收納123桌邊收納123桌邊收納123桌邊收納123桌邊收納123', '[{\"product_pics_pic\":\"1596532308cTVqCC.jpg\"},{\"product_pics_pic\":\"1596534164he5jFt.jpg\"},{\"product_pics_pic\":\"1596534177XUrszK.jpg\"}]', '15965322662ACnwN.jpg', '尺寸(日)', '', '尺寸(中)<br/>尺寸(中)<br/>尺寸(中)', '材質(日)', '', '材質(中)', '耐重(日)', '', '耐重(中)', '顏色(日)', '', '顏色(中)', '容量(日)', '', '容量(中)', '備考(日)', '', '備考(中)', '商品狀態(日)', '', '商品狀態(中)', 'http://www.google.com', '1596533331.jpg', '15966910525Yat6a.jpg', '', '1596691062fg848d.jpg', '', '', '', '', '', '', '', '', '', '圖1', '圖2中文', '圖3中文', '圖4中文', '[{\"product_size_pic_pic\":\"1596534106B9HVyw.jpg\"},{\"product_size_pic_pic\":\"15965341113JFnDs.png\"}]', '', '', '<h2>毛才像地花通中</h2>\r\n\r\n<p>後不話車你起作費，意民活了各；度鄉北證影說前開北學假的間平，了正就許，能人試會多日！的果他文和因場影施落於食景市不成。的區通四全下還住子花新提上做天起的建量乎是受我同印人出；狀充為分效國色以裡有還如在醫生。身上物價德法點都讀：使數城一，的兒新怕這就西小著&hellip;&hellip;布怎草日顧接可馬來外的手？讀各青工使；國發招效電主從想入度老說說了保石不再事門論女童路教一，學帶源成第國羅工了，真不義爾期特這！</p>\r\n\r\n<p>乎大內開經。</p>\r\n\r\n<p>小人區家是童出星一大步增育然接氣！臺世候，例苦父更全到月構別時輕該西有。有適孩是樣。</p>\r\n\r\n<p>星作意結代兩因有市發出上親國經告自，格不出阿日身解氣要為節無現。術能待，師溫息。度力細醫完辦給史格德&hellip;&hellip;統然影歡、達得死企、要生界也太。輕字開問話性息現費研天坐火以銀新國財減了量色。</p>\r\n\r\n<p>北回流的陽古&hellip;&hellip;自利外全；安實包你於全運費事著作等：入約路大個從上，十氣不可們系們友演：張銷路大有比早又感知一光又？不修校熱回個手我山源投來語相樣兒都定說別是太林&hellip;&hellip;方去老先：三斯消結？奇麼不人該地，陽出什香作事合政然！師子燈身，的留不神始合物內度。建國們：他人吸新成、主可制轉難中年氣還化，光點加裡到些價法美；一願的由覺書的雲用各爭。多回調一人是聲認市理好力度全我人時個了北牛理謝前人熱突級我準見於不少金問情當車實力態車買新更民也相什態助否。情府模臉所家笑，並解至&hellip;&hellip;專著一是馬&hellip;&hellip;為加要往十未路考國前里導製必。參獲人拿多的這。種意謝間羅因起了很&hellip;&hellip;滿的班自在，求心市&hellip;&hellip;以且花府們包最家放型懷內起陸於？</p>\r\n\r\n<p>人保許些沒現時加，朋最從天軍音，他我山東校！</p>\r\n\r\n<p><img alt=\"\" src=\"upload/editor/1596534244.png\" style=\"width: 806px; height: 400px;\" /><img alt=\"\" src=\"http://59.126.17.211:8082/hayashi20/upload/editor/1596690922.png\" style=\"width: 690px; height: 199px;\" /></p>\r\n\r\n<p>費林也年資一藝中水，北字下車長子，做心信減中顯，變到量親民照，的卻類備，班事成朋地？來來美人什實以步都回手過教都！明賣西海要本反其車不學同放歌的時化產以。研灣國。期別進致，個新決了養；現行候接看讀加知一界朋主，靈來人定？我名千者草等最院童們天通元一自，少工特保沒變西令時能直良開中，孩上品小在房著分須，形要因；的草知？個目格力館的把現超始廣請？足後成領邊那多因北觀會成；這天不我放驚今景論別張。取發月上多教經大有完機種提當我寫光中次，子或室讓向示出眼英制行。亞性細爸定：怎考機小無中時結嗎過方題緊：時前他說外中超中了當用早從庭日不型無望不；化張命美推那支日機；來石事且指車；讀提文車自有：裡舞時幾和人，什之麼我：問走他野：花接件電發實多府維的親爭和什精裡。力真護；經沒質高前所了了何有；義現水過證政母長人的導人前毛夜老化節產是小訴的的思山來票；是當溫子之顧是主回類治？眼細廣期不年別一議文有的議起教早。重眾種。研使看一你我回知那了創色生光排人離對別長驗比香路，青臺老，氣學低改他養通營；友它麼求及不多、下甚那味念：計什於便不經士&hellip;&hellip;超文雨國兒年；收南海風小改買，者長說萬國帶輪李大太的趣答活時生你且校級夜。參新林成安帶力覺家負新像時結境報可把大到職大國來新環些能開死我花身研何何海力筆著名。</p>', 1, '2020-08-04 17:11:53', '2020-08-06 21:03:41', 'admin'),
(18, 59, 20, 5, 2, 'AA5', '', '', '收納架', '', '', '', '[{\"product_pics_pic\":\"1596777054VM6XZw.jpg\"},{\"product_pics_pic\":\"1596777057cEwx77.jpg\"}]', '1596776567TxM82A.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-07 12:32:09', '2020-08-07 13:11:00', 'admin'),
(14, 39, 20, 5, 4, 'AA553', 'スナックトレー', 'Snack tray', '點心收納盤', 'スナックトレースナックトレースナックトレースナックトレースナックトレー', 'Snack traySnack traySnack traySnack traySnack tray', '點心收納盤點<br/>心收納盤點心收<br/>納盤點心收納盤', '[{\"product_pics_pic\":\"1596777125ebG5W5.jpg\"},{\"product_pics_pic\":\"1596777131TeFIX5.jpg\"}]', '1596534435NVcCgR.jpg', '', '', '尺寸1<br/>尺寸2<br/>尺寸3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-04 17:52:58', '2020-08-07 13:12:12', 'admin'),
(16, 49, 8, 3, 1, 'zipzip', 'zipzipjp', 'zipzipen', 'zipzip', '', '', '產品描述', '[{\"product_pics_pic\":\"1596777102AdG6qy.jpg\"},{\"product_pics_pic\":\"15967771062kxQMV.jpg\"}]', '1596776607nmK4AE.jpg', '', '', '尺寸', '', '', '材質', '', '', '耐重', '', '', '顏色', '', '', '容量', '', '', '備考', '', '', '狀態', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[{\"product_size_pic_pic\":\"1596621848C5anRs.jpg\"}]', '', '', '<p>指揮中心監測資料顯示，全球累計18,516,907例確診，分布於187個國家/地區；病例數以美國4,859,337例、巴西2,801,921例、印度1,855,745例、俄羅斯861,423例及南非521,318例為多；病例中700,477例死亡，以美國159,038例、巴西95,819例、墨西哥48,012例、英國46,299例及印度38,938例為多。</p>\r\n\r\n<p>指揮中心表示，日本疫情快速上升，近期單日新增病例數多超過千例，且疫情集中在與我國往來密切之都市地區。考量該國疫情持續升溫，自即日起將該國自「短期商務人士入境申請縮短居家檢疫」之中低感染風險國家移除。最新名單如下：<br />\r\n<b>1.低感染風險國家/地區：紐西蘭、澳門、帛琉、斐濟、汶萊、越南、泰國、蒙古、不丹、寮國、柬埔寨、緬甸。<br />\r\n2.中低感染風險國家/地區：韓國、馬來西亞、新加坡、斯里蘭卡。</b></p>\r\n\r\n<p><b><img alt=\"\" src=\"http://59.126.17.211:8082/hayashi20/upload/editor/1596621475.gif\" style=\"width: 1080px; height: 1080px;\" /></b></p>', 1, '2020-08-05 17:37:55', '2020-08-07 13:11:49', 'admin'),
(17, 54, 14, 4, 1, 'dddod', '', '', '桌上屏風', '', '', '', '[{\"product_pics_pic\":\"1596777088IENbVw.jpg\"}]', '1596776589ZSjP5R.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[]', '', '', '', 1, '2020-08-05 18:33:37', '2020-08-07 13:11:30', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `product_stype`
--

CREATE TABLE `product_stype` (
  `ps_id` int(11) NOT NULL,
  `pt_id` int(11) NOT NULL COMMENT 'fk product type id',
  `ps_name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_name_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_name_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_ispublic` int(11) NOT NULL DEFAULT '1',
  `ps_ind` int(11) NOT NULL,
  `ps_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ps_admin` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ps_updatetime` datetime NOT NULL,
  `ps_createtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品子分類';

--
-- 傾印資料表的資料 `product_stype`
--

INSERT INTO `product_stype` (`ps_id`, `pt_id`, `ps_name_en`, `ps_name_tw`, `ps_name_jp`, `ps_ispublic`, `ps_ind`, `ps_link`, `ps_admin`, `ps_updatetime`, `ps_createtime`) VALUES
(8, 3, 'ZIP LINK', 'ZIP LINK鋉結屏風', 'ZIPリンク鋉结屏风', 1, 26, 'ziplink.php', 'admin', '2020-08-07 12:56:54', '2020-07-24 10:37:16'),
(9, 3, 'Link screen', '連結屏風', 'リンク画面', 1, 11, '', 'admin', '2020-08-07 12:56:42', '2020-07-24 10:38:59'),
(10, 3, 'Disaster prevention screen', '防災用屏風', '防災画面', 1, 16, '', 'admin', '2020-08-07 12:56:09', '2020-07-24 10:39:14'),
(11, 3, 'Steel plate compartment', '鋼板隔間', '鋼板コンパートメント', 1, 21, '', 'admin', '2020-08-07 12:55:40', '2020-07-24 10:39:31'),
(12, 4, 'Acrylic table screen', '壓克力桌上屏風', 'アクリル製テーブルスクリーン', 1, 31, '', 'admin', '2020-08-07 12:55:28', '2020-07-24 10:41:33'),
(13, 4, 'Iron table screen', '鐵製桌上屏風', '鉄製テーブルスクリーン', 1, 36, '', 'admin', '2020-08-07 12:53:59', '2020-07-24 10:41:51'),
(14, 4, 'Other table screens', '其他桌上屏風', 'その他のテーブル画面', 1, 41, '', 'admin', '2020-08-07 12:53:44', '2020-07-24 10:42:10'),
(15, 5, 'File cart', '文件推車', 'ファイルカート', 1, 71, '', 'admin', '2020-08-07 12:53:31', '2020-07-24 10:43:16'),
(16, 5, 'Desk storage', '桌上收納', 'デスク収納', 1, 46, '', 'admin', '2020-08-07 12:53:20', '2020-07-24 10:43:32'),
(17, 5, 'Mobile storage rack', '移動式收納架', 'モバイル収納ラック', 1, 51, '', 'admin', '2020-08-07 12:53:10', '2020-07-24 10:43:49'),
(18, 5, 'Wire Junction Box', '電線集線盒', 'ワイヤージャンクションボックス', 1, 56, '', 'admin', '2020-08-07 12:52:57', '2020-07-24 10:44:04'),
(20, 5, 'Other storage racks', '其他收納架', 'その他の収納ラック', 1, 61, '', 'admin', '2020-08-07 12:52:45', '2020-07-24 10:44:40'),
(21, 6, 'abcen', 'cbatw', 'anojp', 1, 76, '', 'admin', '2020-08-05 16:51:56', '2020-07-31 11:52:17'),
(24, 8, '子類別測試en', '子類別測試', '子類別測試jp', 1, 81, '', 'admin', '2020-08-07 18:17:14', '2020-08-07 18:17:14');

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

CREATE TABLE `product_type` (
  `pt_id` int(11) NOT NULL,
  `pt_name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_name_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_name_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_ispublic` int(11) NOT NULL DEFAULT '1',
  `pt_ind` int(11) NOT NULL,
  `pt_pic` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pt_admin` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pt_updatetime` datetime NOT NULL,
  `pt_createtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品分類列表';

--
-- 傾印資料表的資料 `product_type`
--

INSERT INTO `product_type` (`pt_id`, `pt_name_en`, `pt_name_tw`, `pt_name_jp`, `pt_ispublic`, `pt_ind`, `pt_pic`, `pt_admin`, `pt_updatetime`, `pt_createtime`) VALUES
(3, 'screen', '隔間屏風', 'コンパートメント画面', 1, 26, '1595994955Ycv8nJ.jpg', 'admin', '2020-08-07 12:32:47', '2020-07-24 10:34:36'),
(4, 'Table screen', '桌上屏風', 'テーブル画面', 1, 21, '15959950034BHtWF.jpg', 'admin', '2020-08-07 12:33:10', '2020-07-24 10:40:15'),
(5, 'Desk storage', '桌邊收納', 'デスク収納', 1, 11, '1595994984KMfgcs.jpg', 'admin', '2020-08-07 12:33:41', '2020-07-24 10:41:08'),
(6, '1234en', '4321', '4567jp', 0, 16, '1596166715XHviPy.jpg', 'admin', '2020-08-07 11:54:00', '2020-07-31 11:38:47'),
(8, '類別測試en', '類別測試', '類別測試jp', 0, 31, '1596795413gEHWJK.png', 'admin', '2020-08-07 18:27:54', '2020-08-07 18:16:54');

-- --------------------------------------------------------

--
-- 資料表結構 `rules`
--

CREATE TABLE `rules` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(80) NOT NULL,
  `r_depiction` text NOT NULL,
  `r_superadmin` tinyint(4) NOT NULL DEFAULT '0',
  `r_admin` varchar(20) NOT NULL,
  `r_updatetime` datetime NOT NULL,
  `r_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `rules`
--

INSERT INTO `rules` (`r_id`, `r_name`, `r_depiction`, `r_superadmin`, `r_admin`, `r_updatetime`, `r_createtime`) VALUES
(2, '最高權限管理組', '', 1, 'admin', '2016-07-05 16:50:58', '2016-02-02 18:36:21'),
(5, 'STAFF', 'STAFF', 0, 'admin', '2019-07-15 11:19:15', '2018-05-03 12:23:16'),
(6, 'OPERATOR', '操作員', 0, 'LEO', '2018-06-27 14:48:31', '2018-05-08 11:54:11'),
(7, '測試覆核', '', 0, 'admin', '2018-05-14 18:56:17', '2018-05-14 18:56:17');

-- --------------------------------------------------------

--
-- 資料表結構 `rules_auth`
--

CREATE TABLE `rules_auth` (
  `ra_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `ra_main_key` int(11) NOT NULL,
  `ra_fun_key` int(11) NOT NULL,
  `ra_auth` int(11) NOT NULL,
  `ra_admin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ra_updatetime` datetime NOT NULL,
  `ra_createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mid` (`mid`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `company` (`company`),
  ADD KEY `factory` (`factory`),
  ADD KEY `work` (`work`);

--
-- 資料表索引 `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- 資料表索引 `lang_data`
--
ALTER TABLE `lang_data`
  ADD PRIMARY KEY (`ld_id`),
  ADD KEY `ld_lang` (`ld_lang`);

--
-- 資料表索引 `lang_dictionary`
--
ALTER TABLE `lang_dictionary`
  ADD PRIMARY KEY (`ldic_id`),
  ADD KEY `ldic_ld_id` (`ldic_ld_lang`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `ps_id` (`ps_id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- 資料表索引 `product_stype`
--
ALTER TABLE `product_stype`
  ADD PRIMARY KEY (`ps_id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- 資料表索引 `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- 資料表索引 `rules`
--
ALTER TABLE `rules`
  ADD UNIQUE KEY `a_id` (`r_id`);

--
-- 資料表索引 `rules_auth`
--
ALTER TABLE `rules_auth`
  ADD PRIMARY KEY (`ra_id`),
  ADD UNIQUE KEY `r_id_2` (`r_id`,`ra_main_key`,`ra_fun_key`),
  ADD KEY `r_id` (`r_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lang_data`
--
ALTER TABLE `lang_data`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lang_dictionary`
--
ALTER TABLE `lang_dictionary`
  MODIFY `ldic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_stype`
--
ALTER TABLE `product_stype`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rules`
--
ALTER TABLE `rules`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rules_auth`
--
ALTER TABLE `rules_auth`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rules` (`r_id`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `lang_dictionary`
--
ALTER TABLE `lang_dictionary`
  ADD CONSTRAINT `lang_dictionary_ibfk_1` FOREIGN KEY (`ldic_ld_lang`) REFERENCES `lang_data` (`ld_lang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `rules_auth`
--
ALTER TABLE `rules_auth`
  ADD CONSTRAINT `rules_auth_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rules` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
