-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2020 年 07 月 15 日 10:16
-- 伺服器版本: 5.7.24
-- PHP 版本： 7.2.14

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
-- 資料表結構 `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `contact_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `product_stype`
--

DROP TABLE IF EXISTS `product_stype`;
CREATE TABLE IF NOT EXISTS `product_stype` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_id` int(11) NOT NULL COMMENT 'fk product type id',
  `ps_name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_name_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_name_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ps_ispublic` int(11) NOT NULL DEFAULT '1',
  `ps_ind` int(11) NOT NULL,
  `ps_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ps_admin` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ps_updatetime` datetime NOT NULL,
  `ps_createtime` datetime NOT NULL,
  PRIMARY KEY (`ps_id`),
  KEY `pt_id` (`pt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品子分類';

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_name_tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_name_jp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pt_ispublic` int(11) NOT NULL DEFAULT '1',
  `pt_ind` int(11) NOT NULL,
  `pt_pic` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pt_admin` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pt_updatetime` datetime NOT NULL,
  `pt_createtime` datetime NOT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='產品分類列表';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
