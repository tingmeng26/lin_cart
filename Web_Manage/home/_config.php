<?php
$inc_path="../../inc/";
$manage_path="../";
include('../_config.php');
$mainicon="icon_home";
$page_desc=coderLang::t("home2",1).$webname.$webmanagename.coderLang::t("manage_title",1);//後台管理系統-Neptunus [manage_title] 歡迎使用本系統[home2]
$page_title='首頁版面';


$table = coderDBConf::$contact;
$colname = coderDBConf::$colContact;
$product = coderDBConf::$product;
$colProduct = coderDBConf::$colPorduct;

$type = 'oemodm';
$status = 'noreply';
$main_auth_key = 'contact';
// $fun_auth_key = $type == 'oemodm' ? 'oemodm' : 'contact_product';

// $fun_auth_key = empty($status)?$fun_auth_key:$fun_auth_key.'_noreply';
// $auth = coderAdmin::Auth($fun_auth_key);
$noreplyTitle = empty($status)?'':'_'.$status;
$page=request_pag("page");
$page = request_pag("page");
// $page_title = coderLang::g("coderadmin4_" . $type.$noreplyTitle);
// $page_desc = coderLang::g("coderadmin4"); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle = '<li class="active">' . coderLang::g("coderadmin4") . '</li>'; //管理
// $mainicon = $auth['icon'];
$orderColumn = $colname['id'];
$orderType = 'desc';
