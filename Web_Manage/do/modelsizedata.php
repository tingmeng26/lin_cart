<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";
$list_name = "";


$qm_id = (post("qm_id")!="")?post("qm_id"):0; //型號/產品編號ID
if($qm_id > 0){

    $row = class_qcontrol_model::getList_size($qm_id); //找size&name
    if($row) {
        $list .= $row['size'];
        $list_name .= $row['name'].'-'.$row['size'];
    }


}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list'] = $list;
$data['list_name'] = $list_name;
echo json_encode($data);
?>