<?php
class class_lang_dictionary
{
    public static function getList()
    {
        global $db;
        $table = coderDBConf::$lang_dictionary;
        $colname = coderDBConf::$col_lang_dictionary;
        $sql = "SELECT `{$colname['id']}` as `id`,`{$colname['val']}` as `val`,
                       `{$colname['ld_lang']}` as `ld_lang`,`{$colname['key']}` as `key`,
                       `{$colname['english']}` as `english`
                FROM $table
                ORDER BY `{$colname['id']}` DESC";
        $rows = $db->fetch_all_array($sql);
        return $rows;
    }

    public static function getlangcache($lang)
    {
        global $db;
        $table = coderDBConf::$lang_dictionary;
        $colname = coderDBConf::$col_lang_dictionary;
        $sql = "SELECT `{$colname['id']}` as `id`,`{$colname['val']}` as `val`,
                       `{$colname['ld_lang']}` as `ld_lang`,`{$colname['key']}` as `key`,
                       `{$colname['english']}` as `english`
                FROM $table
                WHERE 1 and `{$colname['ld_lang']}`=:lang
                ORDER BY `{$colname['id']}` DESC";
        $rows = $db->fetch_all_array($sql, array(":lang" => $lang));
        return $rows;
    }

    public static function getList_mselect2()
    {
        global $db;
        $table = coderDBConf::$lang_dictionary;
        $colname = coderDBConf::$col_lang_dictionary;
        $sql = "SELECT `{$colname['id']}` as value,`{$colname['key']}` as name
                from $table
                GROUP BY `{$colname['key']}`
                ORDER BY `{$colname['id']}` DESC";
        $rows = $db->fetch_all_array($sql);
        return $rows;
    }

    public static function getList_ary1()
    { //使用 二為轉一維
        global $db;
        $ary = self::getList_mselect2();
        $_array = coderHelp::arraytwochangearrayone($ary, 'value', 'name');
        return $_array;
    }

    public static function getList_one($ld_lang, $key)
    {
        global $db;
        $table = coderDBConf::$lang_dictionary;
        $colname = coderDBConf::$col_lang_dictionary;
        $sql = "SELECT `{$colname['id']}` as value,`{$colname['key']}` as name
                from $table
                WHERE `{$colname['ld_lang']}` = :ld_lang  and `{$colname['key']}` = :key 
                ORDER BY `{$colname['id']}` DESC";

        return $db->query_prepare_first($sql, array(':key' => $key, ':ld_lang' => $ld_lang));
    }
}
