<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list_qp_id = ""; //產品大類
$list_qm_id = ""; //型號/產品編號
$list_qp_id = $list_qm_id ='<option value="">'.coderLang::t("coderfilterhelp2",1).'</option>'; //請選擇 [coderfilterhelp2]

$qf_id = (post("qf_id",1)!="")?substr(post("qf_id",1),6):0; //廠別ID
$dselect = (post("dselect")!="")?post("dselect"):0; //預設
$dselect2 = (post("dselect2")!="")?post("dselect2"):0; //預設
$change_num = (post("change_num")!="")?post("change_num"):0; //如果是2 就是修改第一次載入
$method = (post("method",1)!="")?post("method",1):'add'; //新增或修改

if($qf_id > 0){


    $rows_qp_id = class_qcontrol_product::getList_qfid($qf_id); //廠別 找產品大類
    if(count($rows_qp_id)>0){
        foreach ($rows_qp_id as $row_qp_id) {
            $list_qp_id .= '<option value="'.$row_qp_id['value'].'" '.($change_num==2 && $method=='edit' && $dselect==$row_qp_id['value'] ? 'selected' : '').'>'.$row_qp_id['name'].'</option>';
        }
    }

    $rows_qm_id = class_qcontrol_model::getList_qfid($qf_id); //廠別 找型號/產品編號
    if(count($rows_qm_id)>0){
        foreach ($rows_qm_id as $row_qm_id) {
            $list_qm_id .= '<option value="'.$row_qm_id['value'].'" '.($change_num==2 && $method=='edit' && $dselect2==$row_qm_id['value'] ? 'selected' : '').'>'.$row_qm_id['name'].'</option>';
        }
    }




}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list_qp'] = $list_qp_id;
$data['list_qm'] = $list_qm_id;
echo json_encode($data);
