<?php
include('../../_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";

//$company = (post("company",1)>0)?post("company",1):null; //公司別
$factory = (post("factory",1)!="")?substr(post("factory",1),6):null; //廠別
if($factory != ""){
    $rows = class_qcontrol_testitems::getList_qfid($factory);
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