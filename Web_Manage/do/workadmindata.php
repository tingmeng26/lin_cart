<?php
include('../../_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";


$username = (post("user",1)!="")?post("user",1):""; //帳號
$row_admin = class_admin::getList_one($username);
if($row_admin != ""){

    $rows = class_qcontrol_work::getList_in2($row_admin['work']);

    if(count($rows)>0){
        foreach ($rows as $row) {
            $list .= '<option value="'.$row['value'].'">'.$row['code'].' / '.$row['name'].'</option>';
        }





    }




}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list'] = $list;
echo json_encode($data);
?>