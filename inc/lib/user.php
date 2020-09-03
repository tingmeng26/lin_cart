<?php
class user{
	private static $_ary=null;
	public static function getAllList(){
		global $web_cache;
		if(self::$_ary==null){
			self::$_ary= getWebCache('select name as name,id as value from '.coderDBConf::$admin .' WHERE isuser=1',$web_cache['user']);
		}
		return self::$_ary;
	}
	public static function clearCache(){
		global $web_cache;
		self::$_ary = null;
		clearCache($web_cache['user']);
	}
}
?>