<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='auth';
$fun_auth_key='auth_rules';
include('../_config.php');

//$pagename=request_basename();

$file_path=$admin_path_admin;

$auth=coderAdmin::Auth($fun_auth_key);

$table=coderDBConf::$rules;
$colname=coderDBConf::$col_rules;
$table_auth=coderDBConf::$rules_auth;
$colname_auth=coderDBConf::$col_rules_auth;
$table_admin=coderDBConf::$admin;

$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=$page_title." - ".coderLang::t("configmsg1",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.$auth['name'].coderLang::t("configmsg2",1).'</li>'; //管理
$mainicon=$auth['icon'];

function getAuthStr($id,$isadmin){
    global $now_lang_dic;
	if($isadmin==1){
		return  ' <span class="label label-important"><li class="icon-ok"> '.coderLang::t("configmsg3",1).' </li></span>'; //超級管理員[configmsg3]
	}

	$ary_hasauth=coderAdmin::getAuthListAryByInt($id);
	$str='';
	//print_r($ary_hasauth);
	
	foreach($ary_hasauth as $item){
		//$item['auth'] 操作權限
		if($item['ck_auth'])
		{
			$str.= ' <span class="label label-primary authbtn"><li class="icon-ok-sign"> '.$item['name'].' </li></span>';
		}
		else
		{
			$str.= ' <span class="label label-info authbtn"><li class="icon-ok-sign"> '.$item['name'].' </li></span>';
		}
	}

	return $str;
}
