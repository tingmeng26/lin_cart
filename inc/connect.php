<?php
/* 以此connect.php的資料夾路徑判斷環境 */
$inc_secure = 'http';
$WebDeployLocation = dirname(__FILE__);
$WebServerHostName = gethostname();
// 預設
$weburl = "http://localhost";
$weburl_manage = $weburl . "Web_Manage/";

$web_domain = "localhost";
$web_root = "/lin_cart/"; //前台cookie紀錄路徑

$HS = "127.0.0.1";
$ID = "root";
$PW = "";
$DB = "hayashi20";
// 舊資料
// $DB = "hayashi20_combination";

$HS_read = "127.0.0.1";
$ID_read = "root";
$PW_read = "";
$DB_read = "hayashi20";


$weburl_cookiepath = $web_root; //前台cookie紀錄路徑 ex.'/'
$rootpath = $web_root . 'Web_Manage/'; //後台cookie紀錄路徑 ex.'/Web_Manage/'
$session_domain = $web_domain; //允許seesion儲存的網域
$weburl = $inc_secure . "://" . $web_domain . (!empty($web_port) ? ':' . $web_port : '') . $web_root;//網址

/* PHP END*/
