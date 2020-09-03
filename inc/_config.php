<?PHP
ini_set('display_errors', 1);   # 0不顯示 1顯示
error_reporting(E_ALL);         # report all errors
date_default_timezone_set("Asia/Taipei");
//mb_internal_encoding("UTF-8");

ini_set("magic_quotes_runtime", 0);
ob_start();
if (!isset($_SESSION)) {
  session_start();
}

header("Content-type: text/html; charset=utf-8");


/* 後台的標題及 Header 變數等 */
$webname = "林製作所";
//$webmanagename = "後台管理系統-Neptunus V1.5"; 改抓資料庫
$webmanagename = "";
$copyright = "";
$description = "";
$keywords = "";


/* 系統快取暫存 */
$iCache_ExpireHour = 24;
$iCookMainExpireDay = 30;

/* 雜項變數 */
$null_date = '-0001-11-30';
$slash = (strstr(dirname(__FILE__), '/')) ? "/" : "\\";
define("CONFIG_DIR", dirname(__FILE__) . $slash);
define("ROOT_DIR", substr(CONFIG_DIR, 0, strpos(CONFIG_DIR, DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR) + 1));
/*Database*/
include("connect.php");

/* 系統寄發 Mail 相關 */

// 網站管理者email (即系統寄信的email)
$web_email = "jessica@coder.com.tw";

//寄信mail的署名
$web_emailname = "Jessica";



/*SMTP Server*/
$smtp_auth = true;
$smtp_isSMTP = true;
$smtp_host = "";
$smtp_port = 25;
$smtp_id   = "";
$smtp_pw   = "";
$smtp_secure = "";

/* Email */
$sys_email = $web_email;
$sys_name = "林製作所";



/*Upload path*/
$admin_path_temp = "../../upload/temp/";

//admin
$admin_path_admin = "../upload/admin/";

//ckeditor
$path_ckeditor = $weburl . 'upload/editor/'; //ckeditor中路徑
$admin_path_ckeditor = "../../upload/editor/"; //上傳放置(以後台位置來看)
$db_path_ckeditor = 'upload/editor/'; //存入資料庫時改為
$web_path_ckeditor = 'upload/editor/'; //前台ck路徑

//首頁 - 影片
$path_video = "upload/video/";
$admin_video = "../../upload/video/";

//首頁 - banner
$path_banner_pic = "upload/banner/";
$admin_banner_pic = "../../upload/banner/";

//產品檢驗作業
$path_check_productdetails = "upload/check_productdetails/";
$admin_check_productdetails = "../../upload/check_productdetails/";

// 產品 分類大項
$PATH_PRODUCT_TYPE = '../../upload/type/';
$FRONT_PATH_PRODUCT_TYPE = '/upload/type/';
// $PATH_PRODUCT_TYPE = '../../upload/old/product_type/';
// $FRONT_PATH_PRODUCT_TYPE = '/upload/old/product_type/';
// 產品 分類細項
$PATH_PRODUCT_SUBTYPE = '../../upload/subtype/';
// $PATH_PRODUCT_SUBTYPE = '../../upload/old/product_type2/';
// 產品
$PATH_PRODUCT = '../../upload/product/';
$FRONT_PATH_PRODUCT = '/upload/product/';
// $PATH_PRODUCT = '../../upload/old/product/';
// $FRONT_PATH_PRODUCT = '/upload/old/product/';










/*Cache path*/
$cache_path = 'upload/cache/';
$cache_path_web = $cache_path;
$cache_path_mob = '../' . $cache_path;
$cache_path_do = '../' . $cache_path;
$cache_path_admin = '../../' . $cache_path;
$cache_path_adminlogin = '../' . $cache_path;

$template_path = 'template/';


/*Image setup*/
//首頁 - banner - 電腦版
$banner_pic_w = 1920;
$banner_pic_h = 894;













/*Cache name*/
$web_cache = array('company' => 'company', 'factory' => 'factory', 'work' => 'work', 'idprinciple' => 'idprinciple', 'model' => 'model', 'product' => 'product', 'testitems' => 'testitems');


/*資料用ARY*/
$incaryYN = array(0 => 'No', 1 => 'Yes');
$incary_anti_YN = array_flip($incaryYN);
$incaryYN2 = array('N', 'Y');
$incary_anti_YN2 = array_flip($incaryYN2);
$incary_isshow = array(1 => '顯示', 0 => '隱藏');
$incary_yn = array(0 => '否', 1 => '是');
$incary_yn_anti = array_flip($incary_yn);
$incary_yn_layout = array('<span class="label">否</span>', '<span class="label label-success">是</span>');
$CONTACT_TYPE = [0 => '未回覆', 1 => '已回覆'];
$CONTACT_CONDITION_TYPE = ['oemodm' => 1, 'product' => 2];
$PRODUCT_TAG = [1 => '新上市', 2 => '販售中', 3 => '下訂生產', 4 => '生產結束'];


$incary_phone = array(0 => '行動電話', 1 => '室內電話');

//選單
$incary_pic = array(0 => 'youtube連結', 1 => '影片');

//自動登出時間
$incary_loginouttime = array(1 => array('name' => '30分鐘', 'minute' => '30'), 2 => array('name' => '1小時', 'minute' => '60'), 3 => array('name' => '2小時', 'minute' => '120'));

$incary_check_type = array(1 => 'OK', 2 => 'NG', 3 => 'AOD', 4 => 'OTHERS');

$incary_labelstyle = array(0 => 'default', 1 => 'success', 2 => 'warning', 3 => 'important', 4 => 'inverse', 5 => 'pink', 6 => 'yellow', 7 => 'lime', 8 => 'magenta', 9 => 'gray');

$HOME_ARRAY  = ['en' => 'home', 'tw' => '首頁', 'jp' => 'ホーム'];
$INFORMATION_ARRAY = ['en' => 'Products Information', 'tw' => '產品情報', 'jp' => '製品情報'];


//define("AES_IV", '1qazxsw23edcvfr41qazxsw23edcvfr4');
define("AES_IV", '1qazxsw23edcvfr4');
define("AES_KEY", 'strongmanerp2018');




require_once(CONFIG_DIR . "_func.php");
require_once(CONFIG_DIR . "_func_cache.php");
require_once(CONFIG_DIR . "_database.class.php");
require_once(CONFIG_DIR . "_func_smtp.php");



//lib的autoload
function incautoload($classname)
{
  if (strlen($classname) > 6 && mb_substr($classname, 0, 6) == 'class_') {
    $filename = CONFIG_DIR . "class/" . strtolower($classname) . ".php";
  } else {
    $filename = CONFIG_DIR . "lib/" . strtolower($classname) . ".php";
  }

  if (mb_substr(strtolower($classname), 0, 9) != 'phpexcel_') {
    if (file_exists($filename)) {
      include_once $filename;
    } else {
      //echo 'notfound:'.$filename;
    }
  }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
  //SPL autoloading was introduced in PHP 5.1.2
  if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
    spl_autoload_register('incautoload', true, true);
  } else {
    spl_autoload_register('incautoload');
  }
} else {
  function __autoload($classname)
  {
    @incautoload($classname);
  }
}
