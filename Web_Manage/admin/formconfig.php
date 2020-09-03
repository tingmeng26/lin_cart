<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj['id']=array('type'=>'hidden','name'=>'ID','column'=>'id','sql'=>false);
$fobj['ispublic']=array('type'=>'checkbox', 'name' => coderLang::t("index2",1), 'column' => 'ispublic', 'value' => '1', 'default' => '1'); //啟用[index2]
$fobj['isadmin']=array('type'=>'checkbox', 'name' => coderLang::t("admin22",1), 'column' => 'isadmin', 'value' => '1', 'default' => '1'); //管理員帳號[admin22]


$fobj['username']=array('type'=>'text','name'=>coderLang::t("account",1),'column'=>'username','autocomplete'=>'off','placeholder'=>coderLang::t("admin12",1),'help'=>coderLang::t("adminhelp1",1),'validate'=>array('required'=>'yes','maxlength'=>'20','minlength'=>'3'),'icon'=>'<i class="icon-user"></i>'); //帳號[account] 請輸入管理員帳號[admin12] 此帳密為登入系統之帳號,不能重覆。[adminhelp1]
$fobj['password']=array('type'=>'password','name'=>coderLang::t("admin13",1),'column'=>'password','autocomplete'=>'off','placeholder'=>coderLang::t("admin13_1",1),'help'=>coderLang::t("adminhelp2",1),'validate'=>array('maxlength'=>'30','minlength'=>'6'),'icon'=>'<i class="icon-key"></i>'); //密碼[admin13] 請輸入管理員密碼[admin13_1] 登入系統之密碼。[adminhelp2]
$fobj['repassword']=array('type'=>'password','name'=>coderLang::t("admin14",1),'column'=>'password','autocomplete'=>'off','placeholder'=>coderLang::t("admin14_1",1),'help'=>coderLang::t("adminhelp3",1),'sql'=>false,'icon'=>'<i class="icon-check-sign"></i>'); //密碼確認[admin14] 請重新輸入管理員密碼[admin14_1] 為了確認密碼是否確,麻煩您再輸入一次。[adminhelp3]
$fobj['name']=array('type'=>'text','name'=>coderLang::t("admin15",1),'column'=>'name','placeholder'=>coderLang::t("admin15_1",1),'validate'=>array('required'=>'yes')); //名字[admin15] 請輸入名字[admin15_1]
$fobj['email']=array('type'=>'text','name'=>coderLang::t("admin16",1),'column'=>'email','placeholder'=>coderLang::t("admin16_1",1),'validate'=>array('email'=>'yes')); //Email[admin16] 請輸入Email[admin16_1]
//'required'=>'yes',
$fobj['email_backup']=array('type'=>'text','name'=>coderLang::t("admin17",1),'column'=>'email_backup','placeholder'=>coderLang::t("admin17_1",1),'validate'=>array('email'=>'yes')); //備用Email[admin17] 請輸入Email[admin17_1]

$fobj['r_id'] = array(
    'type' => 'select', 'name' => coderLang::t("admin18",1), 'column' => 'r_id', 'ary' => $rules_array, 'validate' => array(
        'required' => 'yes'
    )
); //權限[admin18]

/*$fobj['loginout_time'] = array(
    'type' => 'select', 'name' => '自動登出時間', 'column' => 'loginout_time', 'ary' => $ary_loginouttime, 'validate' => array(
        'required' => 'yes'
    )
);*/


/*$fobj['company'] = array(
    'type' => 'select', 'name' => coderLang::t("admin8",1), 'column' => 'company', 'ary' => class_qcontrol_company::getList_mselect(), 'validate' => array(
        //'required' => 'yes'
    ),'sql'=>false
); //公司別 [admin8]

$fobj['factory'] = array(
    'type' => 'select', 'name' => coderLang::t("admin9",1), 'column' => 'factory', 'ary' => class_qcontrol_factory::getList_mselect(), 'validate' => array(
        //'required' => 'yes'
    )
); //廠別 [admin9]*/

/*$fobj['work'] = array(
    'type' => 'selectmutile', 'name' => coderLang::t("admin23",1), 'column' => 'work', 'ary' => class_qcontrol_work::getList_mselect2(), 'validate' => array(
        //'required' => 'yes'
    ),'mode'=>'no',"equal"=>"="
); //工作中心代碼/名稱 [admin23]*/





$fobj['pic']=array('type'=>'pic','name'=>coderLang::t("admin19",1),'column'=>'pic'); //圖片[admin19]
$fobj['info']=array('type'=>'textarea','name'=>coderLang::t("admin20",1),'column'=>'info','placeholder'=>coderLang::t("admin20_1",1)); //個人資料[admin20] 請輸入個人資料[admin20_1]
$fhelp->Bind($fobj);

$fhelp_excel=new coderFormHelp();
$fobj_excel=array();
$fobj_excel['file']=array('type'=>'text','name'=>coderLang::t("admin21",1),'column'=>'file','sql'=>false, 'validate' => array(
        'required' => 'yes'
    )); //Excel檔案[admin21]
$fhelp_excel->Bind($fobj_excel);
