<?php
$help=new coderFilterHelp();
$obj=array();

$_ispublic = array('type' => 'select', 'name' => coderLang::t("index2",1), 'column' => 'ispublic', 'sql' => true, 'ary' => coderHelp::makeAryKeyToAryElement($incaryYN,'value','name'));
$obj[] = $_ispublic; //啟用 [index2]

$obj[]=array('type'=>'select','name'=>coderLang::t("admin18",1),'column'=>'r_id','table'=>'a','sql'=>true,'ary'=>$rules_array, 'default'=>$rules_name); //權限[admin18]

//$obj[] = array('type' => 'select', 'name' => coderLang::t("admin23",1), 'column' => 'work', 'sql' => false, 'ary' => $rows_qw);//工作中心代碼/名稱 [admin23]

$help->Bind($obj);
