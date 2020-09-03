<?php
//搜尋欄位
$filterhelp=new coderFilterHelp();
$obj=array();
$ary=array();
$ary[]=array('column'=>$colname['lang'],'name'=>coderLang::t("langdata1",1)); //國家代碼 [langdata1]
$ary[]=array('column'=>$colname['name'],'name'=>coderLang::t("langdata2",1)); //名稱 [langdata2]
$ary[]=array('column'=>$colname['admin'],'name'=>coderLang::t("manage1",1)); //管理員 [manage1]
$obj[]=array('type'=>'keyword','name'=>coderLang::t("filter3",1),'sql'=>true,'ary'=>$ary); //關鍵字 [filter3]



$_ispublic = array('type' => 'select', 'name' => coderLang::t("index2",1), 'column' => $colname['ispublic'], 'sql' => true, 'ary' => coderHelp::makeAryKeyToAryElement($incary_yn,'value','name'));
$obj[] = $_ispublic; //啟用 [index2]




$obj[]=array('type'=>'dategroup','sql'=>true,'column'=>'dategroup',
    'ary'=>array(
        array('name'=>coderLang::t("filter2",1),'column'=>$colname['createtime']), //建立日期 [filter2]
        array('name'=>coderLang::t("filter1",1),'column'=>$colname['updatetime']) //最後修改日期 [filter1]
    )
);
$filterhelp->Bind($obj);
