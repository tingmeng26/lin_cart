<?php
include_once('_config.php');
include_once('filterconfig.php');
$errorhandle = new coderErrorHandle();
try {
    $language = coderLang::getAbbreviation();


    $sHelp = new coderSelectHelp($db);
    $sHelp->select = "$table.*,$type.{$colType['name'.$language]}"." as typeName,$subtype.{$colSubtype['name'.$language]}"." as subtypeName";
    $sHelp->table = $table." left join $subtype on $table.{$colname['sid']} = $subtype.{$colSubtype['id']} inner join $type on $table.{$colname['tid']} = $type.{$colType['id']}";
    $sHelp->page_size = get("pagenum");
    $sHelp->page = get("page");
    $sHelp->orderby = get("orderkey", 1);
    $sHelp->orderdesc = get("orderdesc", 1);

    $sqlstr = $filterhelp->getSQLStr();
    $where = $sqlstr->SQL;

    $pt_id = get('pt_id',1);
    if(!empty($pt_id)){
      $where.=  empty($where)?" $table.pt_id = $pt_id":" and $table.pt_id=$pt_id";
    }
    $ps_id = get('ps_id');
    if(!empty($ps_id)){
      $where.=  empty($where)?" $table.ps_id = $ps_id":" and $table.ps_id=$ps_id";
    }
    $sHelp->where = $where;

    $rows = $sHelp->getList();
    for ($i = 0; $i < count($rows); $i++) {
        $rows[$i]['subtypeName'] = empty($rows[$i]['subtypeName'])?'':$rows[$i]['subtypeName'];
        //最後修改時間 
        $rows[$i][$colname['updatetime']] = coderHelp::getDateTime($rows[$i][$colname['updatetime']]);

        //公開否
        $rows[$i][$colname['ispublic']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['ispublic']]);
        // 標籤 
        $rows[$i][$colname['tag']] = coderHelp::getAryVal($PRODUCT_TAG, $rows[$i][$colname['tag']]);
        //類別
        // $rows[$i][$colname['type']] = coderHelp::getAryVal($incary_course_type, $rows[$i][$colname['type']]);

        //可否體驗
        // $rows[$i][$colname['is_exper']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['is_exper']]);

        //可否使用複訓優惠價格
        // $rows[$i][$colname['is_retrain']] = coderHelp::getAryVal($incary_yn_layout, $rows[$i][$colname['is_retrain']]);
        // $rows[$i]['num'] = 5;
        // $rows[$i]['productNum'] = 67;
        //數量
        // $rows[$i]["num"] = '<a onclick="openBox(\'../product_subtype/index.php?tid=' . $rows[$i][$colname['id']] . '\')"><span class="badge badge-large badge-' . ($rows[$i]['num'] > 0 ? 'warning' : 'default') . '" style="cursor: pointer;">' . $rows[$i]["num"] . '</span></a>';

        // $rows[$i]["productNum"] = '<a onclick="openBox(\'../course_class/index.php?id=' . $rows[$i][$colname['id']] . '&name=' . $rows[$i][$colname['nameTw']] . '\')"><span class="badge badge-large badge-' . ($rows[$i]['productNum'] > 0 ? 'warning' : 'default') . '" style="cursor: pointer;">' . $rows[$i]["productNum"] . '</span></a>';
        $rows[$i][$colname['admin']] = empty($rows[$i][$colname['admin']])?'':$rows[$i][$colname['admin']];
        // 商品縮圖
        $pics = $rows[$i][$colname['pic']];
        $rows[$i][$colname['pic']] = '<a href="javascript:void(0)">' . (!empty($pics) ? '<img src="' . $file_path . 'b' . $pics . '" style="max-width:60px;width:auto" onerror="this.src=\'\'">' : '') . '</a>';

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
