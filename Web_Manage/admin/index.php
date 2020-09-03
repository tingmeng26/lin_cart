<?php
include('_config.php');
include_once('filterconfig.php');

coderAdmin::vaild($auth, 'view');

$listHelp = new coderListHelp('table1', coderLang::t("account", 1)); //帳號[account]
$listHelp->mutileSelect = false;
$listHelp->editLink = "manage.php";
$listHelp->addLink = "manage.php";
$listHelp->ajaxSrc = "service.php";
//$listHelp->delSrc="delservice.php";
//$listHelp->excelLink="savetoexcel.php"; //匯出 excel
//$listHelp->addexcelLink="manage_addexcel.php"; //匯入 excel


$col = array();
$col[] = array('column' => 'id', 'name' => 'ID', 'order' => true, 'width' => '60');
$col[] = array('column' => 'ispublic', 'name' => coderLang::t("index2", 1), 'order' => true, 'width' => '60'); //啟用 [index2]
$col[] = array('column' => 'isadmin', 'name' => coderLang::t("admin22", 1), 'order' => true, 'width' => '60'); //管理員帳號[admin22]
$col[] = array('column' => 'pic', 'name' => coderLang::t("admin19", 1), 'width' => 50); //圖片[admin19]
$col[] = array('column' => 'name', 'name' => coderLang::t("admin15", 1), 'order' => true, 'width' => '100'); //名字[admin15]
$col[] = array('column' => 'username', 'name' => coderLang::t("adminlog4", 1), 'order' => true, 'width' => '150'); //登入帳號[adminlog4]
$col[] = array('column' => 'email', 'name' => coderLang::t("admin16", 1), 'order' => true, 'width' => '150'); //Email[admin16]
$col[] = array('column' => 'email_backup', 'name' => coderLang::t("admin17", 1), 'order' => true); //備用Email[admin17]
//$col[]=array('column'=>'work','name'=>coderLang::t("admin23",1),'order'=>false); //工作中心代碼/名稱 [admin23]


$col[] = array('column' => $colname_rules['name'], 'name' => coderLang::t("admin18", 1), 'order' => true, 'width' => '180'); //權限[admin18]
$col[] = array('column' => 'ip', 'name' => coderLang::t("manage8", 1), 'width' => '100'); //最後登入IP [manage8]
$col[] = array('column' => 'admin', 'name' => coderLang::t("manage1", 1), 'order' => true, 'width' => '100'); //管理員 [manage1]
$col[] = array('column' => 'updatetime', 'name' => coderLang::t("index1", 1), 'order' => true, 'width' => '150'); //最後更新時間 [index1]
$listHelp->Bind($col);

$listHelp->bindFilter($help);
//$db = new Database($HS, $ID, $PW, $DB);
//$db->connect();


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
                        $tr.attr("editlink", "username=" + row["username"]);
                        $tr.attr("delkey", row["id"]);
                        $tr.attr("title", row["username"]);

                        $tr.append('<td>' + row["id"] + '</td>');
                        $tr.append('<td>' + row["ispublic"] + '</td>');
                        $tr.append('<td>' + row["isadmin"] + '</td>');
                        $tr.append('<td><img src="../upload/admin/' + row["pic"] + '" width="40" height="40"></img></td>');
                        $tr.append('<td>' + row["name"] + '</td>');
                        $tr.append('<td>' + row["username"] + '</td>');
                        $tr.append('<td>' + row["email"] + '</td>');
                        $tr.append('<td>' + row["email_backup"] + '</td>');
                        /*$tr.append('<td>'+row["work"]+'</td>');*/
                        $tr.append('<td>' + row["<?php echo $colname_rules['name'] ?>"] + '</td>');
                        $tr.append('<td>' + row["ip"] + '</td>');
                        $tr.append('<td>' + row["admin"] + '</td>');
                        $tr.append('<td>' + row["updatetime"] + '</td>');
                        obj.append($tr);
                    }
                }
            });
        });
    </script>

</body>

</html>