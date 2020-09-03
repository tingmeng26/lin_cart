<?php
include_once('_config.php');
include_once('formconfig.php');
$id = get('id');
$manageinfo = "";



if ($id != "") {
    coderAdmin::vaild($auth, 'edit');

    $db = Database::DB();
    $row = $db->query_prepare_first("select *,(select count($table_ldic.{$colname_ldic['id']}) from $table_ldic WHERE $table_ldic.{$colname_ldic['ld_lang']} = $table.{$colname['lang']}) as countnum from $table where {$colname['id']}=:id", array(':id' => $id));
    if (!$row) {
        exit;
    }

    if ($row['countnum'] > 0) {
        $fhelp->setAttr($colname['lang'], 'readonly', true);
    }


    $fhelp->bindData($row);


    $method = 'edit';
    $active = coderLang::t("edit", 1); //編輯
    $manageinfo = '  ' . coderLang::t("manage1", 1) . ' : ' . $row[$colname['admin']] . ' | ' . coderLang::t("manage2", 1) . ' : ' . $row[$colname['createtime']] . ' | ' . coderLang::t("manage3", 1) . ' : ' . $row[$colname['updatetime']]; //管理者[manage1] 建立時間[manage2] 上次修改時間[manage3]
    $db->close();
} else {
    coderAdmin::vaild($auth, 'add');

    $pic = '';
    $method = 'add';
    $active = coderLang::t("add", 1); //編輯


}


?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../head.php'); ?>
    <script language="javascript" type="text/javascript">
        <?php

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
                    <h1><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . coderLang::t("configmsg2", 1); //管理
                                                                ?></h1>
                    <h4><?php echo $page_desc ?></h4>
                </div>
            </div>
            <!-- END Page Title -->
            <?php if ($manageinfo != '') { ?>
                <div class="alert alert-info">
                    <button class="close" data-dismiss="alert">&times;</button>
                    <strong><?php coderLang::t("manage4"); //系統資訊
                            ?> : </strong> <?php echo $manageinfo ?>
                </div>
            <?php } ?>
            <!-- BEGIN Main Content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-title">
                            <h3><i class="<?php echo getIconClass($method) ?>"></i> <?php echo $page_title . $active ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form class="form-horizontal" action="save.php" id="myform" name="myform" method="post" enctype="multipart/form-data">
                                <?php echo $fhelp->drawForm($colname['id']) ?>
                                <div class="row">
                                    <!--left start-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-4 control-label">
                                                <?php echo $fhelp->drawLabel($colname['ispublic']) ?>
                                            </label>
                                            <div class="col-sm-3 controls">
                                                <?php echo $fhelp->drawForm($colname['ispublic']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-4 control-label">
                                                <?php echo $fhelp->drawLabel($colname['lang']) ?>
                                            </label>
                                            <div class="col-sm-3 controls">
                                                <?php echo $fhelp->drawForm($colname['lang']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-4 control-label">
                                                <?php echo $fhelp->drawLabel($colname['name']) ?>
                                            </label>
                                            <div class="col-sm-3 controls">
                                                <?php echo $fhelp->drawForm($colname['name']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-4 control-label">
                                                <?php echo $fhelp->drawLabel($colname['remark']) ?>
                                            </label>
                                            <div class="col-sm-3 controls">
                                                <?php echo $fhelp->drawForm($colname['remark']) ?>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-3 col-sm-offset-3 col-lg-3 col-lg-offset-4">
                                                <button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php coderLang::t("manage5"); //完成[manage5]
                                                                                                                        ?><?php echo $active ?></button>
                                                <button type="button" class="btn" onclick="if(confirm('<?php echo coderLang::t("manage6", 1) . $active; //確定要取消[manage6] 
                                                                                                        ?>?')){parent.closeBox();}"><i class="icon-remove"></i><?php echo coderLang::t("manage7", 1) . $active; //取消[manage7]
                                                                                                                                                                                                                                ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--left end-->




                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript">
        <?php echo coderFormHelp::drawVaildScript(); ?>

        $("#<?php echo $colname['lang']; ?>").rules("add", {
            messages: {
                remote: "<?php coderLang::t("langdatajs1"); //此國家代碼已被使用,請重新輸入! 
                            ?>",
            },
            remote: {
                url: "checkdata.php",
                type: "post",
                data: {
                    type: 'lang',
                    id: '<?php echo ($method == 'edit') ? $row[$colname['id']] : 0 ?>',
                    lang: function() {
                        return $("#<?php echo $colname['lang']; ?>").val()
                    }
                }
            }
        });
    </script>
</body>

</html>