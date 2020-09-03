<?php
include_once('_config.php');
include_once('formconfig.php');
$errorhandle = new coderErrorHandle();
$id = get('id', 1);
$manageinfo = "";
try {
  if ($id != "") {
    $db = Database::DB();
    // $colname['picgroup'] = '';
    $row = $db->query_prepare_first("select * from $table  WHERE {$colname['id']}=:id", array(':id' => $id));
    // var_dump($row);exit;
    if (empty($row)) {
      throw new Exception(coderLang::t('error1', 1));
    }
    $subtypeList = class_product::getSubtypeList($row[$colname['tid']]);
    if (!empty($subtypeList)) {
      $fhelp->setAttr($colname['sid'], 'ary', $subtypeList);
    }


    $row[$colname['pics']] = htmlspecialchars($row[$colname['pics']]);
    $row[$colname['sizePic']] = htmlspecialchars($row[$colname['sizePic']]);
    $manageinfo = '  ' . coderLang::t("manage1", 1) . ' : ' . $row[$colname['admin']] . ' | ' . coderLang::t("manage2", 1) . ' : ' . $row[$colname['createtime']] . ' | ' . coderLang::t("manage3", 1) . ' : ' . $row[$colname['updatetime']];
    $row[$colname['descriptionTw']] = removebr($row[$colname['descriptionTw']]);
    $row[$colname['descriptionEn']] = removebr($row[$colname['descriptionEn']]);
    $row[$colname['descriptionJp']] = removebr($row[$colname['descriptionJp']]);
    $row[$colname['sizeTw']] = removebr($row[$colname['sizeTw']]);
    $row[$colname['sizeEn']] = removebr($row[$colname['sizeEn']]);
    $row[$colname['sizeJp']] = removebr($row[$colname['sizeJp']]);
    $row[$colname['materialTw']] = removebr($row[$colname['materialTw']]);
    $row[$colname['materialEn']] = removebr($row[$colname['materialEn']]);
    $row[$colname['materialJp']] = removebr($row[$colname['materialJp']]);
    $row[$colname['heavyTw']] = removebr($row[$colname['heavyTw']]);
    $row[$colname['heavyEn']] = removebr($row[$colname['heavyEn']]);
    $row[$colname['heavyJp']] = removebr($row[$colname['heavyJp']]);
    $row[$colname['colorTw']] = removebr($row[$colname['colorTw']]);
    $row[$colname['colorEn']] = removebr($row[$colname['colorEn']]);
    $row[$colname['colorJp']] = removebr($row[$colname['colorJp']]);
    $row[$colname['capacityTw']] = removebr($row[$colname['capacityTw']]);
    $row[$colname['capacityEn']] = removebr($row[$colname['capacityEn']]);
    $row[$colname['capacityJp']] = removebr($row[$colname['capacityJp']]);
    $row[$colname['commentTw']] = removebr($row[$colname['commentTw']]);
    $row[$colname['commentEn']] = removebr($row[$colname['commentEn']]);
    $row[$colname['commentJp']] = removebr($row[$colname['commentJp']]);
    $row[$colname['statusTw']] = removebr($row[$colname['statusTw']]);
    $row[$colname['statusEn']] = removebr($row[$colname['statusEn']]);
    $row[$colname['statusJp']] = removebr($row[$colname['statusJp']]);
    $fhelp->bindData($row);
    $method = 'edit';
    $active = coderLang::t('edit', 1);

    $db->close();
  } else {
    $method = 'add';
    $active = coderLang::t('add', 1);
    $sid = get('sid', 1);
    $tid = get('tid', 1);
    if (!empty($tid)) {
      $fhelp->setAttr($colname['tid'], 'default', $tid);
      
    }

    if (!empty($sid)) {
      $sql = "select pt_id from product_stype where ps_id=:sid  order by ps_ind desc";
      $typeId = $db->query_first($sql, [':sid' => $sid]);
      $typeId = $typeId['pt_id'] ?? 0;
      if (empty($typeId)) {
        throw new Exception(coderLang::t('error1', 1));
      }
      $fhelp->setAttr($colname['tid'], 'default', $typeId);
      $fhelp->setAttr($colname['sid'], 'ary', $subtypeList);
      $fhelp->setAttr($colname['sid'], 'default', $sid);
    }
  }
} catch (Exception $e) {
  $db->close();
  $errorhandle->setException($e);
}
if ($errorhandle->isException()) {
  $errorhandle->showError();
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include('../head.php'); ?>
  <link href="../css/codertextgroup.css" rel="stylesheet" type="text/css" />
  <script language="javascript" type="text/javascript">
    <?php
    // 列表圖片
    $pic_pic = (isset($row)) ? $row[$colname['pic']] : '';
    coderFormHelp::drawPicScript($method, $file_path, $pic_pic, 'pic_pic');
    $pic_pic1 = (isset($row)) ? $row[$colname['pic1']] : '';
    coderFormHelp::drawPicScript($method, $file_path, $pic_pic1, 'org_pic1');
    $pic_pic2 = (isset($row)) ? $row[$colname['pic2']] : '';
    coderFormHelp::drawPicScript($method, $file_path, $pic_pic2, 'org_pic2');
    $pic_pic3 = (isset($row)) ? $row[$colname['pic3']] : '';
    coderFormHelp::drawPicScript($method, $file_path, $pic_pic3, 'org_pic3');
    $pic_pic4 = (isset($row)) ? $row[$colname['pic4']] : '';
    coderFormHelp::drawPicScript($method, $file_path, $pic_pic4, 'org_pic4');


    // $sizePic = (isset($row)) ? $row[$colname['sizePic']] : '';
    // coderFormHelp::drawPicScript($method, $file_path, $sizePic, 'sizePic');
    ?>
  </script>
</head>

<body>
  <!-- BEGIN Container -->
  <div class="container" id="main-container">
    <!-- BEGIN Content -->
    <div id="main-content">
      <!-- BEGIN Page Title -->
      <div class="page-title">
        <div>
          <h1><i class="<?php echo $mainicon ?>"></i><?php echo $page_title ?></h1>
          <h4><?php echo $page_desc ?></h4>
        </div>
      </div>
      <!-- END Page Title -->
      <?php if ($manageinfo != '') { ?>
        <div class="alert alert-info">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong><?php echo coderLang::t('manage4', 1) ?> : </strong> <?php echo $manageinfo ?>
        </div>
      <?php } ?>
      <!-- BEGIN Main Content -->
      <div class="row">
        <form class="form-horizontal" action="save.php" id="myform" name="myform" method="post" enctype="multipart/form-data">
          <?php echo $fhelp->drawForm($colname['id']) ?>
          <div class="col-md-12">
            <div class="box">
              <div class="box-title">
                <h3><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . $active ?></h3>
                <div class="box-tool">
                  <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                  <a data-action="close" href="#"><i class="icon-remove"></i></a>
                </div>
              </div>
              <div class="box-content">
                <div>
                  <ul id="myTab1" class="nav nav-tabs">
                    <?php foreach ($m_lang_data as $key => $value) {
                      $active1 = $key == $user_lang ? 'active' : '';
                      echo '<li class="' . $active1 . ' lang_btn" data-lang="' . $key . '"><a href="#">' . $value . '</a></li>';
                    } ?>
                  </ul>
                </div>
                <div class="row">
                  <br>
                  <!--left start-->
                  <div class="col-md-5">
                    <!--公開否-->
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['ispublic']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['ispublic']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['tag']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['tag']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sno']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['sno']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['tid']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['tid']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sid']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['sid']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['pic']) ?> </label>
                      <div class="col-sm-7 controls">
                        <div id="pic_pic"></div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['linkEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['linkEn']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['linkTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['linkTw']) ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['linkJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['linkJp']) ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo coderLang::t('file', 1) ?>
                      </label>
                      <div class="col-sm-7 controls">
                        <input type="file" name="file" class="form-control">
                        <?php if (!empty($row[$colname['file']])) { ?>
                          <div class="col-sm-2 controls icon-file">
                            <?php echo $row[$colname['file']] ?>
                          </div>
                          <input type="hidden" name="oldFile" value="<?php echo $row[$colname['file']] ?>">
                        <?php } ?>
                      </div>
                    </div>

                    
                  </div>
                  <div class="col-md-5">

                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['nameEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['nameEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['nameTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['nameTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['nameJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['nameJp']) ?>
                      </div>
                    </div>


                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['descriptionEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['descriptionEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['descriptionTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['descriptionTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['descriptionJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['descriptionJp']) ?>
                      </div>
                    </div>

                    <!--產品圖片-->

                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sizeEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['sizeEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sizeTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['sizeTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sizeJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['sizeJp']) ?>
                      </div>
                    </div>

                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['materialEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['materialEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['materialTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['materialTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['materialJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['materialJp']) ?>
                      </div>
                    </div>


                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['heavyEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['heavyEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['heavyTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['heavyTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['heavyJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['heavyJp']) ?>
                      </div>
                    </div>



                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['colorEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['colorEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['colorTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['colorTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['colorJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['colorJp']) ?>
                      </div>
                    </div>


                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['capacityEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['capacityEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['capacityTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['capacityTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['capacityJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['capacityJp']) ?>
                      </div>
                    </div>

                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['commentEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['commentEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['commentTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['commentTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['commentJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['commentJp']) ?>
                      </div>
                    </div>


                    <div class="form-group lang-div show_en">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['statusEn']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['statusEn']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_zh-cht">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['statusTw']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['statusTw']) ?>
                      </div>
                    </div>
                    <div class="form-group lang-div show_jp">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['statusJp']) ?> </label>
                      <div class="col-sm-7 controls">
                        <?php echo $fhelp->drawForm($colname['statusJp']) ?>
                      </div>
                    </div>

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php echo coderLang::t('manage5', 1) ?><?php echo $active ?></button>
                      <button type="button" class="btn" onClick="if(confirm('<?php echo coderLang::t('manage6', 1) ?><?php echo $active ?>?')){parent.closeBox();}"><i class="icon-remove"></i>取消<?php echo $active ?></button>
                    </div>




                    <!-- <div class="form-group ">
                      <label class="col-sm-3 col-lg-3 control-label">
                        <?php echo $fhelp->drawLabel($colname['sizePic']) ?> </label>
                      <div class="col-sm-7 controls">
                      <div id="sizePic"></div>
                      </div>
                    </div> -->






                  </div>
                  <!-- right end -->



                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <!--多圖上傳 start-->
              <div class="col-md-6">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="<?php echo $mainicon ?>"></i> <?php echo coderLang::t('pics', 1) ?> - <?php echo $active ?>
                      <?php echo coderLang::t('coderlisthelp2', 1) ?>
                    </h3>
                    <div class="box-tool"><a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="icon-remove"></i></a></div>
                  </div>
                  <div class="box-content">
                    <div class="row">
                      <!--left start-->
                      <div class="col-md-12">
                        <?php echo $fhelp->drawForm($colname['pics']) ?>
                        <div class="col-md-12">
                          <div class="form-group">

                            <div class="controls">

                              <div id="item_content"></div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!--left end-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="<?php echo $mainicon ?>"></i> <?php echo coderLang::t('sizePic', 1) ?> - <?php echo $active ?>
                      <?php echo coderLang::t('coderlisthelp2', 1) ?>
                      <!--操作 -->
                    </h3>
                    <div class="box-tool"><a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="icon-remove"></i></a></div>
                  </div>
                  <div class="box-content">
                    <div class="row">
                      <!--left start-->
                      <div class="col-md-12">
                        <?php echo $fhelp->drawForm($colname['sizePic']) ?>
                        <div class="col-md-11">
                          <div class="form-group">
                            <label class="col-sm-3 col-lg-1 control-label">
                              <?php echo coderLang::t('sizePic', 1) ?>
                              <!--產品尺寸圖 -->
                            </label>
                            <div class="col-sm-11 controls">
                              <div class="">
                                <div id="item_content1"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--left end-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--多圖上傳 end-->




          <div class="col-md-12">
            <div class="row">
              <!--產品介紹 start-->
              <div class="col-md-12">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="<?php echo $mainicon ?>"></i> <?php echo coderLang::t('productIndroduction', 1) ?>
                      <!--產品介紹 -->
                    </h3>
                    <div class="box-tool"><a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="icon-remove"></i></a></div>
                  </div>
                  <div class="box-content">
                    <div class="row">
                      <!--left start-->
                      <div class="col-md-5  col-md-offset-1">

                        <fieldset>
                          <legend> <?php echo coderLang::t('productIndroduction', 1) ?></legend>
                          <div class="form-group ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['pic1']) ?> </label>
                            <div class="col-sm-7 controls">
                              <div id="pic1"></div>
                            </div>
                          </div>
                          <div class="form-group lang-div show_en ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textEn1']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textEn1']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_zh-cht">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textTw1']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textTw1']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_jp">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textJp1']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textJp1']) ?>
                            </div>
                          </div>
                        </fieldset>
                        <fieldset>
                          <legend> <?php echo coderLang::t('productIndroduction', 1) ?>2</legend>
                          <div class="form-group ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['pic2']) ?> </label>
                            <div class="col-sm-7 controls">
                              <div id="pic2"></div>
                            </div>
                          </div>
                          <div class="form-group lang-div show_en ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textEn2']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textEn2']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_zh-cht">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textTw2']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textTw2']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_jp">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textJp2']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textJp2']) ?>
                            </div>
                          </div>
                        </fieldset>


                      </div>
                      <!--left end-->

                      <div class="col-md-5 col-md-offset-1">
                        <fieldset>
                          <legend> <?php echo coderLang::t('productIndroduction', 1) ?>3</legend>
                          <div class="form-group ">
                            <label class="col-sm-3 col-lg-3 control-labe">
                              <?php echo $fhelp->drawLabel($colname['pic3']) ?> </label>
                            <div class="col-sm-7 controls">
                              <div id="pic3"></div>
                            </div>
                          </div>
                          <div class="form-group lang-div show_en ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textEn3']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textEn3']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_zh-cht">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textTw3']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textTw3']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_jp">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textJp3']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textJp3']) ?>
                            </div>
                          </div>
                        </fieldset>


                        <fieldset>
                          <legend> <?php echo coderLang::t('productIndroduction', 1) ?>4</legend>
                          <div class="form-group ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['pic4']) ?> </label>
                            <div class="col-sm-7 controls">
                              <div id="pic4"></div>
                            </div>
                          </div>
                          <div class="form-group lang-div show_en ">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textEn4']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textEn4']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_zh-cht">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textTw4']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textTw4']) ?>
                            </div>
                          </div>
                          <div class="form-group lang-div show_jp">
                            <label class="col-sm-3 col-lg-3 control-label">
                              <?php echo $fhelp->drawLabel($colname['textJp4']) ?> </label>
                            <div class="col-sm-7 controls">
                              <?php echo $fhelp->drawForm($colname['textJp4']) ?>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--產品介紹 end-->


              <!--產品介紹 start-->
              <div class="col-md-12">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="<?php echo $mainicon ?>"></i> <?php echo coderLang::t('productIndroduction', 1) ?>
                    </h3>
                    <div class="box-tool"><a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="icon-remove"></i></a></div>
                  </div>
                  <div class="box-content">
                    <div class="row">
                      <!--left start-->
                      <div class="col-md-12 lang-div show_en ">
                        <div class="form-group ">
                          <label class="col-sm-3 col-lg-3 control-label">
                            <?php echo $fhelp->drawLabel($colname['contentEn']) ?> </label>
                          <div class="col-sm-7 controls">
                            <?php echo $fhelp->drawForm($colname['contentEn']) ?>
                          </div>
                        </div>



                      </div>
                      <!--left end-->

                      <div class="col-md-12 lang-div show_zh-cht ">
                        <div class="form-group ">
                          <label class="col-sm-3 col-lg-3 control-label">
                            <?php echo $fhelp->drawLabel($colname['contentTw']) ?> </label>
                          <div class="col-sm-7 controls">
                            <?php echo $fhelp->drawForm($colname['contentTw']) ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 lang-div show_jp">
                        <div class="form-group ">
                          <label class="col-sm-3 col-lg-3 control-label">
                            <?php echo $fhelp->drawLabel($colname['contentJp']) ?> </label>
                          <div class="col-sm-7 controls">
                            <?php echo $fhelp->drawForm($colname['contentJp']) ?>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!--產品介紹 end-->


              <!--操作 start-->
              <div class="col-md-12">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="<?php echo $mainicon ?>"></i> <?php echo coderLang::t('coderlisthelp2', 1) ?>
                    </h3>
                    <div class="box-tool"><a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="icon-remove"></i></a></div>
                  </div>
                  <div class="box-content">
                    <div class="row">
                      <div class="col-md-12 ">
                        <div class="form-group text-center">
                          <button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php echo coderLang::t('manage5', 1) ?><?php echo $active ?></button>
                          <button type="button" class="btn" onClick="if(confirm('<?php echo coderLang::t('manage6', 1) ?><?php echo $active ?>?')){parent.closeBox();}"><i class="icon-remove"></i>取消<?php echo $active ?></button>
                        </div>
                      </div>



                    </div>
                  </div>
                </div>
              </div>
              <!--操作 end-->
            </div>
          </div>

        </form>
      </div>
      <!-- END Main Content -->
      <?php include('../footer.php'); ?>
      <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- END Content -->
  </div>
  <!-- END Container -->

  <?php include('../js.php'); ?>
  <script type="text/javascript" src="../assets/jquery-validation/dist/jquery.validate.js"></script>
  <script type="text/javascript" src="../assets/jquery-validation/dist/additional-methods.js"></script>
  <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="../js/codertextgroup.js"></script>
  <script type="text/javascript" src="../js/coderpicupload.js"></script>
  <script type="text/javascript">
    $.validator.setDefaults({
      submitHandler: function(form) {
        $('#<?php echo $colname['pics'] ?>').val(t1_content.getValue());

        if ($('#<?php echo $colname['pics'] ?>').val() == '[]') {
          $('#<?php echo $colname['pics'] ?>').focus();
          alert('請上傳產品圖片');
          return;
        }

       

        $('#<?php echo $colname['sizePic'] ?>').val(t1_content1.getValue());
        form.submit();
      }
    });
    $(document).ready(function() {
      // 列表圖片
      $('#pic_pic').coderpicupload({
        width: '100px',
        height: '100px',
        s_width: '100px',
        s_height: '100px',
        id: '<?php echo $colname['pic'] ?>',
        org_pic: pic_pic,
        required: false,
        pics: [{
          name: '',
          type: 6,
          tag: 'b',
          width: 100,
          height: 100
        }, {
          name: '',
          type: 6,
          tag: 'list',
          width: 260,
          height: 260
        }]
      });
      $('#pic1').coderpicupload({
        width: '100px',
        height: '100px',
        s_width: '100px',
        s_height: '100px',
        id: '<?php echo $colname['pic1'] ?>',
        org_pic: org_pic1,
        required: false,
        pics: [{
          name: '',
          type: 6,
          tag: 'b',
          width: 540,
          height: 315
        }]
      });
      $('#pic2').coderpicupload({
        width: '100px',
        height: '100px',
        s_width: '100px',
        s_height: '100px',
        id: '<?php echo $colname['pic2'] ?>',
        org_pic: org_pic2,
        required: false,
        pics: [{
          name: '',
          type: 6,
          tag: 'b',
          width: 540,
          height: 315
        }]
      });
      $('#pic3').coderpicupload({
        width: '100px',
        height: '100px',
        s_width: '100px',
        s_height: '100px',
        id: '<?php echo $colname['pic3'] ?>',
        org_pic: org_pic3,
        required: false,
        pics: [{
          name: '',
          type: 6,
          tag: 'b',
          width: 540,
          height: 315
        }]
      });
      $('#pic4').coderpicupload({
        width: '100px',
        height: '100px',
        s_width: '100px',
        s_height: '100px',
        id: '<?php echo $colname['pic4'] ?>',
        org_pic: org_pic4,
        required: false,
        pics: [{
          name: '',
          type: 6,
          tag: 'b',
          width: 540,
          height: 315
        }]
      });

      <?php echo coderFormHelp::drawVaildScript(); ?>
      $("#product_sno").rules("add", {
        messages: {
            remote: "料號不可重複",
        },
        remote: {
            url: "checkSno.php",
            type: "post",
            data: {
                data: function () {
                    return $('#product_sno').val()
                },
                id: "<?php echo $id?>",
            }
        }
    });
      $('li.lang_btn').each(function() {
        $(this).click(function() {
          $(this).siblings().removeClass("active");
          $(this).addClass("active");
          checklang();
        });
      });
      checklang();

      var tid = '<?php echo $tid?>';
      if(tid >0){
        getSubtype(tid);
      }
    })


    function checklang() {
      var $lang_btn = $('li.lang_btn.active');
      var $key = $lang_btn.attr('data-lang');

      $('div.lang-div').hide();
      $('div.lang-div.show_' + $key).show();
    }

    function getSubtype(value) {
      jQuery.ajax({
        type: "POST",
        url: 'getSubtype.php',
        dataType: 'json',
        data: {
          value: value
        },
        success: function(result) {
          if (result.result) {
            console.log(result.data);
            $('#ps_id').html(result.data);
          }

        }
      });
    }

    var option_content = [{
      'key': '<?php echo $colname['pics'] ?>_pic',
      'name': '<span style="color:red">*</span>圖片 330x330',
      'width': '100%',
      'type': 'pic',
      'pics': <?php echo class_product::getPorducImageSize() ?>,
      's_width': '60px',
      's_height': '60px',
      'file_path': '<?php echo $file_path ?>',
    }];
    var t1_content = new CODER.Util.TextGroup("item_content", "產品圖片", "", option_content, false, '', false, false, false);
    t1_content.init();
    if ($("#<?php echo $colname['pics'] ?>").val() !== "") {
      var a = $("#<?php echo $colname['pics'] ?>").val();
      var _def = JSON.parse(a);
      t1_content.initValue(_def);
    }

    var option_content1 = [{
      'key': '<?php echo $colname['sizePic'] ?>_pic',
      'name': '圖片',
      'width': '100%',
      'type': 'pic',
      'pics': [],
      's_width': '60px',
      's_height': '60px',
      'file_path': '<?php echo $file_path ?>',
    }];
    var t1_content1 = new CODER.Util.TextGroup("item_content1", "產品尺寸圖", "", option_content1, false, '', false, false, false);
    t1_content1.init();
    if ($("#<?php echo $colname['sizePic'] ?>").val() !== "") {
      var a = $("#<?php echo $colname['sizePic'] ?>").val();
      var _def = JSON.parse(a);
      t1_content1.initValue(_def);
    }


    // function checkSno(value) {
    //   jQuery.ajax({
    //     type: "POST",
    //     url: 'checkSno.php',
    //     dataType: 'json',
    //     data: {
    //       value: value
    //     },
    //     success: function(result) {
    //       if (result.result) {
    //         $('.btn-primary').attr('disabled', false)
    //       } else {
    //         alert('料號不可重複');
    //         $('.btn-primary').attr('disabled', true)
    //       }

    //     }
    //   });

    // }
  </script>
</body>

</html>
