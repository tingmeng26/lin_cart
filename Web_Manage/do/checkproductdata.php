<?php
include('_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();

$id =  (post("_id",1)!="")?post("_id",1):0; //cp_id
$type = (post("_type",1)!="")?post("_type",1):0; //[0]判定 [1]覆核

if($id>0){
    $table=coderDBConf::$check_productdetails;
    $colname=coderDBConf::$col_check_productdetails;

    $row_cp = class_check_product::getList_one($id); //產品檢驗作業
    if($row_cp) {
        $rows_cp = class_check_productdetails::getList_cpid($id);

        if ($type == 1) {
            if (count($rows_cp) > 0 || $row_cp['recheck']==0 || $row_cp['scrapped']==0 || $row_cp['check']==0 || $row_cp['check_time']=="" || $row_cp['check_name']=="") {
                $result = false;
                $msg = coderLang::t( "checkproductdata2", 1); //明細有未填寫的欄位或尚未做判定動作，無法做覆核動作! [checkproductdata2]
            }
        } else {
            if (count($rows_cp) > 0) {
                $result = false;
                $msg = coderLang::t( "checkproductdata1", 1); //明細有未填寫的欄位，無法做判定動作! [checkproductdata1]

            }
        }
    }
    else{
        $result = false;
        $msg = "ERROR::".coderLang::t("coderadmin4_1",1); //產品檢驗作業 [coderadmin4_1]
    }

}
else{
    $result = false;
    $msg = "ERROR::id";
}

$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
echo json_encode($data);
