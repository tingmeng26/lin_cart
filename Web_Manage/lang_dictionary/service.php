<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle=new coderErrorHandle();
try{
	coderAdmin::vaild($auth,'view');
	$db = Database::DB();
	$sHelp=new coderSelectHelp($db);
	$sHelp->select="$table.*,$table_ld.{$colname_ld['lang']},$table_ld.{$colname_ld['name']}";
	$sHelp->table = $table."
	                LEFT JOIN $table_ld on $table_ld.`{$colname_ld['lang']}`=$table.`{$colname['ld_lang']}`";
	$sHelp->page_size=get("pagenum");
	$sHelp->page=get("page");
	$sHelp->orderby=get("orderkey",1);
	$sHelp->orderdesc=get("orderdesc",1);

	$sqlstr=$filterhelp->getSQLStr();
	$wheresql = $sqlstr->SQL;
	$sHelp->where=$wheresql;

	$rows=$sHelp->getList();

	for($i=0;$i<count($rows);$i++){
		//$rows[$i][$colname['ispublic']]=$incary_yn_layout[$rows[$i][$colname['ispublic']]];
		
		
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