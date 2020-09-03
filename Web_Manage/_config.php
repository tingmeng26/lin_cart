<?php
include $inc_path . "_config.php";
include $inc_path . "_web_func.php";
$cache_path = $cache_path_admin;

include($inc_path . '_cache.php');
//$webmanagename="後台管理系統-Neptunus V1.0";

//取得登入USER順便檢查是否登入
$db = Database::DB();
$m_lang_data = coderLang::getlang();
$user_lang = coderLang::get(); //語系

$now_lang_dic = coderLang::getDic(); //語系字典

$langary_jsall = coderLang::getDic_js(); //取得字典 - js使用

$path_parts = pathinfo($_SERVER['PHP_SELF']);
$path = $path_parts['filename'];
if ($path !== 'manage_erp') { //manage_erp.php 不要檢查
	$adminuser = coderAdmin::getUser();
}

include $inc_path . "_configlang.php";

//coderAdmin::loginout_time();
coderAdmin::init(); //left
function showParentSaveNote($authname, $active, $title, $link = "", $bodytxt = "")
{
	global $now_lang_dic;
	if ($bodytxt == '') {
		$bodytxt = $title . $active . coderLang::t("manage5", 1) . '。'; //完成[manage5]
	}
	$str = '<script>parent.closeBox();parent.showNotice("ok","' . $authname . $active . coderLang::t("manage5", 1) . '。",\'' . $bodytxt; //完成[manage5]
	if ($link != "") {
		$str .= '<br><a href="#" onclick="openBox(\\\'' . $link . '\\\')"><i class="icon-check"></i>' . coderLang::t("configmsg4", 1) . $active . coderLang::t("configmsg5", 1) . '</a>'; //您可以按這裡檢視[configmsg4] 資料[configmsg5]
	}
	$str .= '<br>\');</script>';
	return $str;
}

function showParentSaveNote2($authname, $active, $title, $link = "", $callback = "", $bodytxt = "")
{
	global $now_lang_dic;
	if ($bodytxt == '') {
		$bodytxt = $title . $active . coderLang::t("manage5", 1) . '。'; //完成[manage5]
	}

	$str = '<script>parent.closeBox();' . $callback . 'parent.showNotice("ok","' . $authname . $active . coderLang::t("manage5", 1) . '。",\'' . $bodytxt; //完成[manage5]
	if ($link != "") {
		$str .= '<br><a href="#" onclick="openBox(\\\'' . $link . '\\\')"><i class="icon-check"></i>' . coderLang::t("configmsg4", 1) . $active . coderLang::t("configmsg5", 1) . '</a>'; //您可以按這裡檢視[configmsg4] 資料[configmsg5]
	}
	$str .= '<br>\');</script>';
	echo $str;
	die();
	return $str;
}

function showCompleteIcon()
{
	$numargs  = func_num_args();
	if ($numargs < 1) {
		return '';
	}
	$arg_array  = func_get_args();
	$has_value = 0;
	for ($i = 0; $i < $numargs; $i++) {
		if (isset($arg_array[$i]) && trim($arg_array[$i]) != '') {
			$has_value++;
		}
	}
	return $numargs == $has_value ? '' : ' <i class="red icon-exclamation-sign" title="該語系資料輸入不完全"></i> ';
}

function getIconClass($type)
{
	switch ($type) {
		case 'add':
			return 'icon-plus-sign-alt';
			break;
		case 'edit':
			return 'icon-edit-sign';
			break;
		case 'pic':
			return 'icon-picture';
			break;
		case 'q':
			return 'icon-question-sign';
			break;
		default:
			return 'icon-info-sign';
			break;
	}
}
