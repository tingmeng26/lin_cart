<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='auth';
$fun_auth_key='adminlog';
include('../_config.php');

$file_path=$admin_path_admin;
$auth=coderAdmin::Auth($fun_auth_key);


$table=coderDBConf::$admin_log;
$page=request_pag("page");
$page_title=coderLang::t("adminlog1",1); //操作歷程記錄[adminlog1]
$page_desc=coderLang::t("adminlog2",1); //後台使用者操作記錄列表,此區不能進行新增/修改/刪除的動作。[adminlog2]
$mtitle='<li class="active">'.$auth['name'].'<span class="divider"><i class="icon-angle-right"></i></span>'.coderLang::t("adminlog3",1).'</li>'; //操作記錄瀏覽[adminlog3]
$mainicon=$auth['icon'];

$help=new coderFilterHelp();
$obj=array();

$ary=array();
$ary[]=array('column'=>'username','name'=>coderLang::t("adminlog4",1)); //登入帳號[adminlog4]
$ary[]=array('column'=>'ip','name'=>'ip');
$obj[]=array('type'=>'keyword','name'=>coderLang::t("filter3",1),'sql'=>true,'ary'=>$ary); //關鍵字[filter3]
//$obj[]=array('type'=>'select','name'=>'功能','column'=>'type','sql'=>true,'ary'=>coderHelp::parseAryKeys(coderAdminLog::$type,array('key'=>'value')));
$obj[]=array('type'=>'select','name'=>coderLang::t("coderlisthelp2",1),'column'=>'action','sql'=>true,'ary'=>coderHelp::parseAryKeys(coderAdminLog::$action,array('key'=>'value'))); //操作[coderlisthelp2]
$obj[]=array('type'=>'datearea','sql'=>true,'column'=>'createtime','name'=>coderLang::t("adminlog5",1)); //操作日期[adminlog5]
$obj[]=array('type'=>'hidden','sql'=>true,'column'=>'username','name'=>'');
$help->Bind($obj);
