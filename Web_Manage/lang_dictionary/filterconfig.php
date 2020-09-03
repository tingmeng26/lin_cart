<?php
//搜尋欄位
$filterhelp=new coderFilterHelp();
$obj=array();
$ary=array();

//$ary[]=array('column'=>$colname_ld['lang'],'name'=>'國家代碼');
//$ary[]=array('column'=>$colname_ld['name'],'name'=>'代碼名稱');
$ary[]=array('column'=>$colname['english'],'name'=>coderLang::t("langdictionary1",1)); //英文描述 [langdictionary1]
$ary[]=array('column'=>$colname['key'],'name'=>coderLang::t("langdictionary2",1)); //key [langdictionary2]
$ary[]=array('column'=>$colname['val'],'name'=>coderLang::t("langdictionary3",1)); //翻譯 [langdictionary3]
$ary[]=array('column'=>$colname['admin'],'name'=>coderLang::t("manage1",1)); //管理員 [manage1]
$obj[]=array('type'=>'keyword','name'=>coderLang::t("filter3",1),'sql'=>true,'ary'=>$ary); //關鍵字 [filter3]



//$_ispublic = array('type' => 'select', 'name' => '啟用', 'column' => $colname['ispublic'], 'sql' => true, 'ary' => coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));
//$obj[] = $_ispublic;

$_ld_lang = array('type' => 'select', 'name' => coderLang::t("langdata1",1).'/'.coderLang::t("langdata2",1), 'column' => $colname['ld_lang'], 'sql' => true, 'ary' => class_lang_data::getList_mselect2(),'default'=>$_lang_get.' / '.$_langname_get);
$obj[] = $_ld_lang; //國家代碼 [langdata1]/名稱 [langdata2]

$obj[]=array('type'=>'dategroup','sql'=>true,'column'=>'dategroup',
    'ary'=>array(
        array('name'=>coderLang::t("filter2",1),'column'=>$colname['createtime']), //建立日期 [filter2]
        array('name'=>coderLang::t("filter1",1),'column'=>$colname['updatetime']) //最後修改日期 [filter1]
    )
);
$filterhelp->Bind($obj);
