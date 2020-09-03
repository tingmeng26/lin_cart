<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='auth';
$fun_auth_key='admin';
include('../_config.php');

$pagename=request_basename();

$file_path=$admin_path_admin;
$file_path_temp="../../upload/temp/";


$auth=coderAdmin::Auth($fun_auth_key);

//自己要能編輯自己的資料
// if(($pagename!='manage.php' && $pagename!='save.php') || request_str('username')!=$adminuser['username']){
//     coderAdmin::vaild($auth);
// }

$table=coderDBConf::$admin;

$table_rules=coderDBConf::$rules;
$colname_rules=coderDBConf::$col_rules;


/*
$ary_type = array(); //連動下拉
$rows_qc = class_qcontrol_company::getList_mselect(); //公司別
foreach($rows_qc as $row_qc)
{
    $ary_type[] = array('name'=>$row_qc['name'],'value'=>'type1_'.$row_qc['value'],'pid'=>'0');
}


$rows_qf = class_qcontrol_factory::getList_mselect(); //廠別
foreach($rows_qf as $row_qf)
{
    $ary_type[] = array('value'=>$row_qf['value'],'name'=>$row_qf['name'],'pid'=>'type1_'.$row_qf['qc_id']);


}

$rows_qw = class_qcontrol_work::getList_mselect2();*/



$rules_name = get('rules',1);

$page=request_pag("page");
$page_title=$auth['name'];
$page_desc="後台管理者帳號管理區,您可以在這裡檢視所有帳號,或對帳號進行新增、修改、刪除等操作。";
$mtitle='<li class="active">'.$auth['name'].'管理</li>';
$mainicon=$auth['icon'];


$rules_array = class_rules::getList(); //角色ary

$ary_loginouttime = array();
foreach($incary_loginouttime as $key_loginouttime => $val_loginouttime) //自動登出時間
{
	$ary_loginouttime[] = array('name'=>$val_loginouttime['name'],'value'=>$key_loginouttime); 
}







function checkgroup($ary)
{
	$temp_type = array();
	if(count($ary) > 0){
		foreach($ary as $val){
			$temp_type[]['key'] = $val;
		}
	}
	return $temp_type;
}




function isUsernameNotExisit($username)
{
	global $db,$table;
	if (strlen($username)>2 && !$db->query_first('select id from '.$table.' where username=\''.hc($username).'\''))
	{
		return true;
	}
	else 
	{
		return false;
	}
}

//excel 不重複
function uniqueAssocArray($array, $uniqueKey) {
  if (!is_array($array)) {
	return array();
  }
  $uniqueKeys = array();
  foreach ($array as $key => $item) {
	if (!in_array($item[$uniqueKey], $uniqueKeys)) {
	  $uniqueKeys[$item[$uniqueKey]] = $item;
	}
  }
  return $uniqueKeys;
}

function getmid(){
    global $db,$table;
    $mid = md5(uniqid(rand()));
    if($db->isExisit($table,'mid',$mid)){
        return getmid();
    }else{
        return $mid;
    }
}
?>