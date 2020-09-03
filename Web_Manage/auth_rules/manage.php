<?php
include_once('_config.php');
include_once('formconfig.php');
$id = get('id');
$manageinfo = "";
if ($id != "") {
    coderAdmin::vaild($auth, 'edit');

    $db = new Database($HS, $ID, $PW, $DB);
    $db->connect();
    $row = $db->query_prepare_first("select * from $table where {$colname['id']}=:id", array(':id' => $id));

    //$row['auth']=coderAdmin::getAuthListAryByInt($row['auth']);
    $fhelp->bindData($row);

    $method = 'edit';
    $active = coderLang::t("edit", 1); //編輯
    $manageinfo = '  ' . coderLang::t("manage1", 1) . ' : ' . $row[$colname['admin']] . ' | ' . coderLang::t("manage2", 1) . ' : ' . $row[$colname['createtime']] . ' | ' . coderLang::t("manage3", 1) . ' : ' . $row[$colname['updatetime']]; //管理者[manage1] 建立時間[manage2] 上次修改時間[manage3]
    $db->close();
} else {
    coderAdmin::vaild($auth, 'add');
    $method = 'add';
    $active = coderLang::t("add", 1); //編輯
}


?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../head.php'); ?>
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
                            <form class="form-horizontal" action="save.php" id="myform" name="myform" method="post">
                                <?php echo $fhelp->drawForm($colname['id']) ?>
                                <div class="row">
                                    <!--right start-->
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                                <?php echo $fhelp->drawLabel($colname['superadmin']) ?>
                                            </label>
                                            <div class="col-sm-8 controls">
                                                <?php echo $fhelp->drawForm($colname['superadmin']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                                <?php echo $fhelp->drawLabel($colname['name']) ?>
                                            </label>
                                            <div class="col-sm-8  controls">
                                                <?php echo $fhelp->drawForm($colname['name']) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                                <?php echo $fhelp->drawLabel($colname['depiction']) ?>
                                            </label>
                                            <div class="col-sm-8  controls">
                                                <?php echo $fhelp->drawForm($colname['depiction']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--right end-->
                                    <!--left start-->
                                    <div class="col-md-6 ">
                                        <div id="authgroup" class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                                <?php coderLang::t("authrules2"); //權限設定[authrules2] 
                                                ?>
                                            </label>
                                            <div class="col-sm-8  controls">
                                                <?php echo coderAdmin::drawAuthForm($id) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                                <button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php coderLang::t("manage5"); //完成[manage5]
                                                                                                                        ?><?php echo $active ?></button>
                                                <button type="button" class="btn" onclick="if(confirm('<?php echo coderLang::t("manage6", 1) . $active; //確定要取消[manage6] 
                                                                                                        ?>?')){parent.closeBox();}">
                                                    <i class="icon-remove"></i><?php echo coderLang::t("manage7", 1) . $active; //取消[manage7]
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
    <script type="text/javascript" src="../js/adminauth.js"></script>
    <script type="text/javascript">
        <?php echo coderFormHelp::drawVaildScript(); ?>

        $("#<?php echo $colname['superadmin'] ?>").click(function() {
            disableAuth();
        })

        function disableAuth() {
            $('#authgroup').css('display', $("#<?php echo $colname['superadmin'] ?>").prop('checked') ? 'none' : 'block');
            $('.systembox').css('visibility', $("#<?php echo $colname['superadmin'] ?>").prop('checked') ? 'hidden' : 'visible');
        }
        disableAuth();
    </script>
</body>

</html>