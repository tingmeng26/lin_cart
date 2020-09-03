-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-14 11:35:48
-- 伺服器版本： 10.4.8-MariaDB
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
(1, '7souioxkhlskjh867517ceb20a2fcbd61594357639lrb50dgr85ta9gu72p114pp', 'admin', '8450eca01665516d9aeb5317764902b78495502637c96192c81b1683d32d691a0965cf037feca8b9ed9ee6fc6ab8f27fce8f77c4fd9b4a442a00fc317b8237e6', '管理者', 'admin@gmail.com', '', '1490757979.JPG', '最高管理員', 2, '1', '1', '1', 1, 1, NULL, '0000-00-00 00:00:00', '127.0.0.1', 3, '1,2,3,4', '', 'admin', '2020-07-10 13:07:19', '0000-00-00 00:00:00', '2018-10-02 13:10:45'),
(2, 'dcfcc24b89f30f826483df550cce55c61536742066mk5ocpuu9coi94ltnbptqtd', 'jessica', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'ライトニング', 'jessica@coder.com.tw', '', '1490757967.jpg', 'test ????', 7, '5', '8', '16', 1, 0, NULL, '0000-00-00 00:00:00', '::1', 3, '', '', 'admin', '2018-09-12 16:47:46', '2016-02-16 15:27:26', '2018-10-02 13:06:10');

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
(1, 'admin', 2, 2, '語系字典列表 id:1350', '2020-07-09 20:00:12', '127.0.0.1', 4),
(2, 'admin', 2, 2, '語系字典列表 id:1351', '2020-07-09 20:01:13', '127.0.0.1', 4),
(3, 'admin', 2, 2, '語系字典列表 id:1352', '2020-07-09 20:02:24', '127.0.0.1', 4),
(4, 'admin', 2, 2, '語系字典列表 id:1353', '2020-07-09 20:02:46', '127.0.0.1', 4),
(5, 'admin', 2, 2, '語系字典列表 id:1351', '2020-07-09 20:05:03', '127.0.0.1', 8),
(6, 'admin', 2, 2, '語系字典列表 id:1375', '2020-07-09 21:16:35', '127.0.0.1', 4),
(7, 'admin', 2, 2, '語系字典列表 id:1376', '2020-07-09 21:17:21', '127.0.0.1', 4),
(8, 'admin', 2, 2, '語系字典列表 id:1377', '2020-07-09 21:17:53', '127.0.0.1', 4),
(9, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-07-09 21:28:26', '127.0.0.1', 4),
(10, 'admin', 2, 2, '語系字典列表 - Excel匯入', '2020-07-09 21:30:50', '127.0.0.1', 4),
(11, 'admin', 0, 0, 'admin登入成功', '2020-07-10 13:07:19', '127.0.0.1', 1),
(12, 'admin', 2, 2, '言語辞書のリスト - Excel匯入', '2020-07-10 13:21:06', '127.0.0.1', 4),
(13, 'admin', 2, 2, '言語辞書のリスト - Excel匯入', '2020-07-10 13:23:24', '127.0.0.1', 4);

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
(39, 'jp', '日文', '日文', 1, 3, 'admin', '2020-07-07 20:47:08', '2020-07-07 20:47:08');

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
(1358, 'jp', 'coderadmin3_list', 'Product List', '產品', 'admin', '2020-07-09 20:02:46', '2020-07-09 20:02:46'),
(1359, 'jp', 'coderadmin3_class2', 'Product Classification L2', ' サブ-カテゴリ一覧 ', 'admin', '2020-07-09 20:02:24', '2020-07-09 20:02:24'),
(1360, 'jp', 'coderadmin3_class1', 'Product Classification L1', ' カテゴリ一覧', 'admin', '2020-07-09 20:05:03', '2020-07-09 20:01:13'),
(1361, 'jp', 'coderadmin3', 'Products', '商品リスト', 'admin', '2020-07-09 20:00:12', '2020-07-09 20:00:12'),
(1362, 'zh-cht', 'coderadmin3_class', 'Product Classification ', '產品分類', 'admin', '2020-07-09 20:05:03', '2020-07-09 20:01:13'),
(1364, 'jp', 'coderadmin3_class', 'Product Classification ', '製品カテゴリ', 'admin', '2020-07-09 20:05:03', '2020-07-09 20:01:13'),
(1365, 'jp', 'coderadmin1_3', 'History record', '\r\n歴史記録', 'admin', '2018-04-03 15:51:35', '2018-04-03 15:51:35'),
(1366, 'jp', 'coderadmin1_2', 'authority management', '権限管理', 'admin', '2018-04-03 15:47:51', '2018-04-03 15:47:51'),
(1367, 'jp', 'coderadmin1_1', 'Member management', '会員管理', 'admin', '2018-04-03 15:46:47', '2018-04-03 15:46:47'),
(1368, 'jp', 'coderadmin1', 'system', 'システム', 'admin', '2018-04-03 15:45:25', '2018-04-03 15:45:25'),
(1369, 'jp', 'coderadmin2_2', 'Language dictionary list', '言語辞書のリスト', 'admin', '2018-04-03 15:54:23', '2018-04-03 15:54:23'),
(1370, 'jp', 'coderadmin2_1', 'Language List', '言語シリーズ', 'admin', '2018-04-03 15:54:00', '2018-04-03 15:54:00'),
(1371, 'jp', 'coderadmin2', 'Language family', '言語ファミリ', 'admin', '2018-04-03 15:52:43', '2018-04-03 15:52:43'),
(1372, 'jp', 'coderadmin_home', 'Home', 'Home', 'admin', '2018-04-03 16:07:49', '2018-04-03 16:07:49'),
(1373, 'jp', 'coderadminall', 'select all', 'すべて選択', 'admin', '2018-04-10 15:09:25', '2018-04-03 18:03:07'),
(1374, 'jp', 'coderadminone', 'item', 'アイテム', 'admin', '2018-04-10 15:09:31', '2018-04-03 18:03:19'),
(1375, 'zh-cht', 'coderadmin4', 'contact us', '聯絡我們', 'admin', '2020-07-09 21:16:35', '2020-07-09 21:16:35'),
(1376, 'zh-cht', 'coderadmin4_oemodm', 'OEM・ODM', 'OEM・ODM生產專用', 'admin', '2020-07-09 21:17:21', '2020-07-09 21:17:21'),
(1377, 'zh-cht', 'coderadmin4_product', 'contact us by product', '既有產品専用', 'admin', '2020-07-09 21:17:53', '2020-07-09 21:17:53'),
(1378, 'jp', 'coderadmin4_product', 'contact us by product', '既製品専用', 'admin', '2020-07-09 21:17:53', '2020-07-09 21:17:53'),
(1379, 'jp', 'coderadmin4_oemodm', 'OEM・ODM', 'OEM・ODM生産専用', 'admin', '2020-07-09 21:17:21', '2020-07-09 21:17:21'),
(1380, 'jp', 'coderadmin4', 'contact us', 'お問合わせ', 'admin', '2020-07-09 21:16:35', '2020-07-09 21:16:35'),
(1381, 'jp', 'Excel12', 'modify', '修正', 'admin', '2020-07-09 21:28:26', '2020-07-09 21:28:26'),
(1382, 'jp', 'navbar2', 'modify personal information', '個人情報を変更する', 'admin', '2020-07-09 21:28:26', '2020-07-09 21:28:26'),
(1383, 'jp', 'adminlog2', 'The background user operates the record list. This area cannot add/modify/delete actions.', 'バックグラウンドのユーザー操作レコードリスト。この領域では、アクションを追加、変更、削除できません。', 'admin', '2020-07-09 21:28:26', '2020-07-09 21:28:26'),
(1384, 'jp', 'filter1', 'Last modified date', '最終更新日', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1385, 'jp', 'manage3', 'Last modified', '最終変更時間', 'admin', '2020-07-09 21:28:26', '2020-07-09 21:28:26'),
(1386, 'jp', 'configmsg1', 'You can view all data here, or add, modify, delete, etc.', 'ここですべてのデータを表示したり、追加、変更、削除などの操作を実行したりできます。', 'admin', '2020-07-09 21:28:26', '2020-07-09 21:28:26'),
(1387, 'jp', 'navbar3', 'Sign out', 'サインアウト', 'admin', '2020-07-09 21:30:50', '2020-07-09 21:30:50'),
(1388, 'jp', 'navbar1', 'Login time', 'ログイン時間', 'admin', '2020-07-09 21:30:50', '2020-07-09 21:30:50'),
(1389, 'jp', 'coderfilterhelp3', 'Any', '無制限', 'admin', '2020-07-10 13:21:05', '2020-07-10 13:21:05'),
(1390, 'jp', 'coderfilterhelp2', 'please choose', '選んでください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1391, 'jp', 'coderfilterhelp1', 'Search criteria', '搜尋條件', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1392, 'jp', 'filter3', 'Keywords', '検索基準', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1393, 'jp', 'filter2', 'Date of establishment', '作成日', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1394, 'jp', 'coderlisthelp2', 'operating', 'オペレーティング', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1395, 'jp', 'coderlisthelp1', 'Sorting', 'ソート', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1396, 'jp', 'langdata1_1', 'Please enter country code', '言語コードを入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1397, 'jp', 'langdata1', 'country code', '言語コード', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1398, 'jp', 'langdictionaryjs1', 'This country code Key has been used, please re-enter!', 'この言語コードキーは使用されています。再入力してください！', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1399, 'jp', 'langdatajs1', 'This country code has already been used. Please re-enter!', 'この言語コードは使用されています。再入力してください！', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1400, 'jp', 'langdata10_1', 'Please enter the website', 'ウェブサイトを入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1401, 'jp', 'langdata10', 'website', 'ウェブサイト', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1402, 'jp', 'langdata9_1', 'Please enter the phone', '電話番号を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1403, 'jp', 'langdata9', 'phone', '電話', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1404, 'jp', 'langdata8_1', 'Please enter the address', '住所を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1405, 'jp', 'langdata8', 'address', '住所', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1406, 'jp', 'langdata7_1', 'Please enter the region', '地域を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1407, 'jp', 'langdata7', 'area', '範囲', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1408, 'jp', 'langdata6_1', 'Please enter abbreviation', '略称を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1409, 'jp', 'langdata6', 'Abbreviation', '略語', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1410, 'jp', 'langdata5_1', 'Please enter the country', '国を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1411, 'jp', 'langdata5', 'Country', '国', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1412, 'jp', 'langdata2_1', 'Please enter a name', '名前を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1413, 'jp', 'langdata4_1', 'Please enter a note', '備考を入力してください', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1414, 'jp', 'langdata4', 'Remark', '備考', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1415, 'jp', 'langdata3', 'Language dictionary number', '言語辞書の数', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1416, 'jp', 'langdata2', 'name', '名前', 'admin', '2020-07-10 13:21:06', '2020-07-10 13:21:06'),
(1417, 'jp', 'langdictionary1', 'English description', '英語の説明', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24'),
(1418, 'jp', 'langdictionary2', 'key', 'key', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24'),
(1419, 'jp', 'langdictionary3_1', 'Please enter a translation', '翻訳を入力してください', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24'),
(1420, 'jp', 'langdictionary1_1', 'Please enter the English description', '説明は英語で入力してください', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24'),
(1421, 'jp', 'langdictionary2_1', 'Please enter the key', 'キーを入力してください', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24'),
(1422, 'jp', 'langdictionary3', 'translation', '翻訳', 'admin', '2020-07-10 13:23:24', '2020-07-10 13:23:24');

-- --------------------------------------------------------

--
-- 資料表結構 `rules`
--

CREATE TABLE `rules` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(80) NOT NULL,
  `r_depiction` text NOT NULL,
  `r_superadmin` tinyint(4) NOT NULL DEFAULT 0,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lang_data`
--
ALTER TABLE `lang_data`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lang_dictionary`
--
ALTER TABLE `lang_dictionary`
  MODIFY `ldic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1423;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rules`
--
ALTER TABLE `rules`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rules_auth`
--
ALTER TABLE `rules_auth`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
