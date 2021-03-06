<?php
include_once('_config.php');
include_once('filterconfig.php');
coderAdmin::vaild($auth, 'view');

$listHelp = new coderListHelp('table1', $page_title);
$listHelp->mutileSelect = true;
$listHelp->editLink = "manage.php";
$listHelp->addLink = "manage.php";
$listHelp->ajaxSrc = "service.php";
$listHelp->delSrc = "delservice.php";
//$listHelp->excelLink="savetoexcel.php"; //匯出 excel

$col = array();
$col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60', 'def_desc' => 'desc');
$col[] = array('column' => $colname['name'], 'name' => coderLang::t("langdata2", 1), 'order' => true, 'width' => '200'); //名稱 [langdata2]
$col[] = array('column' => 'auth', 'name' => coderLang::t("authrules2", 1)); //權限設定[authrules2]
$col[] = array('column' => 'num', 'name' => coderLang::t("authrules3", 1), 'order' => true, 'width' => '100'); //成員數量[authrules3]
$col[] = array('column' => $colname['admin'], 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '90'); //管理員 [manage1]
$col[] = array('column' => $colname['updatetime'], 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '150'); //最後更新時間 [index1]
$listHelp->Bind($col);

$listHelp->bindFilter($help);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../head.php'); ?>

</head>

<body>
    <?php include('../navbar.php'); ?>
    <!-- BEGIN Container -->
    <div class="container" id="main-container">
        <?php include('../left.php'); ?>
        <!-- BEGIN Content -->
        <div id="main-content">
            <!-- BEGIN Page Title -->
            <div class="page-title">
                <div>
                    <h1>
                        <i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . coderLang::t("configmsg2", 1); //管理[configmsg2] 
                                                                ?>
                    </h1>
                    <h4><?php echo $page_desc ?></h4>
                </div>
            </div>
            <!-- END Page Title -->

            <!-- BEGIN Breadcrumb -->
            <div id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="../home/index.php">Home</a>
                        <span class="divider"><i class="icon-angle-right"></i></span>
                    </li>
                    <?php echo $mtitle ?>

                </ul>
            </div>
            <!-- END Breadcrumb -->

            <!-- BEGIN Main Content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-title">
                            <h3 style="float:left"><i class="icon-table"></i> <?php echo $page_title ?></h3>
                            <div class="box-tool">
                                <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                <a data-action="close" href="#"><i class="icon-remove"></i></a>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="box-content">
                            <?php echo $listHelp->drawTable() ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php include('../footer.php');
            $db->close(); ?>

            <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
        </div>
        <!-- END Content -->
    </div>
    <!-- END Container -->


    <?php include('../js.php');
    $userhref = help::canViewUser() ? "../admin/index.php?rules='+row[\"{$colname['name']}\"]+'" : "javascript:none()"; ?>
    <script type="text/javascript" src="../js/coderlisthelp.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table1').coderlisthelp({
                debug: true,
                callback: function(obj, rows) {
                    obj.html('');
                    var count = rows.length;
                    for (var i = 0; i < count; i++) {
                        var row = rows[i];
                        var $tr = $('<tr></tr>');
                        $tr.attr("editlink", "id=" + row["<?php echo $colname['id'] ?>"]);
                        $tr.attr("delkey", row["<?php echo $colname['id'] ?>"]);
                        $tr.attr("title", row["<?php echo $colname['name'] ?>"]);

                        $tr.append('<td>' + row["<?php echo $colname['id'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['name'] ?>"] + '</td>');
                        $tr.append('<td>' + row["auth"] + '</td>');
                        $tr.append('<td><a class="badge badge-info" href="<?php echo $userhref ?>">' + row["num"] + '</a></td>');
                        $tr.append('<td>' + row["<?php echo $colname['admin'] ?>"] + '</td>');
                        $tr.append('<td>' + row["<?php echo $colname['updatetime'] ?>"] + '</td>');
                        obj.append($tr);
                    }
                }
            });
        });
    </script>

</body>

</html>