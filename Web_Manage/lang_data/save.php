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

    if(!isDateNotExisit('lang',$data[$colname['lang']],$id)){
        throw new Exception(coderLang::t("langdatajs1",1)); //此國家代碼已被使用,請重新輸入![langdatajs1]
    }

	if($method=='edit'){
		coderAdmin::vaild($auth,'edit');
        $row_count=$db->query_prepare_first("select *,(select count($table_ldic.{$colname_ldic['id']}) from $table_ldic WHERE $table_ldic.{$colname_ldic['ld_lang']} = $table.{$colname['lang']}) as countnum from $table where {$colname['id']}=:id",array(':id'=>$id));
        if($row_count['countnum']){ //有語系字典檔資料 需移除語系代碼修改
            unset($data[$colname['lang']]);
        }

		$db->query_update($table,$data," {$colname['id']}=:id ",array(':id'=>$id));
	}else{
		coderAdmin::vaild($auth,'add');
		$data[$colname['ind']] = coderListOrderHelp::getMaxInd($table, $colname['ind']);
		$data[$colname['createtime']]=datetime();
		$id=$db->query_insert($table,$data);
	}



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
