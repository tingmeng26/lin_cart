<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='lang';
$fun_auth_key='lang_dictionary';
include('../_config.php');

$auth=coderAdmin::Auth($fun_auth_key);



$table=coderDBConf::$lang_dictionary;
$colname=coderDBConf::$col_lang_dictionary;

$table_ld=coderDBConf::$lang_data;
$colname_ld=coderDBConf::$col_lang_data;


$orderColumn=$colname['id'];
$orderDesc="desc";


$_lang_get = (get($colname['ld_lang'],1) !="")?get($colname['ld_lang'],1):'';
$_langname_get = (get($colname_ld['name'],1) !="")?get($colname_ld['name'],1):'';



$page=request_pag("page");
$page_title=$auth['name'];
$page_desc=$page_title." - ".coderLang::t("configmsg1",1); //您可以在這裡檢視所有資料,或進行新增、修改、刪除等操作。
$mtitle='<li class="active">'.$auth['name'].coderLang::t("configmsg2",1).'</li>'; //管理
$mainicon=$auth['icon'];


function isDateNotExisit($type,$val,$id=0){
    global $db,$table,$colname;
    switch ($type) {
        case 'lang':
            $where = "";
            if($id>0){
                $where .= "and `{$colname['id']}`!=$id";
            }
            if (!$db->query_first("select {$colname['id']} from $table where `{$colname['ld_lang']}`='".hc($val['lang'])."' and `{$colname['key']}`='".hc($val['key'])."' $where")){
                return true;
            }else {
                return false;
            }
            break;
        default:
            return false;
            break;
    }
}
