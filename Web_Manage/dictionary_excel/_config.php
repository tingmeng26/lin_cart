<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='lang';
$fun_auth_key='lang_dictionary';
include('../_config.php');
$auth=coderAdmin::Auth($fun_auth_key);


$file_path="";
$file_path_temp="../../upload/temp/";

$table=coderDBConf::$lang_dictionary;
$colname=coderDBConf::$col_lang_dictionary;

$table_ld=coderDBConf::$lang_data;
$colname_ld=coderDBConf::$col_lang_data;




$orderColumn=$colname['id'];
$orderDesc="desc";


$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=$page_title." - ".coderLang::t("configmsg1",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.$auth['name'].coderLang::t("configmsg2",1).'</li>'; //管理
$mainicon=$auth['icon'];
