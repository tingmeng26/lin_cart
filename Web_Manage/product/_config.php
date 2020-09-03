<?php
$inc_path = "../../inc/";
$manage_path = "../";
include('../_config.php');

// $file_path = '';
$file_path =$PATH_PRODUCT;
$table = coderDBConf::$product;
$colname = coderDBConf::$colPorduct;

// 分類大項
$type = coderDBConf::$productType;
$colType = coderDBConf::$colProductType;

// 分類細項
$subtype = coderDBConf::$productSubtype;
$colSubtype = coderDBConf::$colProductSubtype;


// 根據當下語系回傳大項列表
$typeList = class_product::getProductTypeList();
// 根據當下語系回傳子分類列表
$subtypeList = class_product::getSubtypeList();
$main_auth_key='product';
$fun_auth_key='product';
$auth=coderAdmin::Auth($fun_auth_key);
// 導自產品分類大類點選連結
$tid = get('tid',1);
$typeDefault = '';
if(!empty($tid)){
  $typeDefault =coderHelp::getAryVal(array_column($typeList,'name','value'), $tid);
}
// 導自產品分類子類別點選連結
$sid = get('sid',1);
$subtypeDefault = '';
if(!empty($sid)){
  $subtypeDefault = coderHelp::getAryVal(array_column($subtypeList,'name','value'), $sid);
}

$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=coderLang::t("coderadmin3_list",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.coderLang::t("coderadmin3_list",1).'</li>'; //管理
$mainicon=$auth['icon'];
$orderColumn = $colname['ind'];
$orderType = 'desc';
