<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();

$type =  (post("type",1)!="")?post("type",1):''; //欄位ID
$val = (post("_val",1)!="")?post("_val",1):''; //值
if($adminuser['isadmin']==1) { //是管理員才需要
    $qw_id = (post("qw_id") != "") ? post("qw_id") : 0; //工作中心ID
}
else{
    $qw_id = $adminuser['work_login'];
}

//echo $type."-".$val."-".$qw_id;
if($val != "" && $type!="" && $qw_id>0){
    $table_cp=coderDBConf::$check_product; //產品檢驗作業
    $colname_cp=coderDBConf::$col_check_product;

    $table_qi=coderDBConf::$qcontrol_idprinciple; //ID原則
    $colname_qi=coderDBConf::$col_qcontrol_idprinciple;

    $table=coderDBConf::$qcontrol_work; //工作中心
    $colname=coderDBConf::$col_qcontrol_work;

    $table_qp=coderDBConf::$qcontrol_product; //產品大類
    $colname_qp=coderDBConf::$col_qcontrol_product;

    $table_qm=coderDBConf::$qcontrol_model; //型號/產品編號
    $colname_qm=coderDBConf::$col_qcontrol_model;
    $sql = "select *
            from $table
            LEFT JOIN $table_qi ON `{$colname_qi['id']}` = `{$colname['qi_id']}`
            where `{$colname['id']}` = :id
            ORDER BY `{$colname['id']}` DESC";
    $row = $db -> query_prepare_first($sql,array(':id'=>$qw_id));
    $qf_id = $row[$colname['qf_id']];

    $now_day = date('Y-m-d');
    if($row) {
        if($row[$colname['id_ispublic']]==1 && $row[$colname['idday']]<=$now_day && $row[$colname['qi_id']]>0) {
            switch ($type) {
                case $colname_cp['qp_id']: //產品大類
                    $row_qp = class_qcontrol_product::getList_qfid_one($qf_id,$val);
                    if($row_qp) {
                        $result = check_val($row_qp['category'], $row[$colname_qi['pnum_s']], $row[$colname_qi['pnum_e']]);
                        $msg = error_msg($row[$colname_qi['pnum_s']], $row[$colname_qi['pnum_e']], $result);
                    }
                    else{
                        $result = false;
                        $msg = "ERROR";
                    }
                    break;
                case $colname_cp['qm_id']: //型號/產品編號
                    /*$row_qm = class_qcontrol_model::getList_qfid_one($qf_id,$val);
                    if($row_qm) {
                        $result = check_val($row_qm['model'], $row[$colname_qi['model_s']], $row[$colname_qi['model_e']]);
                        $msg = error_msg($row[$colname_qi['model_s']], $row[$colname_qi['model_e']], $result);
                    }
                    else{
                        $result = false;
                        $msg = "ERROR";
                    }*/
                    break;
                case $colname_cp['size']: //尺寸
                    $result = check_val($val, $row[$colname_qi['modelsize_s']], $row[$colname_qi['modelsize_e']]);
                    $msg = error_msg($row[$colname_qi['modelsize_s']],$row[$colname_qi['modelsize_e']],$result);
                    break;
                case $colname_cp['week']: //週次
                    $result = check_val($val, $row[$colname_qi['week_s']], $row[$colname_qi['week_e']]);
                    $msg = error_msg($row[$colname_qi['week_s']],$row[$colname_qi['week_e']],$result);
                    break;
                case $colname_cp['no']: //流水號
                    $result = check_val($val, $row[$colname_qi['no_s']], $row[$colname_qi['no_e']]);
                    $msg = error_msg($row[$colname_qi['no_s']],$row[$colname_qi['no_e']],$result);
                    break;
                default:
                    $result = false;
                    $msg = "ERROR";
            }
        }
    }
    else{
        $result = false;
        $msg = "ERROR";
    }



}

function error_msg($data1,$data2,$re){//錯誤訊息顯示
    global $now_lang_dic;
    $msg="";
    if(!$re) {
        $msg = coderLang::t( "domsg1", 1) . $data1 . ' ~ ' . $data2 . coderLang::t( "code2", 1); //請輸入[domsg1] 碼[code2]
    }
    return $msg;
}
function check_val($val,$_s,$_e){ //判斷字數
    $var_num = mb_strlen($val,'utf-8');
    $re = false;
    if($var_num>=$_s && $var_num<=$_e){
        $re = true;
    }
    return $re;
}

$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
echo json_encode($data);
