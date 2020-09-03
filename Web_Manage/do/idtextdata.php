<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();

$week = ""; //週次
$no = ""; //流水號
$pnum_id = ""; //產品大類 ID
$model_id = ""; //型號/產品編號 ID
$modelsize = ''; //型號/產品編號 {下拉}
$model_list = '<option value="">'.coderLang::t("coderfilterhelp2",1).'</option>'; //請選擇 [coderfilterhelp2]

$val = (post("_val",1)!="")?post("_val",1):''; //值
if($adminuser['isadmin']==1) { //是管理員才需要
    $qw_id = (post("qw_id") != "") ? post("qw_id") : 0; //工作中心ID
}
else{
    $qw_id = $adminuser['work_login'];
}

if($val != "" && $qw_id>0){
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
    $sql = "select $table.{$colname['id_ispublic']},$table.{$colname['idday']},
                   $table.{$colname['qi_id']},$table.{$colname['qf_id']},
                   $table_qi.*
            from $table
            LEFT JOIN $table_qi ON `{$colname_qi['id']}` = `{$colname['qi_id']}`
            where `{$colname['id']}` = :id
            ORDER BY `{$colname['id']}` DESC";
    $row = $db -> query_prepare_first($sql,array(':id'=>$qw_id));
    $qf_id = $row[$colname['qf_id']];

    $now_day = date('Y-m-d');
    if($row) {
        if($row[$colname['id_ispublic']]==1 && $row[$colname['idday']]<=$now_day && $row[$colname['qi_id']]>0) {
            $pnum_num = ($row[$colname_qi['pnum_e']]-$row[$colname_qi['pnum_s']])+1; //產品大類 字數
            $model_num = ($row[$colname_qi['model_e']]-$row[$colname_qi['model_s']])+1; //型號/產品編號 字數
            $week_num = ($row[$colname_qi['week_e']]-$row[$colname_qi['week_s']])+1; //週次 字數
            $no_num = ($row[$colname_qi['no_e']]-$row[$colname_qi['no_s']])+1; //流水號 字數

            $pnum = mb_substr($val,($row[$colname_qi['pnum_s']]-1),$pnum_num,"UTF-8"); //產品大類
            $model = mb_substr($val,($row[$colname_qi['model_s']]-1),$model_num,"UTF-8"); //型號/產品編號
            $week = mb_substr($val,($row[$colname_qi['week_s']]-1),$week_num,"UTF-8"); //週次
            $no = mb_substr($val,($row[$colname_qi['no_s']]-1),$no_num,"UTF-8"); //流水號


            $row_qp = class_qcontrol_product::getList_whereid($qf_id,$pnum); //產品大類
            $pnum_id = ($row_qp)?$row_qp['value']:0;
            $row_qm = class_qcontrol_model::getList_whereid($qf_id,$model,$pnum_id); //型號/產品編號
            $model_id = ($row_qm)?$row_qm['value']:"";

            if($pnum_id > 0){
                $rows_qm_id = class_qcontrol_model::getList_qfid($pnum_id,$qf_id); //產品大類 找型號/產品編號
                if(count($rows_qm_id)>0){
                    foreach ($rows_qm_id as $row_qm_id) {
                        $model_list .= '<option value="'.$row_qm_id['value'].'" '.($model_id==$row_qm_id['value']?'selected':'').'>'.$row_qm_id['name'].'</option>';
                    }
                }
            }


            $modelsize = $row_qm['size'];


        }
    }
    else{
        $result = false;
        $msg = "ERROR";
    }



}


$db->close();


$data['week'] = $week; //週次
$data['no'] = $no; //流水號
$data['pnum_id'] = $pnum_id; //產品大類 ID
$data['model_id'] = $model_id; //型號/產品編號 ID
$data['modelsize'] = $modelsize; //型號/產品編號 {尺寸}
$data['model_list'] = $model_list; //型號/產品編號 {下拉}

$data['re'] = $result;
$data['msg'] = $msg;
echo json_encode($data);
