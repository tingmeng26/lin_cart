<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle=new coderErrorHandle();
try{
	coderAdmin::vaild($auth,'view');
	$db = new Database($HS, $ID, $PW, $DB);
	$db->connect();
	$sHelp=new coderSelectHelp($db);
	$sHelp->select="*";
	$sHelp->table=$table;
	$sHelp->page_size=get("pagenum");
	$sHelp->page=get("page");
	$sHelp->orderby=get("orderkey",1);
	$sHelp->orderdesc=get("orderdesc",1);
	
	$sqlstr=$help->getSQLStr();
	$wheresql = $sqlstr->SQL;
	$sHelp->where=$wheresql;

	$rows=$sHelp->getList();
	 for($i=0;$i<count($rows);$i++){
	 	$rows[$i]['auth']=getAuthStr($rows[$i][$colname['id']],$rows[$i][$colname['superadmin']]);

	 	$sql_ad = "SELECT count(`r_id`) as rcount FROM $table_admin WHERE `r_id` = ".$rows[$i][$colname['id']];
        $rows_ad = $db ->query_prepare_first($sql_ad);
        $rows[$i]['num']=$rows_ad['rcount'];

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