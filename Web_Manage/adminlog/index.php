<?php
include('_config.php');
coderAdmin::vaild($auth, 'view');

$listHelp = new coderListHelp('table1', $page_title);
$listHelp->ajaxSrc = "service.php";

$col = array();
$col[] = array('column' => 'id', 'name' => 'ID', 'order' => true, 'width' => '60', 'def_desc' => 'desc');
$col[] = array('column' => 'username', 'name' => coderLang::t("adminlog6", 1), 'order' => true, 'width' => '100'); //帳號[adminlog6]
$col[] = array('column' => 'main_key', 'name' => coderLang::t("adminlog6", 1), 'order' => true, 'width' => '100'); //模組[adminlog6]
$col[] = array('column' => 'action', 'name' => coderLang::t("coderlisthelp2", 1), 'order' => true, 'width' => '100'); //操作[coderlisthelp2]
$col[] = array('column' => 'descript', 'name' => coderLang::t("adminlog7", 1), 'order' => true); //資訊[adminlog7]
$col[] = array('column' => 'ip', 'name' => 'IP', 'width' => '100');
$col[] = array('column' => 'createtime', 'name' => coderLang::t("adminlog5", 1), 'order' => true, 'width' => '150'); //操作日期[adminlog5]
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
                    <h1><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title . coderLang::t("configmsg2", 1); //管理[configmsg2] 
                                                                ?></h1>
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


    <?php include('../js.php'); ?>



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

                        $tr.append('<td>' + row["id"] + '</td>');
                        $tr.append('<td>' + row["username"] + '</td>');
                        $tr.append('<td>' + row["main_key"] + '</td>');
                        $tr.append('<td>' + row["action"] + '</td>');
                        $tr.append('<td>' + row["descript"] + '</td>');
                        $tr.append('<td>' + row["ip"] + '</td>');
                        $tr.append('<td>' + row["createtime"] + '</td>');
                        obj.append($tr);
                    }
                }
            });
        });
    </script>
</body>

</html>