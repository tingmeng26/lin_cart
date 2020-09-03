<?php
include('_config.php');
include_once('formconfig.php');
$errorhandle=new coderErrorHandle();
try{
	$id = (post($colname['id'])!="")?post($colname['id']):0;
	if($id>0){
		$method='edit';
		$active=coderLang::t("edit",1); //編輯
	}else{
		$method='add';
		$active=coderLang::t("add",1); //新增
	}

	$data=$fhelp->getSendData();
	$error=$fhelp->vaild($data);

	if(count($error)>0){
		$msg=implode('\r\n',$error);
		throw new Exception($msg);
	}

	
	$data[$colname['admin']]=$adminuser['username'];
	$data[$colname['updatetime']]=datetime();


    $db = Database::DB();
    $ary = array('lang'=>$data[$colname['ld_lang']],'key'=>$data[$colname['key']]);
    if(!isDateNotExisit('lang',$ary,$id)){
        throw new Exception(coderLang::t("langdictionaryjs1",1)); //此國家代碼Key已被使用，請重新輸入!
    }

	if($method=='edit'){
		coderAdmin::vaild($auth,'edit');
		$db->query_update($table,$data," {$colname['id']}=:id ",array(':id'=>$id));
	}else{
		coderAdmin::vaild($auth,'add');
		//$data[$colname['ind']] = coderListOrderHelp::getMaxInd($table, $colname['ind']);
		$data[$colname['createtime']]=datetime();
		$id=$db->query_insert($table,$data);
	}

    coderLang::clearCache($data[$colname['ld_lang']]); //清除

	echo showParentSaveNote($auth['name'],$active,$page_title,"manage.php?id=".$id);
	coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,$method,$page_title." id:{$id}");


	$db->close();
}
catch(Exception $e){
	$errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
		$errorhandle->showError();
}
