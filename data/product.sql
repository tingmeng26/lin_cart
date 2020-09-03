-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2020 年 07 月 17 日 10:24
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
-- 資料表結構 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `product_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `ps_id` (`ps_id`),
  KEY `pt_id` (`pt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
