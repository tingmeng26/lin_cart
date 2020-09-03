<?php
$fhelp=new coderFormHelp();
$fobj=array();

$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["type"]]=array("type"=>"text","name"=>coderLang::t("type", 1),"column"=>$colname["type"], "sql"=>false,"validate" => array('disabled' => true));
$fobj['product']=array("type"=>"text","name"=>coderlang::t('productName',1),"column"=>'product', "validate" => array('required' => 'yes'),"sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["name"]]=array("type"=>"text","name"=>coderLang::t("langdata2", 1),"column"=>$colname["name"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["company"]]=array("type"=>"text","name"=>coderLang::t("company", 1),"column"=>$colname["company"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["address"]]=array("type"=>"text","name"=>coderLang::t("langdata8", 1),"column"=>$colname["address"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["phone"]]=array("type"=>"text","name"=>coderLang::t("langdata9", 1),"column"=>$colname["phone"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["email"]]=array("type"=>"text","name"=>"email","column"=>$colname["email"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["content"]]=array("type"=>"textarea","name"=>coderLang::t('content',1),"column"=>$colname["content"], "sql"=>false,"validate" => array('disabled' => true));
$fobj[$colname["reply"]]=array("type"=>"checkbox","name"=>coderLang::t('reply',1),"column"=>$colname["reply"],"value"=>"1",'default'=>'0', "validate" => array('required' => 'yes'));
$fobj[$colname["notice"]]=array("type"=>"textarea","name"=>coderLang::t('notice',1),"column"=>$colname["notice"], "sql"=>true,"validate" => array('required' => true));


// $fobj[$colname["type"]]=array("type"=>"radio","name"=>"類別","column"=>$colname["type"],'default'=>'1',"mode"=>'yes',"validate"=>array('required'=>'yes'),'ary'=>coderHelp::makeAryKeyToAryElement($incary_course_type,'key','name'));

// $fobj[$colname["title"]]=array("type"=>"text","name"=>"標題","column"=>$colname["title"],"validate"=>array('required'=>'yes','maxlength'=>'20'));

// $fobj[$colname["subtitle"]]=array("type"=>"text","name"=>"副標題","column"=>$colname["subtitle"],"validate"=>array('required'=>'yes','maxlength'=>'30'));

// $fobj[$colname["content"]]=array("type"=>"html","name"=>"內容","column"=>$colname["content"]);

// $fobj[$colname["is_exper"]]=array("type"=>"checkbox","name"=>"是否體驗","column"=>$colname["is_exper"],"value"=>"1",'default'=>'0');

// $fobj[$colname["pic"]]=array("type"=>"pic","name"=>"分類縮圖","column"=>$colname["pic"], "validate" => array('required' => 'yes'));

$fhelp->Bind($fobj);
