<?php
class coderLang
{
  private static $_lang = '';
  private static $_def_lang = 'zh-cht'; //預設語系
  private static $_cookie_name = 'user_lang'; //cookie名稱
  private static $_cache_name = 'lang'; //快取名稱
  public static $_dic = null;


  public static function getlang()
  { //語系代碼陣列 2維轉1維
    $array = class_lang_data::getList();
    return coderHelp::arraytwochangearrayone($array, 'lang', 'name');
  }

  public static function getlang_dictionary($lang)
  { //語系字典檔陣列 2維轉1維
    $array = class_lang_dictionary::getlangcache($lang);
    return coderHelp::arraytwochangearrayone($array, 'key', 'val');
  }

  public static function clearCache($lang)
  { //移除快取
    $cache_name = self::$_cache_name . $lang;
    clearCache($cache_name);
  }

  public static function getDic()
  { //取得字典
    if (self::$_dic != null) {
      return self::$_dic;
    }
    $lang = self::get();
    self::confDic($lang);
    return self::$_dic;
  }

  public static function getDic_js()
  { //取得字典 - js使用
    $ary_all = array();
    $ary_js = array();

    $lang = self::get();
    self::confDic($lang);
    $ary_all = self::$_dic;


    $ary_js['jquery1'] = (isset($ary_all['jquery1']) ? $ary_all['jquery1'] : 'Please enter the content.'); //請輸入內容. [jquery1]
    $ary_js['jquery2'] = (isset($ary_all['jquery2']) ? $ary_all['jquery2'] : 'Please enter email format.'); //請輸入Email格式. [jquery2]
    $ary_js['jquery3'] = (isset($ary_all['jquery3']) ? $ary_all['jquery3'] : 'Please enter Url format.'); //請輸入Url格式. [jquery3]
    $ary_js['jquery4'] = (isset($ary_all['jquery4']) ? $ary_all['jquery4'] : 'Please enter the date format yyyy-mm-dd.'); //請輸入日期格式yyyy-mm-dd. [jquery4]
    $ary_js['jquery5'] = (isset($ary_all['jquery5']) ? $ary_all['jquery5'] : 'Please enter the number.'); //請輸入數字. [jquery5]

    $ary_js['Excel6'] = (isset($ary_all['Excel6']) ? $ary_all['Excel6'] : 'Please upload file first'); //請先上傳檔案[Excel6]

    $ary_js['jquery6'] = (isset($ary_all['jquery6']) ? $ary_all['jquery6'] : 'Click on my upload file'); //點我上傳檔案[jquery6]
    $ary_js['jquery7'] = (isset($ary_all['jquery7']) ? $ary_all['jquery7'] : 'Click me to remove the file'); //點我移除檔案[jquery7]
    $ary_js['jquery8'] = (isset($ary_all['jquery8']) ? $ary_all['jquery8'] : 'Upload job completed'); //上傳作業完成[jquery8]
    $ary_js['jquery9'] = (isset($ary_all['jquery9']) ? $ary_all['jquery9'] : 'You have successfully uploaded the file.'); //您己成功上傳檔案。[jquery9]
    $ary_js['jquery10'] = (isset($ary_all['jquery10']) ? $ary_all['jquery10'] : 'Click me to browse the file'); //點我瀏覽檔案[jquery10]

    return json_encode($ary_js);
  }

  private static function confDic($lang)
  {
    $def_dic = null;
    if ($lang != self::$_def_lang) {
      $def_dic = self::getDicSource(self::$_def_lang);
      self::$_dic = array_merge($def_dic, self::getDicSource($lang));
    } else {
      self::$_dic = self::getDicSource($lang);
    }
  }
  // 撈資料 cache 建立
  private static function getDicSource($lang)
  {
    $cache_name = self::$_cache_name . $lang;
    $_dic_lang = array();
    if (getCache($cache_name)) { //有快取
      $_dic_lang = json_decode(getCache($cache_name), true);
    } else { //沒快取產生快取
      $_dic_lang = self::getlang_dictionary($lang);
      saveCache($cache_name, json_encode($_dic_lang));
    }
    return $_dic_lang;
  }
  public static function set($lang)
  { //saveCookie
    global $rootpath;
    if (array_key_exists($lang, self::getlang())) {
      // coderWebHelp::saveCookie(self::$_cookie_name, $lang,  $rootpath);
      coderWebHelp::saveCookie(self::$_cookie_name, $lang);
      self::$_lang = $lang;
    }
  }
  public static function get()
  { //取得語系
    if (self::$_lang != '' && array_key_exists(self::$_lang, self::getlang())) {
      return self::$_lang;
    }
    if (get('lang', 1) != '') {
      $lang = get('lang', 1);
      self::set($lang);
    } else {
      $lang = coderWebHelp::getCookie(self::$_cookie_name);
    }
    if (trim($lang) == "" || !array_key_exists($lang,  self::getlang())) {
      self::set(self::$_def_lang);
      $lang = self::$_def_lang;
    }
    return $lang;
  }


  public static function g($text)
  { //顯示欄位 $type[0]echo [1]return
    $show_text = "";
    $ary = self::$_dic;

    if (isset($ary[$text])) {
      $show_text = html_entity_decode($ary[$text]);
    }

    return $show_text;
  }

  public static function t($text, $_return = 0)
  { //顯示欄位 $type[0]echo [1]return
    $show_text = "";
    $ary = self::$_dic;
    if (isset($ary[$text])) {
      $show_text = html_entity_decode($ary[$text]);
    }
    if ($_return == 1) {
      return $show_text;
    } else {
      echo $show_text;
    }
  }
  public static function showtext($ary, $text, $type = 0)
  { //顯示欄位 $type[0]echo [1]return
    $show_text = "";
    if (isset($ary[$text])) {
      $show_text = html_entity_decode($ary[$text]);
    }
    if ($type == 1) {
      return $show_text;
    } else {
      echo $show_text;
    }
  }

  /**
   * 回傳當下語系縮寫
   * @return string Tw/Jp
   */
  public static function getAbbreviation()
  {
    if (self::get() == 'zh-cht') {
      return 'Tw';
    } else {
      return 'Jp';
    }
  }

  /**
   * 前台設置語系 cookie
   * function set 因設cookie在後台  前台讀取不到
   * @param string language
   * 
   */
  public static function setLanguage($language)
  {
    if (array_key_exists($language, self::getlang())) {
      coderWebHelp::saveCookie('language', $language);
    }
  }

  public static function getLanguage()
  {
    return empty(getCookie('language')) ? 'zh-cht' : getCookie('language');
  }

  /**
   * 取得特定語系翻譯
   * @param string language 語系代碼
   * @param string 欲取得 key
   */
  public static function getSpecificLanguage($language, $key)
  {

    $data = self::getDicSource($language);
    return $data[$key] ?? '';
  }
}
