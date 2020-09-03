<?php
class class_lang_data{
    public static function getList(){
        global $db;
        $table=coderDBConf::$lang_data;
        $colname=coderDBConf::$col_lang_data;
        $sql = "SELECT `{$colname['id']}` as `id`,`{$colname['ispublic']}` as `ispublic`,
                       `{$colname['lang']}` as `lang`,`{$colname['name']}` as `name`,
                       `{$colname['remark']}` as `remark`
                FROM $table
                WHERE 1 and `{$colname['ispublic']}`=1
                ORDER BY `{$colname['ind']}` DESC";
        $rows = $db->fetch_all_array($sql);
        return $rows;
    }

    public static function getList_mselect(){
        global $db;
        $table=coderDBConf::$lang_data;
        $colname=coderDBConf::$col_lang_data;
        $sql = "select `{$colname['lang']}` as value,`{$colname['lang']}` as name
				from $table
				ORDER BY `{$colname['ind']}` DESC";

        return $db -> fetch_all_array($sql);
    }

    public static function getList_ary1(){ //使用 二為轉一維
        global $db;
        $ary = self::getList_mselect();
        $_array = coderHelp::arraytwochangearrayone($ary, 'value', 'name');
        return $_array;
    }

    public static function getList_mselect2(){
        global $db;
        $table=coderDBConf::$lang_data;
        $colname=coderDBConf::$col_lang_data;
        $sql = "select `{$colname['lang']}` as value,CONCAT(`{$colname['lang']}`,' / ',`{$colname['name']}`) as name
				from $table
				ORDER BY `{$colname['ind']}` DESC";

        return $db -> fetch_all_array($sql);
    }

    public static function getName_mselect($type,$_val){
        //$ary = self::getList_mselect();
        switch ($type){
            case 1: //只有國家代碼
                $ary = self::getList_mselect();
                break;
            case 2: //只有國家代碼 / 代碼名稱
                $ary = self::getList_mselect2();
                break;
        }
        return coderHelp::getArrayPropertyVal($ary, 'value', $_val, 'name');
    }

    public static function getList_one($lang){
        global $db;
        $table=coderDBConf::$lang_data;
        $colname=coderDBConf::$col_lang_data;
        $sql = "select `{$colname['lang']}` as value,`{$colname['lang']}` as name
				from $table
				WHERE `{$colname['lang']}` = :lang
				ORDER BY `{$colname['ind']}` DESC";

        return $db -> query_prepare_first($sql,array(':lang'=>$lang));
    }
}