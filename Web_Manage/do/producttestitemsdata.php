<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();
$list = "";
$list ='<option value="">'.coderLang::t("coderfilterhelp2",1).'</option>'; //請選擇 [coderfilterhelp2]

$qw_id = (post("qw_id")!="")?post("qw_id"):0; //工作中心ID
$dselect = (post("dselect")!="")?post("dselect"):0; //預設
$change_num = (post("change_num2")!="")?post("change_num2"):0; //如果是2 就是修改第一次載入
$method = (post("method",1)!="")?post("method",1):'add'; //新增或修改

if($qw_id > 0){


    $rows = class_qcontrol_worktest::getList_qwid_qcitemsone($qw_id); //工作中心 找工作中心檢驗項目設定
    if(count($rows)>0){
        foreach ($rows as $row) {
            $list .= '<option value="'.$row['value'].'" '.($change_num==2 && $method=='edit' && $dselect==$row['value'] ? 'selected' : '').'>'.$row['name'].'</option>';
        }
    }



}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
$data['list'] = $list;
echo json_encode($data);
