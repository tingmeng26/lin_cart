<?php
include('_config.php');
include_once('filterconfig.php');
$errorhandle=new coderErrorHandle();
try{
	coderAdmin::vaild($auth,'view');
	$db = new Database($HS, $ID, $PW, $DB);
	$db->connect();
	$sHelp=new coderSelectHelp($db);
	$sHelp->select="a.* , r.{$colname_rules['name']} ";
	$sHelp->table = $table." a 
					LEFT JOIN $table_rules r ON a.`r_id` = r.{$colname_rules['id']} 
					";
	$sHelp->page_size=get("pagenum");
	$sHelp->page=get("page");
	$sHelp->orderby=get("orderkey",1);
	$sHelp->orderdesc=get("orderdesc",1);

	$sqlstr=$help->getSQLStr();
	$wheresql = $sqlstr->SQL;

    $whereqwork = (get('work')!="")?get('work'):"";
    if($whereqwork !=""){
        $wheresql .= ($wheresql == '' ? '' : ' AND ') . "FIND_IN_SET(".$rows_qw[($whereqwork-1)]['value'].",`work`)";
    }

	$sHelp->where=$wheresql;

	$rows=$sHelp->getList();
	for($i=0;$i<count($rows);$i++){
		//$rows[$i]['ispublic']=$incary_yn_layout[$rows[$i]['ispublic']];
        $rows[$i]['ispublic'] = '<span class="label label-'.$incary_labelstyle[$rows[$i]['ispublic']].'">'.$incaryYN[$rows[$i]['ispublic']].'</span>';
        $rows[$i]['isadmin'] = '<span class="label label-'.$incary_labelstyle[$rows[$i]['isadmin']].'">'.$incaryYN[$rows[$i]['isadmin']].'</span>';
		$rows[$i]['pic']='s'.$rows[$i]['pic'];

        /*$work_allary = array();
        $work_all = "";
        if($rows[$i]['work'])
        {
            $work_allary = explode(",",$rows[$i]['work']);

            foreach($work_allary as $val)
            {
                $work_all .= ($work_all != ""?" , ":'').class_qcontrol_work::getName_mselect(2,$val);
            }

            $rows[$i]['work'] = $work_all;
        }*/
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