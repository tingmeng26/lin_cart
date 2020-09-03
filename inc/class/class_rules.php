<?php
class class_rules{
    public static function getList(){//取name,value及nt_id
        global $db;
        $table = coderDBConf::$rules; 
        $colname = coderDBConf::$col_rules; 
        $sql = "select {$colname['name']} as name,{$colname['id']} as value 
                from $table
                ORDER BY `{$colname['id']}` DESC";
                            
        return $db -> fetch_all_array($sql);
    }
}
?>