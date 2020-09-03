<?php
$inc_path = "../../inc/";
$manage_path = "../";
include('../_config.php');

// $file_path = '';
$file_path =$PATH_PRODUCT_SUBTYPE;
$type = coderDBConf::$productType;
$table = coderDBConf::$productSubtype;
$product = coderDBConf::$product;

$colname = coderDBConf::$colProductSubtype;
$colType = coderDBConf::$colProductType;
$colProduct = coderDBConf::$colPorduct;

// 根據當下語系回傳大項列表
$typeList = class_product::getProductTypeList();

$main_auth_key='product';
$fun_auth_key='subtype';
$auth=coderAdmin::Auth($fun_auth_key);

// 導自產品分類大類點選連結
$tid = get('tid',1);
$typeDefault = '';
if(!empty($tid)){
  $typeDefault =coderHelp::getAryVal(array_column($typeList,'name','value'), $tid);
}
$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=coderLang::t("coderadmin3_class2",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.coderLang::t("coderadmin3_class2",1).'</li>'; //管理
$mainicon=$auth['icon'];
$orderColumn = $colname['ind'];
$orderType = 'desc';
