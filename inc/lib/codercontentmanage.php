<?php
/**
 * 網站訊息相關Library
 * 
 * @author Cully
 * @version 1.0
 */
class coderContentManage {
   /**
   * 定義訊息類別。
   * 格式為陣列 
   * '權限的key值'=>array(key=>DBKEY值,name=>功能名稱);
   *  key值必須為數字
   */
	public static $type= array( 'member_register'=>'mail_member_register.php','member_success'=>'mail_member_success.php');


	public static function getMailContent($lang,$type, $search, $replace){
		global $template_path;
		$path=self::_getLangPath($lang);
        $header = file_get_contents($path . 'mail_header.php');
        $footer = file_get_contents($path . 'mail_footer.php');	
        return self::_getContent($lang,$header . self::getContent($lang,$type, $search, $replace) . $footer,$search,$replace);	
	}

	public static function getContent($lang,$type, $search, $replace){
		$content='';
		$path=self::_getLangPath($lang);
		if(!array_key_exists ( $type , self::$type)){
            self::_oops('內容類別錯誤');
        }
        $content = file_get_contents($path. self::$type[$type]);

        return self::_getContent($lang,$content,$search,$replace);	
	}
    private static function _getContent($lang,$content, $search, $replace) {
        global  $weburl, $webname;

        $search = array_merge($search, array(
			'{$lang}',
            '{$weburl}',
            '{$webname}'
        ));
        $replace = array_merge($replace, array(
			$lang,
            $weburl,
            $webname
        ));
        
        return str_replace($search, $replace, $content);
    }

	private static function _oops($msg){
		throw new Exception('contentManage:'.$msg);
	}
	
	private static function _getLangPath($lang){
		global $template_path;
		return $template_path.$lang.'/';
	}
}