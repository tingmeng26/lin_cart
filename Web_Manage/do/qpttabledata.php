<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";
$rows_qpt = array();

$qw_id = (post("qw_id")!="")?post("qw_id"):0; //工作中心ID
if($qw_id > 0){
    $rows_qpt = class_qcontrol_producttest::getList_all_qwid($qw_id);

}
$list .= class_check_productdetails::getList_table($rows_qpt);



$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list'] = $list;
echo json_encode($data);
?>