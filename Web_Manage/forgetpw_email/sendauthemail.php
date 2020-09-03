<?php
//寄送忘記密碼確認信
include('_config.php');
$errorhandle=new coderErrorHandle();
$forgotme_email=trim(post('forgotme_email',1));
try
{
	if($web_email==""){
		throw new Exception('請設定寄件者E-mail');
	}
	if($forgotme_email==''){
		throw new Exception('請輸入E-mail!');
	}
	$db = Database::DB();
	$row=$db->query_prepare_first("select username,email,id from ".coderDBConf::$admin." where email='$forgotme_email'");
	if(!$row){
		throw new Exception('找不到與該電子郵件地址相關聯的帳戶');
	}else{
		$randcode = md5(uniqid(rand()));
		$db->query_update(coderDBConf::$admin,array("forgetcode"=>$randcode,"forgetcode_time"=>datetime())," email='{$forgotme_email}'");
		$fr_em = $web_email;//寄件email
		$fr_na = $webname;//寄件者
		$to_na = $row["username"];//收件人
		$to_em = $row["email"];//收件email
		//$to_em = $sys_email;
		$subject = "[$webname] Reset your Admin $webname password";//主旨
		$body = '';
		$body .= "Hi Admin,<br/><br/>";
		$body .= "We received a request to reset the password for your $webname account.<br/>
To reset your password, click on the link below (or copy and paste the URL into your browser):<br/>";
        $body .= $weburl."Web_Manage/confirm_pwemail.php?coder=".$randcode."&uid=".$row['id']."<br/>";
        $body .= "For account security, the password reset link is valid for only 24 hours.
Kind Regards,<br/><br/>Thanks<br/><br/>$webname Team";
//echo $body;
		sendMail($fr_em, $fr_na, $to_em, $to_na, $subject, $body);
	}
	$db->close();
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