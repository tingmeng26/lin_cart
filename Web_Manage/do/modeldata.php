<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();

$list_qm_id = ""; //型號/產品編號
$list_qm_id = '<option value="">'.coderLang::t("coderfilterhelp2",1).'</option>'; //請選擇 [coderfilterhelp2]


$substr = (post("substr")!="")?post("substr"):0; //[1]切割 [0]不切割

if($adminuser['isadmin']==1) { //是管理員才需要
    if($substr == '1') {
        $qf_id = (post("qf_id", 1) != "") ? substr(post("qf_id", 1), 6) : 0; //廠別ID
    }
    else {
        $qf_id = (post("qf_id", 1) != "") ? post("qf_id", 1) : 0; //廠別ID
    }
}
else{
    $qf_id = $adminuser['factory_login'];
}


$qp_id = (post("qp_id",1)!="")?post("qp_id",1):0; //產品大類ID
$dselect = (post("dselect")!="")?post("dselect"):0; //預設
$change_num = (post("change_num")!="")?post("change_num"):0; //如果是2 就是修改第一次載入
$method = (post("method",1)!="")?post("method",1):'add'; //新增或修改

if($qp_id > 0 && $qf_id > 0){


    $rows_qm_id = class_qcontrol_model::getList_qfid($qp_id,$qf_id); //產品大類 找型號/產品編號
    if(count($rows_qm_id)>0){
        foreach ($rows_qm_id as $row_qm_id) {
            $list_qm_id .= '<option value="'.$row_qm_id['value'].'" '.($change_num==2 && $method=='edit' && $dselect==$row_qm_id['value'] ? 'selected' : '').'>'.$row_qm_id['name'].'</option>';
        }
    }




}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list_qm'] = $list_qm_id;
echo json_encode($data);
