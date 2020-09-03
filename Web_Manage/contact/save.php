<?php
include_once('_config.php');
include_once('formconfig.php');

$errorhandle = new coderErrorHandle();
try {
    $db = Database::DB();
    $id = post($colname['id'], 1);
    if ($id != "") {
        $method = 'edit';
        $active = '編輯';
    } else {
        $method = 'add';
        $active = '新增';
    }

    $data = $fhelp->getSendData();
    // var_dump($data);exit;
    $error = $fhelp->vaild($data);
    if (count($error) > 0) {
        $msg = implode('<br/>', $error);
        throw new Exception($msg);
    }

    $nowtime = datetime();
    $data[$colname['admin']] = $adminuser['username'];
    $data[$colname['updatetime']] = $nowtime;

    if ($method == 'edit') {
        $db->query_update($table, $data, " {$colname['id']}='{$id}'");
    } else {
        // $data[$colname["ind"]] = coderListOrderHelp::getMaxInd($table, $colname["ind"]);
        $data[$colname['createtime']] = $nowtime;
        $db->query_insert($table, $data);
    }


    coderAdminLog::insert($adminuser['username'],$main_auth_key,$fun_auth_key,$method,$page_title." id:{$id}");
    
    
    $db->close();
    echo showParentSaveNote($auth['name'],$active,$page_title,"manage.php?id=".$id);
} catch (Exception $e) {
    $errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
    $errorhandle->showError();
}
?>
