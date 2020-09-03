<?php
class help{
    public static function canViewUser(){
        global $adminuser;
        return coderAdmin::isInAuth($adminuser['auth'],coderAdmin::$Auth['auth']['key'],coderAdmin::$Auth['auth']['list']['admin']['key'],coderAdminLog::$action['view']['key']);
    }
}