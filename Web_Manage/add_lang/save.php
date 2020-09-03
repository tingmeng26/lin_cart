<?php
include('_config.php');
//include('formconfig.php');
include($inc_path.'_imgupload.php');
//引入函式庫
include '../../Classes/PHPExcel.php';


$errorhandle=new coderErrorHandle();
try{

	$db = Database::DB();
	$method='add';
	$active='編輯';

	/*$data=$fhelp->getSendData();
	$error=$fhelp->vaild($data);

	if(count($error)>0){
		$msg=implode('<br/>',$error);
		throw new Exception($msg);
	}*/

	//設定要被讀取的檔案
    //$file = $file_path_temp.post("file",1);
	$file = "1.xlsx";
	try {
		$objPHPExcel = PHPExcel_IOFactory::load($file);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//$sheetData = uniqueAssocArray($sheetData, "D") ;

	$rowindex=0;
	$erro_id = array();
	
	foreach($sheetData as $key => $col){ //列
		$data = array();

		if($col['A']!="" && $col['B']!="" && $col['C']!="" && $col['D']!=="" && $col['E']!==""){
            $rowindex++;
            //if($rowindex<=1)continue;



            $data[$colname['lang']] = trim($col['A']);
            $data[$colname['name']] = trim($col['B']);
            $data[$colname['remark']] = trim($col['C']);

            $data[$colname['ispublic']] = trim($col['D']);
            $data[$colname['ind']] = coderListOrderHelp::getMaxInd($table, $col['E']);
            $data[$colname['admin']] = $adminuser['username'];
            $data[$colname['updatetime']] = datetime();
            $data[$colname['createtime']] = datetime();

            $id=$db->query_insert($table,$data);

            if($id<=0) //新增失敗
            {
                $erro_id[$rowindex][] = "新增失敗";
            }


			
		}
		
		
		
	}


    class_vicinity_addr::clearCache();
	coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,$method,"據點匯入 Excel");
	$db->close();

    $result['result']=true;
    if(count($erro_id) > 0)
    {
        $erro_text = "";
        foreach($erro_id as $_erro_key => $_erro_val)
        {

            $erro_text .= ($erro_text != "")?"<br>第".$_erro_key."列".implode(",",$_erro_val)."欄":"第".$_erro_key."列".implode(",",$_erro_val)."欄";
        }
        $result['erro_id']=$erro_text;
    }
    else
    {
        $result['erro_id']='';
    }
    $result['data']=$errorhandle->getErrorMessage();
    echo json_encode($result);

}
catch(Exception $e){
	$errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
    $result['result']=false;
    $result['data']=$errorhandle->getErrorMessage();
    echo json_encode($result);
}


?>