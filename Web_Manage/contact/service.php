<?php
include_once('_config.php');

include_once('filterconfig.php');
$errorhandle = new coderErrorHandle();
try {
  $db = Database::DB();
  $sHelp = new coderSelectHelp($db);
  $sHelp->select = "*";
  $sHelp->table = $table;
  $sHelp->page_size = get("pagenum");
  $sHelp->page = get("page");
  $sHelp->orderby = get("orderkey", 1);
  $sHelp->orderdesc = get("orderdesc", 1);

  $sqlstr = $filterhelp->getSQLStr();
  $where = $sqlstr->SQL;
  switch (get('type',1)) {
    case 'oemodm':
      $contactType = $CONTACT_CONDITION_TYPE['oemodm'];
      break;
    case 'product':
      $contactType = $CONTACT_CONDITION_TYPE['product'];
      break;
    default:
      throw new Exception('您沒有權限進行此項操作');
      break;
  }
  $where = empty($where)? " $table.{$colname['type']} = $contactType" :  $where." and $table.{$colname['type']} = $contactType";

  if(!empty(get('status',1))){
    $where.= " and $table.{$colname['reply']} = '0'";
  }
  $sHelp->where = $where;

  $rows = $sHelp->getList();

  for ($i = 0; $i < count($rows); $i++) {
    //最後修改時間
    $rows[$i][$colname['updatetime']] = coderHelp::getDateTime($rows[$i][$colname['updatetime']]);

    $rows[$i][$colname['reply']] = coderHelp::getAryVal($CONTACT_TYPE, $rows[$i][$colname['reply']]);


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
