<?php
$filterhelp=new coderFilterHelp();

$obj[]=array('type'=>'keyword','name'=>coderLang::t("filter3", 1),'sql'=>true,
	'ary'=>array(
		// array('column'=>$colname['title'],'name'=>'標題'),
        array('column'=>'pt_name_en,pt_name_tw,pt_name_jp','name'=>coderLang::t("coderadmin3_class1",1)),
        // array('column'=>$colname['admin'],'name'=>coderLang::t("manage1", 1))
	)
);

$obj[]=array('type'=>'select','name'=>coderLang::t("public", 1),'column'=>$colname['ispublic'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));

// $obj[]=array('type'=>'select','name'=>'可否體驗','column'=>$colname['is_exper'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));

// $obj[]=array('type'=>'select','name'=>'類別','column'=>$colname['type'],'sql'=>true,'ary'=>coderHelp::makeAryKeyToAryElement($incary_course_type,'value','name'));

$obj[]=array('type'=>'dategroup','column'=>'dategroup','sql'=>true,'ary'=>array(
    array('column'=>$colname['updatetime'],'name'=>coderLang::t("index1", 1)),
    array('column'=>$colname['createtime'],'name'=>coderLang::t("filter2", 1))
));

$filterhelp->Bind($obj);
