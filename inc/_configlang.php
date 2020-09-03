<?PHP
/*资料用ARY*/
//檢驗項目型態
$incary_testitems_type = array(1 =>coderLang::t("incconfig1",1), 2=>coderLang::t("incconfig2",1), 3=>'Y/N'); //數值[incconfig1] 字串[incconfig2]

$incary_anti_testitems_type = array_flip($incary_testitems_type);

$incary_valtype = array(1 =>coderLang::t("incconfig3",1), 2=>coderLang::t("incconfig4",1), 3=>coderLang::t("incconfig5",1), 4=>coderLang::t("incconfig6",1)); //單公差[incconfig3] 雙公差[incconfig4] 範圍[incconfig5] 文字[incconfig6]

$incary_anti_valtype = array_flip($incary_valtype);
$incaryYN3=array(0=>coderLang::t("incconfig7",1),1=>'N',2=>'Y'); //未判定[incconfig7]
