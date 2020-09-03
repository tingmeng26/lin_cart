<?php


$fhelp=new coderFormHelp();
$fobj=array();
$fobj['file']=array('type'=>'text','name'=>coderLang::t("admin21",1),'column'=>'file','sql'=>false, 'validate' => array(
        'required' => 'yes'
    )); //Excel檔案[admin21]

$fhelp->Bind($fobj);
