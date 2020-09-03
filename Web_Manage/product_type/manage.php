<?php
include_once('_config.php');
include_once('formconfig.php');
$errorhandle = new coderErrorHandle();
$id = get('id', 1);
$manageinfo = "";
try {
    if ($id != "") {
        $db = Database::DB();
        $row = $db->query_prepare_first("select * from $table  WHERE {$colname['id']}=:id", array(':id' => $id));
        // var_dump($row);exit;
        if (empty($row)) {
            throw new Exception(coderLang::t('error1',1));
        }
        $manageinfo = '  ' . coderLang::t("manage1", 1) . ' : ' . $row[$colname['admin']] . ' | ' . coderLang::t("manage2", 1) . ' : ' . $row[$colname['createtime']] . ' | ' . coderLang::t("manage3", 1) . ' : ' . $row[$colname['updatetime']];
        $fhelp->bindData($row);
        $method = 'edit';
        $active = coderLang::t('edit',1);

        $db->close();
    }  else {
        $method = 'add';
        $active = coderLang::t('add',1);
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
    <script language="javascript" type="text/javascript">
        <?php
        $pic_pic = (isset($row)) ? $row[$colname['pic']] : '';
        coderFormHelp::drawPicScript($method, $file_path, $pic_pic, 'org_pic');
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
                <strong><?php echo coderLang::t('manage4',1)?> : </strong> <?php echo $manageinfo ?>
            </div>
        <?php } ?>
        <!-- BEGIN Main Content -->
        <div class="row">
            <form class="form-horizontal" action="save.php" id="myform" name="myform" method="post">
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
                            <div class="row">
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
                                            <?php echo $fhelp->drawLabel($colname['nameEn']) ?> </label>
                                        <div class="col-sm-7 controls">
                                            <?php echo $fhelp->drawForm($colname['nameEn']) ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label class="col-sm-3 col-lg-3 control-label">
                                            <?php echo $fhelp->drawLabel($colname['nameTw']) ?> </label>
                                        <div class="col-sm-7 controls">
                                            <?php echo $fhelp->drawForm($colname['nameTw']) ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label class="col-sm-3 col-lg-3 control-label">
                                            <?php echo $fhelp->drawLabel($colname['nameJp']) ?> </label>
                                        <div class="col-sm-7 controls">
                                            <?php echo $fhelp->drawForm($colname['nameJp']) ?>
                                        </div>
                                    </div>
                                    <!--分類縮圖-->
                                    <div class="form-group ">
                                        <label class="col-sm-3 col-lg-3 control-label">
                                            <?php echo $fhelp->drawLabel($colname['pic']) ?> </label>
                                        <div class="col-sm-7 controls">
                                            <div id="picupload_pic"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-3">
                                            <button type="submit" class="btn btn-primary"><i class="icon-ok"></i><?php echo coderLang::t('manage5',1)?><?php echo $active ?></button>
                                            <button type="button" class="btn" onClick="if(confirm('<?php echo coderLang::t('manage6',1)?><?php echo $active ?>?')){parent.closeBox();}"><i
                                                        class="icon-remove"></i>取消<?php echo $active ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!--left end-->
                            </div>
                        </div>
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
<script type="text/javascript" src="../js/coderpicupload.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#picupload_pic').coderpicupload({
            width: '100px',
            height: '100px',
            s_width: '100px',
            s_height: '100px',
            id: '<?php echo $colname['pic'] ?>',
            org_pic: org_pic,
            required: false,
            pics: [{name: '', type: 6, tag: 'b', width: 100, height: 100}]
        });

        <?php echo coderFormHelp::drawVaildScript();?>
    })
</script>
</body>
</html>
