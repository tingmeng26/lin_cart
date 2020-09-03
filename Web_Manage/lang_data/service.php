<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle=new coderErrorHandle();
try{
	coderAdmin::vaild($auth,'view');
	$db = Database::DB();
	$sHelp=new coderSelectHelp($db);
	$sHelp->select="*,(select count($table_ldic.{$colname_ldic['id']}) from $table_ldic WHERE $table_ldic.{$colname_ldic['ld_lang']} = $table.{$colname['lang']}) as countnum";
	$sHelp->table = $table;
	$sHelp->page_size=get("pagenum");
	$sHelp->page=get("page");
	$sHelp->orderby=get("orderkey",1);
	$sHelp->orderdesc=get("orderdesc",1);

	$sqlstr=$filterhelp->getSQLStr();
	$wheresql = $sqlstr->SQL;
	$sHelp->where=$wheresql;

	$rows=$sHelp->getList();

	for($i=0;$i<count($rows);$i++){
		$rows[$i][$colname['ispublic']]=$incary_yn_layout[$rows[$i][$colname['ispublic']]];
		
		
	}

	$result['result']=true;
	$result['data']=$rows;
	$result['page']=$sHelp->page_info;
	echo json_encode($result);
}
catch(Exception $e){
	$errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
	$result['result']=false;
    $result['data']=$errorhandle->getErrorMessage();
	echo json_encode($result);
}
?>