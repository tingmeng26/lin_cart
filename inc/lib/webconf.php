<?php
class WebConf{
	private static $_ary=null;

	public static function getList(){
		global $web_cache;

		if(self::$_ary==null){
			$ary=array();
			$_ary=getWebCache('select * from '.coderDBConf::$web_conf,$web_cache['webconf']);
			foreach ($_ary as $item) {
				$keys=trim($item['keys']);
				$ary[$keys]=array();
				$ary[$keys]['title']=$item['title'];
				$ary[$keys]['val']=$item['val'];
			}
			self::$_ary= $ary;
		}

		return self::$_ary;
	}

	public static function getItem($key){
		$list=self::getList();

		return array_key_exists($key, $list) ? $list[$key] : null;
	}

	public static function clearCache(){
		global $web_cache;
		clearCache($web_cache['webconf']);
	}		
}
?>