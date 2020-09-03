<?php
include('../../_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";

$company = (post("company",1)>0)?post("company",1):null; //公司別
if($company != ""){
    $rows = class_qcontrol_factory::getList_qcid($company);
    if(count($rows)>0){
        foreach ($rows as $row) {
            $list .= '<option value="'.$row['value'].'">'.$row['name'].'</option>';
        }





    }




}
else{
    $result=false;
    $msg = 'Error';
}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list'] = $list;
echo json_encode($data);
?>