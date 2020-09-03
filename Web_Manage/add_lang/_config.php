<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='auth';
$fun_auth_key='admin';
include('../_config.php');


$auth=coderAdmin::Auth($fun_auth_key);

$file_path = $admin_vicinity_addr;
$file_path_temp="../../upload/temp/";


$table=coderDBConf::$lang_data;
$colname=coderDBConf::$col_lang_data;




$orderColumn=$colname['id'];
$orderDesc="desc";

$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=$page_title." - 您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。";
$mtitle='<li class="active">'.$auth['name'].'管理</li>';
$mainicon=$auth['icon'];


?>