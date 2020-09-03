<?php
include('_config.php');
include_once('formconfig.php');
$errorhandle=new coderErrorHandle();
try{
	$update_auth=false;
	if(post('id')>0){
		$method='edit';
        $active=coderLang::t("edit",1); //編輯
	}else{
		$method='add';
        $active=coderLang::t("add",1); //新增
		$fhelp->setAttr('password','validate',array('required'=>'yes','maxlength'=>'20','minlength'=>6));
	}

	$data=$fhelp->getSendData();
	$error=$fhelp->vaild($data);

	if(count($error)>0){
		$msg=implode('\r\n',$error);
		throw new Exception($msg);
	}
	
	
	
	$data['admin']=$adminuser['username'];
	$data['updatetime']=datetime();
	coderFormHelp::moveCopyPic($data['pic'],$admin_path_temp,$file_path,'s');
	
	//$data['system_notice'] = implode(',',request_ary("system_notice"));
	$data['mail_notice'] = implode(',',request_ary("mail_notice"));

    /*$data['company'] = substr(post('company',1),6);
    $data['company'] = ($data['company'])?$data['company']:null;
    $data['factory'] = ($data['factory'])?$data['factory']:null;*/
    //$data['work'] = ($data['work'])?$data['work']:null;
    /*if($data['work'] !=""){
        $ary_work_in= class_qcontrol_work::getList_in($data['work']);
        $ary_company = array(); $ary_factory = array(); $ary_work=array();
        foreach ($ary_work_in as $_val){
            if($_val['qc_id']>0 && $_val['qf_id']>0 && $_val['value']>0) {
                $ary_company[] = $_val['qc_id'];
                $ary_factory[] = $_val['qf_id'];
                $ary_work[] = $_val['value'];
            }else{
                continue;
            }
        }

        $data['company'] = implode(',',array_unique($ary_company));
        $data['factory'] = implode(',',array_unique($ary_factory));
        $data['work'] = implode(',',$ary_work);
    }*/


    $db = new Database($HS, $ID, $PW, $DB);
	$db->connect();
	if($method=='edit'){
		$s_username = $adminuser['username'];
		//非修改自己的資料需要驗證權限
		if($s_username!=$data['username']){
			coderAdmin::vaild($auth,'edit');
		}

		if(!coderAdmin::isAuth($auth)){
            unset($data['isadmin']);
            unset($data['ispublic']);
        }

		unset($data['username']);
		if($data['password']==''){
			unset($data['password']);
		}else{
			$data['password']=coderAdmin::pwHash($data['password']);
		}

		$username=post('username',1);

		$id=$db->query_update($table,$data," username=:username ",array(':username'=>$username));

        /*$ary_add = array();
        $ary_add['company_login'] = $adminuser['company_login'];
        $ary_add['factory_login'] = $adminuser['factory_login'];
        $ary_add['work_login'] = $adminuser['work_login'];

		if($s_username===$username){coderAdmin::change_admin_data($username,$ary_add);}*/
	}else{
		coderAdmin::vaild($auth,'add');
		$username=$data['username'];
		$data['mid'] = getmid();
		$data['password']=coderAdmin::pwHash($data['password']);
		if($db->isExisit($table,'username',$username)){
			throw new Exception(coderLang::t("account",1).$username.coderLang::t("admin11",1)); //帳號[account] 重覆,請重新輸入一組帳號 [admin11]
		}
		$id=$db->query_insert($table,$data);
	}

	echo showParentSaveNote($auth['name'],$active,$username,"manage.php?username=".$username);
	coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,$method,$username);
	$db->close();

}catch(Exception $e){
	$errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
	$errorhandle->showError();
}
