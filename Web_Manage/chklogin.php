<?php
$inc_path="../inc/";
include($inc_path.'_config.php');
$errorhandle=new coderErrorHandle();
$username=trim(post('username',1));
$password=trim(post('password',1));
$code=trim(post('code',1));
$remember_me = post('remember_me');

//$company = (post('company')>0)?post('company'):null; //公司別
//$factory = (post('factory')>0)?post('factory'):null; //廠別
//$work = (post('work')>0)?post('work'):null; //工作中心代碼/名稱

try
{
	//把log清掉
	coderAdminLog::clearSession();
	$_SESSION['loginfo']='';
	if(!isset($_SESSION["VaildImgCode"])){
        throw new Exception('請重新整理!');
    }
	if($code=='' || $code!=$_SESSION["VaildImgCode"]){
		throw new Exception('圖形驗證碼不正確!');
	}
	if($username=="" || $password==""){
		throw new Exception('請輸入帳號與密碼!');
	}

    $db = Database::DB();
    $ary_add = array();
    $row = class_admin::getList_one($username);
    if($row) { //需要驗證
        /*$row_qw = class_qcontrol_work::getList_inone($work);


        $ary_add = array();
        $ary_add['company_login'] = $row_qw['qc_id'];
        $ary_add['factory_login'] = $row_qw['qf_id'];
        $ary_add['work_login'] = $work;*/
    }
    else{
        $ary_add['company_login'] = 0;
        $ary_add['factory_login'] = 0;
        $ary_add['work_login'] = 0;
    }


	coderAdmin::login($username,$password,$ary_add);

	$db ->close();

	$code!=$_SESSION["VaildImgCode"]="";
}
catch(Exception $e)
{
	$errorhandle->setException($e);
}
if ($errorhandle->isException())
{
	$result['result']=false;
    $result['msg']=$errorhandle->getErrorMessage(false);
}
else
{
	$result['result']=true;
}
echo json_encode($result);
?>