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
  // textarea
  $data[$colname['descriptionTw']] = br($data[$colname['descriptionTw']]);
  $data[$colname['descriptionEn']] = br($data[$colname['descriptionEn']]);
  $data[$colname['descriptionJp']] = br($data[$colname['descriptionJp']]);
  $data[$colname['sizeTw']] = br($data[$colname['sizeTw']]);
  $data[$colname['sizeEn']] = br($data[$colname['sizeEn']]);
  $data[$colname['sizeJp']] = br($data[$colname['sizeJp']]);
  $data[$colname['materialTw']] = br($data[$colname['materialTw']]);
  $data[$colname['materialEn']] = br($data[$colname['materialEn']]);
  $data[$colname['materialJp']] = br($data[$colname['materialJp']]);
  $data[$colname['heavyTw']] = br($data[$colname['heavyTw']]);
  $data[$colname['heavyEn']] = br($data[$colname['heavyEn']]);
  $data[$colname['heavyJp']] = br($data[$colname['heavyJp']]);
  $data[$colname['colorTw']] = br($data[$colname['colorTw']]);
  $data[$colname['colorEn']] = br($data[$colname['colorEn']]);
  $data[$colname['colorJp']] = br($data[$colname['colorJp']]);
  $data[$colname['capacityTw']] = br($data[$colname['capacityTw']]);
  $data[$colname['capacityEn']] = br($data[$colname['capacityEn']]);
  $data[$colname['capacityJp']] = br($data[$colname['capacityJp']]);
  $data[$colname['commentTw']] = br($data[$colname['commentTw']]);
  $data[$colname['commentEn']] = br($data[$colname['commentEn']]);
  $data[$colname['commentJp']] = br($data[$colname['commentJp']]);
  $data[$colname['statusTw']] = br($data[$colname['statusTw']]);
  $data[$colname['statusEn']] = br($data[$colname['statusEn']]);
  $data[$colname['statusJp']] = br($data[$colname['statusJp']]);
  // 處理產品圖片 多圖
  $image = [];
  $data[$colname['pics']] = htmlspecialchars_decode($data[$colname['pics']]);
  $upload = json_decode($data[$colname['pics']], true);
  if (empty($upload[0]['product_pics_pic'])) {
    throw new Exception('請上傳產品圖片');
  }
  $uploadFile = array_column($upload, 'product_pics_pic');
  foreach ($uploadFile as $row) {
    if(!empty($row)){
      coderFormHelp::moveCopyPic($row, $file_path, $file_path, 'b');
      array_push($image,['product_pics_pic'=>$row]);
    }

  }
  $data[$colname['pics']] = empty($image)?'':json_encode($image);
  // 處理尺寸圖 多圖
  $size = [];
  $data[$colname['sizePic']] = htmlspecialchars_decode($data[$colname['sizePic']]);
  if (!empty($data[$colname['sizePic']])) {
    $upload = json_decode($data[$colname['sizePic']], true);
    if (!empty($upload[0]['product_size_pic_pic'])) {
      $uploadFile = array_column($upload, 'product_size_pic_pic');

      foreach ($uploadFile as $row) {
        if (!empty($row)) {
          coderFormHelp::moveCopyPic($row, $admin_path_temp, $file_path, 'b');
          array_push($size, ['product_size_pic_pic' => $row]);
        }
      }
    }
  }
  $data[$colname['sizePic']] = empty($size)?'':json_encode($size);
// var_dump($data[$colname['sizePic']]);exit;
  // 處理上傳檔案
  $oldFile = post('oldFile', 1);
  $data[$colname['file']] = $oldFile;
  $file = $_FILES['file'] ?? [];
  // if (empty($file['name']) && empty($oldFile)) {
  //   throw new Exception('請上傳檔案');
  // }

  if (!empty($file['name'])) {
    $fileExtention = strstr($file['name'], '.');
    $path = __DIR__ . '/' . $file_path;
    if (!is_dir($path)) {
      mkdir($path, 0755);
    }
    $fileName = time() . $fileExtention;
    $destination = __DIR__ . '/' . $file_path . $fileName;


    move_uploaded_file($file['tmp_name'], $destination);

    if (!file_exists($file_path . $fileName)) {
      throw new Exception('檔案上傳失敗');
    }
    $data[$colname['file']] = $fileName;
    if (!empty($oldFile)) {
      unlink(__DIR__ . '/' . $file_path . $oldFile);
    }
  }



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
    $data[$colname["ind"]] = coderListOrderHelp::getMaxInd($table, $colname["ind"]);
    $data[$colname['createtime']] = $nowtime;
    $id = $db->query_insert($table, $data);
  }

  // 搬圖片
  // 產品介紹 1~4
  if (!empty($data[$colname['pic1']]) && !file_exists($file_path . $data[$colname['pic1']])) {
    coderFormHelp::moveCopyPic($data[$colname['pic1']], $admin_path_temp, $file_path, 'b');
  }
  if (!empty($data[$colname['pic2']]) && !file_exists($file_path . $data[$colname['pic2']])) {
    coderFormHelp::moveCopyPic($data[$colname['pic2']], $admin_path_temp, $file_path, 'b');
  }
  if (!empty($data[$colname['pic3']]) && !file_exists($file_path . $data[$colname['pic3']])) {
    coderFormHelp::moveCopyPic($data[$colname['pic3']], $admin_path_temp, $file_path, 'b');
  }
  if (!empty($data[$colname['pic4']]) && !file_exists($file_path . $data[$colname['pic4']])) {
    coderFormHelp::moveCopyPic($data[$colname['pic4']], $admin_path_temp, $file_path, 'b');
  }
  // 處理列表圖片 b for 後台列表縮圖 list for 前台 分類明細頁顯示
  if (!empty($data[$colname['pic']]) && !file_exists($file_path . $data[$colname['pic']])) {
    coderFormHelp::moveCopyPic($data[$colname['pic']], $admin_path_temp, $file_path, 'b,list');
  }

  coderAdminLog::insert($adminuser['username'], $main_auth_key, $fun_auth_key, $method, $page_title . " id:{$id}");


  $db->close();
  echo showParentSaveNote($auth['name'], $active, $page_title, "manage.php?id=" . $id);
} catch (Exception $e) {
  $errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
  $errorhandle->showError();
}
