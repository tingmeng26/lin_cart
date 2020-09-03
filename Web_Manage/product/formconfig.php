<?php
$fhelp = new coderFormHelp();
$fobj = array();

$fobj[$colname["id"]] = array("type" => "hidden", "name" => "ID", "column" => $colname["id"], "sql" => false);
$fobj[$colname["tid"]] = array("type" => "select", "name" => coderLang::t("coderadmin3_class1", 1), "column" => $colname["tid"], "validate" => array('required' => 'yes', 'onchange' => 'getSubtype(this.value)'), 'ary' => $typeList);
$fobj[$colname["sid"]] = array("type" => "select", "name" => coderLang::t("coderadmin3_class2", 1), "column" => $colname["sid"], "validate" => array('required' => 'yes'));
$fobj[$colname["ispublic"]] = array("type" => "checkbox", "name" => coderLang::t("public", 1), "column" => $colname["ispublic"], "value" => "1", 'default' => '1');
$fobj[$colname["sno"]] = array("type" => "text", "name" => coderLang::t("sno", 1), "column" => $colname["sno"], "validate" => array('required' => 'false'));




$fobj[$colname["nameEn"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '(英)', "column" => $colname["nameEn"], "validate" => array('required' => 'false'));
$fobj[$colname["nameTw"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '(中)', "column" => $colname["nameTw"], "validate" => array('required' => 'false'));
$fobj[$colname["nameJp"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '(日)', "column" => $colname["nameJp"], "validate" => array('required' => 'false'));

$fobj[$colname["descriptionEn"]] = array("type" => "textarea", "name" => coderLang::t("description", 1) . '(英)', "column" => $colname["descriptionEn"]);
$fobj[$colname["descriptionTw"]] = array("type" => "textarea", "name" => coderLang::t("description", 1) . '(中)', "column" => $colname["descriptionTw"]);
$fobj[$colname["descriptionJp"]] = array("type" => "textarea", "name" => coderLang::t("description", 1) . '(日)', "column" => $colname["descriptionJp"]);

// $fobj[$colname["pics"]]=array("type"=>"pic","name"=>"產品圖片","column"=>$colname["pics"], "validate" => array('required' => 'yes'));
$fobj[$colname["pic"]] = array("type" => "pic", "name" => coderLang::t("indexPic", 1).' 260*260', "column" => $colname["pic"], "validate" => array('required' => 'yes'));
$fobj[$colname["tag"]] = array("type" => "select", "name" => coderLang::t("tag", 1), "column" => $colname["tag"], "validate" => array('required' => 'yes'), 'ary' => coderHelp::makeAryKeyToAryElement($PRODUCT_TAG, 'value', 'name'),'default'=>2);


$fobj[$colname["sizeEn"]] = array("type" => "textarea", "name" => coderLang::t("size", 1) . '(英)', "column" => $colname["sizeEn"]);
$fobj[$colname["sizeTw"]] = array("type" => "textarea", "name" => coderLang::t("size", 1) . '(中)', "column" => $colname["sizeTw"]);
$fobj[$colname["sizeJp"]] = array("type" => "textarea", "name" => coderLang::t("size", 1) . '(日)', "column" => $colname["sizeJp"]);

$fobj[$colname["materialEn"]] = array("type" => "textarea", "name" => coderLang::t("material", 1) . '(英)', "column" => $colname["materialEn"]);
$fobj[$colname["materialTw"]] = array("type" => "textarea", "name" => coderLang::t("material", 1) . '(中)', "column" => $colname["materialTw"]);
$fobj[$colname["materialJp"]] = array("type" => "textarea", "name" =>  coderLang::t("material", 1) . '(日)', "column" => $colname["materialJp"]);

$fobj[$colname["heavyEn"]] = array("type" => "textarea", "name" =>  coderLang::t("heavy", 1) . '(英)', "column" => $colname["heavyEn"]);
$fobj[$colname["heavyTw"]] = array("type" => "textarea", "name" => coderLang::t("heavy", 1) . '(中)', "column" => $colname["heavyTw"]);
$fobj[$colname["heavyJp"]] = array("type" => "textarea", "name" => coderLang::t("heavy", 1) . '(日)', "column" => $colname["heavyJp"]);

$fobj[$colname["colorEn"]] = array("type" => "textarea", "name" => coderLang::t("color", 1) . '(英)', "column" => $colname["colorEn"]);
$fobj[$colname["colorTw"]] = array("type" => "textarea", "name" => coderLang::t("color", 1) . '(中)', "column" => $colname["colorTw"]);
$fobj[$colname["colorJp"]] = array("type" => "textarea", "name" => coderLang::t("color", 1) . '(日)', "column" => $colname["colorJp"]);

$fobj[$colname["capacityEn"]] = array("type" => "textarea", "name" => coderLang::t("capacity", 1) . '(英)', "column" => $colname["capacityEn"]);
$fobj[$colname["capacityTw"]] = array("type" => "textarea", "name" => coderLang::t("capacity", 1) . '(中)', "column" => $colname["capacityTw"]);
$fobj[$colname["capacityJp"]] = array("type" => "textarea", "name" => coderLang::t("capacity", 1) . '(日)', "column" => $colname["capacityJp"]);

$fobj[$colname["commentEn"]] = array("type" => "textarea", "name" => coderLang::t("comment", 1) . '(英)', "column" => $colname["commentEn"]);
$fobj[$colname["commentTw"]] = array("type" => "textarea", "name" => coderLang::t("comment", 1) . '(中)', "column" => $colname["commentTw"]);
$fobj[$colname["commentJp"]] = array("type" => "textarea", "name" => coderLang::t("comment", 1) . '(日)', "column" => $colname["commentJp"]);

$fobj[$colname["statusEn"]] = array("type" => "textarea", "name" => coderLang::t("status", 1) . '(英)', "column" => $colname["statusEn"]);
$fobj[$colname["statusTw"]] = array("type" => "textarea", "name" => coderLang::t("status", 1) . '(中)', "column" => $colname["statusTw"]);
$fobj[$colname["statusJp"]] = array("type" => "textarea", "name" => coderLang::t("status", 1) . '(日)', "column" => $colname["statusJp"]);

$fobj[$colname["link"]] = array("type" => "text", "name" => coderLang::t("link", 1), "column" => $colname["link"]);
$fobj[$colname["linkEn"]] = array("type" => "text", "name" => coderLang::t("link", 1) . '(英)', "column" => $colname["linkEn"],'validate'=>['url'=>'yes']);
$fobj[$colname["linkTw"]] = array("type" => "text", "name" => coderLang::t("link", 1) . '(中)', "column" => $colname["linkTw"],'validate'=>['url'=>'yes']);
$fobj[$colname["linkJp"]] = array("type" => "text", "name" => coderLang::t("link", 1) . '(日)', "column" => $colname["linkJp"],'validate'=>['url'=>'yes']);


$fobj[$colname["pic1"]] = array("type" => "pic", "name" =>  coderLang::t("pic", 1).'1 540*315', "column" => $colname["pic1"]);
$fobj[$colname["textEn1"]] = array("type" => "text", "name" =>  coderLang::t("productIndroduction", 1) . '1(英)', "column" => $colname["textEn1"]);
$fobj[$colname["textTw1"]] = array("type" => "text", "name" =>  coderLang::t("productIndroduction", 1) . '1(中)', "column" => $colname["textTw1"]);
$fobj[$colname["textJp1"]] = array("type" => "text", "name" =>  coderLang::t("productIndroduction", 1) . '1(日)', "column" => $colname["textJp1"]);

$fobj[$colname["pic2"]] = array("type" => "pic", "name" =>  coderLang::t("pic", 1).'2 540*315', "column" => $colname["pic2"]);
$fobj[$colname["textEn2"]] = array("type" => "text", "name" =>  coderLang::t("productIndroduction", 1) . '2(英)', "column" => $colname["textEn2"]);
$fobj[$colname["textTw2"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '2(中)', "column" => $colname["textTw2"]);
$fobj[$colname["textJp2"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '2(日)', "column" => $colname["textJp2"]);

$fobj[$colname["pic3"]] = array("type" => "pic", "name" =>  coderLang::t("pic", 1).'3 540*315', "column" => $colname["pic3"]);
$fobj[$colname["textEn3"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '3(英)', "column" => $colname["textEn3"]);
$fobj[$colname["textTw3"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '3(中)', "column" => $colname["textTw3"]);
$fobj[$colname["textJp3"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '3(中)', "column" => $colname["textJp3"]);

$fobj[$colname["pic4"]] = array("type" => "text", "name" =>  coderLang::t("pic", 1).'4 540*315', "column" => $colname["pic4"]);
$fobj[$colname["textEn4"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '4(英)', "column" => $colname["textEn4"]);
$fobj[$colname["textTw4"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '4(中)', "column" => $colname["textTw4"]);
$fobj[$colname["textJp4"]] = array("type" => "text", "name" => coderLang::t("productIndroduction", 1) . '4(中)', "column" => $colname["textJp4"]);


$fobj[$colname["contentEn"]] = array("type" => "html", "name" => coderLang::t("productContent", 1) . '(英)', "column" => $colname["contentEn"]);
$fobj[$colname["contentTw"]] = array("type" => "html", "name" => coderLang::t("productContent", 1) . '(中)', "column" => $colname["contentTw"]);
$fobj[$colname["contentJp"]] = array("type" => "html", "name" =>  coderLang::t("productContent", 1) . '(中)', "column" => $colname["contentJp"]);

$fobj[$colname['pics']] = array('type' => 'hidden', 'name' => coderLang::t('pics',1), 'column' => $colname['pics'], 'sql' => true );
$fobj[$colname["sizePic"]] = array("type" => "hidden", "name" => coderLang::t('sizePic',1), "column" => $colname["sizePic"], 'sql' => true);
$fhelp->Bind($fobj);
