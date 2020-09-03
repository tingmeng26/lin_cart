<?php
include('_config.php');
$errorhandle=new coderErrorHandle();
try{
	coderAdmin::vaild($auth,'del');
	$success=false;
	$count=0;
	$msg=coderLang::t("delmsg1",1); //未知錯誤,請聯絡系統管理員

	$id=request_ary('id',0);

	if(count($id)>0){
		$db = Database::DB();
		$idlist="'".implode("','",$id)."'";
        $rows_del = $db -> fetch_all_array("select * from $table where {$colname['id']} in($idlist) group by {$colname['ld_lang']}");
        foreach ($rows_del as $row_del) {
            coderLang::clearCache($row_del[$colname['ld_lang']]); //清除
        }

		$count=$db->exec("delete from $table where {$colname['id']} in($idlist)");

		if($count>0){
			coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,'del',$count.coderLang::t("delmsg2",1).'('.$idlist.')'); //筆資料
			$success=true;
		}
		else{
			throw new Exception(coderLang::t("delmsg3",1)); //查無刪除資料
		}
		$db->close();
	}
	else{
		$msg=coderLang::t("delmsg4",1); //未選取刪除資料
	}

	$result['result']=$success;
	$result['count']=$count;
	$result['msg']=hc($errorhandle->getErrorMessage());
	echo json_encode($result);
}
catch(Exception $e){
	$errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
	$result['result']=false;
    $result['msg']=$errorhandle->getErrorMessage();
	echo json_encode($result);
}
