<?php
include('../../_config.php');
$db = Database::DB();
$msg = '';
$result=true;
$data = array();

$company = (post("company",1)>0)?post("company",1):0; //公司別
$factory = (post("factory",1)>0)?post("factory",1):0; //廠別
$work = (post("work",1)>0)?post("work",1):0; //工作中心代碼/名稱
$username = (post("username",1)!="")?post("username",1):''; //帳號
$type =  (post("type",1)!="")?post("type",1):''; //欄位ID
if($username != ""){
    $row = class_admin::getList_one($username);
    $work_ary = array();
    if($row){ //需要驗證
        if($row['work'] !=""){
            $row_qw = class_qcontrol_work::getList_inone($work);
            if($row_qw){
                if($row_qw['qc_id']>0 && $row_qw['qf_id']>0 && $row_qw['value']>0) {
                    $work_ary = explode(",", $row['work']);
                    if(!in_array($row_qw['value'], $work_ary)){
                        $result=false;
                        $msg = 'Error';
                    }
                }
                else{
                    $result=false;
                    $msg = 'Error::work3';
                }

            }
            else{
                $result=false;
                $msg = 'Error::work2';
            }

        }
        else{
            $result=false;
            $msg = 'Error::work';
        }

        /*switch ($type){
            case 'company':
                if($company!=$row['company']){
                    $result=false;
                }
                break;
            case 'factory':
                if($factory!=$row['factory']){
                    $result=false;
                }
                break;
            case 'work':
                if(!in_array($work, $work_ary)){
                    $result=false;
                }
                break;
            default:
                if($company!=$row['company'] || !in_array($work, $work_ary) || $factory!=$row['factory']){
                    $result=false;
                }
        }

        if($result == false){
            $msg = 'Error';
        }*/





    }




}




$db->close();




$data['re'] = $result;
$data['msg'] = $msg;
echo json_encode($data);
?>