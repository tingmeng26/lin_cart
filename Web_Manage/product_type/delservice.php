<?php
include_once('_config.php');
$errorhandle = new coderErrorHandle();
try {

  $success = false;
  $count = 0;
  $msg = coderLang::t("delmsg1", 1);

  $id = request_ary('id', 0);

  if (count($id) > 0) {
    $db = Database::DB();
    $idlist = "'" . implode("','", $id) . "'";

    $countProduct = $db->queryCount("SELECT 1 FROM $product WHERE {$colProduct['tid']} IN ($idlist)"); //報名
    if ($countProduct > 0) {
      throw new exception("已有產品資料，無法刪除!");
    }

    $countSubtype = $db->queryCount("SELECT 1 FROM $subtype WHERE {$colSubtype['tid']} IN ($idlist)"); //報名
    if ($countSubtype > 0) {
      throw new exception("已有子項目資料，無法刪除!");
    }

    
    $count = $db->exec("delete from $table where `{$colname['id']}` in($idlist)");
    if ($count > 0) {
      coderAdminLog::insert($adminuser['username'], $main_auth_key, $fun_auth_key, 'del', $count . coderLang::t("delmsg2", 1) . '(' . $idlist . ')'); //筆資料
      $success = true;
    } else {
      throw new Exception(coderLang::t("delmsg3", 1)); //查無刪除資料
    }
    $db->close();
  } else {
    $msg = coderLang::t("delmsg4", 1);
  }

  $result['result'] = $success;
  $result['count'] = $count;
  $result['msg'] = hc($errorhandle->getErrorMessage());
  echo json_encode($result);
} catch (Exception $e) {
  $errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
  $result['result'] = false;
  $result['msg'] = $errorhandle->getErrorMessage();
  echo json_encode($result);
}
