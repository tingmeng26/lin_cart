<?php

class Lang {
    /*資料用ARY*/
    private static $aryLanguage = array(
        'en' => 'en',
        'zh-hans' => 'zh_hans',
        'zh-hant' => 'zh_hant',
        'ja' => 'ja'
    );
    private static $lang_str = null;
    private static $_lang = '';
    private static $_def_lang = 'en';
    public static function getLangStr($lang) {
        global $root_path;
        $aryLanguage = self::$aryLanguage;
        $lang = str_replace('_', '-', strtolower($lang));
        if (!array_key_exists($lang, $aryLanguage)) {
            $_lang = $aryLanguage[self::$_def_lang];
        } else {
            $_lang = $aryLanguage[$lang];
        }
        self::_setLang($_lang);

        return $_lang;
    }

    public static function getLangStrByGameID($game_id){
    	global $db;
    	if (self::$_lang != '') {
    	    return self::$_lang;
    	}
    	$session_lang=coderHelp::getStr($_SESSION['summonster_lang']);
     	if ($session_lang!='') {
    	    return self::getLangStr($session_lang);
    	} 
    	$row=$db->query_first('select lang from '.coderDBConf::$member.' where game_id=:game_id',array(':game_id'=>$game_id));
    	return self::getLangStr($row['lang']);
    }

    public static function toStr($key) {
        $lang = self::getLang();
        if (array_key_exists($key, self::$lang_str)) {
            
            return self::$lang_str[$key];
        } else {
            throw new Exception("查無對應語系文字[{$key}]");
        }
    }

    public static function getLang() {
        if (self::$_lang != '') {
            return self::$_lang;
        }
        self::_setLang(self::$_def_lang);
        
        return self::$_lang;
    }
    private static function _setLang($lang){
    	self::$_lang = $lang;
    	self::$lang_str = self::_getList($lang);
    	$_SESSION['summonster_lang']=$lang;
    }
    private static function _getList($lang) {
        global $db, $web_cache;
        $cache_name = $web_cache['langstr'] . '_' . $lang;
        $str = getCache($cache_name);
        if ($str && trim($str) != "") {
            $data_rows = unserialize($str);
            if (is_array($data_rows)) {
                
                return $data_rows;
            }
        }
        $rows = $db->fetch_all_array('select `keys`,str_' . $lang . ' as str from ' . coderDBConf::$langstr);
        $ary = array();
        
        foreach ($rows as $row) {
            $ary[$row['keys']] = $row['str'];
        }
        $str = serialize($ary);
        saveCache($cache_name, $str);
        
        return $ary;
    }
    public static function clearCache() {
    	global $web_cache;
        clearCache($web_cache['langstr'] . '_zh_hans');
        clearCache($web_cache['langstr'] . '_zh_hant');
        clearCache($web_cache['langstr'] . '_en');
        clearCache($web_cache['langstr'] . '_ja');
    }
}
