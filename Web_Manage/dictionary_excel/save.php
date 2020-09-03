<?php
include('_config.php');
include('formconfig.php');
include($inc_path.'_imgupload.php');
//引入函式庫
include '../../Classes/PHPExcel.php';
coderAdmin::vaild($auth,'import');

$errorhandle=new coderErrorHandle();
try{

	$db = Database::DB();
	$method='add';
    $active=coderLang::t("add",1); //編輯

	$data=$fhelp->getSendData();
	$error=$fhelp->vaild($data);

	if(count($error)>0){
		$msg=implode('<br/>',$error);
		throw new Exception($msg);
	}

	//設定要被讀取的檔案
	$file = $file_path_temp.post("file",1);
	//$file = "test/product.xlsx";
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
        $erro_ck = 0; //確認是否有錯誤 [1]是 [0]否
		if($col['A']!="" && $col['B']!="" && $col['C']!="" && $col['D']!=""){
            $rowindex++;
            if($rowindex<=1)continue;
            $_A = trim($col['A']);
            $row_ld = class_lang_data::getList_one($_A); //語系
            if(!$row_ld)
            {
                $erro_id[$rowindex][] = "A";
                $erro_ck = 1;
            }


            if($erro_ck == 0) {
                $_C = trim($col['C']);
                $row_ldic = class_lang_dictionary::getList_one($_A,$_C);
                $data[$colname['english']] = trim($col['B']);
                $data[$colname['val']] = trim($col['D']);
                $data[$colname['admin']] = $adminuser['username'];
                $data[$colname['updatetime']] = datetime();
                $data[$colname['createtime']] = datetime();
                if($row_ldic){

                    $db->query_update($table,$data," {$colname['id']}=:id ",array(':id'=>$row_ldic['value']));
                }else {
                    $data[$colname['ld_lang']] = $_A;
                    $data[$colname['key']] = $_C;


                    $id = $db->query_insert($table, $data);

                    if ($id <= 0) //新增失敗
                    {
                        $erro_id[$rowindex][] = coderLang::t( "Excel16", 1); //新增失敗[Excel16]
                    }


                }
                coderLang::clearCache($_A); //清除

            }

			
		}
		
		
		
	}


	coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,$method,$page_title.' - '.coderLang::t("Excel2",1)); //Excel匯入[Excel2]
	$db->close();

    $result['result']=true;
    if(count($erro_id) > 0)
    {
        $erro_text = "";
        foreach($erro_id as $_erro_key => $_erro_val)
        {

            //$erro_text .= ($erro_text != "")?"<br>第".$_erro_key."列".implode(",",$_erro_val)."欄":"第".$_erro_key."列".implode(",",$_erro_val)."欄";
            $erro_text .= ($erro_text != ""?"<br>":"").coderLang::t("Excel17",1).$_erro_key.coderLang::t("Excel18",1).implode(",",$_erro_val).coderLang::t("Excel19",1);  //第[Excel17] 列[Excel18] 欄[Excel19]
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
