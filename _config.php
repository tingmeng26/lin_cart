<?php
$inc_path = "inc/";
include_once($inc_path . "_config.php");
include_once($inc_path . "_web_func.php");


$cache_path =   dirname(__FILE__) . $slash . $cache_path_web;
include_once($inc_path . "_cache.php");


$db = Database::DB();
$pagename = request_basename();
if (get('lang', 1) != '') {
  coderLang::set(get('lang', 1));
}
$user_lang = coderLang::get(); //語系
$now_lang_dic = coderLang::getDic(); //語系字典
$language = $user_lang == 'zh-cht' ? 'tw' : $user_lang;
$lpath = 'template/' . $user_lang . '/';


