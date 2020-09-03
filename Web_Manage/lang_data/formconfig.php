<?php
$fhelp = new coderFormHelp();
$fobj = array();
$fobj[$colname['id']] = array('type' => 'hidden', 'name' => 'ID', 'column' => $colname['id'], 'sql' => false);
$fobj[$colname['ispublic']] = array('type' => 'checkbox', 'name' => coderLang::t("index2",1), 'column' => $colname['ispublic'], 'value' => '1', 'default' => '1'); //啟用 [index2]


$fobj[$colname['remark']] = array(
    'type' => 'textarea', 'name' => coderLang::t("langdata4",1), 'column' => $colname['remark'], 'placeholder' => coderLang::t("langdata4_1",1), 'validate' => array()
); //備註 [langdata4]  請輸入備註 [langdata4_1]


$fobj[$colname['lang']] = array('type' => 'text', 'name' => coderLang::t("langdata1",1), 'column' => $colname['lang'], 'placeholder' => coderLang::t("langdata1_1",1),
    'validate' => array('required' => 'yes', 'minlength' => 1, 'maxlength' => 30)); //國家代碼 [langdata1]  請輸入國家代碼 [langdata1_1]

$fobj[$colname['name']] = array('type' => 'text', 'name' => coderLang::t("langdata2",1), 'column' => $colname['name'], 'placeholder' => coderLang::t("langdata2_1",1),
    'validate' => array('required' => 'yes', 'minlength' => 1, 'maxlength' => 30)); //名稱 [langdata2]  請輸入名稱 [langdata2_1]

$fhelp->Bind($fobj);
