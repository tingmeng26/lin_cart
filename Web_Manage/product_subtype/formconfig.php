<?php
$fhelp = new coderFormHelp();
$fobj = array();

$fobj[$colname["id"]] = array("type" => "hidden", "name" => "ID", "column" => $colname["id"], "sql" => false);

$fobj[$colname["ispublic"]] = array("type" => "checkbox", "name" => coderLang::t("public", 1), "column" => $colname["ispublic"], "value" => "1", 'default' => '1');
$fobj[$colname["tid"]] = array("type" => "select", "name" => coderLang::t("coderadmin3_class1", 1), "column" => $colname["tid"], "validate" => array('required' => 'yes'), 'ary' => $typeList);
$fobj[$colname["nameEn"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '-en', "column" => $colname["nameEn"], "validate" => array('required' => 'yes'));
$fobj[$colname["nameTw"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '-tw', "column" => $colname["nameTw"], "validate" => array('required' => 'yes'));
$fobj[$colname["nameJp"]] = array("type" => "text", "name" => coderLang::t("langdata2", 1) . '-jp', "column" => $colname["nameJp"], "validate" => array('required' => 'yes'));
$fobj[$colname["link"]] = array("type" => "textarea", "name" => coderLang::t("link", 1), "column" => $colname["link"]);
// $fobj[$colname["type"]]=array("type"=>"radio","name"=>"類別","column"=>$colname["type"],'default'=>'1',"mode"=>'yes',"validate"=>array('required'=>'yes'),'ary'=>coderHelp::makeAryKeyToAryElement($incary_course_type,'key','name'));

// $fobj[$colname["title"]]=array("type"=>"text","name"=>"標題","column"=>$colname["title"],"validate"=>array('required'=>'yes','maxlength'=>'20'));

// $fobj[$colname["subtitle"]]=array("type"=>"text","name"=>"副標題","column"=>$colname["subtitle"],"validate"=>array('required'=>'yes','maxlength'=>'30'));

// $fobj[$colname["content"]]=array("type"=>"html","name"=>"內容","column"=>$colname["content"]);

// $fobj[$colname["is_exper"]]=array("type"=>"checkbox","name"=>"是否體驗","column"=>$colname["is_exper"],"value"=>"1",'default'=>'0');

// $fobj[$colname["pic"]] = array("type" => "pic", "name" => "分類縮圖", "column" => $colname["pic"]);

$fhelp->Bind($fobj);
