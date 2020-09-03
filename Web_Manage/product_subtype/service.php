<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle = new coderErrorHandle();
try {
  $db = Database::DB();
  $sHelp = new coderSelectHelp($db);
  $typeName = $colType['name' . coderLang::getAbbreviation()];
  $sHelp->select = "*,$type.{$typeName} as typeName, (SELECT count(1) FROM {$product} p WHERE p.{$colProduct['sid']} = {$table}.`{$colname['id']}`) as num";
  $sHelp->table = $table . " inner join {$type} on $table.{$colname['tid']} = $type.{$colType['id']}";
  $sHelp->page_size = get("pagenum");
  $sHelp->page = get("page");
  $sHelp->orderby = get("orderkey", 1);
  $sHelp->orderdesc = get("orderdesc", 1);
  $sqlstr = $filterhelp->getSQLStr();
  $where = $sqlstr->SQL;
  $sHelp->where = $where;

  
  $rows = $sHelp->getList();
  for ($i = 0; $i < count($rows); $i++) {
    //最後修改時間
    $rows[$i][$colname['updatetime']] = coderHelp::getDateTime($rows[$i][$colname['updatetime']]);

    //公開否
    $rows[$i][$colname['ispublic']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['ispublic']]);
    // $rows[$i]['num'] = 5;
    //數量
    $rows[$i]["num"] = '<a onclick="openBox(\'../product/index.php?sid=' . $rows[$i][$colname['id']]. '\',null,null,\'fade\',function(){$(\'#refreshBtn\').click()}) "><span class="badge badge-large badge-' . ($rows[$i]['num'] > 0 ? 'warning' : 'default') . '" style="cursor: pointer;">' . $rows[$i]["num"] . '</span></a>';

    $rows[$i][$colname['admin']] = empty($rows[$i][$colname['admin']]) ? '' : $rows[$i][$colname['admin']];
  }

  $result['result'] = true;
  $result['data'] = $rows;
  $result['page'] = $sHelp->page_info;
  echo json_encode($result);
} catch (Exception $e) {
  $errorhandle->setException($e); // 收集例外
}

if ($errorhandle->isException()) {
  $result['result'] = false;
  $result['data'] = $errorhandle->getErrorMessage();
  echo json_encode($result);
}
