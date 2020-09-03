<?php
$inc_path = "../../inc/";
$manage_path = "../";
include('../_config.php');

// $file_path = '';
$file_path =$PATH_PRODUCT_TYPE;
$table = coderDBConf::$productType;
$subtype = coderDBConf::$productSubtype;
$product = coderDBConf::$product;
$colname = coderDBConf::$colProductType;
$colSubtype = coderDBConf::$colProductSubtype;
$colProduct = coderDBConf::$colPorduct;


$main_auth_key='product';
$fun_auth_key='type';
$auth=coderAdmin::Auth($fun_auth_key);


$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=coderLang::t("coderadmin3_class1",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.coderLang::t("coderadmin3_class1",1).'</li>'; //管理
$mainicon=$auth['icon'];
$orderColumn = $colname['ind'];
$orderType = 'desc';
