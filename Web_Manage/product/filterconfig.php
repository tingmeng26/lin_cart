<?php
$filterhelp=new coderFilterHelp();

$obj[]=array('type'=>'keyword','name'=>coderLang::t('filter3',1),'sql'=>true,
	'ary'=>array(
		// array('column'=>$colname['title'],'name'=>'標題'),
        //array('column'=>$colname['subtitle'],'name'=>'副標題'),
        array('column'=>'product_name_en,product_name_tw,product_name_jp','name'=>coderLang::t("productName",1)),
        array('column'=>'product_sno','name'=>coderLang::t("sno",1)),
        // array('column'=>$colname['admin'],'name'=>coderLang::t("manage1", 1))
	)
);

$obj[]=array('type'=>'select','name'=>coderLang::t("public", 1),'column'=>$colname['ispublic'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));
$obj[]=array('type'=>'select','name'=>coderLang::t("type", 1),'column'=>$colname['tid'],'sql'=>false,'ary'=>[]);
$obj[]=array('type'=>'select','name'=>coderLang::t("subtype", 1),'column'=>$colname['sid'],'sql'=>false,'ary'=>[]);

// $obj[]=array('type'=>'select','name'=>'可否體驗','column'=>$colname['is_exper'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));

// $obj[]=array('type'=>'select','name'=>'類別','column'=>$colname['type'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_course_type,'value','name'));

$obj[]=array('type'=>'dategroup','column'=>'dategroup','sql'=>true,'ary'=>array(
    array('column'=>$colname['updatetime'],'name'=>coderLang::t("index1", 1)),
    array('column'=>$colname['createtime'],'name'=>coderLang::t("filter2", 1))
));

$filterhelp->Bind($obj);
