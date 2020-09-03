<?php
include('_config.php');
$id = get('id');
$manageinfo = "";
$db = Database::DB();
include('formconfig.php');
coderAdmin::vaild($auth, 'import');
//$row=$db->query_prepare_first("select * from $table WHERE $idColumn=1");
$manageinfo = "";


$method = 'add';
$active = coderLang::t("add", 1); //編輯
//$fhelp->bindData($row);
//$manageinfo = $row!=null?(' 管理者 : '.$row['admin'].' | 上次修改時間 : '.$row['updatetime']):"";


$db->close();

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../head.php'); ?>

    <script language="javascript" type="text/javascript">
    </script>
</head>

<body>


    <?php //include('../navbar.php');
    ?>
    <!-- BEGIN Container -->
    <div class="container" id="main-container">
        <?php //include('../left.php');
        ?>
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
                            <h3><i class="<?php echo getIconClass($method) ?>"></i> <?php echo $page_title . ' - ' . coderLang::t("Excel2", 1); //Excel匯入[Excel2] 
                                                                                    ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form class="form-horizontal" action="save.php" id="myform" name="myform" method="post">
                                <div class="row">
                                    <!--left start-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                                <?php echo $fhelp->drawLabel('file') ?> </label>
                                            <div class="col-sm-8 controls">
                                                <div id="fileupload"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-lg-offset-2" id="submit_div">
                                                <img id="my_img" src="../images/loading2.gif" style="width:80px; height:80px; display:none;">
                                                <button type="button" class="btn btn-primary my_fok"><i class="icon-ok"></i><?php coderLang::t("Excel3"); //確定送出[Excel3] 
                                                                                                                            ?>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 control-label">
                                            </label>
                                            <div class="col-sm-8 controls">
                                                <hr />
                                                <a href="../lang_dictionary/savetoexcel.php?list_id=1"><?php coderLang::t("Excel4"); //下載匯入範例檔[Excel4] 
                                                                                                        ?></a><br /><br />
                                                <?php coderLang::t("Excel5"); //預覽Excel內容(請在下方確認匯入的資料內容是否正確)[Excel5] 
                                                ?>
                                                <div class="excel_data" style="word-wrap:break-word;"></div>
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
    <script type="text/javascript" src="../js/coderfileupload_2.js"></script>
    <script type="text/javascript" src="../assets/jquery-form/jquery.form.js"></script>
    <script type="text/javascript">
        <?php echo coderFormHelp::drawVaildScript('myform', $fobj); ?>
        $('#fileupload').coderfileupload({
            id: '<?php echo "file"; ?>',
            size_id: '',
            org_filename: '<?php echo isset($row["file"]) ? $row["file"] : "" ?>',
            org_filepath: '<?php echo $file_path; ?>',
            org_filesize: '',
            extname: '檔案只支援xls,xlsx',
            ajaxsrc: "../comm/uploadexcel.php",
            required: true
        });
        var form = 'form[name="myform"]';
        $(document).ready(function() {
            $("button.my_fok").click(function() {
                var re = $("#myform").valid();
                if (re) {
                    $("button.my_fok").hide();
                    $("img#my_img").show();
                    $(form).submit();
                }
            });
            var options = {
                dataType: 'json',
                asny: false,
                success: function(data) {
                    $("button.my_fok").show();
                    $("img#my_img").hide();
                    if (data) {
                        if (data['result'] == true) {
                            $('div.fileinfo').html(' <i class="icon-file-alt"> <?php coderLang::t("Excel6"); //請先上傳檔案[Excel6] 
                                                                                ?></i>');
                            $('input[type="file"]').val('');
                            $('input[name="file"]').val('');
                            //$("div.excel_data").html("預覽Excel內容");
                            if (data.erro_id != "") {
                                $("div.excel_data").html("<span class='red'>Excel <br>" + data.erro_id + " <br><?php coderLang::t("Excel7"); //未匯入成功[Excel7] 
                                                                                                                ?></span>");
                            } else {
                                //$("div.excel_data").html("預覽Excel內容");
                                showNotice('ok', '<?php coderLang::t("Excel8"); //匯入完成[Excel8] 
                                                    ?>', '<?php coderLang::t("Excel9"); //您己成功匯入了[Excel9] 
                                                                                                        ?><?php echo $page_title; ?><?php coderLang::t("Excel10"); //的檔案[Excel10] 
                                                                                                                                                                                ?>。');
                                parent.closeBox();
                            }


                            //setTimeout("location.href='../firm/index.php'",1500);
                        } else {
                            showNotice('alert', '<?php coderLang::t("Excel11"); //匯入失敗[Excel11] 
                                                    ?>', '<?php coderLang::t("Excel12"); //修改[Excel12] 
                                                                                                        ?><?php echo $page_title ?><?php coderLang::t("Excel13"); //的檔案失敗[Excel13] 
                                                                                                                                                                                ?>。<br>' + data['data']);
                        }
                    }
                },
                error: function() {
                    $("button.my_fok").show();
                    $("img#my_img").hide();
                    showNotice('alert', '<?php coderLang::t("Excel14"); //網站頁面管理[Excel14] 
                                            ?>', '<?php coderLang::t("Excel15"); //系統發生錯誤,請聯絡系統管理員[Excel15] 
                                                                                                ?>。');
                }
            };
            $('#myform').ajaxForm(options);
        });
    </script>
</body>

</html>