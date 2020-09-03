<?php
include('_config.php');
include('filterconfig.php');
$success=false;
$count=0;
$msg="未知錯誤,請聯絡系統管理員";

$order_id=post('order_id',1);
$order_key = post('order_key',1);
$prev_id=post('prev_id',1);
$method=post('method',1);//up,down,sortable

$where='';
$sqlstr=$filterhelp->getSQLStr();
$where .= $sqlstr->SQL!=''?' AND '.$sqlstr->SQL:'';

if($order_id>0 && $order_id!=""){
	$db = Database::DB();
	try{
		coderlistorderhelp::dochangeOrder($method,$orderDesc,$table,$orderColumn,$order_id,$order_key,$prev_id,$where);
		$success=true;
	}
	catch(Execption $e){
		$msg=$e->getMessage();
	}
}
else{
	$msg="未設定排序資料";
}

$result['result']=$success;
$result['count']=$count;
$result['msg']=$msg;
echo json_encode($result);

?>