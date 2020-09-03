<?php
class coderAdminLog
{
	public static $action = null;
	private static $_type = NULL;
	private static $_action = NULL;

	public static function lang_action()
	{ //action 變更為可以轉換語系
		global $now_lang_dic;
		if (self::$action == null) {
			self::$action = array(
				'login' => array('key' => 1, 'name' => coderLang::t("formbtn", 1)), //登入[formbtn]
				'view' => array('key' => 2, 'name' => coderLang::t("view", 1)), //瀏覽[view]
				'add' => array('key' => 4, 'name' => coderLang::t("add", 1)), //新增[add]
				'edit' => array('key' => 8, 'name' => coderLang::t("edit", 1)), //编辑[edit]
				'del' => array('key' => 16, 'name' => coderLang::t("del", 1)), //刪除[del]
				//'copy'=>array('key'=>32,'name'=>coderLang::t("copy",1)), //複製[copy]
				'import' => array('key' => 64, 'name' => coderLang::t("import", 1)), //匯入[import]
				'export' => array('key' => 128, 'name' => coderLang::t("export", 1)), //匯出[export]
				//'send'=>array('key'=>256,'name'=>coderLang::t("send",1)) //寄出[send]
				'review' => array('key' => 256, 'name' => coderLang::t("checkpro12", 1)) //覆核[checkpro12]
			);
		}
		return self::$action;
	}

	public static function clearSession()
	{
		unset($_SESSION['loginfo']);
	}
	public static function insert($username, $main, $fun, $act, $descript = "")
	{
		$db = Database::DB();
		if ($act === 1) {
			$main_key = $main;
			$fun_key = $fun;
			$log_key = $act;
		} else {
			$user = coderAdmin::getUser();
			$auth = coderAdmin::$Auth;
			if (!isset($auth[$main])) {
				self::oops("錯誤的main type");
			}
			$main_key = $auth[$main]['key'];
			if (!isset($auth[$main]["list"][$fun])) {
				self::oops("錯誤的fun type");
			}
			$fun_key = $auth[$main]["list"][$fun]['key'];
			$log_key = self::getActionKey($act);
		}
		//if(!isset($_SESSION['loginfo']) || $_SESSION['loginfo']!=$type.$descript)
		//{

		$data = array();
		$data['username'] = $username;
		$data['main_key'] = $main_key;
		$data['fun_key'] = $fun_key;
		$data['action'] = $log_key;
		$data['createtime'] = request_cd();
		$data['ip'] = request_ip();
		$data['descript'] = $descript;
		//if($db->query_insert(coderDBConf::$admin_log,$data)){
		//$_SESSION['loginfo']=$type.$descript;
		//}
		$db->query_insert(coderDBConf::$admin_log, $data);
		//}
	}

	public static function getLogByUser($username, $limit = 10)
	{
		global $db;
		$rows = $db->fetch_all_array('select  main_key,fun_key,action,descript,createtime from ' . coderDBConf::$admin_log . ' where username=:username  order by createtime desc limit ' . $limit, array(':username' => $username));
		$len = count($rows);
		for ($i = 0; $i < $len; $i++) {
			$rows[$i]['main_key'] = '';
			$rows[$i]['action'] = self::getActionNameByKey($rows[$i]['action']);
		}
		return $rows;
	}

	public static function getTypeIndex($value)
	{
		if (self::$_type == NULL) {
			self::$_type = coderHelp::makeAryKeyValue(self::$type, 'key');
		}
		if (!isset(self::$_type[$value])) {
			self::oops("錯誤的type key值");
		}
		return self::$_type[$value];
	}
	public static function getActionIndex($value)
	{
		if (self::$_action == NULL) {
			self::$_action = coderHelp::makeAryKeyValue(self::$action, 'key');
		}
		if (!isset(self::$_action[$value])) {
			self::oops("錯誤的action key值");
		}
		return self::$_action[$value];
	}
	public static function getTypeNameByKey($key)
	{
		return self::$type[self::getTypeIndex($key)]['name'];
	}
	public static function getActionNameByKey($key)
	{

		return self::$action[self::getActionIndex($key)]['name'];
	}
	public static function getTypeName($type)
	{
		return (isset(self::$type[$type])) ? self::$type[$type]['name'] : '';
	}
	public static function getActionName($act)
	{
		return (isset(self::$action[$act])) ? self::$action[$act]['name'] : '';
	}
	public static function getActionKey($act)
	{
		if (isset(self::$action[$act])) {
			return self::$action[$act]['key'];
		} else {
			self::oops('錯誤的act type');
		}
	}
	private static function getItem($type)
	{
		foreach (self::$type as $key => $item) {
			if ($key == $type) {
				return $item;
			}
		}
		return false;
	}

	private static function oops($msg)
	{
		throw new Exception($msg, 1);
	}
}
