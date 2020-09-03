<?php
class class_admin{
    public static function getAllList_NoGroup($gid,$type='',$val=''){//取name,id 及 o_id (沒參加群組的名單)
        global $db;
        $table = coderDBConf::$admin;
        $table_map=coderDBConf::$groupadmin_map;
        $colname_map=coderDBConf::$col_groupadmin_map;

        $where = '';
        $where2 = '';
        $where_ary = array();
        switch ($type) {
            case 'keyword':
                $where = " AND name LIKE :namekeyword";
                $where_ary[':namekeyword'] = "%$val%";
                break;
        }
        if($gid!=''){
            $where2 = "OR $table_map.`{$colname_map['g_id']}`=$gid";
        }
        $sql = "SELECT id as value, name , o_id as pid , $table_map.`{$colname_map['g_id']}`
                FROM $table
                LEFT JOIN $table_map ON $table.`id` = $table_map.`{$colname_map['a_id']}`
                WHERE 1 AND ($table_map.`{$colname_map['g_id']}` IS NULL $where2) $where
                ORDER BY `id` DESC";            
        return $db -> fetch_all_array($sql,$where_ary);
    }
	
	public static function getList($type,$_val){//取name,value
		global $db;
		$colname = "";
		$table = "";
		switch ($type) {
			case "group":
				$colname = coderDBConf::$col_group;
				$table = coderDBConf::$group;
				break;
			case "o":
				$colname = coderDBConf::$col_organization;
				$table = coderDBConf::$organization;
				break;
			case "rules":
				$colname = coderDBConf::$col_rules;
				$table = coderDBConf::$rules;
				break;
			case "admin":
				$table = coderDBConf::$admin;
				break;
		}
		if($type =="admin")
		{
			$sql = "select name,id as value
					from `".$table."`";
		}
		else
		{
			$sql = "select {$colname['name']} as name,{$colname['id']} as value
					from `".$table."`";
		}
		$rows = $db -> fetch_all_array($sql);
		return coderHelp::getArrayPropertyVal($rows, 'value', $_val, 'name');
	}

    public static function getList_one($username){//後台登入檢查使用
        global $db;
        $table = coderDBConf::$admin;

        $sql = "SELECT *
                FROM $table
                WHERE 1 AND username = :username AND isadmin=0 
                ORDER BY `id` DESC";
        return $db -> query_prepare_first($sql,array(':username'=>$username));//AND (company>0 or factory>0 or `work`>0)
    }

    public static function getList_workid($workid,$username=""){//預設人員使用
        global $db;
        $table = coderDBConf::$admin;
        $where = "";
        if($workid>0){
            $where .= "WHERE FIND_IN_SET($workid,`work`) and isadmin=0";
            if($username!=""){
                $where .= " or (`username`='{$username}')";
            }
        }
        $sql = "SELECT `username` as value,CONCAT(`username`,' / ',`name`) as name
                FROM $table
                $where
                ORDER BY `id` DESC";
        return $db -> fetch_all_array($sql);
    }

    /* 公司別 廠別 工作中心 判斷 ↓*/
    /* 列表判斷
     * $colname 資料表欄位陣列
     * $name 搜尋名稱
     * $wherename $adminuser要搜尋的KEY
     * $wheresql 原本的where變數
     * $first 前贅
     * */
    public static function getWhere_lv($colname,$name,$wherename,$wheresql,$first="")
    {
        global $adminuser;
        if($adminuser['isadmin']==0){ //不是管理員
            $wheresql .= ($wheresql == '' ? '' : ' AND ') . $first."`{$colname[$name]}` = " . $adminuser[$wherename];
        }
        return $wheresql;
    }

    /* 寫入判斷
     * $colname 資料表欄位陣列
     * $name 寫入名稱
     * $dataname $adminuser要寫入的KEY
     * $data 原本的data array
     * */
    public static function getData_lv($colname,$name,$dataname,$data)
    {
        global $adminuser;
        if($adminuser['isadmin']==0){ //不是管理員
            $data[$colname[$name]] = $adminuser[$dataname];
        }
        return $data;
    }


    /* 判斷是否預覽
     * $dataname $adminuser要寫入的KEY
     * $data if比較
     * $error_text 錯誤訊息
     * */
    public static function getPreview_lv($dataname,$data,$error_text)
    {
        global $adminuser;
        if($adminuser['isadmin']==0){ //不是管理員
            if($data!=$adminuser[$dataname]) {
                die("ERROR::".$error_text);
            }
        }
    }
    /* 公司別 廠別 工作中心 判斷 ↑*/

    public static function getList_mselect(){
        global $db;
        $table = coderDBConf::$admin;
        $sql = "select `username` as value,CONCAT(`username`,' / ',`name`) as name
				from $table
				ORDER BY 'id' DESC";

        return $db -> fetch_all_array($sql);
    }

    public static function getName_mselect($_val){
        $ary = self::getList_mselect();
        return coderHelp::getArrayPropertyVal($ary, 'value', $_val, 'name');
    }
}
?>