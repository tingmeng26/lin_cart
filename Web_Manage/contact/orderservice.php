<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle = new coderErrorHandle();
try {
  $success = false;
  $count = 0;
  $msg = "未知錯誤,請聯絡系統管理員";

  $method = post('method', 1);
  $id = post('order_id', 1);
  if (empty($method) || empty($id)) {
    throw new Exception($msg);
  }
  $db = Database::DB();
  $sql = "select {$colname['ind']} as ind from $table where {$colname['id']}=:id";
  $data = $db->query_first($sql, [':id' => $id]);
  if (empty($data['ind'])) {
    throw new Exception($msg);
  }
  $searchInd = $data['ind'];

  if ($method == 'up') {
    $sql = "select {$colname['ind']} as ind from $table where {$colname['ind']} > :ind";
  } else {
    $sql = "select {$colname['ind']} as ind from $table where {$colname['ind']} < :ind";
  }
  $data = $db->query_first($sql, [':ind' => $searchInd]);
  // 表示有可以往上或往下交換的資料
  // 將 data['ind'] 改為 search ind 再將 id 的ind 改為 data['ind']
  if (!empty($data['ind'])) {
    $targetInd = $data['ind'];
    $db->query_update($table, [$colname['ind'] => $searchInd], " {$colname['ind']}='{$targetInd}'");
    $db->query_update($table, [$colname['ind'] => $targetInd], " {$colname['id']}='{$id}'");
  }
  $msg = '修改成功';
  $success = true;
  $result['result'] = $success;
  $result['count'] = $count;
  $result['msg'] = $msg;
  echo json_encode($result);
} catch (Exception $e) {
  $errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
  $result['result'] = false;
  $result['msg'] = $errorhandle->getErrorMessage();
  echo json_encode($result);
}
