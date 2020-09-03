<?php
//搜尋欄位
$help = new coderFilterHelp();
$obj = array();
$ary = array();
$ary[]=array('column'=>$colname['admin'],'name'=>coderLang::t("manage1",1)); //管理員 [manage1]
$ary[]=array('column'=>$colname['name'],'name'=>coderLang::t("langdata2",1)); //名稱 [langdata2]
$obj[] = array('type' => 'keyword', 'name' => coderLang::t( "filter3", 1), 'sql' => true, 'ary' => $ary); //關鍵字 [filter3]

$obj[] = array('type' => 'select', 'name' => coderLang::t( "configmsg3", 1), 'column' => $colname['superadmin'], 'sql' => true,
    'ary' => coderHelp::makeAryKeyToAryElement($incary_yn, 'value', 'name')
); //超級管理員[configmsg3]

$obj[] = array('type' => 'dategroup', 'sql' => true, 'column' => 'dategroup',
    'ary' => array(
        array('name' => coderLang::t( "filter2", 1), 'column' => $colname['createtime']), //建立日期 [filter2]
        array('name' => coderLang::t( "filter1", 1), 'column' => $colname['updatetime']) //最後修改日期 [filter1]
    )
);

$help->Bind($obj);
