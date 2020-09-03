<?php

$inc_path = "../inc/";
include_once($inc_path . "_config.php");

$language = post('language', 1);
$language = $language == 'tw' ? 'zh-cht' : $language;
$db = Database::DB();
coderLang::set($language);

$result = [
  'result' => true
];
echo json_encode($result);
