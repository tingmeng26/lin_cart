<?php
$fhelp = new coderFormHelp();
$fobj = array();
$fobj[$colname['id']] = array('type' => 'hidden', 'name' => 'ID', 'column' => $colname['id'], 'sql' => false);
//$fobj[$colname['ispublic']] = array('type' => 'checkbox', 'name' => '啟用', 'column' => $colname['ispublic'], 'value' => '1', 'default' => '1');

$fobj[$colname['ld_lang']]=array('type' => 'select', 'name' => coderLang::t("langdata1",1).'/'.coderLang::t("langdata2",1), 'column' => $colname['ld_lang'], 'sql' => true, 'ary' => class_lang_data::getList_mselect2(),
    'validate'=>array(
        'required'=>'yes'
    ),'default'=>$_lang_get); //語系代碼 [langdata1]/名稱 [langdata2]

$fobj[$colname['english']] = array('type' => 'text', 'name' => coderLang::t("langdictionary1",1), 'column' => $colname['english'], 'placeholder' => coderLang::t("langdictionary1_1",1),
    'validate' => array('required' => 'yes', 'minlength' => 1, 'maxlength' => 150)); //英文描述 [langdictionary1]  請輸入英文描述 [langdictionary1_1]

$fobj[$colname['key']] = array('type' => 'text', 'name' => coderLang::t("langdictionary2",1), 'column' => $colname['key'], 'placeholder' => coderLang::t("langdictionary2_1",1),
    'validate' => array('required' => 'yes', 'minlength' => 1, 'maxlength' => 50)); //key [langdictionary2]  請輸入key [langdictionary2_1]

$fobj[$colname['val']] = array('type' => 'text', 'name' => coderLang::t("langdictionary3",1), 'column' => $colname['val'], 'placeholder' => coderLang::t("langdictionary3_1",1),
    'validate' => array('required' => 'yes', 'minlength' => 1, 'maxlength' => 255)); //翻譯 [langdictionary3]  請輸入翻譯 [langdictionary3_1]

$fhelp->Bind($fobj);
