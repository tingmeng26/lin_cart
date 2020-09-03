<?php

$inc_path = "../inc/";
include_once($inc_path . "_config.php");
try {
  $table = coderDBConf::$contact;
  $colanme = coderDBConf::$colContact;
  $array = ['name', 'address', 'email', 'content'];

  $data = [];
  foreach ($array as $row) {
    $temp = post($row, 1);
    if (empty($temp)) {
      throw new Exception('欄位不齊全');
    }
    $data[$colanme[$row]] = post($row, 1);
  }
  $data[$colanme['phone']] = post('phone',1);
  $data[$colanme['company']] = post('company',1);

  $product = post('product', 1);
  // product 空的表示來源為odmoem  有則為既有產品
  if (empty($product)) {
    $data[$colanme['type']] = 1;
  } else {
    $data[$colanme['type']] = 2;
    $data[$colanme['p_id']] = $product;
  }

  $data[$colanme['reply']] = 0;
  $data[$colanme['notice']] = '';
  $data[$colanme['createtime']] = date('Y-m-d H:i:s');
  $data[$colanme['updatetime']] = date('Y-m-d H:i:s');
  $data[$colanme['admin']] = '';


  $db = Database::DB();
  $result  = $db->query_insert($table, $data);
  if (!$result) {
    throw new Exception('送出失敗');
  }

  $return = [
    'msg' => 'success',
    'result' => true
  ];
  echo json_encode($return);
} catch (Exception $e) {
  $return = [
    'msg' => $e->getMessage(),
    'result' => false
  ];
  echo json_encode($return);
}
