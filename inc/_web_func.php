<?php
// function getLangStr($lang){
// 	global $aryLanguage;
// 	$lang=strtolower($lang);
// 	if(!isset($aryLanguage[$lang])){
// 		throw new Exception('語系代碼錯誤,查無此語系!');
// 	}
// 	return $aryLanguage[$lang];
// }


function getQueryAry()
{
    $q = post('q', 1);
    if ($q == '') {
        throw new Exception('傳輸參數錯誤');
    }
    $query = coderAES256::Decrypt($q);
    parse_str($query, $data);//將查询字符串解析到變量(ex.id=23=>$id=23)
    if (!$data || !is_array($data)) {
        throw new Exception('解碼錯誤');
    }
    return $data;
}


function getErrorMsg($msg, $reload)
{
    return '<?xml version="1.0" encoding="utf-8" ?><data> <sReturn sReturn="False" msg="' . $msg . '" exception="' . ($reload ? 'true' : 'false') . '"/></data>';
}

function set_emailsample($body)
{//設置email的樣板
    global $weburl;
    $html = '';
    $html .= '<!doctype html>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zh-TW"> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="zh-TW"> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" lang="zh-TW"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="zh-TW"> <!--<![endif]-->
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title>Home | DataVan | POS System, POS PC, Touch Monitor, Kiosk</title>
	    <!--[if IE]><script type="text/javascript" src="' . $weburl . 'js/libs/excanvas.js"></script><![endif]-->
	    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	    <link rel="icon" href="">
	    <meta name="keywords" content="DataVan, POS system, Touch POS terminal, point-of-sale, point-of-service, modular POS, POS PC, EPOS, touch monitor, POS monitor, self-service kiosk, kiosk terminal, retail POS, hospitality POS" />
	    <meta name="description" content="DataVan provides POS hardware solutions for retail and hospitality industries, including touch POS terminals, modular POS, touch monitors, and kiosk terminals." />
	    <meta name="viewport" content="width=device-width">

	    <style>
	    p{
	    	color: #454444;
	    	font-size: 14px;
	    	line-height: 20px;
	    }
	    a{
	    	color: #4c8fcc;
	    	font-weight: bold;
	    	text-decoration: underline;
	    }

	    </style>




	</head>
	<body style="background-color: #e2e3e2;">
	    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
			<div style="width: 740px; height: 546px; margin: 0 auto;">
				<div style="width: 740px; height: 68px;">
					<img style="margin: 10px 0 0 0;" src="' . $weburl . 'images/logo.png" alt="" />
				</div>
				<div style="width: 700px; height: 310px; background-color: white; padding: 20px 20px;">
				' . $body . '</div>
			</div>




	</body>
	</html>
	';

    return $html;
}

//=========fb===========
function facebook_token($token)
{
    $facebook = new Facebook(array('appId' => FB_APP_ID, 'secret' => FB_APP_SECRECT));
    $facebook->setAccessToken($token);

    try {
        $fields = array('id', 'email', 'gender');
        //'id', 'name', 'first_name', 'last_name', 'link', 'website', 'locale', 'about', 'email', 'hometown', 'location'
        $user_profile = $facebook->api('/me?fields=' . implode(',', $fields));
        return $user_profile;
    } catch (FacebookApiException $e) {
        $user = null;
        return null;
    }
}

//=========Google===========
function google_token($token)
{
    $r = get_CURL("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $token);

    return json_decode($r, true);
}


function isYoutube_url($url)
{
    $str_message = "";
    $video_id = "";
    $result = preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    if (!$result) {
        $str_message = '請輸入正確的youtube網址';
        return false;
    } else {
        $video_id = $match[1];
        return true;
    }
}

function escapeJsonString($string)
{ //過濾特殊字元
    $result = str_replace(
        array('&nbsp;',' ','　　','　','\\n','\\r'),
        '',$string);
    return $result;
}

function ASCII_chr($pColumnIndex = 0){ //轉換成英文
    $_indexCache = array();

    if (!isset($_indexCache[$pColumnIndex])) {
        if ($pColumnIndex < 26) {

            $_indexCache[$pColumnIndex] = chr(65 + $pColumnIndex);

        } elseif ($pColumnIndex < 702) {

            $_indexCache[$pColumnIndex] = chr(64 + ($pColumnIndex / 26)) . chr(65 + $pColumnIndex % 26);

        } else {

            $_indexCache[$pColumnIndex] = chr(64 + (($pColumnIndex - 26) / 676)) . chr(65 + ((($pColumnIndex - 26) % 676) / 26)) . chr(65 + $pColumnIndex % 26);

        }

    }

    return $_indexCache[$pColumnIndex];
}

?>