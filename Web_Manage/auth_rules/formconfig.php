<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname['id']]=array('type'=>'hidden','name'=>'ID','column'=>$colname['id'],'sql'=>false);
$fobj[$colname['name']]=array('type'=>'text','name'=>coderLang::t("langdata2",1),'column'=>$colname['name'],'placeholder'=>coderLang::t("langdata2_1",1),'validate'=>array('required'=>'yes')); //名稱 [langdata2]  請輸入名稱 [langdata2_1]
$fobj[$colname['superadmin']]=array('type'=>'checkbox','name'=>coderLang::t("configmsg3",1),'column'=>$colname['superadmin'],'value'=>'1','default'=>'0','help'=>coderLang::t("help1",1)); //超級管理員[configmsg3]  超級管理員具有最高權限,可以使用所有功能[help1]
$fobj[$colname['depiction']]=array('type'=>'textarea','name'=>coderLang::t("authrules1",1),'column'=>$colname['depiction'],'placeholder'=>coderLang::t("authrules1_1",1)); //敘述[authrules1]  請輸入敘述[authrules1_1]


// if(coderAdmin::isAuth('admin'))
// {
//  $fobj['auth']=array('type'=>'checkgroup','name'=>'使用權限','column'=>'auth','ary'=>coderAdmin::getAuthAry());
// }
$fhelp->Bind($fobj);
