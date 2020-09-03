<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle = new coderErrorHandle();
try {
    $db = Database::DB();
    $sHelp = new coderSelectHelp($db);
    $sHelp->select = "*, (SELECT count(1) FROM {$subtype} s WHERE s.{$colSubtype['tid']} = {$table}.`{$colname['id']}`) as num,
    (SELECT count(1) FROM {$product} s WHERE s.{$colProduct['tid']} = {$table}.`{$colname['id']}`) as productNum";
    $sHelp->table = $table;
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

        // 標籤
        // $rows[$i][$colname['tag']] = coderHelp::getAryVal($PRODUCT_TAG, $rows[$i][$colname['tag']]);

        //可否體驗
        // $rows[$i][$colname['is_exper']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['is_exper']]);

        //可否使用複訓優惠價格
        // $rows[$i][$colname['is_retrain']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['is_retrain']]);
        // $rows[$i]['num'] = 5;
        // $rows[$i]['productNum'] = 67;
        //數量
        $rows[$i]["num"] = '<a onclick="openBox(\'../product_subtype/index.php?tid=' . $rows[$i][$colname['id']] . '\',null,null,\'fade\',function(){$(\'#refreshBtn\').click()}) "><span class="badge badge-large badge-' . ($rows[$i]['num'] > 0 ? 'warning' : 'default') . '" style="cursor: pointer;">' . $rows[$i]["num"] . '</span></a>';

        $rows[$i]["productNum"] = '<a onclick="openBox(\'../product/index.php?tid=' . $rows[$i][$colname['id']] . '&name=' . $rows[$i][$colname['nameTw']] . '\',null,null,\'fade\',function(){$(\'#refreshBtn\').click()}) "><span class="badge badge-large badge-' . ($rows[$i]['productNum'] > 0 ? 'warning' : 'default') . '" style="cursor: pointer;">' . $rows[$i]["productNum"] . '</span></a>';
        $rows[$i][$colname['admin']] = empty($rows[$i][$colname['admin']])?'':$rows[$i][$colname['admin']];
        //分類縮圖
        // $pic = $rows[$i][$colname['pic']];
        // $rows[$i][$colname['pic']] = '<a href="javascript:void(0)">' . (!empty($pic) ? '<img src="' . $file_path . 'b' . $pic . '" style="max-width:60px;width:auto" onerror="this.src=\'\'">' : '') . '</a>';

        //複製
        // $rows[$i]["copy"] = "
        //     <a onclick='openBox(\"manage.php?copy={$rows[$i][$colname['id']]}\")'>
        //         <span class='btn btn-sm show-tooltip btn-warning' title='複製{$rows[$i][$colname['id']]}: {$rows[$i][$colname['title']]}' style='cursor: pointer;'>
        //             <i class='icon-copy'></i>
        //         </span>
        //     </a>";
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

?>
