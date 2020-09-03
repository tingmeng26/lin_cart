<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();


$val = (post("_val",1)!="")?post("_val",1):''; //值
if($adminuser['isadmin']==1) { //是管理員才需要
    $qw_id = (post("qw_id") != "") ? post("qw_id") : 0; //工作中心ID
}
else{
    $qw_id = $adminuser['work_login'];
}

$qp_id = (post("qp_id")!="")?post("qp_id"):0; //產品大類ID
$qm_id = (post("qm_id")!="")?post("qm_id"):0; //型號/產品編號ID
$size = (post("size",1)!="")?post("size",1):""; //尺寸
$week = (post("week",1)!="")?post("week",1):""; //週次
$no =  (post("no",1)!="")?post("no",1):""; //流水號


if($val != "" && $qw_id>0 && $qp_id>0 && $qm_id>0 && $size != "" && $week != "" && $no != ""){
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
            $row_qp = class_qcontrol_product::getList_qfid_one($qf_id,$qp_id); //產品大類
            $row_qm = class_qcontrol_model::getList_qfid_one($qf_id,$qm_id,$qp_id); //型號/產品編號
            if($row_qp && $row_qm){
                $category = $row_qp['category'];
                $model = $row_qm['model'];
                $val = str_replace(" ","",$val);
                $all_text = $category.$model.$size.$week.$no;
                if($val!=$all_text){
                    $result = false;
                    $msg = "ERROR:: ".coderLang::t( "coderadmin3_9", 1); //ID原則設定[coderadmin3_9]
                }

            }
            else{
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


$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
echo json_encode($data);
